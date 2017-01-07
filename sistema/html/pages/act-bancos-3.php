<?
session_start();


if (empty($_SESSION['sesionx']))
{
?>
<script type="text/javascript">

	alert('Su sesion ha finadlizado.');
	parent.location.href=('login.php');

</script>
<?
}

include("../../includes/conexion.php");




$Id					=$_REQUEST["Id"];
$Nombre				=$_REQUEST["Nombre"];


$queryka			="UPDATE Bancos set Nombre = '$Nombre' Where Id='$Id'";
$resultka			=mysql_query($queryka, $id);	
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
