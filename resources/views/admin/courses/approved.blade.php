@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Actividades Aprobadas</h1>
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
                            <th>Calificacion</th>
                            <th>Adultos Registrados</th>
                            <th></th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                       
                        <td>
                            <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{$course->title}}
                            </div>
                            <div class="text-sm text-gray-500">
                              {{$course->category->name}}
                            </div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 flex items-center">
                              <ul class="flex text-sm ml-2">
                                {{$course->rating}}
                                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star  text-{{$course->rating >=2 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'gray'}}-400"></i></li>
                                <li class="mr-1"><i class="fas fa-star text-{{$course->rating ==5 ? 'yellow' : 'gray'}}-400"></i></li>
                            </ul>
                            </div>

                          </td>
                        {{-- <td>
                            <a class="btn btn-primary"href="{{route('admin.courses.show', $course)}}">Revisar</a>
                        </td> --}}
                        <td>{{$course->students_count}} Adultos mayores</td>

                        <td><a href="{{route('admin.courses.user', $course)}}" class="btn btn-primary">Registrados</a>
                            <a href="{{route('admin.courses.reviewsvoluntary', $course)}}" class="btn btn-primary">Valoraciones</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    @stop

@section('js')
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
