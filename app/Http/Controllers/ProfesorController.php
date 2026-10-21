<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfesorController extends Controller
{

private const MESSAGES = [
    // Apellidos
    'apellidos.max'      => 'Los apellidos no pueden superar los 130 caracteres.',
    'apellidos.min'      => 'Los apellidos deben tener al menos 3 caracteres.',
    'apellidos.required' => 'Los apellidos son obligatorios.',
    'apellidos.string'   => 'Los apellidos deben ser una cadena de texto.',

    // Especialidad
    'especialidad.max'      => 'La especialidad no puede superar los 150 caracteres.',
    'especialidad.required' => 'La especialidad es obligatoria.',
    'especialidad.string'   => 'La especialidad debe ser una cadena de texto.',

    // Fecha de alta
    'fecha_alta.date' => 'La fecha de alta no es válida.',

    // Salario
    'salario.decimal' => 'El salario debe tener como máximo 2 decimales.',
    'salario.gte'     => 'El salario no puede ser inferior a 0.',
    'salario.numeric' => 'El salario debe ser un número.',

    // Nombre
    'nombre.max'      => 'El nombre no puede superar los 100 caracteres.',
    'nombre.min'      => 'El nombre debe tener al menos 2 caracteres.',
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.string'   => 'El nombre debe ser una cadena de texto.',
];

private const RULES = [
    'nombre'       => 'required|string|max:100|min:2',
    'apellidos'    => 'required|string|max:130|min:3',
    'especialidad' => 'required|string|max:150',
    'fecha_alta'   => 'nullable|date',
    'salario'      => 'nullable|numeric|gte:0|decimal:0,2'
];
    public function index(): View
    {
        $profesores = Profesor::all();

        return view('profesor.index', [
            'profesores' => $profesores
        ]);
    }


    public function create(): View
    {
        return view('profesor.create');
    }


    public function store(Request $request): RedirectResponse
    {
        
        $validator = Validator::make(
            $request->all(),
            self::RULES,
            self::MESSAGES
        );

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $profesor = new Profesor($request->all());

        try {

            $profesor->save();

        } catch (Exception $e) {

            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Ha ocurrido un error al crear el profesor.'
                ]);
        }

        return redirect()
            ->route('profesor.index')
            ->with([
                'success' => 'Profesor creado correctamente.'
            ]);
    }


    public function show(Profesor $profesor): View
    {
        return view('profesor.show', [
            'profesor' => $profesor
        ]);
    }


    public function edit(Profesor $profesor): View
    {
        return view('profesor.edit', [
            'profesor' => $profesor
        ]);
    }


    public function update(
        Request $request,
        Profesor $profesor
    ): RedirectResponse
    {
        

        $validator = Validator::make(
            $request->all(),
            self::RULES,
            self::MESSAGES
        );

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        try {

            $profesor->update($request->all());

        } catch (Exception $e) {

            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Ha ocurrido un error al editar el profesor.'
                ]);
        }

        return redirect()
            ->route('profesor.index')
            ->with([
                'success' => 'Profesor editado correctamente.'
            ]);
    }


    public function destroy(Profesor $profesor): RedirectResponse
    {
        try {

            $profesor->delete();

        } catch (Exception $e) {

            return back()->withErrors([
                'error' => 'Ha ocurrido un error al borrar el profesor.'
            ]);
        }

        return redirect()
            ->route('profesor.index')
            ->with([
                'success' => 'Profesor eliminado correctamente.'
            ]);
    }
}