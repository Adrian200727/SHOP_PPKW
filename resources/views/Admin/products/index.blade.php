<!-- resources/views/products/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4 py-6">
            <!-- Search Form -->
            <div class="flex items-center justify-between mb-6">
                <form action="{{ route('products.index') }}" method="GET" class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Search products..." value="{{ request()->query('search') }}" class="w-full sm:w-1/3 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition">Search</button>
                </form>

                <a href="{{ route('products.create') }}" class="bg-green-500 text-white p-2 rounded-lg hover:bg-green-600 transition">Add Product</a>
            </div>

            <!-- Product Table -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto text-gray-600">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-6 text-left font-medium">Image</th>
                            <th class="py-3 px-6 text-left font-medium">Name</th>
                            <th class="py-3 px-6 text-left font-medium">Price</th>
                            <th class="py-3 px-6 text-left font-medium">Stock</th>
                            <th class="py-3 px-6 text-left font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b hover:bg-gray-50">
                                <!-- Image Column -->
                                <td class="py-4 px-6">
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="w-12 h-12 object-cover rounded-full">
                                    @else
                                        <p>No image</p>
                                    @endif
                                </td>
                                <!-- Name Column -->
                                <td class="py-4 px-6">{{ $product->name }}</td>
                                <!-- Price Column -->
                                <td class="py-4 px-6">Rp {{ number_format($product->price, 2) }}</td>
                                <!-- Stock Column -->
                                <td class="py-4 px-6">{{ $product->stock }}</td>
                                <!-- Actions Column -->
                                <td class="py-4 px-6 space-x-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="inline-block text-blue-500 hover:text-blue-700 font-medium">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="inline-block text-yellow-500 hover:text-yellow-700 font-medium">Edit</a>
                                    
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                                    </form>

                                    @if(Auth::user()->role !== 'admin')
                                        <!-- Tombol Tambahkan ke Keranjang hanya untuk user -->
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="bg-blue-500 text-white py-1 px-4 rounded-lg hover:bg-blue-600 transition">Add to Cart</button>
                                        </form>
                                    @else
                                        <!-- Pesan jika admin tidak bisa menambahkan ke keranjang -->
                                        <p class="text-gray-600 mt-2">Admin cannot add products to the cart.</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>
