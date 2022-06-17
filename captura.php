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
    ?>
</body>
</html>