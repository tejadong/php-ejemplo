<!doctype html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuesta</title>
</head>
<body>
    <h1>Encuesta de HLC</h1>
    <form method="post" action="index.php">
        <?php
            $valores = [
                1 => 'Nada',
                2 => 'Poco',
                3 => 'Regular',
                4 => 'Mucho',
                5 => 'Todo'
            ];

            $id = 100;
            for ($pregunta = 1; $pregunta <= 5; $pregunta++) {
                echo "Pregunta $pregunta";

                foreach ($valores as $valor => $texto) {
                    echo "<input type='radio' id='id$id' name='pr$pregunta' value='$valor' /><label for='id$id'>$texto</label>";
                    $id++;
                }

                echo "<br/>";
            }
        ?>
        <button type="submit">Votar</button>
    </form>
</body>
</html>
