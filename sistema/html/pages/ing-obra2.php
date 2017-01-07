<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$datos		= $_REQUEST["hidY"];
$datos	 	= explode(',', $datos);







$Casillero		=	$_SESSION['IdR'];

$Idcliente			=$_REQUEST["Cliente"];
$Nombre				=$_REQUEST["Nombre"];
$Fechainicio		=$_REQUEST["Fechainicio"];
$Fechafin			=$_REQUEST["Fechafin"];
$Ubicacion			=$_REQUEST["Ubicacion"];
$Valor				=$_REQUEST["Valor"];
$Utilidad			=$_REQUEST["Utilidad"];
$Descripcion		=$_REQUEST["Descripcion"];

 




$Valor		=	 str_replace("$","",$Valor);
$Valor		=	 str_replace(" ","",$Valor);
$Valor		=	 str_replace(",","",$Valor);
$Valor		=	 str_replace("_","",$Valor);
$Valor		=	 str_replace("___","",$Valor);
$Valor		=	 str_replace("__","",$Valor);


$Utilidad	=	 str_replace("$","",$Utilidad);
$Utilidad	=	 str_replace(" ","",$Utilidad);
$Utilidad	=	 str_replace(",","",$Utilidad);
$Utilidad	=	 str_replace("_","",$Utilidad);
$Utilidad	=	 str_replace("___","",$Utilidad);
$Utilidad	=	 str_replace("__","",$Utilidad);





$sql="INSERT INTO  Obras (Idcliente, Nombre, Fechainicio, Fechafin, Ubicacion, Valor, Utilidad, Descripcion)";
$sql.= "VALUES ('$Idcliente','$Nombre','$Fechainicio','$Fechafin','$Ubicacion','$Valor','$Utilidad','$Descripcion')";
mysql_query($sql);



$queryTIP		="SELECT* FROM Obras";
$resultTIP		=mysql_query($queryTIP, $id);
                                                                        
while($rowTIP	=mysql_fetch_array($resultTIP))
{
$IdTIP			=$rowTIP["Id"];
}


if(!empty($datos))
{
	$cont	=	0;
	foreach($datos as $k => $v )
	{

	$sql="INSERT INTO Obrasprov (Idobra, Proveedor)";
	$sql.= "VALUES ('$IdTIP', '$v')";
	mysql_query($sql);

	$cont ++;

	}
}

?>


	
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
