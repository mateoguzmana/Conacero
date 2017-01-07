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


				
					$queryTITMEN			="SELECT* FROM Menusub WHERE Id = ".$_REQUEST["Idsubmenu"] ;
					$resultTITMEN			=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN		=mysql_fetch_array($resultTITMEN))
					{
					$NombreTITMEN			=$rowTITMEN["Nombre"];
					}
					
					

					
					$LineaMenuS				=$NombreTITMEN;
					
					
					
					
					$IdUS					=$_REQUEST['Id']; 
					
					 $queryUSERS			="SELECT* FROM Clientes where Id = '$IdUS'";
					 $resultUSERS			=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS		=mysql_fetch_array($resultUSERS))
					 {
						$Nombre				=$rowUSERS["Nombre"];
						$Cedula				=$rowUSERS["Cedula"];
						$Ciudad				=$rowUSERS["Ciudad"];
						$Direccion			=$rowUSERS["Dir"];
						$Telefono			=$rowUSERS["Telefono"];
						$Celular			=$rowUSERS["Celular"];
						$Contacto			=$rowUSERS["Contacto"];
						$Celcontacto		=$rowUSERS["Celcontacto"];
						$Email				=$rowUSERS["Email"];
						$Retencion			=$rowUSERS["Retencion"];
						$Contrasena			=$rowUSERS["Contrasena"];
						$TipoCuenta			=$rowUSERS["TipoCuenta"];
						$NumeroCuenta		=$rowUSERS["NumeroCuenta"];
						$Titular			=$rowUSERS["Titular"];
						$Identificacion		=$rowUSERS["Identificacion"];
						$FormaPago			=$rowUSERS["FormaPago"];
						$Banco 				=$rowUSERS["Banco"];
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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Informacion del Cliente</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												
												<form class="form-horizontal form-validate" role="form" method="post" action="act-cliente-3.php" novalidate>
                                                
                                                
													<div class="row">
                                                    
                                                    
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Nombre" class="control-label">Razón Social</label>
															      <input name="Id" type="hidden" id="Id" value="<?=$IdUS?>">
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Razón Social/Nombre" value="<?=$Nombre?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
																</div>
															</div>
														</div>
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Apellidos" class="control-label">Nit/Cédula</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Cedula" id="Cedula" class="form-control" placeholder="Nit/Cédula" value="<?=$Cedula?>" required data-rule-minlength="4">
																</div>
															</div>
														</div>
													
                                                
                                                    
                                                    

														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Ciudad" class="control-label">Ciudad</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Ciudad" id="Ciudad" class="form-control" placeholder="Ciudad" value="<?=$Ciudad?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Direccion" class="control-label">Dirección</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Dirección" value="<?=$Direccion?>" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Telefono" class="control-label">Teléfono</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Telefono" id="Telefono" class="form-control" placeholder="Teléfono" value="<?=$Telefono?>" onKeyPress="return isNumberKey(event);" required>
																</div>
															</div>
														</div>
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Celular" class="control-label">Celular</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Celular" id="Celular" class="form-control" placeholder="Celular"  value="<?=$Celular?>" onKeyPress="return isNumberKey(event);" required>
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contacto" class="control-label">Contacto</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Contacto" id="Contacto" class="form-control" placeholder="Nombre de Contacto" value="<?=$Contacto?>" onChange="javascript:this.value=this.value.toUpperCase();" >
																</div>
															</div>
														</div>
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Celcontacto" class="control-label">Celular</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Celcontacto" id="Celcontacto" class="form-control" placeholder="Celular del Contacto" value="<?=$Celcontacto?>" onKeyPress="return isNumberKey(event);" >
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contacto" class="control-label">Email</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="email" name="Email" id="Email" class="form-control" placeholder="Email" value="<?=$Email?>" >
																</div>
															</div>
														</div>
                                                        <!--
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Retencion" class="control-label">% Retención</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Retencion" id="Retencion" class="form-control" placeholder="% de Retención" value="<?=$Retencion?>" onKeyPress="return isNumberKey(event);" >
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        

														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="TipoCuenta" class="control-label">Tipo Cuenta</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																<select name="TipoCuenta" id="TipoCuenta" class="form-control select2-list" data-placeholder="Seleccione el tipo de cuenta" >
            
                                                                        <option value="<?=$TipoCuenta?>" selected><?=$TipoCuenta?></option>

																		<? /*
                                                                        $queryXD		="SELECT* FROM TipoCuenta order by Nombre";
                                                                        $resultXD		=mysql_query($queryXD, $id);
                                                                        
                                                                        While($rowXD	=mysql_fetch_array($resultXD))
                                                                        {
                                                                        $IdXD			=$rowXD["Id"];
																		$NombreXD		=$rowXD["Nombre"];
                                                                        ?>
                                                                        <option value="<?=$NombreXD?>"><?=$NombreXD?></option>
																		<?
																		}
																		?>
                                                                </select>
                                                            </div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="NumeroCuenta" class="control-label">Numero Cuenta</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="NumeroCuenta" id="NumeroCuenta" class="form-control" value="<?=$NumeroCuenta?>" placeholder="Numero de cuenta" >
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Titular" class="control-label">Titular</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Titular" id="Titular" class="form-control" value="<?=$Titular?>" placeholder="Titular de la cuenta" >
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Identificacion" class="control-label">Cedula</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Identificacion" id="Identificacion" value="<?=$Identificacion?>" class="form-control" placeholder="Cedula" >
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="FormaPago" class="control-label">Forma Pago</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																<select name="FormaPago" id="FormaPago" class="form-control select2-list" data-placeholder="Seleccione la forma de Pago" >
            
                                                                        <option value="<?=$FormaPago?>" selected><?=$FormaPago?></option>

																		<?
                                                                        $queryTIP		="SELECT* FROM Formas where Muestra = 0 order by Pos";
                                                                        $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                                                        While($rowTIP	=mysql_fetch_array($resultTIP))
                                                                        {
                                                                        $IdTIP			=$rowTIP["Id"];
																		$NombreTIP		=$rowTIP["Nombre"];
                                                                        ?>
                                                                        <option value="<?=$NombreTIP?>"><?=$NombreTIP?></option>
																		<?
																		}
																		?>
                                                                </select>
                                                            </div>
															</div>
														</div>
                                                        <div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Identificacion" class="control-label">Banco</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																<select name="Banco" id="Banco" class="form-control select2-list" data-placeholder="Seleccione el Banco" >
            
                                                                        <option value="<?=$Banco?>" selected><?=$Banco?></option>
                                                                        <?
                                                                        $queryRTX		="SELECT * FROM Bancos order by Nombre ASC";
                                                                        $resultRTX		=mysql_query($queryRTX, $id);
                                                                        
                                                                        While($rowRTX	=mysql_fetch_array($resultRTX))
                                                                        {
                                                                        $IdRTX			=$rowRTX["Id"];
																		$NombreRTX		=$rowRTX["Nombre"];
                                                                        ?>
                                                                        <option value="<?=$NombreRTX?>"><?=$NombreRTX?></option>
																		<?
																		} */
																		?>
                                                                </select>
                                                            </div>
															</div>
														</div>
													-->
													</div>
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contrasena" class="control-label">Contraseña</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="password" name="Contrasena" id="Contrasena" class="form-control" placeholder="Contraseña" value="<?=$Contrasena?>"  data-rule-minlength="6">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contraseña1" class="control-label">Contraseña</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="password" name="Contrasena1" id="Contrasena1" class="form-control" placeholder="Repita la Contraseña" value="<?=$Contrasena?>"   data-rule-equalto="#Contrasena" data-rule-minlength="6">
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
