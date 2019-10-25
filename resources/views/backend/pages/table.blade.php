@extends('backend.layouts.master')
@section('content')
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
               <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Date of Birth</th>
                 <th>Action</th>
               </tr>
                </thead>

               <tbody>
                 @foreach($employees as $e)
                 <tr>

                  <td>{{$e->name}}</td>
                 <td>{{$e->email}}</td>
                 <td>{{$e->phone}}</td>
                 <td>{{$e->dob}}</td>
                 <td><a href="{{ route('edit',$e->id) }}" class="btn btn-success">Edit</a>
                             <a href="#deleteModal{{ $e->id }}" data-toggle="modal" class="btn btn-danger">Delete</a></td>
               </tr>

                                   <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $e->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete!!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                       <div class="modal-body">
                         <form action="{{ route('delete',$e->id) }}"  method="post">
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
                 @endforeach
               </tbody>
                 <tfoot>
            <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Date of Birth</th>
                 <td>Action</td>

            </tr>
        </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

    <!-- /.content-wrapper -->



@endsection
