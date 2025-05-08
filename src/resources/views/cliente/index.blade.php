<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Mis Citas</h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('citas.create') }}" class="btn btn-primary mb-4">Solicitar nueva cita</a>
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Matrícula</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                <tr>
                    <td>{{ $cita->marca }}</td>
                    <td>{{ $cita->modelo }}</td>
                    <td>{{ $cita->matricula }}</td>
                    <td>{{ $cita->fecha ?? 'Pendiente' }}</td>
                    <td>{{ $cita->hora ?? 'Pendiente' }}</td>
                    <td>
                        <a href="{{ route('citas.show', $cita) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
