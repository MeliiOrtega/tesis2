<x-voluntary-layout :course="$course">

    <h1 class="font-bold text-2xl">Observaciones de la actividad</h1>
    <hr class="mt-2 mb-6">
    <div class="text-gray-500">
         {!!$course->observation->body!!}
    </div>
</x-voluntary-layout>
