<?php
////////////////////////////////////////////
//////// BEGIN FILE ////////////////////////
////////////////////////////////////////////
$new = getvariable ("new");
$f = getvariable ("f");
$dat = getvariable ("dat");



if(!$new)
        {
        $file = fopen ("$f/$dat","r");
        $zeile = 0;
        if ($file)
                {
               while (!feof($file))
                        {
                        $filecontent[$zeile] = htmlspecialchars(fgets($file,1000));
                        $zeile++;
                        }
               fclose($file);
                }
        } else {
               $filecontent[10] = "\n\n\n\n\n\n\n\n\n\n";
               $zeile = 11;
        }

echo "<a href=\"$PHP_SELF?q=dir&f=$f\">$text_back_link</a>$text_back_more<br><br>\n";
echo "<a href=\"$f/$dat\" target=\"_blank\">$f/$dat</a><br><br>\n";
echo '<a href="http://'.$_SERVER['HTTP_HOST'].str_replace($doc_root, '', "$f/$dat").'" target="_blank">http://'.$_SERVER["HTTP_HOST"].str_replace($doc_root, '', "$f/$dat")."</a><br><br>\n";
echo "<form action=\"$PHP_SELF?q=write\" method=\"post\">\n\n";

if(is_writable("$f/$dat") || ($new && is_writable("$f")))
      echo "<input type=\"submit\" value=\"$text_edit_submitw\" name=\"write\"  accesskey=\"w\">
      		<input type=\"submit\" value=\"$text_edit_submitq\" name=\"writequit\" accesskey=\"x\">";
else echo $text_file_not_writable;

echo "<input type=\"reset\" value=\"$text_edit_reset\"> 
      <input type=\"submit\" value=\"$text_edit_cancel\" name=\"cancel\" accesskey=\"q\"><br><br>";


echo "<table cellpadding=0 cellspacing=0 border=0><tr><td>";
echo "<textarea cols=4 rows=$zeile wrap=\"off\" >";
for($c=1;$c<$zeile;$c++){
echo $c."\n";
}
echo "</textarea></td>";

echo "<td><textarea cols=210 rows=$zeile name=\"inhalt\"  id=\"data\" wrap=\"off\">";

for($c=0;$c<$zeile;$c++){
echo $filecontent[$c];

}

echo "</textarea></td></tr>";

echo "</table><br>
      <input type=\"hidden\" name=\"f\" value=\"$f\">
      <input type=\"hidden\" name=\"dat\" value=\"$dat\">";

if(is_writable("$f/$dat") || ($new && is_writable("$f")))
      echo "<input type=\"submit\" value=\"$text_edit_submitw\" name=\"write\"  accesskey=\"w\">
      		<input type=\"submit\" value=\"$text_edit_submitq\" name=\"writequit\" accesskey=\"x\">";
else echo $text_file_not_writable;
      
echo "<input type=\"reset\" value=\"$text_edit_reset\">
  		<input type=\"submit\" value=\"$text_edit_cancel\" name=\"cancel\" accesskey=\"q\"></form>";
echo "<a href=\"$PHP_SELF?q=dir&f=$f\">$text_back_link</a>$text_back_more<br><br>\n</body></html>";

?>

