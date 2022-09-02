<tr>
    <td class="text-center" style="vertical-align: middle;">
        {{ $convidado->nome }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $convidado->status->nome }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        
    </td>
    <td class="text-center" style="vertical-align: middle;" class="text-center">
        <a href="{{ route('festas.edit', $festa) }}" class="btn btn-outline-info">Alterar Status</a>
        <a href="{{ route('festas.show', $festa) }}" class="btn btn-outline-warning">Remover</a>
    </td>
</tr>