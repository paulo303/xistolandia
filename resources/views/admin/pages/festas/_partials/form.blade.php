<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Data</label>
                    <input type="date" class="form-control" id="data" name="data" value="{{ $festa->data ?? old('data') }}" required>
                    @if ($errors->has('data'))
                        <div class="error">{!! $errors->first('data') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="atracoes">Atrações</label>
                    <input type="text" class="form-control" id="atracoes" name="atracoes" placeholder="Atrações" value="{{ $festa->atracoes ?? old('atracoes') }}">
                    @if ($errors->has('atracoes'))
                        <div class="error">{!! $errors->first('atracoes') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="flyer">Flyer</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="flyer" name="flyer" value="{{ old('flyer') }}">
                            <label class="custom-file-label" for="flyer">Escolher arquivo</label>
                        </div>
                    </div>
                    @if ($errors->has('flyer'))
                        <div class="error">{!! $errors->first('flyer') !!}</div>
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
