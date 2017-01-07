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

					
					
					$IdTIPOU		=$_REQUEST['Id'];
					
				

					
					

					
					$query000		="SELECT* FROM Tipouser where Id = '$IdTIPOU'" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$Nombre			=$row000["Nombre"];
					}
					
					
					
					$horaactual 	= 	date("Y-m-d H:i:s");
					

				
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
        
<script language="JavaScript">
function Abrir_ventana (pagina) 
{
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=500, height=500, top=85, left=300";
window.open(pagina,"",opciones);
}
</script>  


<script type="text/javascript">
function validar()
{
    
    cont = 0
    for (i=0;i<document.form2.elements.length;i++)
    {
        if(document.form2.elements[i].type == "checkbox")
        {
          if(document.form2.elements[i].checked == 1)
          {
            cont = cont + 1;
          }
        }
    }    
    
    if (cont>0)
	{
        if(confirm("Desea generar esta Guia?"))
		{
            document.form2.submit();
        }
    }
    else
	{
        alert("Debe seleccionar al menos un Nro. de Tracking");
        return false;
    }
        
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>  
        
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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Permisos</a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
                                            
  


  
                                                    
                                                    
												<form action="act-permisos.php" method="get" enctype="multipart/form-data" class="form-horizontal form-validate" novalidate role="form" name="form1" id="form1">
												  <div class="row">
														<div class="col-sm-6">
															<div class="form-group">
															  <div class="col-lg-2 col-md-4 col-sm-6">
                                                              <label for="Tracking" class="control-label">Tipo de Usuario</label>
															    <input name="Idtipo" type="hidden" id="Id" value="<?=$IdTIPOU?>">
																  </div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                

<div class="input-group">
  <select id="jumpMenu" name="jumpMenu" class="form-control" onChange="MM_jumpMenu('parent',this,0)" required style="width:99%">
  <option value="<?=$IdTIPOU?>" selected><?=$Nombre?></option>
                                                                  
<?
					$queryTITMEN		="SELECT* FROM Tipouser WHERE Id <> '$IdTIPOU' and Activo = 0   Order by Nombre";
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					while($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTIPO			=$rowTITMEN["Nombre"];
					$IdTIPO				=$rowTITMEN["Id"];
?>
  <option value="act-permisos.php?Id=<?=$IdTIPO?>&Idmenu=<?=$_REQUEST["Idmenu"]?>&Idsubmenu=<?=$_REQUEST["Idsubmenu"]?>&Idopcmenu=<?=$_REQUEST["Idopcmenu"]?>"><?=$NombreTIPO?></option>
<?
					}
?>
  </select>
                                                                
                                                                
                                                                
                                                              </div>
                                                                
															  </div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">

																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																</div>
															</div>
														</div>
													</div>


												</form>
                                                    
                                                    
<?
if(!empty($IdTIPOU))
{
?>
<br><br>
                                                    
									
										<form action="act-permisos-2.php" method="get" enctype="multipart/form-data" class="form-horizontal form-banded form-bordered" novalidate role="form" name="form1" id="form1">
                                        <input name="Idtipo" type="hidden" value="<?=$IdTIPOU?>">






<?
					$cont			=0;
					$queryMen1		="SELECT* FROM Menu Order by Pos";
					$resultMen1		=mysql_query($queryMen1, $id);
					
					while($rowMen1	=mysql_fetch_array($resultMen1))
					{
					$NombreMen1			=$rowMen1["Nombre"];
					$IdMen1				=$rowMen1["Id"];
					$cont++;
					
					
					
						$queryPerC1			="SELECT COUNT(*) AS TOTAL FROM Menusub where Idmenu = '$IdMen1'";
						$resultPerC1		=mysql_query($queryPerC1, $id);
						
						while($rowPerC1		=mysql_fetch_array($resultPerC1))
						{
						$TOTALPerC1			=$rowPerC1["TOTAL"];
						}
					
					
					
						$queryPer1			="SELECT* FROM Permisos where Idtipo = '$IdTIPOU' and Men = '$IdMen1'";
						$resultPer1			=mysql_query($queryPer1, $id);
						
						while($rowPer1		=mysql_fetch_array($resultPer1))
						{
						$MosPerA			=$rowPer1["Mos"];
						$AgrPerA			=$rowPer1["Agr"];
						$ActPerA			=$rowPer1["Act"];
						$DelPerA			=$rowPer1["Del"];
						
							if($MosPerA > 0)
							{
							$MosPer1	=	1;
							}
							
							if($AgrPerA > 0)
							{
							$AgrPer1	=	1;
							}
							
							if($ActPerA > 0)
							{
							$ActPer1	=	1;
							}
							
							if($DelPerA > 0)
							{
							$DelPer1	=	1;
							}
							
						
						
						}
						
						
						
						if($MosPer1 == 1)
						{
						$cheMosPer1 	=	'checked';
						$acMosPer1 		=	'active';
						}
						else
						{
						$cheMosPer1 	=	'';	
						$acMosPer1 		=	'';
						}
						
						
						if($AgrPer1 == 1)
						{
						$cheAgrPer1 	=	'checked';
						$acAgrPer1 		=	'active';
						}
						else
						{
						$cheAgrPer1 	=	'';	
						$acAgrPer1 		=	'';
						}
						
						
						if($ActPer1 == 1)
						{
						$cheActPer1 	=	'checked';
						$acActPer1 		=	'active';
						}
						else
						{
						$cheActPer1 	=	'';	
						$acActPer1 		=	'';
						}
						
						
						if($DelPer1 == 1)
						{
						$cheDelPer1 	=	'checked';
						$acDelPer1 		=	'active';
						}
						else
						{
						$cheDelPer1 	=	'';
						$acDelPer1 		=	'';	
						}
						

						
						
						
					
					
?>

											<div class="form-group">
												<div class="col-md-2 col-sm-3"  style="background:#ACACAC">
													<label class="control-label"><?=$NombreMen1?></label>
												</div>
												<div class="col-md-5 col-sm-5" style="background:#ACACAC">
													<div data-toggle="buttons">
                                                    
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acMosPer1?>">
															<input name="mostrar<?=$IdMen1?><?=$cont?>" type="checkbox" value="1"  <?=$cheMosPer1?>> Mostrar
														</label>
                                                        
                                                      <?
                                                        if($TOTALPerC1 == 0)
														{
														?>
                                                        
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acAgrPer1?>">
															<input type="checkbox" value="1"  name="ingresar<?=$IdMen1?><?=$cont?>" <?=$cheAgrPer1?>> Ingresar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acActPer1?>">
															<input type="checkbox" value="1"  name="modificar<?=$IdMen1?><?=$cont?>" <?=$cheActPer1?>> Modificar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acDelPer1?>">
															<input type="checkbox" value="1" name="borrar<?=$IdMen1?><?=$cont?>" <?=$cheDelPer1?>> Borrar
														</label>
                                                        <?
														}
														?>
				

													</div>
												</div>
												<div class="col-md-5 col-sm-4">
													<div data-toggle="buttons">

													</div>
												</div>
											</div>
                                            
<?

						$MosPer1			=0;
						$AgrPer1			=0;
						$ActPer1			=0;
						$DelPer1			=0;	

				


						$queryMen2		="SELECT* FROM Menusub where Idmenu = '$IdMen1' Order by Pos";
						$resultMen2		=mysql_query($queryMen2, $id);
						
						while($rowMen2	=mysql_fetch_array($resultMen2))
						{
						$NombreMen2			=$rowMen2["Nombre"];
						$IdMen2				=$rowMen2["Id"];
						$cont++;


							$queryPerC2			="SELECT COUNT(*) AS TOTAL FROM Menuopc where Idmenu = '$IdMen1' and Idsub = '$IdMen2'";
							$resultPerC2		=mysql_query($queryPerC2, $id);
							
							while($rowPerC2		=mysql_fetch_array($resultPerC2))
							{
							$TOTALPerC2			=$rowPerC2["TOTAL"];
							}
						
						
						
							$queryPer2			="SELECT* FROM Permisos where Idtipo = '$IdTIPOU'  and Men = '$IdMen1' and Submenu = '$IdMen2'";
							$resultPer2			=mysql_query($queryPer2, $id);
							
							while($rowPer2		=mysql_fetch_array($resultPer2))
							{
							$MosPerB			=$rowPer2["Mos"];
							$AgrPerB			=$rowPer2["Agr"];
							$ActPerB			=$rowPer2["Act"];
							$DelPerB			=$rowPer2["Del"];
							
								
								if($MosPerB > 0)
								{
								$MosPer2	=	1;
								}
								
								if($AgrPerB > 0)
								{
								$AgrPer2	=	1;
								}
								
								if($ActPerB > 0)
								{
								$ActPer2	=	1;
								}
								
								if($DelPerB > 0)
								{
								$DelPer2	=	1;
								}
							
							}
							
							
							
							if($MosPer2 == 1)
							{
							$cheMosPer2 	=	'checked';
							$acMosPer2 		=	'active';
							$valMosPer2 	=	1;	
							}
							else
							{
							$cheMosPer2 	=	'';	
							$acMosPer2 		=	'';
							$valMosPer2 	=	0;	
							}
							
							
							if($AgrPer2 == 1)
							{
							$cheAgrPer2 	=	'checked';
							$acAgrPer2 		=	'active';
							$valAgrPer2 	=	1;	
							}
							else
							{
							$cheAgrPer2 	=	'';	
							$acAgrPer2 		=	'';
							$valAgrPer2 	=	0;	
							}
							
							
							if($ActPer2 == 1)
							{
							$cheActPer2 	=	'checked';
							$acActPer2 		=	'active';
							$valActPer2 	=	1;	
							}
							else
							{
							$cheActPer2 	=	'';	
							$acActPer2 		=	'';
							$valActPer2 	=	0;	
							}
							
							
							if($DelPer2 == 1)
							{
							$cheDelPer2 	=	'checked';
							$acDelPer2 		=	'active';
							$valDelPer2 	=	1;	
							}
							else
							{
							$cheDelPer2 	=	'';
							$acDelPer2 		=	'';	
							$valDelPer2 	=	0;	
							}
						
						
						
						
						
						
?>
                                            
                                            
											<div class="form-group" >
												<div class="col-md-2 col-sm-3" style="background: #EFEDBA">
                                                    <label class="control-label"><?=$NombreMen2?></label>
												</div>
												<div class="col-md-5 col-sm-5">
													<div data-toggle="buttons" style="background: #EFEDBA">
                                                        
                                                        <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acMosPer2?>">
															<input name="mostrar<?=$IdMen1?><?=$IdMen2?><?=$cont?>" type="checkbox" value="1"  <?=$cheMosPer2?>> Mostrar
														</label>
                                                        
                                                        <?
                                                        if($TOTALPerC2 == 0)
														{
														?>
                                                        
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acAgrPer2?>">
															<input type="checkbox" value="1" name="ingresar<?=$IdMen1?><?=$IdMen2?><?=$cont?>" <?=$cheAgrPer2?>> Ingresar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acActPer2?>">
															<input type="checkbox" value="1" name="modificar<?=$IdMen1?><?=$IdMen2?><?=$cont?>" <?=$cheActPer2?>> Modificar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acDelPer2?>">
															<input type="checkbox" value="1" name="borrar<?=$IdMen1?><?=$IdMen2?><?=$cont?>" <?=$cheDelPer2?>> Borrar
														</label>
                                                        <?
														}
														?>
													</div>
												</div>
												<div class="col-md-5 col-sm-4">
													<div data-toggle="buttons">

													</div>
												</div>
											</div>     
                                            
                                            
                                            
                                            
                                                                            



<?


							$MosPer2			=0;
							$AgrPer2			=0;
							$ActPer2			=0;
							$DelPer2			=0;							
							
							
							
							

							$queryMen3		="SELECT* FROM Menuopc where Idmenu = '$IdMen1' and Idsub = '$IdMen2' Order by Pos";
							$resultMen3		=mysql_query($queryMen3, $id);
							
							while($rowMen3	=mysql_fetch_array($resultMen3))
							{
							$NombreMen3			=$rowMen3["Nombre"];
							$IdMen3				=$rowMen3["Id"];
							
							$cont++;
							
							
							
						
								$queryPer3			="SELECT* FROM Permisos where Idtipo = '$IdTIPOU'  and Men = '$IdMen1' and Submenu = '$IdMen2' and Opciones = '$IdMen3'";
								$resultPer3			=mysql_query($queryPer3, $id);
								
								while($rowPer3		=mysql_fetch_array($resultPer3))
								{
								$MosPerC			=$rowPer3["Mos"];
								$AgrPerC			=$rowPer3["Agr"];
								$ActPerC			=$rowPer3["Act"];
								$DelPerC			=$rowPer3["Del"];
								
								
									if($MosPerC > 0)
									{
									$MosPer3	=	1;
									}
									
									if($AgrPerC > 0)
									{
									$AgrPer3	=	1;
									}
									
									if($ActPerC > 0)
									{
									$ActPer3	=	1;
									}
									
									if($DelPerC > 0)
									{
									$DelPer3	=	1;
									}
								
								
								}
								
								
								
								if($MosPer3 == 1)
								{
								$cheMosPer3 	=	'checked';
								$acMosPer3 		=	'active';
								$valMosPer3 	=	1;	
								}
								else
								{
								$cheMosPer3 	=	'';	
								$acMosPer3 		=	'';
								$valMosPer3 	=	0;	
								}
								
								
								if($AgrPer3 == 1)
								{
								$cheAgrPer3 	=	'checked';
								$acAgrPer3 		=	'active';
								$valAgrPer3 	=	1;	
								}
								else
								{
								$cheAgrPer3 	=	'';	
								$acAgrPer3 		=	'';
								$valAgrPer3 	=	0;	
								}
								
								
								if($ActPer3 == 1)
								{
								$cheActPer3 	=	'checked';
								$acActPer3 		=	'active';
								$valActPer3 	=	1;	
								}
								else
								{
								$cheActPer3 	=	'';	
								$acActPer3 		=	'';
								$valActPer3 	=	0;	
								}
								
								
								if($DelPer3 == 1)
								{
								$cheDelPer3 	=	'checked';
								$acDelPer3 		=	'active';
								$valDelPer3 	=	1;	
								}
								else
								{
								$cheDelPer3 	=	'';
								$acDelPer3 		=	'';	
								$valDelPer3 	=	0;	
								}
							
							
							
							
							
?>
                                            
                                            
											<div class="form-group" >
												<div class="col-md-2 col-sm-3" style="background: #F3B5B1">
													<label class="control-label"><?=$NombreMen3?></label>
												</div>
												<div class="col-md-5 col-sm-5">
													<div data-toggle="buttons" style="background: #F3B5B1">
														
                                                        <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acMosPer3?>">
															<input name="mostrar<?=$IdMen1?><?=$IdMen2?><?=$IdMen3?><?=$cont?>" type="checkbox" value="1"  <?=$cheMosPer3?>> Mostrar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acAgrPer3?>">
															<input type="checkbox" value="1" name="ingresar<?=$IdMen1?><?=$IdMen2?><?=$IdMen3?><?=$cont?>" <?=$cheAgrPer3?>> Ingresar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acActPer3?>">
															<input type="checkbox" value="1" name="modificar<?=$IdMen1?><?=$IdMen2?><?=$IdMen3?><?=$cont?>" <?=$cheActPer3?>> Modificar
														</label>
														<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$acDelPer3?>">
															<input type="checkbox" value="1" name="borrar<?=$IdMen1?><?=$IdMen2?><?=$IdMen3?><?=$cont?>" <?=$cheDelPer3?>> Borrar
														</label>
													</div>
												</div>
												<div class="col-md-5 col-sm-4">
													<div data-toggle="buttons">

													</div>
												</div>
											</div>  
                                            





                                            
                                            
<?
							$MosPer1			='';
							$AgrPer1			='';
							$ActPer1			='';
							$DelPer1			='';

							$MosPer2			='';
							$AgrPer2			='';
							$ActPer2			='';
							$DelPer2			='';

							$MosPer3			='';
							$AgrPer3			='';
							$ActPer3			='';
							$DelPer3			='';
							
							
							}
?>
		<br><br><br>					
<?							
						}
?>	
		<br><br><br>					
<?							
					}
					
					
?>  

												


<?
							$MosPerz1		=	0;
					
					
					
							$queryPerz1			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$Idmenux' and Submenu = '$Idsubmenux' and Opciones = '$Idopcmenux' ";
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
                                            

										</form>
                 
                                                    
<?
}
?>    

                                                
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
		<script src="../../assets/js/libs/DataTables/jquery.dataTables.js"></script>
		<script src="../../assets/js/libs/DataTables/extras/ColVis/js/ColVis.js"></script>
		<script src="../../assets/js/libs/DataTables/extras/TableTools/media/js/TableTools.js"></script>
		<script src="../../assets/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../../assets/js/core/demo/DemoTableDynamic.js"></script> 
		<script src="../../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
