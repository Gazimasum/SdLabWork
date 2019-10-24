
@extends('backend.layouts.master')
@section('content')
<div class="container">
	
	<ul>
		<li> <a href="{{ URL::to('admin/exceldownload/1') }}">Student Details Export in Excel file</a></li>
		<li> <a href="{{ URL::to('admin/exceldownload/2') }}">Teacher Details Export in Excel</li>
		<li> <a href="{{ URL::to('admin/exceldownload/3') }}">Admin Details Export in Excel</li>
	</ul>
</div>

@endsection