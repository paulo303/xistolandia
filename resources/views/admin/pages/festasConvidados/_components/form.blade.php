<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="convidado_id">Convidado</label>
                    <select class="form-control select2" name="convidado_id" multiple>
                        @foreach ($convidados as $convidado)
                            <option value="{{ $convidado->id }}">{{ $convidado->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('convidado_id'))
                        <div class="error">{!! $errors->first('convidado_id') !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Salvar
        </button>
    </div>
</div>
