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
$CuentaContable 	=$_REQUEST["CuentaContable"];
$Observaciones 		=$_REQUEST["Observaciones"];
$Abono 				=$_REQUEST["Abono"];
$FechaAbono 		=$_REQUEST["FechaAbono"];
$horaactual 		=date("Y-m-d H:i:s");
$Usuario	 		=$_SESSION['usuario'];



$Abono				=str_replace("$","",$Abono);
$Abono				=str_replace(" ","",$Abono);
$Abono				=str_replace(",","",$Abono);
$Abono				=str_replace("_","",$Abono);
$Abono				=str_replace("___","",$Abono);
$Abono				=str_replace("__","",$Abono);


$query1	 			="SELECT * FROM CuentasPagar WHERE Id='$Id'";
$result1 			=mysql_query($query1,$id);

while ($row1 		=mysql_fetch_array($result1)) 
{
$ValorInicial 		=$row1["Valor"];
$ValorRetencion 	=$row1["ValorRetencion"];
$ValorAbonado 		=$row1["ValorAbonado"];
$Idproveedor 		=$row1["Idproveedor"];
$SaldoActual		=($ValorRetencion-$ValorAbonado);
$Retencion 			=$row1["Retencion"];			
}


if ($Abono>$SaldoActual) { 

?>

<script type="text/javascript">
alert('El valor del abono supera la deuda total.');
window.location.href = 'pagar-2.php?Id=<?=$Id?>&Ct=<?=$CuentaContable?>&Ob=<?=$Observaciones?>&FA=<?=$FechaAbono?>&Idcliente=&Idmenu=7&Idsubmenu=14&Idopcmenu=36';
</script>
<?
}
else {

	$queryR3 			="SELECT * FROM HistorialPagos WHERE Idcuenta='$Id'";
	$resultR3 			=mysql_query($queryR3,$id);
			while ($rowR3=mysql_fetch_array($resultR3)) 
			{
				$Cuoti=$rowR3["Cuota"];
			}

			if (empty($ValorAbonado)) {
				$query2 		="UPDATE CuentasPagar SET ValorAbonado='$Abono' WHERE Id='$Id'";
				$result2 		=mysql_query($query2,$id);
			}
			else{
				$TotalAbono=($Abono+$ValorAbonado);
				$query3			="UPDATE CuentasPagar SET ValorAbonado='$TotalAbono' WHERE Id='$Id'";
				$result3 		=mysql_query($query3,$id);
			}

			if (empty($ValorAbonado)) {
				$Cuota=1;
			}
			else{
				$Cuota=$Cuoti+1;
			}

$queryka			="UPDATE CuentasPagar set Estado = '4' Where Id='$Id'";
$resultka			=mysql_query($queryka, $id);
	
$queryQK 			="INSERT INTO HistorialPagos (Idcuenta,Abono,FechaAbono,CuentaContable,Observaciones,Cuota)
VALUES ('$Id','$Abono','$FechaAbono','$CuentaContable','$Observaciones','$Cuota')";
$resultQK 			=mysql_query($queryQK,$id);

$query20	 			="SELECT * FROM CuentasPagar WHERE Id='$Id'";
$result20 			=mysql_query($query20,$id);

			while ($row20=mysql_fetch_array($result20)) 
			{
				$ValorInicial20 	=$row20["Valor"];
				$ValorRetencion20   =$row20["ValorRetencion"];
				$ValorAbonado20 	=$row20["ValorAbonado"];

				$SaldoActual20	=($ValorInicial20-$ValorAbonado20);

				if($ValorAbonado20==$ValorRetencion20){
					$queryPE			="UPDATE CuentasPagar set Estado = '1' Where Id='$Id'";
					$resultPE			=mysql_query($queryPE, $id);
				}
				else{
					$oe=1;
				}
			}
?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION["anterior"]?>';
</script>

<?
$_SESSION["CuentaContable"]="";
$_SESSION["Observaciones"]="";
$_SESSION["Abono"]="";
}
?>