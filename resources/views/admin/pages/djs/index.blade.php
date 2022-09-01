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
                    <a href="{{ route('djs.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Novo DJ
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($djs as $dj)
                            @include('admin.pages.djs._partials.table-lista-djs')
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">Nenhum resultado encontrado</td>
                            </tr>
                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $djs->links() }}
        </div>
    </div>
@stop
