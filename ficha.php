<?php
/*
ANDRES AMAYA DIAZ

*/
session_start();

include ('header.php');
include('functions.php');
//include ('leftmain.php');

echo "<title>$title - Ficha Bibliografica</title>\n";
$current_page = "ficha.php";

if (!isset( $_SESSION['userid'])) {

echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Login BIBLIOTECA FOCIM</td></tr>\n";
echo "  <tr class=right_main_text>\n";
echo "    <td align=center valign=top scope=row>\n";
echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
echo "        <tr class=right_main_text><td align=center>No estas registado<br>o<br>No tienes permiso de acceder a esta pagina.</td></tr>\n";
echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='login.php'><u>aqui</u></a> para logearse.</td></tr>\n";
echo "      </table><br /></td></tr></table>\n"; exit;
}
is_online();
if(!isset($_GET['id'])){
	
	echo "<BR>";
		echo "            <table align=center class=table_border width=40% border=0 cellpadding=3 cellspacing=0>\n";
		echo "              <tr><td class=table_rows align=center colspan=3 style='color:red;font-family:Arial;font-size:12px;'>ERROR: No se envio ningun libro</td></tr>\n";
		echo "            </table>\n";
	
}else {
	
	$id = $_GET['id'];
	ficha_completa($id);
	
}

include ('footer.php');
?>