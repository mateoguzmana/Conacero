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

$Nombre				=$_REQUEST["Nombre"];
$Id					=$_REQUEST["Id"];
$email				=$_REQUEST["email"];
$usuario			=$_REQUEST["usuario"];
$tipo				=$_REQUEST["tipo"];
$Contrasena			=$_REQUEST["Contrasena"];
$User				=$_REQUEST["User"];

$query="SELECT COUNT(*) as Total FROM Usuarios where Cedula = '$usuario'" ;
$result=mysql_query($query, $id);

while($row=mysql_fetch_array($result))
{
	if(($User == $usuario))
	{
	$Total=0;	
	}
	else
	{
	$Total=$row["Total"];	
	}
}

if($Total == 0)
{
$queryka		=	"UPDATE Usuarios set Nombre = '$Nombre', Cedula = '$usuario', Email = '$email', Clave = '$Contrasena', Tipo = '$tipo' Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);

				


$queryevep			="SELECT* FROM Informacion";
$resultevep			=mysql_query($queryevep, $id);

while($rowevep		=mysql_fetch_array($resultevep))
{
$Empresa			=$rowevep["Nombre"];
$EmailEmpresa		=$rowevep["Email"];
$DirEmpresa			=$rowevep["Dir"];
$TelefonoEmpresa	=$rowevep["Telefono"];
$CiudadEmpresa		=$rowevep["Ciudad"];
$PaisEmpresa		=$rowevep["Pais"];
$CodigoEmpresa		=$rowevep["Codigo"];
}



$destinatario = $email; 

$asunto = "ACTUALIZACION DE CUENTA"; 
$cuerpo = ' 
<font-family: "Arial">
<FONT FACE="arial" SIZE=2>
<br><br>
<strong>'.$Nombre.'</strong>, su cuenta se ha actualizado con exito, a continuacion le ofrecemos los datos de acceso.
<br><br>
<strong> INFORMACION DE CUENTA</strong><br><br>
<strong> NOMBRE USUARIO: </strong>' .$usuario.' <br>
<strong> NOMBRE: </strong>' .$Nombre.' <br>
<strong> EMAIL: </strong> ' .$email.'  <br>
<strong> CLAVE DE ACCESO: </strong> ' .$Contrasena .' <br><br><br>




Cualquier inquietud sera atendida con gusto.<br><br>
'.$Empresa.'<br>
'.$EmailEmpresa.'<br>
'.$TelefonoEmpresa.'<br>
'.$DirEmpresa.', '.$CiudadEmpresa.'<br>

</font>
<br> 
<br>';

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: ".$Empresa." <".$EmailEmpresa.">\r\n"; 
//$headers .= "Bcc: info@rapibox.net\r\n"; 
$headers .= "Bcc: ".$EmailEmpresa."\r\n"; 
//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:".$EmailEmpresa."\r\n"; 


mail($destinatario,$asunto,$cuerpo,$headers); 
?>
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?				
}
else
{
?>
<script type="text/javascript">
alert('El nombre de usuario ya existe.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	
<?
}
?>

