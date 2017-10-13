<?php
include("conf.inc");

function getvariable ($name) {
#	global $_POST;
#	global $_GET;
   if($_POST[$name])	return $_POST[$name];
	elseif($_GET[$name]) 	return $_GET[$name];
	else {
	   global $$name;
	 	if($$name)	return $$name;
	 	else			return false;
	 	}
	 
}
 
$PHP_SELF = "index.php";

$q = getvariable ("q");
# $ = getvariable ("");
# $ = getvariable ("");


if(!$q) {
	$q = "dir";
}
if(!$f) {
		 $f = $doc_root;
} 



include("header.inc");
include($q.".php");


#echo "f: ".$f."<br>\n";
#echo "dat: ".$dat."<br>\n";
#echo "get_dat: ".$_GET["dat"]."<br>\n";
#echo "q: ".$q."<br>\n";


?>
