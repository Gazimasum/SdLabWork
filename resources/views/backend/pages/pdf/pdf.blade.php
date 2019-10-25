<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Invoice - {{ $employee->id }}</title>
  </head>

  <style media="screen">
  .content-wrapper{
 background: #FFF;
}

.invoice-right-top h3 {
 padding-right: 20px;
 margin-top: 20px;
 color: #ec5d01;
 font-size: 55px!important;
 font-family: serif;
}
.invoice-left-top {
 border-left: 4px solid #ec5d00;
 padding-left: 20px;
 padding-top: 20px;
}
thead {
     background: #ec5d01;
     color: #FFF;
 }

 .authority h5 {
     margin-top: -10px;
     color: #ec5d01;
     /*text-align: center;*/
 }
 .thanks h4 {
     color: #ec5d01;
     font-size: 25px;
     font-weight: normal;
     font-family: serif;
     margin-top: 20px;
 }
 .site-address p {
       line-height: 6px;
       font-weight: 300;
   }

  </style>
  <body>
    <div class="content-wrapper">


  <div class="invoice-description">
        <div class="invoice-left-top float-left">
          <h6>PDF</h6>
           <h3>{{ $employee->name }}</h3>
           <div class="address">
                <p>Email: <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
                <p>Phone: {{ $employee->phone }}</p>
                <p>Birth Day: {{ $employee->dob }}</p>
            <p>
            Salary: {{ $employee->salary }}  </p>



           </div>
        </div>
        <div class="invoice-right-top float-right">
          {{-- <img src="{{ asset('image/'.$image->filename)}}" alt=""> --}}
          <h3>Invoice #{{ $employee->id }}</h3>
           <p>
             {{ $employee->created_at }}
           </p>
        </div>
        <div class="clearfix"></div>
      </div>


  </body>
</html>
