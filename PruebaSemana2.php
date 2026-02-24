<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba semanal 2</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<section class="contenedor">
    <!-- Formulario con radio-button, campo númerico y botón enviar-->
    <form method="GET" action="">
        <div class="preguntaFormulario">
            <label for="operacion1">Añadir valor:</label>
            <input type="radio" name="operacion1" id="operacion1" value="anadir" checked>
        </div>
        <div class="preguntaFormulario">
            <label for="operacion2">Números impares:</label>
            <input type="radio" name="operacion1" id="operacion2" value="impar">
        </div>
        <div class="preguntaFormulario">
            <label for="operacion3">Calcular impares:</label>
            <input type="radio" name="operacion1" id="operacion3" value="calcular">
        </div>
        <div class="preguntaFormulario">
            <label for="operacion4">Vaciar valores:</label>
            <input type="radio" name="operacion1" id="operacion4" value="vaciar">
        </div>
        <div class="preguntaFormulario">
            <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero">

        <input type="submit" value="enviar">
    </form>
</section>
<section class="contenedor">
    <?php
    session_start();
    //Compruebo si existe la variable listaNum en $_SESSION
    if(!isset($_SESSION['listaNum'])){
        //Si no existe la creo
        $_SESSION['listaNum'] = [];
    }
    //Recupero la variable almacenada en $_SESSION['listaNum'] y la guardo en la variable $listaNum
    $listaNum = $_SESSION['listaNum'];
    //Compruebo si existe la posición operacion1 en el array $_GET[]
    if(isset($_GET['operacion1'])){
        //Guardo el contenido de $_GET['operacion1'] en la variable $operacion. Este valor viene de los radiobutton y podrías ser anadir, impar o calcular
        $operacion = $_GET['operacion1'];
        switch ($operacion) {
                case 'anadir':
                    //Compruebo que existe la posición numero en el array $_GET[] y que es un valor numérico
                    if(isset($_GET['numero']) && is_numeric($_GET['numero'])){
                        //Almaceno $_GET['numero'] en la variable $numero, es el valor numérico introducido en el formulario
                        $numero = $_GET['numero'];
                        //llamo al procedimiento añadir pasándole $listaNum por referencia y $numero por valor
                        anadir($listaNum, $numero);
                        //Guardo en sesión el listado actualizado
                        $_SESSION['listaNum'] = $listaNum;
                        echo "<h2>Se ha añadido el valor $numero al listado</h2>";
                    }
                    break;
                case 'impar':
                    //declaro la variable auxiliar $i para conocer la posición del array y poder pintarla [$i]
                    $i = 0;
                    //Recorro el array listaNum
                    foreach($listaNum as $numero){
                        //Si número es impar
                        if(esImpar($numero)){
                            //Pinto número
                            echo "<h2>[$i]=$numero -> es impar</h2>";
                        }
                        //sumo 1 a la variable auxiliar para conocer la posición del array
                        $i++;
                    }
                    break;
                case 'calcular':
                    echo "<h2>La suma total de los números impares es: ". calcularImpares($listaNum)."</h2>";
                break;
                case 'vaciar':
                    vaciar($listaNum);
                    $_SESSION['listaNum'] = $listaNum;
                    echo "<h2>Se ha vaciado el listado de números</h2>";
                    break;
                default:
                    echo "<h2>Error al seleccionar una función</h2>";
        }
    }
    /**
     * Procedimiento que me permite añadir un nuevo valor al array global listaNum
     * @param array $listaNum
     * @param int $valor
     * @return void
     */
    function anadir(array &$listaNum, int $valor):void {
        $listaNum[] = $valor;
    }

    /**
     * Función que me devuelve true si el parámetro $num es impar
     * @param int $num
     * @return bool
     */
    function esImpar(int $num):bool {
        return $num % 2 != 0;
    }

    /**
     * Función que devuelve la suma de todos los valores impares del parámetro array $listaNum
     * @param array $listaNum
     * @return int
     */
    function calcularImpares(array $listaNum):int {
        $valor = 0;
        foreach($listaNum as $numero){
            if(esImpar($numero)){
                $valor = $numero + $valor;
            }
        }
        return $valor;
    }

    /**
     * Vacia el array pasado como parámetro por referencia
     * @param $listaNum
     * @return void
     */
    function vaciar(&$listaNum):void{
        $listaNum = [];
    }
    ?>
</section>
</body>
</html>
