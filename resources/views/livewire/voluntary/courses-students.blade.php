<div>

    <h1 class="text-2xl font-bold mb-4">ADULTOS MAYORES</h1>

    <x-table-responsive>
        <div class="px-6 py-4">
          <input  wire:model="search" class="form-input rounded-md w-full shadow-sm" placeholder="  Ingrese el nombre" type="text">

        </div>

          @if($students->count())
          <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr></tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      email
                    </th>
                    <th>
                        Calificación
                    </th>
                    <th>
                        
                    </th>

                    {{-- <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th> --}}
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($students as $student)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">

                          <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="">

                        </div>

                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{$student->name}}
                          </div>

                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900 center">{{$student->email}}</div>

                    </td>

                    <td>
                        @if ($student->reviews->count())
                        @foreach ($student->reviews as $review)
                                    {{$review->rating}}

                                    @endforeach

                        @else
                        <p>No hay calificación</p>

                        @endif
                    </td>


                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div x-data="{ showModal : false }">
                            <!-- Button -->
                            <button @click="showModal = !showModal" class="px-4 py-2 text-sm btn btn-blue">Ver</button>

                            <!-- Modal Background -->
                            <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal -->
                                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-10/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                    <!-- Title -->
                                    <span class="font-bold block text-2xl mb-3">Datos personales</span>
                                    <!-- Some beer 🍺 -->
                                    {{$student->name}}
                                    {{$student->email}}
                                    {{$student->phone}}
                                    {{$student->fecha}}
                                    <br>


                                    <!-- Buttons -->
                                    <div class="text-right space-x-5 mt-5">
                                        <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Cerrar</button>

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
                  {{$students->links()}}
              </div>
            @else
              <div class="px-6 py-4">
                No hay ninguna coincidencia
              </div>
            @endif
    </x-table-responsive>
</div>
