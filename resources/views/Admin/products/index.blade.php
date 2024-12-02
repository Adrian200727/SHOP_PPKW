<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <form action="{{ route('products.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search products..." value="{{ request()->query('search') }}" class="form-control">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>



            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <!-- Kolom untuk gambar -->
                            <td>
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="img-fluid" style="max-width: 50px; height: auto;">
                                @else
                                    <p>No image</p>
                                @endif
                            </td>
                            <!-- Kolom untuk nama produk -->
                            <td>{{ $product->name }}</td>
                            <!-- Kolom untuk harga -->
                            <td>Rp {{ number_format($product->price, 2) }}</td>
                            <!-- Kolom untuk stok -->
                            <td>{{ $product->stock }}</td>
                            <!-- Kolom untuk aksi -->
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
