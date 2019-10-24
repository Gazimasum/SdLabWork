<!DOCTYPE html>
<html>
<head>
  <title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container"style="margin-top: 40px;">
<div class="col-md-12 center">
<form  action="{{route('add')}}" method="POST">
  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control requiredField" name="name" placeholder="Enter name" value="{{ old('name') }}">
  </div>
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror 

 <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
  </div>
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="number" class="form-control" name="phone_no" placeholder="Enter Phone" value="{{ old('phone_no') }}">
  </div>
  @error('phone_no')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror 

 <div class="form-group">
    <label for="exampleInputEmail1">Salary</label>
    <input type="number" class="form-control" name="salary"placeholder="Enter salary"  value="{{ old('salary') }}">
  </div>
  @error('salary')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  name="password" placeholder="Password"  value="{{ old('password') }}">
  </div>

    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{--   <div class="form-group required">
     <label for="id_password2" class="control-label col-md-4  requiredField"> Re:password<span class="asteriskField">*</span> </label>
   
        <input class="form-control" name="ConfirmPassword" placeholder="Confirm your password"
       type="password" /></div> --}}
   {{-- 
     @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror --}}

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
 </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
