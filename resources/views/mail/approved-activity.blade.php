<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="card">
        <div class="card-body">
            <h1 class="font-bold text-2xl text-gray-700">Correo de aprobación de actividad</h1>
            <hr class="bg-gray-200">
            <h2 class="text-xl text-gray-500">Hola {{$course->teacher->name}}</h2>
            <p>Se ha aprobado</p>
            <p class="text-indigo-700 text-3xl"><strong>{{$course->title}}</strong></p>
        </div>
    </div>
    <footer class="bg-gray-200">
        <p class="text-lg">Atte.</p>
        <p class="font-semibold text-xl">Equipo de Moment!</p>

        <div class="">
            <p class="font-bold text-indigo-800 text-2xl text-center">Que la edad no te detenga, es tu momento!.</p>
        </div>
    </footer>


</body>
</html>
