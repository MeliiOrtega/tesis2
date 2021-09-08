<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informacion de Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Aqui puedes modificar los datos registrados') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-2 row-span-4 {{-- col-span-6 sm:col-span-4 --}}">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Foto de perfil') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-2xl h-52 w-52 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Seleccionar nueva foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Eliminar foto') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        @if ($this->user->role != 'voluntario')
        <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2"></div>
        @endif

        <!-- Name -->
        <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
            <x-jet-label for="name" value="{{ __('Nombre') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
            <x-jet-label for="email" value="{{ __('Correo electronico') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        @if ($this->user->role != 'voluntario')
        <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2"></div>
        <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2"></div>
        @endif

        <!-- Fecha de nacimiento -->
         <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
            <x-jet-label for="fecha" value="{{ __('Fecha de nacimiento') }}" />
            <x-jet-input id="fecha" type="date" max="2003-12-31" class="mt-1 block w-full" wire:model.defer="state.fecha" />
            <x-jet-input-error for="fecha" class="mt-2" />
        </div>

        @if ($this->user->role != 'voluntario')
        <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
            <x-jet-label for="phone" value="{{ __('Celular') }}" />
                <x-jet-input id="phone" type="tel" minlength="10" maxlength="10"  class="mt-1 block w-full" wire:model.defer="state.phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>
        @endif
         <!-- Celular -->


            @if ($this->user->role == 'voluntario')
            <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-4">
                <x-jet-label for="direccion" value="{{ __('Dirección') }}" />
                    <x-jet-input id="direccion" type="tel" minlength="10" maxlength="10" class="mt-1 block w-full" wire:model.defer="state.direccion" />
                    <x-jet-input-error for="direccion" class="mt-2" />
                </div>

                <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
                    <x-jet-label for="phone" value="{{ __('Celular') }}" />
                        <x-jet-input id="phone" type="tel" class="mt-1 block w-full" wire:model.defer="state.phone" />
                        <x-jet-input-error for="phone" class="mt-2" />
                    </div>

            <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
                <x-jet-label for="cedula" value="{{ __('Cedula') }}" />
                    <x-jet-input id="cedula" type="number" class="mt-1 block w-full" wire:model.defer="state.cedula" />
                    <x-jet-input-error for="cedula" class="mt-2" />
                </div>


                <div class="{{-- col-span-6 sm:col-span-4 --}} col-span-2">
                    <x-jet-label for="ocupacion" value="{{ __('Ocupación') }}" />
                        <x-jet-input id="ocupacion" type="text" class="mt-1 block w-full" wire:model.defer="state.ocupacion" />
                        <x-jet-input-error for="ocupacion" class="mt-2" />
                    </div>



            @endif





    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardando.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Actualizar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
