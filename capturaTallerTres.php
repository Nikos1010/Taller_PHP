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
    <a href="./ejerciciosTallerTres.php">Ejercicios</a>
    <br>
    <?php 
        //Ejercicio 34
        if(isset($_REQUEST['nomUsuario'])){
                setcookie("usuario", "$_REQUEST[nomUsuario]", time()+60*60*24*365, "/");
            echo "Se creó la cookie.";
        }

        //Ejercicio 35
        if(isset($_REQUEST['opcion']) && isset($_REQUEST['noticia'])) {
            if($_REQUEST['opcion'] == "recordar"){
                setcookie("titular", $_REQUEST['noticia'], time()+(60*60*24*365), "/");
                echo "Cookie creada";
            } else if ($_REQUEST['opcion'] == "norecordar"){
                setcookie("titular", "", time()-1000, "/");
                echo "Cookie eliminada";
            }
        }

        //Ejercicio 37
        if(isset($_REQUEST['mailalum'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problema con la conexión.");

            $registros = mysqli_query($conexion, "select * from alumnos where mail = '$_REQUEST[mailalum]'")
            or die("Problemas con el select: ".mysqli_error($conexion));
            
            if($reg = mysqli_fetch_array($registros)){
                session_start();
                $_SESSION['nombre'] = $reg['nombre'];
                echo "Se guardo el nombre ".$_SESSION['nombre']."<br>";
                echo "<a href='capturaTallerTres.php?variablesesion=true'>Verificar la variable sesion.</a>";
            } else {
                echo "No exite el mail en la base de datos.";
            }
        }

        //Pagina 3ra de ejercicio 37
        if(isset($_REQUEST['variablesesion'])){
            session_start();
            if(isset($_SESSION['nombre'])){
                echo "Bienvenido alumno ".$_SESSION['nombre'];
                echo "<br><br>";
            } else {
                echo "No puede visitar esta página.";
            }
        }
        
        //Ejercicio 38
        function retornarConexion(){
            $conec = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas en la conexión.");

            $registros = mysqli_query($conec, "select * from alumnos")
            or die("Problemas en el select: ".mysqli_error($conec));

            while($reg = mysqli_fetch_array($registros)){
                echo "Nombre: ".$reg['nombre']."<br>";
                echo "E-Mail: ".$reg['mail']."<br><hr>";
            }
            return $conec;
        }

        //Ejercicio 39
        if(isset($_REQUEST['claveform'])){
            if($_REQUEST['claveform']<>"z80"){
                header("Location: ejerciciosTallerTres.php?error=1");
            } else {
                echo "Bienvenido usuario";
            }
        }
        
        //Ejercicio 41
        if(isset($_REQUEST['direccionweb']) && isset($_REQUEST['puntos'])){
          echo "La direccion: $_REQUEST[direccionweb] tiene ";
          ?>
          <br>
          <img src="circulos.php?puntos=<?php echo $_REQUEST['puntos']; ?>">
          <?php
        }

        //Ejercicio 42
         if(isset($_REQUEST['nombrevisi']) && isset($_REQUEST['queja'])){
            $fecha = date("j/n/y");
            $hora = date("h:i:s");
            $ar = fopen("quejas.txt", "a") or die("Problemas en la creación");
            fputs($ar, $_REQUEST['nombrevisi']);
            fputs($ar,"\n");
            fputs($ar, "Fecha: $fecha - Hora: $hora");
            fputs($ar,"\n");
            fputs($ar, "Queja:");
            fputs($ar,"\n");
            fputs($ar, $_REQUEST['queja']);
            fputs($ar, "\n");
            fputs($ar, "-----------------------------------");
            fputs($ar,"\n");
            fclose($ar);
            echo "Los datos fueron guardados correctamente.<br>";
            echo "<a href='capturaTallerTres.php?logrado=1'>Ir al archivo de quejas</a>";
        }

        //Pagina 3 Ejercicio 42
        if(isset($_REQUEST['logrado'])){
            $ar = fopen('quejas.txt', 'r') or die('No se pudo abrir el archivo txt');
            while(!feof($ar)){
                $lineas = fgets($ar);
                $lineasalto = nl2br($lineas);
                echo $lineasalto;
            }
            fclose($ar);
        }

        //Ejercicio 43
        if(isset($_REQUEST['mes']) && isset($_REQUEST['dia']) && isset($_REQUEST['anio']) && isset($_REQUEST['punto43'])){
            if(is_numeric($_REQUEST['dia']) && is_numeric($_REQUEST['mes']) && is_numeric($_REQUEST['anio'])){
                if(checkdate($_REQUEST['mes'],$_REQUEST['dia'],$_REQUEST['anio'])){
                    echo "La fecha ingresada es correcta";
                } else {
                    echo "La fecha no es válida";
                }
            } else {
                echo "La fecha no es válida";
            }
        }

        //Ejercicio 44
        if(isset($_REQUEST['mes']) && isset($_REQUEST['dia']) && isset($_REQUEST['anio']) && isset($_REQUEST['nombre']) && isset($_REQUEST['mail']) && isset($_REQUEST['codigocurso'])){
            if(is_numeric($_REQUEST['dia']) && is_numeric($_REQUEST['mes']) && is_numeric($_REQUEST['anio'])){
                if(checkdate($_REQUEST['mes'],$_REQUEST['dia'],$_REQUEST['anio'])){
                    $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
                    or die("Problemas con la conexión.");

                    $fechanacimiento = $_REQUEST['anio']."-".$_REQUEST['mes']."-".$_REQUEST['dia'];
                    mysqli_query($conexion, "insert into alumnos(nombre, mail, codigocurso, fechanac) values
                        ('$_REQUEST[nombre]','$_REQUEST[mail]',$_REQUEST[codigocurso],'$fechanacimiento')")
                    or die("Problemas en el select: ".mysqli_error($conexion));
                    mysqli_close($conexion);
                    echo "El alumno fue dado de alta.<br>";
                } else {
                    echo "La fecha no es válida";
                }
            } else {
                echo "La fecha no es válida";
            }
        }

        //Ejercicio 45
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['mail']) && isset($_REQUEST['donar'])){
            if(is_numeric($_REQUEST['donar'])){
                echo "La perona: $_REQUEST[nombre], de mail: $_REQUEST[mail]. <br>";
                printf("Hizo una donacion de: $%'07d dolares",$_REQUEST['donar']);
            } else {
                echo "Donacion invalida.";
            }
        }
    ?>

</body>
</html>