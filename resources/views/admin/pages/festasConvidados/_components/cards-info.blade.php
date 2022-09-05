<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $festa->total_convidados }}</h3>
                <p>Total de convidados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $festa->total_confirmados }}</h3>
                <p>
                    {{ $festa->porcentagem_confirmados }}% Confirmados
                </p>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar" style="width: {{ $festa->porcentagem_confirmados }}%; background-color: white;"></div>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
            <a href="#" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $festa->total_aguardando_resposta }}</h3>
                <p>
                    {{ $festa->porcentagem_aguardando_resposta }}% Aguardando resposta
                </p>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar" style="width: {{ $festa->porcentagem_aguardando_resposta }}%; background-color: white;"></div>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-user-clock"></i>
            </div>
            <a href="#" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $festa->total_recusados }}</h3>
                <p>
                    {{ $festa->porcentagem_recusados }}% Recusados
                </p>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar" style="width: {{ $festa->porcentagem_recusados }}%; background-color: white;"></div>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-user-times"></i>
            </div>
            <a href="#" class="small-box-footer">
                Mais informações <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
