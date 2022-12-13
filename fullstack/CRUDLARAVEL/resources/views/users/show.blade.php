
@extends('users.layout')
  @section('content')
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left mt-5">
                  <h2> Show User</h2>
              </div>
              <div class="pull-right mt-4">
                  <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
              </div>
          </div>
      </div>
     
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered mt-5">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
            </table>
          </div>
      </div>
  @endsection