<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Gestión de citas</h2>
    </x-slot>

    <div class="p-4">
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th>Cliente</th>
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
                    <td>{{ $cita->cliente->name }}</td>
                    <td>{{ $cita->marca }}</td>
                    <td>{{ $cita->modelo }}</td>
                    <td>{{ $cita->matricula }}</td>
                    <td>{{ $cita->fecha ?? 'Pendiente' }}</td>
                    <td>{{ $cita->hora ?? 'Pendiente' }}</td>
                    <td>
                        <a href="{{ route('citas.show', $cita) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('citas.modificar-cita', $cita) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('citas.eliminar-cita', $cita) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('¿Seguro que deseas borrar esta cita?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
