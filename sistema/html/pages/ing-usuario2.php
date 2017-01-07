<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");

	
$Casillero			=$_SESSION['IdR'];

$Nombre				=$_REQUEST["Nombre"];
$Cedula				=$_REQUEST["Cedula"];
$Email				=$_REQUEST["email"];
$Tipo				=$_REQUEST["tipo"];
$Contrasena			=$_REQUEST["Contrasena"];

$queryevep			="SELECT COUNT(*) AS TOTAL FROM Usuarios where Cedula = '$Cedula' and Muestra = 0";
$resultevep			=mysql_query($queryevep, $id);

while($rowevep		=mysql_fetch_array($resultevep))
{
$TOTAL				=$rowevep["TOTAL"];
}

if($TOTAL > 0)
{
?>
<script type="text/javascript">
alert('El usuario ingresado ya existe en el sistema.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?	
}
else
{
$sql="INSERT INTO  Usuarios (Nombre, Cedula, Email, Clave, Tipo)";
$sql.= "VALUES ('$Nombre','$Cedula','$Email','$Contrasena','$Tipo')";
mysql_query($sql);


$destinatario = $Email; 

$asunto = "CUENTA DE ACCESO - CONCEROS"; 
$cuerpo = ' 
<font-family: "Arial">
<FONT FACE="arial" SIZE=2>
<br><br>
<strong>'.$Nombre.'</strong>, su cuenta se ha creado con exito, a continuacion le ofrecemos los datos de acceso.
<br><br>
<strong> NOMBRE: </strong>' .$Nombre.' <br>
<strong> CEDULA: </strong> ' .$Cedula.'  <br><br>
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
<?
}
?>