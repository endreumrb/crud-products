@extends('layouts.default')
@section('content')
    <div>
        <div class="container px-5 py-8 flex flex-wrap mx-auto items-center">
            <form action="" method="GET"
                class="flex md:flex-nowrap flex-wrap justify-center items-end md:justify-start">
                <div class="relative sm:w-64 w-40 sm:mr-4 mr-2">
                    <label for="search" class="leading-7 text-sm text-gray-600">Pesquisar</label>
                    <input type="text" id="search" name="search" value="{{ request()->search }}"
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button type="submit"
                    class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Buscar</button>
            </form>
        </div>
    </div>

    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="{{ Str::startsWith($product->cover, 'http') ? $product->cover : Storage::url($product->cover) }}">
                        </a>
                        <div class="mt-4">
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            <p class="mt-1">R$ {{ $product->price }}</p>
                        </div>
                        <a class="mt-3 text-indigo-500 inline-flex items-center"
                            href="{{ route('product.show', $product->slug) }}">Ver mais
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
