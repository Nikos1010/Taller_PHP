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
    <h3>Ejercicio Punto 34</h3>
    <form action="capturaTallerTres.php" method="POST">
        Nombre usuario:
        <input type="text" name="nomUsuario"><br>
        <input type="submit" value="Crear cookie">
    </form>
    <br>
    <?php 
        if(isset($_COOKIE['usuario'])){
            echo $_COOKIE['usuario'];
        }
    ?>
    <h3>Ejercicio Punto 35</h3>
    <div>
        <?php 
            if(isset($_COOKIE['titular'])){
                if($_COOKIE['titular'] == "notipolitica"){
                    echo "<p> Noticia Política </p>";
                } else if($_COOKIE['titular'] == "notieconomica"){
                    echo "<p> Noticia Económica </p>";
                } else if($_COOKIE['titular'] == "notideportiva"){
                    echo "<p> Noticia Deportiva </p>";
                }
            } else {
                echo "<p> Noticia Política </p>";
                echo "<p> Noticia Económica </p>";
                echo "<p> Noticia Deportiva </p>";
            }
        ?>
    </div>
    <form action="capturaTallerTres.php" method="POST">
        <input type="radio" name="noticia" value="notipolitica">Noticia Política<br>
        <input type="radio" name="noticia" value="notieconomica">Noticia Económica<br>
        <input type="radio" name="noticia" value="notideportiva">Noticia Deportiva<br>
        <input type="radio" name="opcion" value="recordar">Recordar<br>
        <input type="radio" name="opcion" value="norecordar">No Recordar<br>
        <input type="submit" value="Crear cookie">
    </form>
    <h3>Ejercicio Punto 37</h3>
    <form action="capturaTallerTres.php" method="POST">
        Ingresar mail:
        <input type="text" name="mailalum"><br>
        <input type="submit" value="Buscar">
    </form>
    <h3>Ejercicio Punto 38</h3>
    <?php 
        require_once("capturaTallerTres.php");
        $conectado = retornarConexion();           
        
    ?>
    <h3>Ejercicio Punto 39</h3>
    <?php 
        if(isset($_REQUEST['error'])){
            echo "Ingreso de clave incorrecta";
        }
    ?>
    <form action="capturaTallerTres.php" method="POST">
        Ingrese la clave (ej z80):
        <input type="password" name="claveform"><br>
        <input type="submit" value="Enviar Clave">
    </form>
    <h3>Ejercicio Punto 40</h3>
    <a href="./boton.php">Ir al boton</a>
    <h3>Ejercicio Punto 41</h3>
    <form method="post" action="capturaTallerTres.php">
        <label>Ingrese la direccion de un sitio web (ej www.google.com):</label>
        <input type="text" name="direccionweb">
        <br>
        <label>De puntaje al sitio:</label>
        <select name="puntos">
            <?php 
                for($f=0;$f<=5;$f++){
                    echo "<option value='$f'>$f</option>";
                }
            ?>
        </select>
        <br>
        <input type="submit" value="confirmar">
    </form>
    <h3>Ejercicio Punto 42</h3>
    <form method="post" action="capturaTallerTres.php">
        <label>Ingrese su nombre:</label>
        <input type="text" name="nombrevisi"><br>
        <textarea name="queja" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Poner Queja">
    </form>
    <a href='capturaTallerTres.php?logrado=1'>Ir al archivo de quejas</a>
    <h3>Ejercicio Punto 43</h3>
    <form method="post" action="capturaTallerTres.php">
        <label>Ingrese la fecha (dd/mm/aaaa):</label>
        <select name="dia">
            <?php 
                for ($i=1; $i <= 31; $i++) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <select name="mes">
            <?php 
                for ($i=1; $i <= 12; $i++) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <select name="anio">
            <?php 
                for ($i=2022; $i >= 1957; $i--) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <br>
        <input type="hidden" value="punto43">
        <input type="submit" value="Validar Fecha">
    </form>
    <h3>Ejercicio Punto 44</h3>
    <form method="post" action="capturaTallerTres.php">
        <label>Ingrese nombre: </label>
        <input type="text" name="nombre"><br>
        <label>Ingrese mail: </label>
        <input type="text" name="mail"><br>
        <label>Ingrese la fecha (dd/mm/aaaa):</label>
        <select name="dia">
            <?php 
                for ($i=1; $i <= 31; $i++) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <select name="mes">
            <?php 
                for ($i=1; $i <= 12; $i++) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <select name="anio">
            <?php 
                for ($i=2022; $i >= 1900; $i--) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <br>
        <label>Seleccione el curso: </label>
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
        <input type="submit" value="Validar Fecha">
    </form>
    <a href='captura2.php?listadoalu=1'>Ver listado alumnos</a>
    <h3>Ejercicio Punto 45</h3>
    <form method="post" action="capturaTallerTres.php">
        <label>Ingrese nombre: </label>
        <input type="text" name="nombre"><br>
        <label>Ingrese mail: </label>
        <input type="text" name="mail"><br>
        <label>Donacion: </label>
        <input type="text" name="donar"><br>
        <input type="submit" value="Haga su donacion">
    </form>
    <h3>Ejercicio Punto 46</h3>
    <?php 
        $tabla = "";
        for ($f=32; $f <= 255; $f++) { 
            $tabla = $tabla . sprintf("%c", $f);
        }
        echo $tabla;
    ?>
</body>
</html>