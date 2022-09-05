@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <div class="text-center" style="background-color: #454d55">
        @if (isset($festa->flyer))
        <a href="{{ url($festa->flyer) }}" target="_blank">
            <img src="{{ url($festa->flyer) }}" width="200">
        </a>
        @endif
    </div>
    @include('admin/_breadcrumb')
@stop

@section('content')
    <div>
        @include('admin.pages.festasConvidados._components.cards-info')
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ route('festas.convidados.create', $festa) }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Adicionar convidado
                    </a>
                    <button type="submit" form="formRemover" class="btn btn-danger btnRemoverConvidado none">
                        <i class="fas fa-trash-alt"></i> Remover selecionados
                    </button>
                    <button type="button" form="formRemover" class="btn btn-warning btnAlterarStatus none">
                        <i class="fas fa-info"></i> Alterar status dos selecionados
                    </button>
                </div>
                {{-- @include('admin.includes._filter') --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">
                                @if (count($convidados) > 0)
                                    <input type="checkbox" id="selecionarTodos" value="selecionarTodos" class="form-control">
                                @endif
                            </th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Status</th>
                            {{-- <th class="text-center">Flyer enviado</th> --}}
                            {{-- <th class="text-center" width="300">Ações</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('festas.convidados.removerConvidados', $festa) }}" id="formRemover" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            @forelse ($convidados as $convidado)
                                @include('admin.pages.festasConvidados._components.table-lista')
                            @empty
                                <tr>
                                    <td colspan="4" align="center">Nenhum resultado encontrado</td>
                                </tr>
                            @endforelse
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" form="formRemover" class="btn btn-danger btnRemoverConvidado none">
                <i class="fas fa-trash-alt"></i> Remover selecionados
            </button>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.checkboxConvidados').click(function(e) {
            checaSeTemConvidadoSelecionado()
        });
        $("#selecionarTodos").click(function(e) {
            $('.checkboxConvidados').prop('checked', this.checked);
            checaSeTemConvidadoSelecionado()
        });

        function checaSeTemConvidadoSelecionado() {
            if ($(".checkboxConvidados").is(':checked')) {
                $(".btnRemoverConvidado").show();
                $(".btnAlterarStatus").show();
            } else {
                $(".btnRemoverConvidado").hide();
                $(".btnAlterarStatus").hide();
            }
        }
    </script>
@stop
