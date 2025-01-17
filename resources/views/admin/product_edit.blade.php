@extends('layouts.default')
@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                @if (session('success'))
                    <div class="alert alert-success bg-green-100 text-center text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar produto</h1>
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $product->name) }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative text-xs"
                                    role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="price" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="price" name="price"
                                    value="{{ old('price', $product->price) }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                            @error('price')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative text-xs"
                                    role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="stock" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="stock" name="stock"
                                    value="{{ old('stock', $product->stock) }}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('stock')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative text-xs"
                                    role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2 flex items-end">
                            <div class="relative">
                                <label for="cover" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                            @error('cover')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative text-xs"
                                    role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        @if ($product->cover)
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <a class="mt-3 text-indigo-500 inline-flex items-center hover:text-indigo-800"
                                        href="{{ route('admin.product.destroyImage', $product->id) }}">Deletar Imagem</a>
                                    <img src="{{ Str::startsWith($product->cover, 'http') ? $product->cover : Storage::url($product->cover) }}"
                                        alt="">
                                </div>
                            </div>
                        @endif

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="description" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea id="description" name="description"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('description', $product->description) }}</textarea>
                            </div>
                            @error('description')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative text-xs"
                                    role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="p-2 w-full">
                            <button
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Editar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
