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
                    <a href="{{ route('funcoes.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Nova Função
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  right text-right">
                    <form action="{{ route('funcoes.index') }}" method="get" class="form-inline" style="display: block;">
                        <input type="text" name="search" id="search" placeholder="Nome" class="form-control" value="{{ $filters['search'] ?? '' }}">
                        <button type="submit" class="btn btn-dark">Filtrar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="">Nome</th>
                        <th width="">Descrição</th>
                        <th class="text-center" width="30%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.funcoes._partials.table-lista-funcoes')
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $funcoes->appends($filters)->links() }}
            @else
                {{ $funcoes->links() }}
            @endif

        </div>
    </div>
@stop
