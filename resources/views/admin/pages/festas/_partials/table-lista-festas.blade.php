<tr>
    <td class="text-center" style="vertical-align: middle;">
        @if (isset($festa->flyer))
            <a href="{{ url($festa->flyer) }}" target="_blank">
                <img src="{{ url($festa->flyer) }}" width="150">
            </a>
        @endif
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $festa->data_br }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $festa->atracoes }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        0
    </td>
    <td class="text-center" style="vertical-align: middle;">
        0
    </td>
    <td class="text-center" style="vertical-align: middle;">
        0
    </td>
    <td class="text-center" style="vertical-align: middle;">
        0
    </td>
    <td class="text-center" style="vertical-align: middle;">
        @can('update', $festa)
        <a href="{{ route('festas.edit', $festa) }}" class="btn btn-outline-info">Editar</a>
        @endcan
        <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Convidados</a>
        {{-- <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Line up</a> --}}
    </td>
</tr>
