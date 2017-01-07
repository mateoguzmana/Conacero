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

$Id 				=$_REQUEST["Id"];
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
$FechaFin 			=$_REQUEST["FechaFin"];
$Retencion 			=$_REQUEST["Retencion"];
$Valor				=$_REQUEST["Valor"];
$Concepto			=$_REQUEST["Concepto"];
$Estado 			=$_REQUEST["Estado"];

$Valor		=	 str_replace("$","",$Valor);
$Valor		=	 str_replace(" ","",$Valor);
$Valor		=	 str_replace(",","",$Valor);
$Valor		=	 str_replace("_","",$Valor);
$Valor		=	 str_replace("___","",$Valor);
$Valor		=	 str_replace("__","",$Valor);

$Descuento=(($Valor*($Retencion/100)));

$ValorRetencion =($Valor-$Descuento);

$queryRARA ="SELECT * FROM CuentasPagar WHERE Id='$Id'";
$resultRARA=mysql_query($queryRARA,$id);

while ($rowRARA=mysql_fetch_array($resultRARA)) {
		$ValorAbonado=$rowRARA["ValorAbonado"];
		$ValorActual =$rowRARA["Valor"];

		$Deuda		=($ValorActual-$ValorAbonado);
}
	if ($Valor<=$ValorAbonado && $Estado==4) { ?>
	<script type="text/javascript">
	alert('El valor es menor al abono actual, no se puede realizar la operacion');
	window.location.href="<?=$_SESSION['anterior']?>";
	</script>
<?	}
else
{ 


$sql="UPDATE CuentasPagar SET TipoCuenta='$TipoCuenta' , NumeroFactura='$NumeroFactura' , Idobra='$Idobra' , Idproveedor='$Idproveedor', 
Obra='$Obra',Proveedor='$Proveedor' ,FechaInicio='$FechaInicio', FechaFin='$FechaFin' , Retencion='$Retencion' ,Valor='$Valor', ValorRetencion='$ValorRetencion' ,Concepto='$Concepto',Estado='$Estado' WHERE Id='$Id'  ";
$result	=	mysql_query($sql, $id);
				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	

<? } ?>