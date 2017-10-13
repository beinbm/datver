<?php
#///////////////////////////////////////////
#//////// BEGIN DELFILE ////////////////////
#///////////////////////////////////////////

$ja = getvariable ("ja");
$nein = getvariable ("nein");
$folder = getvariable ("folder");
$verz_delete = getvariable ("verz_delete");
$f = getvariable ("f");
$q = getvariable ("q");
$dat = getvariable ("dat");


        if (!$ja && !$nein) echo "<a href=\"$PHP_SELF?q=dir&f=$f\">$text_back_link</a>$text_back_more<br><br>\n";
if($ja){
        if ($verz_delete){
                $a=`cd "$f"; rm -fr "$dat"`;
                echo(nl2br(str_replace(' ', '&nbsp;', $a)));
                echo "<p class='response_ok'>$delete_response_text_folder</p>";
                }
        else {
                unlink($dat);
                echo "<p class='response_ok'>$delete_response_text_file</p>";
                }
        include("dir.php");
        }
elseif($nein){
        echo "<p class='response_fail'>$delete_response_text_cancel</p>";
        include("dir.php");
        }
else {

echo  $dat."<br><br>";
if($folder==1) echo "$delete_question_folder </body></html>";
else echo "$delete_question_file";

echo "<form action=\"$PHP_SELF?q=delfile\" method=\"post\">";
echo "<input type=\"hidden\" name=\"f\" value=\"$f\">";
if($folder==1) echo "<input type=\"hidden\" name=\"verz_delete\" value=\"1\">";
echo "<input type=\"hidden\" name=\"dat\" value=\"$dat\">";
echo "<input type=\"submit\" name=\"ja\" value=\"$delete_button_submit\">";
echo "<input type=\"submit\" name=\"nein\" value=\"$delete_button_cancel\"></form></body></html>";
}





?>
