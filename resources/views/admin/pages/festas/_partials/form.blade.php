<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="atracao">Atração</label>
                    <input type="text" class="form-control" id="atracao" name="atracao" placeholder="Atração" value="{{ $festa->atracao ?? old('atracao') }}">
                    @if ($errors->has('atracao'))
                        <div class="error">{!! $errors->first('atracao') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
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
