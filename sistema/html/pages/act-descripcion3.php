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



$Casillero			=$_SESSION['IdR'];

$Id					=$_REQUEST["Id"];
$Nombre				=$_REQUEST["Nombre"];
$Unidad				=$_REQUEST["Unidad"];
$ValorUnidad		=$_REQUEST["ValorUnidad"];

$ValorUnidad		=str_replace("$","",$ValorUnidad);
$ValorUnidad		=str_replace(" ","",$ValorUnidad);
$ValorUnidad		=str_replace(",","",$ValorUnidad);
$ValorUnidad		=str_replace("_","",$ValorUnidad);
$ValorUnidad		=str_replace("___","",$ValorUnidad);
$ValorUnidad		=str_replace("__","",$ValorUnidad);



$queryka			="UPDATE Descripcion set Nombre = '$Nombre', Unidad = '$Unidad', ValorUnidad = '$ValorUnidad' Where Id='$Id'";
$resultka			=mysql_query($queryka, $id);
				

				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
