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
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1403937875" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/DataTables/TableTools.css?1403937875" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/toastr/toastr.css?1403937848" />
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
						<h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> <?=$LineaMenuS?></h3>
					</div>
					<div class="section-body">
						<!-- START DATATABLE 1 -->
						<div class="row">
							<div class="col-lg-12">
								<div class="box">
									<div class="box-body table-responsive">
										<table id="datatable6" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>Nro.</th>
													<th>Obra</th>
                                                    <th>Proveedor</th>
													<th>Fecha</th>
													<th>Valor Org.</th>
													<th>% Retención</th>
													<th>Saldo</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
                                            
												<?
							
							$queryPerz1			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$Idmenux' and Submenu = '$Idsubmenux' and Opciones = '$Idopcmenux' ";
							$resultPerz1		=mysql_query($queryPerz1, $id);
							
							while($rowPerz1		=mysql_fetch_array($resultPerz1))
							{
							$MosPerzA			=$rowPerz1["Act"];
							$MosPerzB			=$rowPerz1["Del"];
							
							
								if($MosPerzA > 0)
								{
								$MosPerz1	=	1;
								}
							
								if($MosPerzB > 0)
								{
								$MosPerz2	=	1;
								}
							}
												
                                                $queryUSERS			="SELECT * FROM CuentasPagar WHERE Estado=0 || Estado=4 || Estado=2  Order by Id DESC";
                                                $resultUSERS		=mysql_query($queryUSERS, $id);
                                                $x=0;
                                                while($rowUSERS		=mysql_fetch_array($resultUSERS))
                                                {
                                                $x++;
                                                $TipoCuenta 		=$rowUSERS["TipoCuenta"];
                                                $NombreUSERS		=$rowUSERS["Proveedor"];
                                                $NumeroFactura 		=$rowUSERS["NumeroFactura"];
                                                $IdclienteUSERS		=$rowUSERS["Idcliente"];
												$FechainicioUSERS	=$rowUSERS["FechaInicio"];
												$NitnUSERS			=$rowUSERS["Nit"];
												$Retencion 			=$rowUSERS["Retencion"];
												$IdUSERS			=$rowUSERS["Id"];
												$ValorUSERS			=$rowUSERS["Valor"];
												$ValorRetencion		=$rowUSERS["ValorRetencion"];
												$ValorAbonado 		=$rowUSERS["ValorAbonado"];
												$Estado				=$rowUSERS["Estado"];
												$Concepto			=$rowUSERS["Concepto"];
												$Obra 				=$rowUSERS["Idobra"];
 
												$Deuda				=($ValorRetencion-$ValorAbonado);

												$queryPERR			="SELECT * FROM Obras WHERE Id='$Obra'";
                                                $resultPERR			=mysql_query($queryPERR, $id);
                                                while($rowPERR		=mysql_fetch_array($resultPERR))
                                                {
                                                $NombreObra 		=$rowPERR["Nombre"];
                                                }

												$queryTIN			="SELECT * FROM Retenciones WHERE Valor='$Retencion' AND Muestra=0";
                                                $resultTIN			=mysql_query($queryTIN, $id);
                                                while($rowTIN		=mysql_fetch_array($resultTIN))
                                                {
                                                $ValRetencion 		=$rowTIN["Nombre"];
                                                }
												if ($TipoCuenta=="1") {
													$TipoCuenta="Exporadica";
													$Tipo 	   =1;
												}
												if($TipoCuenta=="2") {
													$TipoCuenta="Recurrente";
													$Tipo 	   =2;
												}
                                                ?>

                                            	
												<tr class="gradeA">
													<td><?=$IdUSERS?></td>
													<td><?=$NombreObra?></td>
                                                    <td><?=$NombreUSERS?></td>
													<td><?=$FechainicioUSERS?></td>
													<td>$ <?=number_format($ValorUSERS,0,'','.')?></td>
													<td><?=$ValRetencion?></td>
													<td>$ <?=number_format($Deuda,0,'','.')?></td>
													<td class="text-right">
                                                        <?if($Tipo==1){?>
                                                        <?
														if($Estado == 0)
														{
														?>                                              
													<input name="Procesar" type="button" class="btn btn-primary" value="MODIFICAR" style="width:100px;"  onClick="location.href='act-pagos-2.php?Id=<?=$IdUSERS?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														if($Estado == 4)
														{
														?>                                              
													<input name="Procesar" type="button" class="btn btn-primary" value="VER" style="width:100px;"  onClick="location.href='act-pagos-2.php?Id=<?=$IdUSERS?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														if($Estado == 1)
														{
														?>
													<input name="Procesar" type="button" class="btn btn-warning" value="FINALIZADA"  style="width:100px;" onClick="location.href='act-pagos-2.php?Id=<?=$IdUSERS?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														if($Estado == "2")
														{
														?>
													<input name="Procesar" type="button" class="btn btn-success" value="ANULADA"  style="width:100px;" onClick="location.href='act-pagos-2.php?Id=<?=$IdUSERS?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														?>
                                                        <?
														if($Estado == 0)
														{
														?>  
													<input name="Eliminar" type="button" class="btn btn-danger" value=" ANULAR "  style="width:100px;" data-toggle="modal" data-target="#textModal<?=$IdUSERS?>" data-placement="top">
                                                        <?
														}
														$queryXD="SELECT * FROM Usuarios WHERE Id=$_SESSION[IdR]";
														$resultXD=mysql_query($queryXD,$id);
														while ($rowXD=mysql_fetch_array($resultXD)) {
															$ContraActual=$rowXD["Clave"];
														}
														
														?>
                                                    </td>

												</tr>
                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                <div class="modal fade" id="textModal<?=$IdUSERS?>" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">NRO. <?=$IdUSERS?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Realmente desea anular esta factura?</p>
                                                                <?for ($i=0; $i < $x; $i++) { ?>
																	<?}?>
                                                             	<form id="Anulacion" onsubmit="return valida<?=$i?>(this)" action='eli-pagos.php?Id=<?=$IdUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>' method="post">
																<div class="col-lg-11 col-md-10 col-sm-9">			
                                                                  <textarea name="MotivoAnulacion" rows="3" required class="form-control" id="MotivoAnulacion" placeholder="Motivo anulacion" onChange="javascript:this.value=this.value.toUpperCase();"></textarea>
																	<br>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
																	<label>Digite su contraseña</label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">	
																	
                                                                  <input type="password" id="Contrasena<?=$i?>" name="Contrasena<?=$i?>" rows="3" required class="form-control" placeholder="Contraseña">
                                                                  <input type="hidden" id="ContraActual<?=$i?>" name="ContraActual<?=$i?>" value="<?=$ContraActual?>">
																	<br>
																	<span id="Resp<?=$i?>"></span>
																	<script type="text/javascript">
        														function valida<?=$i?>()
        														{
        														var pass=document.getElementById('Contrasena<?=$i?>').value;
        														var vieja=document.getElementById('ContraActual<?=$i?>').value;
        														var correcto=true;
       															if (pass==vieja) {
       															document.getElementById("Resp<?=$i?>").innerHTML='<span style="font-size:14px;padding:5px;" class="alert-success">Contraseña correcta <strong>√</strong></span>';	
       															correcto=true;
       															}
       															else{
       															document.getElementById("Resp<?=$i?>").innerHTML='<span style="font-size:14px;padding:5px;" class="alert-danger">Contraseña incorrecta <strong>X</strong></span>';
       															correcto=false;
       															}
       															return correcto;
  																}
        														</script>
																	<span id="xd"></span>
																</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-success" onclick="valida<?=$i?>()">Confirmar</button>
                                                            	</form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP -->
                                                <?
												}
												else{ ?>
												<?
														if(($Estado == 0) || ($Estado == 4))
														{
														?>                                              
													<input name="Procesar" type="button" class="btn btn-primary" value="MODIFICAR" style="width:100px;"  onClick="location.href='act-pagos-2.php?Id=<?=$IdUSERS?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														elseif($Estado == 1)
														{
														?>
													<input name="Procesar" type="button" class="btn btn-warning" value="FINALIZADA"  style="width:100px;" onClick="location.href='act-pagos-2.php?Id=<?=$IdUSERS?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														elseif($Estado == 2)
														{
														?>
													<input name="Procesar" type="button" class="btn btn-success" value="ACTIVAR"  style="width:100px;" data-toggle="modal" data-target="#textModal2<?=$IdUSERS?>" data-placement="top"> 
                                                        <?
														}
														?>
                                                        <?
														if(($Estado == 0) || ($Estado == 4))
														{
														?>  
													<input name="Desactivar" type="button" class="btn btn-danger" value=" DESACTIVAR "  style="width:100px;" data-toggle="modal" data-target="#textModal<?=$IdUSERS?>" data-placement="top">
                                                        <?
														}
														?>
                                                    </td>

												</tr>
                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                <div class="modal fade" id="textModal<?=$IdUSERS?>" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">NRO. <?=$IdUSERS?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Realmente desea desactivar este movimiento?</p>
                                                                <div class="alert alert-info alert-dismissable">
  																<button type="button" class="close" data-dismiss="alert">&times;</button>
  																<strong>¡Cuidado!</strong> Es muy importante que tenga en cuenta: Si desactiva un movimiento que ya se ejecuto más de una vez, se eliminara todo de este movimiento en la base de datos.
																</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" onclick="location.href='eli-pagos.php?Id=<?=$IdUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'">Confirmar</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP -->
                                                <!-- START LARGE TEXT MODAL MARKUP 2-->
                                                <div class="modal fade" id="textModal2<?=$IdUSERS?>" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">NRO. <?=$IdUSERS?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Realmente desea activar este movimiento?</p>
                                                                <div class="alert alert-info alert-dismissable">
  																<button type="button" class="close" data-dismiss="alert">&times;</button>
  																<strong>¡Cuidado!</strong> Es muy importante que tenga en cuenta: Cuando activa un movimiento recurrente, tendrá que revisar que su fecha de inicio sea mayor a la 
  																fecha actual para que se pueda ejecutar de nuevo el proceso.
																</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" onclick="location.href='rev-pagos.php?Id=<?=$IdUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'">Confirmar</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP -->
                                                <?
												}
												
												}
												?>
                                                
											</tbody>
										</table>
									</div><!--end .box-body -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div>
						<!-- END DATATABLE 1 -->


					</div>
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
		<script src="../../assets/js/libs/DataTables/jquery.dataTables.js"></script>
		<script src="../../assets/js/libs/DataTables/extras/ColVis/js/ColVis.js"></script>
		<script src="../../assets/js/libs/DataTables/extras/TableTools/media/js/TableTools.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/core/demo/DemoTableDynamic.js"></script>
		<script src="../../assets/js/libs/toastr/toastr.min.js"></script>
		<script src="../../assets/js/core/demo/DemoUIMessages.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
        
        
        
        
        
        
        
		<!-- END JAVASCRIPT -->

	</body>
</html>
