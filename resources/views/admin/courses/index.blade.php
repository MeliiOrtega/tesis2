@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Actividades Pendientes de aprobación</h1>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
     <div class="card">
        <div class="card-body">
            <table id="user" class="table table-striped">
                <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Voluntario</th>
                            <th></th>

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
                        
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
        
    </div>

    {{-- @livewire('admin.pendientes') --}}
@stop



@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
   
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
         $('#user').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando la página  _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
    </script>
@stop
