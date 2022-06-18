<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de datos del form</title>
</head>
<body>
    <a href="./index.php">Home</a>
    <a href="./ejerciciosTallerDos.php">Ejercicios</a>
    <br>
    <?php 
        //Ejercicio 20
        if(isset($_REQUEST['nombrecurso']) && isset($_REQUEST['create'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("problemas con la conexión.");
            mysqli_query($conexion, "insert into cursos(nombrecurso)
            values('$_REQUEST[nombrecurso]')")
            or die("problemas en el select".mysqli_error($conexion));
            
            mysqli_close($conexion);
            echo "El curso fue dado de alta";
        }

        //Ejercicio 22
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['search'])) {
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "select codigo,nombre,codigocurso from alumnos
            where nombre = '$_REQUEST[nombre]'") or die("Problemas en el select: ".mysqli_error($conexion));

            $count = 0;
            while ($reg = mysqli_fetch_array($registros)) {
                $count = 1;
                echo "Codigo: ".$reg['codigo']."<br>";
                echo "Nombre: ".$reg['nombre']."<br>";
                echo "Curso: ";
                switch ($reg['codigocurso']){
                    case 1: echo "PHP";
                            break;
                    case 2: echo "ASP";
                            break;
                    case 3: echo "JSP";
                            break;
                }
                echo "<br><hr>";
            }
            if($count < 1){
                echo "No existe un alumno con ese nombre.<br>";
            }
            mysqli_close($conexion);
        }

        //Ejercicio 25
        if(isset($_REQUEST['nombrecurso']) && isset($_REQUEST['update'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problema con la conexión.");

            $registros = mysqli_query($conexion, "select * from cursos where nombrecurso = '$_REQUEST[nombrecurso]'")
            or die("Problemas con el select: ".mysqli_error($conexion));
            if($reg = mysqli_fetch_array($registros)){
        ?>
            <form action="capturaTallerDos.php" method="POST">
                Ingrese el nombre del curso nuevo:
                <input type="text" name="nombrecursonuevo" value="<?php echo $reg['nombrecurso']; ?>"><br>
                <input type="hidden" name="nombrecursoviejo" value="<?php echo $reg['nombrecurso']; ?>">
                <input type="submit" value="Modificar">
            </form>
        <?php
            } else {
                echo "No exite curso con dicho nombre.";
            }
        }

        if(isset($_REQUEST['nombrecursonuevo']) && isset($_REQUEST['nombrecursoviejo'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            mysqli_query($conexion, "update cursos set nombrecurso = '$_REQUEST[nombrecursonuevo]'
                                    where nombrecurso = '$_REQUEST[nombrecursoviejo]'") or
            die("Problema en el select: ".mysqli_error($conexion));
            echo "El nombre del curso fue modificado con exito";
        }
        
        //Ejercicio 26
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['mail']) && isset($_REQUEST['codigocurso']) && isset($_REQUEST['consulta'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");
            mysqli_query($conexion, "insert into alumnos(nombre,mail,codigocurso)
            values('$_REQUEST[nombre]','$_REQUEST[mail]',$_REQUEST[codigocurso])")
            or die("Problemas en el select: ".mysqli_error($conexion));
            mysqli_close($conexion);
            echo "El alumno fue dado de alta.";
        }

        //Ejercicio 27
        if(isset($_REQUEST['codigo']) && isset($_REQUEST['informe'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");
            $registros = mysqli_query($conexion, "select nombre, mail, nombrecurso from alumnos as alu
                                        inner join cursos as cur on cur.codigo = alu.codigocurso 
                                        where alu.codigo = ".$_REQUEST['codigo'])
            or die("Problemas en el select: ".mysqli_error($conexion));
            
            if($reg = mysqli_fetch_array($registros)){
                echo "Nombre: ".$reg['nombre']."<br>";
                echo "E-Mail: ".$reg['mail']."<br>";
                echo "Curso: ".$reg['nombrecurso']."<br>";
                echo "<hr>";
            } else {
                echo "No existe el codigo de alumno ingresado.";
            }
            mysqli_close($conexion);
        }
        
        //Ejercicio 29
        if(isset($_REQUEST['codigo']) && isset($_REQUEST['busqueda'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");
            
            $registros = mysqli_query($conexion, "select * from alumnos where codigo = $_REQUEST[codigo]")
            or die("Problemas en el select: ".mysqli_error($conexion));
            
            if($regalu = mysqli_fetch_array($registros)){
    ?>
            <form action="capturaTallerDos.php" method="POST">
                <input type="hidden" name="codigoalumno" value="<?php echo $regalu['codigo']; ?>">
                Mail:
                <input type="text" name="mail" value="<?php echo $regalu['mail']; ?>"><br>
                Nombre:
                <input type="text" name="nombre" value="<?php echo $regalu['nombre']; ?>"><br>
                <select name="codigocurso">
                    <?php 
                        $registros = mysqli_query($conexion, "select * from cursos") 
                        or die("Problemas en el select: ".mysqli_error($conexion));

                        while($regcur = mysqli_fetch_array($registros)){
                            if($regalu['codigocurso'] == $regcur['codigo']){
                                echo "<option value=\"$regcur[codigo]\" selected>$regcur[nombrecurso]</option>";
                            } else {
                                echo "<option value=\"$regcur[codigo]\">$regcur[nombrecurso]</option>";
                            }
                        }
                    ?>
                </select><br>
                <input type="submit" value="Modificar">
            </form>
    <?php
            } else {
                echo "No existe el codigo de alumno ingresado.";
            }
            mysqli_close($conexion);
        }

        if(isset($_REQUEST['codigoalumno']) && isset($_REQUEST['mail']) && isset($_REQUEST['nombre']) && isset($_REQUEST['codigocurso'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            mysqli_query($conexion, "update alumnos set nombre = '$_REQUEST[nombre]',
                                    mail = '$_REQUEST[mail]', codigocurso = $_REQUEST[codigocurso]
                                    where codigo = $_REQUEST[codigoalumno]") 
            or die("Problema en el select: ".mysqli_error($conexion));

            echo "Los datos fueron modificados con exito.";
            mysqli_close($conexion);
        }

        //Ejercicio 31
         if(isset($_REQUEST['codigo']) && isset($_REQUEST['pag'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            
            $registros = mysqli_query($conexion, "select nombrecurso from cursos where codigo = $_REQUEST[codigo]")
            or die("Problemas en el select: ".mysqli_error($conexion));
            
            if($cur = mysqli_fetch_array($registros)){
                $registros = mysqli_query($conexion, "select nombre, mail from alumnos where codigocurso = $_REQUEST[codigo]")
                or die("Problemas en el select: ".mysqli_error($conexion));
                echo "Nombre curso: ".$cur['nombrecurso']."<br>";
                echo "Alumnos inscritos: <br><hr>";
                while ($reg = mysqli_fetch_array($registros)) {
                    echo "  - Nombre: ".$reg['nombre']."<br>";
                    echo "  - E-Mail: ".$reg['mail']."<br><hr>";
                }
            } else {
                echo "No se encontro el curso .-.";
            }
            mysqli_close($conexion);
        }

        //Ejercicio 33
        if(isset($_REQUEST['subirarchivos'])){
            copy($_FILES['foto1']['tmp_name'], $_FILES['foto1']['name']);
            copy($_FILES['foto2']['tmp_name'], $_FILES['foto2']['name']);
            copy($_FILES['foto3']['tmp_name'], $_FILES['foto3']['name']);
            echo "Las fotos se registraron en el servidor.<br>";
            $nom1 = $_FILES['foto1']['name'];
            $nom2 = $_FILES['foto2']['name'];
            $nom3 = $_FILES['foto3']['name'];
            echo "<img src=\"$nom1\" width='200px' heigh='200px'><br>";
            echo "<img src=\"$nom2\" width='200px' heigh='200px'><br>";
            echo "<img src=\"$nom3\" width='200px' heigh='200px'><br>";
        }
    ?>

</body>
</html>