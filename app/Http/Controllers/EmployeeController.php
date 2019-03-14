<?php

namespace App\Http\Controllers;

use App\Employee;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\hashName;

class EmployeeController extends Controller
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
        return view('add_employee');
    }

//INSERT EMPLOYEE
    public function store(Request $request)
    {
        $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|unique:employees|max:255',
	        'nid_no' => 'required|unique:employees|max:255',
	        'address' => 'required',
	        'phone' => 'required|max:13',
	        'photo' => 'required',
	        'salary' => 'required',
    	  ]);

    	$data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['address'] = $request->address;
    	$data['experience'] = $request->experience;
    	$data['nid_no'] = $request->nid_no;
    	$data['salary'] = $request->salary;
    	$data['vacation'] = $request->vacation;
    	$data['city'] = $request->city;
      $image=$request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
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
//ALL EMPLOYEE RETURN HERE
    public function AllEmployee()
    {
        // $allEmployees = Employee::all();
        $allEmployees = DB::table('employees')->get();
        return view('all_employee', compact('allEmployees'));
    }
//VIEW OF SINGLE EMPLOYEE ARE HERE
    public function ViewEmployee($id)
    {
        //$single = Employee::findorfail($id);
      $single = DB::table('employees')
                ->where('id',$id)
                ->first();

      return view('view_employee',compact('single'));
    }
//DELETE A SINGLE EMPLOYEE ARE HERE
    public function DeleteEmployee($id)
    {
        //$single = Employee::findorfail($id);
      $delete = DB::table('employees')
                ->where('id',$id)
                ->first();

      $photo = $delete->photo;
      unlink($photo);

      $dltuser = DB::table('employees')
                ->where('id',$id)
                ->delete();

      if ($dltuser) {
                 $notification=array(
                 'messege'=>'Successfully Employee Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
    }
//EDIT OF EMPLOYEE ARE HERE
    public function EditEmployee($id)
    {
        //$single = Employee::findorfail($id);
      $edit = DB::table('employees')
                ->where('id',$id)
                ->first();

      return view('edit_employee',compact('edit'));
    }
//UPDATE OF A EMPLOYEE ARE HERE
    public function UpdateEmployee(Request $request,$id)
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
      $data['experience'] = $request->experience;
      $data['nid_no'] = $request->nid_no;
      $data['salary'] = $request->salary;
      $data['vacation'] = $request->vacation;
      $data['city'] = $request->city;
      $image=$request->file('photo');
      if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $delete = DB::table('employees')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->photo;
                unlink($photo);
                $employee=DB::table('employees')
                        ->where('id',$id)
                         ->update($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
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
                $employee=DB::table('employees')
                        ->where('id',$id)
                        ->update($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
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
