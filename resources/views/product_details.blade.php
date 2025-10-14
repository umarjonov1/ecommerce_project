@extends('main_design')
<base href="/public">
@section('product_detail')

    @if (session('card_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('card_message') }}
        </div>
    @endif
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                {{ $product->product_title }}
            </h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="img-box">
                        <img style="height: 500px;width: 350px"
                             src="{{ asset('storage/products/' . $product->product_image) }}">
                    </div>
                    <div class="detail-box">
                        <h3 style="color: #0c5460">
                            <span>
                            ${{ $product->product_price }}
                            </span>
                        </h3>
                    </div>
                    <div class="detail-box">
                        <h4>Description</h4>
                        <p>{{ $product->product_description }}</p>
                    </div>
                    <br><br><br>
                    <div class="checklist-block">
                        <a href="{{ route('add_to_card', $product->id) }}" type="submit" class="btn btn-primary">Add to Card</a></div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="btn-box">
            <a href="{{ route('all-products') }}">
                View All Products
            </a>
        </div>
    </div>

@endsection
