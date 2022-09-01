<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $permissao->nome ?? old('nome') }}">
                    @if ($errors->has('nome'))
                        <div class="error">{!! $errors->first('nome') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-5">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="descricao" value="{{ $permissao->descricao ?? old('descricao') }}">
                    @if ($errors->has('descricao'))
                        <div class="error">{!! $errors->first('descricao') !!}</div>
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
