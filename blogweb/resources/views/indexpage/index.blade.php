@extends('layouts.adminindex')

@section('feed')
   @include('posts.index')
@endsection

@section('sidebar')
    @include('layouts.adminsidebar')
@endsection
