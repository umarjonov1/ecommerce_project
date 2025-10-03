@extends('admin.main-design')

@section('edit_category')

    @if (session('category_updated_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('category_updated_message') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.update-category', $category->id) }}" method="post">
            @csrf

            <input type="text" name="category" value="{{ $category->category }}">
            <input type="submit" name="submit" value="Update category">
        </form>
    </div>
@endsection
