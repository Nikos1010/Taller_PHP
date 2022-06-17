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
    ?>
</body>
</html>