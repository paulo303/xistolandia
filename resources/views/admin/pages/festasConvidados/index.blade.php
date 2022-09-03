@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $festa->total_convidados }}</h3>
                    <p>Total de convidados</p>
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
                    <h3>{{ $festa->total_confirmados }}</h3>
                    <p>
                        {{ $festa->porcentagem_confirmados }}% Confirmados
                    </p>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar" style="width: {{ $festa->porcentagem_confirmados }}%; background-color: white;"></div>
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
                    <h3>{{ $festa->total_aguardando_resposta }}</h3>
                    <p>
                        {{ $festa->porcentagem_aguardando_resposta }}% Aguardando resposta
                    </p>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar" style="width: {{ $festa->porcentagem_aguardando_resposta }}%; background-color: white;"></div>
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
                    <h3>{{ $festa->total_recusados }}</h3>
                    <p>
                        {{ $festa->porcentagem_recusados }}% Recusados
                    </p>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar" style="width: {{ $festa->porcentagem_recusados }}%; background-color: white;"></div>
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
    <div class="col-md-12"><h1>Convidados</h1></div>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ route('festas.convidados.create', $festa) }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Adicionar convidado
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 right text-right">
                    <form action="{{ route('festas.convidados.index', $festa) }}" method="get" class="form-inline" style="display: block;">
                        <input type="text" name="search" id="search" placeholder="Nome" class="form-control" value="{{ $filters['search'] ?? '' }}">
                        <button type="submit" class="btn btn-dark">Filtrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Flyer enviado</th>
                            <th class="text-center" width="300">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($festa->convidados as $convidado)
                            @include('admin.pages.festasConvidados._components.table-lista')
                        @empty
                            <tr>
                                <td colspan="4" align="center">Nenhum resultado encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $convidados->links() }}
        </div>
    </div>
@stop
