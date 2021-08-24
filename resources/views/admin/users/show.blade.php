<div>
    <p>{{$user->name}}</p>
    {{-- @foreach ($user->courses_dictated as $course)
    
        
    @endforeach --}}
  


    <x-table-responsive>
          @if($user->courses_dictated->count())
          <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr></tr>
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
                    
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($user->courses_dictated as $course)
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
                  </tr>
                  @endforeach
                  <!-- More people... -->
                </tbody>
                
              </table>
             {{--  <div class="px-6 py-4">
                {{$user->courses_dictated->links()}}
                {{$user->courses_dictated->links('vendor.pagination.bootstrap-4')}}
            </div> --}}
             
            @else
              <div class="px-6 py-4 font-bold">
                No hay actividades
              </div>
            @endif
    </x-table-responsive>
        
   
</div>