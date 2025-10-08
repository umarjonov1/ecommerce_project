@extends('admin.main-design')

@section('add_product')

    @if (session('product_updated_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('product_updated_message') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="block">
            <div class="title"><strong class="d-block">Add product</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span>
            </div>
            <div class="block-body">
                <form action="{{ route('admin.update-product', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Product title</label>
                        <input type="text" name="product_title" class="form-control" value="{{ $product->product_title }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Product Description</label>
                        <textarea type="text" name="product_description" class="form-control" value="{{ $product->product_description }}">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Product price</label>
                        <input type="number" name="product_price" class="form-control" value="{{ $product->product_price }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Product quantity</label>
                        <input type="number" name="product_quantity" class="form-control" value="{{ $product->product_quantity }}">
                    </div>
                    <label class="form-control-label">Select Category</label>
                    <select name="product_category" class="form-control mb-3 mb-3">
                        @foreach($categories as $category)
                            <option value="{{ $product->product_category }}">{{ $product->product_category }}</option>
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>

                    <label for="">Old image</label>
                    <img style="width: 100px;height: 100px" src="{{ asset('products/' . $product->product_image) }}" alt="">
                    <div class="form-group">

                        <label class="form-control-label">Choose image</label>
                        <input type="file" name="product_image" class="form-control">
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
