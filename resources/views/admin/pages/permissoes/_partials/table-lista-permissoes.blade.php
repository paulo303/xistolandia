@forelse ($permissoes as $permissao)
    <tr>
        <td style="vertical-align: middle;">
            {{ $permissao->id }}
        </td>
        <td style="vertical-align: middle;">
            {{ $permissao->nome }}
        </td>
        <td style="vertical-align: middle;">
            {{ $permissao->descricao }}
        </td>
        <td style="vertical-align: middle;" class="text-center">
            <a href="{{ route('permissoes.edit', $permissao->id) }}" class="btn btn-outline-info">Editar</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" align="center">Nenhum resultado encontrado</td>
    </tr>
@endforelse
