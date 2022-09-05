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
                    <button type="submit" form="formAdicionar" class="btn btn-danger btnConvidadoFesta none">
                        <i class="fas fa-trash-alt"></i> Adicionar a uma festa
                    </button>
                </div>
                {{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  right text-right">
                    <form action="{{ route('convidados.index') }}" method="get" class="form-inline" style="display: block;">
                        <div class="form-group" style="display: inline-flex">
                            <input type="text" name="search" id="search" placeholder="Nome" class="form-control" value="{{ $filters['search'] ?? '' }}">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="patrocinadores" name="patrocinadores" value="1" @if ($filters['patrocinadores'] ?? '') checked @endif>
                                <label for="patrocinadores" class="custom-control-label m-2"> Somente patrocinadores </label>
                            </div>
                            <button type="submit" class="btn btn-dark"> Filtrar</button>
                        </div>
                    </form>
                </div> --}}
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
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Celular</th>
                            <th class="text-center">Patrocinador</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('festas.AdicionarConvidados') }}" id="formAdicionar" method="POST" enctype="multipart/form-data">
                            @csrf
                            @forelse ($convidados as $convidado)
                                @include('admin.pages.convidados._components.table-lista')
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum resultado encontrado</td>
                                </tr>
                            @endforelse
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" form="formAdicionar" class="btn btn-danger btnConvidadoFesta none">
                <i class="fas fa-trash-alt"></i> Adicionar a uma festa
            </button>
            {{-- @if (isset($filters))
                {{ $convidados->appends($filters)->links() }}
            @else
                {{ $convidados->links() }}
            @endif --}}

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
                $(".btnConvidadoFesta").show();
            } else {
                $(".btnConvidadoFesta").hide();
            }
        }
    </script>
@stop