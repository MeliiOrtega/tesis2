<div>
    <div class="card">
        <div class="card-header">
                <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre">
        </div>

        @if ($users->count())

        <div class="card-body">
            <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Nombre</th>
                    <th>Correo electronico</th>
                    <th>Rol</th>
                    <th></th>
                    <th></th>
                <tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    {{-- <td>{{$user->id}}</td> --}}
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td width="10px">
                        <a class="btn btn-blue"href="{{route('admin.users.edit', $user)}}">Ver/Editar</a>
                    </td>
                    <td width="10px">
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
                                    ¿Esta seguro que desea eliminar al usuario: 
                                    <span class="font-bold text-indigo-700">{{$user->name}}</span>?
                                    </p>
                                </div>
                            </div>
                    
                                <!-- One big close button.  --->
                                <div class="mt-5 sm:mt-6">
                                    <div class="flex justify-center text-3xl">
                                        <div class="mr-4">
                                            <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </div>
                                        <div>
                                            <button @click="open = false" class="inline-flex  px-4 py-2 text-white btn btn-blue">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                            </div>
                    </div>
                        
                    </td>
                <tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>

        @else
        <div  class="card-body">
            <strong>No hay Registros</strong>
        </div>

        @endif

    </div>

</div>
