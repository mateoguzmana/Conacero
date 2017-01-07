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
				
					$Casillero		=$_SESSION['IdR'];
					

					

					 $queryUSERS		="SELECT* FROM Usuarios where Id = '$Casillero'";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
					 $IdA				=$rowUSERS["Id"];
					 $usuario			=$rowUSERS["Cedula"];
					 $email				=$rowUSERS["Email"];
					 $tipo				=$rowUSERS["Tipo"];
					 $nombre			=$rowUSERS["Nombre"];
					 $contrasena		=$rowUSERS["Clave"];
					 }
						
		 
					
					$queryTITMEN		="SELECT* FROM Tipouser WHERE Id = '$tipo'" ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTIPO			=$rowTITMEN["Nombre"];
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
													<span>Usuario. <strong><?=$usuario?></strong></span>
												</div>
                                                
<?
							$MosPerz1		=	0;
					

							
							$queryPerz1			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$Idmenux' and Submenu = '$Idsubmenux' and Opciones = '$Idopcmenux' ";
							$resultPerz1		=mysql_query($queryPerz1, $id);
							
							while($rowPerz1		=mysql_fetch_array($resultPerz1))
							{
							$MosPerzA			=$rowPerz1["Agr"];
							
							
								if($MosPerzA > 0)
								{
								$MosPerz1	=	1;
								}
							}
?>
                                            
                                            
                                            
                                            
                                                
												<form class="form-horizontal form-validate" role="form" method="post" action="perfil-update.php" novalidate>
                                                
                                                
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
															  <div class="col-lg-2 col-md-4 col-sm-6">
																<label for="Nombre" class="control-label">Nombre</label>
															    <input name="Id" type="hidden" id="Id" value="<?=$IdA?>">
																<input name="User" type="hidden" id="User" value="<?=$usuario?>">
															  </div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ingrese un Nombre" value="<?=$nombre?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Apellidos" class="control-label">Email</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="email" name="email" id="email" class="form-control" placeholder="Ingrese un Email" value="<?=$email?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
													</div>
                                                    

                                                    
                                                    
                                                    
												  <div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Pais" class="control-label">Usuario</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="usuario" type="text" class="form-control" id="usuario" placeholder="Ingrese el Nombre de Usuario" onChange="javascript:this.value=this.value.toUpperCase();" value="<?=$usuario?>" required data-rule-minlength="3">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="tipo" class="control-label">Tipo de Usuario</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
<?
if($Casillero == 1)
{
$consul		=	'and Id = 1';	
}
else
{
$consul		=	'and Id <> 1';		
}
?>
                                                                
                                                                <select id="tipo" name="tipo" class="form-control" required>
                                                                  <option value="<?=$tipo?>" selected><?=$NombreTIPO?></option>
                                                                  
<?
					$queryTITMEN		="SELECT* FROM Tipouser WHERE Id <> '$tipo' and Activo = 0 $consul Order by Nombre";
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTIPO			=$rowTITMEN["Nombre"];
					$IdTIPO				=$rowTITMEN["Id"];
?>
                                                                  <option value="<?=$IdTIPO?>"><?=$NombreTIPO?></option>
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
																	<input name="Contrasena" type="password" required class="form-control" id="Contrasena" placeholder="Contraseña" value="<?=$contrasena?>" data-rule-minlength="6">
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Contraseña1" class="control-label">Contraseña</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input name="Contrasena1" type="password" required class="form-control" id="Contrasena1" placeholder="Repita la Contraseña" value="<?=$contrasena?>"  data-rule-equalto="#Contrasena" data-rule-minlength="6">
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
