@extends('admin.main-design')

@section('add_category')

    @if (session('category_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('category_message') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.post-add-category') }}" method="post">
            @csrf

            <input type="text" name="category">
            <input type="submit" name="submit" value="Add Category">
        </form>
    </div>
@endsection
