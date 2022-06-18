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
    <h3>Ejercicio Punto 28</h3>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $cursos = mysqli_query($conexion, "select nombrecurso from cursos")
        or die("Problemas en el select: ".mysqli_error($conexion));

        $registros = mysqli_query($conexion, "select count(codigo) as cantidad from cursos")
        or die("Problemas en el select: ".mysqli_error($conexion));

        $reg = mysqli_fetch_array($registros);
        echo "La cantidad de cursos son: $reg[cantidad]<br>";
        
        while($cur = mysqli_fetch_array($cursos)){
            echo "$cur[nombrecurso] ";
        }
    ?>
    <h3>Ejercicio Punto 29</h3>
    <form action="capturaTallerDos.php" method="POST">
        Ingrese el codigo del alumno:
        <input type="number" name="codigo"><br>
        <input type="hidden" name="busqueda" value="true">
        <input type="submit" value="Registrar">
    </form>
    <h3>Ejercicio Punto 30</h3>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $registros = mysqli_query($conexion, "select count(alu.codigo) as cantidad, nombrecurso, codigocurso 
                                    from alumnos as alu inner join cursos as cur 
                                    on cur.codigo = alu.codigocurso group by alu.codigocurso")
        or die("Problemas en el select: ".mysqli_error($conexion));
        
        while($reg = mysqli_fetch_array($registros)){
            echo "Nombre del curso: ".$reg['nombrecurso']."<br>";
            echo "Cantidad de inscritos: ".$reg['cantidad']."<br>";
            echo "Nombres: ";
            $count = 1;
            $alumnos = mysqli_query($conexion, "select nombre from alumnos where codigocurso = $reg[codigocurso]")
            or die("Problemas en el select: ".mysqli_error($conexion));
            while($regalu = mysqli_fetch_array($alumnos)){
                if($count < $reg['cantidad']) {
                    echo "$regalu[nombre] - ";
                    $count++;
                } else {
                    echo "$regalu[nombre]";
                }
            }
            echo "<hr>";
        }
        mysqli_close($conexion);
    ?>
    <h3>Ejercicio Punto 31</h3>
    <div>
        <a href="capturaTallerDos.php?codigo=4&pag=true">PHP</a><br>
        <a href="capturaTallerDos.php?codigo=5&pag=true">ASP</a><br>
        <a href="capturaTallerDos.php?codigo=6&pag=true">JSP</a><br>
        <a href="capturaTallerDos.php?codigo=7&pag=true">JS</a>
    </div>
    <h3>Ejercicio Punto 32</h3>
    <a href="./paginacionTallerDos.php">Ejercicio Paginación</a>
    <h3>Ejercicio Punto 33</h3>
    <form action="capturaTallerDos.php" method="POST" enctype="multipart/form-data">
        Seleccione el archivo:
        <input type="file" name="foto1"><br>
        <input type="file" name="foto2"><br>
        <input type="file" name="foto3"><br>
        <input type="hidden" name="subirarchivos">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>