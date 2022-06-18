<?php 
    if(isset($_REQUEST['pos'])){
        $inicio = $_REQUEST['pos'];
    } else{
        $inicio = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginacion</title>
</head>
<body>
    <a href="./index.php">Home</a>
    <a href="./ejerciciosTallerDos.php">Ejercicios</a>
    <br>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "Noithyung15-25%", "base1")
        or die("Problemas con la conexión.");

        $registros = mysqli_query($conexion, "select codigo, nombrecurso from cursos limit $inicio,3")
        or die("Problemas en el select: ".mysqli_error($conexion));
        $impresos = 0;
        while($reg = mysqli_fetch_array($registros)){
            $impresos++;
            echo "Codigo: ".$reg['codigo']."<br>";
            echo "Nombre del Curso: ".$reg['nombrecurso']."<br><hr>";
        }
        if($inicio == 0) {
            echo "Anteriores ";
        } else {
            $anterior = $inicio-3;
            echo "<a href=\"paginacionTallerDos.php?pos=$anterior\">Anteriores</a> ";
        }
        if($impresos == 3) {
            $proximo = $inicio+3;
            echo "<a href=\"paginacionTallerDos.php?pos=$proximo\">Siguientes</a>";
        } else {
            echo "Siguientes";
        }
        mysqli_close($conexion);
    ?>
</body>
</html>