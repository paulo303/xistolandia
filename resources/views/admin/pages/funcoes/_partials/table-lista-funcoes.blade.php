<tr>
    <td class="text-center" style="vertical-align: middle;">
        {{ $funcao->nome }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $funcao->descricao }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        <form action="{{ route('funcoes.destroy', $funcao) }}" method="POST" enctype="multipart/form-data">
            <a href="{{ route('funcoes.edit', $funcao) }}" class="btn btn-outline-info"><i class="fas fa-edit"></i> Editar</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
        </form>
    </td>
</tr>
