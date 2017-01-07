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

$Usuario=$_SESSION['usuario'];

$TipoCuenta 		=$_REQUEST["TipoCuenta"];
$Opcion 			=$_REQUEST["TipoForm"];
$Idobra				=$_REQUEST["Idobra"];
$Idproveedor		=$_REQUEST["IdProve"];
$NumeroFactura 		=$_REQUEST["NumeroFactura"];
$Obra				=$_REQUEST["Nombreobra"];
$Proveedor			=$_REQUEST["Nombreproveedor"];
$TipoCta 			=$_REQUEST["TipoCta"];
$NumeroCuenta		=$_REQUEST["NumeroCuenta"];
$FormaPago			=$_REQUEST["FormaPago"];
$FechaInicio		=$_REQUEST["FechaPago"];
$FechaVencimiento 	=$_REQUEST["FechaVencimiento"];
$Retencion 			=$_REQUEST["Retencion"];
$Valor				=$_REQUEST["Valor"];
$Concepto			=$_REQUEST["Concepto"];

$Valor		=	 str_replace("$","",$Valor);
$Valor		=	 str_replace(" ","",$Valor);
$Valor		=	 str_replace(",","",$Valor);
$Valor		=	 str_replace("_","",$Valor);
$Valor		=	 str_replace("___","",$Valor);
$Valor		=	 str_replace("__","",$Valor);

$Descuento=(($Valor*($Retencion/100)));

$ValorRetencion =($Valor-$Descuento);

$sql="INSERT INTO  CuentasPagar (TipoCuenta,NumeroFactura,Idobra,Idproveedor,Obra,Proveedor,FechaInicio,FechaFin,Retencion,Valor,ValorRetencion,Concepto,Usuario,Estado)";
$sql.= "VALUES ('$TipoCuenta', '$NumeroFactura' , '$Idobra' , '$Idproveedor' , '$Obra' , '$Proveedor' , '$FechaInicio' , '$FechaVencimiento' , '$Retencion' ,'$Valor' , '$ValorRetencion' ,'$Concepto','$Usuario','0')";
mysql_query($sql);
			

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href='<?=$_SESSION['anterior']?>';
</script>	
