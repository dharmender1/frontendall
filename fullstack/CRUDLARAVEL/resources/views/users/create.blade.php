
@extends('users.layout')
  @section('content')
  <div class="row">
      <div class="col-lg-12 margin-tb mt-5">
          <div class="pull-left">
              <h2>Create New User</h2>
          </div>
          <div class="pull-right mt-4">
              <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
          </div>
      </div>
  </div>
     
  @if ($errors->any())
      <div class="alert alert-danger mt-3">
          All fields are mandatory.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
     
  <form action="{{ route('users.store') }}" method="POST">
      @csrf
    
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>email:</strong>
                  <input type="text" class="form-control" name="email" placeholder="Email">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Password:</strong>
                  <input type="password" name="password" class="form-control" placeholder="********">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
  </form>
  @endsection