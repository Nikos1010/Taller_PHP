<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de datos del form</title>
</head>
<body style="background: <?php 
if(isset($_REQUEST['formato'])) {
    printf("#%X%X%X",150,150,100);
} ?>">
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
        
        //Cookie
        if(isset($_REQUEST['radio34'])){
            if($_REQUEST['radio34'] == "rojo"){
                setcookie("color", "#ff0000", time()+60*60*24*365, "/");
            } else if($_REQUEST['radio34'] == "verde"){
                setcookie("color", "#00ff00", time()+60*60*24*365, "/");
            } else if($_REQUEST['radio34'] == "azul"){
                setcookie("color", "#0000ff", time()+60*60*24*365, "/");
            }

            echo "Se creó la cookie.";
        }

        //Borrar Cookie
        if(isset($_REQUEST['opcion']) && isset($_REQUEST['mailusuario'])) {
            if($_REQUEST['opcion'] == "recordar"){
                setcookie("mail", $_REQUEST['mailusuario'], time()+(60*60*24*365), "/");
                echo "Cookie creada";
            } else if ($_REQUEST['opcion'] == "norecordar"){
                setcookie("mail", "", time()-1000, "/");
                echo "Cookie eliminada";
            }
        }

        //Crear cookie sesion
        if(isset($_REQUEST['cook'])){
            setcookie("usu", "diego",0);
            echo "Cookie de sesión creada.";
        }

        //Variable de sesión
        if(isset($_REQUEST['campousuario']) && isset($_REQUEST['campoclave'])){
            session_start();
            $_SESSION['usuario'] = $_REQUEST['campousuario'];
            $_SESSION['clave'] = $_REQUEST['campoclave'];

            echo "Se almacenaron dos variables de sesión.<br>";
            echo "<a href='captura2.php?variable=true'>Recuperar las variables de sesión</a>";
        }

        //Variable de sesión 3ra pagina
        if(isset($_REQUEST['variable'])){
            session_start();
            echo "Nombre de usuario recuperado de la variable de sesión: ".$_SESSION['usuario'];
            echo "<br><br>";
            echo "La clave recuperada de la variable de sesión: ".$_SESSION['clave'];
        }

        //Punto 38
        function cabeceraPagina($tit){
            echo "<h1 style=\"width: 100%; background:#ffff00; text-align:center;\">$tit</h1>";
        }

        function piePagina($tit){
            echo "<p style=\"width: 100%; background:#cccccc; text-align:center;\">$tit</p>";
        }

        //Redireccion
        if(isset($_REQUEST['redir']) && isset($_REQUEST['direccion'])){
            header("Location: http://$_REQUEST[direccion]");
        }

        //Verificacion
        if(isset($_REQUEST['numero'])){
            session_start();
            if($_SESSION['numeroaleatorio'] == $_REQUEST['numero']){
                echo "Ingreso el valor correcto";
            } else {
                echo "Incorrecto";
            }
        }

        //Fecha
        if(isset($_REQUEST['problema'])){
            $fecha = date("j/n/y");
            echo "La fecha de hoy es: $fecha <br>";
            echo "<a href='captura2.php?problemaDos=1'>Siguiente Problema</a>";
        }

        if(isset($_REQUEST['problemaDos'])){
            $dato = date("L");
            if($dato == 1){
                echo "Año bisiesto";
            } else {
                echo "Año no bisiesto";
            }
            echo "<br>Día de la semana: ";
            $dato = date("w");
            switch ($dato) {
                case 0: echo "Domingo";
                    break;
                case 1: echo "Lunes";
                    break;
                case 2: echo "Martes";
                    break;
                case 3: echo "Miercoles";
                    break;
                case 4: echo "Jueves";
                    break;
                case 5: echo "Viernes";
                    break;
                case 6: echo "Sábado";
                    break;
            }

        }

        //Validar Fecha
        if(isset($_REQUEST['dia']) && isset($_REQUEST['mes']) && isset($_REQUEST['anio']) && isset($_REQUEST['validacion'])){
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

        //Alta alumno
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['mail']) && isset($_REQUEST['dia']) && isset($_REQUEST['mes']) && isset($_REQUEST['anio']) && isset($_REQUEST['codigocurso'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $fechanacimiento = $_REQUEST['anio']."-".$_REQUEST['mes']."-".$_REQUEST['dia'];
            mysqli_query($conexion, "insert into alumnos(nombre, mail, codigocurso, fechanac) values
                ('$_REQUEST[nombre]','$_REQUEST[mail]',$_REQUEST[codigocurso],'$fechanacimiento')")
            or die("Problemas en el select: ".mysqli_error($conexion));
            mysqli_close($conexion);
            echo "El alumno fue dado de alta.<br>";
            echo "<a href='captura2.php?listadoalu=1'>Ver listado alumnos</a>";
        }

        if(isset($_REQUEST['listadoalu'])){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "select alu.codigo as codigo,nombre,mail,codigocurso,fechanac, 
                nombrecurso from alumnos as alu inner join cursos as cur on cur.codigo = alu.codigocurso")
            or die("Problemas en el select: ".mysqli_error($conexion));

            while($reg = mysqli_fetch_array($registros)){
                echo "Codigo: ".$reg['codigo']."<br>";
                echo "Nombre: ".$reg['nombre']."<br>";
                echo "Mail: ".$reg['mail']."<br>";
                echo "Fecha de nacimiento: ".$reg['fechanac']."<br>";
                echo "Curso: ".$reg['nombrecurso']."<br><hr>";
            }
            mysqli_close($conexion);
        }

        //Formateo de datos
        if(isset($_REQUEST['formato'])){
            echo "Esta página definimos el color de fondo indicando la cantidad de rojo,
            verde y azul en formato decimal y solicitando a la función printf que haga
            la conversión a hecadecimal. <br>
            Recordemos que la propiedad bgcolor de la marca body lo requiere en hexadecimal.<br>";
            echo "<a href='captura2.php?formato2=1'>Último ejemplo</a>";
        }

        if(isset($_REQUEST['formato2'])){
            $dia = 6;
            $mes = 5;
            $anio = 2006;
            printf("%02d/%02d/%d",$dia,$mes,$anio);
            echo "<br>";
            $importe = 170;
            printf("Valor: $%'x7d", $importe);
        }
    ?>
</body>
</html>