<!DOCTYPE html>
<html>
<head>
	<title></title>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#myTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#myTable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
          if (that !== 'action') { 
 
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
             that
                    .search( this.value )
                    .draw();}
            
        } );  }
    } );
} );
  </script>
</head>
<body>
<div class="container" style="margin-top: 50px;">
  <div class="col-md-12">
	<table id="myTable"class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($employees as $employee)
    <tr>
     
      <td>{{$employee->name}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->dob}}</td>
      <td>{{$employee->salary}}</td>
      <td><a href="{{ route('edit',$employee->id) }}" class="btn btn-success">Edit</a>
                  <a href="#deleteModal{{ $employee->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                          <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete!!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('delete',$employee->id) }}"  method="post">
                                  {{ csrf_field() }}
 								 <button type="submit" class="btn btn-danger" >Delete</button>


                                </form>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
</td>
    </tr>
  @endforeach
  <tfoot> <tr>  <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th> 
       </tr></tfoot>
  </tbody>
</table>
</div>
</div>
</body>
</html>