<div>
    <div class="card">
        <div class="card-header">
                <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre">
        </div>

        @if ($courses->count())

        <div class="card-body">
            <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th wire:click="sortBy('title')">Titulo
                        @include('admin.partials.sort_icon', ['field'=>'title'])
                    </th>

                    <th  wire:click="sortBy('name')">Categoria
                        @include('admin.partials.sort_icon', ['field'=>'category_id'])
                    </th>
                    <th  wire:click="sortBy('user_id')">Voluntario
                        @include('admin.partials.sort_icon', ['field'=>'title'])
                    </th>
                    <th></th>

                <tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                <tr>

                    <td>{{$course->title}}</td>
                    <td>{{$course->category->name}}</td>
                    <td>{{$course->teacher->name}}</td>

                    <td>
                        <a class="btn btn-primary"href="{{route('admin.courses.show', $course)}}">Revisar</a>
                    </td>
                    <td></td>
                </tr>

                @endforeach
            </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$courses->links()}}
        </div>

        @else
        <div  class="card-body">
            <strong>No hay actividad</strong>
        </div>

        @endif

    </div>

</div>
