@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('djs.index') }}">DJs</a></li>
                    <li class="breadcrumb-item active">Editar <strong>{{ $dj->nome}}</strong></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <form action="{{ route('djs.update', $dj) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.pages.djs._partials.form')
    </form>
@stop
