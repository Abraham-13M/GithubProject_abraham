@extends('template.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">

            <div class="card text-center">

                <div class="card-body">

                    <h3 class="card-title">
                        {{ $profesor->nombre }} {{ $profesor->apellidos }}
                    </h3>

                    <p class="card-text">
                        <strong>Especialidad:</strong>
                        {{ $profesor->especialidad }}
                    </p>

                    <p class="card-text">
                        <strong>Fecha de alta:</strong>
                        {{ $profesor->fecha_alta }}
                    </p>

                    <p class="card-text">
                        <strong>Salario:</strong>
                        {{ $profesor->salario }}
                    </p>

                    <a href="{{ route('profesor.index') }}"
                       class="btn btn-secondary">
                        Volver
                    </a>

                    <a href="{{ route('profesor.edit', $profesor) }}"
                       class="btn btn-secondary">
                        Editar
                    </a>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection