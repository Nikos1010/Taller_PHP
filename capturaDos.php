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
    <a href="./ejerciciosTallerUno.php">Ejercicios</a>
    <br>
    <?php 
        if(isset($_REQUEST['nombre']) && isset($_REQUEST['edad']) > 0){
            echo "El nombre ingresado es: ";
            echo $_REQUEST['nombre'];
            echo "<br>";
            echo "La edad ingresada es: ";
            echo $_REQUEST['edad'];
            echo "<br>";
            if($_REQUEST['edad'] >= 18) {
                echo "La persona es mayor de edad.";
            } else {
                echo "La persona es menor de edad.";
            }
        }

        //Ejercicio 10
        if(isset($_REQUEST['radio1']) && isset($_REQUEST['nombre2'])) {
            $nombre = $_REQUEST['nombre2'];
            if($_REQUEST['radio1']=="noEstudio"){
                echo "$nombre no posee estudios";
            } else if($_REQUEST['radio1']=="primario"){
                echo "$nombre tiene estudios primarios";
            } else if($_REQUEST['radio1']=="secundario"){
                echo "$nombre tiene estudios secundarios";
            }
        }

        //Ejercicio 11
        if(isset($_REQUEST['nombre'])){
            $nombre = $_REQUEST['nombre'];
            echo "$nombre practica los siguientes deportes: ";
            if(isset($_REQUEST['check1'])) {
                echo "Futbol ";
            }
            if(isset($_REQUEST['check2'])) {
                echo "Basket ";
            }
            if(isset($_REQUEST['check3'])) {
                echo "Tennis ";
            }
            if(isset($_REQUEST['check4'])){
                echo "Voley ";
            }
        }
        
        //Ejercicio 13
        if(isset($_REQUEST['contrato'])){
            echo "El contrato queda estipulado asi:<br>";
            echo $_REQUEST['contrato'];
        }

        //Ejercicio 15
        if(isset($_REQUEST['nombre2']) && isset($_REQUEST['direccion'])){
            $ar = fopen("pedidos.txt", "a") or die("Problemas en la creación");
            fputs($ar, $_REQUEST['nombre2']);
            fputs($ar,"\n");
            fputs($ar, $_REQUEST['direccion']);
            fputs($ar,"\n");
            if(isset($_REQUEST['checkUno']) && isset($_REQUEST['cantidad1'])){
                fputs($ar, "Pizza de Jamon y Queso, Cantidad: ".$_REQUEST['cantidad1']);
                fputs($ar,"\n");
            }
            if(isset($_REQUEST['checkDos']) && isset($_REQUEST['cantidad2'])){
                fputs($ar, "Pizza Napolitana, Cantidad: ".$_REQUEST['cantidad2']);
                fputs($ar,"\n");
            }
            if(isset($_REQUEST['checkTres']) && isset($_REQUEST['cantidad3'])){
                fputs($ar, "Pizza Muzzarella, Cantidad: ".$_REQUEST['cantidad3']);
                fputs($ar,"\n");
            }
            fputs($ar, "-----------------------------------");
            fputs($ar,"\n");
            fclose($ar);
            echo "Los datos fueron guardados correctamente.";
        }
    ?>

</body>
</html>