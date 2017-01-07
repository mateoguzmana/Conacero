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
	
				
					$query000		="SELECT* FROM Interes" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$Texto1			=$row000["Texto1"];
					$Texto2			=$row000["Texto2"];
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
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> Home</h3>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#overview"><i class="fa fa-inbox"></i> Ultimas cuentas por cobrar</a></li>
											<li><a href="#editDetails"><i class="fa fa-edit"></i> Ultimas cuentas por pagar</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">
										<!-- START PROFILE OVERVIEW -->
										<div class="tab-pane active" id="overview">
											<div class="box-tiles style-white">
												<div class="row">
													<!-- START PROFILE SIDEBAR --><!--end .col-sm-3 -->
													<!-- END PROFILE SIDEBAR -->

													<!-- START PROFILE CONTENT -->
													<div class="col-lg-12">
													  <div class="box-body">
														  <div class="row">
																<div class="col-sm-8">
																	<p class="lead">Cuentas por cobrar.</p>
																</div>

															</div>
															<div class="row">&nbsp;</div><!-- Extra row gap-->
															<div class="row">
																<div class="box-body">
																	<div class="table-responsive">
																		<table class="table table-bordered">
																			<thead>
																				<tr>
																					<th>Nro</th>
																					<th>Cliente</th>
																					<th>Obra</th>
																					<th>Valor</th>
																					<th>Deuda</th>
																					<th>Fecha pago</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?
																				$querySZS			="SELECT * FROM Facturacion WHERE (Estado=3 || Estado=4)  Order by Fechalim DESC";
                                               									$resultSZS			=mysql_query($querySZS, $id);
                                                								while($rowSZS		=mysql_fetch_array($resultSZS))
                                                								{
                                                								$cobro++;
                                                								$Idfact 			=$rowSZS["Id"];
                                                								$Razon 				=$rowSZS["Razon"];
                                                								$Nit 				=$rowSZS["Nit"];
                                                								$Fechafact 			=$rowSZS["Fechafact"];
                                                								$FechaLim 			=$rowSZS["Fechalim"];
                                                								$Descripcion		=$rowSZS["Descripcion"];
                                                								$Valor1 			=$rowSZS["Total"];
                                                								$Abono1 			=$rowSZS["ValorCobrado"];
                                                								$Estado				=$rowSZS["Estado"];
                                                								$Deuda1				=($Valor1-$Abono1);

                                                								$queryRS 			="SELECT * FROM Facturacionmov WHERE Idfact='$Idfact'";
                                                								$resultRS 			=mysql_query($queryRS,$id);
                                                								while ($rowRS 		=mysql_fetch_array($resultRS)) {
                                                								$Idobra 			=$rowRS["Idobra"];
                                                								}

                                                								$queryNd 			="SELECT * FROM Obras WHERE Id='$Idobra'";
                                                								$resultNd 			=mysql_query($queryNd,$id);
                                                								while ($rowNd 		=mysql_fetch_array($resultNd)) {
                                                								$Obra1 				=$rowNd["Nombre"];
                                                								}

                                                								$fecha_actual1 = date("Y-m-d");  
    																			$s1 = strtotime($FechaLim)-strtotime($fecha_actual1);  
    																			$d1 = intval($s1/86400);  
    																			$diferencia1 = $d1;
                                                								?>
																				<tr>
																					<td><?=$Idfact?></td>
																					<td><?=$Razon?></td>
																					<td><?=$Obra1?></td>
																					<td>$ <?=number_format($Valor1,0,'','.')?></td>
																					<td>$ <?=number_format($Deuda1,0,'','.')?></td>
																					<td><?=$FechaLim?></td>
																				</tr>
																				<?
																				}
																				?>
																			</tbody>
																		</table>
																	</div><!--end .table-responsive -->
																</div><!--end .col-sm-8 -->
			
            
                                                                
                                                                
                                                                
                                                                
															</div><!--end .row -->
														</div>
													</div><!--end .col-sm-9 -->
													<!-- END PROFILE CONTENT -->

												</div><!--end .row -->
											</div><!--end .box-body -->
										</div><!--end .tab-pane -->
										<!-- END PROFILE OVERVIEW -->

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane" id="editDetails">
											<div class="box-body style-white">
										 					<div class="row">
																<div class="col-sm-8">
																	<p class="lead">Cuentas por pagar.</p>
																</div>

															</div>
                                                
																<div class="box-body">
																	<div class="table-responsive">
																		<table class="table table-bordered">
																			<thead>
																				<tr>
																					<th>Nro.</th>
																					<th>Proveedor</th>
																					<th>Nro. Factura</th>
																					<th>Obra</th>
																					<th>Valor</th>
																					<th>Deuda</th>
																					<th>Fecha pago</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?
																				$queryUSERS			="SELECT * FROM CuentasPagar WHERE (Estado=0 ||  Estado=4) Order by FechaFin DESC";
                                                								$resultUSERS		=mysql_query($queryUSERS, $id);
                                                								
                                                								while($rowUSERS		=mysql_fetch_array($resultUSERS))
                                                								{
                                                								$pago++;
                                                								$TipoCuenta 		=$rowUSERS["TipoCuenta"];
                                                								$Idproveedor		=$rowUSERS["Idproveedor"];
                                                								$NumeroFactura 		=$rowUSERS["NumeroFactura"];
																				$Fechainicio		=$rowUSERS["FechaInicio"];
																				$FechaFin 			=$rowUSERS["FechaFin"];
																				$Idobra 			=$rowUSERS["Idobra"];
																				$Nitn				=$rowUSERS["Nit"];
																				$Id					=$rowUSERS["Id"];
																				$Valor				=$rowUSERS["Valor"];
																				$ValorAbonado 		=$rowUSERS["ValorAbonado"];
																				$Estado				=$rowUSERS["Estado"];
																				$Concepto			=$rowUSERS["Concepto"];
																				
																				$Deuda				=($Valor-$ValorAbonado);
																				
								
																				$queryR1 			="SELECT * FROM Obras WHERE Id='$Idobra'";
																				$resultR1 			=mysql_query($queryR1,$id);
																				while($rowR1=mysql_fetch_array($resultR1)){
																				$Obra 				=$rowR1["Nombre"];
																				}
          																		$queryR2 			="SELECT * FROM Proveedores WHERE Id='$Idproveedor'";
																				$resultR2 			=mysql_query($queryR2,$id);
																				while($rowR2=mysql_fetch_array($resultR2)){
																				$Proveedor 				=$rowR2["Nombre"];
																				}

																				$fecha_actual = date("Y-m-d");  
    																			$s = strtotime($FechaFin)-strtotime($fecha_actual);  
    																			$d = intval($s/86400);  
    																			$diferencia = $d;  

																				?>
																				<tr>
																					<td><?=$Id?></td>
																					<td><?=$Proveedor?></td>
																					<td><?=$NumeroFactura?></td>
																					<td><?=$Obra?></td>
																					<td>$ <?=number_format($Valor,0,'','.')?></td>
																					<td>$ <?=number_format($Deuda,0,'','.')?></td>
																					<td><?=$FechaFin?></td>
																				</tr>
																				<?
																				}
																				?>
																			</tbody>
																		</table>
																	</div><!--end .table-responsive -->
																</div><!--end .col-sm-8 -->
                                                

											</div><!--end .box-body -->
										</div><!--end .tab-pane -->
										<!-- END PROFILE EDITOR -->

									</div><!--end .tab-content -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div><!--end .row -->
                        
                        
                        







						<div class="row">
							<!-- START COLORED BOX -->
							<div class="col-lg-6">
								<div class="box box-bordered style-primary">
									<div class="box-head">
										<header><h4 class="text-light"><i class="fa fa-fw fa-tag"></i> Proxima cuenta por <strong>cobrar:</strong></h4></header>
										<div class="tools">
											<div class="btn-group btn-group-transparent">
												<a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
												<a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
											</div>
										</div>
									</div>
									<div class="box-body">
										<?if($cobro>0){?><p style="font-size:17px;">Restan <strong><?=$diferencia1?></strong> días para vencerse la cuenta.</p><?}?>
										<table style="font-size:15px;">
											<tr>
												<?if($cobro>0){?>
												<td><?=$Idfact?> |</td>
												<td><?=$Razon?> |</td>
												<td><?=$Obra1?> |</td>
												<td>$ <?=number_format($Valor1,0,'','.')?> |</td>
												<td><?=$FechaLim?></td>
												<?}else{?>
												<td>Actualmente no tiene pendiente ninguna cuenta por cobrar.</td>
												<?}?>
											</tr> 
										</table>
									</div>
								</div>
							</div><!--end .col-lg-6 -->
							<!-- END COLORED BOX -->

							<!-- START GRADIENT BOX -->
							<div class="col-lg-6">
								<div class="box box-bordered style-primary-gradient">
									<div class="box-head">
										<header><h4 class="text-light"><i class="fa fa-fw fa-tag"></i> Proxima cuenta por <strong>pagar</strong></h4></header>
										<div class="tools">
											<div class="btn-group btn-group-transparent">
												<a class="btn btn-equal btn-sm btn-collapse"><i class="fa fa-angle-down"></i></a>
												<a class="btn btn-equal btn-sm btn-close"><i class="fa fa-times"></i></a>
											</div>
										</div>
									</div>
									<div class="box-body">
										<?if($pago>0){?><p style="font-size:17px;">Restan <strong><?=$diferencia?></strong> días para vencerse la cuenta.</p><?}?>
										<table style="font-size:15px;">
											<tr>
												<?if($pago>0){?>
												<td><?=$Id?> |</td>
												<td><?=$Proveedor?> |</td>
												<td><?=$Obra?> |</td>
												<td>$ <?=number_format($Valor,0,'','.')?> |</td>
												<td><?=$FechaFin?></td>
												<?}else{?>
												<td>Actualmente no tiene pendiente ninguna cuenta por pagar.</td>
												<?}?>
											</tr> 
										</table>
									</div>
								</div>
							</div><!--end .col-lg-6 -->
							<!-- END GRADIENT BOX -->

						</div>










                        
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
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
