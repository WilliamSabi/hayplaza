<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Evento;
use App\Models\Asistente;
use Illuminate\Http\Request;

// Enviar correo electronico
use Mail;
use App\Mail\AsistenteRegistered;

class HomeController extends Controller
{
    //===================================================================================
    // Mostrar los eventos en la página principal || Listo
    //===================================================================================

    public function index()
    {
        $evento = Evento::all();
        //$evento = Evento::paginate(10); // Mostrar 10 productos por página
        return view('home', compact('evento'));
    }

    //===================================================================================
    // Vista del formulario para agregar asistente|| Listo
    //===================================================================================

    public function showEvento($evento)
    {
        // Buscar el evento por su slug
        //$evento = Evento::where('nombre', 'like', "%$evento%")->firstOrFail();
        $evento = Evento::where('slug', $evento)->firstOrFail();
        $lugar = Lugar::all();

        // Renderizar una vista y pasar el evento a la vista
        return view('actividad', compact('evento', 'lugar'));
    }

    //===================================================================================
    // Logica para autocompletado de datos con la cedula || Listo
    //===================================================================================

    public function getDatosPorCedula($cedula) {
        $asistente = Asistente::where('cedula', $cedula)->first();
        if ($asistente) {
            return response()->json($asistente);
        } else {
            return response()->json(null, 404);
        }
    }
    

    //===================================================================================
    // Logica para crear nuevo asistente || Listo
    //===================================================================================

    public function store(Request $request)
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

        $userCount = Asistente::where('cedula', $asistente->cedula)->where('evento', $asistente->evento)->count(); // Obtener el número de coincidencias con 'cedula' y 'evento_id' en la base de datos

        if ($userCount > 0) {

            $evento_id = Evento::find($request->input('evento_id'));
            $evento = $evento_id->slug;
            return redirect()->route('actividad', compact('evento'))->with('error', 'Usuario ya está registrado');

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


    //===================================================================================
    // Vista de asistencia diaria por evento||
    //===================================================================================

    public function showAsistencia($evento)
    {
        // Buscar el evento por su slug
        $evento = Evento::where('slug', $evento)->firstOrFail(); // Obtener URL del evento

        // Número de asistentes para el evento
        $evento->userCount = Asistente::where('evento', $evento->id)->count();

        $fechas = [];
        
        $fechaActual = clone $evento->inicio;

        while ($fechaActual->lte($evento->final)) { 
            $fechas[] = $fechaActual->toDateString();
            $fechaActual->addDay();  
        }

        
        // Renderizar una vista y pasar el evento a la vista
        return view('asistencia', compact('evento', 'fechas'));
    }



}
