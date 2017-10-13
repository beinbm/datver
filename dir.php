<?php
#//////////////////////////////////////////
#//// BEGIN DIR ///////////////////////////
#//////////////////////////////////////////
function human_file_size($size)
{
   $filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
   if ($size != 0) return round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i];
   else return 0;
}

function human_perms($perms)
{
if (($perms & 0xC000) == 0xC000) $info = 's';
elseif (($perms & 0xA000) == 0xA000)$info = 'l';
elseif (($perms & 0x8000) == 0x8000) $info = '-';
elseif (($perms & 0x6000) == 0x6000) $info = 'b';
elseif (($perms & 0x4000) == 0x4000) $info = 'd';
elseif (($perms & 0x2000) == 0x2000) $info = 'c';
elseif (($perms & 0x1000) == 0x1000) $info = 'p';
else  $info = 'u';
# Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
           (($perms & 0x0800) ? 's' : 'x' ) :
           (($perms & 0x0800) ? 'S' : '-'));
# Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
           (($perms & 0x0400) ? 's' : 'x' ) :
           (($perms & 0x0400) ? 'S' : '-'));
# World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
           (($perms & 0x0200) ? 't' : 'x' ) :
           (($perms & 0x0200) ? 'T' : '-'));

return $info;
}

function human_fileowner($file) {
		global $ftpowner_num;
		$owner_num = fileowner($file);
		$posix_user = posix_getpwuid(fileowner($file));
		if($ftpowner_num == $owner_num) return "ftp-user";
		elseif($posix_user["name"]) return $posix_user["name"];
		else return $owner_num;
}

function schreibbar($file) {
	global $dir_writable_color, $dir_not_writable_color;	
	if(is_writable($file)) return $dir_writable_color;
	else return $dir_not_writable_color;
}

$command = getvariable ("command");
$f = getvariable ("f");


if(strlen($command)>0)
        {
        echo "<table class=\"command\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td>$text_command_headline</td></tr><tr><td><pre>\n<br>";
        if (get_magic_quotes_gpc()) $command = stripslashes ($command);
        echo "cd ".$f."; ";
        echo $command."\n\n";
        set_time_limit($zeit_limit);
        $a=`cd "$f"; $command`;
        echo htmlspecialchars($a);
        echo "</pre></td></tr></table><br>\n";
        system("exit(0)");
        }

$d = dir("$f/");
if($debug) {
    echo $text_dir_handle.$d->handle."<br>\n";
    echo $text_dir_path.$d->path."<br><br>\n";
    }
echo "<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"post\"><input size=80 name=f value=\"".$f."\"><input name='q' value='dir' type=hidden><input type=submit value=wechseln></form>";
echo "<table><tr><td></td><td>$text_dir_headline_name</td><td>$text_dir_headline_size</td><td>$text_dir_perms</td><td>$text_dir_owner</td><td>$text_dir_headline_date</td><td>$text_dir_headline_delete</td></tr>";



for($i=0; $entry=$d->read(); $i++)
        {
        if($entry != "." && $entry != "..")
               {
               $eintrag[$i] = "<tr>";

               if (substr($f."/".$entry,0,strlen($doc_root))!=$doc_root) $direktlink = "";
               else $direktlink = substr($f."/".$entry, strlen($doc_root));
               

               if(is_dir($d->path.$entry) ) 
                      {
                      $eintrag[$i] .= " <td><a href=\"$direktlink\" target=\"_blank\"><img src=\"$folder_file_icon\" border=0 alt=\"Ordner im Browser anzeigen\"></a></td>
                              <td><a href=\"$PHP_SELF?q=dir&f=$f/$entry\" class=\"dir\">".$entry."</a></td>
                              <td align=\"right\" class=\"listtext\">".human_file_size(filesize("$f/$entry"))."</td>
                              <td align=\"right\" class=\"listtext\"><font color=\"".schreibbar("$f/$entry")."\">".human_perms(fileperms("$f/$entry"))."</font></td>
                              <td align=\"right\" class=\"listtext\"><font color=\"".schreibbar("$f/$entry")."\">".human_fileowner("$f/$entry")."</font></td>
                              <td align=\"right\" class=\"listtext\">".date("H:i d.m.y" , filemtime("$f/$entry"))."</td>
                              <td><a href=\"$PHP_SELF?q=delfile&f=$f&folder=1&dat=$f/$entry\">
                                      <img src=\"$image_delete_item\" border=0 alt=\"$image_delete_item_alt\"></a></td></tr>\n";
                       }      
               if(is_file($d->path.$entry))
                       {
                       $eintrag[$i] .= "<td><a href=\"$direktlink\" target=\"_blank\">";
      
                       
                       $image = ${substr($entry, -3)._file_icon};
                       if(!$image) {$image = $unknown_file_icon;}
                       $eintrag[$i] .= " <img src=\"".$image."\" border=0 alt=\"Datei im Browser anzeigen\">";
                       
                       $eintrag[$i] .= "      </a> </td>
                              <td><a href=\"$PHP_SELF?q=file&f=$f&dat=$entry\" class=\"file\">".$entry."</a></td>
                              <td align=\"right\" class=\"listtext\">".human_file_size(filesize("$f/$entry"))."</td>
                              <td align=\"right\" class=\"listtext\"><font color=\"".schreibbar("$f/$entry")."\">".human_perms(fileperms("$f/$entry"))."</font></td>
                              <td align=\"right\" class=\"listtext\"><font color=\"".schreibbar("$f/$entry")."\">".human_fileowner("$f/$entry")."</font></td>
                              <td align=\"right\" class=\"listtext\">".date("H:i d.m.y" , filemtime("$f/$entry"))."</td>
                              <td><a href=\"$PHP_SELF?q=delfile&f=$f&dat=$f/$entry\">
                                            <img src=\"$image_delete_item\" border=0 alt=\"$image_delete_item_alt\">
                                           </a></td></tr>\n";
                     }
              }
      elseif($entry == "..")
                {
                $eintrag[$i] = " <tr>";
                $neuerpfad_array = explode("/", $f);
                $neuer_pfad = "";
                $groesse = sizeof($neuerpfad_array);
                for($ct=0; $ct+2 < $groesse;$ct++) {
                        $neuer_pfad .= $neuerpfad_array[$ct]."/";
                        }
                $neuer_pfad .= $neuerpfad_array[$groesse-2];

                 if(is_dir($d->path.$entry))
                          {
                          $eintrag[$i] .= "<td>&nbsp;</td>
                           <td><a href=\"$PHP_SELF?q=dir&f=$neuer_pfad\" class=\"dir\"><img src=\"$folder_file_up_icon\" border=0></a></td>
                           <td align=\"right\" class=\"listtext\">".human_file_size(filesize("$f/$entry"))."</td>
                           <td align=\"right\" class=\"listtext\">".human_perms(fileperms("$f/$entry"))."</td>
                           <td align=\"right\" class=\"listtext\">&nbsp;</td>
                           <td align=\"right\" class=\"listtext\">".date("H:i d.m.y" , filemtime("$f/$entry"))."</td>
                           <td>&nbsp;</td></tr>\n";
                        }
                 }
        }

$d->close();

sort($eintrag);
 for($zaehlchen=0;$zaehlchen<$i;$zaehlchen++){
   echo $eintrag[$zaehlchen];
   }



echo "</table><br><form action=\"$PHP_SELF?q=hinzu\" method=\"post\">";
echo "<input name=\"dat\"><input type=\"hidden\" name=\"f\" value=\"$f\">";
echo "<input type=\"hidden\" name=\"new\" value=\"1\"> ";
echo "<input type=\"image\" src=\"$image_new_file\" alt=\"$image_alt_new_file\" border=0 name=\"ist_datei\" value=\"$text_dir_new_file\"> <input type=\"image\" src=\"$image_new_folder\" border=0 name=\"ist_ordner\" value=\"$text_dir_new_folder\"></form>";

echo "<form action=\"$PHP_SELF?q=dir\" method=\"post\">";
echo "<textarea wrap=virtual cols=\"$dir_commandfield_cols\" rows=\"$dir_commandfield_rows\" name=\"command\"></textarea><input type=\"hidden\" name=\"f\" value=\"$f\">";
echo "<br><input type=\"submit\" value=\"$text_dir_execute\"></form>";

echo "<form action=\"".$_SERVER["PHP_SELF"]."?q=up\" method=\"post\" enctype=\"multipart/form-data\">";
echo "<input type=\"file\" name=\"upload\"><input type=\"hidden\" name=\"f\" value=\"$f\">";
echo "<br><input type=\"submit\" value=\"$text_dir_upload\"></form></body></html>";


?>
