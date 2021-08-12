<x-app-layout>
    @livewire('navigation-category')
    <!--DESCRIPCION Y FIGURA-->
    <section class="bg-indigo-600 py-12 mb-12 text-white" >
        <div class="container grid lg:grid-cols-2 grid-cols-1 gap-6">
            <figure>
                <img class="rounded-lg h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>

            <div>
                <h1 class="text-3xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2" > <i class="fas fa-sitemap"></i> Categoria: {{$course->category->name}}</p>
                <p class="mb-2" > <i class="fas fa-users"></i> Registrados: {{$course->students_count}}</p>
                <p class="mb-2" > <i class="fas fa-star"></i> Calificación: {{$course->rating}}</p>
                <p class="mb-2"><i class="fas fa-calendar-week"></i> Dias: {{$course->week}}</p>
                <p class="mb-2"><i class="fas fa-clock"></i> Hora: {{$course->hourStart}} - {{$course->hourEnd}}</p>
            </div>
        </div>
    </section>
    <!--OBJETIVOS-->
    <div class="container grid lg:grid-cols-3 grid-cols-1 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
                <section class="card mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-2xl mb-2"> Objetivos</h1>
                            <ul class="grid grid-cols-1  md:grid-cols-2 gap-x-6 gap-y-2">
                                @foreach ($course->goals as $goal)
                                <li class="text-gray-700 text-base"> <i class="fas fa-check text-gray-600  mr-2" aria-hidden="true"></i>
                                    {{$goal->name}}
                                </li>
                                @endforeach
                            </ul>
                    </div>
                </section>
                    <!--SECCIONES -CONTENIDO -->
                <section>
                    <h1 class="font-bold text-2xl mb-12 ">Contenido</h1>
                    @foreach ($course->sections as $section)
                        <article class="mb-4 shadow"
                            @if ($loop->first)
                                x-data="{open: true}"

                            @else
                                x-data="{open: false}"
                            @endif>

                            <header class="border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                                <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                            </header>
                            <div class="bg-white py-2 px-4" x-show="open">
                                <ul class="grid grid-cols-1 gap-2">
                                    @foreach ($section->lessons as $lesson)
                                        <li class="text-gray-700 text-base">
                                            <a href="{{route('courses.status', $course)}}"><i class="fas fa-play-circle text-gray-600" aria-hidden="true"></i>
                                            {{$lesson->name}}
                                        </a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endforeach
                </section>
                    <!--DESCRIPCION-->
                <section>
                    <h1 class="font-bold text-3xl">Descripcion</h1>

                    <div class="text-gray-700 text-base">
                        {{$course->description}}
                    </div>
                </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Voluntario: {{$course->teacher->name}}</h1>
                            <a  class="text-blue-400 text-sm font-bold" href ="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    {{-- <a class="btn btn-danger btn-block mt-4" href="{{}}">Registrase</a> --}}

                   @can('enrolled', $course)
                        <a class="btn btn-danger btn-block mt-4" href="{{route('courses.status', $course)}}">Ver contenido</a>


                   @else
                        <form action="{{route('courses.enrolled', $course)}}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-block mt-4" type="submit">Registrarse</button>
                        </form>
                   @endcan

                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                <article class="flex mb-6">
                    <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
                    <div class="ml-3">
                        <h1><a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a></h1>
                        <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                            <p class="font-bold text-gray-700 text-sm ml-2">Voluntario: {{$course->teacher->name}}</p>
                        </div>
                        <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                    </div>
                </article>
                @endforeach
            </aside>
        </div>
    </div>


</x-app-layout>
