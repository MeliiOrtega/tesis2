<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 class="cursor-pointer" x-on:click="open = !open">Descripción del video</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="w-full"></textarea>
                        @error('description.name')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button  wire:click="destroy" class="btn btn-danger text-sm" type="button">Eliminar</button>
                            <button  class="btn btn-blue text-sm  ml-2" type="submit">Actualizar</button>
                        </div>
                    </form>
                @else
                <div>
                    <textarea wire:model="name" class="w-full" placeholder="Agregar descripción del video"></textarea>
                    @error('name')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex justify-end">

                        <button wire:click="store" class="btn btn-blue text-sm  ml-2" type="submit">Agregar</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </article>
</div>
