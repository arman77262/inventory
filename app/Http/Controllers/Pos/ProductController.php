<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductAll(){
        $product = Product::latest()->get();
        return view('backend.product.product_all', compact('product'));
    }//end method

    public function ProductAdd(){
        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.product_add',compact('supplier', 'category', 'unit'));
    }//end method

    public function ProductStore(Request $request){

        Product::insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);


    }//end method

    public function ProductEdit($id){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','supplier', 'category', 'unit'));

    }//end method

    public function ProductUpdate(Request $request){
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }//end method

    public function ProductDelete($id){
        Product::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
