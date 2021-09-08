@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
{{-- Header del dashboard TOTAl user, AM, voluntario, actividad --}}

    <div class="grid lg:grid-cols-4  grid-cols-2 gap-4">
        <div class="bg-indigo-600 py-2 rounded-lg">
            <div class="flex px-2 justify-around">
                <i class="fas fa-users text-white  text-4xl text-center py-4"></i>
                <div class="ml-4">

                    <h2 class="text-white px-4 text-4xl text-center"><span>{{$count_user}}</span></h2>
                    <hr class=" bg-indigo-400 my-2">
                    <h3 class="text-white px-2 font-semibold">Total de Usuarios</h3>
                </div>
            </div>
        </div>

        <div class="bg-pink-600 py-2 rounded-lg">
            <div class="flex px-2 justify-around">
                <i class="fas fa-user-friends text-white  text-4xl text-center py-4"></i>
                <div class="ml-4">

                    <h2 class="text-white px-4 text-4xl text-center"><span>{{$count_adult}}</span></h2>
                    <hr class=" bg-pink-400 my-2">
                    <h3 class="text-white px-2 font-semibold">Adultos Mayores</h3>
                </div>
            </div>
        </div>

        <div class="bg-green-600 py-2 rounded-lg">
            <div class="flex px-2 justify-around">
                <i class="fas fa-chalkboard-teacher text-white  text-4xl text-center py-4"></i>

                <div class="ml-4">

                    <h2 class="text-white px-4 text-4xl text-center"><span>{{$count_voluntary}}</span></h2>
                    <hr class=" bg-green-400 my-2">
                    <h3 class="text-white px-2 font-semibold">Voluntarios</h3>
                </div>
            </div>
        </div>

        <div class="bg-purple-600 py-2 rounded-lg">
            <div class="flex px-2 justify-around">

                <i class="fas fa-chalkboard text-white  text-4xl text-center py-4"></i>
                <div class="ml-4">

                    <h2 class="text-white px-4 text-4xl text-center"><span>{{$count_course}}</span></h2>
                    <hr class=" bg-purple-400 my-2">
                    <h3 class="text-white px-2 font-semibold">Actividades</h3>
                </div>
            </div>
        </div>

    </div>


    <div class="grid lg:grid-cols-2 gap-4 my-4 grid-cols-1">
        <div class="">

            @livewire('admin.rating-activity')
        </div>

        <div>
           @livewire('admin.user-last')
        </div>

        <div>
            @livewire('admin.activity-pendiente')
         </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
   {{--  @livewireStyles --}}

    <!-- Scripts -->

@stop

@section('js')

    <script src="{{ mix('js/app.js') }}" defer></script>
   {{--  @livewireScripts --}}

@stop
