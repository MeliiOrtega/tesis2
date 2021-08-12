<x-voluntary-layout>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <div>
        @livewire('voluntary.course-goals', ['course' => $course], key('course-goals' . $course->id))
    </div>
</x-voluntary-layout>
