<tr>
    <td class="text-center" style="vertical-align: middle;">
        {{ $permissao->id }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $permissao->nome }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $permissao->descricao }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        <a href="{{ route('permissoes.edit', $permissao->id) }}" class="btn btn-outline-info">Editar</a>
    </td>
</tr>
