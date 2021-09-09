@extends('adminlte::page')

@section('title', 'Moment')

@section('content_header')
    <h1>Información personal</h1>
@stop

@section('content')
     <div class="card">
            <div class="card-body">
                {!! Form::model($user, ['route'=>['admin.users.update', $user], 'method'=>'put' ])!!}
                <h1 class="h5">Rol asignado</h1>
               {{--  {!! Form::model($user, ['route'=>['admin.users.update', $user], 'method'=>'put' ])!!} --}}
                    @foreach($roles as $role)
                <div>
                    <label>
                    {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1'])!!}
                    {{$role->name}}
                    </label>
                </div>
                    @endforeach
                    <hr class="text-bold text-xl my-2">
                    <h1 class="h5">Datos personales</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="">
                        {!! Form::label('name','Nombre') !!}
                        {!! Form::text('name', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                        @error('name')
                        <span class="text-red-500"> *{{$message}}</span>
                        @enderror
                    </div>

                    <div class="">
                        {!! Form::label('email','Correo electronico') !!}
                        {!! Form::email('email', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                        @error('email')
                        <span class="text-red-500"> *{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        {!! Form::label('fecha','Fecha de nacimiento') !!}
                        {!! Form::date('fecha', null, ['class' => 'form-control rounded-md block w-full mt-1', 'max' => "2003-12-31"]) !!}
                        @error('fecha')
                        <span class="text-red-500"> *{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        {!! Form::label('phone','Celular') !!}
                        {!! Form::number('phone', null, ['class' => 'form-control rounded-md block w-full mt-1',  ]) !!}
                        @error('phone')
                        <span class="text-red-500"> *{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        {!! Form::label('created_at','Registrado') !!}
                       
                        {!! Form::datetime('created_at', null, ['readonly' => 'readonly','class' => 'form-control rounded-md block w-full mt-1',  ]) !!}
                    </div>

                    <div>
                        {!! Form::label('created_at','Actualizado') !!}
                       
                        {!! Form::datetime('updated_at', null, ['readonly' => 'readonly','class' => 'form-control rounded-md block w-full mt-1',  ]) !!}
                    </div>

                    @if ($user->role == 'voluntario')
                    <div class="">
                        {!! Form::label('cedula','Cedula') !!}
                        {!! Form::number('cedula', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>


                    <div class="">
                        {!! Form::label('ocupacion','Ocupación') !!}
                        {!! Form::text('ocupacion', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>


                    <div class="">
                        {!! Form::label('direccion','Dirección') !!}
                        {!! Form::text('direccion', null, ['class' => 'form-control rounded-md block w-full mt-1']) !!}
                    </div>
                    @endif

                </div>

                {!! Form::submit('Actualizar', ['class'=>'btn btn-primary mt-4'])!!}
                {!! Form::close()!!}

            </div>
        </div>


        @if ($user->role == 'voluntario')

            @include('admin.users.show')
        @else

      {{--   @livewire('admin.list-course-user', ['user' => $user]) --}}

        <x-table-responsive>
            <h1 class="font-semibold text-3xl text-gray-700 my-2">Actividades registradas </h1>
            @if($user->courses_enrolled->count())
            <table class="min-w-full divide-y divide-gray-200" id="user">
                  <thead class="bg-gray-50">
                    <tr></tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Voluntario
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Valoración Actividad
                      </th>


                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($user->courses_enrolled as $course)
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
                        <div class="text-sm text-gray-900 center">{{$course->teacher->name}}</div>

                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">


                       @if ($user->reviews->count())
                       @foreach ($user->reviews as $item)

                       @if ($item->course_id == $course->id)
                       <div class="text-sm text-gray-900 flex items-center">{{$item->rating}}
                        <ul class="flex text-sm ml-2">
                          <li class="mr-1"><i class="fas fa-star text-{{$item->rating >=1 ? 'yellow' : 'gray'}}-400"></i></li>
                          <li class="mr-1"><i class="fas fa-star  text-{{$item->rating >=2 ? 'yellow' : 'gray'}}-400"></i></li>
                          <li class="mr-1"><i class="fas fa-star text-{{$item->rating >=3 ? 'yellow' : 'gray'}}-400"></i></li>
                          <li class="mr-1"><i class="fas fa-star text-{{$item->rating >=4 ? 'yellow' : 'gray'}}-400"></i></li>
                          <li class="mr-1"><i class="fas fa-star text-{{$item->rating ==5 ? 'yellow' : 'gray'}}-400"></i></li>
                      </ul>
                      </div>
                       @break
                       @endif



                       @endforeach
                       @else
                        <p>No hay calificacón</p>
                       @endif



                      </td>


                    </tr>
                    @endforeach
                    <!-- More people... -->
                  </tbody>

                </table>
                <div class="px-6 py-4">
                  {{-- {{$user->courses_dictated->links()}}
                  {{$user->courses_dictated->links('vendor.pagination.bootstrap-4')}} --}}
              </div>

              @else
                <div class="px-6 py-4 font-bold">
                  No hay actividades
                </div>
              @endif
      </x-table-responsive>


        @endif


@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    @stop

@section('js')
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
     $('#user').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "Nada encontrado",
        "info": "Mostrando la página  _PAGE_ de _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});
</script>
@stopp

