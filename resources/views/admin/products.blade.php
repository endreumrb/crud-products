@extends('layouts.default')
@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            @if (session('success'))
                <div class="alert alert-success bg-green-100 text-center text-green-700">
                    {{ session('success') }}
                </div>
            @endif
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Produtos</h1>
                    <a class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded"
                        href="{{ route('admin.product.create') }}">Adicionar</a>
                </div>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#
                            </th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"
                                style="width: 150px">Imagem</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Nome</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Valor</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Estoque</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($products as $product)
                            <tr
                                class='cursor-pointer hover:bg-gray-200 @if ($loop->even) bg-gray-100 @endif '>
                                <td class="px-4 py-3">{{ $product->id }}</td>
                                <td class="px-4 py-3">
                                    <img alt="Image product" class="object-cover object-center w-full h-full block"
                                        src="{{ Str::startsWith($product->cover, 'http') ? $product->cover : Storage::url($product->cover) }}">
                                </td>
                                <td class="px-4 py-3">{{ $product->name }}</td>
                                <td class="px-4 py-3">R$ {{ $product->price }}</td>
                                <td class="px-4 py-3">{{ $product->stock }}</td>
                                <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                                    <a class="mt-3 text-indigo-500 inline-flex items-center hover:text-indigo-800"
                                        href="{{ route('admin.product.edit', $product->id) }}">Editar</a>
                                    <a class="mt-3 text-indigo-500 inline-flex items-center hover:text-indigo-800"
                                        href="{{ route('admin.product.destroy', $product->id) }}">Deletar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
