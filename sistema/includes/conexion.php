<?
$host		="localhost";
$user		="conacero";
$password	="%eg]hT*6M(&.";
$database	="conacero_sistema";

$id			=mysql_connect($host,$user, $password);

mysql_query("SET CHARACTER SET utf8 ");
mysql_select_db($database, $id);

?>