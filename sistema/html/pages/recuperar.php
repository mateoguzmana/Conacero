<?
include("../../includes/conexion.php");

$email		=	$_POST['email'];

$Fechahoy	= 	date("Y-m-d");

if(empty($email))
{

?>
<script type="text/javascript">

	alert('Debe ingresar un E-mail');
	window.location.href=('locked.php');
</script>
<?
}
else
{
$query="SELECT COUNT(*) as Total FROM Usuarios where Email = '$email'" ;
$result=mysql_query($query, $id);

While($row=mysql_fetch_array($result))
{
$Total=$row["Total"];
}
		if ($Total == 0)
		{
?>
		<script type="text/javascript">
        
            alert('El E-mail ingresado no existe en nuestra base de datos');
            window.location.href=('locked.php');
        </script>
<?
		}
		else
		{
		
					$query000="SELECT* FROM Usuarios where Email = '$email'" ;
					$result000=mysql_query($query000, $id);
					
					While($row000=mysql_fetch_array($result000))
					{
					$Nombre				=$row000["Nombre"];
					$Email				=$row000["Email"];
					$Clave				=$row000["Clave"];
					}
					
		



						$destinatario = $Email; 
						
						$asunto = "RECUPERACION DATOS DE ACCESO - CONACEROS "; 
						$cuerpo = ' 
						<font-family: "Arial">
						<FONT FACE="arial" SIZE=2>
						<br><br>
						<strong> INFORMACION DE ACCESO</strong><br><br>
						<strong> CONTRASE'.utf8_decode("Ñ").'A: </strong>' .$Clave.' <br><br><br>
						
						<strong> CUALQUIER INQUIETUD CON TODO EL GUSTO LA ATENDEREMOS</strong><br><br>
						</font>
						<br> 
						<br>';
						
						$headers = "MIME-Version: 1.0\r\n"; 
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
						
						//dirección del remitente 
						$headers .= "From: ".$NombreI." <".$EmailI.">\r\n"; 
						$headers .= "Bcc: info@conaceros.COM\r\n"; 
						//dirección de respuesta, si queremos que sea distinta que la del remitente 
						$headers .= "Reply-To:".$EmailI."\r\n"; 
						
						
						mail($destinatario,$asunto,$cuerpo,$headers); 


?>
					<script type="text/javascript">
                        alert('Hemos enviados sus datos de Acceso a su E-mail');
                        window.location.href=('login.php');
                    </script>
<? 


	
		
 
		}
}
?>

