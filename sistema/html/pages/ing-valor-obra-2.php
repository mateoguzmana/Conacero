<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$Casillero			=$_SESSION['IdR'];

$Idobra				=$_REQUEST["Obra"];
$Fechainicio		=$_REQUEST["Fechainicio"];
$Valor				=$_REQUEST["Valor"];
$Descripcion		=$_REQUEST["Descripcion"];
$Tipo				=$_REQUEST["Tipo"];

$horaactual 		= date("Y-m-d H:i:s");
$Usuario	 		= $_SESSION['usuario'];
 




$Valor				=str_replace("$","",$Valor);
$Valor				=str_replace(" ","",$Valor);
$Valor				=str_replace(",","",$Valor);
$Valor				=str_replace("_","",$Valor);
$Valor				=str_replace("___","",$Valor);
$Valor				=str_replace("__","",$Valor);




$sql="INSERT INTO  Obrasgastos (Idobra, Fecha, Descripcion, Valor, Usuario, Fechacrea, Tipo)";
$sql.= "VALUES ('$Idobra','$Fechainicio','$Descripcion','$Valor', '$Usuario','$horaactual','$Tipo')";
mysql_query($sql);

?>


	
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
