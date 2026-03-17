<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Prueba semanal 3</title>
</head>
<body>
    <section class="contenedor">
        <!-- FORMULARIO GET PARA SELECCIONAR LA ACCIÓN -->
        <form action="" method="post">
            <div class="preguntaFormulario">
                <label for="opcion1">Calcular total</label>
                <input type="checkbox" name="opciones[]" id="opcion1" value="total">
            </div>
            <div class="preguntaFormulario">
                <label for="opcion2">Calcular pares</label>
                <input type="checkbox" name="opciones[]" id="opcion2" value="pares">
            </div>
            <div class="preguntaFormulario">
                <label for="opcion3">Calcular impares</label>
                <input type="checkbox" name="opciones[]" id="opcion3" value="impares">
            </div>
            <div class="preguntaFormulario">
                <label for="valor1">Valor 1</label>
                <input type="number" name="valor1" id="valor1" required>
            </div>
            <div class="preguntaFormulario">
                <label for="valor2">Valor 2</label>
                <input type="number" name="valor2" id="valor2" required>
            </div>
            <div class="preguntaFormulario">
                <label for="valor3">Valor 3</label>
                <input type="number" name="valor3" id="valor3" required>
            </div>
            <div class="preguntaFormulario">
                <label for="valor4">Valor 4</label>
                <input type="number" name="valor4" id="valor4" required>
            </div>
            <div class="preguntaFormulario">
                <label for="valor5">Valor 5</label>
                <input type="number" name="valor5" id="valor5" required>
            </div>
            <div class="preguntaFormulario">
                <input type="submit" value="Calcular">
            </div>
        </form>

    </section>
    <section class="contenedor">
        <?php
        /**
         * Devuelve true si $num es par o false si $num es impar
         * @param int $num
         * @return bool
         */
        function esPar(int $num):bool
        {
            return $num %2 ==0;
        }

        /**
         * Devuelve la suma de los valores pares de $array si $operacion es 1,
         * la suma de los valores impares de $array si $operacion es 2 o
         * la suma de todos los valores de $array si $operacion es 3
         * @param array $array
         * @param int $operacion 1-> sumar pares 2-> sumar impares 3-> sumar todos los valores
         * @return int
         */
        function totalCondicional(array $array,int $operacion):int{
            $total = 0;
            foreach ($array as  $valor) {
                //Si $operacion es 1 y el valor es par o si operación es 2 y el valor impar o si operación es 3
                if($operacion==1 && esPar($valor) || ($operacion==2 && !esPar($valor)) || ($operacion==3)){
                    $total += $valor;
                }
            }
            return $total;
        }

            if(isset($_POST["opciones"],$_POST['valor1'],$_POST['valor2'],$_POST['valor3'],$_POST['valor4'],$_POST['valor5'])){
                $opciones = $_POST["opciones"];
                $numeros = array($_POST['valor1'],$_POST['valor2'],$_POST['valor3'],$_POST['valor4'],$_POST['valor5']);
                foreach ($opciones as $opcion) {
                    switch ($opcion) {
                        case 'total':
                            echo "<h2>El total de los valores del array es ".totalCondicional($numeros,3)."</h2>";
                            break;
                        case 'pares':
                            echo "<h2>El total de los valores pares del array es ".totalCondicional($numeros,1)."</h2>";
                            break;
                        case 'impares':
                            echo "<h2>El total de los valores impares del array es ".totalCondicional($numeros,2)."</h2>";
                        break;
                        default:
                            echo "<h2>Ha sucedido un error</h2>";
                    }
                }
            }
        ?>
    </section>
</body>
</html>
