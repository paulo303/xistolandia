@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages.users._components.form')
    </form>
@stop
