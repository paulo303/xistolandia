@forelse ($users as $user)
    <tr>
        <td style="vertical-align: middle;">
            {{ $user->id }}
        </td>
        <td style="vertical-align: middle;">
            {{ $user->name }}
        </td>
        <td style="vertical-align: middle;">
            {{ $user->email }}
        </td>
        <td style="vertical-align: middle;">
            {{-- {{ $user->funcoes->pluck('nome')->implode(', ') }} --}}
            {{ $user->funcao->nome }}
        </td>
        <td style="vertical-align: middle;" class="text-center">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-info">Editar</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" align="center">Nenhum resultado encontrado</td>
    </tr>
@endforelse
