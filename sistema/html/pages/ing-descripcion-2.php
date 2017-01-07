<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$Casillero		=	$_SESSION['IdR'];

$Nombre				=$_REQUEST["Nombre"];
$Unidad				=$_REQUEST["Unidad"];
$ValorUnidad		=$_REQUEST["ValorUnidad"];

$ValorUnidad		=	 str_replace("$","",$ValorUnidad);
$ValorUnidad		=	 str_replace(" ","",$ValorUnidad);
$ValorUnidad		=	 str_replace(",","",$ValorUnidad);
$ValorUnidad		=	 str_replace("_","",$ValorUnidad);
$ValorUnidad		=	 str_replace("___","",$ValorUnidad);
$ValorUnidad		=	 str_replace("__","",$ValorUnidad);

$sql="INSERT INTO  Descripcion (Nombre, Unidad, ValorUnidad)";
$sql.= "VALUES ('$Nombre','$Unidad','$ValorUnidad')";
mysql_query($sql);


?>
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
