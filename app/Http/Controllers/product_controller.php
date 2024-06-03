<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class product_controller
{
    // This method shows pages
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.list', [
            'products' => $products
        ]);
    }


    // This method for create product
    public function create()
    {
        return view('products.create');
    }


    // This method for store product in db
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:5 ',
            'sku' => 'required|min:3 ',
            'price' => 'required|numeric ',
        ];

        if ($request->image != '') {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
        // insert product
        $product = new product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != '') {
            // store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; //unique name

            // save image to pdroducts dir
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }


    // This method for edit product page show
    public function edit()
    {
        return view('products.edit');
    }
    // This method for update product in db
    public function update()
    {
    }
    // This method for delete product in db
    public function destroy()
    {
    }
}
