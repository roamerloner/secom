@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Subcategory</h1>
    <form action="{{ route('subcategories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Subcategory Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Subcategory</button>
    </form>
</div>
@endsection