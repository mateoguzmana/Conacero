<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$datos				=$_REQUEST["hidY"];
$datos	 			=explode(',', $datos);

$horaactual 		=date("Y-m-d H:i:s");
$Usuario	 		=$_SESSION['usuario'];

$Idproveedor		=$_REQUEST["Idproveedor"];
$Obra 				=$_REQUEST["Idobra"];
$Fechafact			=$_REQUEST["FechaPago"];
$Descripcion		=$_REQUEST["Descripcion"];
$Contrato 			=$_REQUEST["Contrato"];
$Retencion 			=$_REQUEST["Retencion"];

 





$sql="INSERT INTO  Actasobra (Idproveedor,Idobra ,Fechafact, Contrato, Descripcion,Retencion, Fecha, Usuario)";
$sql.= "VALUES ('$Idproveedor','$Obra','$Fechafact','$Contrato','$Descripcion','$Retencion','$horaactual','$Usuario')";
mysql_query($sql);


$query		="SELECT* FROM Actasobra Order by Id ASC" ;
$result		=mysql_query($query, $id);
		
while($row	=mysql_fetch_array($result))
{
$Id			=$row["Id"];
}

$query		="SELECT * FROM Impuestos" ;
$result		=mysql_query($query, $id);
		
while($row	=mysql_fetch_array($result))
{
$Iva		=$row["Iva"];
}		
		
for ( $i = 1 ; $i <= 30 ; $i ++) 
{	
$cant						= $_POST["cant".$i];
$Idobra						= $_POST["Idobra"];
$descri						= $_POST["descri".$i];	
$unidad 					= $_POST["unidad".$i];
$vlr						= $_POST["vlr".$i];	

	if(!empty($cant) || !empty($plano) || !empty($descri) || !empty($vlr))	
	{
	$vlr					= str_replace(".","",$vlr);
	$cant					= str_replace(".","",$cant);
	$total					= $vlr*$cant;
	
	
		$sql="INSERT INTO  Movacta (Idacta, Idproveedor, Idobra, Cant, Descripcion, Unidad, Neto, Valor)";
		$sql.= "VALUES ('$Id','$Idproveedor', '$Idobra', '$cant', '$descri', '$unidad' ,'$vlr', '$total')";
		mysql_query($sql);	
		
	}
	
$cant						= '';
$plano						= '';
$descri						= '';
$vlr						= '';
$total						= '';

} 

$query		="SELECT SUM(Valor) AS TOTAL FROM Movacta where Idacta = '$Id'" ;
$result		=mysql_query($query, $id);
		
while($row	=mysql_fetch_array($result))
{
$TOTAL		=$row["TOTAL"];
}

$Rete 		=($TOTAL*$Retencion);
$Total 		=($TOTAL-$Rete);
$Valor 		=($TOTAL);


$queryka		=	"UPDATE Actasobra set Valor='$Valor',Total = '$Total',ValorRte='$Rete' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);

$Url			=	$_SESSION['anterior'];
$Url			=	str_replace("Idcliente","c",$Url);
?>


	
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$Url?>';
</script>	
