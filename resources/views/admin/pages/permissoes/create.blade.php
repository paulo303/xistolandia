@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <form action="{{ route('permissoes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages.permissoes._components.form')
    </form>
@stop
