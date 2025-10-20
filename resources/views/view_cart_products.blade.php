@extends('main_design')

@section('view_cart_products')
    <div class="container">
        <div class="row">
            @if (session('confirm_order'))
                <div style="margin-bottom: 10px; color: black; background-color: green">
                    {{ session('confirm_order') }}
                </div>
            @endif
            @if (count($cartItems) > 0)

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $product)
                        <tr>
                            <td>{{ $product->product->product_title }}</td>
                            <td>${{ $product->product->product_description }}</td>
                            <td>${{ $product->product->product_price }}</td>
                            <td>
                                <img style="height: 100px;width: 85px"
                                     src="{{ asset('storage/products/' . $product->product->product_image) }}" alt="">
                            </td>
                            <td>
                                <a href="{{ route('remove_cart_product', $product->id) }}"
                                   style="padding: 10px;background-color: red;color: white">Remove</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <form action="{{ route('confirm_order') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="form-control-label">Receiver address</label>
                        <input type="text" name="receiver_address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Receiver phone number</label>
                        <input type="text" name="receiver_phone" class="form-control">
                    </div>

                    <input type="submit" value="Confirm Order" class="btn btn-primary">
                </form>
            @else
                <h3>Any product in the cart</h3>
            @endif
        </div>


        <div class="btn-box">
            <a href="{{ route('index') }}">
                View Latest Products
            </a>
        </div>
    </div>

@endsection
