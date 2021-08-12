 <div class=" py-4 bg-gray-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-around ">
            <!--CATEGORIAS-->
            @foreach ($categories as $category)
            <a class="border-b-2 hover:border-red-400 text-3xl  text-gray-600 hover:text-red-700" href="{{route('courses.category',$category)}}">{{$category->name}}</a>
            @endforeach
            </div>
    </div>
