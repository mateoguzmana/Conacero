<?
$host		="localhost";
$user		="rapibox_enviami";
$password	="a!1TIkA(idC=";
$database	="rapibox_enviamipaquete";

$id=mysql_connect($host,$user, $password);

mysql_query("SET CHARACTER SET utf8 ");
mysql_select_db($database, $id);

?>