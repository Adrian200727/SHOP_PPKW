<x-app-layout>
    <x-slot name="header">
        <h2>Your Cart</h2>
    </x-slot>

    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>Rp {{ number_format($cart->product->price, 2) }}</td>
                        <td>Rp {{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
