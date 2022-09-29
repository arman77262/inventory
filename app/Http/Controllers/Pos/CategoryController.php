<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryAll(){
        $category = Category::latest()->get();
        return view('backend.category.category_all', compact('category'));
    }//end method

    public function CategoryAdd(){
        return view('backend.category.category_add');
    }//end method

    public function CategoryStore(Request $request){
        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }//end method

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }//end method

    public function CategoryUpdate(Request $request){
        $cat_id = $request->id;
        Category::findOrFail($cat_id)->update([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }//end method

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
