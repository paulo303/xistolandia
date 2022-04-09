@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('festas.index') }}">Festas</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <form action="{{ route('festas.update', $festa) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.pages.festas._partials.form')
    </form>
@stop
