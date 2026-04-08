@extends('layouts._app') 

@section('title', 'Login') 


@section('content')

<h1 class="text-center mt-5">Register</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf

  <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" name="name" value="{{ old('name') }}">
    <small id="nameHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword2">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
  </div>

  <div class="flex items-center justify-end mt-4">
      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
          {{ __('Already registered?') }}
      </a>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Register</button>
  

</form>

@endsection