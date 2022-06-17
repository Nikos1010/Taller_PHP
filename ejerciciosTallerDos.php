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
    <h3>Ejercicio Punto 18</h3>
    <form method="post" action="ejerciciosTallerDos.php">
        <label>Ingrese su nombre:</label>
        <input type="text" name="nombre">
        <br>
        <label>Ingrese su clave:</label>
        <input type="password" name="password1">
        <br>
        <label>Repita su clave:</label>
        <input type="password" name="password2">
        <br>
        <input type="submit" value="Verificar">
    </form>
    <?php 
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['password1']) && isset($_REQUEST['password2'])){
            function claveDistinta($clave1, $clave2){
                $distinto = $clave1 != $clave2;
                $p = '';
                if($distinto){
                    $p = "Las claves son distintas";
                } else {
                    $p = "Las claves son iguales";
                }
                return $p;
            }
            $respuesta = claveDistinta($_REQUEST['password1'], $_REQUEST['password2']);
            echo "<br>$respuesta";
        }

    ?>
    <h3>Ejercicio Punto 20</h3>
    <h4>Alta de Cursos</h4>
    <form action="capturaTallerDos.php" method="POST">
        Ingrese nombre del curso:
        <input type="text" name="nombrecurso">
        <input type="hidden" name="create" value="true">
        <br>
        <input type="submit" value="Registrar">
    </form>
    <h3>Ejercicio Punto 21</h3>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $cursos = mysqli_query($conexion, "select codigo,nombrecurso from cursos")
        or die("Problemas en el select: ".mysqli_error($conexion));

        while($reg = mysqli_fetch_array($cursos)){
            echo "Codigo: ".$reg['codigo']."<br>";
            echo "Nombre del curso: ".$reg['nombrecurso']."<br>";
            echo "<hr>";
        }
        mysqli_close($conexion);
    ?>
    <h3>Ejercicio Punto 22</h3>
    <form action="capturaTallerDos.php" method="POST">
        Ingrese el nombre del alumno:
        <input type="text" name="nombre"><br>
        <input type="hidden" name="search" value="true">
        <input type="submit" value="Buscar">
    </form>
    <h3>Ejercicio Punto 23</h3>
    <?php 
        $eliminar = false;
        if($eliminar){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            mysqli_query($conexion, "delete from cursos")
            or die("Problemas en el select: ".mysqli_error($conexion));
            echo "Se efectuo el borrado de todos los cursos.";
            mysqli_close($conexion);
        } else {
            echo "Esperando a borrado total.";
        }
    ?>
    <h3>Ejercicio Punto 25</h3>
    <form action="capturaTallerDos.php" method="POST">
        Ingrese el nombre del curso:
        <input type="text" name="nombrecurso"><br>
        <input type="hidden" name="update" value="true">
        <input type="submit" value="Buscar">
    </form>
    <h3>Ejercicio Punto 26</h3>
    <form action="capturaTallerDos.php" method="POST">
        Ingrese nombre:
        <input type="text" name="nombre"><br>
        Ingrese mail:
        <input type="text" name="mail"><br>
        Seleccione el curso: <br>
        <?php 
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "select codigo, nombrecurso from cursos")
            or die("Problemas en el select: ".mysqli_error($conexion));
            while($reg = mysqli_fetch_array($registros)){
                echo "<input type='radio' name='codigocurso' value=\"$reg[codigo]\">$reg[nombrecurso] <br>";
            }
        ?>
        <input type="hidden" name="consulta" value="true">
        <input type="submit" value="Registrar">
    </form>
    <h3>Ejercicio Punto 27</h3>
    <form action="capturaTallerDos.php" method="POST">
        Ingrese el codigo del alumno:
        <input type="number" name="codigo"><br>
        <input type="hidden" name="informe" value="true">
        <input type="submit" value="Registrar">
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