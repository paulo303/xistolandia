@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin/_breadcrumb')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                @can('create', App\Festa::class)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ route('festas.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Nova Festa
                    </a>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Flyer</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Atrações</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Convidados</th>
                            <th class="text-center">Confirmados</th>
                            <th class="text-center">Não irão</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($festas as $festa)
                            @include('admin.pages.festas._partials.table-lista-festas')
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Nenhum resultado encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $festas->links() }}
        </div>
    </div>
@stop
