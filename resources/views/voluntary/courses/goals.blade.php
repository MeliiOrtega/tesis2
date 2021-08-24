<x-voluntary-layout :course="$course">

    <div>
        @livewire('voluntary.course-goals', ['course' => $course], key('course-goals' . $course->id))
    </div>
</x-voluntary-layout>
