@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    &nbsp;
    {{-- @include('admin/_breadcrumb') --}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Dashboard</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-12">
                <p>Informações relevantes virão nesta página.</p>
            </div>
        </div>
    </div>
@stop
