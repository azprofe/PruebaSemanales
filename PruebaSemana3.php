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
                <!-- Para que nos guarde todos los valores seleccionados del checkbox tenemos que
                     poner el mismo nombre a todos los inputs y marcar con [] que será un array
                     solamente se puede hacer con el método post -->
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
         * Devuelve la suma de los números pares de $array si $par es true,
         * Devuelve la suma de los números impares de $array si $par es false
         * @param array $array -> array donde se almacenan los valores
         * @param bool $par -> parámetro para controlar si queremos calcular los números pares o impares
         * @return int
         */
        function totalCondicional(array $array, bool $par):int{
            $total = 0;
            if($par){
                foreach($array as $valor){
                    //Comprueba si $valor es un número par
                    if(esPar($valor)){
                        $total += $valor;
                    }
                }
            }else{
                foreach($array as $valor){
                    if(!esPar($valor)){
                        $total += $valor;
                    }
                }
            }
            return $total;
        }

        /**
         * Devuelve la suma de todos los valores del array
         * @param array $array
         * @return int
         */
        function total(array $array):int
        {
            $total = 0;
            foreach ($array as $posicion){
                //comprueba que es un número
                    $total += $posicion;
            }
            return $total;
        }
            //Comprueba si hemos recibido todos los valores del formulario
            if(isset($_POST["opciones"],$_POST['valor1'],$_POST['valor2'],$_POST['valor3'],$_POST['valor4'],$_POST['valor5'])){
                //Guarda los values de los checkbox marcados en un array
                $opciones = $_POST["opciones"];
                //Crea un array $numeros con los valores numéricos recogidos del formulario
                $numeros = array($_POST['valor1'],$_POST['valor2'],$_POST['valor3'],$_POST['valor4'],$_POST['valor5']);
                //Recorre el array con las opciones seleccionadas y comprueba que valor tiene
                foreach ($opciones as $opcion) {
                    switch ($opcion) {
                        case 'total':
                            echo "<h2>El total de los valores del array es ".total($numeros)."</h2>";
                            break;
                        case 'pares':
                            echo "<h2>El total de los valores pares del array es ".totalCondicional($numeros,true)."</h2>";
                            break;
                        case 'impares':
                            echo "<h2>El total de los valores impares del array es ".totalCondicional($numeros,false)."</h2>";
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
