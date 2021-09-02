<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color: rgb(243, 244, 246);
            padding: 25px;
        }

        .card{

            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(243, 244, 246, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            border: 0.25rem;
            overflow: hidden;

        }
        .card-body{
            padding: 1rem 1.5rem 1rem 1.5rem;
        }

        h1{
            font-size: 1.5rem;
            line-height: 2rem;
            color: rgb(31, 41, 55);

        }

        h2{
            font-size: 1.25rem;
            line-height: 1.75rem;
            color: rgb(31, 41, 55);
            font-weight: 600;
        }

        footer{
            /* background-color: rgb(229, 231, 235);
            padding: 1rem 1.5rem 1rem 1.5rem; */
        }

        p{
            font-size: 1.125rem;
            line-height: 1.75rem;
            color: rgb(107, 114, 128);
        }

        .frase{
            font-weight: 700;
            color: rgb(55,48,163);
            font-size: 1.25rem;
            line-height: 1.75rem;

        }
        hr{
            color: rgb(249,250,251);
            margin: 2px;
        }

    </style>

    <title>Document</title>
</head>
<body class="">
    <div class="card">
        <div class="card-body ">
            <h1>Correo de aprobación de actividad</h1>
        <hr class="">
            <h2 class="">Hola {{$course->teacher->name}}</h2>
            <p>Se ha aprobado la actividad: </p>
            <p class=""><strong>{{$course->title}}</strong></p>

            <hr>

            <footer class="">
                <p class="">Atte.</p>
                <h2 class="">Equipo de Moment!</h2>

                <div class="">
                    <p class="frase">Que la edad no te detenga, es tu momento!.</p>
                </div>
            </footer>
        </div>
    </div>



</body>
</html>
