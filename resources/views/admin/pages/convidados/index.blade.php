@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ route('convidados.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Novo Convidado
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  right text-right">
                    <form action="{{ route('convidados.index') }}" method="get" class="form-inline" style="display: block;">
                        {{-- <div class="form-group" style="display: contents"> --}}
                        <div class="form-group" style="display: inline-flex">
                            <input type="text" name="search" id="search" placeholder="Nome" class="form-control" value="{{ $filters['search'] ?? '' }}">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="patrocinadores" name="patrocinadores" value="1" @if ($filters['patrocinadores'] ?? '') checked @endif>
                                <label for="patrocinadores" class="custom-control-label m-2"> Somente patrocinadores </label>
                            </div>
                            <button type="submit" class="btn btn-dark"> Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Patrocinador</th>
                        <th class="text-center" width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($convidados as $convidado)
                        <tr>
                            <td class="" style="vertical-align: middle;">
                                {{ $convidado->nome }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                {{ $convidado->email }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                {{ $convidado->celular }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                @if ($convidado->patrocinador)
                                    Sim
                                @endif
                            </td>
                            <td style="vertical-align: middle;" class="text-center">
                                <a href="{{ route('convidados.edit', $convidado) }}" class="btn btn-outline-info">Editar</a>
                                <a href="{{ route('convidados.show', $convidado) }}" class="btn btn-outline-warning">Detalhes</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" align="center">Nenhum resultado encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $convidados->appends($filters)->links() }}
            @else
                {{ $convidados->links() }}
            @endif

        </div>
    </div>
@stop
