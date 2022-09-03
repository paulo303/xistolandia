@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <form action="{{ route('festas.convidados.store', $festa) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.pages.festasConvidados._components.form')
    </form>
@stop
