<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                @if(isset($caminhos))
                    @foreach($caminhos as $caminho)
                        @if($caminho['url'])
                            <li class="breadcrumb-item"><a href="{{$caminho['url']}}">{{$caminho['titulo']}}</a></li>
                        @else
                        <li class="breadcrumb-item"> {{$caminho['titulo']}}</li>
                        @endif
                    @endforeach
                @else
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
            </ol>
        </div>
    </div>
</div>
