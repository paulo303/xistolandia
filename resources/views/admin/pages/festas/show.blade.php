@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('festas.index') }}">Festas</a></li>
                    <li class="breadcrumb-item active">Informações</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Total na lista</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>100</h3>
                        <p>
                            70% Confirmados
                        </p>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar" style="width: 70%; background-color: white;"></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>150</h3>
                        <p>
                            70% Convidados
                        </p>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar" style="width: 70%; background-color: white;"></div>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>50</h3>
                        <p>
                            70% Não vão
                        </p>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar" style="width: 70%; background-color: white;"></div>
                        </div>
                    </div>
                    <div class="icon">
                        {{-- <i class="fas fa-times"></i> --}}
                        <i class="fas fa-user-times"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
        {{-- <div class="col-12 col-md-6 col-md-6 col-lg-6 col-xl-4 text-center">
                <h1>
                    {{ $festa->name }}
                </h1>
                @if ($festa->logo)
                    <p>
                        <a href="{{ url("{$festa->logo}") }}" target="_blank">
                            <img src="{{ url("{$festa->logo}") }}" alt="{{ $festa->name }}" width="250">
                        </a>
                    </p>
                @else
                    <p>
                        <img src="{{ url('images/no-image.jpg') }}" alt="{{ $festa->name }}" width="250">
                    </p>
                @endif

                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <b>Releases cadastrados</b> <a class="float-right">{{ $festa->releases->count() }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Pedidos feitos</b> <a class="float-right">0</a>
                    </li>
                </ul>
                <a href="{{ route('festas.edit', $festa->url) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
            </div> --}}
    </div>
@stop
