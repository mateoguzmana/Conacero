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


$Casillero		=$_SESSION['IdR'];

$Id				=$_REQUEST["Id"];
$Idobra			=$_REQUEST["Obra"];
$Fechainicio	=$_REQUEST["Fecha"];
$Valor			=$_REQUEST["Valor"];
$Descripcion	=$_REQUEST["Descripcion"];
$Tipo			=$_REQUEST["Tipo"];

$horaactual 	=date("Y-m-d H:i:s");
$Usuario	 	=$_SESSION['usuario'];
 




$Valor			=str_replace("$","",$Valor);
$Valor			=str_replace(" ","",$Valor);
$Valor			=str_replace(",","",$Valor);
$Valor			=str_replace("_","",$Valor);
$Valor			=str_replace("___","",$Valor);
$Valor			=str_replace("__","",$Valor);


$queryka		="UPDATE Obrasgastos set Idobra = '$Idobra', Fecha = '$Fechainicio', Descripcion = '$Descripcion', Valor = '$Valor', Usuario = '$Usuario', Fechacrea = '$horaactual', Tipo = '$Tipo' Where Id='$Id'";
$resultka		=mysql_query($queryka, $id);



?>


	
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
