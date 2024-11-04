@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subcategories</h1>
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Add New Subcategory</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->id }}</td>
                <td>{{ $subcategory->name }}</td>
                <td>{{ $subcategory->category->name }}</td>
                <td>
                    <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection