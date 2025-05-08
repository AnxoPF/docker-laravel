<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Solicitar nueva cita</h2>
    </x-slot>

    <div class="p-4 max-w-xl">
        <form method="POST" action="{{ route('citas.store') }}">
            @csrf

            <x-input-label for="marca" value="Marca" />
            <x-text-input id="marca" name="marca" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('marca')" class="mt-2" />

            <x-input-label for="modelo" value="Modelo" class="mt-4" />
            <x-text-input id="modelo" name="modelo" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('modelo')" class="mt-2" />

            <x-input-label for="matricula" value="Matrícula" class="mt-4" />
            <x-text-input id="matricula" name="matricula" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('matricula')" class="mt-2" />

            <x-primary-button class="mt-4">Enviar solicitud</x-primary-button>
        </form>
    </div>
</x-app-layout>
