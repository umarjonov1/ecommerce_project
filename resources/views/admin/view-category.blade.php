@extends('admin.main-design')

@section('view_category')
    @if (session('delete_message'))
        <div style="margin-bottom: 10px; color: black; background-color: green">
            {{ session('delete_message') }}
        </div>
    @endif
    <div class="block margin-bottom-sm">
        <div class="title"><strong>Basic Table</strong></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->category }}</td>
                        <td>
                            <a href="{{ route('admin.edit-category', $category->id) }}">Edit</a>
                            <a href="{{ route('admin.delete-category', $category->id) }}"
                               onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
