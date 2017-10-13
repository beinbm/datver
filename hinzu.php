<?php

#/////////////////////////////////////////////
#//// BEGIN HINZU ////////////////////////////
#/////////////////////////////////////////////

$ist_ordner_x = getvariable ("ist_ordner_x");
$ist_ordner_y = getvariable ("ist_ordner_y");
$ist_ordner = getvariable ("ist_ordner");
$f = getvariable ("f");
$dat = getvariable ("dat");



if($ist_ordner_x || $ist_ordner_y || $ist_ordner)
        {
        mkdir ("$f/$dat" , 0777);
        include("dir.php");
        }
else
        {
        include("file.php");
        }



?>
