<x-app-layout>
@if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 my-2 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <title>Listo</title>
                    <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                </svg>
            </span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="table w-full border">
                        <thead>

                            <tr>
                                <th class="bg-blue-500 text-white py-2 px-4">Imagen</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Título</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Descripción</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Inicio</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Final</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Lugar</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Estado</th>
                                <th class="bg-blue-500 text-white py-2 px-4">Agregar</th>
                                @if (Auth::user()->rango === 'admin')
                                <th class="bg-blue-500 text-white py-2 px-4">Acciones</th>
                                @endif
                            </tr>

                        </thead>
                        <tbody>

                            @foreach($evento as $key => $evento)
                            <tr class="{{ $key % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                                <td><img src="{{ asset('storage/imagenes_eventos/' . $evento->imagen) }}" width="100" class="rounded" alt="{{ $evento->titulo }}"></td>
                                <td class="text-black py-2 px-4">{{ $evento->nombre }}</td>
                                <td class="text-black py-2 px-4">{{ strlen($evento->descripcion) > 30 ? substr($evento->descripcion, 0, 30) . '...' : $evento->descripcion }}</td>
                                <td class="text-black py-2 px-4">{{ $evento->inicio }}</td>
                                <td class="text-black py-2 px-4">{{ $evento->final }}</td>
                                <td class="text-black py-2 px-4">{{ $evento->lugar }}</td>
                                <td class="text-black py-2 px-4">{{ $evento->estado }}</td>
                                @if ($evento->estado === 'Activo')
                                <td class="text-black py-2 px-4">
                                    <p>Registros: {{ $evento->userCount }}</p>
                                    <div class="bg-blue-500 text-white my-4 px-4 py-2 rounded hover:bg-blue-600">
                                    <a href="{{ route('actividad.admin', $evento->slug) }}">
                                        <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <title>Agregar</title>
                                            <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                                        </svg>
                                    </a>
                                    </div>
                                </td>
                                @else
                                <td class="text-black py-2 px-4">
                                    <p>Registros: {{ $evento->userCount }}</p>
                                    No disponible
                                </td>
                                @endif

                                @if (Auth::user()->rango === 'admin')
                                <td class="py-2 px-4 text-center">
                                    <div class="bg-green-500 text-white my-4 px-4 py-2 rounded hover:bg-green-600">
                                    <a href="{{ route('dashboard.edit', $evento->id) }}">
                                        <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <title>Editar</title>
                                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                        </svg>
                                    </a>
                                    </div>
                                    
                                    <form action="{{ route('dashboard.destroy', $evento->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white my-4 px-4 py-2 rounded hover:bg-red-600">
                                            <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <title>Eliminar</title>
                                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                            

                        </tbody>
                    </table>
                </div>
            </div>

            </div>
        </div>
    </div>
</x-app-layout>
