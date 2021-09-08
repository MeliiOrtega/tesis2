<div class='container py-8'>
    @if(session('info'))
    <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
        {{session('info')}}
    </div>
    @endif
    <x-table-responsive>
        <div class="px-6 py-4 flex">
          <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm" placeholder="Ingrese el nombre de una Actividad">
            <a class="btn btn-danger ml-2" href="{{route('voluntary.courses.create')}}">Crear nueva actividad</a>
        </div>

          @if($courses->count())
          <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Registrados
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Valoración Actividad
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Estado
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative py-3">
                        <span class="sr-only">Eliminar</span>
                      </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($courses as $course)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          @isset($course->image)
                          <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                          @else
                          <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">


                          @endisset
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{$course->title}}
                          </div>
                          <div class="text-sm text-gray-500">
                            {{$course->category->name}}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900 center">{{$course->students->count()}}</div>
                      <div class="text-sm text-gray-500">Adultos Mayores</div>
                    </td>
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

                    <td class="px-6 py-4 whitespace-nowrap">
                    @switch($course->status)
                      @case(1)
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Borrador
                      </span>
                        @break
                        @case(2)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                          Revisión
                        </span>
                        @break
                        @case(3)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          Publicado
                        </span>
                        @break
                      @default
                    @endswitch


                    </td>

                    <td class="pl-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="{{route('voluntary.courses.edit', $course)}}" class="btn btn-blue">Ver/Editar</a>
                    </td>
                    <td class="pr-4 py-4 whitespace-nowrap text-sm font-medium">
                        
                        <div x-data="{ open: false }">

                                <!-- Button (blue), duh! -->
                                <button class="px-4 py-2 text-white btn btn-danger rounded select-none no-outline focus:shadow-outline" @click="open = true">Eiminar</button>
                        
                                <!-- Dialog (full screen) -->
                                <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >
                        
                                <!-- A basic modal dialog with title, body and one button to close -->
                                <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4">
                                        <i class="fas fa-exclamation-circle font-bold text-6xl text-red-600 mb-2"></i>
                                    <h3 class=" font-medium leading-6 text-gray-900 text-2xl">
                                        Confirmar
                                    </h3>
                        
                                    <div class="mt-2 whitespace-normal ">
                                        <p class="text-3xl leading-normal text-gray-500">
                                        ¿Esta seguro que desea eliminar la actividad: 
                                        <span class="font-bold text-indigo-700">{{$course->title}}</span>?
                                        </p>
                                    </div>
                                </div>
                        
                                    <!-- One big close button.  --->
                                    <div class="mt-5 sm:mt-6">
                                        <div class="flex justify-center text-2xl">
                                            <div class="mr-4">
                                                <form action="{{route('voluntary.courses.destroy', $course)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                                </form>
                                            </div>
                                            <div>
                                                <button @click="open = false" class="inline-flex  px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                                    Cancelar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                        
                                </div>
                                </div>
                        </div>
                                                
                      </td>
                  </tr>
                  @endforeach
                  <!-- More people... -->
                </tbody>
              </table>
              <div class="px-6 py-4">
                  {{$courses->links()}}
              </div>
            @else
              <div class="px-6 py-4">
                No hay ninguna coincidencia
              </div>
            @endif
    </x-table-responsive>

    </div>


