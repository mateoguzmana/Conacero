<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$Casillero			=$_SESSION['IdR'];

$Nombre				=$_REQUEST["Nombre"];
$Cedula				=$_REQUEST["Cedula"];
$Tipo				=$_REQUEST["tipo"];

$queryevep			="SELECT COUNT(*) AS TOTAL FROM Cuentas where Cuenta = '$Cedula' and Muestra = 0";
$resultevep			=mysql_query($queryevep, $id);

while($rowevep		=mysql_fetch_array($resultevep))
{
$TOTAL				=$rowevep["TOTAL"];
}

if($TOTAL > 0)
{
?>
<script type="text/javascript">
alert('La cuenta ingresada ya existe en el sistema.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?	
}
else
{
$sql="INSERT INTO  Cuentas (Nombre, Cuenta, Idforma)";
$sql.= "VALUES ('$Nombre','$Cedula','$Tipo')";
mysql_query($sql);


				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?
}
?>