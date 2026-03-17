<?php
require_once "Clienta.php";
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
    <title>Clienta</title>
</head>
<body class="clienta">
<article>
    <section class="contenedor">
        <form action="" method="get">
            <div class="formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="formulario">
                <label for="colorPelo">Color de pelo:</label>
                <input type="text" name="colorPelo" id="colorPelo">
            </div>
            <div class="formulario">
                Largura pelo:
                <label for="largo">Largo</label>
                <input type="radio" name="largura" id="largo" value="largo">
                <label for="corto">Corto</label>
                <input type="radio" name="largura" id="corto" value="corto">
            </div>
            <div class="formulario">
                <input type="submit" value="nueva clienta">
            </div>
        </form>
    </section>
        <?php
            if(isset($_SESSION['clientas'])){
                $clientas = $_SESSION['clientas'];
            }else{
                $clientas = array();
                $_SESSION['clientas'] = $clientas;
            }
            if(isset($_GET["nombre"], $_GET["colorPelo"], $_GET["largura"])){
                $clienta = new Clienta($_GET["nombre"], $_GET["colorPelo"], $_GET["largura"]);
                $clientas[]= $clienta;
                echo "<section class='contenedor'>";
                echo "<h1>{$clienta->MostrarInfo()} creada con éxito</h1>";
                echo "</section>";
            }
        ?>
</article>
</body>
</html>

