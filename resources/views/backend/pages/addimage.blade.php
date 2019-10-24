@extends('backend.layouts.master')
@section('content')
<div class="col-md-8">
        <div class="card">
          <div class="card-header">Image  Add</div>

          <div class="card-body">
            @include('backend.partials.message')
         <form method="post" action="{{ route('student.photo.add') }}" enctype="multipart/form-data">
          {{csrf_field()}}

        <div class="input-group control-group increment" >
          <input type="file" name="filename[]" class="form-control" multiple required>
          
        </div>
    

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>  
  <br>

 <div class="control-group">
  @foreach($images as $i)
 
    <img src="{{ asset('image/'.$i->filename) }}" width="200" height="100"> <br>
 
  @endforeach      
  </div>
  </div>
        </div>
      </div>
@endsection
