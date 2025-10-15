@extends('main_design')

@section('view_cart_products')
    <div class="container">
        <div class="row">
            @foreach($cartItems as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="{{ route('product_details', $product->product->id) }}">
                            <div class="img-box">
                                <img src="{{ asset('storage/products/' . $product->product->product_image) }}">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{ $product->product->product_title }}
                                </h6>
                                <h6>
                                    Price
                                    <span>
                    ${{ $product->product->product_price }}
                  </span>
                                </h6>
                            </div>
                            <div class="new">
                <span>
                  New
                </span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="{{ route('index') }}">
                View Latest Products
            </a>
        </div>
    </div>

@endsection
