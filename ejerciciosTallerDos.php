<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problemas propuestos</title>
</head>
<body>
    <a href="./index.php">Home</a>
    <a href="./ejerciciosTallerUno.php">Ejercicios T1</a>
    <a href="./ejerciciosTallerDos.php">Ejercicios T2</a>
    <a href="./ejerciciosTallerTres.php">Ejercicios T3</a>
    <a href="./capturaDos.php">Pizza</a>
    <br>
    <h3>Ejercicio Punto 3</h3>
    <?php 
        echo "Hola Mundo";
    ?>
    <br>
    <?php 
        echo "Soy Nicolas";
    ?>
    <br>
    <?php 
        echo "Que hay de nuevo en una vida";
    ?>
    <h3>Ejercicio Punto 4</h3>
    <?php 
        $num = rand(1, 100);
        if($num <= 50) {
            echo $num, ": Es menor o igual que 50";
        } else {
            echo $num, ": Es mayor que 50";
        }
    ?>
    <h3>Ejercicio Punto 5</h3>
    <?php 
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
    ?>
    <h3>Ejercicio Punto 6</h3>
    <?php 
        $cantidad = 5;
        $precio = 25;
        $iva = 20;
        echo "Hay $cantidad audifonos a un precio de $precio dolares, y el iva es del $iva %";
    ?>
    <h3>Ejercicio Punto 7</h3>
    <?php 
        $valor = rand(1, 3);
        if($valor == 1) {
            echo "Uno";
        }else if($valor == 2){
            echo "Dos";
        } else {
            echo "Tres";
        }
    ?>
    <h3>Ejercicio Punto 8</h3>
    <?php 
        echo "CICLO FOR<br>";
        for ($f=2; $f<=20; $f=$f+2){
            echo " $f -";
        }
        echo "<br>";
        echo "CICLO WHILE<br>";
        $inicio = 2;
        while($inicio <= 20) {
            echo " $inicio -";
            $inicio = $inicio+2;
        }
        echo "<br>";
        echo "CICLO DO-WHILE<br>";
        $inicio = 2;
        do {
            echo " $inicio -";
            $inicio = $inicio+2;
        } while($inicio <= 20);
    ?>
    <h3>Ejercicio Punto 9</h3>
    <form method="post" action="capturaDos.php">
        <label>Ingrese su nombre:</label>
        <input type="text" name="nombre">
        <br>
        <label>Ingrese su edad:</label>
        <input type="number" name="edad">
        <br>
        <input type="submit" value="confirmar">
    </form>
    <h3>Ejercicio Punto 10</h3>
    <form method="post" action="capturaDos.php">
        <label>Ingrese su nombre:</label>
        <input type="text" name="nombre2">
        <br>
        <input type="radio" name="radio1" value="noEstudio">No Tiene Estudios
        <br>
        <input type="radio" name="radio1" value="primario">Estudios Primarios
        <br>
        <input type="radio" name="radio1" value="secundario">Estudios Secundarios
        <br>
        <input type="submit">
    </form>
    <h3>Ejercicio Punto 11</h3>
    <form method="post" action="capturaDos.php">
        <label>Ingrese su nombre:</label>
        <input type="text" name="nombre">
        <br>
        <input type="checkbox" name="check1">Futbol
        <br>
        <input type="checkbox" name="check2">Basket
        <br>
        <input type="checkbox" name="check3">Tennis
        <br>
        <input type="checkbox" name="check4">Voley
        <br>
        <input type="submit">
    </form>
    <h3>Ejercicio Punto 13</h3>
    <form method="POST" action="capturaDos.php">
        <textarea name="contrato" cols="30" rows="10">
            En la ciudad de [.....], se acuerda entre la Empresa [......]
            representada por el SR. [.........] en su carácter de Apoderado,
            con domicilio en la calle [..........] y el SR. [.............],
            futuro empleado con domicilio en [..........], celebrar el presente
            contrato a Plazo Fijo, de acuerdo a la normativa vigente de los
            artículos 90,92,93,94,95 y concordante de la Ley de Contrato de Trabajo
            N° 20.744.
        </textarea>
        <br>
        <input type="submit">
    </form>
    <h3>Ejercicio Punto 14</h3>
    <?php 
        $diasSemana = array("Lunes", "Martes", "Miercoles", "Jueves", "viernes", "Sabado", "Domingo");
        echo "$diasSemana[0] y ".$diasSemana[count($diasSemana)-1];
    ?>
    <h3>Ejercicio Punto 15</h3>
    <form method="POST" action="capturaDos.php">
        <label>Nombre: </label>
        <input type="text" name="nombre2">
        <br>
        <label>Dirección: </label>
        <input type="text" name="direccion">
        <br>
        <input type="checkbox" name="checkUno">Jamon y Queso
        <br>
        <label>Cantidad: </label>
        <input type="text" name="cantidad1">
        <br>
        <input type="checkbox" name="checkDos">Napolitana
        <br>
        <label>Cantidad: </label>
        <input type="text" name="cantidad2">
        <br>
        <input type="checkbox" name="checkTres">Muzzarella
        <br>
        <label>Cantidad: </label>
        <input type="text" name="cantidad3">
        <br>
        <input type="submit" value="Confirmar">
    </form>
    <h3>Ejercicio Punto 17</h3>
    <?php 
        $clave = array('jey' => 'cnvjadncaiocnsd',
                        'antonio' => 'cnjancjiacf1541',
                        'uver' => 'mcdakmncoancia7484_/',
                        'camila' => '515*-_csmaic_9u',
                        'laura' => '__nscjans/*csac23');
        echo "Clave de Laura: ".$clave['laura'];
    ?>
</body>
</html>