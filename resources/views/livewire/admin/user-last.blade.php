<div>
    <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0">
          <div class="flex flex-wrap items-center px-4 py-2">
            <div class="relative w-full max-w-full flex-grow flex-1">
              <h3 class="font-semibold text-base text-indigo-600">Últimos usuarios registrados</h3>
            </div>
            <div class="relative w-full max-w-full flex-grow flex-1 text-right">
              <a class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" href="{{route('admin.users.index')}}">Ver más</a>
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            @if ($users->count())
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                  <tr>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-2 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Nombre</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-2 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Email</th>
                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-2 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Rol</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="text-gray-700 dark:text-gray-100">
                        <th class="border-t-0 pl-2 align-middle border-l-0 border-r-0 whitespace-normal p-2 text-left text-sm">
                            {{$user->name}}

                            <th class="border-t-0 px-2 align-middle border-l-0 border-r-0 whitespace-normal p-2 text-left text-xs">
                                {{$user->email}}

                        </th>
                        <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 whitespace-nowrap p-2 text-sm">
                            {{$user->role}}
                        </td>

                      </tr>
                    @endforeach


                </tbody>
              </table>
            @else
            <div class="px-6 py-4">
                No hay usuarios
              </div>

            @endif

          </div>
        </div>
      </div>
</div>
