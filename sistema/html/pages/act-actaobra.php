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
										<table id="datatable5" class="table table-striped table-hover">
											<thead>
												<tr>
													<th>Codigo</th>
                                                    <th>Obra</th>
													<th>Proveedor</th>
													<th>Fecha</th>
													<th>Contrato</th>
													<th>Valor</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
                                            
												<?
							$MosPerz1		=	0;
							$MosPerz2		=	0;
					

							
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
												
                                                $queryUSERS			="SELECT* FROM Actasobra where Muestra = 0 Order by Id DESC";
                                                $resultUSERS		=mysql_query($queryUSERS, $id);
                                                
                                                While($rowUSERS		=mysql_fetch_array($resultUSERS))
                                                {
                                                $NombreUSERS		=$rowUSERS["Nombre"];
                                                $Idobra 			=$rowUSERS["Idobra"];
                                                $IdclienteUSERS		=$rowUSERS["Idproveedor"];
												$FechainicioUSERS	=$rowUSERS["Fechafact"];
												$Contrato 			=$rowUSERS["Contrato"];
												$IdUSERS			=$rowUSERS["Id"];
												$Estado				=$rowUSERS["Estado"];
												$Valor 				=$rowUSERS["Valor"];
												
												$queryDD			="SELECT* FROM Obras where Id = '$Idobra' and Muestra = 0 order by Nombre";
                                                $resultDD			=mysql_query($queryDD, $id);
                                                                        
                                                while($rowDD		=mysql_fetch_array($resultDD))
                                                {
												$NombreObra			=$rowDD["Nombre"];
												}

                                                $queryTIP			="SELECT* FROM Proveedores where Id = '$IdclienteUSERS' and Muestra = 0 order by Nombre";
                                                $resultTIP			=mysql_query($queryTIP, $id);
                                                                        
                                                while($rowTIP		=mysql_fetch_array($resultTIP))
                                                {
												$NombreTIP			=$rowTIP["Nombre"];
												}
                                                ?>
                                            
												<tr class="gradeA">
													<td><?=$IdUSERS?></td>
                                                    <td><?=$NombreObra?></td>
													<td><?=$NombreTIP?></td>
													<td><?=$FechainicioUSERS?></td>
													<td><?=$Contrato?></td>
													<td>$<?=number_format($Valor,0,'','.')?></td>

													<td class="text-right">
                                                        <?
                                                        if($MosPerz1 == 1)
														{
														?>   
                                                        <?
														if($Estado == 0)
														{
														?>                                              
													<input name="Procesar" type="button" class="btn btn-primary" style="width:100px;" value="MODIFICAR"  onClick="location.href='act-actaobra-2.php?Id=<?=$IdUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														else
														{
														?>
													<input name="Procesar" type="button" class="btn btn-warning" style="width:100px;" value="FINALIZADA"  onClick="location.href='act-actaobra-2.php?Id=<?=$IdUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'"> 
                                                        <?
														}
														if($Estado == 0 AND $Muestra==0)
														{
														?>  
													<input name="Eliminar" type="button" class="btn btn-danger" style="width:100px;" value=" ELIMINAR "  data-toggle="modal" data-target="#textModal<?=$IdUSERS?>" data-placement="top">
                                                        <?
                                                    	}
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
                                                                <h4 class="modal-title" id="textModalLabel"><?=$NombreUSERS?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Realmente desea realizar esta operación?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" onclick="location.href='eli-actaobra.php?Id=<?=$IdUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'">Confirmar</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP -->
                                           		 <?
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
