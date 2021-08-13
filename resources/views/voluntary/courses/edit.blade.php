<x-voluntary-layout :course="$course">

    <h1 class="font-bold text-2xl">Información de la actividad</h1>
                        <hr class="mt-2 mb-6">

                        {!! Form::model($course, ['route' => ['voluntary.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
                        @include('voluntary.courses.partials.form')

                        <div class="flex justify-end">
                            {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

    <x-slot name="js">
       {{--  <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script> --}}
        <script src="{{asset('js/voluntary/courses/form.js')}}">
        </script>
    </x-slot>
</x-voluntary-layout>

