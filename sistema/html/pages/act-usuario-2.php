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

$_SESSION['anterior']	=	$_SERVER['REQUEST_URI']; 

$IdUS						=	$_REQUEST['Id']; 


				
					$queryTITMEN		="SELECT* FROM Menusub WHERE Id = ".$_REQUEST["Idsubmenu"] ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTITMEN		=$rowTITMEN["Nombre"];
					}
					
					
					$queryTITMENO		="SELECT* FROM Menuopc WHERE Id = ".$_REQUEST["Idopcmenu"] ;
					$resultTITMENO		=mysql_query($queryTITMENO, $id);
					
					While($rowTITMENO	=mysql_fetch_array($resultTITMENO))
					{
					$NombreTITMENO		=$rowTITMENO["Nombre"];
					}
					
					$LineaMenuS			=$NombreTITMEN;
					
					
					
					
					
					
					 $queryUSERS		="SELECT* FROM Usuarios where Id = '$IdUS'";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
					 $NombreUSERS		=$rowUSERS["Nombre"];
					 $CedulaUSERS		=$rowUSERS["Cedula"];
					 $EmailUSERS		=$rowUSERS["Email"];
					 $TipoUSERS			=$rowUSERS["Tipo"];
					 $ClaveUSERS		=$rowUSERS["Clave"];
					 }
						
						
					 $queryTIPA		="SELECT* FROM Tipouser where Id = '$TipoUSERS'";
					 $resultTIPA	=mysql_query($queryTIPA, $id);
																			
					 While($rowTIPA	=mysql_fetch_array($resultTIPA))
					 {
					 $NombreTIPA	=$rowTIPA["Nombre"];
					 }		
					
					
					
?>
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
	<body >

		<!-- BEGIN HEADER-->
		<header id="header">

<?
include("../../includes/navbar.php");
?>

		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN SIDEBAR-->
			<div id="sidebar">
			  <div class="sidebar-back"></div>
			  <div class="sidebar-content">
			    <div class="nav-brand"> <a class="main-brand" href="zona.php">
			      <h3 class="text-light text-white"><span>Con<strong>Aceros</strong></span></h3>
			      </a> 
               </div>

<?
include("../../includes/menu.php");
?>


		      </div>
		  </div><!--end #sidebar-->
			<!-- END SIDEBAR -->
            
            
			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> <?=$LineaMenuS?></h3>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Datos de contacto</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												
												<form class="form-horizontal form-validate" role="form" method="post" action="act-usuario-3.php" novalidate>
                                                
                                                <input id="Id" name="Id" type="hidden" value="<?=$IdUS?>">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Nombre" class="control-label">Nombres</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" value="<?=$NombreUSERS?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Apellidos" class="control-label">Cédula</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Cedula" type="text" required class="form-control" id="Cedula" placeholder="Cédula" onKeyPress="return isNumberKey(event);" value="<?=$CedulaUSERS?>" readonly data-rule-minlength="4">
																</div>
															</div>
														</div>
													</div>
                                                
                                                    
                                                    
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="email" class="control-label">Email</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="email" name="email" id="email" class="form-control" value="<?=$EmailUSERS?>" placeholder="Email" required>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Tipo" class="control-label">Tipo de Usuario</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
                                                                
                                                                <select name="tipo" id="tipo" class="form-control select2-list" data-placeholder="Seleccione el Tipo de Usuario" required>
            
                                                                        <option value="<?=$TipoUSERS?>" selected><?=$NombreTIPA?></option>

																		<?
                                                                        $queryTIP		="SELECT* FROM Tipouser Where Id <> '$TipoUSERS' and Id <> 1 and Activo = 0 order by Pos";
                                                                        $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                                                        While($rowTIP	=mysql_fetch_array($resultTIP))
                                                                        {
                                                                        $IdTIP			=$rowTIP["Id"];
																		$NombreTIP		=$rowTIP["Nombre"];
                                                                        ?>
                                                                        <option value="<?=$IdTIP?>"><?=$NombreTIP?></option>
																		<?
																		}
																		?>

            
                                                                </select>

																</div>
															</div>
														</div>
													</div>
                                                    
                                                    

                                                    
                                                    
                                                    
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contrasena" class="control-label">Contraseña</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="password" name="Contrasena" id="Contrasena" class="form-control" value="<?=$ClaveUSERS?>" placeholder="Contraseña" required data-rule-minlength="6">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contraseña1" class="control-label">Contraseña</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="password" name="Contrasena1" id="Contrasena1" class="form-control" value="<?=$ClaveUSERS?>" placeholder="Repita la Contraseña" required  data-rule-equalto="#Contrasena" data-rule-minlength="6">
																</div>
															</div>
														</div>
													</div>


													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="email" class="control-label"></label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
															<button type="submit" class="btn btn-primary">Realizar Operación</button>
														</div>
													</div>

												</form>
											</div><!--end .box-body -->
										</div><!--end .tab-pane -->
										<!-- END PROFILE EDITOR -->

									</div><!--end .tab-content -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="../../assets/js/libs/jquery/jquery-1.11.0.min.js"></script>
		<script src="../../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../../assets/js/core/BootstrapFixed.js"></script>
		<script src="../../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../../assets/js/libs/moment/moment.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.time.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.resize.min.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.orderBars.js"></script>
		<script src="../../assets/js/libs/flot/jquery.flot.pie.js"></script>
		<script src="../../assets/js/libs/jquery-knob/jquery.knob.js"></script>
		<script src="../../assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/core/demo/DemoCharts.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
