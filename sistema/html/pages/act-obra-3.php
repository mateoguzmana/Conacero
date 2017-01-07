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

$Id					=$_REQUEST["Id"];


$SQL2="Delete From Obrasprov Where Idobra='$Id'";
mysql_query($SQL2);	


$datos				=$_REQUEST["hidY"];
$datos	 			=explode(',', $datos);

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



$queryka		=	"UPDATE Obras set Idcliente = '$Idcliente', Nombre = '$Nombre', Fechainicio = '$Fechainicio', Fechafin = '$Fechafin', Ubicacion = '$Ubicacion', Valor = '$Valor', Utilidad = '$Utilidad', Descripcion = '$Descripcion' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);
				



if(!empty($datos))
{
	$cont	=	0;
	foreach($datos as $k => $v )
	{

	$sql="INSERT INTO Obrasprov (Idobra, Proveedor)";
	$sql.= "VALUES ('$Id', '$v')";
	mysql_query($sql);

	$cont ++;

	}
}

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
