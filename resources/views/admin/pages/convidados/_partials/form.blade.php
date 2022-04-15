<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo e/ou apelido" value="{{ $convidado->nome ?? old('nome') }}">
                    @if ($errors->has('nome'))
                        <div class="error">{!! $errors->first('nome') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ $convidado->email ?? old('email') }}">
                    @if ($errors->has('email'))
                        <div class="error">{!! $errors->first('email') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="{{ $convidado->celular ?? old('celular') }}">
                    @if ($errors->has('celular'))
                        <div class="error">{!! $errors->first('celular') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="patrocinador" name="patrocinador" value="1" @if (isset($convidado) && $convidado->patrocinador) checked @endif }}">
                    <label class="form-check-label" for="patrocinador">Patrocinador</label>
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
