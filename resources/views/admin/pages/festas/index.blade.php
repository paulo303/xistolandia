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
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Flyer</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Atrações</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Convidados</th>
                        <th class="text-center">Confirmados</th>
                        <th class="text-center">Não irão</th>
                        <th class="text-center" width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($festas as $festa)
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                @if (isset($festa->flyer))
                                    <a href="{{ url($festa->flyer) }}" target="_blank">
                                        <img src="{{ url($festa->flyer) }}" width="150">
                                    </a>
                                @endif
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                {{ $festa->data_br }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                {{ $festa->atracoes }}
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                0
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                0
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                0
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                0
                            </td>
                            <td class="text-center" style="vertical-align: middle;" class="text-center">
                                @can('update', $festa)
                                <a href="{{ route('festas.edit', $festa) }}" class="btn btn-outline-info">Editar</a>
                                @endcan
                                <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Convidados</a>
                                {{-- <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Line up</a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" align="center">Nenhum resultado encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $festas->links() }}
        </div>
    </div>
@stop
