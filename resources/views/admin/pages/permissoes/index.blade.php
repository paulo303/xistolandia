@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                        <a href="{{ route('permissoes.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Nova permissão
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 right text-right">
                        <form action="{{ route('permissoes.index') }}" method="get" class="form-inline" style="display: block;">
                            <input type="text" name="search" id="search" placeholder="Nome" class="form-control" value="{{ $filters['search'] ?? '' }}">
                            <button type="submit" class="btn btn-dark">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissoes as $permissao)
                            @include('admin.pages.permissoes._partials.table-lista-permissoes')
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhum resultado encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $permissoes->appends($filters)->links() }}
            @else
                {{ $permissoes->links() }}
            @endif

        </div>
    </div>
@stop
