@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                    <p class="card-text">
                        <small class="text-muted">Old Price: ${{ $product->old_price }}</small>
                        <br>
                        <strong>New Price: ${{ $product->new_price }}</strong>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                            Category: {{ $product->subcategory->category->name }} <br>
                            Subcategory: {{ $product->subcategory->name }}
                        </small>
                    </p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection