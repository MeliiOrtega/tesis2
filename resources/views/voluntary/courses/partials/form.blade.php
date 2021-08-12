<div class="mb-4">
    {!! Form::label('title','Título de la actividad') !!}
    {!! Form::text('title', null, ['class' => 'form-control rounded-md block w-full mt-1'. ($errors->has('title') ? ' border-red-500'  : '')]) !!}

    @error('title')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug de la actividad') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly' ,'class' => 'form-control bg-gray-200 rounded-md block w-full mt-1']) !!}

    @error('slug')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Título de la actividad') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}

    @error('subtitle')
    <strong class="text-xs  text-red-600">{{$message}}</strong>
@enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción de la actividad') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control rounded-md block w-full mt-1 h-20 ']) !!}

    @error('description')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>

<div class="mb-4">
    {!! Form::label('category_id', 'Categoría:') !!}
    {!! Form::select('category_id', $categories, null, ['class'=> 'form-control rounded-md block w-full mt-1']) !!}
</div>

<div class="mb-4">
    {!! Form::label('week', 'Dias de la semana') !!}
    {!! Form::text('week', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}

    @error('week')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>

<div class="grid grid-cols-2 gap-6">
    <div class="mb-4">
        {!! Form::label('hourStart', 'Hora de inicio') !!}
        {!! Form::time('hourStart', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
        @error('hourStart')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
    </div>

    <div class="mb-4">
        {!! Form::label('hourEnd', 'Hora de fin') !!}
        {!! Form::time('hourEnd', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
        @error('hourEnd')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
    </div>
</div>

<div class="mb-4">
    {!! Form::label('link', 'Enlace de la reunion (ZOOM / MEET/ ETC') !!}
    {!! Form::text('link', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
    @error('link')
    <strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>
<h1 class="text-2xl font-bold mt-8 mb-2">Imagen de la Actividad</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
    @isset($course->image)
        <img id="picture" class="w-full rounded-md h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
    @else
        <img id="picture" class="w-full rounded-md h-64 object-cover object-center" src="https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
 @endisset
    </figure>


    <div>
        <p class="mb-2">Seleccione una imagen jpg, jpeg, png. </p>
        {!! Form::file('file', ['class' => 'form-control w-full', 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
</div>
