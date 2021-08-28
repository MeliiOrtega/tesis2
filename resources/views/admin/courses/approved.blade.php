@extends('adminlte::page')

@section('title', 'Momment')

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
            <table class="table table-striped">
                <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Nombre</th>
                            <th>Calificacion</th>
                            <th>Adultos Registrados</th>
                            <th></th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                       {{--  <td>{{$course->id}}</td> --}}
                        <td><div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{$course->title}}
                            </div>
                            <div class="text-sm text-gray-500">
                              {{$course->category->name}}
                            </div>
                          </div></td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 flex items-center">{{$course->rating}}
                              <ul class="flex text-sm ml-2">
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
                        <td>{{$course->students_count}}
                            <a href="{{route('admin.courses.user', $course)}}">Adultos Mayores</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
