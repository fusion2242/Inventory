<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Session;

class EmployeeController extends Controller
{
    function viewaddemployee()
    {
    	return view('employee.add');
    }
    function viewmanageemployee()
    {
    	return view('employee.manage');
    }
    function add_emp()
    {

        $_POST['_token'] = $_POST['_token'];
    	DB::table('employee')->insert(
    ['employee_name' => $_POST['name'],'employee_user' => $_POST['username'],'employee_email' => $_POST['email'],'employee_password' => $_POST['pass'],'employee_type' => $_POST['emp_type'],'employee_phone' => $_POST['phone'],'date' => $_POST['created_on'],'comments' => $_POST['comments']]);
        redirect('/employee');
      Session::flash('success', 'Employee added successfully');
        
    }
    
    function get_employee()
    {
       $employee = DB::table('employee')->get();
        return view('employee.manage',['emp' => $employee]);
    }
    function update_emp($id)
    {
       $emp = DB::table('employee')->where('id',$id)->get();
       echo json_encode($emp);


    }
      function submit_up_data($id)
    { 

    $_POST['_token'] = $_POST['_token'];
    DB::table('employee')
            ->where('id', $id)
            ->update(['employee_name' => $_POST['employee_name'],'employee_user' => $_POST['employee_user'],'employee_email' => $_POST['employee_email'],'employee_phone' => $_POST['employee_phone']]);
      Session::flash('updated','Employee updated successfully!');    

   


    }
    function deleteemployee($id)
    {
        DB::table('employee')->delete($id);
        Session::flash('deleted','Employee deleted successfully!');
        return redirect('/employee/get');
    }

}