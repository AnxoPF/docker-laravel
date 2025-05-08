<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Crear nueva cita</h2>
    </x-slot>

    <div class="p-4 max-w-xl">
        <form method="POST" action="{{ route('taller.citas.store') }}">
            @csrf

            <x-input-label for="cliente_id" value="Cliente" />
            <select name="cliente_id" id="cliente_id" class="block w-full mt-1" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }} ({{ $cliente->email }})</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />

            <x-input-label for="marca" value="Marca" class="mt-4" />
            <x-text-input id="marca" name="marca" type="text" class="mt-1 block w-full" required />

            <x-input-label for="modelo" value="Modelo" class="mt-4" />
            <x-text-input id="modelo" name="modelo" type="text" class="mt-1 block w-full" required />

            <x-input-label for="matricula" value="Matrícula" class="mt-4" />
            <x-text-input id="matricula" name="matricula" type="text" class="mt-1 block w-full" required />

            <x-input-label for="fecha" value="Fecha" class="mt-4" />
            <x-text-input id="fecha" name="fecha" type="date" class="mt-1 block w-full" />

            <x-input-label for="hora" value="Hora" class="mt-4" />
            <x-text-input id="hora" name="hora" type="time" class="mt-1 block w-full" />

            <x-input-label for="duracion" value="Duración estimada (minutos)" class="mt-4" />
            <x-text-input id="duracion" name="duracion" type="number" class="mt-1 block w-full" />

            <x-primary-button class="mt-4">Guardar cita</x-primary-button>
        </form>
    </div>
</x-app-layout>
