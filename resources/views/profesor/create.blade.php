@extends('template.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">

            <form action="{{ route('profesor.store') }}" method="post" novalidate>

                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>

                    <input
                        type="text"
                        value="{{ old('nombre') }}"
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        maxlength="100"
                        placeholder="Introduce el nombre del profesor"
                    >

                    @error('nombre')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>

                    <input
                        type="text"
                        value="{{ old('apellidos') }}"
                        class="form-control"
                        id="apellidos"
                        name="apellidos"
                        maxlength="130"
                        placeholder="Introduce los apellidos"
                    >

                    @error('apellidos')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="especialidad" class="form-label">
                        Especialidad
                    </label>

                    <input
                        type="text"
                        value="{{ old('especialidad') }}"
                        class="form-control"
                        id="especialidad"
                        name="especialidad"
                        maxlength="150"
                        placeholder="Introduce la especialidad"
                    >

                    @error('especialidad')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="fecha_alta" class="form-label">
                        Fecha de alta
                    </label>

                    <input
                        type="date"
                        value="{{ old('fecha_alta') }}"
                        class="form-control"
                        id="fecha_alta"
                        name="fecha_alta"
                    >

                    @error('fecha_alta')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="salario" class="form-label">
                        Salario
                    </label>

                    <input
                        type="number"
                        value="{{ old('salario') }}"
                        class="form-control"
                        id="salario"
                        name="salario"
                        min="0"
                        step="0.01"
                        placeholder="Introduce el salario"
                    >

                    @error('salario')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-secondary">
                    Crear profesor
                </button>

                <a href="{{ route('profesor.index') }}"
                   class="btn btn-secondary">
                    Volver
                </a>

            </form>

        </div>
    </div>
</div>

@endsection