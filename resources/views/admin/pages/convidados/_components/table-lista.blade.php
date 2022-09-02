<tr>
    <td class="text-center" style="vertical-align: middle;">
        {{ $convidado->nome }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $convidado->email }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $convidado->celular }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        @if ($convidado->patrocinador)
            Sim
        @endif
    </td>
    <td class="text-center" style="vertical-align: middle;" >
        <a href="{{ route('convidados.edit', $convidado) }}" class="btn btn-outline-info">Editar</a>
        {{-- <a href="{{ route('convidados.show', $convidado) }}" class="btn btn-outline-warning">Detalhes</a> --}}
    </td>
</tr>
