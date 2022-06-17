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
        // echo "El nombre ingresado es: ";
        // echo $_REQUEST['nombre'];
        // if($_REQUEST['radio1']=="suma"){
        //     $suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
        //     echo "La suma es: $suma";
        // } else if($_REQUEST['radio1']=="resta"){
        //     $resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
        //     echo "La resta es: $resta";
        // }
        if(isset($_REQUEST['check1'])){
            $suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
            echo "La suma es: $suma<br>";
        }
        if(isset($_REQUEST['check2'])){
            $resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
            echo "La resta es: $resta<br>";
        }
        if(isset($_REQUEST['nombre'])){
            echo "El nombre ingresado: ".$_REQUEST['nombre']."<br>";
        }
        if(isset($_REQUEST['curriculum'])){
            echo "El curriculum: ".$_REQUEST['curriculum'];
        }
        //Comentarios
        if(isset($_REQUEST['comentarios']) && isset($_REQUEST['nombre'])){
            $ar = fopen("datos.txt", "a") or die("Problemas en la creación");
            fputs($ar,$_REQUEST['nombre']);
            fputs($ar,"\n");
            fputs($ar,$_REQUEST['comentarios']);
            fputs($ar,"\n");
            fputs($ar, "-------------------------------------");
            fputs($ar,"\n");
            fclose($ar);
            echo "Los datos se cargaron correctamente.";
        }
        echo "<br>";
        $ar = fopen("datos.txt", "r") or die("No se pudo abrir el archivo");
        while(!feof($ar)){
            $linea = fgets($ar);
            $lineasalto = nl2br($linea);
            echo $lineasalto;
        }
        fclose($ar);
        echo "<br>";
        
        //Base de datos
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['mail']) && isset($_REQUEST['codigocurso'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1") or die("Problemas con la conexión");
            mysqli_query($conexion,"insert into alumnos(nombre,mail,codigocurso)
            values('$_REQUEST[nombre]','$_REQUEST[mail]',$_REQUEST[codigocurso])") or 
            die("Problemas en el select".mysqli_error($conexion));

            mysqli_close($conexion);
            echo "El alumno fue dado de alta.";
        }

        //Consulta
        if(isset($_REQUEST['mail'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión");

            $registros = mysqli_query($conexion, "select codigo, nombre, codigocurso from alumnos
            where mail = '$_REQUEST[mail]'") or die("Problemas en el select: ".mysqli_error($conexion));

            if($reg = mysqli_fetch_array($registros)) {
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
            } else {
                echo "No existe un alumno con ese mail.";
            }
            mysqli_close($conexion);
        }
    ?>
</body>
</html>