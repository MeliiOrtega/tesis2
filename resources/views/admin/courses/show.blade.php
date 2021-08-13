<x-app-layout>
    @livewire('navigation-category')
    <!--DESCRIPCION Y FIGURA-->
    <section class="bg-indigo-600 py-12 mb-12 text-white" >
        <div class="container grid lg:grid-cols-2 grid-cols-1 gap-6">
            <figure>
                @if($course->image)
                <img class="rounded-lg h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                <img class="rounded-lg h-60 w-full object-cover" src="https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endif
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
    <div class="container grid grid-cols-1 lg:grid-cols-3  gap-6">
      @if(session('info'))
            <div class="lg:col-span-2" x-data="{open:true}" x-show="open">
                <div class="relative py-3 pl-4 pr-10 leading-normal text-red-800 bg-red-100 rounded-lg" role="alert">
                    <strong class="font-bold ml-2" >¡Ocurrio un error!</strong>
                    <span class="ml-2">{{session('info')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg x-on:click="open=false" class="w-4 h-4  fill-current text-red-500" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </span>
                  </div>
        </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">
                <section class="card mb-12">
                    <div class="card-body">
                        <h1 class="font-bold text-2xl mb-2"> Objetivos</h1>
                            <ul class="grid grid-cols-1  md:grid-cols-2 gap-x-6 gap-y-2">
                                @forelse ($course->goals as $goal)
                                    <li class="text-gray-700 text-base"> <i class="fas fa-check text-gray-600  mr-2" aria-hidden="true"></i>
                                        {{$goal->name}}
                                    </li>
                                @empty
                                    <li class="text-gray-700 text-base">Esta actividad no tiene asignado ningún objetivo</li>
                                @endforelse
                            </ul>
                    </div>
                </section>
    <!--SECCIONES -CONTENIDO -->
                <section>
                    <h1 class="font-bold text-2xl mb-10 ">Contenido</h1>
                    @forelse ($course->sections as $section)
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
                        @empty
                            <article class="card">
                                <div class="card-body">
                                    Esta actividad no tiene asignado ningún contenido
                                </div>
                            </article>
                    @endforelse
                </section>

    <!--DESCRIPCION-->
                <section>
                    <h1 class="font-bold text-2xl mt-10 mb-10">Descripcion</h1>

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
                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-full">Aprobar Actividad</button>
                    </form>

                </div>
            </section>
        </div>
    </div>


</x-app-layout>
