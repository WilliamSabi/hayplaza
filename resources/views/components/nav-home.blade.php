<header class="bg-slate-950 w-full flex items-center justify-center fixed z-20">
    <nav class="w-full">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="{{ route('home') }}" class="flex items-center relative">
                <div class="mx-2">
                    <div class="animated-circle"></div>
                    <div class="animated-circle"></div>
                    <div class="main-circle"></div>
                </div>
                <!-- <span class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap dark:text-white >Hay Plaza</span> -->
                <img src="{{ asset('storage/assets/logo_plaza.png') }}" class="h-8 mr-3" alt="Hay Plaza" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white dark:hover:bg-slate-900 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Menú</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full lg:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:border-blue-500">
                    <li>
                    <a href="{{ route('home') }}" class="flex items-center py-2 pl-3 pr-4 text-white bg-slate-900 rounded md:bg-transparent md:p-0 transition dark:text-white hover:text-blue-500 my-1 md:my-0" aria-current="page">
                        <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <title>Home</title>
                            <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                        </svg>    
                        Inicio
                    </a>
                    </li>
                    <li>
                    <a href="{{ route('home') }}#Categoria" class="flex items-center py-2 pl-3 pr-4 text-white bg-slate-900 rounded md:bg-transparent md:p-0 transition dark:text-white hover:text-blue-500 my-1 md:my-0" aria-current="page">
                        <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <title>Nosotros</title>
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                        </svg>
                        Quiénes Somos
                    </a>
                    </li>
                    <li>
                    <a href="#Producto" class="flex items-center py-2 pl-3 pr-4 text-white bg-slate-900 rounded md:bg-transparent md:p-0 dark:text-white transition hover:text-blue-500 my-1 md:my-0" aria-current="page">
                        <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <title>eventos</title>
                            <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192h80v56H48V192zm0 104h80v64H48V296zm128 0h96v64H176V296zm144 0h80v64H320V296zm80-48H320V192h80v56zm0 160v40c0 8.8-7.2 16-16 16H320V408h80zm-128 0v56H176V408h96zm-144 0v56H64c-8.8 0-16-7.2-16-16V408h80zM272 248H176V192h96v56z"/>
                        </svg> 
                        Eventos
                    </a>
                    </li>

                    <li>
                    <a href="#Producto" class="flex items-center py-2 pl-3 pr-4 text-white bg-slate-900 rounded md:bg-transparent md:p-0 dark:text-white transition hover:text-blue-500 my-1 md:my-0" aria-current="page">
                        <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <title>Contacto</title>
                            <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                        </svg>    
                        Contacto
                    </a>
                    </li>

                    <li>
                    <a href="#Producto" class="flex items-center py-2 pl-3 pr-4 text-white bg-slate-900 rounded md:bg-transparent md:p-0 dark:text-white transition hover:text-blue-500 my-1 md:my-0" aria-current="page">
                        <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <title>eventos R</title>
                            <path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM305 273L177 401c-9.4 9.4-24.6 9.4-33.9 0L79 337c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L271 239c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                        </svg>  
                        eventos Realizados
                    </a>
                    </li>

                    <!-- Buscador -->
                    <li>
                        <button data-collapse-toggle="navbar-buscar" type="button" class="inline-flex items-center justify-center text-sm text-white rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white dark:hover:bg-slate-900 dark:focus:ring-gray-600 my-1 md:my-0" aria-controls="navbar-buscar" aria-expanded="false">
                            <span class="sr-only">Menú</span>
                            <svg class="fill-current h-6 w-6 mr-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <title>Buscar</title>
                                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                        </button>

                        <div class="hidden w-full bg-slate-900 rounded border-blue-500 border-x border-y right-0 md:w-auto" id="navbar-buscar">
                            <ul class="">
                                <form method="GET" action="{{ route('home') }}" enctype="multipart/form-data">
                                @csrf
                                    <input type="text" id="clave" name="clave" placeholder="Nombre del evento" class="rounded-full" required>
                                    <button type="submit" class="bg-slate-950 text-white my-4 px-4 py-2 rounded-full hover:bg-slate-900 shadow-md transition shadow-blue-500">Buscar</button>
                                </form>
                            </ul>
                        </div>

                    </li>

                    <!-- Fin Buscador -->
                </ul>
            </div>
        </div>
    </nav>

</header>