<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2 ">
            {{-- VIDEO --}}
            <div class="embed-responsive">
                {!!$lesson->iframe!!} {{-- Esto permite la visualizacion del iframe(VIDEO) --}}
            </div>

            <h1 class="text-3xl text-gray-600 font-bold mt-4">{{$lesson->name}}</h1>
            {{-- DESCRIPCION DE DE LA LECCION, SI EXISTE --}}
            @if ($lesson->description)
                <div class="text-gray-600">
                    {{$lesson->description->name}}
                </div>
            @endif
            {{-- BOTONES NEXT AND PREVIOUS --}}
            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                    <a wire:click="changeLesson({{$this->previous}})" class=" cursor-pointer " href="">Anterior</a>
                    @endif
                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer " href="">Siguiente</a>
                    @endif
                </div>
            </div>

        </div>
        <div class="card card-body " >
            <div>
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div class="ml-2">
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm" href="">
                        {{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>
                <a class="btn btn-danger btn-block mt-4 mb-4" href="{{$course->link}}">Videollamada</a>
                <ul>
                        @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4" >
                            <a class="font-bold text-base inline-block mb-2" href="">{{$section->name}}</a>
                            <ul class="mb-2">
                                @foreach ($section->lessons as $lesson)
                                <li>
                                    <a class=" cursor-pointer" wire:click='changeLesson({{$lesson}})'><i class="fas fa-play-circle text-gray-600" aria-hidden="true"></i> {{$lesson->name}}</a>
                                </li>

                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                </ul>
            </div>

        </div>

    </div>
</div>
