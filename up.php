<?php

//////////////////////////////////////////
/////// BEGIN UP /////////////////////////
//////////////////////////////////////////

if (isset($_FILES['upload']) and ! $_FILES['upload']['error'])
  {
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $_POST["f"]."/".$_FILES['upload']['name']))
      echo "<p class='response_ok'>Datei erfolgreich als <a href=\"javascript:open_window('".$_POST["f"]."/".$_FILES['upload']['name']."')\">".$_POST["f"]."/".$_FILES['upload']['name']."</a> hochgeladen</p>\n";
	 else
	 	echo "<p class='response_fail'>Upload ist fehlgeschlagen</p>\n";
  }

include("dir.php");

?>