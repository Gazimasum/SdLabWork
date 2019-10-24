@extends('backend.layouts.master')
@section('content')

<div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            @include('backend.partials.message')
            <form method="POST" action="{{ route('student.add') }}">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                  @if ($errors->has('name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="salary" class="col-md-4 col-form-label text-md-right">salary</label>

                <div class="col-md-6">
                  <input id="salary" type="number" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" required autofocus>

                  @if ($errors->has('salary'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('salary') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone No</label>

                <div class="col-md-6">
                  <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" required>

                  @if ($errors->has('phone_no'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div> 

              <div class="form-group row">
                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                <div class="col-md-6">
                  <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>

                  @if ($errors->has('dob'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

            
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

@endsection