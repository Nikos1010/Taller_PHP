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
    <br>
    <?php 
        //Delete
        if(isset($_REQUEST['mail']) && isset($_REQUEST['delete'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión");

            $registros = mysqli_query($conexion, "select codigo from alumnos
            where mail = '$_REQUEST[mail]'") or die("Problemas en el select: ".mysqli_error($conexion));

            if($reg = mysqli_fetch_array($registros)) {
                mysqli_query($conexion, "delete from alumnos where mail = '$_REQUEST[mail]'")
                or die("Problemas en el select: ".mysqli_error($conexion));
                echo "Se efectuó el borrado del alumno con dicho mail";
            } else {
                echo "No existe un alumno con ese mail.";
            }
            mysqli_close($conexion);
        }

        //Update
        if(isset($_REQUEST['mail']) && isset($_REQUEST['update'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "select * from alumnos where mail = '$_REQUEST[mail]'")
            or die("Problemas en el select: ".mysqli_error($conexion));
            if($reg = mysqli_fetch_array($registros)){
    ?>
            <form action="captura2.php" method="POST">
                Ingrese nuevo mail:
                <input type="text" name="mailnuevo" value="<?php echo $reg['mail']; ?>"><br>
                <input type="hidden" name="mailviejo" value="<?php echo $reg['mail']; ?>">
                <input type="submit" value="Modificar">
            </form>
    <?php
            } else {
                echo "No existe alumno con dicho mail.";
            }
        }
        
        //Finish update
        if(isset($_REQUEST['mailnuevo']) && isset($_REQUEST['mailviejo'])) {
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            mysqli_query($conexion, "update alumnos set mail = '$_REQUEST[mailnuevo]'
                                    where mail = '$_REQUEST[mailviejo]'") or
            die("Problema en el select: ".mysqli_error($conexion));
            echo "El mail fue modificado con exito";
        }

        //Insert
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['mail']) && isset($_REQUEST['codigocurso']) && isset($_REQUEST['consulta'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");
            
            mysqli_query($conexion, "insert into alumnos(nombre,mail,codigocurso)
            values('$_REQUEST[nombre]','$_REQUEST[mail]',$_REQUEST[codigocurso])")
            or die("Problemas en el select: ".mysqli_error($conexion));
            mysqli_close($conexion);
            echo "El alumno fue dado de alta";
        }

        //Update 2 tablas
        if(isset($_REQUEST['mail']) && isset($_REQUEST['modificar'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "select * from alumnos where mail = '$_REQUEST[mail]'")
            or die("Problemas en el select: ".mysqli_error($conexion));
            if($regalu = mysqli_fetch_array($registros)){
    ?>
            <form action="captura2.php" method="POST">
                <input type="hidden" name="mailviejo" value="<?php echo $regalu['mail']; ?>">
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
                echo "No existe alumno con dicho mail.";
            }
        }

        //Segunda parte Update dos tablas
        if(isset($_REQUEST['mailviejo']) && isset($_REQUEST['codigocurso'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "update alumnos set codigocurso = $_REQUEST[codigocurso] where mail = '$_REQUEST[mailviejo]'")
            or die("Problemas en el select: ".mysqli_error($conexion));
            
            echo "El curso fue modificado con exito.";
        }

        //Parametros por vinculos
        if(isset($_REQUEST['tabla'])){
            echo "Listado de la tabla del $_REQUEST[tabla] <br>";
            for($f = 1; $f <= 10; $f++){
                $valor = $f * $_REQUEST['tabla'];
                echo $valor."-";
            }
        }

        //Subir un archivo
        if(isset($_REQUEST['subir'])){
            copy($_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
            echo "La foto se registro en el servidor.<br>";
            $nom = $_FILES['foto']['name'];
            echo "<img src=\"$nom\" width='200px' heigh='200px'>";
        }
    ?>
</body>
</html>