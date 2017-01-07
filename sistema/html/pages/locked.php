<!DOCTYPE html>
<html lang="en">
	<head>
		<?
        include("../../includes/title.php");
		?>


		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/bootstrap.css?1403937764" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/boostbox.css?1403937765" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/boostbox_responsive.css?1403937765" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/font-awesome.min.css?1401481653" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1401481649"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1401481651"></script>
		<![endif]-->
	</head>
	<body class="body-dark">
		<!-- START LOCKED BOX -->
		<div class="box-type-locked">
			<div class="box text-center">
				<div class="box-head">
					<img src="../../assets/img/logo.png" width="250" height="83">
					
				</div>
				<div class="box-body box-centered style-inverse" style="height:100px;">


<script LANGUAGE="JavaScript">


function valida(formulario) 
{
		  	
		  if (formulario.email.value == "") 
		  {
			alert("Por favor ingrese un Email");
			formulario.email.focus();
			return (false);
		  }

		  
		  if (formulario.email.value.indexOf('@', 0) == -1 || formulario.email.value.indexOf('.', 0) == -1)
		  {
			alert("Por favor ingrese un Email valido");
			formulario.email.focus();
			return (false);
		  } 
		  


  return (true); 
}
</script>

					<form action="../../html/pages/recuperar.php" accept-charset="utf-8" method="post"  onSubmit="return valida(this);">
						<div class="input-group">
							<input type="text" id="email" name="email" class="form-control" placeholder="Ingrese su E-mail">
							<span class="input-group-btn">
								<button class="btn btn-equal btn-primary" type="submit"><i class="fa fa-unlock"></i></button>
							</span>
						</div>
					</form>
					<br/>
					<a class="text-primary-alt" href="../../html/pages/login.php">Desea Regresar?</a>
				</div><!--end .box-body -->
			</div>
		</div>
		<!-- END LOCKED BOX -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="../../assets/js/libs/jquery/jquery-1.11.0.min.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../../assets/js/core/BootstrapFixed.js"></script>
		<script src="../../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
