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
$MotivoAnulacion	=$_REQUEST["MotivoAnulacion"];
//Consulta para traer el valor del historico
$query88 		="SELECT * FROM HistorialCobros WHERE Id='$Id'";
$result88 		=mysql_query($query88,$id);
while ($row88   =mysql_fetch_array($result88)) {
$Valor 		 	=$row88["Abono"];
$Idfact 		=$row88["Idcuenta"];
}

//Consulta para traer el valor cobrado de facturacion
$queryKK 		="SELECT * FROM Facturacion WHERE Id='$Idfact'";
$resultKK 		=mysql_query($queryKK,$id);
while ($rowKK 	=mysql_fetch_array($resultKK)) {
$ValorFact 		=$rowKK["ValorCobrado"];
} 
$RestaFact 		=($ValorFact-$Valor);

//Consulta para traer el valor cobrado del movimiento de facturacion
$queryQQ 		="SELECT * FROM Facturacionmov WHERE Idfact='$Idfact'";
$resultQQ 		=mysql_query($queryQQ,$id);
while ($rowQQ 	=mysql_fetch_array($resultQQ)) {
$ValorMov 		=$rowQQ["ValorCobrado"];
} 
$RestaMov 		=($ValorMov-$Valor);

//Resta el valor de facturación				
$query1 		="UPDATE Facturacion SET ValorCobrado='$RestaFact' WHERE Id='$Idfact'";
$result1 		=mysql_query($query1,$id);

//Resta el valor del movimiento
$queryREX 		="UPDATE Facturacionmov SET ValorCobrado='$RestaMov' WHERE Idfact='$Idfact'";
$resultREX 		=mysql_query($queryREX,$id);

//Elimina el historico
$queryka		="UPDATE HistorialCobros set MotivoAnulacion='$MotivoAnulacion', Muestra = 1 Where Id='$Id'";
$resultka		=mysql_query($queryka, $id);


?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
