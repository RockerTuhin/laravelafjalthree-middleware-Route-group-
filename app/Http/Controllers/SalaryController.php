<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
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
    public function AddAdvancedSalary()
    {
    	return view('add_advanced_salary');
    }
    public function InsertAdvancedSalary(Request $request)
    {
    	$month = $request->month;
    	$year = $request->year;
    	$employee_id = $request->employee_id;
    	$paidOrNot = DB::table('advance_salaries')
    				 ->where('month',$month)
    				 ->where('year',$year)
    				 ->where('employee_id',$employee_id)
    				 ->first();
    	if($paidOrNot === NULL)
    	{
    		$data = array();
    		$data['employee_id'] = $request->employee_id;
    		$data['month'] = $request->month;
    		$data['year'] = $request->year;
    		$data['advanced_salary'] = $request->advanced_salary;

    		$adavnceSalary = DB::table('advance_salaries')->insert($data);

    		if ($adavnceSalary) {
    			$notification=array(
    				'messege'=>'Successfully Advanced Paid ',
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
    	else
    	{
    		$notification=array(
    				'messege'=>'Oops!! Already advance  paid in this month',
    				'alert-type'=>'error'
    			);
    			return Redirect()->back()->with($notification);
    	}
    }
    public function AllAdvancedSalary()
    {
    	$allAdvancedSalary = DB::table('advance_salaries')
    					     ->join('employees','advance_salaries.employee_id','employees.id')
    					     ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
    					     ->orderBy('employees.id','DESC')
    					     ->get();
    	return view('all_advanced_salary',compact('allAdvancedSalary'));
    }
    public function PaySalary()
    {
  //   	$month = date("F",strtotime('-1 month'));
    	
		// $salary  = DB::table('advance_salaries')
		//     	   ->join('employees','advance_salaries.employee_id','employees.id')
		//     	   ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
		//     	   ->where('advance_salaries.month',$month)
		//     	   ->get();
		// echo "<pre>";
  //   	print_r($salary);
    	$allEmployee = DB::table('employees')->get();
    	return view('pay_salary',compact("allEmployee"));
    }
}
