<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <x-navbar></x-navbar>

    @if (Auth::check())
      Hello, {{ Auth::user()->name }}
      <p>Name: {{ Cookie::get('name') }}</p>
    @endif

    @forelse ($products as $product)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('/storage'.'/'.$product->Image) }}" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">{{ $product->Name }}</p>
            <p class="card-text">{{ $product->Price }}</p>
            <p class="card-text">{{ $product->merk->Merk }}</p>
            @if (Auth::user()->Role == 'Admin')
              <a href="/update-product/{{ $product->id }}">Update Product</a>
              <form action="/delete-product/{{ $product->id }}" method="POST">
                  @csrf
                  <button type="submit">Delete Product</button>
              </form>
            @endif
            </div>
            <a href="{{ route('getCreateOrder', $product->id) }}">Create Order</a>
        </div>
    @empty
        <p>Data is emtpy.</p>
    @endforelse

    {{ $products->onEachSide(1)->links() }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>