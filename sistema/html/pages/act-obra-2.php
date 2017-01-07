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
					
					
					
					
					$IdUS				=$_REQUEST['Id']; 
					
					 $queryUSERS		="SELECT* FROM Obras where Id = '$IdUS' and Muestra = 0";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
						$Idcliente			=$rowUSERS["Idcliente"];
						$Nombre				=$rowUSERS["Nombre"];
						$Fechainicio		=$rowUSERS["Fechainicio"];
						$Fechafin			=$rowUSERS["Fechafin"];
						$Ubicacion			=$rowUSERS["Ubicacion"];
						$Valor				=$rowUSERS["Valor"];
						$Utilidad			=$rowUSERS["Utilidad"];
						
						
						$Descripcion		=$rowUSERS["Descripcion"];
						$Estado				=$rowUSERS["Estado"];
						$Fechareal			=$rowUSERS["Fechareal"];
						$Usuario			=$rowUSERS["Usuariofin"];
						
						if($Estado == 1)
						{
						$ponebloqueo	=	'disabled';
						}
						$Util=($Utilidad/100);
						$UtilidadO			=($Valor*$Util);
						
						$decimales 	= explode(".",$Valor);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						
						
						if($CuantosDS == 1)
						{
						$Valor				=$Valor.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$Valor				=$Valor.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$Valor				=$Valor;	
						}
						
						
						$decimales 	= explode(".",$Utilidad);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						/*
						if($CuantosDS == 1)
						{
						$Utilidad				=$Utilidad.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$Utilidad				=$Utilidad.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$Utilidad				=$Utilidad;	
						}
						*/

						$Muestra=0;
						$queryXD		="SELECT * FROM Facturacion where Idobra = '$IdUS' and (Estado = 3 || Estado = 4)";
                        $resultXD		=mysql_query($queryXD, $id);
                                                
                        while($rowXD	=mysql_fetch_array($resultXD))
                        {
                        $Cobro 			=$rowXD["Id"];
                        $Muestra++;
						}
						$queryOL		="SELECT* FROM CuentasPagar where Idobra = '$IdUS' and (Estado = 3 || Estado = 4)";
                        $resultOL		=mysql_query($queryOL, $id);
                                                
                        while($rowOL	=mysql_fetch_array($resultOL))
                        {
                        $Pago 			=$rowOL["Id"];
                        $Muestra++;
						}
						

						
						
						
                                $queryTIP		="SELECT* FROM Clientes where Id = '$Idcliente' and Muestra = '0'  order by Nombre";
                                $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                While($rowTIP	=mysql_fetch_array($resultTIP))
                                {
								$NombreTIP		=$rowTIP["Nombre"];
								}
						
					 }
					
					
					
							$arry0 				= 	array();
							$arry1 				= 	array();
							$querys1			="SELECT* FROM Obrasprov where Idobra = '$IdUS'  and Muestra = '0' Order By Id" ;
							$results1			=mysql_query($querys1, $id);
							
							While($rows1		=mysql_fetch_array($results1))
							{
							$Proveedor1	=	$rows1["Proveedor"];	
						
							$arry0[]	=	$Proveedor1;
							$arry1[]	=	$Proveedor1;
							}
							
										if(empty($arry0))
										{
										$cosult0	 =	" and ( Id <> '')";
										}
										else
										{
										$arry0 		 = 	array_unique($arry0);
										$cosult0	 =	" and ( Id  <> ";
										$cosult0	.=	 implode(' and Id  <> ',$arry0);
										$cosult0	.=	 ')';
										}
										
										$datos	 	= implode(',', $arry1);	
					
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
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/select2/select2.css?1403937881" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/multi-select/multi-select.css?1403937882" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.css?1403937882" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/jquery-ui/jquery-ui-boostbox.css?1403937766" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1403937882" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1403937883" />
		<link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/typeahead/typeahead.css?1403937883" />
        
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


<script type="text/javascript">

function deleteOption(theSel, theIndex){ 
var selLength = theSel.length;
if(selLength>0){
theSel.options[theIndex] = null;
}
}

function moveOptions(theselfrom, theselto){

var theSelFrom=document.getElementById(theselfrom);
var theSelTo=document.getElementById(theselto);
var selLength = theSelFrom.length;
var selToLength =theSelTo.length;

count=0

if(theselfrom=="sel1"){
for(var i=0;i<theSelFrom.options.length;i++){
if(theSelFrom.options[i].selected==true){
count++
}
}

if(count+theSelTo.options.length>150){
for(var i=0;i<theSelFrom.options.length;i++){
theSelFrom.options[i].selected=false
}
return
}

}
 
for(var i=selLength-1; i>=0; i--){
if((theSelFrom.options[i].selected)){

msg=theSelFrom.options[i].text;
msgvalue=theSelFrom.options[i].value;
theSelTo.options[selToLength]=new Option(msg,msgvalue);
selToLength=theSelTo.options.length;

deleteOption(theSelFrom, i);
placeInHidden(',', 'sel2', 'hidY');
}
}

}

function placeInHidden(delim, selStr, hidStr){
var selObj = document.getElementById(selStr);
var hideObj = document.getElementById(hidStr);//hidden text box
hideObj.value = '';
for (var i=0; i<selObj.options.length; i++){ 
hideObj.value = hideObj.value =='' ? selObj.options[i].value : hideObj.value + delim + selObj.options[i].value;
}
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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Informacion de la Obra <strong>NRO. <?=$IdUS?></strong></a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
												
												<form class="form-horizontal form-validate" role="form" method="post" action="act-obra-3.php" novalidate>
                                                
                                                
													<div class="row">
                                                    
                                                    
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Tipo" class="control-label">Cliente</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                
                                                                
                                                                <select name="Cliente" id="Cliente" class="form-control select2-list" data-placeholder="Seleccione el Cliente" required <?=$ponebloqueo?>>
            
                                                                        <option value="<?=$Idcliente?>" selected><?=$NombreTIP?></option>

																		<?
                                                                        $queryTIP		="SELECT* FROM Clientes where Id <> '$Idcliente' and Muestra = '0' order by Nombre";
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
                                                    
                                                    
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Nombre" class="control-label">Obra</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre de la Obra" value="<?=$Nombre?>" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3" <?=$ponebloqueo?>>
																</div>
															</div>
														</div>
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Inicio</label>
																</div>
                                                                <div class="col-md-10">
                                                                    <div class='input-group date' id='demo-date-start'>
                                                                        <input type="text" name="Fechainicio" class="form-control" id='demo-date-inline' value="<?=$Fechainicio?>" placeholder="Fecha de inicio" required data-date-format="yyyy-mm-dd" <?=$ponebloqueo?>/>
                                                        <?
														if($Estado == 0)
														{
														?>
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <?
														}
														?>
                                                                    </div>
                                                                </div>
															</div>
														</div>
													
                                                
                                                    
                                                    

														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Fin" class="control-label">Fin</label>
																</div>
		                                                                <div class="col-md-10">
                                                                    <div class='input-group date' id='demo-date-end'>
                                                                        <input type="text" class="form-control" name="Fechafin" id='demo-date-inline' required placeholder="Fecha de entrega" value="<?=$Fechafin?>" <?=$ponebloqueo?>/>
                                                        <?
														if($Estado == 0)
														{
														?>
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <?
														}
														?>
                                                                    </div>
                                                                </div>
															</div>
														</div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <?
														if($Estado == 1)
														{
														?>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Fecha Real</label>
																</div>
                                                                <div class="col-md-10">
                                                                    <div class='input-group date' id='demo-date-start'>
                                                                        <input type="text" name="Fechainicio" class="form-control" id='demo-date-inline' value="<?=$Fechareal?>" placeholder="Fecha real de finalizacion" required data-date-format="yyyy-mm-dd" style="background-color:#EBEBEB" <?=$ponebloqueo?>/>


                                                                    </div>
                                                                </div>
															</div>
														</div>
													
                                                
                                                    
                                                    

														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Fin" class="control-label">Usuario</label>
																</div>
		                                                                <div class="col-md-10">
                                                                    <div class='input-group date' id='demo-date-end'>
                                                                        <input type="text" class="form-control" name="Fechafin" id='demo-date-inline' required placeholder="Usuario que finaliza" value="<?=$Usuario?>" <?=$ponebloqueo?> style="background-color:#EBEBEB" />
 
                                                                    </div>
                                                                </div>
															</div>
														</div>
                                                        
                                                        <?
														}
														?>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Ubicacion" class="control-label">Ubicación</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Ubicacion" id="Ubicacion" class="form-control" placeholder="Ubicación de la Obra" value="<?=$Ubicacion?>" onChange="javascript:this.value=this.value.toUpperCase();" required <?=$ponebloqueo?>>
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label">Valor</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input type="text" class="form-control dollar-mask" name="Valor" id="Valor"  placeholder="Valor de la Obra" value="<?=$Valor?>" <?=$ponebloqueo?>>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <select name="Utilidad" id="Utilidad" class="form-control select2-list" data-placeholder="Utilidad" required <?=$ponebloqueo?>>
                                                                        <option value="<?=$Utilidad?>" selected><?=$Utilidad?> %</option>
																		<?
                                                                        for ($i=0; $i<=100; $i++) { 	
                                                                        ?>
                                                                        <option value="<?=$i?>"><?=$i?> %</option>
																		<?
																		}
																		?>
                                                                </select>
                                                                </div>
                                                            </div>
														</div>

                                                        
													</div>
                                                    
                                                    
                                                    
                                                    
														
															<div class="form-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="Descripcion" class="control-label">Descripción</label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
                                                                  <textarea name="Descripcion" rows="3" required class="form-control" id="Descripcion" placeholder="Descripción de la Obra" onChange="javascript:this.value=this.value.toUpperCase();" <?=$ponebloqueo?>><?=$Descripcion?></textarea>
																</div>
															</div>
														
                                                        

													
                                                    
                                                    

                                                     
                                                     
                                                     
                                                     
                                                     
                                                        
                                                        
                                                        

                                                        
                                                        
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="col-lg-2 col-md-4 col-sm-6">
															<label for="password1" class="control-label">Proveedores</label>
														</div>
														<div class="col-lg-10 col-md-8 col-sm-6">
																			<select class="form-control" name="sel1" size="15" multiple="multiple" id ="sel1" <?=$ponebloqueo?>>
																			<?
                                                                             $queryUSERS		="SELECT* FROM Proveedores where  Muestra = 0 ".$cosult0." Order by Nombre";
                                                                             $resultUSERS		=mysql_query($queryUSERS, $id);
                                                                                                            
                                                                             While($rowUSERS	=mysql_fetch_array($resultUSERS))
                                                                             {
                                                                             $Nombre			=$rowUSERS["Nombre"];
                                                                             $Id				=$rowUSERS["Id"];
                                                                            ?>
                                                                            <option value="<?=$Id?>"><?=$Nombre?></option>

																			<?
                                                                             }
                                                                            ?>
              																</select>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="col-lg-2 col-md-4 col-sm-6" style="text-align:center;">
                                                         
                                                        <?
														if($Estado == 0)
														{
														?>

                                                            <a href="#" onClick="moveOptions('sel1','sel2');"><img src="../../assets/img/agre.png" border="0"></a>
                                                            <a href="#" onClick="moveOptions('sel2', 'sel1');"><img src="../../assets/img/rem.png" border="0"></a>
                                                        <?
														}
														?>
                                                            
														</div>
														<div class="col-lg-10 col-md-8 col-sm-6">
															<select name="sel2" size="15" class="form-control" multiple="multiple" id="sel2" <?=$ponebloqueo?>>
                                                            
															<?
                                                            $querys="SELECT* FROM Obrasprov where Idobra = '$IdUS' and Muestra = '0' Order By Id" ;
                                                            $results=mysql_query($querys, $id);
                                                            
                                                            While($rows=mysql_fetch_array($results))
                                                            {
                                                            $Proveedora	=	$rows["Proveedor"];
                                                            
                                                            $queryd="SELECT* FROM Proveedores where Id = '$Proveedora' and Muestra = '0'" ;
                                                            $resultd=mysql_query($queryd, $id);
                                                            
                                                            While($rowd=mysql_fetch_array($resultd))
                                                            {
                                                            $Nombres=	$rowd["Nombre"];
															$Ids=		$rowd["Id"];
                                                            }
                                                            ?>
                                							<option value="<?=$Ids?>"><?=$Nombres?></option>
															<?
                                                            }
                                                            ?>
                                                            
                                                            </select>
                                                            <input name="hidY" type="hidden" id="hidY" value="<?=$datos?>" />
                                                            <input name="Id" type="hidden" id="Id" value="<?=$IdUS?>" />
														</div>
													</div>
												</div>
											</div>

                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        


                                                        

                                                        
                                                        



													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="email" class="control-label"></label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
                                                        <?
														if($Estado == 0)
														{
														?>
															<button type="submit" class="btn btn-primary">Realizar Operación</button>
															<?if($Muestra==0){?>
                                                            <button type="button" data-toggle="modal" data-target="#textModala" class="btn btn-danger" $Nombre>Finalizar Obra</button>
														<?
														}
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
                    
                    
                    
                    
                    
                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                <div class="modal fade" id="textModala" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">FINALIZAR OBRA</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Realmente desea finalizar la obra: </br><strong><?=$Nombre?></strong></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" onclick="location.href='fin-obra.php?Id=<?=$IdUS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'">Confirmar</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP --> 
                                                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
 <div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Movimientos de la Obra  <strong>NRO. <?=$IdUS?></strong></a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
										  <div class="box-body style-white">
												
                                                
                                                
                                                    

                          

                                <table width="100%" border="1" class="btn-support3" style="font-size:10px; font-weight:bold; height:15px; margin-bottom:10px;" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10%" height="33">&nbsp;FECHA.</td>
                                    <td width="15%">&nbsp;MOVIMIENTO</td>
                                    <td width="35%">&nbsp;DESCRIPCIÓN</td>
                                    <td width="20%">&nbsp;NRO. FACTURA</td>
                                    <td width="10%">&nbsp;VALOR.</td>
                                    <td width="10%" align="right">&nbsp;</td>
                                  </tr>
                                </table>
                                
<?
					 $queryPAN		="SELECT * FROM CuentasPagar where Idobra = '$IdUS'";
					 $resultPAN		=mysql_query($queryPAN, $id);
													
					 while($rowPAN	=mysql_fetch_array($resultPAN))
					 {
						$Idcuenta		=$rowPAN["Id"];
						//$FechaAbono		=$rowPAN["FechaInicio"];
						$NumeroFactura	=$rowPAN["NumeroFactura"];
						//$Tipo 			="EGRESO"."&nbsp;&nbsp;&nbsp;"."| NRO. ".$Idcuenta;
						//$Observaciones 	=$rowPAN["Concepto"];
						$ValorA 		=$rowPAN["Valor"];
						$Abono 			=$rowPAN["ValorAbonado"];

						$Deuda 			=($ValorA-$Abono);

						/*
						$decimales 	= explode(".",$ValorA);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						
						if($CuantosDS == 1)
						{
						$ValorF				=$ValorA.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$ValorF				=$ValorA.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$ValorF				=$ValorA;	
						}
						*/
						
						
						$ValorA			=number_format($ValorA,0,'','.');
						$Deuda			=number_format($Deuda,0,'','.');
						
						if ($Deuda!=0) {
						
						$queryRR      		="SELECT * FROM HistorialPagos WHERE Idcuenta='$Idcuenta' AND Muestra=0";
						$resultRR 	  		=mysql_query($queryRR,$id);
						while 				($rowRR=mysql_fetch_array($resultRR))
						{
						$Idpago				=$rowRR["Id"];
						$Idff 				=$rowRR["Idcuenta"];
						$Tipo 				="EGRESO"."&nbsp;&nbsp;&nbsp;"."| NRO. ".$Idpago;
						$FechaAbono   		=$rowRR["FechaAbono"];
						$Observaciones   	=$rowRR["Observaciones"];
						$Val 				=$rowRR["Abono"];

					
?>
                                <table width="100%" class="btn-default" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> " >
                                  <tr>
                                    <td width="10%" height="33" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$FechaAbono?></td>
                                    <td width="15%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Tipo?></td>
                                    <td width="35%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Observaciones?></td>
                                    <td width="20%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$NumeroFactura?></td>
                                    <td width="10%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=number_format($Val,0,'','.')?></td>
                                    <td width="10%" align="right"> 
                                    <a href="print-abonopago.php?Idpago=<?=$Idpago?>&Id=<?=$Idff?>" target="blank"style="border:0px;"><img src="../../assets/img/add.png" border= "0" style="margin-right:5px;"></a>
                                    </td>
                                  </tr>
                                </table>                                                
                  										
<?
						}
					}
					 }
					 $queryXX 		="SELECT * FROM Facturacionmov WHERE Idobra='$IdUS'";
					 $resultXX 		=mysql_query($queryXX,$id);
					 while ($rowXX	=mysql_fetch_array($resultXX)) {
					 
					 $Idfact 		=$rowXX["Idfact"];
					 $Iva			=$rowXX["Iva"];
					 $Val 			=$rowXX["Valor"];
					 $ValorA 		=($ValorA+$Iva);
					 //$Ingreso 		=$rowXX["ValorCobrado"];

					 $Ing 			=($ValorA-$Ingreso);

					 $decimales 	= explode(".",$ValorA);
					 $CuantosS	= $decimales[1];
					 $CuantosDS	= strlen($CuantosS);
						
					 if($CuantosDS == 1)
					 {
					 $ValorF				=$ValorA.'0';	
					 }
					 elseif($CuantosDS == 0)
					 {
					 $ValorF				=$ValorA.'00';	
					 }
					 elseif($CuantosDS == 2)
					 {
					 $ValorF				=$ValorA;	
					 }

					$ValorA			=number_format($ValorA,0,'','.');
					$Ing			=number_format($Ing,0,'','.');
					$ValorP			=number_format($ValorP,0,'','.'); 
					} 
					$queryPAN		="SELECT * FROM Facturacion where Idobra = '$IdUS'";
					$resultPAN		=mysql_query($queryPAN, $id);
						
												
					 while($rowPAN	=mysql_fetch_array($resultPAN))
					 {
						$Idcuenta			=$rowPAN["Id"];
						//$FechaAbono		=$rowPAN["Fechafact"];
						$NumeroFactura		=$rowPAN["NumeroFactura"];
						//$Tipo 			="INGRESO | NRO. ".$Idcuenta;
						//$Observaciones 	=$rowPAN["Descripcion"];
						
						
					
						
						
					$queryFOX 		="SELECT * FROM HistorialCobros WHERE Idcuenta='$Idcuenta' AND Muestra=0";
					$resultFOX 		=mysql_query($queryFOX,$id);
					while ($rowFOX  =mysql_fetch_array($resultFOX)) 
					{
						$Idcobro 		=$rowFOX["Id"];
						$Idrr 			=$rowFOX["Idcuenta"];
						$FechaAbono 	=$rowFOX["FechaAbono"];
						$Tipo 			="INGRESO | NRO. ".$Idcobro;
						$Observaciones 	=$rowFOX["Observaciones"];
						$Ingreso 		=$rowFOX["Abono"];
						
					if ($Ingreso!=0) {
?>
                                <table width="100%" class="btn-default" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> " >
                                  <tr>
                                    <td width="10%" height="33" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$FechaAbono?></td>
                                    <td width="15%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Tipo?></td>
                                    <td width="35%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Observaciones?></td>
                                    <td width="20%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Idfact?></td>
                                    <td width="10%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=number_format($Ingreso,0,'','.')?></td>
                                    <td width="10%" align="right"> 
                                    <a href="print-abonocobro.php?Idpago=<?=$Idcobro?>&Id=<?=$Idrr?>" target="blank"style="border:0px;"><img src="../../assets/img/add.png" border= "0" style="margin-right:5px;"></a>
                                    </td>
                                  </tr>
                                </table>                                                
                  										
<?
					   
					  }
					 }
					}
					
							
					 $query00		="SELECT SUM(ValorCobrado) AS ING FROM Facturacion where Idobra = '$IdUS'";
					 $result00		=mysql_query($query00, $id);
													
					 while($row00	=mysql_fetch_array($result00))
					 {
						$INGRESOS		=$row00["ING"];
					 }

					 $query99		="SELECT SUM(ValorAbonado) AS ENG FROM CuentasPagar where Idobra = '$IdUS'";
					 $result99		=mysql_query($query99, $id);
													
					 while($row99	=mysql_fetch_array($result99))
					 {
						$EGRESOS		=$row99["ENG"];
					 }
					 /* $queryN		="SELECT SUM(Valor) AS INGRESOS FROM CuentasPagar where Idobra = '$IdUS'";
					 $resultN		=mysql_query($queryN, $id);
													
					 while($rowN	=mysql_fetch_array($resultN))
					 {
						$Ingpagos		=$rowN["INGRESOS"];
					 }
					 
					 $queryQ		="SELECT SUM(ValorAbonado) AS EGRESOS FROM CuentasPagar where Idobra = '$IdUS'";
					 $resultQ		=mysql_query($queryQ, $id);
													
					 while($rowQ	=mysql_fetch_array($resultQ))
					 {
						$Gaspagos		=$rowQ["EGRESOS"];
					 }

					 $EgrePagar =($Ingpagos-$Gaspagos); */
					 
					 $TOTALT			=$INGRESOS-$EGRESOS;
					 
					 //$TOTALT			=$TOTALT-$EgrePagar;
?>					  		
<br/>
                                <table width="100%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> " >
                                  <tr>
                                    <td width="10%" height="33" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;</td>
                                    <td width="15%" align="right" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;</td>
                                    <td width="55%" align="right" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;TOTAL &nbsp</td>
                                    <td width="10%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC; background-color:#D6EEC4">&nbsp;
                                      <?=number_format($TOTALT,0,'','.')?></td>
                                    <td width="10%" align="right"></td>
                                  </tr>
                                </table>                        
<br/><br/>

<?
if($UtilidadO > $TOTALT)
{
?>
												<div class="alert alert-danger">
													<a class="close" data-dismiss="alert" href="#">&times;</a>
													<h4 class="alert-heading">ATENCION!</h4>
													<p>
														Actualmente su proyecto no ofrece la ultilidad programada. La obra hoy tiene una utilidad de <strong>($<?=number_format($TOTALT,0,'','.')?>)</strong> de la programada por <strong>($<?=number_format($UtilidadO,0,'','.')?>)</strong>.<br/>
													</p>

												</div>
<?
}
elseif($UtilidadO <= $TOTALT)
{
?>
                                                
                                                
												<div class="alert alert-success">
													<a class="close" data-dismiss="alert" href="#">&times;</a>
													<h4 class="alert-heading">ATENCION!</h4>
													<p>
														Actualmente su proyecto ofrece la ultilidad programada. La obra hoy tiene una utilidad de <strong>($<?=number_format($TOTALT,0,'','.')?>)</strong> de la programada por <strong>($<?=number_format($UtilidadO,0,'','.')?>)</strong>.<br/>
													</p>
												</div>
<?
}
?>
<br/><br/><br/>  
                                                
                                                
											</div><!--end .box-body -->
										</div><!--end .tab-pane -->
										<!-- END PROFILE EDITOR -->

									</div><!--end .tab-content -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div><!--end .row -->
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
        
		<script src="../../assets/js/libs/select2/select2.min.js"></script>
		<script src="../../assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
		<script src="../../assets/js/libs/multi-select/jquery.multi-select.js"></script>
		<script src="../../assets/js/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../../assets/js/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
		<script src="../../assets/js/core/demo/DemoFormComponents.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->

<script>        
$('#callbacks').multiSelect({
  afterSelect: function(values){
    alert("Select value: "+values);
	placeInHidden(',', 'values', 'proveedor');
  },
  afterDeselect: function(values){
    alert("Deselect value: "+values);
  }
});
</script> 
	</body>
</html>
