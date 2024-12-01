<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <a href="{{ route('products.index')}}" class="btn btn-info btn-sm">kelola produk</a>
    </x-slot>
</x-app-layout>
