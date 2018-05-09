<?php

namespace App\Http\Controllers;

use App\Product;
use App\Status;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    # Login Options
    public function index()
    {
        return view('index');
    }

    # Dashboard View
    public function dashboard()
    {
        $products = Product::with('statuses')->orderBy('item_number')->get();

        $recentProducts = $products->sortByDesc('updated_at')->take(10);

        # Get data for Quick View at top of dashboard
        $needsUpdate = 0;
        $readyForUse = 0;

        foreach ($products as $product) {
            foreach ($product->statuses as $status) {
                if ($status->status_code == 'Needs Update') {
                    $needsUpdate++;
                } else if ($status->status_code == 'Ready For Use') {
                    $readyForUse++;
                }
            }
        }

        return view('dashboard')->with([
            'products' => $products,
            'recentProducts' => $recentProducts,
            'needsUpdate' => $needsUpdate,
            'readyForUse' => $readyForUse
        ]);
    }

    # Products page with search results
    public function productListing(Request $request)
    {
        # Retrieve all necessary form pre-fill/product data from session
        $products = $request->session()->get('products');
        $productCode = $request->session()->get('productCode');
        $mostRecent = $request->session()->get('mostRecent');
        $orderBy = $request->session()->get('orderBy');

        return view('products')->with([
            'products' => $products,
            'productCode' => $productCode,
            'orderBy' => $orderBy,
            'mostRecent' => $mostRecent
        ]);
    }

    # Product Search functionality returning to /products
    public function productSearch(Request $request)
    {
        # Extract relevant search terms from request
        $productCode = $request->input('product_code');
        $orderBy = $request->input('order_by');
        $mostRecent = $request->input('most_recent');

        $products = Product::where('product_code', '=', $productCode)->orderBy($orderBy)->get();

        # Limit results if necessary
        if ($mostRecent) {
            $products = $products->sortByDesc('updated_at')->take(5);
        }

        return redirect('/products')->with([
            'products' => $products,
            'productCode' => $productCode,
            'orderBy' => $orderBy,
            'mostRecent' => $mostRecent
        ]);
    }

    # Functionality for editing a product upon 'edit' action in table
    public function productEdit($id)
    {
        $product = Product::where('item_number', '=', $id)->first();

        # Get status codes from database to show to user
        $statuses = Status::orderBy('status_code')->get();
        $statusSelection = [];

        foreach ($statuses as $status) {
            $statusSelection[$status->id] = $status->status_code;
        }

        return view('edit')->with([
            'product' => $product,
            'statusSelection' => $statusSelection,
            'statuses' => $product->statuses()->pluck('statuses.status_code')->toArray()
        ]);
    }

    # Update product in database after edit
    public function productUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price_per_unit' => 'required|numeric'
        ]);

        $product = Product::where('item_number', '=', $id)->first();

        # Update relevant fields from request
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price_per_unit = $request->price_per_unit;
        $product->product_code = $request->product_code;
        $product->total = ($product->quantity * $product->price_per_unit);
        $product->save();

        $product->statuses()->sync($request->input('statusCodes'));

        return redirect('/products/' . $id . '/edit')->with([
            'alert' => 'Your changes have been saved.'
        ]);
    }

    # Functionality for deleting a product after confirmation
    public function productDestroy($id)
    {
        $product = Product::where('item_number', '=', $id)->first();

        # Manage relations in product_status pivot table on deletion
        $product->statuses()->detach();

        $product->delete();

        return redirect('/products')->with([
            'alert' => '"' . $product->description . '" was removed.'
        ]);
    }

    # Functionality for creation of a new product
    public function productMake(Request $request)
    {
        # Get status codes from database to show to user
        $statuses = Status::orderBy('status_code')->get();
        $statusSelection = [];

        foreach ($statuses as $status) {
            $statusSelection[$status->id] = $status->status_code;
        }

        return view('add')->with([
            'statusSelection' => $statusSelection
        ]);
    }

    # Adding the new product to the database after creation
    public function productAdd(Request $request)
    {
        $this->validate($request, [
            'item_number' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'on_order' => 'required|numeric',
            'price_per_unit' => 'required|numeric'
        ]);

        # Handle if product item_number already exists in database
        if (count(Product::where('item_number', '=', $request->item_number)->get()) > 0) {
            return redirect('product-add')->with([
                'alert-danger' => 'Product ID already exists in database.'
            ]);
        }

        # Create new product from information in request
        $product = new Product();
        $product->item_number = $request->item_number;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->on_order = $request->on_order;
        $product->price_per_unit = $request->price_per_unit;
        $product->product_code = $request->product_code;
        $product->total = ($product->quantity * $product->price_per_unit);
        $product->save();

        $product->statuses()->sync($request->input('statusCodes'));

        return redirect('/product-add')->with([
            'alert' => 'Your changes have been saved.'
        ]);
    }

    # Return products with appropriate status codes to Status Center
    public function statusListing(Request $request)
    {
        # Retrieve all necessary form pre-fill/product data from session
        $products = $request->session()->get('products');
        $productCode = $request->session()->get('productCode');
        $mostRecent = $request->session()->get('mostRecent');
        $orderBy = $request->session()->get('orderBy');

        $productStatuses = Product::with('statuses')->orderBy('item_number')->get();

        # Get data for Quick View boxes at the top of Status Center
        $needsUpdate = 0;
        $readyForUse = 0;
        $inProgress = 0;
        $markedForDeletion = 0;

        foreach ($productStatuses as $product) {
            foreach ($product->statuses as $status) {
                if ($status->status_code == 'Needs Update') {
                    $needsUpdate++;
                } else if ($status->status_code == 'Ready For Use') {
                    $readyForUse++;
                } else if ($status->status_code == 'In Progress') {
                    $inProgress++;
                } else if ($status->status_code == 'Marked For Deletion') {
                    $markedForDeletion++;
                }
            }
        }

        return view('statuses')->with([
            'products' => $products,
            'needsUpdate' => $needsUpdate,
            'readyForUse' => $readyForUse,
            'inProgress' => $inProgress,
            'markedForDeletion' => $markedForDeletion,
            'productCode' => $productCode,
            'orderBy' => $orderBy,
            'mostRecent' => $mostRecent

        ]);
    }

    # Functionality for searching for statuses via specific product types
    public function statusSearch(Request $request)
    {
        # Extract relevant search terms from request
        $productCode = $request->input('product_code');
        $orderBy = $request->input('order_by');
        $mostRecent = $request->input('most_recent');

        $products = Product::with('statuses')->where('product_code', '=', $productCode)->orderBy($orderBy)->get();

        # Limit results if necessary
        if ($mostRecent) {
            $products = $products->sortByDesc('updated_at')->take(5);
        }

        return redirect('/status-center')->with([
            'products' => $products,
            'productCode' => $productCode,
            'orderBy' => $orderBy,
            'mostRecent' => $mostRecent
        ]);
    }

}
