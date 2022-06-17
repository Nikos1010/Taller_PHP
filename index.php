<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller PHP</title>
</head>
<body>
    <a href="#">Home</a>
    <a href="./ejerciciosTallerUno.php">Ejercicios T1</a>
    <a href="./ejerciciosTallerDos.php">Ejercicios T2</a>
    <a href="./ejerciciosTallerTres.php">Ejercicios T3</a>
    <a href="./captura.php">Captura</a>
    <?php 
        $dia = date("d");
        echo "<br>";
        if($dia <= 10) {
            echo "Sitio Activo";
            echo "<br>";
            $dia = 24;
            $sueldo = 758.43;
            $nombre = "Juan";
            $existe = true;
            echo "Variable entera: ", $dia;
            echo "<br>";
            echo "Variable double: ", $sueldo;
            echo "<br>";
            echo "Variable string: ", $nombre;
            echo "<br>";
            echo "Variable boolean: ", $existe;
        } else {
            echo "Sitio Fuera de servicio";
        }
        echo "<br>";
        $cadena1 = "Hola";
        $cadena2 = "Mundo";
        echo $cadena1." ".$cadena2;
        echo "<br>";
        echo $cadena1;
        echo " ";
        echo $cadena2;
        echo "<br>";
        $fecha = "Hoy es $dia";
        $nombre = 'No sirven las variables con comillas simples $variable';
        echo $fecha;
        echo "<br>";
        echo $nombre;
        echo "<br>";
        $valor = rand(1, 10);
        echo "El valor sorteado es $valor<br>";
        if($valor<=5) {
            echo "Es menor o igual a 5";
        } else {
            echo "Es mayor a 5";
        }
        echo "<br>";
        $valor = rand(1, 100);
        echo "El valor sorteado es $valor<br>";
        if($valor <= 9) {
            echo "Tiene un dígito";
        } else if($valor < 100) {
            echo "Tiene 2 dígitos";
        } else {
            echo "Tiene 3 dígitos";
        }
        echo "<br>";
        echo "Ciclo FOR<br>";
        for($f=1; $f<=100; $f++){
            echo " $f -";
        }
        echo "<br>";
        echo "Ciclo WHILE<br>";
        $valor = rand(1, 100);
        $inicio = 1;
        while($inicio <= $valor){
            echo " $inicio -";
            $inicio++;
        }
        echo "<br>";
        echo "Ciclo DO-WHILE<br>";
        $inicio = 1;
        do {
            echo " $inicio -";
            $inicio++;
        } while($inicio <= $valor);
        echo "<br>";
    ?>
    <h4>FORMULARIO</h4>
    <form method="post" action="captura.php">
        Ingrese su nombre:
        <input type="text" name="nombre">
        <br>
        <input type="submit" value="confirmar">
    </form>
    <h4>FORMULARIO RADIO</h4>
    <form method="post" action="captura.php">
        Ingrese primer valor:
        <input type="text" name="valor1">
        <br>
        Ingrese segundo valor:
        <input type="text" name="valor2">
        <br>
        <input type="radio" name="radio1" value="suma">Sumar
        <br>
        <input type="radio" name="radio1" value="resta">Restar
        <br>
        <input type="submit" name="operar">
    </form>
    <h4>FORMULARIO CHECKBOX</h4>
    <form method="post" action="captura.php">
        Ingrese primer valor:
        <input type="text" name="valor1">
        <br>
        Ingrese segundo valor:
        <input type="text" name="valor2">
        <br>
        <input type="checkbox" name="check1">Sumar
        <br>
        <input type="checkbox" name="check2">Restar
        <br>
        <input type="submit" name="operar">
    </form>
    <h4>FORMULARIO TEXTAREA</h4>
    <form method="post" action="captura.php">
        Ingrese nombre:
        <input type="text" name="nombre">
        <br>
        Ingrese su curriculum:
        <br>
        <textarea name="curriculum"></textarea>
        <br>
        <input type="submit" value="confirmar">
    </form>
    <h4>VECTORES</h4>
    <?php 
        $dias[0] = 31;
        $dias[1] = 28;
        $dias[2] = 30;

        echo count($dias);
        echo "<br>";
        $nombres[] = "Juan";
        $nombres[] = "Pepito";
        $nombres[] = "Ana";
        for($f=0;$f<count($nombres);$f++){
            echo " $nombres[$f] ";
        }
        $edades = array("menores", "jovenes", "adultos");
    ?>
    <h4>Archivo de Texto</h4>
    <form action="captura.php" method="POST">
        Ingrese su nombre:
        <input type="text" name="nombre">
        <br>
        Comentarios:
        <br>
        <textarea name="comentarios" rows="10" cols="40">
        </textarea>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <h4>VECTORES ASOCIATIVOS</h4>
    <?php 
        $registro['dni'] = "20456322";
        $registro['nombre'] = "Martinez Pablo";
        $registro['direccion'] = "Colon 134";
        echo $registro['nombre'];
        echo "<br>";

        $registro2 = array('dni' => '20456322',
                            'nombre' => 'Martinez Pablo',
                            'direccion' => 'Colon 134');
        echo $registro2['dni'];
    ?>
    <h4>FUNCIONES EN PHP</h4>
    <?php 
        function mostrarticulo($men){
            echo "<h1 style=\"text-align:center\">";
            echo $men;
            echo "</h1>";
        }
        mostrarticulo("Primer Titulo");
        echo "<br>";
        mostrarticulo("Segundo Titulo");

        function retornarpromedio($valor1, $valor2){
            $pro = $valor1/$valor2;
            return $pro;
        }
        $v1 = 100;
        $v2 = 50;
        $p = retornarpromedio($v1, $v2);
        echo $p."<br>";

        function cuadradocubo($valor,&$cuad,&$cub){
            $cuad = $valor*$valor;
            $cub = $valor*$valor*$valor;
        }
        cuadradocubo(2,$c1,$c2);
        echo "El cuadrado de 2 es: $c1<br>";
        echo "El cubo de 2 es: $c2";
    ?>
</body>
</html>