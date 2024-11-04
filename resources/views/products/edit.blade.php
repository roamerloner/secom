@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="old_price">Old Price</label>
            <input type="number" step="0.01" class="form-control @error('old_price') is-invalid @enderror" id="old_price" name="old_price" value="{{ $product->old_price }}" required>
            @error('old_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="new_price">New Price</label>
            <input type="number" 

 step="0.01" class="form-control @error('new_price') is-invalid @enderror" id="new_price" name="new_price" value="{{ $product->new_price }}" required>
            @error('new_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select class="form-control @error('subcategory_id') is-invalid @enderror" id="subcategory_id" name="subcategory_id" required>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                        {{ $subcategory->category->name }} - {{ $subcategory->name }}
                    </option>
                @endforeach
            </select>
            @error('subcategory_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection