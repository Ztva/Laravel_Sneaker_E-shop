@extends ('layouts.app')

@section ('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Sneaker shop</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Add product</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        {{-- <table class="table table-bordered">
            <tr>
                <th>Nr.</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table> --}}

        <div class="row row-cols-1 row-cols-md-5 g-4">

            @foreach ($products as $product)

            <div class="col">
              <div class="card">
                <img src="{{ asset('img/adidas-marquee-boost.jpg') }} " class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title "> {{ $product->name }}</h5>
                  <p class="card-text">Brand: {{ $product->brand }}</p>
                  <p class="card-text">Price: {{ $product->price }} Eur</p>
                </div>
              </div>
            </div>
            
            @endforeach

            <ul>
                <li><a href="{{ route('products.filter', $product->brand) }}">Adidas</a></li>
                <li><a href="{{ route('products.filter', $product->brand) }}">Nike</a></li>
                <li><a href="{{ route('products.filter', $product->brand) }}">Jordan</a></li>
            </ul>

@endsection