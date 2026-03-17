<?php
    require_once 'Peluquera.php';
    session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Peluquera</title>
</head>
<body class="peluquera">
<article>
    <section class="contenedor">
    <form action="" method="get">
        <div class="formulario">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="formulario">
            <input type="submit" value="nueva peluquera">
        </div>
    </form>
    </section>

        <?php
            if(isset($_SESSION['peluqueras'])){
                $peluqueras = $_SESSION['peluqueras'];
            }else{
                $peluqueras = array();
                $_SESSION['peluqueras'] = $peluqueras;
            }
            if(isset($_GET["nombre"])){

                $peluquera = new Peluquera($_GET["nombre"]);
                $peluqueras[] = $peluquera;
                echo "<section class='contenedor'>";
                echo "<h1>{$peluquera->MostrarInfo()} creada con éxito</h1>";
                echo "</section>";
            }
        ?>
</article>
</body>
</html>
