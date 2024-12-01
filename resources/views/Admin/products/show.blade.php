<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h1 class="mb-4">Product Detail</h1>
            <div class="mb-4">
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="img-fluid" style="max-width: 300px;">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="mb-4">
                <strong>Name:</strong> {{ $product->name }}
            </div>

            <div class="mb-4">
                <strong>Price:</strong> ${{ number_format($product->price, 2) }}
            </div>

            <div class="mb-4">
                <strong>Stock:</strong> {{ $product->stock }}
            </div>

            <div class="mb-4">
                <strong>Description:</strong> {{ $product->description ?? 'No description available' }}
            </div>


            <div class="mb-4">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Product List</a>
            </div>
        </div>
    </x-slot>
</x-app-layout>