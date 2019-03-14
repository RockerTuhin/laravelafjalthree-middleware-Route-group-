<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
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
    public function index()
    {
		$allProduct = DB::table('products')
			    	  ->join('categories','products.category_id','categories.id')
			    	  ->select('products.*','categories.category_name')
			    	  ->get();
		$allCustomer = DB::table('customers')->get();
		$allCategory = DB::table('categories')->get();
    	return view('pos',compact('allProduct','allCustomer','allCategory'));
    }
    public function PendingOrders()
    {
        $pendingOrders = DB::table('orders')
                         ->where('order_status','pending')
                         ->join('customers','orders.customer_id','customers.id')
                         ->select('orders.*','customers.name')
                         ->get();

        return view('pending_orders')->with('pendingOrders',$pendingOrders);
    }
    public function ViewOrder($id)
    {
        $order = DB::table('orders')
                 ->where('orders.id',$id)
                 ->join('customers','orders.customer_id','customers.id')
                 ->select('orders.*','customers.name','customers.address','customers.city','customers.shopname','customers.phone')
                 ->first();

        $order_details = DB::table('orderdetails')
                         ->join('products','orderdetails.product_id','products.id')
                         ->select('orderdetails.*','products.product_name','products.product_code')
                         ->where('order_id',$id)
                         ->get();

        return view('order_confirmation')->with(['order'=>$order,'order_details'=>$order_details]);
    }
    public function OrderSuccess($id)
    {
        $approve = DB::table('orders')->where('id',$id)->update(['order_status'=>'Success']);
        if ($approve) {
                 $notification=array(
                 'messege'=>'Successfully Order Completed | All Products Delivered',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('pending.orders')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }   
    }
    public function SucceedOrders()
    {
        $succeedOrders = DB::table('orders')
                         ->where('order_status','success')
                         ->join('customers','orders.customer_id','customers.id')
                         ->select('orders.*','customers.name')
                         ->get();

        return view('succeed_orders')->with('succeedOrders',$succeedOrders);
    }

}
