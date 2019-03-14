<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddtoCart(Request $request)
    {
    	$data = array();
    	$data['id'] = $request->id;
    	$data['name'] = $request->name;
    	$data['qty'] = $request->qty;
    	$data['price'] = $request->price;
    	
    	$add = Cart::add($data);
    	if ($add) {
                 $notification=array(
                 'messege'=>'Product added to the cart',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }    
    }
    public function UpdateCart(Request $request,$rowId)
    {
    	$data = array();
    	$data['qty'] = $request->qty;
    	$update = Cart::update($rowId, $data);
    	if ($update) {
                 $notification=array(
                 'messege'=>'Cart Updated Successfully',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }
    public function RemoveCart($rowId)
    {
    	$remove = Cart::remove($rowId);
    	if ($remove) {
                                    
        }
        else
        {
            $notification=array(
                 'messege'=>'Removed Successfully',
                 'alert-type'=>'success'
                  );
            return Redirect()->back()->with($notification);
        } 
    }
    public function CreateInvoice(Request $request)
    {
    	$validatedData = $request->validate([
	        'customer_id' => 'required',
	        ],[
		        'customer_id.required' => 'Select a Customer First !',
    	  ]);
    	$contents = Cart::content();
    	
    	$customer_id = $request->customer_id;
    	
    	$singleCustomer = DB::table('customers')->where('id',$customer_id)->first();
    	return view('invoice',compact('singleCustomer','contents'));
    }
    public function FinalInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'payment_status' => 'required',
            ],[
                'payment_status.required' => 'Select Your Payment First !',
          ]);

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['subtotal'] = $request->subtotal;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();

        $oddata = array();
        foreach ($contents as $item) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $item->id;
            $oddata['quantity'] = $item->qty;
            $oddata['unitcost'] = $item->price;
            $oddata['total'] = $item->total;

            $insert = DB::table('orderdetails')->insert($oddata);
        }
        if ($insert) {
                 $notification=array(
                 'messege'=>'Successfully invoice Created | Please Deliver The Products and accept status',
                 'alert-type'=>'success'
                  );
                Cart::destroy();
                return Redirect()->route('pending.orders')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
    }
}
