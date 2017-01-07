<?
include("../../includes/conexion.php");

$login		=	$_POST['username'];
$password 	=	$_POST['password'];
$recuerda 	=	$_POST['recuerda'];

$Fechahoy	= 	date("Y-m-d");

if(empty($login) || empty($password))
{

?>
<script type="text/javascript">

	alert('Debe un nombre de usuario y contrase\u00f1a');
	window.location.href=('login.php');
</script>
<?
}
else
{
$query="SELECT COUNT(*) as Total FROM Usuarios where Cedula = '$login' and Clave = '$password'" ;
$result=mysql_query($query, $id);

While($row=mysql_fetch_array($result))
{
$Total=$row["Total"];
}
		if ($Total == 0)
		{
?>
		<script type="text/javascript">
        
            alert('Su nombre de usuario o contrase\u00f1a es incorrecta');
            window.location.href=('login.php');
        </script>
<?
		}
		else
		{
		
					$query000="SELECT* FROM Usuarios where Cedula = '$login' and Clave = '$password'" ;
					$result000=mysql_query($query000, $id);
					
					While($row000=mysql_fetch_array($result000))
					{
					$Id					=$row000["Id"];
					$Cedula				=$row000["Cedula"];
					$Clave				=$row000["Clave"];
					$Email				=$row000["Email"];
					$Nombre				=$row000["Nombre"];
					$Tipo				=$row000["Tipo"];
					}

				

								session_start(); 
	
								
								if($recuerda == 1)
								{
								setcookie("username",$Cedula, time()+365);
								setcookie("password",$Clave, time()+365);
								}
								else
								{
								setcookie("username",$Cedula, time()+0);
								setcookie("password",$Clave, time()+0);	
								}
								
								session_register('tipo');
								$_SESSION['tipo']=$Tipo;
								
								session_register('NombreR');
								$_SESSION['NombreR']=$Nombre;
		
								session_register('sesionx');
								$_SESSION['sesionx']='si';
								
								session_register('usuario');
								$_SESSION['usuario']=$Cedula;
								
								session_register('email');
								$_SESSION['email']=$Email;
								
								session_register('IdR');
								$_SESSION['IdR']=$Id;
								
								$horaactual 	= 	date("Y-m-d H:i:s");
								
								$sqlx="INSERT INTO  Login (Usuario, Fecha)";
								$sqlx.= "VALUES ('$Id', '$horaactual')";
								mysql_query($sqlx);

								
								header("location: zona.php"); 


	
		
 
		}
}
?>

