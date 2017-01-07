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
				
				

					
					
					$query000		="SELECT* FROM Informacion" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$IdA			=$row000["Id"];
					$Nombre			=$row000["Nombre"];
					$Email			=$row000["Email"];
					$Pais			=$row000["Pais"];
					$Ciudad			=$row000["Ciudad"];
					$Dir			=$row000["Dir"];
					$Codigo			=$row000["Codigo"];
					$Telefono		=$row000["Telefono"];
					$Celular		=$row000["Celular"];
					$Logo			=$row000["Logo"];
					$Urlseguimiento	=$row000["Urlseguimiento"];
					$PieFactura		=$row000["PieFactura"];			
					$Banco			=$row000["Banco"];
					$Tipocuenta		=$row000["Tipocuenta"];
					$Nrocuenta		=$row000["Nrocuenta"];
					$Nombrecuenta	=$row000["Nombrecuenta"];
					$Nit			=$row000["Nit"];

					
					}

					
				
					$queryTITMEN		="SELECT* FROM Menusub WHERE Id = ".$_REQUEST["Idsubmenu"] ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTITMEN		=$rowTITMEN["Nombre"];
					}
					
					

					
					$LineaMenuS			=$NombreTITMEN;			
					
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
			      <h3 class="text-light text-white"><span><strong><?=$NombreEmpresa?></strong></span></h3>
			      </a> 
               </div>
					<?
                    include("../../includes/menu.php");
                    ?>		      </div>
		  </div><!--end #sidebar-->
			<!-- END SIDEBAR -->
            
            
			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> <?=$NombreTITMEN?></h3>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Información de la Compañía</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												<div class="well">
													<span class="label label-success"><i class="fa fa-comment"></i></span>
													<span>Publique la información que desea que aparezca en los correos que se envían automáticamente.</strong></span>
												</div>
												<form action="act-informacion.php" method="post" enctype="multipart/form-data" class="form-horizontal form-validate" novalidate role="form">
                                                
                                                
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
															  <div class="col-lg-2 col-md-4 col-sm-6">
																<label for="Nombre" class="control-label">Empresa</label>
															    <input name="Id" type="hidden" id="Id" value="<?=$IdA?>">
															  </div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ingrese un Nombre" value="<?=$Nombre?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Nit" class="control-label">Nit / C.C</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Nit" type="text" class="form-control" id="Nit" placeholder="Ingrese su Nit o Cedula" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Nit?>" data-rule-minlength="3" required>
																</div>
															</div>
														</div>
													</div>
                                                    

                                                    
                                                    
                                                    
												  <div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Pais" class="control-label">Pais</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Pais" type="text" class="form-control" id="Pais" placeholder="Ingrese un Pais" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Pais?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Ciudad" class="control-label">Ciudad</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
                                                               <input name="Ciudad" type="text" class="form-control" id="Ciudad" placeholder="Ingrese una Ciudad" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Ciudad?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
												  
                                                  
                                                  
                                                  
<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Dir" class="control-label">Dirección</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Dir" type="text" class="form-control" id="Dir" placeholder="Ingrese una Dirección" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Dir?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Apellidos" class="control-label">Email</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="email" name="email" id="email" class="form-control" placeholder="Ingrese un Email" value="<?=$Email?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
                                                  






												<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Dir" class="control-label">Teléfono</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Telefono" type="text" class="form-control" id="Telefono" placeholder="Ingrese un Teléfono" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Telefono?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Celular" class="control-label">Celular</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
                                                               <input name="Celular" type="text" class="form-control" id="Celular" placeholder="Ingrese un Celular" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Celular?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
												<div class="row">
													<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Celular" class="control-label">Url </label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
                                                               <input name="Urlseguimiento" type="text" class="form-control" id="Urlseguimiento" placeholder="Dirección de seguimiento" value="<?=$Urlseguimiento?>" required data-rule-minlength="3">
																</div>
															</div>
												  </div>
												
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="PieFactura" class="control-label">Pie Factura</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                <textarea name="PieFactura" value="<?=nl2br($PieFactura);?>" rows="5" required class="form-control" id="PieFactura"><?=$PieFactura?></textarea>
																</div>
															</div>
														</div>
												  </div>
                                                    
                                                    
                                                    
													<div class="row">
														<div class="col-sm-6">
                                                     <div class="col-lg-2 col-md-4 col-sm-6">
                                                                    <label for="email" class="control-label">Logo</label>
                                                          </div>
                                                                <div class="col-lg-10 col-md-8 col-sm-6">
                                                                    <a href="#textModala" data-toggle="modal" data-target="#textModala"><img src="logo/<?=$Logo?>" width="151" height="67"></a><br>
                                                                    <input name="archivo" type="file" id="archivo">
                                                                </div>
                                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                				<div class="modal fade" id="textModala" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                				    <div class="modal-dialog">
                                                				        <div class="modal-content">
                                                				       
                                                				            <div class="modal-body">
                                                				                <img src="logo/<?=$Logo?>" stylw="position:center;" width="200">
                                                				            </div>
                                                				            <div class="modal-footer">
                                                				                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                				            </div>
                                                				        </div><!-- /.modal-content -->
                                                				    </div><!-- /.modal-dialog -->
                                                				</div><!-- /.modal -->
                                                				<!-- END LARGE TEXT MODAL MARKUP -->
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Celular" class="control-label"></label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
																</div>
															</div>
														</div>
													</div>
                                                    
                                                    
                                                    <br><br>
                                                    
													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="email" class="control-label"></label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
                                                        
<?
							$MosPerz1		=	0;
					
					
					
							$queryPerz1			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$Idmenux' and Submenu = '$Idsubmenux' and Opciones = '0' ";
							$resultPerz1		=mysql_query($queryPerz1, $id);
							
							while($rowPerz1		=mysql_fetch_array($resultPerz1))
							{
							$MosPerzA			=$rowPerz1["Act"];
							
							
								if($MosPerzA > 0)
								{
								$MosPerz1	=	1;
								}
							}
?>
                                                        
                                                        <?
                                                        if($MosPerz1 == 1)
														{
														?>
															<button type="submit" class="btn btn-primary">Realizar Operación</button>
                                                            
                                                        <?
														}
														?>
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
