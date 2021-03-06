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
    <a href="./paginacion.php">Paginacion</a>
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
    <h4>BASE DE DATOS</h4>
    <h1>Alta de Alumnos</h1>
    <form action="captura.php" method="POST">
        Ingrese nombre:
        <input type="text" name="nombre"><br>
        Ingrese mail:
        <input type="text" name="mail"><br>
        Seleccione el curso:
        <select name="codigocurso">
            <option value="1">PHP</option>
            <option value="2">ASP</option>
            <option value="3">JSP</option>
        </select>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <h4>LISTADO</h4>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("problemas con la conexión.");

        $registros = mysqli_query($conexion, 
        "select codigo, nombre, mail, codigocurso from alumnos")
        or die("Problemas en el select: ".mysqli_error($conexion));

        while($reg = mysqli_fetch_array($registros)){
            echo "Codigo: ".$reg['codigo']."<br>";
            echo "Nombre: ".$reg['nombre']."<br>";
            echo "E-Mail: ".$reg['mail']."<br>";
            echo "Curso: ";
            switch ($reg['codigocurso']){
                case 1: echo "PHP";
                        break;
                case 2: echo "ASP";
                        break;
                case 3: echo "JSP";
                        break;
                case 4: echo "PHP";
                        break;
                case 5: echo "ASP";
                        break;
                case 6: echo "JSP";
                        break;
                case 7: echo "JS";
                        break;
            }
            echo "<br>";
            echo "<hr>";
        }
        mysqli_close($conexion);
    ?>
    <h4>CONSULTA</h4>
    <form action="captura.php" method="POST">
        Ingrese el mail del alumno a consultar:
        <input type="text" name="mail"><br>
        <input type="submit" value="Buscar">
    </form>
    <h4>DELETE UN REGISTRO</h4>
    <form action="captura2.php" method="POST">
        Ingrese el mail del alumno a borrar:
        <input type="text" name="mail"><br>
        <input type="hidden" name="delete" value="true">
        <input type="submit" value="Buscar">
    </form>
    <h4>DELETE TODOS LOS REGISTROS</h4>
    <?php 
        $eliminar = false;
        if($eliminar){
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            mysqli_query($conexion, "delete from alumnos")
            or die("Problemas en el select: ".mysqli_error($conexion));
            echo "Se efectuo el borrado de todos los alumnos.";
            mysqli_close($conexion);
        } else {
            echo "Esperando a borrado total.";
        }
    ?>
    <h4>UPDATE UN REGISTRO</h4>
    <form action="captura2.php" method="POST">
        Ingrese el mail del alumno:
        <input type="text" name="mail"><br>
        <input type="hidden" name="update" value="true">
        <input type="submit" value="Buscar">
    </form>
    <h4>INSERT Y CONSULTA DE OTRA TABLA</h4>
    <form action="captura2.php" method="POST">
        Ingrese nombre:
        <input type="text" name="nombre"><br>
        Ingrese mail:
        <input type="text" name="mail"><br>
        Seleccione el curso:
        <select name="codigocurso">
        <?php 
            $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
            or die("Problemas con la conexión.");

            $registros = mysqli_query($conexion, "select codigo, nombrecurso from cursos")
            or die("Problemas en el select: ".mysqli_error($conexion));
            while($reg = mysqli_fetch_array($registros)){
                echo "<option value=\"$reg[codigo]\">$reg[nombrecurso]</option>";
            }
        ?>
        </select><br>
        <input type="hidden" name="consulta" value="true">
        <input type="submit" value="Registrar">
    </form>
    <h4>LISTADO VARIAS TABLAS</h4>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $registros = mysqli_query($conexion, "select alu.codigo as codigo, nombre, mail,
                                    codigocurso, nombrecurso from alumnos as alu 
                                    inner join cursos as cur on cur.codigo = alu.codigocurso")
                    or die("Problemas en el select: ".mysqli_error($conexion));
        while($reg = mysqli_fetch_array($registros)){
            echo "Codigo: ".$reg['codigo']."<br>";
            echo "Nombre: ".$reg['nombre']."<br>";
            echo "E-Mail: ".$reg['mail']."<br>";
            echo "Curso: ".$reg['nombrecurso']."<br>";
            echo "<hr>";
        }
        mysqli_close($conexion);
    ?>
    <h4>FUNCION COUNT</h4>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $registros = mysqli_query($conexion, "select count(*) as cantidad from alumnos")
        or die("Problemas en el select: ".mysqli_error($conexion));

        $reg = mysqli_fetch_array($registros);
        echo "La cantidad de alumnos inscritos son: ".$reg['cantidad']."<br>";
    ?>
    <h4>UPDATE UN REGISTRO TRABAJANDO CON DOS</h4>
    <form action="captura2.php">
        Ingrese el mail del alumno:
        <input type="text" name="mail"><br>
        <input type="hidden" name="modificar">
        <input type="submit" value="Buscar">
    </form>
    <h4>CLÁUSULA GROUP BY</h4>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $registros = mysqli_query($conexion, "select count(alu.codigo) as cantidad, nombrecurso 
                                    from alumnos as alu inner join cursos as cur 
                                    on cur.codigo = alu.codigocurso group by alu.codigocurso")
        or die("Problemas en el select: ".mysqli_error($conexion));

        while($reg = mysqli_fetch_array($registros)){
            echo "Nombre del curso: ".$reg['nombrecurso']."<br>";
            echo "Cantidad de inscritos: ".$reg['cantidad']."<br><hr>";
        }
        mysqli_close($conexion);
    ?>
    <h4>PARAMETROS EN UN HIPERVINCULO</h4>
    <div>
        <a href="captura2.php?tabla=2">Tabla 2</a><br>
        <a href="captura2.php?tabla=3">Tabla 3</a><br>
        <a href="captura2.php?tabla=5">Tabla 5</a>
    </div>
    <h4>PAGINACIÓN DE REGISTROS</h4>
    <div>
        <?php 
            if(isset($_REQUEST['pos'])){
                $inicio = $_REQUES['pos'];
            } else{
                $inicio = 0;
            }
        ?>
    </div>
    <h4>SUBIR UN ARCHIVO</h4>
    <form action="captura2.php" method="POST" enctype="multipart/form-data">
        Seleccione el archivo:
        <input type="file" name="foto"><br>
        <input type="hidden" name="subir">
        <input type="submit" value="Enviar">
    </form>
    <h4>COOKIE</h4>
    <?php 
        if(isset($_COOKIE['color'])) echo "<div style=\"background: $_COOKIE[color]\" >"
    ?>
    <form action="captura2.php" method="POST">
        Seleccione de que color desea que sea la página de ahora en más:<br>
        <input type="radio" value="rojo" name="radio34">Rojo<br>
        <input type="radio" value="verde" name="radio34">Verde<br>
        <input type="radio" value="azul" name="radio34">Azul<br>
        <input type="submit" value="Crear cookie">
    </form>
    <?php echo "</div>" ?>
    <h4>BORRADO DE COOKIE</h4>
    <form action="captura2.php" method="POST">
        Ingrese su mail:
        <input type="text" name="mailusuario" value="<?php if(isset($_COOKIE['mail'])) echo $_COOKIE['mail']; ?>"><br>
        <input type="radio" value="recordar" name="opcion">Recordar el mail ingresado.<br>
        <input type="radio" value="norecordar" name="opcion">No recordar.<br>
        <input type="submit" value="Confirmar">
    </form>
    <h4>COOKIE DE SESIÓN</h4>
    <?php 
        if(isset($_COOKIE['usu'])){
            echo "Cookie de sesión creada. su valor es $_COOKIE[usu]";
        } else {
            echo "No existe cookie de sesión.";
        }
    ?>
    <br>
    <a href="captura2.php?cook=true">Crear cookie de sesión</a>
    <h4>VARIABLES DE SESIÓN</h4>
    <form action="captura2.php" method="POST">
        Ingrese nombre de usuario:
        <input type="text" name="campousuario"><br>
        Ingrese clave:
        <input type="password" name="campoclave"><br>
        <input type="submit" value="confirmar">
    </form>
    <h4>INCLUIR ARCHIVO EXTERNO</h4>
    <?php 
        require_once("captura2.php");
        cabeceraPagina("Titulo principal de la página");
        echo "<br><br><center>Este es el cuerpo de la página<br><br></center>";
        piePagina("Pie de la página");
    ?>
    <h4>REDIRECCIONAR</h4>
    <form action="captura2.php?redir=true" method="POST">
        Ingrese dirección de sitio web (ej: www.google.com):
        <input type="text" name="direccion" size="30"><br>
        <input type="submit" value="Redireccionar">
    </form>
    <h4>IMAGENES DINAMICAS</h4>
    <a href="./imagen.php">Ir a Imagen</a>
    <h4>IMAGENES DINAMICAS EN HTML</h4>
    <form action="captura2.php" method="POST">
        Digitos verificadores: <img src="imagen.php"><br>
        Ingrese valor:
        <input type="text" name="numero"><br>
        <input type="submit" value="Verificar">
    </form>
    <h4>ADMINISTRACION DE FECHAS Y HORAS</h4>
    <?php 
        $fecha = date("d/m/y");
        $hora = date("h:i:s");
        echo "La fecha de hoy es: $fecha<br>";
        echo "La hora actual es: $hora<br>";
    ?>
    <a href="captura2.php?problema=1">Siguiente Problema</a>
    <h4>VALIDACION DE UNA FECHA</h4>
    <form action="captura2.php" method="POST">
        Ingrese una fecha (dd/mm/aaaa):
        <input type="text" name="dia" size="2">
        <input type="text" name="mes" size="2">
        <input type="text" name="anio" size="4"><br>
        <input type="hidden" value="validacion">
        <input type="submit" value="Validar">
    </form>
    <h4>CARGA UNA FECHA A MYSQL</h4>
    <form action="captura2.php" method="POST">
        Ingrese nombre:
        <input type="text" name="nombre"><br>
        Ingrese mail:
        <input type="text" name="mail"><br>
        Ingrese la fecha de nacimiento (dd/mm/aaaa):
        <input type="text" name="dia" size="2">
        <input type="text" name="mes" size="2">
        <input type="text" name="anio" size="4"><br>
        Seleccione el curso:
        <select name="codigocurso">
            <?php 
                $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
                or die("Problemas con la conexión.");

                $registros = mysqli_query($conexion, "select codigo,nombrecurso from cursos")
                or die("Problemas en el select: ".mysqli_error($conexion));
                
                while($reg = mysqli_fetch_array($registros)){
                    echo "<option value=\"$reg[codigo]\">$reg[nombrecurso]</option>";
                }
            ?>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
    <a href='captura2.php?listadoalu=1'>Ver listado alumnos</a>
    <h4>FORMATEO DE DATOS (printf)</h4>
    <?php 
        $entero = 255;
        printf("Valor entero en formato decimal %d <br>", $entero);
        printf("Valor entero en formato hexadecimal con letras minúsculas %x <br>", $entero);
        printf("Valor entero en formato hexadecimal con letras mayúsculas %X <br>", $entero);
        printf("Valor entero en formato binario %b <br>", $entero);
        printf("Valor entero en formato octal %o <br>", $entero);
        $letra = 65;
        printf("Valor entero como caracter ascii %c <br>", $letra);
        $real = 10.776;
        printf("Impresion de un valor de tipo double %f <br>", $real);
        printf("Impresion de un valor de tipo double indicando la cantidad de decimales a imprimir %0.2f <br>", $real);
    ?>
    <a href="captura2.php?formato=1">Algunas utilidades de estas conversiones</a>
    <h4>FORMATO DE DATOS Y SALIDA A UN STRING (sprintf)</h4>
    <?php 
        function retornarColorHexa($rojo,$verde,$azul){
            $color = sprintf("#%02X%02X%02X", $rojo,$verde,$azul);
            return $color;
        }
    ?>
    <table>
        <tr>
            <td style="background: <?php echo retornarColorHexa(255,0,0)?>">Cuadro Rojo</td>
            <td style="background: <?php echo retornarColorHexa(0,255,0)?>">Cuadro Verde</td>
            <td style="background: <?php echo retornarColorHexa(0,0,255)?>">Cuadro Azul</td>
        </tr>
    </table>
</body>
</html>