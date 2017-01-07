<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: ../../html/pages/login.php");
}

include("../../html/pages/conexion.php");


$Casillero		=	$_SESSION['IdR'];

$Nombre				=$_REQUEST["Nombre"];
$Apellido			=$_REQUEST["Apellidos"];
$Pais				=$_REQUEST["Pais"];
$Ciudad				=$_REQUEST["Ciudad"];
$Direccion			=$_REQUEST["Direccion"];
$Telefono			=$_REQUEST["Telefono"];
$Celular			=$_REQUEST["Celular"];
$Email				=$_REQUEST["email"];
$Contrasena			=$_REQUEST["Contrasena"];



$queryka		=	"UPDATE Casilleros set Nombre = '$Nombre', Apellido = '$Apellido', Pais = '$Pais', Ciudad = '$Ciudad', Direccion = '$Direccion', Telefono = '$Telefono', Celular = '$Celular', Clave = '$Contrasena' Where Id='$Casillero'";
$resultka		=	mysql_query($queryka, $id);
				


$queryevep			="SELECT* FROM Informacion where Identificacion = '$Casillero'";
$resultevep			=mysql_query($queryevep, $id);

while($rowevep		=mysql_fetch_array($resultevep))
{
$Empresa			=$rowevep["Nombre"];
$EmailEmpresa		=$rowevep["Email"];
$DirEmpresa			=$rowevep["Dir"];
$TelefonoEmpresa	=$rowevep["Telefono"];
$CiudadEmpresa		=$rowevep["Ciudad"];
$PaisEmpresa		=$rowevep["Pais"];
}



$destinatario = $Email; 

$asunto = "ACTUALIZACION DE CASILLERO"; 
$cuerpo = ' 
<font-family: "Arial">
<FONT FACE="arial" SIZE=2>
<br><br>
<strong>'.$Nombre.'</strong>, su casillero se ha actualizado con exito, a continuacion le ofrecemos los datos de acceso.
<br><br>
<strong> INFORMACION DE CASILLERO</strong><br><br>
<strong> NOMBRE: </strong>' .$Nombre.' <br>
<strong> APELLIDOS: </strong>' .$Apellido.' <br>
<strong> EMAIL: </strong> ' .$Email.'  <br><br>
<strong> CASILLERO: </strong> ' .$Casillero .' <br>
<strong> CLAVE DE ACCESO: </strong> ' .$Contrasena .' <br><br><br>

<strong> Al momento de hacer sus compras o despachar alguna orden recuerde colocar su número de casillero ASI:</strong><br>

(Su Nombre Completo)<br>
7569 NW 70th ST (Casillero #)<br>
Miami, Fl. 33166.<br><br><br>


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
$headers .= "Bcc: info@rapibox.net\r\n"; 
$headers .= "Bcc: ".$EmailEmpresa."\r\n"; 
//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:".$EmailEmpresa."\r\n"; 


mail($destinatario,$asunto,$cuerpo,$headers); 
				
				

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = 'profile.php';
</script>	
