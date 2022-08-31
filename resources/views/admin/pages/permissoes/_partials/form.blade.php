<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-12">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $permissao->nome ?? old('nome') }}">
                @if ($errors->has('nome'))
                    <div class="error">{!! $errors->first('nome') !!}</div>
                @endif
            </div>
            <div class="form-group col-12">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="descricao" value="{{ $permissao->descricao ?? old('descricao') }}">
                @if ($errors->has('descricao'))
                    <div class="error">{!! $errors->first('descricao') !!}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Salvar
        </button>
    </div>
</div>
