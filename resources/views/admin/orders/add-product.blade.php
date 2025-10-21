@extends('admin.main-design')

@section('add_product')

    @if (session('product_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('product_message') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="block">
            <div class="title"><strong class="d-block">Add product</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span>
            </div>
            <div class="block-body">
                <form action="{{ route('admin.post-add-product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Product title</label>
                        <input type="text" name="product_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Product Description</label>
                        <textarea type="text" name="product_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Product price</label>
                        <input type="number" name="product_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Product quantity</label>
                        <input type="number" name="product_quantity" class="form-control">
                    </div>
                    <label class="col-sm-3 form-control-label">Select Category</label>
                        <select name="product_category" class="form-control mb-3 mb-3">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
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
