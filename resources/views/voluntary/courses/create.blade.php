<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">Crear nueva actividad</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => 'voluntary.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}

                @include('voluntary.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Crear actividad', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
      {{--   <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script> --}}
        <script src="{{asset('js/voluntary/courses/form.js')}}">
        </script>
    </x-slot>
</x-app-layout>
