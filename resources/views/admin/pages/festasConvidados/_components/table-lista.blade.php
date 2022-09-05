<tr>
    <td class="td-lista-center">
        <input type="checkbox" name="convidados[]" value="{{ $convidado->id }}" class="form-control checkboxConvidados">
    </td>
    <td class="td-lista-center">
        {{ $convidado->nome }}
    </td>
    <td class="td-lista-center">
        {{ $convidado->status->nome }}
    </td>
    {{-- <td class="td-lista-center">
        
    </td> --}}
    {{-- <td class="td-lista-center">
        <a href="{{ route('festas.edit', $festa) }}" class="btn btn-outline-info">Alterar Status</a>
        <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Remover</a>
    </td> --}}
</tr>