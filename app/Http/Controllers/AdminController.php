<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.product_create');
    }

    public function store(ProductStoreRequest $request)
    {
        // Validar os dados do formulário
        $validatedData = $request->validated();

        // Gerar o slug com base no nome do produto
        $slug = Str::slug($validatedData['name']);

        // Verificar se um novo arquivo de imagem foi enviado
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('public/products/images');
            $validatedData['cover'] = $path;
        }

        // Criar um novo produto com os dados validados e o slug gerado
        $product = Product::create([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'cover' => $validatedData['cover'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'stock' => $validatedData['stock'],
        ]);

        // Redirecionar para a página de detalhes do produto ou para a lista de produtos
        return redirect()->route('admin.product.index')->with('success', "Produto criado com sucesso! ID: $product->id");
    }

    public function edit(Product $product)
    {
        return view('admin.product_edit', compact('product'));
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        // Validar os dados do formulário
        $validatedData = $request->validated();

        // Gerar o slug com base no nome do produto, se não foi fornecido
        if (!$request->filled('slug')) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }

        // Verificar se um novo arquivo de imagem foi enviado
        if ($request->hasFile('cover')) {
            // Excluir a imagem do sistema de arquivos
            if($product->cover) {
                Storage::delete($product->cover);
            }
            $path = $request->file('cover')->store('public/products/images');
            $validatedData['cover'] = $path;
        }

        // Atualizar o produto com os dados validados
        $product->update($validatedData);

        // Redirecionar para a página de detalhes do produto ou para a lista de produtos
        return redirect()->route('admin.product.edit', $product->id)->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        // Excluir a imagem do sistema de arquivos
        if($product->cover) {
            Storage::delete($product->cover);
        }

        // Excluir o produto
        $product->delete();

        // Redirecionar para a lista de produtos
        return redirect()->route('admin.product.index')->with('success', 'Produto excluído com sucesso!');
    }

    public function destroyImage(Product $product)
    {
        // Verificar se o produto possui uma imagem
        if ($product->cover) {
            // Excluir a imagem do sistema de arquivos
            Storage::delete($product->cover);
            
            // Atualizar o campo 'cover' do produto para null
            $product->cover = null;
            $product->save();
        }
    
        // Redirecionar de volta para a página de edição do produto com uma mensagem de sucesso
        return redirect()->route('admin.product.edit', $product->id)->with('success', 'Imagem excluída com sucesso!');
    }
}
