<?php
/*


*/
session_start();

include ('header.php');
//include ('leftmain.php');

echo "<title>$title - Agregar Categoria</title>\n";
$current_page = "addcategoria.php";

if (!isset($_SESSION['admin_user'])) {

echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>Login BIBLIOTECA FOCIM</td></tr>\n";
echo "  <tr class=right_main_text>\n";
echo "    <td align=center valign=top scope=row>\n";
echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
echo "        <tr class=right_main_text><td align=center>No estas registado<br>o<br>No tienes permiso de acceder a esta pagina.</td></tr>\n";
echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='login.php'><u>aqui</u></a> para logearse.</td></tr>\n";
echo "      </table><br /></td></tr></table>\n"; exit;
}

// insert a categorias
if($_POST['submit']=='agregar categoria'){
	if(strlen($_POST['nombre'])>1){
	$sql = "INSERT INTO categorias (nombre) VALUES ('".$_POST['nombre']."')";
	$result = mysql_query($sql);
		echo "<BR>";
		echo "            <table align=center class=table_border width=40% border=0 cellpadding=3 cellspacing=0>\n";
		echo "              <tr><td class=table_rows align=center colspan=3 style='color:green;font-family:Tahoma;font-size:12px;'>La Categoria se agrego con exito !!!</td></tr>\n";
		echo "            </table>\n";
	}
}
// fin insert a categorias

// delete a categorias
if($_POST['submit']=='borrar categoria'){
	
	$sql = "DELETE FROM categorias WHERE id='".$_POST['id']."'";
	$result = mysql_query($sql);
		echo "<BR>";
		echo "            <table align=center class=table_border width=40% border=0 cellpadding=3 cellspacing=0>\n";
		echo "              <tr><td class=table_rows align=center colspan=3 style='color:red;font-family:Tahoma;font-size:12px;'>La Categoria se borro con exito !!!</td></tr>\n";
		echo "            </table>\n";
	
}
// fin delete a categorias
echo "            <br />\n";
echo "            <form name='libro' action='$current_page' method='post'>\n";
echo "<table align=center class=table_border><form method='post' action'addcategoria.php'>";
$sql = "SELECT * FROM categorias";
$result = mysql_query($sql);
echo '<tr><td><STRONG>VERIFICADOR</STRONG></td><td><select id="categoria" acdropdown=true style="width:300px;" autocomplete_complete="false" autocomplete_onselect="alertSelected" name="id">';
while($catego = mysql_fetch_array($result)){
	echo "<option value='".$catego['id']."'>".$catego['nombre']."</option>\n";
}
echo "</select></td><td><input type='submit' name='submit' src='images/icons/delete.png' value='borrar categoria'></td></tr></form></table><br><br>";

// agregar categoria
echo "            <table align=center class=table_border width=40% border=0 cellpadding=3 cellspacing=0>\n";
echo "              <tr><th class=rightside_heading nowrap halign=left colspan=3>
                      <img src='images/icons/user_suit.png' />&nbsp;&nbsp;&nbsp;Agregar Categoria</th></tr>\n";
echo "              <tr><td height=15></td></tr>\n";

echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Nombre:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'><input type='text' 
                      size='30' maxlength='31' name='nombre'>&nbsp;*</td></tr>\n";

echo "            </table>\n";
echo "            <table align=center width=40% border=0 cellpadding=0 cellspacing=3>\n";
echo "              <tr><td height=15></td></tr>\n";
echo "            </table>\n";
echo "            <table align=center width=40% border=0 cellpadding=0 cellspacing=3>\n";
echo "              <tr><td width=30><input type='submit' name='submit' value='agregar categoria' src='images/buttons/done_button.png'></td>
                  <td><a href='index.php'><img src='images/buttons/cancel_button.png' border='0'></td></tr></table></form></td></tr>\n";
echo "</table></form>";
// fin agregar pais


// mostrar categorias
$sql = "SELECT * FROM categorias";
$result = mysql_query($sql);
echo "            <br />\n";
echo "            <table align=center class=table_border width=20% border=0 cellpadding=3 cellspacing=0>\n";
echo "              <tr><th class=rightside_heading nowrap halign=left colspan=3>
                      <img src='images/icons/group_add.png' />&nbsp;&nbsp;&nbsp;Listado Categorias</th></tr>\n";
echo "              <tr><td height=15></td></tr>\n";

while ($catego = mysql_fetch_array($result)){
	echo "            <form action='$current_page' method='post'>\n";
	echo "              <tr><td class=table_rows height=25 width=70% style='padding-left:32px;' nowrap>".$catego['nombre']."&nbsp;</td><td>";
	echo "				<input type='hidden' name='id' value='".$catego['id']."'>
						<input type='submit' name='submit' src='images/icons/delete.png' value='borrar categoria'>";
	echo "              </td></tr></form>\n";
	
}

echo "            </table>\n";
echo "            <table align=center width=40% border=0 cellpadding=0 cellspacing=3>\n";
echo "              <tr><td height=15></td></tr>\n";
echo "            </table>\n";
// fin mostrar categorias


include ('footer.php');
?>