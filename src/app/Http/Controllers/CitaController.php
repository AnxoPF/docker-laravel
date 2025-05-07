<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isTaller()) {
            $citas = Cita::with('cliente')->get();
        } else {
            $citas = Cita::with('cliente')->where('cliente_id', $user->id)->get();
        }

        return view('citas.index', compact('citas'));
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'marca'     => 'required|string',
            'modelo'    => 'required|string',
            'matricula' => 'required|string',
        ];

        if ($user->isTaller()) {
            $rules['fecha']    = 'required|date';
            $rules['hora']     = 'required';
            $rules['duracion'] = 'required|integer';
        }

        $validated = $request->validate($rules);

        $validated['matricula'] = strtoupper($validated['matricula']);
        $validated['cliente_id'] = $user->id;

        try {
            Cita::create($validated);
            return redirect()->route('citas.index')->with('success', 'Cita creada con éxito.');
        } catch (Exception $e) {
            return redirect()->route('citas.index')->with('error', 'Error al crear la cita.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = Cita::findOrFail($id);
        return view('citas.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fecha'    => 'required|date',
            'hora'     => 'required',
            'duracion' => 'required|integer',
        ]);

        $cita = Cita::findOrFail($id);

        $cita->update([
            'fecha'    => $request->fecha,
            'hora'     => $request->hora,
            'duracion' => $request->duracion,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}
