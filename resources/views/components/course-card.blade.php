@props(['course'])

            <article class="card">
                @isset($course->image)
                    <img class = "h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                     <img class="rounded-lg h-60 w-full object-cover" src="https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500https://images.pexels.com/photos/6787953/pexels-photo-6787953.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endisset
                
                <div class="card-body">
                        <h1 class="card-title">{{Str::limit($course->title, 30)}}</h1>
                        <p class="text-gray-500 text-sm mb-2">Voluntario: {{$course->teacher->name}}</p>

                        <!--Estrellas-->
                            <div class="flex">
                                <ul class="flex text-sm">
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=1 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star  text-{{$course->rating >=2 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=3 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=4 ? 'yellow' : 'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$course->rating ==5 ? 'yellow' : 'gray'}}-400"></i></li>
                                </ul>

                                <p class="text-sm text-gray-500 ml-auto">
                                    <i class="fas fa-users"></i>
                                    {{$course->students_count}}
                                </p>
                            </div>
                        <a href = "{{route('courses.show',$course)}}"class=" mt-4 btn btn-primary btn-block">
                            Más información
                        </a>
                </div>
            </article>
