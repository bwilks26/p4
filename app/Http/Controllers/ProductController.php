<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        $products = Product::orderBy('item_number')->get();

        $recentProducts = $products->sortByDesc('updated_at')->take(10);


        return view('dashboard')->with([
            'products' => $products,
            'recentProducts' => $recentProducts
        ]);
    }

    public function productListing(Request $request)
    {
        $products = $request->session()->get('products');

        return view('products')->with([
            'products' => $products
        ]);
    }

    public function productSearch(Request $request)
    {


        # Extract relevant search terms from request
        $product_code = $request->input('product_code');
        $order_by = $request->input('order_by');
        $most_recent = $request->input('most_recent');

        $products = Product::where('product_code', '=', $product_code)->orderBy($order_by)->get();


        if ($most_recent) {
            $products = $products->take(10);
        }

        return redirect('/products')->with([
            'products' => $products
        ]);

    }

    public function productEdit($id)
    {
        $product = Product::where('item_number', '=', $id)->first();


        return view('edit')->with([
            'product' => $product
        ]);

    }

    public function productUpdate(Request $request, $id)
    {

        $this->validate($request, [
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price_per_unit' => 'required|numeric'
        ]);

        $product = Product::where('item_number', '=', $id)->first();


        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price_per_unit = $request->price_per_unit;
        $product->product_code = $request->product_code;
        $product->total = ($product->quantity * $product->price_per_unit);
        $product->save();

        return redirect('/dashboard')->with([
            'alert' => 'Your changes have been saved.'
        ]);

    }

    public function productDestroy($id)
    {
        $product = Product::where('item_number', '=', $id)->first();
        $product->delete();

        return redirect('/products')->with([
            'alert' => '"'.$product->description.'" was removed.'
        ]);
    }

    public function productMake(Request $request)
    {
        return view('add');
    }

    public function productAdd(Request $request)
    {
        $this->validate($request, [
            'item_number' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'on_order' => 'required|numeric',
            'price_per_unit' => 'required|numeric'
        ]);


        if (count(Product::where('item_number', '=', $request->item_number)->get()) > 0)
        {
            return redirect('product-add')->with([
                'alert-danger' => 'Product ID already exists in database.'
            ]);
        }

        $product = new Product();
        $product->item_number = $request->item_number;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->on_order = $request->on_order;
        $product->price_per_unit = $request->price_per_unit;
        $product->product_code = $request->product_code;
        $product->total = ($product->quantity * $product->price_per_unit);
        $product->save();

        return redirect('/product-add')->with([
            'alert' => 'Your changes have been saved.'
        ]);
    }


}
