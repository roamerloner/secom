@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }} - {{ $subcategory->name }}</h1>
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
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection