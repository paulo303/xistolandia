@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">DJs</li>
                </ol>
            </div>
        </div>
    </div>
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
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="">Nome</th>
                        <th class="text-center" width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($djs as $dj)
                        <tr>
                            <td class="" style="vertical-align: middle;">
                                {{ $dj->nome }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;" class="text-center">
                                <a href="{{ route('djs.edit', $dj) }}" class="btn btn-outline-info">Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" align="center">Nenhum resultado encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $djs->links() }}
        </div>
    </div>
@stop
