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


					$Idfact				=$_REQUEST['Id']; 
				
				
					$queryTITMEN		="SELECT* FROM Menusub WHERE Id = ".$_REQUEST["Idsubmenu"] ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$NombreTITMEN		=$rowTITMEN["Nombre"];
					}
					
					

					
					$LineaMenuS			=$NombreTITMEN;
					
					$Idcliente			=$_REQUEST["Idcliente"];
					
					$queryTITMEN		="SELECT* FROM Clientes WHERE Id = '$Idcliente'" ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$Nombreclien		=$rowTITMEN["Nombre"];
					$Nitclien			=$rowTITMEN["Cedula"];
					$Ciudadclien		=$rowTITMEN["Ciudad"];
					$Dirclien			=$rowTITMEN["Dir"];
					}
					
					$queryTITMEN		="SELECT* FROM Facturacion where Id <> '$Idfact' order by Fechafact ASC" ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$Fechafact			=$rowTITMEN["Fechafact"];
					}
					
					$horaactual 		=date("Y-m-d");
					
					$queryRE			="SELECT DATEDIFF('$horaactual','$Fechafact') AS diferencia";
					$resultRE			=mysql_query($queryRE, $id);
							
					while($rowRE		=mysql_fetch_array($resultRE))
					{
					$diferencia			=$rowRE["diferencia"];
					}
					
					if(empty($diferencia) || $diferencia == 0)
					{
					$nuevafecha			=-90;	
					}
					else
					{
					$fecha 				=date('Y-m-d');
					$nuevafecha 		=strtotime ( '-'.$diferencia.' day' , strtotime ( $fecha ) ) ;
					$nuevafecha 		=date ( 'Y-m-d' , $nuevafecha );
					
					
					$nuevafecha			=substr($nuevafecha, -2);
					$nuevafecha			=(string)(int)$nuevafecha;
					}
					
					
					
					
					
					
					
					
					
					 $queryUSERS		="SELECT* FROM Facturacion where Id = '$Idfact' and Muestra = 0";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
						$Razon				=$rowUSERS["Razon"];
						$Nit				=$rowUSERS["Nit"];
						$Direccion			=$rowUSERS["Direccion"];
						$Ciudad				=$rowUSERS["Ciudad"];
						$Fechafact			=$rowUSERS["Fechafact"];
						$Fechalim			=$rowUSERS["Fechalim"];
						$Descripcion		=$rowUSERS["Descripcion"];
						$Valor				=$rowUSERS["Valor"];
						$Total				=$rowUSERS["Total"];
						$Iva				=$rowUSERS["Iva"];
						$Retencion 			=$rowUSERS["Retencion"];
						$ReteICA 			=$rowUSERS["ReteICA"];
						$Deuda 				=$rowUSERS["ValorCobrado"];
						$Estado				=$rowUSERS["Estado"];
						$Usuario			=$rowUSERS["Usuario"];
						$Fecha				=$rowUSERS["Fecha"];
						$Estado				=$rowUSERS["Estado"];
						$FechaAnulacion		=$rowUSERS["FechaAnulacion"];
						$MotivoAnulacion	=$rowUSERS["MotivoAnulacion"];
						$UsuarioAnula 	 	=$rowUSERS["UsuarioAnula"];
						
						if($Estado == 1 || $Estado == 2)
						{
						$ponebloqueo	=	'disabled';
						}
						
						$queryQQ		="SELECT * FROM Retenciones WHERE Valor = '$Retencion'";
						$resultQQ		=mysql_query($queryQQ, $id);
						
					    while ($rowQQ   =mysql_fetch_array($resultQQ)) {
					    $NombreRetencion=$rowQQ["Nombre"];
					    }
					    $queryKK		="SELECT * FROM Reteica WHERE Valor = '$ReteICA'";
						$resultKK		=mysql_query($queryKK, $id);
						
					    while ($rowKK   =mysql_fetch_array($resultKK)) {
					    $NombreReteica 	=$rowKK["Nombre"];
					    }

					    /*
						$querySAS		="SELECT * FROM Retenciones WHERE Valor = '$ReteICA'";
						$resultSAS		=mysql_query($querySAS, $id);
						
					    while ($rowSAS   =mysql_fetch_array($resultSAS)) {
					    $NombreReteICA	=$rowSAS["Nombre"];
					    } */

						$queryPM		="SELECT * FROM Facturacionmov WHERE Idfact = '$Idfact'";
						$resultPM		=mysql_query($queryPM, $id);
						
						while ($rowPM	=mysql_fetch_array($resultPM)) {
						$Idobra 		=$rowPM["Idobra"];
						}

						$queryWW		="SELECT * FROM Obras WHERE Id = '$Idobra'";
						$resultWW		=mysql_query($queryWW, $id);
						
					    while ($rowWW   =mysql_fetch_array($resultWW)) {
					    $NombreObra     =$rowWW["Nombre"];
					    }

					    $query11		="SELECT * FROM Usuarios WHERE Cedula = '$UsuarioAnula'";
						$result11		=mysql_query($query11, $id);
						
					    while ($row11   =mysql_fetch_array($result11)) {
					    $NombreUsuario  =$row11["Nombre"];
					    }
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


<script language="JavaScript" src="js/NumberFormat.js"></script>

 <SCRIPT LANGUAGE="JavaScript">
function puntitos(donde,caracter)
{
pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
valor = donde.value
largo = valor.length
crtr = true
if(isNaN(caracter) || pat.test(caracter) == true)
	{
	if (pat.test(caracter)==true) 
		{caracter = "\\" + caracter}
	carcter = new RegExp(caracter,"g")
	valor = valor.replace(carcter,"")
	donde.value = valor
	crtr = false
	}
else
	{

	var nums = new Array()
	cont = 0
	for(m=0;m<largo;m++)
		{
		if(valor.charAt(m) == "." || valor.charAt(m) == " ")
			{continue;}
		else{
			nums[cont] = valor.charAt(m)
			cont++
			}
		
		}
	}


var cad1="",cad2="",tres=0
if(largo > 3 && crtr == true)
	{
	for (k=nums.length-1;k>=0;k--)
		{
		cad1 = nums[k]
		cad2 = cad1 + cad2
		tres++
		if((tres%3) == 0)
			{
			if(k!=0){
				cad2 = "." + cad2
				}
			}
		}
	 donde.value = cad2
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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Modificar Factura Nro. <?=$Idfact?></a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
											<div class="box-body style-white">
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
                                            
                                            
                                            
                                            
                                                        <?
                                                        if($MosPerz1 == 1)
														{
														?>
												<form class="form-horizontal form-validate" role="form" method="post" id="form1" name="form1" action="act-factura-3.php" novalidate>
                                                        <?
														}
														else
														{
														?>
												<form class="form-horizontal form-validate" role="form" method="post" id="form1" name="form1" novalidate>
                                                        <?
														}
														?>
												
                                                
                                                
													<div class="row">
                                                    
                                                    
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Tipo" class="control-label">Cliente</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                              	<input name="Id" id="Id" type="hidden" value="<?=$Idfact?>">
                                                              	<input name="Idcliente" id="Idcliente" type="hidden" value="<?=$Idcliente?>">
                                                              	<input name="Nombre" id="Nombre" type="hidden" value="<?=$Nombreclien?>">
                                                                <select name="jumpMenu" id="jumpMenu" class="form-control" onChange="MM_jumpMenu('parent',this,0)"required  data-placeholder="Seleccione el Cliente" style="background-color:#CCC" <?=$ponebloqueo?>>
            
                                                                        <?
                                                                        if(!empty($Idcliente))
																		{
																		?>
                                                                  <option value="act-factura-2.php?Idcliente=<?=$Idcliente?>&Id=<?=$Idfact?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>" selected><?=$Nombreclien?></option>
                                                                        <?
																		}
																		else
																		{
																		?>
                                                                  <option value="act-factura-2.php?Id=<?=$Idfact?>" selected>Seleccione el Cliente</option>
                                                                        <?
																		}
																		
                                                                        $queryTIP		="SELECT* FROM Clientes where Muestra = 0 and Id <> '$Idcliente' order by Nombre";
                                                                        $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                                                        While($rowTIP	=mysql_fetch_array($resultTIP))
                                                                        {
                                                                        $IdTIP			=$rowTIP["Id"];
																		$NombreTIP		=$rowTIP["Nombre"];
                                                                        ?>
                                                                  <option value="act-factura-2.php?Idcliente=<?=$IdTIP?>&Id=<?=$Idfact?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>"><?=$NombreTIP?></option>
																		<?
																		}
																		?>

                                                                </select>
																</div>
															</div>
														</div>
                                                    
<?
if(!empty($Idcliente))
{
?>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Nit" class="control-label">Nit</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Nit" id="Nit" class="form-control" placeholder="Nit del Cliente" value="<?=$Nitclien?>" required readonly style="background-color: #CCC" <?=$ponebloqueo?>>
																</div>
															</div>
														</div>
                                                        
                                                     </div>
<?
}
?>
                                                     
                                                     <div class="row">   
                                                        
<?
if(!empty($Idcliente))
{
?>


														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Direccion" class="control-label">Direccion</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Direccion del Cliente" value="<?=$Dirclien?>" required readonly style="background-color:#CCC" <?=$ponebloqueo?>>
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                                    <label class="control-label">Ciudad</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="Ciudad" id="Ciudad" value ="<?=$Ciudadclien?>" placeholder="Ciudad del Cliente" required readonly style="background-color:#CCC" <?=$ponebloqueo?>>
                                                                </div>
                                                            </div>
														</div>












                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Fecha Factura</label>
																</div>
                                                                
                                                                <div class="col-md-10">
                                                                
														<div class='input-group date' id='demo-date-start'>
															<input name="Fechafact" type="text" required class="form-control" id="Fechafact" value="<?=$Fechafact?>" <?=$ponebloqueo?>/>
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
																	<label for="Fin" class="control-label">Vencimiento</label>
																</div>
		                                                                <div class="col-md-10">
														<div class='input-group date' id='demo-date-end'>
															<input name="Fechalim" type="text" required class="form-control" id="Fechalim" value="<?=$Fechalim?>" <?=$ponebloqueo?>/>
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
                                                        <div class="row">
                                                        	<div class="col-sm-12">
                                                        		<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Tipo" class="control-label">Obra</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                <select name="Idobra" id="Idobra" class="form-control" required  data-placeholder="Seleccione una Obra">
                                                                        <option value="<?=$Idobra?>" selected><?=$NombreObra?></option>
                                                                        <?
                                                                        $queryTIP		="SELECT * FROM Obras where Idcliente='$Idcliente' AND Id <> '$Idobra' AND Muestra = 0 order by Nombre";
                                                                        $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                                                        while($rowTIP	=mysql_fetch_array($resultTIP))
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
                                                        	
                                                        	<div class="col-sm-3">
															<div class="form-group">
																<div class="col-sm-4">
																	<label for="Retencion" class="control-label"> Rte. Fuente</label>
																</div>
																<div class="col-sm-8">
                                                                	<!-- <input type="text" name="Retencion" id="Retencion" class="form-control" placeholder="% de Retención"  onKeyPress="return isNumberKey(event);" required> -->
																	<select name="Retencion" id="Retencion" onselect="descuento()" onchange="descuento()" class="form-control select2-list" data-placeholder="Seleccione el tipo de cuenta" required <?=$ponebloqueo?>>
            
                                                                        <option value="<?=$Retencion?>" selected><?=$NombreRetencion?></option>

																		<?
                                                                        $queryR1		="SELECT * FROM Retenciones WHERE Muestra=0 AND Valor <> '$Retencion' order by Nombre";
                                                                        $resultR1		=mysql_query($queryR1, $id);
                                                                        
                                                                        while($rowR1	=mysql_fetch_array($resultR1))
                                                                        {
                                                                        $IdR1			=$rowR1["Id"];
																		$NombreR1		=$rowR1["Nombre"];
																		$ValorR1 		=$rowR1["Valor"];
                                                                        ?>
                                                                        <option value="<?=$ValorR1?>"><?=$NombreR1?></option>
																		<?
																		}
																		?>
                                                                </select>
																</div>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="form-group">
																<div class="col-sm-4">
																	<label for="ReteICA" class="control-label">Rte. ICA </label>
																</div>
																<div class="col-sm-8">
																	<select name="ReteICA" id="ReteICA" onselect="descuento()" onchange="descuento()" class="form-control select2-list" data-placeholder="Seleccione el tipo de cuenta" required <?=$ponebloqueo?>>
            
                                                                        <option value="<?=$ReteICA?>" selected><?=$NombreReteica?></option>

																		<?
                                                                        $queryR2		="SELECT * FROM Reteica WHERE Muestra=0 AND Valor <> '$ReteICA' order by Nombre";
                                                                        $resultR2		=mysql_query($queryR2, $id);
                                                                        
                                                                        while($rowR2	=mysql_fetch_array($resultR2))
                                                                        {
                                                                        $IdR2			=$rowR2["Id"];
																		$NombreR2		=$rowR2["Nombre"];
																		$ValorR2 		=$rowR2["Valor"];
                                                                        ?>
                                                                        <option value="<?=$ValorR2?>"><?=$NombreR2?></option>
																		<?
																		}
																		?>
                                                                </select>
																</div>
															</div>
														</div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        
                                                        
                                                        
	

                                                        
													
													
                                                    
														
															<div class="form-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="Descripcion" class="control-label">Detalles</label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
                                                                  <textarea name="Descripcion" rows="3" required class="form-control" id="Descripcion" placeholder="Detalles de la Factura" onChange="javascript:this.value=this.value.toUpperCase();" <?=$ponebloqueo?>><?=$Descripcion?></textarea>
																	<br>
																</div>
															</div>

														
                                                        
<div class="row"> 
													
                        <div class="control-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="" class="control-label"></label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
                          

                                <table width="100%" border="1" class="btn-support3" style="font-size:10px; font-weight:bold; height:15px; margin-bottom:10px;" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10%" height="33">&nbsp;CANT.</td>
                                    <td width="55%">&nbsp;DESCRIPCIÓN</td>
                                    <td width="10%">&nbsp;V/UNID.</td>
                                    <td width="10%" align="right">
<?
						if($Estado == 0)
						{
?>
                                    <a id="agregarCampo" href="#" style="border:0px;"><img src="../../assets/img/add.png" border= "0" style="margin-right:5px;"></a>
<?
						}
?>
                                    </td>
                                  </tr>
                                </table>
                          										</div>
                        </div> 

                                                     
                                                     
                                                     
                                                     
						<div class="control-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="" class="control-label"></label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
																	<div id="contenedor">
<?
							$cont				=0;
							$queryPerz1			="SELECT* FROM Facturacionmov where Idfact = '$Idfact' order by Id";
							$resultPerz1		=mysql_query($queryPerz1, $id);
							
							while($rowPerz1		=mysql_fetch_array($resultPerz1))
							{
							$Cant			=$rowPerz1["Cant"];
							$Idobra			=$rowPerz1["Idobra"];
							$Obra			=$rowPerz1["Obra"];
							$Descripcion	=$rowPerz1["Descripcion"];
							$Neto			=$rowPerz1["Neto"];
							$Valor			=$rowPerz1["Valor"];
							
							
							$queryTITMEN		="SELECT COUNT(*) AS TOTAL FROM Obras WHERE Idcliente = '$Idcliente' and Id = '$Idobra'" ;
							$resultTITMEN		=mysql_query($queryTITMEN, $id);
							
							While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
							{
							$TOTALOBRA			=$rowTITMEN["TOTAL"];
							}
							
							if($TOTALOBRA == 0)
							{
							$Idobra			='';
							$Obra			='';	
							}
							
							
							$Neto			=number_format($Neto,0,'','.');
							$Valor			=number_format($Valor,0,'','.');
							
							$cont++;

?>                          



    <div class="added">
                                <table width="100%" border="0" style="font-size:11px; border-color:#E4E4E4" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10%"><input type="text" name="cant<?=$cont?>" id="cant<?=$cont?>" placeholder="Cantidad" value="<?=$Cant?>" style="width:99%; font-size:11px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" required <?=$ponebloqueo?>/></td>
                                    <td width="55%"><input type="text" name="descri<?=$cont?>" id="descri<?=$cont?>" placeholder="Descripcion" value="<?=$Descripcion?>" style="width:99%; font-size:11px;" onChange="javascript:this.value=this.value.toUpperCase();" required <?=$ponebloqueo?>/></td>
                                    <td width="10%"><input type="text" name="vlr<?=$cont?>" id="vlr<?=$cont?>" required placeholder="V/Unid" value="<?=$Neto?>"  style="width:99%; font-size:11px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" <?=$ponebloqueo?>/></td>
                                    <td width="10%" align="right">
<?
						if($Estado == 0)
						{
?>
                                    <a href="#" class="borrar"><img src="../../assets/img/delete.png" border = "0" style="margin-right:5px;"></a>
<?
						}
?>
                                    </td>
                                  </tr>
                                </table>






    
        
        
    </div>
<?
							}
?>
    
</div>
																</div>
                          
                                
                      </div> 
                                                        
                                                        

                                                        
                                                         
<?if ($Estado==2) { ?>
													<br>
													<span>&nbsp;<br></span>
															<div class="col-sm-12">
															<div class="form-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="MotivoAnulacion" class="control-label">Motivo</label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
                                                                  <textarea name="MotivoAnulacion" rows="3" required class="form-control" id="MotivoAnulacion" placeholder="MotivoAnulacion" onChange="javascript:this.value=this.value.toUpperCase();" <?=$ponebloqueo?>> <?=$MotivoAnulacion?> 

FECHA ANULACIÓN: <?=$FechaAnulacion?>&nbsp;&nbsp;|&nbsp;&nbsp;USUARIO: <?=$NombreUsuario?></textarea>
																</div>
															</div>
														</div>
                                                    	
                                                    	<? } ?>
                                                        
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        


                                                        

                                                        
                                                        



													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="email" class="control-label"></label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
                                                        <?
                                                        if($MosPerz1 == 1)
														{
														?>
															<br/><br/>
<?
						if($Estado == 0)
						{
?>
                                                            <button type="submit" id="enviar" class="btn btn-primary">Realizar Modificación</button> 
                                                            <button type="button" id="visualizar" class="btn btn-success" onClick="window.open('print-factura.php?Id=<?=$Idfact?>&Estado=<?=$Estado?>');">Visualizar</button> 
                                                            <button type="button" data-toggle="modal" data-target="#textModala" class="btn btn-danger" $Nombre>Finalizar Factura</button>
<?
						}
						elseif($Estado == 1)
						{
						
?>
															<button type="button" id="visualizar" class="btn btn-success" onClick="window.open('print-factura.php?Id=<?=$Idfact?>&Estado=<?=$Estado?>');">Ver Factura Finalizada</button> 
															<!-- <input name="Eliminar" type="button" class="btn btn-danger" value=" ANULAR "  style="width:100px;" data-toggle="modal" data-target="#textModal<?=$Idfact?>" data-placement="top"> -->
<?
						}
						elseif($Estado == 2)
						{
						
?>
															<button type="button" id="visualizar" class="btn btn-success" onClick="window.open('print-factura.php?Id=<?=$Idfact?>&Estado=<?=$Estado?>');">Ver Factura Anulada</button> 
<?
						}
						elseif($Estado == 4 || $Estado == 3)
						{
						
?>
															<button type="button" id="visualizar" class="btn btn-success" onClick="window.open('print-factura.php?Id=<?=$Idfact?>&Estado=<?=$Estado?>');">Ver Factura</button> 
<?
						}
?> 
															<input name="Volver" type="button" class="btn btn-default" value="Volver"  onClick="location.href='act-factura.php?Idsubmenu=<?=$_REQUEST["Idsubmenu"]?>&Idmenu=<?=$_REQUEST["Idmenu"]?>&Idopcmenu=<?=$_REQUEST["Idopcmenu"]?>'">
														</div>
													</div>
                                                    
                                                    
<?
														}
?>
                                                    
                                                    

												</form>
<?
}
?>
                                                
                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                <div class="modal fade" id="textModala" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">Factura Nro. <?=$Idfact?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Realmente desea finalizar esta factura?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="button" class="btn btn-success" onclick="location.href='fin-factura.php?Id=<?=$Idfact?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>'">Confirmar</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP -->
                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                <div class="modal fade" id="textModal<?=$Idfact?>" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">NRO. <?=$Idfact?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Realmente desea anular esta factura?</p>
                                                             	<form action='eli-factura.php?Id=<?=$Idfact?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>' method="post">
																<div class="col-lg-11 col-md-10 col-sm-9">			
                                                                  <textarea name="MotivoAnulacion" rows="3" required class="form-control" id="MotivoAnulacion" placeholder="Motivo anulacion" onChange="javascript:this.value=this.value.toUpperCase();"></textarea>
																	<br>
																</div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-success">Confirmar</button>
                                                            	</form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END LARGE TEXT MODAL MARKUP -->
                                                
                                                
<?if($Deuda!=0){?>                                              
<div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Movimientos de la factura  <strong>NRO. <?=$Idfact?></strong></a></li>
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
					 /* $queryXX 		="SELECT * FROM Facturacionmov WHERE Idobra='$IdUS'";
					 $resultXX 		=mysql_query($queryXX,$id);
					 while ($rowXX	=mysql_fetch_array($resultXX)) {
					 
					 $Idfact 		=$rowXX["Idfact"]; */


					 $queryPAN		="SELECT * FROM Facturacion where Id = '$Idfact'";
					 $resultPAN		=mysql_query($queryPAN, $id);
													
					 while($rowPAN	=mysql_fetch_array($resultPAN))
					 {
						$Idcuenta		=$rowPAN["Id"];
						$Idss 			=$rowPAN["Idcuenta"];
						$FechaAbono		=$rowPAN["Fechafact"];
						$NumeroFactura	=$rowPAN["NumeroFactura"];
						$Tipo 			="INGRESO | NRO. ".$Idcuenta;
						$Observaciones 	=$rowPAN["Descripcion"];
						$ValorA 		=$rowPAN["Valor"];
						$Ingreso 		=$rowPAN["ValorCobrado"];

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
						
						if ($Ingreso!=0) {
						
						
						

?>
                                <table width="100%" class="btn-default" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> " >
                                  <tr>
                                    <td width="10%" height="33" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$FechaAbono?></td>
                                    <td width="15%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Tipo?></td>
                                    <td width="35%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Observaciones?></td>
                                    <td width="20%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$NumeroFactura?></td>
                                    <td width="10%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=number_format($Ingreso,0,'','.')?></td>
                                    <td width="10%" align="right"> 
                                    <a href="print-abonocobro.php?Idpago=<?=$Idcuenta?>&Id=<?=$Idfact?>" target="blank"style="border:0px;"><img src="../../assets/img/add.png" border= "0" style="margin-right:5px;"></a>
                                    </td>
                                  </tr>
                                </table>                                                
                  										
<?
						}
					 }
					

					 $query00		="SELECT SUM(ValorCobrado) AS ING FROM Facturacion where Idcliente = '$Idcliente'";
					 $result00		=mysql_query($query00, $id);
													
					 while($row00	=mysql_fetch_array($result00))
					 {
						$INGRESOS		=$row00["ING"];
					 }

					 $queryN		="SELECT SUM(Valor) AS INGRESOS FROM CuentasPagar where Idobra = '$IdUS'";
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

					 $EgrePagar =($Ingpagos-$Gaspagos);

					 
					 $TOTALT			=$TOTALT+$INGRESOS;
					 $TOTALT			=$TOTALT-$EgrePagar;
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
<!--
<br/><br/>

<?
//if($UtilidadO > $TOTALT)
//{
?>
												<div class="alert alert-danger">
													<a class="close" data-dismiss="alert" href="#">&times;</a>
													<h4 class="alert-heading">ATENCION!</h4>
													<p>
														Actualmente su proyecto no ofrece la ultilidad programada. La obra hoy tiene una utilidad de <strong>($<?=number_format($TOTALT,0,'','.')?>)</strong> de la programada por <strong>($<?=number_format($UtilidadO,0,'','.')?>)</strong>.<br/>
													</p>

												</div>
<?
//}
//elseif($UtilidadO <= $TOTALT)
//{
?>
                                                
                                                
												<div class="alert alert-success">
													<a class="close" data-dismiss="alert" href="#">&times;</a>
													<h4 class="alert-heading">ATENCION!</h4>
													<p>
														Actualmente su proyecto ofrece la ultilidad programada. La obra hoy tiene una utilidad de <strong>($<?=number_format($TOTALT,0,'','.')?>)</strong> de la programada por <strong>($<?=number_format($UtilidadO,0,'','.')?>)</strong>.<br/>
													</p>
												</div>
<?
// }
?>
<br/><br/><br/>  -->
                                                
                                                </div>
											</div><!--end .box-body -->
										</div><!--end .tab-pane -->
										<!-- END PROFILE EDITOR -->

									</div><!--end .tab-content -->
								</div><!--end .box -->
							</div><!--end .col-lg-12 -->
						</div><!--end .row -->
					</div>
<?}?>



                                                
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



<script type="text/javascript">
;(function ($) {

    var dpgId = 0,

    DateTimePicker = function (element, options) {
        var defaults = {
            pickDate: true,
            pickTime: false,
            startDate: moment({ d: <?=$nuevafecha?> }),
            endDate: moment().add(50, "y"),
			dateFormat: 'yyyy-mm-dd',
            collapse: true,
            language: "es",
            defaultDate: "",
            disabledDates: []
        },

        picker = this,
        
        init = function () {

			var icon = false, i, dDate;
			picker.options = $.extend({}, defaults, options);
			if (!(picker.options.pickTime || picker.options.pickDate))
                throw new Error('Must choose at least one picker');
			
			picker.id = dpgId++;
			moment.lang(picker.options.language);
            picker.date = moment();
            picker.element = $(element);
            picker.unset = false;
            picker.isInput = picker.element.is('input');
            picker.component = false;

            if (picker.element.hasClass('input-group'))
                picker.component = picker.element.find('.input-group-addon');

            picker.format = picker.options.format;
            if (!picker.format) {
                if (picker.isInput) picker.format = picker.element.data('format');
                else picker.format = picker.element.find('input').data('format');
                if (!picker.format) picker.format = (picker.options.pickDate ? 'L' : '');
                picker.format += (picker.options.pickTime ? ' LT' : '');
            }

            if (picker.component) icon = picker.component.find('span');

            if (picker.options.pickTime) {
                if (icon && icon.length) {
                    picker.timeIcon = icon.data('time-icon');
                    picker.upIcon = icon.data('up-icon');
                    picker.downIcon = icon.data('down-icon');
                }
                if (!picker.timeIcon) picker.timeIcon = 'glyphicon glyphicon-time';
                if (!picker.upIcon) picker.upIcon = 'glyphicon glyphicon-chevron-up';
                if (!picker.downIcon) picker.downIcon = 'glyphicon glyphicon-chevron-down';
                if (icon) icon.addClass(picker.timeIcon);
            }
            if (picker.options.pickDate) {
                if (icon && icon.length) picker.dateIcon = icon.data('date-icon');
                if (!picker.dateIcon) picker.dateIcon = 'glyphicon glyphicon-calendar';
                if (icon) {
                    icon.removeClass(picker.timeIcon);
                    icon.addClass(picker.dateIcon);
                }
            }

            picker.widget = $(getTemplate(picker.timeIcon, picker.upIcon, picker.downIcon, picker.options.pickDate, picker.options.pickTime, picker.options.collapse)).appendTo('body');
            picker.minViewMode = picker.options.minViewMode || picker.element.data('date-minviewmode') || 0;
            if (typeof picker.minViewMode === 'string') {
                switch (picker.minViewMode) {
                    case 'months':
                        picker.minViewMode = 1;
                        break;
                    case 'years':
                        picker.minViewMode = 2;
                        break;
                    default:
                        picker.minViewMode = 0;
                        break;
                }
            }
            picker.viewMode = picker.options.viewMode || picker.element.data('date-viewmode') || 0;
            if (typeof picker.viewMode === 'string') {
                switch (picker.viewMode) {
                    case 'months':
                        picker.viewMode = 1;
                        break;
                    case 'years':
                        picker.viewMode = 2;
                        break;
                    default:
                        picker.viewMode = 0;
                        break;
                }
            }

            for (i in picker.options.disabledDates) {
                dDate = picker.options.disabledDates[i];
                dDate = moment(dDate);
                //if this is not a valid date then set it to the startdate -1 day so it's disabled.
                if (!dDate.isValid) dDate = moment(startDate).subtract(1, "day").format("L");
                picker.options.disabledDates[i] = dDate.format("L");
            }

            picker.startViewMode = picker.viewMode;
            picker.setStartDate(picker.options.startDate || picker.element.data('date-startdate'));
            picker.setEndDate(picker.options.endDate || picker.element.data('date-enddate'));
            fillDow();
            fillMonths();
            fillHours();
            fillMinutes();
            update();
            showMode();
            attachDatePickerEvents();
            if (picker.options.defaultDate !== "") picker.setValue(picker.options.defaultDate);
        },

        place = function () {
            var position = 'absolute',
            offset = picker.component ? picker.component.offset() : picker.element.offset(), $window = $(window);
            picker.width = picker.component ? picker.component.outerWidth() : picker.element.outerWidth();
            offset.top = offset.top + picker.element.outerHeight();

            //if (offset.top + picker.widget.height() > $window.height()) offset.top = offset.top - (picker.widget.height() + picker.height + 10);

            if (picker.options.width !== undefined) {
                picker.widget.width(picker.options.width);
            }

            if (picker.options.orientation === 'left') {
                picker.widget.addClass('left-oriented');
                offset.left = offset.left - picker.widget.width() + 20;
            }

            if (isInFixed()) {
                position = 'fixed';
                offset.top -= $window.scrollTop();
                offset.left -= $window.scrollLeft();
            }

            if ($window.width() < offset.left + picker.widget.outerWidth()) {
                offset.right = $window.width() - offset.left - picker.width;
                offset.left = 'auto';
                picker.widget.addClass('pull-right');
            } else {
                offset.right = 'auto';
                picker.widget.removeClass('pull-right');
            }

            picker.widget.css({
                position: position,
                top: offset.top,
                left: offset.left,
                right: offset.right
            });
        },

        notifyChange = function () {
            picker.element.trigger({
                type: 'change.dp',
                date: picker.getDate()
            });
        },
		
		notifyError = function(date){
			picker.element.trigger({
				type: 'error.dp',
				date: date
			});
		},

        update = function (newDate) {
			moment.lang(picker.options.language);
            var dateStr = newDate;
            if (!dateStr) {
                if (picker.isInput) {
                    dateStr = picker.element.val();
                } else {
                    dateStr = picker.element.find('input').val();
                }
                if (dateStr) picker.date = moment(dateStr, picker.format);
                if (!picker.date) picker.date = moment();
            }
            picker.viewDate = moment(picker.date).startOf("month");
            fillDate();
            fillTime();
        },

		fillDow = function () {
			moment.lang(picker.options.language);
			var dowCnt = moment().weekday(0).weekday(), html = $('<tr>'), weekdaysMin = moment.weekdaysMin();
            while (dowCnt < moment().weekday(0).weekday() + 7) {
                html.append('<th class="dow">' + weekdaysMin[(dowCnt++) % 7] + '</th>');
            }
            picker.widget.find('.datepicker-days thead').append(html);
        },

        fillMonths = function () {
			moment.lang(picker.options.language);
            var html = '', i = 0, monthsShort = moment.monthsShort();
			while (i < 12) {
                html += '<span class="month">' + monthsShort[i++] + '</span>';
            }
            picker.widget.find('.datepicker-months td').append(html);
        },

        fillDate = function () {
			moment.lang(picker.options.language);
            var year = picker.viewDate.year(),
                month = picker.viewDate.month(),
                startYear = picker.options.startDate.year(),
                startMonth = picker.options.startDate.month(),
                endYear = picker.options.endDate.year(),
                endMonth = picker.options.endDate.month(),
                prevMonth, nextMonth, html = [], row, clsName, i, days, yearCont, currentYear, months = moment.months();

            picker.widget.find('.datepicker-days').find('.disabled').removeClass('disabled');
            picker.widget.find('.datepicker-months').find('.disabled').removeClass('disabled');
            picker.widget.find('.datepicker-years').find('.disabled').removeClass('disabled');

            picker.widget.find('.datepicker-days th:eq(1)').text(
                months[month] + ' ' + year);

            prevMonth = moment(picker.viewDate).subtract("months", 1);
            days = prevMonth.daysInMonth();
            prevMonth.date(days).startOf('week');
            if ((year == startYear && month <= startMonth) || year < startYear) {
                picker.widget.find('.datepicker-days th:eq(0)').addClass('disabled');
            }
            if ((year == endYear && month >= endMonth) || year > endYear) {
                picker.widget.find('.datepicker-days th:eq(2)').addClass('disabled');
            }

            nextMonth = moment(prevMonth).add(42, "d");
            while (prevMonth.isBefore(nextMonth)) {
                if (prevMonth.weekday() === moment().startOf('week').weekday()) {
                    row = $('<tr>');
                    html.push(row);
                }
                clsName = '';
                if (prevMonth.year() < year || (prevMonth.year() == year && prevMonth.month() < month)) {
                    clsName += ' old';
                } else if (prevMonth.year() > year || (prevMonth.year() == year && prevMonth.month() > month)) {
                    clsName += ' new';
                }
                if (prevMonth === picker.viewDate) {
                    clsName += ' active';
                }
                if ((moment(prevMonth).add(1, "d") <= picker.options.startDate) || (prevMonth > picker.options.endDate) || isInDisableDates(prevMonth)) {
                    clsName += ' disabled';
                }
                row.append('<td class="day' + clsName + '">' + prevMonth.date() + '</td>');
                prevMonth.add(1, "d");
            }
            picker.widget.find('.datepicker-days tbody').empty().append(html);
            currentYear = moment().year(), months = picker.widget.find('.datepicker-months')
				.find('th:eq(1)').text(year).end().find('span').removeClass('active');
            if (currentYear === year) {
                months.eq(moment().month()).addClass('active');
            }
            if (currentYear - 1 < startYear) {
                picker.widget.find('.datepicker-months th:eq(0)').addClass('disabled');
            }
            if (currentYear + 1 > endYear) {
                picker.widget.find('.datepicker-months th:eq(2)').addClass('disabled');
            }
            for (i = 0; i < 12; i++) {
                if ((year == startYear && startMonth > i) || (year < startYear)) {
                    $(months[i]).addClass('disabled');
                } else if ((year == endYear && endMonth < i) || (year > endYear)) {
                    $(months[i]).addClass('disabled');
                }
            }

            html = '';
            year = parseInt(year / 10, 10) * 10;
            yearCont = picker.widget.find('.datepicker-years').find(
                'th:eq(1)').text(year + '-' + (year + 9)).end().find('td');
            picker.widget.find('.datepicker-years').find('th').removeClass('disabled');
            if (startYear > year) {
                picker.widget.find('.datepicker-years').find('th:eq(0)').addClass('disabled');
            }
            if (endYear < year + 9) {
                picker.widget.find('.datepicker-years').find('th:eq(2)').addClass('disabled');
            }
            year -= 1;
            for (i = -1; i < 11; i++) {
                html += '<span class="year' + (i === -1 || i === 10 ? ' old' : '') + (currentYear === year ? ' active' : '') + ((year < startYear || year > endYear) ? ' disabled' : '') + '">' + year + '</span>';
                year += 1;
            }
            yearCont.html(html);
        },

        fillHours = function () {
            var table = picker.widget.find('.timepicker .timepicker-hours table'), html = '', current, i, j;
            table.parent().hide();
			current = 0;
			for (i = 0; i < 6; i += 1) {
				html += '<tr>';
				for (j = 0; j < 4; j += 1) {
					html += '<td class="hour">' + padLeft(current.toString()) + '</td>';
					current++;
				}
				html += '</tr>';
			}
            table.html(html);
        },

        fillMinutes = function () {
            var table = picker.widget.find('.timepicker .timepicker-minutes table'), html = '', current = 0, i, j;
            table.parent().hide();
            for (i = 0; i < 5; i++) {
                html += '<tr>';
                for (j = 0; j < 4; j += 1) {
                    html += '<td class="minute">' + padLeft(current.toString()) + '</td>';
                    current += 3;
                }
                html += '</tr>';
            }
            table.html(html);
        },
        
        fillTime = function () {
            if (!picker.date) return;
            var timeComponents = picker.widget.find('.timepicker span[data-time-component]'),
            hour = picker.date.hours(),
            period = 'AM';
			if (hour >= 12) period = 'PM';
			if (hour === 0) hour = 12;
			else if (hour != 12) hour = hour % 12;
			picker.widget.find('.timepicker [data-action=togglePeriod]').text(period);

            timeComponents.filter('[data-time-component=hours]').text(padLeft(hour));
            timeComponents.filter('[data-time-component=minutes]').text(padLeft(picker.date.minutes()));
        },

        click = function (e) {
            e.stopPropagation();
            e.preventDefault();
            picker.unset = false;
            var target = $(e.target).closest('span, td, th'), month, year, step, day;
            if (target.length === 1) {
                if (!target.is('.disabled')) {
                    switch (target[0].nodeName.toLowerCase()) {
                        case 'th':
                            switch (target[0].className) {
                                case 'switch':
                                    showMode(1);
                                    break;
                                case 'prev':
                                case 'next':
                                    step = dpGlobal.modes[picker.viewMode].navStep;
                                    if (target[0].className === 'prev') step = step * -1;
                                    picker.viewDate.add(step, dpGlobal.modes[picker.viewMode].navFnc);
                                    fillDate();
                                    break;
                            }
                            break;
                        case 'span':
                            if (target.is('.month')) {
                                month = target.parent().find('span').index(target);
                                picker.viewDate.month(month);
                            } else {
                                year = parseInt(target.text(), 10) || 0;
                                picker.viewDate.year(year);
                            }
                            if (picker.viewMode !== 0) {
                                picker.date = moment({
                                    y: picker.viewDate.year(),
                                    M: picker.viewDate.month(),
                                    d: picker.viewDate.date(),
                                    h: picker.date.hours(),
                                    m: picker.date.minutes()
                                });
                                notifyChange();
                            }
                            showMode(-1);
                            fillDate();
                            break;
                        case 'td':
                            if (target.is('.day')) {
                                day = parseInt(target.text(), 10) || 1;
                                month = picker.viewDate.month();
                                year = picker.viewDate.year();
                                if (target.is('.old')) {
                                    if (month === 0) {
                                        month = 11;
                                        year -= 1;
                                    } else {
                                        month -= 1;
                                    }
                                } else if (target.is('.new')) {
                                    if (month == 11) {
                                        month = 0;
                                        year += 1;
                                    } else {
                                        month += 1;
                                    }
                                }
                                picker.date = moment({
                                    y: year,
                                    M: month,
                                    d: day,
                                    h: picker.date.hours(),
                                    m: picker.date.minutes()
                                }
                                );
                                picker.viewDate = moment({
                                    y: year, M: month, d: Math.min(28, day)
                                });
                                fillDate();
                                set();
                                notifyChange();
                            }
                            break;
                    }
                }
            }
        },

		actions = {
            incrementHours: function () {
				checkDate("add","hours");
            },

            incrementMinutes: function () {
                checkDate("add","minutes");
            },

            decrementHours: function () {
                checkDate("subtract","hours");
            },

            decrementMinutes: function () {
                checkDate("subtract","minutes");
            },

            togglePeriod: function () {
                var hour = picker.date.hours();
                if (hour >= 12) hour -= 12;
                else hour += 12;
                picker.date.hours(hour);
            },

            showPicker: function () {
                picker.widget.find('.timepicker > div:not(.timepicker-picker)').hide();
                picker.widget.find('.timepicker .timepicker-picker').show();
            },

            showHours: function () {
                picker.widget.find('.timepicker .timepicker-picker').hide();
                picker.widget.find('.timepicker .timepicker-hours').show();
            },

            showMinutes: function () {
                picker.widget.find('.timepicker .timepicker-picker').hide();
                picker.widget.find('.timepicker .timepicker-minutes').show();
            },

            selectHour: function (e) {
                picker.date.hours(parseInt($(e.target).text(), 10));
                actions.showPicker.call(picker);
            },

            selectMinute: function (e) {
                picker.date.minutes(parseInt($(e.target).text(), 10));
                actions.showPicker.call(picker);
            }
        },
       
	    doAction = function (e) {
            stopEvent(e);
            if (!picker.date) picker.date = moment({ y: 1970 });
            var action = $(e.currentTarget).data('action'),
            rv = actions[action].apply(picker, arguments);
            set();
            fillTime();
            notifyChange();
            return rv;
        },

        stopEvent = function (e) {
            e.stopPropagation();
            e.preventDefault();
        },

        change = function (e) {
            var input = $(e.target),
            val = input.val();
            if (picker.date.isValid) {
                update();
                picker.setValue(picker.date.getTime());
                notifyChange();
                set();
            } else if (val && val.trim()) {
                picker.setValue(picker.date.getTime());
                if (picker.date.isValid) {
					set();
				}
                else {
					input.val('');
					notifyError(val);
				}
            } else {
                if (picker.date.isValid) {
                    picker.setValue(null);
                    // unset the date when the input is
                    // erased
                    notifyChange();
                    picker.unset = true;
                }
            }
        },

        showMode = function (dir) {
            if (dir) {
                picker.viewMode = Math.max(picker.minViewMode, Math.min(
                    2, picker.viewMode + dir));
            }

            picker.widget.find('.datepicker > div').hide().filter(
                '.datepicker-' + dpGlobal.modes[picker.viewMode].clsName).show();
        },

        attachDatePickerEvents = function () {
            var self = this, $this, $parent, expanded, closed, collapseData;  // this handles date picker clicks
            picker.widget.on('click', '.datepicker *', $.proxy(click, this)); // this handles time picker clicks
            picker.widget.on('click', '[data-action]', $.proxy(doAction, this));
            picker.widget.on('mousedown', $.proxy(stopEvent, this));
            if (picker.options.pickDate && picker.options.pickTime) {
                picker.widget.on('click.togglePicker', '.accordion-toggle', function (e) {
                    e.stopPropagation();
                    $this = $(this);
                    $parent = $this.closest('ul');
                    expanded = $parent.find('.in');
                    closed = $parent.find('.collapse:not(.in)');

                    if (expanded && expanded.length) {
                        collapseData = expanded.data('collapse');
                        if (collapseData && collapseData.transitioning) return;
                        expanded.collapse('hide');
                        closed.collapse('show');
                        $this.find('span').toggleClass(self.timeIcon + ' ' + self.dateIcon);
                        picker.element.find('.input-group-addon span').toggleClass(self.timeIcon + ' ' + self.dateIcon);
                    }
                });
            }
            if (picker.isInput) {
                picker.element.on({
                    'focus': $.proxy(picker.show, this),
                    'change': $.proxy(change, this),
                    'blur': $.proxy(picker.hide, this)
                });
            } else {
                picker.element.on({
                    'change': $.proxy(change, this)
                }, 'input');
                if (picker.component) {
                    picker.component.on('click', $.proxy(picker.show, this));
                } else {
                    picker.element.on('click', $.proxy(picker.show, this));
                }
            }
        },

        attachDatePickerGlobalEvents = function () {
            $(window).on(
                'resize.datetimepicker' + picker.id, $.proxy(place, this));
            if (!picker.isInput) {
                $(document).on(
                    'mousedown.datetimepicker' + picker.id, $.proxy(picker.hide, this));
            }
        },

        detachDatePickerEvents = function () {
            picker.widget.off('click', '.datepicker *', picker.click);
            picker.widget.off('click', '[data-action]');
            picker.widget.off('mousedown', picker.stopEvent);
            if (picker.options.pickDate && picker.options.pickTime) {
                picker.widget.off('click.togglePicker');
            }
            if (picker.isInput) {
                picker.element.off({
                    'focus': picker.show,
                    'change': picker.change
                });
            } else {
                picker.element.off({
                    'change': picker.change
                }, 'input');
                if (picker.component) {
                    picker.component.off('click', picker.show);
                } else {
                    picker.element.off('click', picker.show);
                }
            }
        },

        detachDatePickerGlobalEvents = function () {
            $(window).off('resize.datetimepicker' + picker.id);
            if (!picker.isInput) {
                $(document).off('mousedown.datetimepicker' + picker.id);
            }
        },

        isInFixed = function () {
            if (picker.element) {
                var parents = picker.element.parents(), inFixed = false, i;
                for (i = 0; i < parents.length; i++) {
                    if ($(parents[i]).css('position') == 'fixed') {
                        inFixed = true;
                        break;
                    }
                }
                ;
                return inFixed;
            } else {
                return false;
            }
        },

        set = function() {
			moment.lang(picker.options.language);
            var formatted = '', input;
            if (!picker.unset) formatted = moment(picker.date).format(picker.format);
            if (!picker.isInput) {
                if (picker.component) {
                    input = picker.element.find('input');
                    input.val(formatted);
                }
                picker.element.data('date', formatted);
            } else {
                picker.element.val(formatted);
            }
            if (!picker.options.pickTime) picker.hide();
        },

		checkDate = function(direction, unit) {
			moment.lang(picker.options.language);
			var newDate;
			if (direction == "add") {
				newDate = moment(picker.date)
				if (newDate.hours() == 23) newDate.add(1, unit)
				newDate.add(1, unit);
			}
			else {
				newDate = moment(picker.date).subtract(1, unit);
			}
			if (newDate.isAfter(picker.options.endDate) || newDate.subtract(1, unit).isBefore(picker.options.startDate) || isInDisableDates(newDate)) {
				notifyError(newDate.format(picker.format))
				return;
			}
			
			if (direction == "add") {
				picker.date.add(1, unit);
			}
			else {
				picker.date.subtract(1, unit);
			}
		},
		
		isInDisableDates = function (date) {
			moment.lang(picker.options.language);
			var disabled = picker.options.disabledDates, i;
            for (i in disabled) {
				if (disabled[i] == moment(date).format("L")) {
                    return true;
                }
            }
            return false;
        },

        padLeft = function(string) {
            string = string.toString();
            if (string.length >= 2) return string;
            else return '0' + string;
        },

        getTemplate = function(timeIcon, upIcon, downIcon, pickDate, pickTime, collapse) {
            if (pickDate && pickTime) {
                return (
                    '<div class="bootstrap-datetimepicker-widget dropdown-menu" style="z-index:9999 !important;">' +
                        '<ul class="list-unstyled">' +
                        '<li' + (collapse ? ' class="collapse in"' : '') + '>' +
                        '<div class="datepicker">' +
                        dpGlobal.template +
                        '</div>' +
                        '</li>' +
                        '<li class="picker-switch accordion-toggle"><a class="btn" style="width:100%"><span class="' + timeIcon + '"></span></a></li>' +
                        '<li' + (collapse ? ' class="collapse"' : '') + '>' +
                        '<div class="timepicker">' +
                        tpGlobal.getTemplate(upIcon, downIcon) +
                        '</div>' +
                        '</li>' +
                        '</ul>' +
                        '</div>'
                );
            } else if (pickTime) {
                return (
                    '<div class="bootstrap-datetimepicker-widget dropdown-menu">' +
                        '<div class="timepicker">' +
                        tpGlobal.getTemplate(upIcon, downIcon) +
                        '</div>' +
                        '</div>'
                );
            } else {
                return (
                    '<div class="bootstrap-datetimepicker-widget dropdown-menu">' +
                        '<div class="datepicker">' +
                        dpGlobal.template +
                        '</div>' +
                        '</div>'
                );
            }
        },
		
		dpGlobal = {
            modes: [
                {
                    clsName: 'days',
                    navFnc: 'month',
                    navStep: 1
                },
                {
                    clsName: 'months',
                    navFnc: 'year',
                    navStep: 1
                },
                {
                    clsName: 'years',
                    navFnc: 'year',
                    navStep: 10
                }],
            headTemplate:
                    '<thead>' +
                    '<tr>' +
                    '<th class="prev">&lsaquo;</th>' +
                    '<th colspan="5" class="switch"></th>' +
                    '<th class="next">&rsaquo;</th>' +
                    '</tr>' +
                    '</thead>',
            contTemplate:
        '<tbody><tr><td colspan="7"></td></tr></tbody>'
        },

        tpGlobal = {
            hourTemplate: '<span data-action="showHours" data-time-component="hours" class="timepicker-hour"></span>',
            minuteTemplate: '<span data-action="showMinutes" data-time-component="minutes" class="timepicker-minute"></span>'
        };
		
		dpGlobal.template =
            '<div class="datepicker-days">' +
                '<table class="table-condensed">' +
                dpGlobal.headTemplate +
                '<tbody></tbody>' +
                '</table>' +
                '</div>' +
                '<div class="datepicker-months">' +
                '<table class="table-condensed">' +
                dpGlobal.headTemplate +
                dpGlobal.contTemplate +
                '</table>' +
                '</div>' +
                '<div class="datepicker-years">' +
                '<table class="table-condensed">' +
                dpGlobal.headTemplate +
                dpGlobal.contTemplate +
                '</table>' +
                '</div>';

        tpGlobal.getTemplate = function (upIcon, downIcon) {
            return (
                '<div class="timepicker-picker">' +
                    '<table class="table-condensed">' +
                    '<tr>' +
                    '<td><a href="#" class="btn" data-action="incrementHours"><span class="' + upIcon + '"></span></a></td>' +
                    '<td class="separator"></td>' +
                    '<td><a href="#" class="btn" data-action="incrementMinutes"><span class="' + upIcon + '"></span></a></td>' +
                    '<td class="separator"></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' + tpGlobal.hourTemplate + '</td> ' +
                    '<td class="separator">:</td>' +
                    '<td>' + tpGlobal.minuteTemplate + '</td> ' +
                    '<td class="separator"></td>' +
                        '<td>' +
                        '<button type="button" class="btn btn-primary" data-action="togglePeriod"></button>' +
                        '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><a href="#" class="btn" data-action="decrementHours"><span class="' + downIcon + '"></span></a></td>' +
                    '<td class="separator"></td>' +
                    '<td><a href="#" class="btn" data-action="decrementMinutes"><span class="' + downIcon + '"></span></a></td>' +
                    '<td class="separator"></td>' +
                    '</tr>' +
                    '</table>' +
                    '</div>' +
                    '<div class="timepicker-hours" data-action="selectHour">' +
                    '<table class="table-condensed">' +
                    '</table>' +
                    '</div>' +
                    '<div class="timepicker-minutes" data-action="selectMinute">' +
                    '<table class="table-condensed">' +
                    '</table>' +
                    '</div>'
            );
        };
		
        picker.destroy = function () {
            detachDatePickerEvents();
            detachDatePickerGlobalEvents();
            picker.widget.remove();
            picker.element.removeData('DateTimePicker');
            picker.component.removeData('DateTimePicker');
        };

        picker.show = function (e) {
            picker.widget.show();
            picker.height = picker.component ? picker.component.outerHeight() : picker.element.outerHeight();
            place();
            picker.element.trigger({
                type: 'show.dp',
                date: picker.date
            });
            attachDatePickerGlobalEvents();
            if (e) {
                stopEvent(e);
            }
        },

        picker.disable = function () {
            picker.element.find('input').prop('disabled', true);
            detachDatePickerEvents();
        },

        picker.enable = function () {
            picker.element.find('input').prop('disabled', false);
            attachDatePickerEvents();
        },

        picker.hide = function () {
            // Ignore event if in the middle of a picker transition
            var collapse = picker.widget.find('.collapse'), i, collapseData;
            for (i = 0; i < collapse.length; i++) {
                collapseData = collapse.eq(i).data('collapse');
                if (collapseData && collapseData.transitioning)
                    return;
            }
            picker.widget.hide();
            picker.viewMode = picker.startViewMode;
            showMode();
            picker.element.trigger({
                type: 'hide.dp',
                date: picker.date
            });
            detachDatePickerGlobalEvents();
        },

        picker.setValue = function (newDate) {
			moment.lang(picker.options.language);
            if (!newDate) {
                picker.unset = true;
            } else {
                picker.unset = false;
            }
            var d = moment(newDate);
            if (!d.isValid()) {
                throw new Error("Couldn't parase date or is invalid");
				notifyError(newDate.format(picker.format));
			}
            picker.date = d;
            set();
            picker.viewDate = moment({ y: picker.date.year(), M: picker.date.month() });
            fillDate();
            fillTime();
        },

        picker.getDate = function () {
            if (picker.unset) return null;
            return picker.date;
        },

        picker.setDate = function (date) {
            if (!date) picker.setValue(null);
            else picker.setValue(date);
        },

        picker.setEndDate = function (date) {
			picker.options.endDate = moment(date);
            if (!picker.options.endDate.isValid) {
                picker.options.endDate = moment().add(50, "y");
            }
            if (picker.viewDate) update();
        },


        picker.setStartDate = function (date) {
            picker.options.startDate = moment(date);
            if (!picker.options.startDate.isValid) {
                picker.options.startDate = moment({ y: 1970 });
            }
            if (picker.viewDate) update();
        };
		
		init();
    };

    $.fn.datetimepicker = function (options) {
        return this.each(function () {
            var $this = $(this), data = $this.data('DateTimePicker');
            if (!data) $this.data('DateTimePicker', new DateTimePicker(this, options));
        });
    };
})(jQuery);


	 
$(document).ready(function() 
{

    var MaxInputs       = 50; //Número Maximo de Campos
    var contenedor      = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length +1;
    var FieldCount = x-1; //para el seguimiento de los campos
	


    $(AddButton).click(function (e) 
	{
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;

            //agregar campo
            $(contenedor).append('<div><table width="100%" border="0" style="font-size:11px; border-color:#E4E4E4;" cellpadding="0" cellspacing="0" height="20"><tr><td width="10%"><input type="text" name="cant'+ FieldCount +'" id="cant'+ FieldCount +'" placeholder="Cantidad" style="width:99%; font-size:11px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" required/></td><td width="55%"><input type="text" name="descri'+ FieldCount +'" id="descri'+ FieldCount +'" placeholder="Descripcion" style="width:99%; font-size:11px;" onChange="javascript:this.value=this.value.toUpperCase();" required/> </td><td width="10%"><input type="text" name="vlr'+ FieldCount +'" id="vlr'+ FieldCount +'" placeholder="V/Unid" style="width:99%; font-size:11px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" required/></td><td width="10%" align="right"><a href="#" class="borrar"><img src="../../assets/img/delete.png" border = "0" style="margin-right:5px;"></a></td></tr></table></div>');

            x++; //text box increment
        }
        return false;
    });

    $("body").on("click",".borrar", function(e)
	{ //click en eliminar campo
        if( x > 1 ) 
		{
            $(this).parent().parent().remove(); //eliminar el campo
            x--;
			
        }
        return false;
    });
	
	


    $(enviar).click(function (e) 
	{
        if(  x == 0 ) 
		{
           alert("No hay movimientos cargados.");
		    return false;
        }
		else
		{
			 return true;
		}
       
    });
	
	
});
 
</script>

    <!-- END JAVASCRIPT CODES FOR THE CURRENT PAGE -->
        <!-- END JAVASCRIPT CODES -->        
        
 
	</body>
</html>
