<x-app-layout>
    <x-guest-layout>

        <div class="container mx-auto bg-white p-6 shadow-md rounded-lg">
            <div class="flex justify-center">
                <div class="w-full">
                    
                        <h2 class="text-center text-white text-lg font-semibold bg-blue-500 p-3 rounded-lg">Editar Evento</h2>

                        <div class="card-body">
                        <form method="POST" action="{{ route('dashboard.update', $evento->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="nombre">Nombre del Evento</label>
                                    <input type="text" Value="{{ $evento->nombre }}" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" id="nombre" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion">Descripción del Evento</label>
                                    <textarea class="form-textarea rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" style="max-height: 200px;" id="descripcion" name="descripcion" maxlength="260" required>{{ $evento->descripcion }}</textarea>
                                    <p id="caracteres-restantes" class="text-gray-500">Caracteres restantes: 260</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nombre">Fecha de Inicio</label>
                                    <input type="date" Value="{{ $evento->inicio }}" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" id="inicio" name="inicio" required>
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Fecha de Fin</label>
                                    <input type="date" Value="{{ $evento->final }}" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" id="final" name="final" required>
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Lugar del Evento</label>
                                    <input type="text" Value="{{ $evento->lugar }}" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" id="lugar" name="lugar" required>
                                </div>

                                <div class="form-group">
                                    <label for="categoria">Estado del Evento</label>
                                    <select class="form-select rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" id="estado" name="estado" required>
                                        <option disabled selected>--Seleccionar Estado--</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Finalizado">Finalizado</option>
                                        <option value="Proximamente">Próximamente</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="imagen">Imagen del Evento (400 x 400 px)</label>
                                    <img src="{{ asset('storage/imagenes_eventos/' . $evento->imagen) }}" alt="{{ $evento->nombre }}" class="rounded" width="100">
                                    <label for="imagen">Cambiar imagen</label>
                                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                                </div>

                                <button type="submit" class="bg-green-500 text-white my-4 px-4 py-2 rounded hover:bg-green-600">Actualizar Evento</button>
                            </form>

                            <a href="{{ route('dashboard') }}" class="block w-full text-center bg-blue-100 border border-blue-400 text-blue-700 my-2 px-4 py-3 rounded relative hover:bg-blue-600 hover:text-white">
                                <span class="block sm:inline">Volver</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <title>Cerrar</title>
                                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                                    </svg>
                                </span>
                            </a>

                        </div>
                    
                </div>
            </div>
        </div>

    </x-guest-layout>
</x-app-layout>
