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
        
        
<script LANGUAGE="JavaScript">

function validar(formulario) 
{
  if (formulario.username.value == "") 
  {
    alert("Por favor ingrese una Cédula");
    formulario.username.focus();
    return (false);
  }
  
  if (formulario.password.value == "") 
  {
    alert("Por favor ingrese su Contraseña");
    formulario.password.focus();
    return (false);
  }
  
  
  return (true); 
}

</script> 


<SCRIPT language=Javascript>
<!--
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	return true;
	}
	//-->
</SCRIPT>


	</head>
	<body class="body-dark">
		<!-- START LOGIN BOX -->
		<div class="box-type-login">
			<div class="box text-center">
				<div class="box-head">

                <img src="../../assets/img/logo.png"> </div>
				<div class="box-body box-centered style-inverse">
					<h2 class="text-light">Ingresar al sistema</h2>
					<br/>
					<form action="logueo.php" accept-charset="utf-8" method="post" onSubmit = "return validar(this);">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input name="username" type="text" class="form-control" placeholder="Cédula" onKeyPress="return isNumberKey(event);" value="<?=$_COOKIE["username"]?>">
							</div>
                            
                            
						</div>
                        
                        
                        
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?=$_COOKIE["password"]?>">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 text-left">
								<div data-toggle="buttons">
                                    <? 
									if(!empty($_COOKIE["username"]))
									{
									$recuerda	=	' btn-checkbox-info active';	
									}
									else
									{
									$recuerda	=	'btn-checkbox-primary-inverse';	
									}
									
									?>
                                
									<label class="btn checkbox-inline <?=$recuerda?>">
										<input name="recuerda" type="checkbox" id="recuerda" value="1" > Recordarme
									</label>
								</div>
							</div>
							<div class="col-xs-6 text-right">
								<button class="btn btn-primary" type="submit"><i class="fa fa-key"></i> Ingresar</button>
							</div>
						</div>
					</form>
				</div><!--end .box-body -->
				<div class="box-footer force-padding text-white">
					<a class="text-primary-alt" href="../../html/pages/locked.php">Olvido su contraseña?</a>
				</div>
			</div>
		</div>
		<!-- END LOGIN BOX -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="../../assets/js/libs/jquery/jquery-1.11.0.min.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../../assets/js/core/BootstrapFixed.js"></script>
		<script src="../../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
