<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" value="{{ $user->name ?? old('name') }}">
                    @if ($errors->has('name'))
                        <div class="error">{!! $errors->first('name') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ $user->email ?? old('email') }}">
                    @if ($errors->has('email'))
                        <div class="error">{!! $errors->first('email') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="">
                    @if ($errors->has('password'))
                        <div class="error">{!! $errors->first('password') !!}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                <div class="form-group">
                    <label class="form-label" for="funcao_id">Função</label>
                    <select class="form-control" name="funcao_id">
                        @foreach ($funcoes as $funcao)
                            <option value="{{ $funcao->id }}" @selected(isset($user->funcao_id) && $funcao->id == $user->funcao_id)>{{ $funcao->nome }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('funcao_id'))
                        <div class="error">{!! $errors->first('funcao_id') !!}</div>
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
