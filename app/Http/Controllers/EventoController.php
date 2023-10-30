<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Evento;
use App\Models\Asistente;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //===================================================================================
    // Mostrar los eventos || Listo
    //===================================================================================

    public function index()
    {
        //$evento = Evento::all();
        $evento = Evento::orderBy('estado', 'asc')->paginate(10); // Mostrar 10 productos por página y mostrar primero los Activos
        // Número de asistentes para cada evento
        foreach ($evento as $eventos) {
            $eventos->userCount = Asistente::where('evento', $eventos->id)->count();
        }

    return view('dashboard', compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //===================================================================================
    // Formulario para crear evento || Listo
    //===================================================================================

    public function create()
    {
        // Vista para crear un nuevo producto
        //$vento = Categoria::all();
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //===================================================================================
    // Logica para crear nuevo evento || Listo
    //===================================================================================

    public function store(Request $request)
    {
        // Validación y creación del producto
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->slug = Str::slug($request->input('nombre'), '-');
        $evento->descripcion = $request->input('descripcion');
        $evento->inicio = $request->input('inicio', '2023-01-01');
        $evento->final = $request->input('final', '2023-01-01');
        $evento->lugar = $request->input('lugar');
        $evento->estado = $request->input('estado');

        // Procesa y guarda la imagen si es necesario
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreOriginal = $imagen->getClientOriginalName();
            $nombreImagen = time() . '_' . $nombreOriginal;
    
            // Mover y almacenar la imagen con el nuevo nombre
            $imagen->storeAs('public/imagenes_eventos', $nombreImagen);
    
            $evento->imagen = $nombreImagen;
        }

        $evento->save();

        return redirect()->route('dashboard')->with('success', 'Evento creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */

    //===================================================================================
    // Formulario para editar evento || Listo
    //===================================================================================

    public function edit(Evento $evento)
    {
        // Vista para editar un Evento existente
        return view('eventos.edit', ['evento' => $evento]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */

    //===================================================================================
    // Logica para actualizar evento || Listo
    //===================================================================================

    public function update(Request $request, Evento $evento)
    // Validación y actualización del producto
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'lugar' => 'required',
            'estado' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg|max:500', // Ajusta las reglas de validación de la imagen según tus necesidades
        ]);

        // Actualizar los atributos del evento con los nuevos valores
        $evento->nombre = $request->nombre;
        $evento->slug = Str::slug($request->nombre, '-');
        $evento->descripcion = $request->descripcion;
        $evento->inicio = $request->inicio;
        $evento->final = $request->final;
        $evento->lugar = $request->lugar;
        $evento->estado = $request->estado;


        // Manejar la actualización de la imagen si se proporcionó una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($evento->Imagen) {
                Storage::delete('public/imagenes_eventos/' . $evento->Imagen);
            }

            // Procesa y guarda la imagen

            $imagen = $request->file('imagen');
            $nombreOriginal = $imagen->getClientOriginalName();
            $nombreImagen = time() . '_' . $nombreOriginal;
    
            // Mover y almacenar la imagen con el nuevo nombre
            $imagen->storeAs('public/imagenes_eventos', $nombreImagen);
    
            $evento->imagen = $nombreImagen;
        }

        // Guardar los cambios en el evento
        $evento->save();

        return redirect()->route('dashboard')->with('success', 'Evento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */

    //===================================================================================
    // Eliminar evento || Listo
    //===================================================================================

    public function destroy(Evento $evento)
    {

        // Eliminar la imagen
        if ($evento->Imagen) {
            Storage::delete('public/imagenes_eventos/' . $evento->Imagen);
        }
         // Eliminar todo
        $evento->delete();
        return redirect()->route('dashboard')->with('success', 'Producto eliminado correctamente');
    }


    //===================================================================================
    // Vista del formulario para agregar asistente desde el admin || Listo
    //===================================================================================

    public function showEvento($evento)
    {
        // Buscar el evento por su slug
        //$evento = Evento::where('nombre', 'like', "%$evento%")->firstOrFail();
        $evento = Evento::where('slug', $evento)->firstOrFail();
        $lugar = Lugar::all();

        // Renderizar una vista y pasar el evento a la vista
        return view('eventos.asistente', compact('evento', 'lugar'));
    }

    //===================================================================================
    // Logica para crear nuevo asistente desde el admin || Listo
    //===================================================================================

    public function add(Request $request)
    {
        // Validación y creación del producto
        $asistente = new Asistente();
        $asistente->evento = $request->input('evento_id');
        $asistente->cedula = $request->input('cedula');
        $asistente->nombre = $request->input('nombre');
        $asistente->correo = $request->input('correo');
        $asistente->celular = $request->input('celular');
        $asistente->ubicacion = $request->input('ubicacion');
        if(empty($asistente->ubicacion)){
            $asistente->ubicacion_otra = $request->input('ubicacion_otra');
        }
        $asistente->asistio = 'Pendiente'; // Aquí asignas un valor por defecto (en este caso null)
        $asistente->aceptacion = $request->input('aceptacion');

        $userCount = Asistente::where('cedula', $asistente->cedula)->where('evento', $asistente->evento)->first(); // Obtener el número de coincidencias con 'cedula' y 'evento_id' en la base de datos

        if ($userCount) {

            // Obtengo el valor actual de la columna 'asistio'
            $asistencia = $userCount->asistio;

            if ($asistencia == "Pendiente") {
                // Cambiar valor por la fecha actual
                $update_asistencia = now()->toDateString();
            } else {
                // Concateno la fecha actual al valor actual
                $update_asistencia = $asistencia . " , " . now()->toDateString();
            }

            // Actualizar la columna 'asistio'
            $userCount->update(['asistio' => $update_asistencia]);

            $evento_id = Evento::find($request->input('evento_id'));
            $evento = $evento_id->slug;
            return redirect()->route('actividad', compact('evento'))->with('success', 'Usuario actualizado correctamente');

        } else {

            $asistente->save();

            $evento_id = Evento::find($request->input('evento_id'));
            $fecha_inicio = $evento_id->inicio;
            $fecha_final = $evento_id->final;
            $evento = $evento_id->slug;

            if ($asistente->created_at->between($fecha_inicio, $fecha_final)) {
                $asistente->asistio = $asistente->created_at->toDateString();
                $asistente->save();
            }

            // Intenta enviar el correo
            try {
                $sent = Mail::to($asistente->correo)->send(new AsistenteRegistered($asistente, $evento_id));

                // Verifica si el correo se envió correctamente
                if ($sent) {
                    // El correo se envió con éxito
                    return redirect()->route('actividad', compact('evento'))->with('success', 'Usuario registrado correctamente');
                } else {
                    // Si hay fallas en el envío, puedes manejarlas aquí
                    return redirect()->route('actividad', compact('evento'))->with('error', 'Error al enviar el correo, por favor vuelva a intentarlo');
                }
            } catch (\Exception $e) {
                // Maneja cualquier excepción que pueda ocurrir durante el envío
                return redirect()->back()->with('error', 'Error al enviar el correo: ' . $e->getMessage());
            }

        }

    }
}
