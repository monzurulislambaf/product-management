@extends('app')

@section('content')
    <section class="container">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
        <!-- Search Form -->
        <form method="GET" action="{{ route('products.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by ID or Description"
                    value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Sorting Links -->
        <div class="mb-3">
            <a href="{{ route('products.index', ['sort_by' => 'name', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                class="btn btn-link">
                Sort by Name
            </a> |
            <a href="{{ route('products.index', ['sort_by' => 'price', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}"
                class="btn btn-link">
                Sort by Price
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">SHOW</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><img src="{{ $product->image }}" class="img-thumbnail" width="50px" alt="Product image"></td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
