@extends('backend.layouts.master')
@section('content')
<div class="container">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Import &  export excel file into database </strong></h3>
		  </div>
		  <div class="panel-body">

          @include('backend.partials.message')
				<h3>Import File Form:</h3>
				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('admin/import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


					<input type="file" name="import_file" />
					{{ csrf_field() }}
					<br/>


					<button class="btn btn-primary">Import Excel File</button>


				</form>
				<br/>


		    	<h3>Export File From Database:</h3>
		    	<div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">
			    	<a href="{{ URL::to('admin/exceldownload/1') }}"><button class="btn btn-success btn-lg">Download Student Excel Excel xlsx</button></a>
					<a href="{{ URL::to('admin/exceldownload/2') }}"><button class="btn btn-success btn-lg">Download Teacher Excel xlsx</button></a>
					<a href="{{ URL::to('admin/exceldownload/3') }}"><button class="btn btn-success btn-lg">Download Admin Excel xlsx</button></a>
		    	</div>


		  </div>
		</div>
	</div>

  @endsection
