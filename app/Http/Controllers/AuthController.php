<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Imageadd;
use Session;

class AuthController extends Controller
{
    public function login(){
        if(Session::has('userid')){
            return redirect()->to('dashboard');
        }
        return view('pages.login');
    }
    public function loginstore(Request $request){
        $email = $request->email;
        $password = $request->password;
        // select * from employees where email='' AND password=''
        $obj = Employee::where('email','=',$email)
                ->where('password','=', md5($password))
                ->first();
        if($obj){
            // echo 'Successfully Logged in';
            Session::put('userid', $obj->id);
            Session::put('username', $obj->name);
            Session::put('userrole', $obj->role);
            return redirect()->to('dashboard');
        }
        else{
           // echo 'Invalid Email or password';
           return redirect()->back()->with('msg', 'Wrong Email or Password');// set msg in session for only once
        }
        
    }
    public function dashboard(){
        return view('pages.dashboard');
    }
    public function logout(){
        Session::flush();
        return redirect()->to('login');
    }
    public function teacher1(){
        return view('pages.teacher1');
    }  
    public function teacher2(){
        return view('pages.teacher2');
    } 
    public function student1(){

        return view('pages.student1');
    }
    public function student2(){

        return view('pages.student2');
    } 
       public function admin(){

        return view('backend.pages.index');
    }

    public function admin_table(){
        $employees=Employee::all();
        return view('backend.pages.table',compact('employees'));
    }  
    public function admin_chart(){

        return view('backend.pages.chart');
    } 

     public function formview(){

        return view('backend.pages.addstudent');
    } 
    public function excel(){

        return view('backend.pages.excel.index');
    }

     public function imageadd(){
        $images = Imageadd::all();
        return view('backend.pages.addimage',compact('images'));
    }
}
