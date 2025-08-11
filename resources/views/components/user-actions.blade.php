<div class="flex gap-3">
{{--    <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">Ver</a>--}}
{{--    <a href="{{ route('users.edit', $user) }}" class="text-green-600 hover:underline">Editar</a>--}}
    <button wire:click="$emit('deleteUser', {{ $user->id }})" class="text-red-600 hover:underline">
        Eliminar
    </button>
</div>
