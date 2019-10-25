<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Imageadd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Exports\StudentExport;
use App\Exports\TeacherExport;
use App\Exports\AdminExport;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use PDF;
use Db;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id','asc')->get();
    return view('alllist')->with('employees',$employees);
    }


     protected function validator(array $data)
  {
    return Validator::make($data, [
        'name' => 'required|unique:employees|max:15',
        'address' => 'required|max:255',
        'dob' => 'required|date',
        'email' => 'required|unique:employees|email',
        'salary' => 'numeric|min:1000|max:20000',
         'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
         'phone_no'=>'required|min:11|max:13',
    ]);

  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employee = Employee::create([
              'name' => $request->name,
                'salary'=>$request->salary,
                  'phone_no' => $request->phone_no,
                  'dob'=> $request->dob,
                  'email' => $request->email,
                  'role' => 'student',
                  'password' => Hash::make($request->password),

    ]);
          session()->flash('success', 'Student Add Successfully');
        return redirect('/admin/addstudentform');;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
      'name' => 'required|unique:employees|max:15',
        'dob' => 'required|date',
        'email' => 'required|unique:employees|email',
        'salary' => 'numeric|min:1000|max:20000',
         'password' => 'required|confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
         'phone_no'=>'required|min:11|max:13',
    ],
[
'password.regex'  => 'Password must be one uppercase & lowercase and one number',
]);

         $employee=new Employee;
         $employee->name=$request->name;
         $employee->email=$request->email;
         $employee->salary=$request->salary;
         $employee->dob=$request->dob;
         $employee->phone=$request->phone_no;
         $employee->role='student';
         $employee->password= Hash::make($request->password);
         $employee->save();
        session()->flash('success', 'Student Add Successfully');
        return redirect('/admin/addstudentform');;



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
    return view('edit')->with('employee',$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::find($id);
         $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->salary=$request->salary;
        $employee->dob=$request->dob;
         $employee->update();
          return redirect()->route('alllist');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

     public function delete($id){
    $employee=Employee::find($id);
    if (!Is_null($employee)) {
      $employee->delete();
    }

    return back();
  }


  public function addphoto(Request $request)
  {
    $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $image)
            {

                $name=time().".".$image->getClientOriginalName();
                $image->move(public_path().'/image/', $name);
                 $form= new Imageadd();
              $form->filename=$name;
              $form->save();
            }
         }





         session()->flash('success', 'Image Add Successfully');
         return back();
  }

  public function export($id)
  {if ($id==1) {
      return Excel::download(new StudentExport, 'student.xlsx');
  }
  if ($id==2) {
      return Excel::download(new TeacherExport, 'teacher.xlsx');
  }
  if ($id==3) {
      return Excel::download(new AdminExport, 'admin.xlsx');
  }

  }

  public function import(Request $request)
  {
        Excel::import(new DataImport,$request->file('import_file'));

        session()->flash('success', 'Data Add Successfully');
        return back();
      }


      //pdf

      public function pdfindex()
      {
          $employees = Employee::all();
       return view('backend.pages.pdf.index', compact('employees'));
      }

      public function generateInvoice($id)
      {
        $image = Imageadd::find(1);
        $employee = Employee::find($id);

        //return view('backend.pages.orders.invoice', compact('order'));

        $pdf = PDF::loadView('backend.pages.pdf.pdf', compact('employee','image'));

        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
      }

}
