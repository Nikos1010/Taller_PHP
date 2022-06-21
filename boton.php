<?php 
    $ancho = 100;
    $alto = 30;
    $imagen = ImageCreate($ancho,$alto);

    $x1 = rand(0, $ancho);
    $y1 = rand(0, $alto);
    $x2 = rand(0, $ancho);
    $y2 = rand(0, $alto);
    $col = ImageColorAllocate($imagen,12,189,60);
    $blanco = ImageColorAllocate($imagen,255,255,255);
    ImageFilledRectangle($imagen, $x1,$y1,$x2,$y2, $col);
    ImageString($imagen, 5,10,5,"Beautiful", $blanco);
    Header("Content-Type: image/jpeg");
    ImageJPEG($imagen);
    ImageDestroy($imagen);

?>