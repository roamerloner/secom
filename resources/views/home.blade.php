@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Welcome to Our E-commerce Platform</h1>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <ul class="list-group list-group-flush">
                            @foreach($category->subcategories as $subcategory)
                                <li class="list-group-item">
                                    <a href="{{ route('products.by_subcategory', [$category->slug, $subcategory->slug]) }}">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection