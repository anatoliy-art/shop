@extends('admin.layouts.app') 

@section('title', 'Admin Index') 


@section('content')

<div class="col-12">

<h1>Welcome "{{ Auth::user()->name }}" Admin Zone</h1>

</div>


@endsection