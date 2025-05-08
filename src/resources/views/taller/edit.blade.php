<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Editar cita</h2>
    </x-slot>

    <div class="p-4 max-w-xl">
        <form method="POST" action="{{ route('citas.update', $cita) }}">
            @csrf
            @method('PUT')

            <p><strong>Cliente:</strong> {{ $cita->cliente->name }}</p>
            <p><strong>Marca:</strong> {{ $cita->marca }}</p>
            <p><strong>Modelo:</strong> {{ $cita->modelo }}</p>
            <p><strong>Matrícula:</strong> {{ $cita->matricula }}</p>

            <x-input-label for="fecha" value="Fecha" class="mt-4" />
            <x-text-input id="fecha" name="fecha" type="date" class="mt-1 block w-full" value="{{ $cita->fecha }}" />

            <x-input-label for="hora" value="Hora" class="mt-4" />
            <x-text-input id="hora" name="hora" type="time" class="mt-1 block w-full" value="{{ $cita->hora }}" />

            <x-input-label for="duracion" value="Duración estimada" class="mt-4" />
            <x-text-input id="duracion" name="duracion" type="number" class="mt-1 block w-full" value="{{ $cita->duracion }}" />

            <x-primary-button class="mt-4">Actualizar cita</x-primary-button>
        </form>
    </div>
</x-app-layout>
