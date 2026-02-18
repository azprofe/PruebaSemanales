<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba semanal 1: Funciones</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <section class="contenedor">
        <form action="" method="get">
            <div class="preguntaFormulario">
            <label for="funcion">Selecciona una función: </label>
            <select name="funcion" id="funcion">
                <option value="sumar">Sumar</option>
                <option value="multiplicar">Multiplicar</option>
                <option value="elevar">Potencia</option>
                <option value="duplicar">Duplica el último valor</option>
            </select>
            </div>
            <div class="preguntaFormulario">
                <label for="num1">Numero 1: </label>
                <input type="number" id="num1" name="num1">
            </div>
            <div class="preguntaFormulario">
                <label for="num2">Numero 2: </label>
                <input type="number" id="num2" name="num2">
            </div>
            <div class="preguntaFormulario">
                <input type="submit" value="Calcular">
            </div>
        </form>
    </section>
    <section class="contenedor">
    <?php
    /* Iniciamos sesión para poder persistir datos de un envío de formulario al siguiente*/
    session_start();
    /* Si no existe la llave UltimoValor en el array $_SESSION la creamos */
    if(!isset($_SESSION['ultimoValor'])){
        $_SESSION['ultimoValor']=0;
    }
    /**
     * Devuelve la suma entre dos valores $sum1 y $sum2
     * @param $sum1
     * @param $sum2
     * @return int|float
     */
    function sumar($sum1, $sum2){
        return $sum1 + $sum2;
    }
    /**
     * Devuelve el resultado de la multiplicación entre los dos parámetros utilizando la función sumar()
     * @param $multiplicando
     * @param $multiplicador
     * @return float|int
     */
        function multiplicar($multiplicando, $multiplicador)
        {
            $producto = 0;
            for($i = 0; $i < $multiplicando; $i++) {
                $producto = sumar($producto,$multiplicador);
            }
            return $producto;
        }

    /**
     * Devuelve la potencia de la base elevado al exponente
     * @param $base
     * @param $exponente
     * @return float|int
     */
        function potencia($base,$exponente){
            $resultado = 1;
            for ($i=0; $i < $exponente; $i++) {
                $resultado = multiplicar($base, $resultado);
            }
            return $resultado;
        }

    /**
     * Duplicamos un valor pasando el parámetro por referencia
     * @param $valor
     * @return void
     */
        function duplicar(&$valor){
            $valor = sumar($valor,$valor);
        }

        if(isset($_GET['funcion'],$_GET['num1'],$_GET['num2'])){
            $funcion = $_GET['funcion'];
            $num1 = $_GET['num1'];
            $num2 = $_GET['num2'];
            switch ($funcion) {
                case 'sumar':
                    $_SESSION['ultimoValor'] = sumar($num1,$num2);
                    echo "<h1> El resultado de la suma es:". $_SESSION['ultimoValor']." </h1>";
                    break;
                case 'multiplicar':
                    $_SESSION['ultimoValor'] = multiplicar($num1,$num2);
                    echo "<h1> El resultado de la multiplicación es:". $_SESSION['ultimoValor']."</h1>";
                    break;
                case 'elevar':
                    $_SESSION['ultimoValor'] = potencia($num1,$num2);
                    echo "<h1> El resultado de la potencia es: ".$_SESSION['ultimoValor']."</h1>";
                    break;
                case 'duplicar':
                    duplicar($_SESSION['ultimoValor']);
                    echo "<h2 class='ultimoValor'>Se ha duplicado el último valor</h2>";
                    break;
                default:
                    echo "<p>Error al elegir la función</p>";
            }
        }
        if($_SESSION['ultimoValor']!=0){
            echo "<h2 class='ultimoValor'> El último valor es: ".$_SESSION['ultimoValor']."</h2>";
        }

    ?>
    </section>
</body>
</html>

