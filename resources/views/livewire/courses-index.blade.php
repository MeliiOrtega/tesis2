<div>
    <!--BARRA DE NAVEGACION-->
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
             <!--TODAS LAS CATEGORIAS-->
                <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todas las actividades
                </button>


            <!-- Dropdown -->
            <div class="relative" x-data="{ open: false }">
                    <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"  x-on:click="open = !open">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm m-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show = "open" x-on:click.away = "open = false">
                    <!--CATEGORIAS-->
                    @foreach ($categories as $category)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-red-500 hover:text-white" wire:click="$set('category_id',{{$category->id}})" x-on:click="open=false">{{$category->name}}</a>
                    @endforeach
                    </div>

                </div>
                <!--DROPDOWM BODY-->
            </div>
            <!--DROPDOWM -->

        </div>

    </div>

    <p>Categoria : {{$category_id}}</p>

    <!--LISTADO DE ACTIVIDADES-->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($courses as $course)
            <article class="bg-write shadow-lg rounded overflow-hidden">
               <img class = "h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">

                <div class="px-6 py-4">
                        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($course->title, 40)}}</h1>
                        <p class="text-gray-500 text-sm mb-2">Voluntario: {{$course->teacher->name}}</p>

                        <!--Estrellas-->
                            <div class="flex">
                                <ul class="flex text-sm"></ul>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star  text-{{$course->rating >=2 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating ==5 ? 'yellow' : 'gray'}}-400"></i></li>
                                </ul>

                                <p class="text-sm text-gray-500 ml-auto">
                                    <i class="fas fa-users"></i>
                                    {{$course->students_count}}
                                </p>
                            </div>
                        <a href = "{{route('courses.show',$course)}}"class="block text-center w-full mt-4 bg-red-600
                        hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Más información
                        </a>
                </div>
            </article>
        @endforeach

    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
</div>

{{-- COMENTARIO: LA VISTA DE ESTE LIVEWIRE NO ES, EL ARCHIVO CORRESPONDIENTE A ESTE ESTA EN LA CARPETA
COURSES -> INDEX.BLADE.PHP --}}

