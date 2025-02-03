<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        return view('product.list', compact($products));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('Product.create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProduct $request)
    {
        $input = [
            'code' => $request->code,
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
           ];
        if($request->hasfile('image')){
            $fileName = time().'_'.$request->image->getClientOriginalExtension();
            Storage::putFileAs('uploads/images', $request->image, $fileName);
            $input['image'] = $fileName;

           }
           $product = Product::create($input);
           return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $id)
    {
        $product = Product::find(Crypt::decrypt($id));
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $id)
    {
        $product = Product::find(crypt::decrypt($id));
        return view('Product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
        ]);
        if($request->hasfile('image'))
        {
            $fileName = time().'_'.$request->image->getClientOriginalExtension();
            Storage::putFileAs('uploads/images', $request->image, $fileName);
            $product->update(['image' => $fileName]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $id)
    {
        $product = Product::find(Crypt::decrypt($id));
        $product->destroy();
        return redirect()->route('product.show');
    }


    public function getProductsData(Request $request)
    {
       return datatables::of(Product::query())->make(true);
    }
}
