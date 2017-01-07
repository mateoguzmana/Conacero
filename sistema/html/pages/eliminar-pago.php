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



$Id				=$_REQUEST["Id"];
$MotivoAnulacion=$_REQUEST["MotivoAnulacion"];

//Consulta para obtener el valor del historico
$queryKK 		="SELECT * FROM HistorialPagos WHERE Id='$Id'";
$resultKK 		=mysql_query($queryKK,$id);
while ($rowKK 	=mysql_fetch_array($resultKK)) {
$Abono 			=$rowKK["Abono"];
$Idfact 		=$rowKK["Idcuenta"];		
}
//Consulta para obtener el valor de cuentas pagar
$queryQQ 		="SELECT * FROM CuentasPagar WHERE Id='$Idfact'";
$resultQQ 		=mysql_query($queryQQ,$id);
while($rowQQ	=mysql_fetch_array($resultQQ)) {
$ValorCuenta 	=$rowQQ["ValorAbonado"];
}
$Resta 			=($ValorCuenta-$Abono);

//Restamos el valor de CuentasPagar
$queryLL 		="UPDATE CuentasPagar SET ValorAbonado='$Resta' WHERE Id='$Idfact'";
$resultLL 		=mysql_query($queryLL,$id);

// Eliminamos el historico de pagos
$queryka		="UPDATE HistorialPagos SET MotivoAnulacion='$MotivoAnulacion', Muestra = 1 WHERE Id='$Id'";
$resultka		=mysql_query($queryka,$id);


				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
