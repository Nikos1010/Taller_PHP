<?php 
    $ancho = 110;
    $alto = 30;
    $imagen = ImageCreate($ancho,$alto);
    $anchoelip = 15;
    $altoelip = 15;
    $cenx = 15;
    $ceny = 15;
    $col = ImageColorAllocate($imagen,12,189,60);
    $eli = ImageColorAllocate($imagen,2,10,180);
    ImageFill($imagen, 0,0, $col);
    $blanco = ImageColorAllocate($imagen,255,255,255);

    for ($i=0; $i < $_REQUEST['puntos']; $i++) { 
        ImageFilledEllipse($imagen, $cenx,$ceny,$anchoelip,$altoelip, $eli);
        $cenx = $cenx + 20;
    }


    Header("Content-Type: image/jpeg");
    ImageJPEG($imagen);
    ImageDestroy($imagen);

?>