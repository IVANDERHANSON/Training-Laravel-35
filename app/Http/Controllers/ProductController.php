<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function getHome() {
        $products = Product::paginate(1);
        return view('home', compact('products'));
    }

    function getCreateProduct() {
        $merks = Merk::all();
        return view('createProduct', compact('merks'));
    }

    function storeProduct(Request $request) {
        $request->validate([
            'Name' => ['required', 'min:5'],
            'Price' => ['required', 'min:1'],
            'Image' => ['required', 'image'],
            'Merk' => 'required'
        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public'.'/'.$filename);

        Product::create([
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Image' => $filename,
            'MerkId' => $request->Merk
        ]);

        return redirect('/home');
    }

    function updateProduct($id) {
        $product = Product::find($id);
        return view('updateProduct', compact('product'));
    }

    function editProduct(Request $request, $id) {
        $product = Product::find($id);

        $request->validate([
            'Name' => ['required', 'min:5'],
            'Price' => ['required', 'min:1'],
            'Image' => ['required', 'image']
        ]);

        Storage::delete('/public'.'/'.$product->Image);
        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Image')->getClientOriginalName();
        $request->file('Image')->storeAs('/public'.'/'.$filename);

        $product->update([
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Image' => $filename
        ]);

        return redirect('/home');
    }

    function deleteProduct($id) {
        $product = Product::find($id);
        Storage::delete('/public'.'/'.$product->Image);
        Product::destroy($product->id);
        return redirect('/home');
    }
}
