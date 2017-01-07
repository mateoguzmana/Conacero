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
$Nombre				=$_REQUEST["Nombre"];
$Cedula				=$_REQUEST["Cedula"];
$Email				=$_REQUEST["email"];
$Tipo				=$_REQUEST["tipo"];
$Contrasena			=$_REQUEST["Contrasena"];



$queryka		=	"UPDATE Usuarios set Nombre = '$Nombre', Cedula = '$Cedula', Email = '$Email', Clave = '$Contrasena', Tipo = '$Tipo' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);
				


$destinatario = $Email; 

$asunto = "ACTUALIZACION CUENTA DE ACCESO - CONCEROS"; 
$cuerpo = ' 
<font-family: "Arial">
<FONT FACE="arial" SIZE=2>
<br><br>
<strong>'.$Nombre.'</strong>, su cuenta se ha actualizado con exito, a continuacion le ofrecemos los datos de acceso.
<br><br>
<strong> NOMBRE: </strong>' .$Nombre.' <br>
<strong> CEDULA: </strong> ' .$Cedula.'  <br>
<strong> EMAIL: </strong> ' .$Email .' <br>
<strong> CLAVE DE ACCESO: </strong> ' .$Contrasena .' <br><br><br>


Cualquier inquietud sera atendida con gusto.<br><br>

CONCEROS<br>
info@conaceros.com

</font>
<br> 
<br>';

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: CONACEROS <info@conaceros.com>\r\n"; 
$headers .= "Bcc: info@conaceros.com\r\n"; 
//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:info@conaceros.com\r\n"; 


mail($destinatario,$asunto,$cuerpo,$headers); 
				
				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
