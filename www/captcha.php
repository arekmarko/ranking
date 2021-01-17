<?php
session_start();
$znaki = '0123456789'; # dozwolone znaki
$szerokosc = 130; # szerokość obrazka
$wysokosc = 30; # wysokość obrazka
$ilosc_znakow = 6; # długość captchy
$str = ''; # zmienna pomocnicza

#losowanie ciągu znaków
for ($i = 0; $i < $ilosc_znakow; $i++)
    $str .= substr($znaki, mt_rand(0, strlen($znaki) -1), 1);

$string = $str;

#przypisanie do zmiennej sesyjnej
$_SESSION['captcha'] = $string;

#tworzenie obrazka o danych wymiarach
$im = imagecreate($szerokosc, $wysokosc);

#kolory obrazka
$tlo      = imagecolorallocate($im,0,0,0);
$czcionka = imagecolorallocate($im,255,255,255);
$siatka   = imagecolorallocate($im,78,78,78);
$ramka    = imagecolorallocate($im,255,255,255);

imagefill($im,1,1,$tlo); #wypełnienie tłem

#losowanie siatki
for ($i=0; $i<1600; $i++) {
    $rand1 = rand(0,$szerokosc);
    $rand2 = rand(0,$wysokosc);
    imageline($im,$rand1,$rand2,$rand1, $rand2, $siatka);
}

#losowanie pozycji znaków
$x = rand(5, $szerokosc/(7/2));

#dodawanie obramowania
imagerectangle($im, 0, 0, $szerokosc-1, $wysokosc-1, $ramka);

#umieszczanie liter na obrazku
for ($a=0; $a < $ilosc_znakow+1; $a++) {
    imagestring(
        $im, $ilosc_znakow, $x, rand(4, $wysokosc/5),
        substr($string,$a,1), $czcionka
    );
    $x += (5*3); # odstęp między literami
}

# zwrócenie wygenerowanego obrazka
header("Content-type: image/gif");
imagegif($im);
imagedestroy($im);
?>
