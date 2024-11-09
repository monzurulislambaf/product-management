@extends('app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $product->image }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
