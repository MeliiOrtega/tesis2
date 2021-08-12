<div>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <h1 class="text-2xl font-bold">CONTENIDO DE LA ACTIVIDAD</h1>

    <hr class="mt-2 mb-6">

   {{--  {{$section}} --}}


    <div  x-data="{ open: false }" >
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer" >
            <i class="far fa-plus-square text-red-500 text-2xl mr-2"></i>
            Agregar un nuevo video al contenido
        </a>

        <article class="card" x-show="open"  x-on:click.away = "open = false">
            <div class="card-body bg-indigo-100">
                <h1 class="text-xl font-bold mb-4">Agregar un nuevo video al contenido</h1>
                <div class="mb-4">
                    <input wire:model="name" class="w-full rounded-md" type="text" placeholder="Escriba el nombre de la sección">
                    @error('name')
                        <span class="text-red-500 text-xs">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-blue ml-2" wire:click="store">Aceptar</button>
                </div>
            </div>
        </article>
    </div>

    @foreach ($course->sections as $item)

        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-indigo-100 mt-3">
                @if ($section->id == $item->id)

                    <form wire:submit.prevent="update"  >
                        <input class="w-full mb-2" wire:model="section.name" type="text" placeholder="Ingrese el nombre de la sección">
                        @error('section.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    </form>

                @else

                <header class="flex justify-between items-center">
                    <h1 x-on:click="open = !open" class="cursos-pointer"><strong>Titulo: </strong>{{$item->name}}</h1>
                    <div>
                        <i class="fas fa-edit text-blue-500" wire:click="edit({{$item}})" title="Editar"></i>
                        <i class="fas fa-eraser text-red-500" wire:click="destroy({{$item}})" title="Eliminar"></i>
                    </div>
                </header>

                <div x-show="open">
                    @livewire('voluntary.courses-lesson',['section' => $item], key($item->id))
                </div>
                @endif



            </div>
        </article>
    @endforeach


</div>
