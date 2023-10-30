<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-head-home />

    
    <body class="antialiased">
        <x-nav-home />


        <section class="bg-slate-900 py-2" id="Categoria">
             <!-- Zona de Banners -->

            <div class="slider fade mt-20">
				<div>
					<div class="image">
						<div class="relative h-96 bg-cover hidden md:block" style="background-image: url(https://hayplaza.com/vistas/img/slide1.jpg)"></div>
                        <div class="relative h-96 bg-cover block md:hidden" style="background-image: url(https://hayplaza.com/vistas/img/bannerplaza.jpg)"></div>
					</div>
				</div>
				<div>
					<div class="image">
						<div class="relative h-96 bg-cover hidden md:block" style="background-image: url(https://hayplaza.com/vistas/img/Recurso-2.jpg)"></div>
                        <div class="relative h-96 bg-cover block md:hidden" style="background-image: url(https://hayplaza.com/vistas/img/feria_cafe.png)"></div>
					</div>
				</div>
				<div>
					<div class="image">
						<div class="relative h-96 bg-cover hidden md:block" style="background-image: url(https://hayplaza.com/vistas/img/bannerplaza.jpg)"></div>
                        <div class="relative h-96 bg-cover block md:hidden" style="background-image: url(https://hayplaza.com/vistas/img/Recurso-2.jpg)"></div>
					</div>
				</div>
                    <div>
                        <div class="relative h-96 bg-cover hidden md:block" style="background-image: url(https://hayplaza.com/vistas/img/slide1.jpg)"></div>
                        <div class="relative h-96 bg-cover block md:hidden" style="background-image: url(https://hayplaza.com/vistas/img/feria_cafe.png)"></div>
                    </div>
			</div>

            <!-- Fin Zona de Banners -->
        </section>

        <!-- Zona Eventos En Curso -->

        <section class="flex flex-col items-center justify-center bg-slate-950 py-2">
            <!-- Titulo -->
            <div class="border-b-2 border-white w-3/4 py-6 my-6">
                <p class="custom-font-titu text-white text-xl sm:text-4xl">EVENTOS EN CURSO</p>
            </div>

            <!-- Eventos -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                @foreach ($evento as $key => $eventos)

                @if ($eventos->estado != 'Finalizado')
  
                    <div class="max-w-sm mx-4 my-2 bg-slate-900 rounded-md shadow-md shadow-blue-500">
                        <div class="relative justify-center text-center">
                            <div class="relative w-full h-80 sm:h-96 bg-cover rounded-t-lg" style="background-image: url({{ asset('storage/imagenes_eventos/' . $eventos->imagen) }});"></div>
                            <p class="border-b-2 border-white text-white custom-font-titu text-xl sm:text-2xl py-2 px-2">{{ $eventos->nombre }} </p>

                            @if ($eventos->inicio->format('Y-m-d') === '2023-01-01')

                                <div class="grid grid-cols-1 gap-4 custom-font-descri text-lg p-2">
                                    <p class="text-white">Fecha y Hora Por Definir</p>
                                    <div class="flex items-center justify-center bg-orange-600 hover:bg-orange-700 text-white rounded-md p-1 cursor-default">
                                        <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <title>Nosotros</title>
                                            <path d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3V448c0 17.7 14.3 32 32 32s32-14.3 32-32V146.3l32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 480h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128H544c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-17.7 0-32 14.3-32 32s14.3 32 32 32z"/>
                                        </svg>
                                        {{ $eventos->estado }}
                                    </div>
                                </div>

                            @else

                                <div class="grid grid-cols-2 gap-4 custom-font-descri text-lg p-2">

                                    @if ($eventos->inicio->format('m') == $eventos->final->format('m'))

                                        <p class="text-white">{{ $eventos->inicio->format('d') }} - {{ $eventos->final->format('d') }}</p>
                                        <p class="text-white">{{ $eventos->lugar }}</p>
                                        <p class="text-blue-500">{{ strtoupper($eventos->final->locale('es')->isoFormat('MMM')) }} {{ $eventos->final->format('Y') }}</p>
                                    
                                        @else 

                                        <p class="text-white">{{ $eventos->inicio->format('d') }} de {{ strtoupper($eventos->inicio->locale('es')->isoFormat('MMM')) }}</p>
                                        <p class="text-white">{{ $eventos->lugar }}</p>
                                        <p class="text-blue-500">Al {{ $eventos->final->format('d') }} de {{ strtoupper($eventos->final->locale('es')->isoFormat('MMM')) }} {{ $eventos->final->format('Y') }}</p>

                                    @endif
                                        <div>
                                            <a href="{{ route('actividad', ['evento' => $eventos->slug]) }}" class="flex items-center justify-center bg-green-600 hover:bg-green-700 text-white hover:text-slate-900 rounded-md p-1">
                                                <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <title>Nosotros</title>
                                                    <path d="M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z"/>
                                                </svg>
                                                Asistir
                                            </a>
                                        </div>
                                </div>
                            
                            @endif

                        </div>
                    </div>
                @endif

                @endforeach

            </div>
            
        </section>

        <!-- Fin eventos en curso -->

        <!-- Zona Eventos Finalizados -->

        <section class="flex flex-col items-center justify-center bg-slate-900 py-2">
            <!-- Titulo -->
            <div class="border-b-2 border-white w-3/4 py-6 my-6">
                <p class="custom-font-titu text-white text-xl sm:text-4xl">EVENTOS FINALIZADOS</p>
            </div>

            <!-- Eventos -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                @foreach ($evento as $key => $terminado)

                    @if ($terminado->estado == 'Finalizado')
    
                        <div class="max-w-sm mx-4 my-2 bg-slate-900 rounded-md shadow-md shadow-blue-500">
                            <div class="relative justify-center text-center">
                                <div class="relative w-full h-80 sm:h-96 bg-cover rounded-t-lg" style="background-image: url({{ asset('storage/imagenes_eventos/' . $terminado->imagen) }});"></div>
                                <p class="border-b-2 border-white text-white custom-font-titu text-xl sm:text-2xl py-2 px-2">{{ $terminado->nombre }} </p>

                                    <div class="grid grid-cols-2 gap-4 custom-font-descri text-lg p-2">

                                        @if ($terminado->inicio->format('m') == $terminado->final->format('m'))

                                            <p class="text-white">{{ $terminado->inicio->format('d') }} - {{ $terminado->final->format('d') }}</p>
                                            <p class="text-white">{{ $terminado->lugar }}</p>
                                            <p class="text-blue-500">{{ strtoupper($terminado->final->locale('es')->isoFormat('MMM')) }} {{ $terminado->final->format('Y') }}</p>
                                        
                                            @else 

                                            <p class="text-white">{{ $terminado->inicio->format('d') }} de {{ strtoupper($terminado->inicio->locale('es')->isoFormat('MMM')) }}</p>
                                            <p class="text-white">{{ $terminado->lugar }}</p>
                                            <p class="text-blue-500">Al {{ $terminado->final->format('d') }} de {{ strtoupper($terminado->final->locale('es')->isoFormat('MMM')) }} {{ $terminado->final->format('Y') }}</p>

                                        @endif
                                            <div class="flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white rounded-md p-1 cursor-default">
                                                    <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <title>Nosotros</title>
                                                        <path d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                                                    </svg>
                                                    Finalizado
                                            </div>
                                    </div>
                            </div>
                        </div>

                    @endif
                
                @endforeach

            </div>
            
        </section>

        <!-- Fin eventos finalizados -->

        <x-footer-home />

    </body>

    <!-- Navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    
<!-- Carrusel -->
<script
src="https://code.jquery.com/jquery-2.2.0.min.js"
type="text/javascript"
></script>
<script
src="http://kenwheeler.github.io/slick/slick/slick.js"
type="text/javascript"
charset="utf-8"
></script>

<script type="text/javascript">
    $('.fade').slick({
    dots: true,
    infinite: true,
    speed: 100,
    fade: true,
    cssEase: 'linear'
    });
</script>

</html>


