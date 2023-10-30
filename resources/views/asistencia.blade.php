<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @section('title', 'HayPlaza || Asistencia')
    <x-head-home />

    
    <body class="antialiased">
        <x-nav-home />

        <!-- Zona Evento -->

        <section class="flex flex-col items-center justify-center bg-slate-950 py-2">
            <!-- Titulo -->
            <div class="border-b-2 border-white w-3/4 py-6 my-6">
                <p class="custom-font-titu text-white text-xl sm:text-4xl">ASISTENCIA AL EVENTO</p>
                <p class="text-gray-300 text-md sm:text-md mx-2 mt-4">{{ $evento->nombre }}</p>
                <p class="text-gray-300 text-md sm:text-md mx-2 mt-4">{{ $evento->descripcion }}</p>
                <p class="text-gray-300 text-md sm:text-md mx-2 mt-4"><b>Total de Registros: </b>{{ $evento->userCount }}</p>
            </div>

            <!-- Eventos -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                @foreach($fechas as $fecha)
                <div class="max-w-sm mx-4 my-2 bg-slate-900 rounded-md shadow-md shadow-blue-500">

                    <div class="relative justify-center text-center">

                        <p class="border-b-2 border-white text-white custom-font-titu text-xl sm:text-2xl py-2 px-2">Asistencia Diaria</p>
                        <p class="border-b-2 border-white text-white custom-font-titu text-xl sm:text-2xl py-2 px-2">Registros: {{ $evento->userCount }}</p>

                            <p class="text-white">{{ $fecha }}</p>
                            
                        </div>
                    </div>
                @endforeach
                    
            </div>
            
        </section>

        <!-- Fin evento -->
        

        <!-- Fin eventos finalizados -->

        <x-footer-home />

    </body>

    <!-- Navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</html>


