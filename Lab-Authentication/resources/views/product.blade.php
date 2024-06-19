<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                @foreach ( $products as $product )
                    <p> product : {{$product->prod_name}} </p>
                    <p> price : {{$product->price}} </p>
                    <p> stock : {{$product->stock}} </p>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
