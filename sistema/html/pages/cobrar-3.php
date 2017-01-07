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
$Idobra 			=$_REQUEST["Obra"];
$CuentaContable 	=$_REQUEST["CuentaContable"];
$Observaciones 		=$_REQUEST["Observaciones"];
$Abono 				=$_REQUEST["Abono"];
$FechaAbono 		=$_REQUEST["FechaAbono"];
$Retencion 			=$_REQUEST["Retencion"];
$ValorReal 			=$_REQUEST["ValorReal"];
$horaactual 		=date("Y-m-d H:i:s");
$Usuario	 		=$_SESSION['usuario'];



$Abono				=	 str_replace("$","",$Abono);
$Abono				=	 str_replace(" ","",$Abono);
$Abono				=	 str_replace(",","",$Abono);
$Abono				=	 str_replace("_","",$Abono);
$Abono				=	 str_replace("___","",$Abono);
$Abono				=	 str_replace("__","",$Abono);

/* $ValorReal		=	 str_replace("$","",$ValorReal);
$ValorReal			=	 str_replace(" ","",$ValorReal);
$ValorReal			=	 str_replace(",","",$ValorReal);
$ValorReal			=	 str_replace("_","",$ValorReal);
$ValorReal			=	 str_replace("___","",$ValorReal);
$ValorReal			=	 str_replace("__","",$ValorReal); */

//$Descuento 			=(($Abono*$Retencion)/100);
//$Abono 				=($Abono-$Descuento);

$query1	 			="SELECT * FROM Facturacion WHERE Id='$Id'";
$result1 			=mysql_query($query1,$id);

			while ($row1=mysql_fetch_array($result1)) 
			{
				$ValorInicial 	=$row1["Valor"];
				$ValorAbonado 	=$row1["ValorCobrado"];
				$Vil 			=$row1["Total"];
				//$Real 			=$row1["ValorReal"];
				$Iva 			=$row1["Iva"];
				$Total 			=($ValorInicial+$Iva);
				$SaldoActual	=($Total-$ValorAbonado);
			}

if ($Abono>$Vil) { 

?>

<script type="text/javascript">
alert('El valor del cobro supera la deuda total.');
window.location.href = 'cobrar-2.php?Id=<?=$Id?>&Ct=<?=$CuentaContable?>&Ob=<?=$Observaciones?>&Fc=<?=$FechaAbono?>&Idmenu=7&Idsubmenu=15&Idopcmenu=37';
</script>
<?
}
else {

	$queryR3 			="SELECT * FROM HistorialCobros WHERE Idcuenta='$Id'";
	$resultR3 			=mysql_query($queryR3,$id);
			while ($rowR3=mysql_fetch_array($resultR3)) 
			{
				$Cuoti=$rowR3["Cuota"];
			}

			if (empty($ValorAbonado)) {
				$query2 		="UPDATE Facturacion SET ValorCobrado='$Abono' WHERE Id='$Id'";
				$result2 		=mysql_query($query2,$id);

				$query22 		="UPDATE Facturacionmov SET ValorCobrado='$Abono' WHERE Idfact='$Id' and Idobra='$Idobra'";
				$result22 		=mysql_query($query22,$id);
			}
			else{
				$TotalAbono=($Abono+$ValorAbonado);
				
				$query3			="UPDATE Facturacion SET ValorCobrado='$TotalAbono' WHERE Id='$Id'";
				$result3 		=mysql_query($query3,$id);

				$query33 		="UPDATE Facturacionmov SET ValorCobrado='$TotalAbono' WHERE Idfact='$Id' and Idobra='$Idobra'";
				$result33 		=mysql_query($query33,$id);
			}

			if (empty($ValorAbonado)) {
				$Cuota=1;
			}
			else{
				$Cuota=$Cuoti+1;
			}

$queryka			="UPDATE Facturacion set Estado = '4' Where Id='$Id'";
$resultka			=mysql_query($queryka, $id);
	
$queryQK 			="INSERT INTO HistorialCobros (Idcuenta,Abono,FechaAbono,CuentaContable,Observaciones,Cuota)
VALUES ('$Id','$Abono','$FechaAbono','$CuentaContable','$Observaciones','$Cuota')";
$resultQK 			=mysql_query($queryQK,$id);

$query20	 			="SELECT * FROM Facturacion WHERE Id='$Id'";
$result20 			=mysql_query($query20,$id);

			while ($row20=mysql_fetch_array($result20)) 
			{
				$ValorInicial20 	=$row20["Total"];
				$ValorAbonado20 	=$row20["ValorCobrado"];

				$SaldoActual20	=($ValorInicial20-$ValorAbonado20);

				if($ValorAbonado20==$ValorInicial20){
					$queryPE			="UPDATE Facturacion set Estado = '1' Where Id='$Id'";
					$resultPE			=mysql_query($queryPE, $id);
				?>
				<script type="text/javascript">
				alert('La operacion se realizo con exito.');
				window.location.href = 'cobrar.php?Idmenu=7&Idsubmenu=15&Idopcmenu=37';
				</script>
				<?
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