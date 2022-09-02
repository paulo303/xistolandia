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
    <div class="col-md-12"><h1>Convidados</h1></div>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ route('festas.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Adicionar convidado
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Flyer enviado</th>
                        <th class="text-center" width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($festa->convidados as $convidado)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                {{ $convidado->nome }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                0
                            </td>
                            <td class="text-center" style="vertical-align: middle;" class="text-center">
                                <a href="{{ route('festas.edit', $festa) }}" class="btn btn-outline-info">Alterar Status</a>
                                <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Remover</a>
                            </td>
                        </tr>
                    @empty --}}
                        <tr>
                            <td colspan="8" align="center">Nenhum resultado encontrado</td>
                        </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- {{ $festas->links() }} --}}
        </div>
    </div>
@stop
