<?php
    session_name('encuesta');
    session_start();

    $error = false;

    if (isset($_POST['votar'])) {
        if(!isset($_SESSION["encuestas"])) {
            $_SESSION['encuestas'] = 0;
            $_SESSION['suma1'] = 0;
            $_SESSION['suma2'] = 0;
            $_SESSION['suma3'] = 0;
            $_SESSION['suma4'] = 0;
            $_SESSION['suma5'] = 0;
        }

        if (isset($_POST['pr1']) && isset($_POST['pr2']) &&
            isset($_POST['pr3']) && isset($_POST['pr4']) &&
            isset($_POST['pr5'])) {
                $_SESSION['suma1'] += $_POST["pr1"];
                $_SESSION['suma2'] += $_POST["pr2"];
                $_SESSION['suma3'] += $_POST["pr3"];
                $_SESSION['suma4'] += $_POST["pr4"];
                $_SESSION['suma5'] += $_POST["pr5"];
        } else {
            $error = true;
        }

        $_SESSION['encuestas']++;
    }

?>
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
    <h1>Enceuesta de HLC</h1>
    <?php
        if ($error) {
            echo '<h1>Cumplimente todas las encuestas, por favor.</h1>';
        }
    ?>
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
        <button type="submit" name="votar">Votar</button>
    </form>
</body>
</html>
