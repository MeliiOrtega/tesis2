@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Actividades Pendientes de aprobación</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    {{-- <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Voluntario</th>

                        </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>

                        <td>{{$course->title}}</td>
                        <td>{{$course->category->name}}</td>
                        <td>{{$course->teacher->name}}</td>

                        <td>
                            <a class="btn btn-primary"href="{{route('admin.courses.show', $course)}}">Revisar</a>
                        </td>
                        <td></td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div> --}}

    @livewire('admin.pendientes')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
