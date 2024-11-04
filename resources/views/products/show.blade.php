@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p>
                <small class="text-muted">Old Price: ${{ $product->old_price }}</small>
                <br>
                <strong>New Price: ${{ $product->new_price }}</strong>
            </p>
            <p>
                <small class="text-muted">
                    Category: {{ $product->subcategory->category->name }} <br>
                    Subcategory: {{ $product->subcategory->name }}
                </small>
            </p>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection