<?php

//////////////////////////////////////////////
//////// BEGIN WRITE //////////
//////////////////////////////////////////////
$writequit = getvariable ("writequit");
$write = getvariable ("write");
$f = getvariable ("f");
$dat = getvariable ("dat");
$inhalt = getvariable ("inhalt");
$cancel = getvariable ("cancel");

if(strlen($writequit)>0 || strlen($write)>0) {

$file = fopen ("$f/$dat","w");
if ($file)
        {
        if (get_magic_quotes_gpc()) $inhalt = stripslashes($inhalt);
        fputs($file, ereg_replace('>', '>', ereg_replace('<', '<', ereg_replace('"', '"', ereg_replace('&', '&', $inhalt)))));
        fclose($file);
        echo "<p class='response_ok'>$write_response_text_ok</p>";
        }
else echo "<p class='response_fail'>$write_response_text_failed</p>";
}
elseif(strlen($cancel)>0) echo "<p class='response_fail'>$write_response_text_cancel</p>";

if($writequit) include("dir.php"); // damit nach schreiben dir weitergeht
elseif($write) include("file.php");
elseif($cancel) include("dir.php");

?>
