@extends('admin.main-design')

@section('view_product')
    @if (session('delete_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('delete_message') }}
        </div>
    @endif
    <div class="block margin-bottom-sm">
        <div class="title"><strong>Products Table</strong></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->product_title }}</th>
                        <td>{{ \Illuminate\Support\Str::limit($product->product_description, 15)  }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->product_quantity }}</td>
                        <td>
                            <img src="{{ asset('storage/products/' . $product->product_image) }}" style="width: 75px; height: 75px">
                        </td>
                        <td>{{ $product->product_category }}</td>
                        <td>
                            <a href="{{ route('admin.edit-product', $product->id) }}">Edit</a>
                            <a href="{{ route('admin.delete-product', $product->id) }}"
                               onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach

                {{ $products->links() }}
                </tbody>
            </table>
        </div>
    </div>

@endsection

