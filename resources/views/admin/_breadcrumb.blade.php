<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                @if(isset($breadcrumb))
                    @foreach($breadcrumb as $item)
                        @if($item['url'])
                            <li class="breadcrumb-item"><a href="{{$item['url']}}">{{$item['titulo']}}</a></li>
                        @else
                        <li class="breadcrumb-item"> {{$item['titulo']}}</li>
                        @endif
                    @endforeach
                @else
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Admin</a></li>
                @endif
            </ol>
        </div>
    </div>
</div>
