@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <form action="{{ route('djs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages.djs._partials.form')
    </form>
@stop
