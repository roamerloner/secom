@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Subcategory</h1>
    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Subcategory Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $subcategory->name }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Subcategory</button>
    </form>
</div>
@endsection