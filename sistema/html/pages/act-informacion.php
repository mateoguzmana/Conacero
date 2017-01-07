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
include("resize-class.php");
include("../../includes/conexion.php");


$Casillero		=	$_SESSION['IdR'];
$NombrefullR	=	$_SESSION['NombrefullR'];
$Email			=	$_SESSION['EmailR'];


$Nombre				=$_REQUEST["Nombre"];
$Email				=$_REQUEST["email"];
$Dir				=$_REQUEST["Dir"];
$Telefono			=$_REQUEST["Telefono"];
$Ciudad				=$_REQUEST["Ciudad"];
$Codigo				=$_REQUEST["Codigo"];
$Telefono			=$_REQUEST["Telefono"];
$Pais				=$_REQUEST["Pais"];
$Celular			=$_REQUEST["Celular"];
$Banco				=$_REQUEST["Banco"];
$Tipocuenta			=$_REQUEST["Tipocuenta"];
$Nrocuenta			=$_REQUEST["Nrocuenta"];
$Nombrecuenta		=$_REQUEST["Nombrecuenta"];
$Nit				=$_REQUEST["Nit"];
$Id					=$_REQUEST["Id"];
$Urlseguimiento		=$_REQUEST["Urlseguimiento"];
$PieFactura 		=$_REQUEST["PieFactura"];

$queryka		=	"UPDATE Informacion set Nombre = '$Nombre', Email = '$Email', Dir = '$Dir', Telefono = '$Telefono', Ciudad = '$Ciudad', Codigo = '$Codigo', Telefono = '$Telefono', Pais = '$Pais', Celular = '$Celular', Urlseguimiento = '$Urlseguimiento', PieFactura = '$PieFactura' , Banco = '$Banco', Tipocuenta = '$Tipocuenta', Nrocuenta = '$Nrocuenta', Nombrecuenta = '$Nombrecuenta', Nit = '$Nit'  Where Id='$Id'";
$resultka		=	mysql_query($queryka, $id);	
		
		

$archivo1 = $_FILES['archivo']['tmp_name'];

$archiv			=			$_FILES['archivo']['name'];
$extension 		= 			explode(".",$archiv);
$ext			= 			$extension[1];


if(!empty($archivo1))
{
$foto1= $Id.".".$ext;

(copy($archivo1, "logo/".$foto1));

	// *** 1) Initialise / load image
	$resizeObj = new resize("logo/".$foto1);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(200, 150, 'auto');

	// *** 3) Save image
	$resizeObj -> saveImage("logo/".$foto1, 100);


		$queryka		=	"UPDATE Informacion set Logo = '$foto1' Where Id='$Id'";
		$resultka		=	mysql_query($queryka, $id);	
}

?>

<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>