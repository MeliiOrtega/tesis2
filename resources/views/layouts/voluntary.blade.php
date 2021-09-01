<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">
                <aside>
                    <h1 class="font-bold text-lg mb-4"> Edición de la actividad</h1>
                    <ul class="text-sm text-gray-600 mb-4">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('voluntary.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('voluntary.courses.edit', $course)}}">Información de la Actividad</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('voluntary.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('voluntary.courses.curriculum', $course)}}">Contenido de la Actividad</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('voluntary.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('voluntary.courses.goals', $course)}}">Objetivos de la Actividad</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('voluntary.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('voluntary.courses.students', $course)}}">Adultos Mayores</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('voluntary.courses.reviews', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('voluntary.courses.reviews', $course)}}">Reviews</a>
                        </li>
                        @if ($course->observation)
                        <li class="leading-7 mb-1 border-l-4 @routeIs('voluntary.courses.observation', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('voluntary.courses.observation', $course)}}">Observaciones</a>
                        </li>
                        @endif
                    </ul>

                    @switch($course->status)
                        @case(1)
                        <form action="{{route('voluntary.courses.status', $course)}}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Solicitar revisión</button>
                        </form>
                            @break
                        @case(2)
                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Esta actividad se encuentra en revisión
                                </div>
                            </div>
                            @break
                        @default
                        @case(3)
                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Esta actividad se encuentra publicada
                                </div>
                            </div>
                            @break

                    @endswitch


                </aside>

                <!--FORMULARIO -->
                <div class="card col-span-4">
                    <main class="card-body">
                        {{$slot}}

                    </main>
                </div>
            </div>
        </div>

        @stack('modals')
        @livewireScripts

    @isset($js)
        {{$js}}
    @endisset

    </body>
</html>
