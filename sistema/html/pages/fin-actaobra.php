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

$Id					= $_REQUEST["Id"];
$horaactual 		= date("Y-m-d H:i:s");
$Usuario	 		= $_SESSION['usuario'];

$queryka		=	"UPDATE Actasobra set Estado = '3' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);



$queryQQ 			="SELECT * FROM Actasobra WHERE Id='$Id'";
$resultQQ 			=mysql_query($queryQQ,$id);

while($rowQQ 		=mysql_fetch_array($resultQQ)) {
$Idobra 			=$rowQQ["Idobra"];
$Idproveedor 		=$rowQQ["Idproveedor"];
$TipoCuenta     	=1;
$FechaInicio 		=$rowQQ["Fechafact"];

$Retencion 			=$rowQQ["Retencion"];
$Valor 				=$rowQQ["Valor"];
$ValorRete 			=$rowQQ["ValorRte"];
$Concepto			=$rowQQ["Descripcion"];
$ValorRetencion     =($Valor-$ValorRete);
}

$FechaVencimiento 	=$_REQUEST["FechaFin"];

$query33 			="SELECT * FROM Obras WHERE Id='$Idobra'";
$result33 			=mysql_query($query33,$id);
while 				($row33=mysql_fetch_array($result33)) {
$Obra 				=$row33["Nombre"];
}

$query44 			="SELECT * FROM Proveedores WHERE Id='$Idproveedor'";
$result44 			=mysql_query($query44,$id);
while 				($row44=mysql_fetch_array($result44)) {
$Proveedor			=$row44["Nombre"];
}

$sql="INSERT INTO  CuentasPagar (TipoCuenta,NumeroFactura,Idobra,Idproveedor,Obra,Proveedor,FechaInicio,FechaFin,Retencion,Valor,ValorRetencion,Concepto,Usuario,Estado)";
$sql.= "VALUES ('$TipoCuenta', '$Id' , '$Idobra' , '$Idproveedor' , '$Obra' , '$Proveedor' , '$FechaInicio' , '$FechaVencimiento' , '$Retencion' ,'$Valor' , '$ValorRetencion' ,'$Concepto','$Usuario','0')";
mysql_query($sql);
?>


	
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
