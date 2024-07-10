@extends('layout.sidebar')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>

        @if(session('cart'))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $id => $details)
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="post">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 80px; display: inline-block;">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                            <td>${{ $details['price'] }}</td>
                            <td>${{ $details['price'] * $details['quantity'] }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <strong>Total: ${{ array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, session('cart'))) }}</strong>
            </div>
            <div>
                <a href="{{ route('cart.clear') }}" class="btn btn-danger">Clear Cart</a>
            </div>
        @else
            <p>Your cart is empty!</p>
        @endif
    </div>
@endsection
