@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <form action="{{ route('funcoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages.funcoes._components.form')
    </form>
@stop
