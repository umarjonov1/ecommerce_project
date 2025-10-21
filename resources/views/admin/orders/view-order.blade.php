@extends('admin.main-design')

@section('view_orders')

    <div class="list-inline-item">

    </div>
    <div class="block margin-bottom-sm">
        <div class="title"><strong>Orders Table</strong></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <th scope="row">{{ $order->receiver_address }}</th>
                        <td>{{ $order->receiver_phone }}</td>
                        <td>{{ $order->product->product_title }}</td>
                        <td>${{ $order->product->product_price }}</td>
                        <td>
                            <img src="{{ asset('storage/products/' . $order->product->product_image) }}"
                                 style="width: 75px; height: 75px">
                        </td>
                        <td>
                            <form action="{{ route('admin.order.change_status', $order->id) }}" method="post">
                                @csrf

                                <select name="status" id="">
                                    <option value="{{ $order->status }}">{{ $order->status }}</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <input class="btn btn-primary" type="submit" name="submit" value="submit" onclick="return confirm('Are you sure?')">
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

