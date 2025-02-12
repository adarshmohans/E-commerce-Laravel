<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductSaveRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController
{
    public function list(){
        $products = Product::latest()->paginate(10);
        return view('admin.products.list', compact('products'));
    }

    public function create(){
        $categories= Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function save(ProductSaveRequest $request){
        $input = $request->validated();
        
        $filename = null;
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename = str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs('images', $filename);
        }
        $input['image'] = $filename;
        Product::create($input);
        return redirect()->route('admin.product.list')->with('message', 'Product saved successfully');
    }

    public function delete($id){
        $product=Product::find(decrypt($id));
        if(!empty($product)){
            Storage::delete('images/'.$product->image);
        }
        $product->delete();
        return redirect()->route('admin.product.list')->with('message', 'Product deleted successfully');
    }
}
