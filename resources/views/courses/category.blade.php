<x-app-layout>
  @livewire('navigation-category')
  <div class="py-8">
        <h1 class="uppercase text-center text-3xl  text-indigo-800 font-bold mb-6">{{$category->name}}</h1>
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2  md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($courses as $course)
                    <x-course-card :course=$course></x-course-card>
                @endforeach
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
            {{$courses->links()}}
        </div>


  </div>


</x-app-layout>
