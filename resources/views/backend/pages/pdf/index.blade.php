@extends('backend.layouts.master')
@section('content')
<div class="container" style="margin-top: 50px;">
  <div class="col-md-12">
	<table id="mytable"class="table">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Salary</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($employees as $employee)
    <tr>

      <td><a href="{{route('admin.employee.pdf',$employee->id)}}">{{$employee->name}}</a></td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->dob}}</td>
      <td>{{$employee->salary}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
</div>

@endsection
