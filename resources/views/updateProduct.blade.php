<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <x-navbar></x-navbar>

    <form action="/edit-product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="Name" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="Name" value="{{ $product->Name }}">
        </div>
        <div class="mb-3">
            <label for="Price" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="Price" aria-describedby="emailHelp" name="Price" value="{{ $product->Price }}">
          </div>
          <div class="mb-3">
            <label for="Image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="Image" aria-describedby="emailHelp" name="Image">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>