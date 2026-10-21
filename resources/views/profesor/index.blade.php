@extends('template.base')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-10 mx-auto">

            <div class="mb-3">
                <a href="{{ route('profesor.create') }}" class="btn btn-secondary">
                    Crear profesor
                </a>
            </div>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Especialidad</th>
                        <th>Fecha de alta</th>
                        <th>Salario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($profesores as $profesor)

                        <tr>

                            <td>{{ $profesor->id }}</td>

                            <td>{{ $profesor->nombre }}</td>

                            <td>{{ $profesor->apellidos }}</td>

                            <td>{{ $profesor->especialidad }}</td>

                            <td>{{ $profesor->fecha_alta }}</td>

                            <td>{{ $profesor->salario }}</td>

                            <td>

                                <a href="{{ route('profesor.show', $profesor) }}"
                                   class="btn btn-secondary">
                                    View
                                </a>

                                <a href="{{ route('profesor.edit', $profesor) }}"
                                   class="btn btn-secondary">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('profesor.destroy', $profesor) }}"
                                    method="post"
                                    style="display:inline-block"
                                >

                                    @csrf
                                    @method('delete')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que quieres borrar este profesor?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection