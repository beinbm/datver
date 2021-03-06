<?
 
# Main Preferences #
$doc_root = substr($_SERVER["DOCUMENT_ROOT"],0,-1);
$URL_to_Mainpage = "../";      #URL zur Hauptseite
$zeit_limit = 30;                      #Zeitlimit des Befehls (in sec)
# Main Preferences #

$pix = 1;  # Hier 0 eingeben um die Bilder zu deaktivieren
$debug = 0; # Handle- und Pathanzeige

# Filesystem

$ftpowner_num = 1057067; #benutzernummer des FTP-Benutzers (sieht man in der Spalte "Besitzer" beim ersten Datveraufruf)

$text_dir_handle = "Handle: ";          #Text f�r Handle
$text_dir_path = "Path: ";              #Text f�r Path

$text_dir_headline_name = "Dateiname";  #Text f�r �berschrift Dateiname
$text_dir_headline_size = "Gr&ouml;&szlig;e";   #Text f�r �berschrift Size
$text_dir_perms = "Rechte"; #Text �berschrift f�r Rechte
$text_dir_owner = "Besitzer";  #Besitzrecht/Eigent�mer der Datei
$text_dir_headline_date = "Datum";      #Text f�r �berschrift Date
$text_dir_headline_delete = "";         #Text f�r �berschrift delete
$text_dir_new_file = "Datei anlegen";   #Text f�r Button "Datei anlegen"
$text_dir_new_folder = "Ordner anlegen";        #Text f�r Button "Ordner anlegen"
$text_dir_execute = "Befehl ausf&uuml;hren";    #Text f�r Ausf�hren
$text_dir_upload = "Datei hochladen";
$dir_writable_color = "#148E22"; 			#Farbe, wenn datei f�r die Datver schreibbar ist
$dir_not_writable_color = "#850A0A";		# Farbe, wenn nicht

$image_delete_item = "gfx/delete.gif"; #Bilddatei f�r L�schenknopf
$image_delete_item_alt = "l&ouml;schen?";       #Alt-Tag von L�schenknopf
$image_new_file = "gfx/file.gif"; #
$image_alt_new_file = "Neue datei anlegen"; #
$image_new_folder = "gfx/create_folder.gif"; #
$image_alt_new_folder = "Ordner anlegen"; #


$php_file_icon = "gfx/php_file.gif";
$txt_file_icon = "gfx/txt_file.gif";
$unknown_file_icon = "gfx/unknown_file.gif";
$inc_file_icon = "gfx/file.gif";
$jpg_file_icon = "gfx/jpg_file.gif";
$gif_file_icon = "gfx/gif_file.gif";
$tml_file_icon = "gfx/html_file.gif";
$exe_file_icon = "gfx/exec_file.gif";
$mp3_file_icon = "gfx/mp3_file.gif";
$wav_file_icon = "gfx/mp3_file.gif";
$gz_file_icon = "gfx/view_file.gif";
$folder_file_icon = "gfx/folder_icon.gif";
$folder_file_up_icon = "gfx/folder_up.gif";

$dir_commandfield_rows = "5";   #
$dir_commandfield_cols = "38";  #

# Shellzugriff #
$text_command_headline = "Ausgabe:";    #�berschrift bei Ausgabe

# Edit-Men� #
$text_file_not_writable = "Datei nicht schreibbar! Bitte Rechte mit FTP-Pr�fen";
$text_edit_submitw = "schreiben (alt+w)"; #Best�tigungstext
$text_edit_submitq = "schreiben + schlie&szlig;en (alt+x)"; #Best�tigungstext
$text_edit_reset = "Wiederherstellen";  #Text zum Zur�cksetzen
$text_edit_cancel = "Abbrechen (alt+q)";  #Text zum Abbrechen und zur�ck in die Datver
$text_back_link = "zur&uuml;ck ";  # Text f�r backlink (gleiche funktion wie Abbrechen)
$text_back_more = "zur Ordneransicht"; # Text nach dem Backlink
# Delete Item #

$delete_response_text_folder = "Der Ordner wurde gel&ouml;scht.";       #
$delete_response_text_file = "Die Datei wurde gel&ouml;scht.";  #
$delete_response_text_cancel = "Es wurde vom User aus abgebrochen.";    #
$delete_question_folder = "Soll der Ordner mit allen Inhalten wirklich gel&ouml;scht werden?";  #
$delete_question_file = "Soll die Datei wirklich gel&ouml;scht werden?";        #

$delete_button_submit = "l&ouml;schen"; #
$delete_button_cancel = "abbrechen";    #

# Write File Response #
$write_response_text_ok = "Der Inhalt wurde ge&auml;ndert.";    #
$write_response_text_failed = "Ein Fehler ist aufgetreten!";    #
$write_response_text_cancel = "Der Inhalt wurde beibehalten.";    #

?>

