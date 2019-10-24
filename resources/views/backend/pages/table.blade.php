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
               </tr>
                </thead>
              
               <tbody>
                 @foreach($employees as $e)
                 <tr>
                 
                  <td>{{$e->name}}</td>
                 <td>{{$e->email}}</td>
                 <td>{{$e->phone}}</td>
                 <td>{{$e->dob}}</td>
               </tr>
                 @endforeach
               </tbody>
                 <tfoot>
            <tr>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Date of Birth</th>
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