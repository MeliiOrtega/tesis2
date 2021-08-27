<div>
    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0">
          <div class="flex flex-wrap items-center px-4 py-2">
            <div class="relative w-full max-w-full flex-grow flex-1">
              <h3 class="font-semibold text-base text-indigo-600">Rating de actividades</h3>
            </div>
            <div class="relative w-full max-w-full flex-grow flex-1 text-right">
              <a class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" href="{{route('admin.courses.aprobado')}}">Ver más</a>
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            @if ($courses->count())
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                  <tr>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-2 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Actividad</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-2 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Valoracion</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr class="text-gray-700 dark:text-gray-100">
                        <th class="border-t-0 pl-2 align-middle border-l-0 border-r-0 whitespace-normal p-2 text-left">
                            <p class="text-xs">{{$course->title}}</p>
                            <p class="text-xs text-gray-500">{{$course->category->name}}</p>

                        </th>
                        <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-2">
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

                      </tr>
                    @endforeach


                </tbody>
              </table>
            @else
            <div class="px-6 py-4">
                No hay actividades
              </div>

            @endif

          </div>
        </div>
      </div>

</div>
