@forelse ($funcoes as $funcao)
    <tr>
        <td style="vertical-align: middle;">
            {{ $funcao->nome }}
        </td>
        <td style="vertical-align: middle;">
            {{ $funcao->descricao }}
        </td>
        <td style="vertical-align: middle;" class="text-center">
            <form action="{{ route('funcoes.destroy', $funcao) }}" method="POST" enctype="multipart/form-data">
                <a href="{{ route('funcoes.edit', $funcao) }}" class="btn btn-outline-info"><i class="fas fa-edit"></i> Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" align="center">Nenhum resultado encontrado</td>
    </tr>
@endforelse
