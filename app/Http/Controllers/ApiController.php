<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    function getProduct() {
        return ProductResource::collection(Product::paginate(2));
    }

    function storeProduct(Request $request) {
        $request->validate([
            'Name' => ['required'],
            'Price' => ['required'],
            'Image' => ['required'],
            'Merk' => 'required'
        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public'.'/'.$filename);

        Product::create([
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Image' => $filename,
            'MerkId' => 1
        ]);

        return 'Product berhasil dibuat!';
    }

    function updateProduct(Request $request, $id) {
        $product = Product::find($id);

        $request->validate([
            'Name' => ['required'],
            'Price' => ['required'],
            'Image' => ['required'],
            'Merk' => 'required'
        ]);

        Storage::delete('/public'.'/'.$product->Image);
        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public'.'/'.$filename);

        $product->update([
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Image' => $filename,
            'MerkId' => 1
        ]);

        return 'Product berhasil di update!';
    }

    function deleteProduct($id) {
        $product = Product::find($id);
        Storage::delete('/public'.'/'.$product->Image);
        Product::destroy($product->id);
        return 'Product berhasil di delete!';
    }
}
