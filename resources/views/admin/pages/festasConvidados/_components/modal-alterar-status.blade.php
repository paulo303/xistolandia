<div class="modal fade" id="modalAlterarStatus" tabindex="-1" role="dialog" aria-labelledby="modalAlterarStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAlterarStatusLabel">Alterar status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{ route('festas.convidados.alterar-status-convidados', $festa) }}" id="formAlterarStatus" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="status" class="col-form-label">Alterar status dos selecionados para:</label>
                            <select name="status" id="status" class="form-control">
                                @foreach ($listaStatus as $status)
                                    <option value="{{ $status->id }}">{{ $status->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="convidados_id" id="convidados_id">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="btnSalvarAlterarStatus">Salvar</button>
            </div>
        </div>
    </div>
</div>
