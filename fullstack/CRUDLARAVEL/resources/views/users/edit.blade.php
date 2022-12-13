@extends('users.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-5">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right mt-4">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
        All fields are mandatory.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mg 3">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
        </div>
   
    </form>
@endsection