<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;

class CustomerController extends Controller
{
    public function CustomerAll(){
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }// end method

    public function CustomerAdd(){
        return view('backend.customer.customer_add');
    }// end method

    public function CustomerStore(Request $request){
        $image = $request->file('customer_image');
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(200, 200)->save('upload/customer/'.$fileName);
        $save_url = 'upload/customer/'.$fileName;

        Customer::insert([
            'name' => $request->name,
            'customer_image' => $save_url,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }//end method

    public function CustomerEdit($id){
        $customer = Customer::findOrFail($id);
         return view('backend.customer.customer_edit', compact('customer'));
    }//end method

    public function CustomerUpdate(Request $request){
        $customer_id = $request->id;
        if($request->file('customer_image')){
            $image = $request->file('customer_image');
            $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200, 200)->save('upload/customer/'.$fileName);
            $save_url = 'upload/customer/'.$fileName;

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'customer_image' => $save_url,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer update with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);
        }else{

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer update without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);
        }

    }//end method

    public function CustomerDelete($id){

        $customer = Customer::findOrFail($id);
        $img = $customer->customer_image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer delete with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method
}
