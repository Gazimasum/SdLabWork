<!DOCTYPE html>
<html>
<head>
  <title></title>
     <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container">
  <div class="row">
 

<form class="form-horizontal" action="{{route('update',$employee->id)}}" method="POST">
  @csrf
  <fieldset>
    <div id="legend">
      <legend class="">Edit</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Name</label>
      <div class="controls">
        <input type="text" id="username" value="{{$employee->name}}" name="name" placeholder="" class="input-xlarge">
       
      </div>
    </div>
 

     <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="dob">Date Of Birth</label>
      <div class="controls">
        <input type="date" id="dob" name="dob" value="{{$employee->dob}}"placeholder="" class="input-xlarge">
        
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" value="{{$employee->email}}" name="email" placeholder="" class="input-xlarge">
        
      </div>
    </div> 

 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="salary">Salary</label>
      <div class="controls">
        <input type="number" id="salary" name="salary" placeholder="" value="{{$employee->salary}}" class="input-xlarge">
       
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Update</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
</div>
</body>
</html>