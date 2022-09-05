<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 right text-right">
    <form action="{{ route(Route::currentRouteName(), $$model) }}" method="get" class="form-inline" style="display: block;">
        @csrf
        <input type="text" name="search" id="search" placeholder="Nome" class="form-control" value="{{ $filters['search'] ?? '' }}">
        <button type="submit" class="btn btn-dark">Filtrar</button>
    </form>
</div>