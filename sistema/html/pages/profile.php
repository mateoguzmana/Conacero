<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: ../../html/pages/login.php");
}

include("../../html/pages/conexion.php");


$Casillero	=	$_SESSION['IdR'];

				
					$query000		="SELECT* FROM Interes" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$Texto1			=$row000["Texto1"];
					$Texto2			=$row000["Texto2"];
					}
					
					
					$query000		="SELECT* FROM Casilleros where Id = '$Casillero'" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$Nombre				=$row000["Nombre"];
					$Apellido			=$row000["Apellido"];
					$Id					=$row000["Id"];
					$Pais				=$row000["Pais"];
					$Ciudad				=$row000["Ciudad"];
					$Direccion			=$row000["Direccion"];
					$Telefono			=$row000["Telefono"];
					$Celular			=$row000["Celular"];
					$Email				=$row000["Email"];
					}
					
					
					
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Rapibox | Control de Pedidos</title>

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

			<!-- BEGIN NAVBAR -->
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="btn btn-transparent btn-equal btn-menu" href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a>
				    <div class="navbar-brand">
						<a class="main-brand" href="../../html/dashboards/zona.php">
							<h3 class="text-light text-white"><span>Rapi<strong>Box</strong> </span></h3>
						</a>
					</div><!--end .navbar-brand -->
					<a class="btn btn-transparent btn-equal navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse"><i class="fa fa-wrench fa-lg"></i></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="header-navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="../../html/dashboards/zona.php"><i class="fa fa-home fa-lg"></i></a></li>
					</ul><!--end .nav -->
					<ul class="nav navbar-nav navbar-right">



<?
					$query000		="SELECT COUNT(*) AS TOTAL FROM Mensajes WHERE Estado = 0" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$TOTAL			=$row000["TOTAL"];
					}
?>
					  <li><span class="navbar-devider"></span></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lg fa-envelope"></i><sup class="badge badge-support2"><?=$TOTAL?></sup></a>
							<ul class="dropdown-menu animation-zoom">
								<li class="dropdown-header">Mensajes</li>
                                
<?
					$query000		="SELECT* FROM Mensajes WHERE Estado = 0 order by Fecha" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$Nombre0		=$row000["Nombre"];
					$Texto0			=$row000["Texto"];
					$Fecha0			=$row000["Fecha"];
?>
								<li>
									<a class="alert alert-warning" href="javascript:void(0);">
										<strong><?=$Nombre0?> </strong><br/>
										<small><?=$Texto0?></small>
                                        <br>
                                        <h6><small class="text-xs"><?=$Fecha0?></small></h6>
									</a>
								</li>
<?
					}
?>

								<li class="divider"></li>
                                
                                <li><a href="../../html/pages/login.html">Ver todos<span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                                <?
                                if($TOTAL > 0)
								{
								?>
                                <li class="divider"></li>
								<li><a href="../../html/pages/login.html">Marcar como leidos<span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                                <?
								}
								?>
                                
                                
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->

					  <li><span class="navbar-devider"></span></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="navbar-profile dropdown-toggle text-bold" data-toggle="dropdown"><?=$_SESSION['NombreR']?><i class="fa fa-fw fa-angle-down"></i></a>
							<ul class="dropdown-menu animation-slide">
                           	  <li class="divider"></li>
								<li><a href="../../html/pages/profile.php">Mi Cuenta</a></li>
								<li class="divider"></li>
								<li><a href="../../html/pages/salir.php"><i class="fa fa-fw fa-power-off text-danger"></i> Cerrar Sesion</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .nav -->
				</div><!--end #header-navbar-collapse -->
			</nav>
			<!-- END NAVBAR -->

		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN SIDEBAR-->
			<div id="sidebar">
			  <div class="sidebar-back"></div>
			  <div class="sidebar-content">
			    <div class="nav-brand"> <a class="main-brand" href="../../html/dashboards/zona.php">
			      <h3 class="text-light text-white"><span>Rapi<strong>Box</strong></span></h3>
			      </a> 
               </div>
			    <!-- BEGIN MAIN MENU -->
			    <ul class="main-menu">
			      <!-- Menu Dashboard -->
			      <li> <a href="../../html/dashboards/zona.php"> <i class="fa fa-home fa-fw"></i><span class="title">Home</span> </a> </li>
			      <!--end /menu-item -->
			      <!-- Menu UI -->
			      <li> <a href="javascript:void(0);"> <i class="fa fa-puzzle-piece fa-fw"></i><span class="title">Mi Cuenta</span> <span class="expand-sign">+</span> </a>
			        <!--start submenu -->
			        <ul>
			          <li><a href="../../html/ui/boxes.html" class="active">Perfil</a></li>
			          <li><a href="../../html/ui/buttons.html" >Mensajes</a></li>
		            </ul>
			        <!--end /submenu -->
		          </li>
			      <!--end /menu-item -->
			      <li> <a href="javascript:void(0);"> <i class="fa fa-th fa-fw"></i><span class="title">Casillero</span> <span class="expand-sign">+</span> </a>
			        <!--start submenu -->
			        <ul>
			          <li><a href="../../html/tables/static.html" >Reportar Pedido</a></li>
			          <li><a href="../../html/tables/dynamic.html" >Seguimiento</a></li>
			          <li><a href="../../html/tables/responsive.html" >Historial</a></li>
		            </ul>
			        <!--end /submenu -->
		          </li>
			      <!--end /menu-item -->
		        </ul>
			    <!--end .main-menu -->
			    <!-- END MAIN MENU -->
		      </div>
		  </div><!--end #sidebar-->
			<!-- END SIDEBAR -->
            
            
			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Perfil</h3>
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
												<div class="well">
													<span class="label label-success"><i class="fa fa-comment"></i></span>
													<span>Casillero Nro. <strong><?=$Casillero?></strong></span>
												</div>
												<form class="form-horizontal form-validate" role="form" method="post" action="profile-update.php" novalidate>
                                                
                                                
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Nombre" class="control-label">Nombres</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="<?=$Nombre?>" value="<?=$Nombre?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Apellidos" class="control-label">Apellidos</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Apellidos" id="Apellidos" class="form-control" placeholder="Apellidos" value="<?=$Apellido?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
                                                
													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="email" class="control-label">Email</label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
															<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=$Email?>" required readonly>
														</div>
													</div>
                                                    
                                                    
                                                    
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Pais" class="control-label">País</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Pais" type="text" class="form-control" id="Pais" placeholder="País" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Pais?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Ciudad" class="control-label">Ciudad</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Ciudad" type="text" class="form-control" id="Ciudad" placeholder="Ciudad" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Ciudad?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
                                                    
                                                    
													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="Direccion" class="control-label">Dirección</label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
															<input name="Direccion" type="text" class="form-control" id="Direccion" placeholder="Dirección" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$Direccion?>" required data-rule-minlength="4">
														</div>
													</div>
                                                    
                                                    
                                                    
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Telefono" class="control-label">Teléfono</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Telefono" type="text" class="form-control" id="Telefono" placeholder="Teléfono" value="<?=$Telefono?>" required data-rule-digits="true" data-rule-minlength="4">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Celular" class="control-label">Celular</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Celular" type="text" class="form-control" id="Celular" placeholder="Celular" value="<?=$Celular?>" required data-rule-digits="true" data-rule-minlength="4">
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
																	<input type="password" name="Contrasena" id="Contrasena" class="form-control" placeholder="Contraseña" required data-rule-minlength="6">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contraseña1" class="control-label">Contraseña</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="password" name="Contrasena1" id="Contrasena1" class="form-control" placeholder="Repita la Contraseña" required  data-rule-equalto="#Contrasena" data-rule-minlength="6">
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
