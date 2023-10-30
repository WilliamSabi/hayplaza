<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @section('title', 'HayPlaza || Evento')
    <x-head-home />

    <body class="antialiased">
        <x-nav-home />

        <!-- Zona Eventos En Curso -->

        <section class="flex flex-col items-center justify-center bg-slate-950 py-2">
            <!-- Titulo -->
            <div class="border-b-2 border-white w-3/4 py-12 my-6">
                <p class=" text-white text-xl sm:text-4xl">{{ $evento->nombre }}</p>
                <p class="text-gray-300 text-md sm:text-md mx-2 mt-4">{{ $evento->descripcion }}</p>

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

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 my-2 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <title>Listo</title>
                                <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                            </svg>
                        </span>
                    </div>
                @endif

            </div>

            <!-- Eventos -->

            <div class="w-3/4 mx-4 my-2 bg-slate-900 rounded-md shadow-md shadow-blue-500">
                <div class="relative justify-center text-center">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-white p-2">
                        <div class="relative py-4">
                            <img src="{{ asset('storage/imagenes_eventos/' . $evento->imagen) }}" alt="{{ $evento->nombre }}" class="realtive rounded-lg m-auto">
                        </div>
                        <form method="POST" action="{{ route('actividad.store') }}" enctype="multipart/form-data">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @csrf

                                <input type="hidden" id="evento_id" name="evento_id" value="{{ $evento->id }}">

                                <div class="form-group text-left">
                                    <label for="cedula">N° de Cédula *</label>
                                    <input type="number" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full text-black" id="cedula" name="cedula" required>
                                </div>

                                <div class="form-group text-left">
                                    <label for="nombre" >Nombre y Apellido *</label>
                                    <input type="text" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full text-black" id="nombre" name="nombre" required>
                                </div>

                                <div class="form-group text-left">
                                    <label for="correo">Correo Electrónico *</label>
                                    <input type="email" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full text-black" id="correo" name="correo" required>
                                </div>

                                <div class="form-group text-left">
                                    <label for="celular">Teléfono / Celular *</label>
                                    <input type="number" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full text-black" id="celular" name="celular" required>
                                </div>
                                
                                <div class="form-group text-left">
                                    <label for="ubicacion">Ciudad de residencia:</label>
                                    <select class="form-select text-black rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full" id="ubicacion" name="ubicacion">
                                        <option disabled selected>--Seleccionar una residencia--</option>
                                        @foreach ($lugar as $key => $lugares)
                                            <option value="{{ $lugares->id }}">{{ $lugares->municipio }}, {{ $lugares->departamento }}, {{ $lugares->pais }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group text-left">
                                    <label for="ubicacion_otra">Otro:</label>
                                    <input type="text" class="form-input rounded border-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full text-black" id="ubicacion_otra" name="ubicacion_otra">
                                </div>

                                <div class="form-group col-span-1 sm:col-span-2 text-justify text-sm sm:text-lg">
                                    <label for="aceptacion">¡Gracias por elegir nuestro servicio! Para poder brindarte la mejor experiencia posible, necesitamos recopilar 
                                        cierta información personal. Descansa tranquilo sabiendo que protegeremos tus datos y los utilizaremos solo para fines específicos 
                                        relacionados con nuestro servicio. Por favor, acepta el uso de tus datos personales marcando la casilla correspondiente a 
                                        continuación. ¡Gracias!</label>
                                </div>

                                <div class="form-group text-left ">
                                    <input type="radio" id="cbox1" name="aceptacion" value="Si Acepto" checked><label for="cbox1"> Si Acepto</label><br>
                                    <input type="radio" id="cbox2" name="aceptacion" value="No Acepto"><label for="cbox2"> No Acepto</label>
                                </div>

                                <button type="submit" class="bg-green-500 text-white my-4 px-4 py-2 rounded hover:bg-green-600">Enviar</button>
    
                            </div>
                        </form>
                    </div>

                </div>
            </div>



            <x-terminos-condiciones />


            
        </section>

        <!-- Fin eventos en curso -->


        <x-footer-home />

    </body>

    <!-- Navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

<!-- Autocompletado -->

<script>
    $(document).ready(function() {
        $('#cedula').on('blur', function() {
            let cedula = $(this).val();

            $.ajax({
                url: '/asistente/' + cedula,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#nombre').val(data.nombre);
                        $('#correo').val(data.correo);
                        $('#celular').val(data.celular);
                        $('#ubicacion').val(data.ubicacion).trigger('change');
                        $('#ubicacion_otro').val(data.ubicacion_otro);
                        // Y así con los demás campos que quieras autocompletar
                    }
                },
                error: function(err) {
                    console.error('Error al obtener datos del asistente:', err);
                }
            });
        });
    });
</script>

<!-- Select2 -->
<script>
    $(document).ready(function() {
        $('#ubicacion').select2({
            width: 'resolve'
        });
    });
</script>
</html>


