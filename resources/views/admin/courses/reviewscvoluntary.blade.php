@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Reviews de la actividad: <span>{{$course->title}}</span></h1>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
     <!-- Styles -->
     <link rel="stylesheet" href="{{ mix('css/app.css') }}">
     {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
         <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
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
            @if ($course->reviews->count())
            <table id="user" class="table table-striped">
                <thead>
                        <tr>
                            <th>Adulto Mayor</th>
                            <th>Calificación</th>
                            <th>Comentario</th>
                            

                        </tr>
                </thead>
                <tbody>
                    @foreach ($course->reviews as $review)
                    <tr>

                        <td>{{$review->user->name}}</td>
                        <td>
                            <div class="flex">
                                <span>{{$review->rating}} </span>
                                <ul class="flex text-sm">
                                    <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=1 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star  text-{{$review->rating >=2 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=3 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=4 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$review->rating ==5 ? 'yellow' : 'gray'}}-400"></i></li>
                                </ul>

                                
                            </div></td>
                        <td>{{$review->comment}}</td>
                        
                    </tr>

                    @endforeach
                </tbody>

            </table>
            @else
                <p>No hay valoraciones</p>
            @endif
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
