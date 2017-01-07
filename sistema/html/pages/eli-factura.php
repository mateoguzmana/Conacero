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



$Casillero		=	$_SESSION['IdR'];

$Id					=$_REQUEST["Id"];
$MotivoAnulacion 	=$_REQUEST["MotivoAnulacion"];
$UsuarioAnula	    =$_SESSION['usuario'];
$FechaAnulacion		=date('Y-m-d H:i');


$queryka		=	"UPDATE Facturacion set Estado = 2, MotivoAnulacion='$MotivoAnulacion', UsuarioAnula='$UsuarioAnula', FechaAnulacion='$FechaAnulacion' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);
				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
