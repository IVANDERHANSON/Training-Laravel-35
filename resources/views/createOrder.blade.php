<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <x-navbar></x-navbar>

    <form action="{{ route('storeOrder', $product->id) }}" method="POST">
        @csrf
        <div class="mb-3">
          Product Name: {{ $product->Name }}
        </div>
        <div class="mb-3">
            Product Price: {{ $product->Price }}
        </div>
        <div class="mb-3">
            Merk: {{ $product->merk->Merk }}
        </div>


          <div class="mb-3">
            <label class="form-label">Shipment</label><br>
            @forelse ($shipments as $shipment)
                <input type="radio" value="{{ $shipment->id }}" id="{{ $shipment->id }}" name="Shipment">
                <label for="{{ $shipment->id }}">Type: {{ $shipment->Type }}, Price: {{ $shipment->Price }}, Estimation: {{ $shipment->Estimation }}</label>
                <br>
            @empty
                <p>Data is emtpy.</p>
            @endforelse
          </div>
          @error('Image')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>