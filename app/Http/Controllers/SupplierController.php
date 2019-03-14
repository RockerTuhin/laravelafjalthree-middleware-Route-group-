<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
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
    	return view('add_supplier');
    }
    //INSERT SUPPLIER
    public function Store(Request $request)
    {
    	$validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|unique:suppliers|max:255',
	        'phone' => 'required|unique:suppliers|max:255',
	        'address' => 'required',
	        'photo' => 'required',
	        'city' => 'required',
    	  ]);

    	$data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['address'] = $request->address;
    	$data['shop'] = $request->shop;
    	$data['account_holder'] = $request->account_holder;
    	$data['account_number'] = $request->account_number;
    	$data['bank_name'] = $request->bank_name;
    	$data['branch_name'] = $request->branch_name;
    	$data['city'] = $request->city;
    	$data['type'] = $request->type;
    	

      $image=$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $supplier=DB::table('suppliers')
                         ->insert($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }
//ALL SUPPLIER RETURN HERE
    public function AllSupplier()
    {
    	// $allSupplier = Supplier::all();
    	$allSupplier = DB::table('suppliers')->get();
    	return view('all_supplier',compact('allSupplier'));
    }
//VIEW OF SINGLE SUPPLIER ARE HERE
    public function ViewSupplier($id)
    {
        //$single = Supplier::findorfail($id);
      $single = DB::table('suppliers')
                ->where('id',$id)
                ->first();

      return view('view_supplier',compact('single'));
    }
//DELETE A SINGLE SUPPLIER ARE HERE
    public function DeleteSupplier($id)
    {
        //$single = Customer::findorfail($id);
      $delete = DB::table('suppliers')
                ->where('id',$id)
                ->first();

      $photo = $delete->photo;
      unlink($photo);

      $dltuser = DB::table('suppliers')
                ->where('id',$id)
                ->delete();

      if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
    }
//EDIT OF A SUPPLIER HERE
    public function EditSupplier($id)
    {
        $edit = DB::table('suppliers')->where('id',$id)->first();
        return view('edit_supplier',compact('edit'));
    }
//UPDATE OF A SUPPLIER ARE HERE
    public function UpdateSupplier(Request $request,$id)
    {
        $validatedData = $request->validate([
          'name' => 'required|max:255',
          'email' => 'required|max:255',
          'phone' => 'required|max:255',
          'address' => 'required',
          'city' => 'required',
        ]);

      $data = array();
      $data['name'] = $request->name;
      $data['email'] = $request->email;
      $data['phone'] = $request->phone;
      $data['address'] = $request->address;
      $data['shop'] = $request->shop;
      $data['account_holder'] = $request->account_holder;
      $data['account_number'] = $request->account_number;
      $data['bank_name'] = $request->bank_name;
      $data['branch_name'] = $request->branch_name;
      $data['city'] = $request->city;
      $data['type'] = $request->type;
      $image=$request->photo;
      if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $delete = DB::table('suppliers')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->photo;
                unlink($photo);
                $supplier=DB::table('suppliers')
                        ->where('id',$id)
                         ->update($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
              
            }
        }else{
            $old_photo=$request->old_photo;
            if ($old_photo) {
                $data['photo']=$old_photo;
                $supplier=DB::table('suppliers')
                        ->where('id',$id)
                        ->update($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }
        }

    }
}
