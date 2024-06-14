<!DOCTYPE html>
<html>

<head>
    <title>{{ $movie->title }} Details</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');

        @page {
            margin: 0cm 0cm;

        }

        html {
            background-color: #101010;
        }

        body {
            background-color: #101010;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin-top: 2px;
            margin-bottom: 2px;
            /* Centra el contenido en el eje X */
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #E6030C;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        /* Estilos para el main */
        main {
            background-color: #101010;
            color: white;
            padding: 20px;
            /* Ajusta el espaciado interior según sea necesario */
        }

        .container {
            max-width: 1200px;
            /* Ajusta el ancho máximo según sea necesario */
            margin: 0 auto;
            /* Centra el contenido horizontalmente */
        }

        /* Estilos para la fila principal */
        .main-row {
            display: flex;
            flex-wrap: wrap;
        }

        /* Estilos para las columnas principales */
        .main-col {
            flex: 1;
            margin-right: 20px;
            /* Ajusta el espaciado entre columnas */
        }

        /* Estilos para la información de la película */
        .main-info {
            display: flex;
            flex-direction: column;
        }

        /* Estilos para las filas dentro de la información de la película */
        .main-info-row {
            display: flex;
        }

        /* Estilos para las columnas dentro de las filas de la información de la película */
        .main-info-col {
            flex: 1;
            margin-right: 10px;
            /* Ajusta el espaciado entre columnas */
        }


        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #E6030C;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        p {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Laraflix</h1>
    </header>

    <main>
        <div class="container">
            <div class="main-row">
                <!-- Columna de la izquierda con la imagen -->
                <div class="main-col">
                    <img style=" margin-top: 3px;" src="{{ asset($movie->poster) }}" alt="">
                </div>
                <!-- Columna de la derecha con la información de la película -->
                <div class="main-col">
                    <div class="main-info">
                        <h2>{{ $movie->title }}</h2>
                        <p>{{ $movie->description }}</p>
                        <div class="main-info-row">
                            <div class="main-info-col">
                                <h4>Director:</h4>
                                <p>{{ $movie->director }}</p>
                            </div>
                            <div class="main-info-col">
                                <h4>Release Year:</h4>
                                <p>{{ $movie->release_year }}</p>
                            </div>
                            <div class="main-info-col">
                                <h4>Genre:</h4>
                                <p>{{ $movie->genre }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <footer>
        <h1>Laraflix</h1>
    </footer>
</body>

</html>
