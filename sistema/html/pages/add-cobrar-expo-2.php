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

$Usuario 			=$_SESSION['usuario'];

$TipoCuenta 		=$_REQUEST["TipoCuenta"];
$Opcion 			=$_REQUEST["TipoForm"];
$Idobra				=$_REQUEST["Idobra"];
$Idcliente			=$_REQUEST["IdProve"];
$Obra				=$_REQUEST["Nombreobra"];
$Cliente			=$_REQUEST["Nombreproveedor"];
$TipoCta 			=$_REQUEST["TipoCta"];
$NumeroCuenta		=$_REQUEST["NumeroCuenta"];
$FormaPago			=$_REQUEST["FormaPago"];
$FechaInicio		=$_REQUEST["FechaPago"];
$Valor				=$_REQUEST["Valor"];
$Concepto			=$_REQUEST["Concepto"];

$Valor				=str_replace("$","",$Valor);
$Valor				=str_replace(" ","",$Valor);
$Valor				=str_replace(",","",$Valor);
$Valor				=str_replace("_","",$Valor);
$Valor				=str_replace("___","",$Valor);
$Valor				=str_replace("__","",$Valor);


$sql="INSERT INTO  CuentasCobrar (TipoCuenta,Opcion,Idobra,Idcliente,Obra,Cliente,FechaInicio,Valor,Concepto,Usuario,Estado)";
$sql.= "VALUES ('$TipoCuenta', '$Opcion' , '$Idobra' , '$Idcliente' , '$Obra' , '$Cliente' , '$FechaInicio' , '$Valor' , '$Concepto','$Usuario','0')";
mysql_query($sql);

				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
