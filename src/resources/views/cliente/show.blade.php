<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detalles de la cita</h2>
    </x-slot>

    <div class="p-4">
        <p><strong>Marca:</strong> {{ $cita->marca }}</p>
        <p><strong>Modelo:</strong> {{ $cita->modelo }}</p>
        <p><strong>Matrícula:</strong> {{ $cita->matricula }}</p>
        <p><strong>Fecha:</strong> {{ $cita->fecha ?? 'Pendiente' }}</p>
        <p><strong>Hora:</strong> {{ $cita->hora ?? 'Pendiente' }}</p>
        <p><strong>Duración estimada:</strong> {{ $cita->duracion ?? 'Pendiente' }}</p>
    </div>
</x-app-layout>
