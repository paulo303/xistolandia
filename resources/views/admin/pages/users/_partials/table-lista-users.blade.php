<tr>
    <td class="text-center" style="vertical-align: middle;">
        {{ $user->id }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $user->name }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{ $user->email }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        {{-- {{ $user->funcoes->pluck('nome')->implode(', ') }} --}}
        {{ $user->funcao->nome }}
    </td>
    <td class="text-center" style="vertical-align: middle;">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info">Editar</a>
    </td>
</tr>
