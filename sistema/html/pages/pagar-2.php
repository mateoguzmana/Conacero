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
					

					$IdPago 			=$_REQUEST["Id"];

					$querySIN			="SELECT * FROM CuentasPagar WHERE Id = '$IdPago'";
					$resultSIN			=mysql_query($querySIN, $id);
					
					While($rowSIN		=mysql_fetch_array($resultSIN))
					{
					$TipoCuenta			=$rowSIN["TipoCuenta"];
					$NOpcion 			=$rowSIN["Opcion"];
					$Idenobra			=$rowSIN["Idobra"];
					$Idproveedor		=$rowSIN["Idproveedor"];	
					$Obra 				=$rowSIN["Obra"];
					$NProveedor 		=$rowSIN["Proveedor"];
					$NumeroFactura		=$rowSIN["NumeroFactura"];
					$TipoCtaIni 		=$rowSIN["TipoCta"];
					$NumeroCuentaIni	=$rowSIN["NumeroCuenta"];
					$FormaPagoIni 		=$rowSIN["FormaPago"];
					$FechaInicio 		=$rowSIN["FechaInicio"];
					$FechaFin 			=$rowSIN["FechaFin"];
					$Periocidad 		=$rowSIN["Periocidad"];
					$Valor 				=$rowSIN["Valor"];
					$ValorRetencion 	=$rowSIN["ValorRetencion"];
					$ValorAbonado		=$rowSIN["ValorAbonado"];
					$Concepto			=$rowSIN["Concepto"];
					$Estado 			=$rowSIN["Estado"];
					$Fecha 				=$rowSIN["Fecha"];
					$CuentaContable 	=$rowSIN["CuentaContable"];
					//$Observaciones 		=$rowSIN["Observaciones"];

					$Valor=($Valor-$ValorAbonado);
					$Deuda 				=($ValorRetencion-$ValorAbonado);
					$Observaciones="ABONO A LA FACTURA NRO. ".$NumeroFactura." | ".date('Y-m-d'); 
					$Ct=$_REQUEST["Ct"];
					$Ob=$_REQUEST["Ob"];
					$FA=$_REQUEST["FA"];
					if(empty($Ct)){
					$CuentaContable 	=$CuentaContable;
					}
					else{
					$CuentaContable=$Ct;
					}
					
					if(empty($Ob)){
					$Observaciones 		=$Observaciones;	
					}
					else{
					$Observaciones 		=$Ob;	
					}
		

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
						
						$decimales 	= explode(".",$ValorRetencion);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						
						
						if($CuantosDS == 1)
						{
						$ValorRetencion				=$ValorRetencion.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$ValorRetencion				=$ValorRetencion.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$ValorRetencion				=$ValorRetencion;	
						}

						$decimales 	= explode(".",$ValorAbonado);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						
						if($CuantosDS == 1)
						{
						$ValorAbonado				=$ValorAbonado.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$ValorAbonado				=$ValorAbonado.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$ValorAbonado				=$ValorAbonado;	
						}
						
						$decimales 	= explode(".",$ValorDeuda);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						
						if($CuantosDS == 1)
						{
						$Deuda				=$Deuda.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$Deuda				=$Deuda.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$Deuda				=$Deuda;	
						}

					$ROpcion 			=$NOpcion;

					if($Estado == 1 || $Estado == 2)
						{
						$ponebloqueo	=	'disabled';
						}
					}
					
					
					$TipoForm			=$_REQUEST["Opcion"];

					if(empty($TipoForm)){
					if (!empty($NOpcion)) {
						if ($NOpcion=="1") {
						$Opcion="SI";
						$XOpcion="1";
					}
					if ($NOpcion=="2") {
						$Opcion="NO";
						$XOpcion="2";
					}
					}
					}else{
					if ($TipoForm=="1") {
					$Opcion="SI";
					$XOpcion="1";
					}
					if ($TipoForm=="2") {
					$Opcion="NO";
					$XOpcion="2";
					}
					}	
					
					
					$queryPP		="SELECT * FROM Cuentas WHERE Id='$CuentaContable'";
					$resultPP		=mysql_query($queryPP, $id);
							
					while($rowPP	=mysql_fetch_array($resultPP))
					{
					$NombreCuenta		=$rowPP["Nombre"];
					$NumeroCuentica		=$rowPP["Cuenta"];
					}
					

					$Proveedor 			=$_REQUEST["IdProve"];
					if(empty($Proveedor)){
					$queryMEN		="SELECT* FROM Proveedores WHERE Id = '$Idproveedor'" ;
					}
					else {
					$queryMEN		="SELECT* FROM Proveedores WHERE Id = '$Proveedor'" ;	
					}
					
					$resultMEN		=mysql_query($queryMEN, $id);
					
					While($rowMEN	=mysql_fetch_array($resultMEN))
					{
					$IdProve 				=$rowMEN["Id"];
					$NombreProve			=$rowMEN["Nombre"];
					$TipoCtaProve 			=$rowMEN["TipoCuenta"];
					$NumeroCuentaProve		=$rowMEN["NumeroCuenta"];
					$FormaPagoProve 		=$rowMEN["FormaPago"];
					$Banco 					=$rowMEN["Banco"];
					}
					

					$LineaMenuS			=$NombreTITMEN;
					
					$Idobra				=$_REQUEST["Idobra"];

					$queryTITMEN		="SELECT* FROM Obras WHERE Id = '$Idobra'" ;
					$resultTITMEN		=mysql_query($queryTITMEN, $id);
					
					While($rowTITMEN	=mysql_fetch_array($resultTITMEN))
					{
					$Nombreobra			=$rowTITMEN["Nombre"];
					}
					
					$queryRR			="SELECT* FROM Obrasprov WHERE Idobra = '$Idobra'" ;
					$resultRR			=mysql_query($queryRR, $id);
					
					While($rowRR		=mysql_fetch_array($resultRR))
					{
					$Asunto				=$rowRR["Proveedor"];
					}
					
					$horaactual 		=date("Y-m-d");
					
					$queryRE		="SELECT DATEDIFF('$horaactual','$Fechafact') AS diferencia";
					$resultRE		=mysql_query($queryRE, $id);
							
					while($rowRE	=mysql_fetch_array($resultRE))
					{
					$diferencia		=$rowRE["diferencia"];
					}
					
					if(empty($diferencia) || $diferencia == 0)
					{
					$nuevafecha	=-90;	
					}
					else
					{
					$fecha = date('Y-m-d');
					$nuevafecha = strtotime ( '-'.$diferencia.' day' , strtotime ( $fecha ) ) ;
					$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
					
					
					$nuevafecha = substr($nuevafecha, -2);
					$nuevafecha	=(string)(int)$nuevafecha;
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

 <script type="text/javascript">
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
	<body>

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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Actualizar Cuenta por Pagar</a></li>
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
                                            
                                            
                                            
                                            
                                             
												<form class="form-horizontal form-validate"  onsubmit="return ValidarAbono()" role="form" method="post" action="pagar-3.php?=Id=<?$IdPago?>" id="form1" name="form1" novalidate>
                                                
							
													
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Tipo" class="control-label">Obra</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
																<?if (!empty($Idobra)) { ?>
                                                              	<input name="Idobra" id="Idobra" type="hidden" value="<?=$Idobra?>">
                                                              	<input name="Nombreobra" id="Nombreobra" type="hidden" value="<?=$Nombreobra?>">
                                                              	<? } else { ?>
                                                              	<input name="Idobra" id="Idobra" type="hidden" value="<?=$Idenobra?>">
                                                              	<input name="Nombreobra" id="Nombreobra" type="hidden" value="<?=$Obra?>">
                                                              	<? } ?>
                                                              	
                                                                <select name="jumpMenu" id="jumpMenu" class="form-control" disabled onChange="MM_jumpMenu('parent',this,0)"required  data-placeholder="Seleccione una Obra" style="background-color:#CCC" <?=$ponebloqueo?>>
            															<?
                                                                        if(empty($Idobra))
																		{
																		?>
                                                                  <option value="act-pagos-2.php?Id=<?=$IdPago?>&Idobra=<?=$Idobra?>&Opcion=<?=$TipoForm?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>" selected><?=$Obra?></option>
                                                                        <?
																		}
																		else
																		{
																		?>
                                                                        <option value="act-pagos-2.php" selected><?=$Nombreobra?></option>
                                                                        <?
																		}
																		
                                                                        $queryTIP		="SELECT* FROM Obras where Muestra = 0 and Id <> '$Idobra' order by Nombre";
                                                                        $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                                                        While($rowTIP	=mysql_fetch_array($resultTIP))
                                                                        {
                                                                        $Idobra			=$rowTIP["Id"];
																		$NombreTIP		=$rowTIP["Nombre"];
                                                                        ?>
                                                                        <option value="act-pagos-2.php?Id=<?=$IdPago?>&Idobra=<?=$Idobra?>&Opcion=<?=$TipoForm?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>"><?=$NombreTIP?></option>
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
																	<label for="Tipo" class="control-label">Proveedor</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                <select name="jumpMenu" id="jumpMenu" class="form-control" disabled onChange="MM_jumpMenu('parent',this,0)"required  data-placeholder="Seleccione un proveedor" style="background-color:#CCC" <?=$ponebloqueo?>>
            
                                                                        <?
                                                                        if(empty($Proveedor))
																		{
																		?>
                                                                  <option value="act-pagos-2.php?Id=<?=$IdPago?>&Idobra=<?=$Idobra?>&Opcion=<?=$TipoForm?>&IdProve=<?=$IdPre?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>" selected><?=$NProveedor?></option>
                                                                        <?
																		}
																		else
																		{
																		?>
                                                                        <option value="act-pagos-2.php" selected><?=$NombreProve?></option>
                                                                        <?
																		}
																		if ($XOpcion=="1") {
																		$queryRR		="SELECT * FROM Obrasprov WHERE Idobra = '$Idobra'" ;
																		$resultRR		=mysql_query($queryRR, $id);
					
																		While($rowRR	=mysql_fetch_array($resultRR))
																		{
																		$Asunto			=$rowRR["Proveedor"];
																		
																		$queryX		="SELECT * FROM Proveedores WHERE Id = '$Asunto' ";
																		$resultX		=mysql_query($queryX, $id);
                                                                        
                                                                        While($rowX	=mysql_fetch_array($resultX))
                                                                        {
                                                                        $Idproveedor			=$rowX["Id"];
																		$Nombreproveedor		=$rowX["Nombre"];
																		$Dirclien 				=$rowX["Dir"];
																		$Ciudadclien			=$rowX["Ciudad"];
																		$TipoCuentaclien 		=$rowX["TipoCuenta"];
																		$NumeroCuentaclien 		=$rowX["NumeroCuenta"];
																		$FormaPagoclien			=$rowX["FormaPago"];
                                                                        ?>
                                                                        <option value="add-pagar-expo.php?Idobra=<?=$Idobra?>&Opcion=<?=$TipoForm?>&IdProve=<?=$Idproveedor?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>"><?=$Nombreproveedor?></option>
																		<?
																		}
																		}
																		}else{
																		$queryX		="SELECT* FROM Proveedores WHERE Id <> '$Proveedor' order by Nombre";
																		$resultX		=mysql_query($queryX, $id);
                                                                        
                                                                        While($rowX	=mysql_fetch_array($resultX))
                                                                        {
                                                                        $Idproveedor			=$rowX["Id"];
																		$Nombreproveedor		=$rowX["Nombre"];
																		$Dirclien 				=$rowX["Dir"];
																		$Ciudadclien			=$rowX["Ciudad"];
																		$TipoCuentaclien 		=$rowX["TipoCuenta"];
																		$NumeroCuentaclien 		=$rowX["NumeroCuenta"];
																		$FormaPagoclien			=$rowX["FormaPago"];
                                                                        ?>
                                                                        <option value="add-pagar-expo.php?Idobra=<?=$Idobra?>&Opcion=<?=$TipoForm?>&IdProve=<?=$Idproveedor?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>"><?=$Nombreproveedor?></option>
																		<?
																		}
																		}
																		?>

                                                                </select>
                                                                <?if(empty($Proveedor) || empty($IdProve)) {?>
                                                              	<input name="Nombreproveedor" id="Nombreproveedor" type="hidden" value="<?=$NProveedor?>">
                                                              	<input name="IdProve" id="Idproveedor" type="hidden" value="<?=$Idproveedor?>">
                                                              	<? } else if (!empty($Proveedor)) { ?>
                                                              	<input name="Nombreproveedor" id="Nombreproveedor" type="hidden" value="<?=$NombreProve?>">
                                                              	<input name="IdProve" id="Idproveedor" type="hidden" value="<?=$IdProve?>">
                                                              	<? } ?>
																</div>
															</div>
														</div>

                                                     

                                                     	<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Direccion" class="control-label">Forma Pago</label>
																</div>
																<div class="col-md-10">
                                                                	<input type="text" <?=$ponebloqueo?> name="FormaPago" id="FormaPago" class="form-control" placeholder="Forma de pago" value="<?=$FormaPagoProve?>" readonly style="background-color:#CCC">
																</div>
															</div>
														</div>
														<?if($FormaPago!="EFECTIVO"){?>
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Direccion" class="control-label">Tipo Cuenta</label>
																</div>
																<div class="col-md-10">
                                                                	<input type="text" <?=$ponebloqueo?> name="TipoCta" id="TipoCta" class="form-control" placeholder="Tipo de cuenta" value="<?=$TipoCtaProve?>" required readonly style="background-color:#CCC">
																</div>
															</div>
														</div>
                                                        
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                                    <label class="control-label">Numero Cuenta</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" <?=$ponebloqueo?> class="form-control" name="NumeroCuenta" id="NumeroCuenta" value="<?=$NumeroCuentaProve?>" placeholder="Numero de cuenta" required readonly style="background-color:#CCC">
                                                                </div>
                                                            </div>
														</div>
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                                    <label class="control-label">Banco</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" <?=$ponebloqueo?> class="form-control" name="Banco" id="Banco" value ="<?=$Banco?>" placeholder="Numero de cuenta" required readonly style="background-color:#CCC">
                                                                </div>
                                                            </div>
														</div>
														<? } ?>
														
													








														<div class="row">
                                                        <div class="col-sm-12">
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Fecha Factura</label>
																</div>
                                                                
                                                                <div class="col-md-10">
															<input type="text" disabled <?=$ponebloqueo?> value="<?=$FechaInicio?>" class="form-control" required name="FechaPago" id="FechaPago"/>
															<!--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>-->
                                                                </div>
															</div>
														</div>
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
													<label class="control-label">Nro. Factura</label>
													</div>
													<div class="col-md-10">
													<input type="text" name="NumeroFactura" disabled <?=$ponebloqueo?> id="NumeroFactura" value="<?=$NumeroFactura?>" class="form-control" required>

													</div>
													</div>
													</div>
														</div>
													</div>
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
													<label class="control-label">Saldo Actual</label>
													</div>
													<div class="col-md-10">
													<input type="text" name="Valor" disabled <?=$ponebloqueo?> id="ValorInicial" value="<?=$Deuda?>" class="form-control dollar-mask" required>
													<input type="hidden" name="Valorcito" id="Valorcito" value="<?=$Valor?>">
													</div>
													</div>
													</div>
													
														<? if($TipoCuenta=="2") { ?>


														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
													<label class="control-label">Ciclo</label>
													</div>
													<div class="col-md-10">
													<select class="form-control" <?=$ponebloqueo?> disabled required name="Periocidad" id="Periocidad">
    													<option selected><?=$Periocidad?></option>
    													<option value="5">5 Días</option>
    													<option value="10">10 Días</option>
    													<option value="15">15 Días</option>
    													<option value="20">20 Días</option>
    													<option value="25">25 Días</option>
    													<option value="30">1 mes</option>
    													<option value="60">2 meses</option>
    													<option value="90">3 meses</option>
    													<option value="120">4 meses</option>
    													<option value="150">5 meses</option>
    													<option value="180">6 meses</option>
    												 </select>
													</div>
															</div>
													</div>

													</div>

													<div class="row">

													<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Desde</label>
																</div>
                                                                <div class="col-md-10">
														<div class='input-group date' id='demo-date-start'>
															<input type="text" <?=$ponebloqueo?> disabled value="<?=$FechaInicio?>" class="form-control" required name="FechaInicio" id="FechaInicio"/>
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
																</div>
                                                                </div>
															</div>
														</div>

														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Fin" class="control-label">Hasta</label>
																</div>
		                                                 <div class="col-md-10">
														<div class='input-group date' id='demo-date-end'>
															<input type="text" <?=$ponebloqueo?> disabled value="<?=$FechaFin?>" class="form-control" required name="FechaFin" id="FechaFin" />
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														</div>
                                                                </div>
															</div>
														</div>
														<? } ?>
													
                                                    
                                                    
                                                    
													
												<div class="col-sm-12">
															<div class="form-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="Descripcion" class="control-label">Concepto</label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
																	<br>
                                                                  <textarea name="Concepto" disabled <?=$ponebloqueo?> rows="3" required class="form-control" id="Concepto"><?=$Concepto?></textarea>
																<input name="TipoCuenta" id="TipoCuenta" type="hidden" value="<?=$TipoCuenta?>">																
																<input name="Id" id="Id" type="hidden" value="<?=$IdPago?>">

																</div>
															</div>
														</div>
                                             			<?if ($Estado==4 || $Estado==0) { ?>
                                                     <div class="col-sm-6">
                                                     	<br>
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Tipo" class="control-label">Cuenta Contable</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                <select name="CuentaContable" id="jumpMenu" class="form-control" required <?=$ponebloqueo?>>
            															<?if(!empty($CuentaContable)){?>
                                                                        <option value="<?=$CuentaContable?>" selected><?=$NombreCuenta?> - <?=$NumeroCuentica?></option>
                                                                        <?}else{?>
                                                                        <option value="" selected>Seleccione una cuenta</option>
                                                                        <?
                                                                    	}
                                                                        $queryNKD		="SELECT * FROM Cuentas where Muestra = 0 order by Nombre";
                                                                        $resultNKD		=mysql_query($queryNKD, $id);
                                                                        
                                                                        While($rowNKD	=mysql_fetch_array($resultNKD))
                                                                        {
                                                                        $IdNKD			=$rowNKD["Id"];
																		$NombreNKD		=$rowNKD["Nombre"];
																		$NumCuentaNKD  	=$rowNKD["Cuenta"];
                                                                        ?>
                                                                        <option value="<?=$IdNKD?>"><?=$NombreNKD?> - <?=$NumCuentaNKD?></option>
																		<?
																		}
																		?>

                                                                </select>
																</div>
															</div>
														</div>
														<?if ($Estado==4 || $Estado==0) { ?>
													<div class="col-sm-6">
														<br/>
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Fecha Pago</label>
																</div>
                                                                <div class="col-md-10">
														<div class='input-group date' id='demo-date-start'>
															<input type="text" class="form-control" value="<?=$FA?>" required name="FechaAbono" id="FechaAbono"/>
															<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
																</div>
                                                                </div>
															</div>
														</div>
														<?}?>
														<div class="row">
														<div class="col-sm-12">
														<div class="col-sm-6">
															<br>
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
																<label class="control-label">Abono</label>
																</div>
																<div class="col-md-10">
																<input type="text" name="Abono" id="Abono"  class="form-control dollar-mask"  required>
																 
																<!-- <input type="hidden" name="Valorcito" id="Valorcito" value="">
																onkeypress="ValidarAbono()" onkeydown="ValidarAbono()" onkeyup="ValidarAbono()"
																onfocus="ValidarAbono()" onfocusout="ValidarAbono()" onMouseOut="ValidarAbono()" --> 
																<br>
																<div id="resp">

																</div>
																
														</div>
														</div>
													</div>
													</div>
													</div>
														<div class="col-sm-12">
															<div class="form-group">
																<div class="col-lg-1 col-md-2 col-sm-3">
																	<label for="Observaciones" class="control-label">Observacion</label>
																</div>
																<div class="col-lg-11 col-md-10 col-sm-9">
																	<br>
                                                                  <textarea name="Observaciones" <?=$ponebloqueo?> rows="3" required class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" id="Observaciones"><?=$Observaciones?></textarea>
																</div>
															</div>
														</div>
                                                        
                                                       <?}?> 
                                                        
                                                        

													<div class="form-group">
														<div class="col-lg-1 col-md-2 col-sm-3">
															<label for="email" class="control-label"></label>
														</div>
														<div class="col-lg-11 col-md-10 col-sm-9">
															<br/><br/>
															<?if($Estado==0 || $Estado==4) { ?>
															<button type="submit" id="enviar" class="btn btn-primary">Realizar Abono</button>
															<? }
															/* 
															elseif ($Estado==1) { ?>
															<input name="Imprimir" type="button" class="btn btn-warning" value="Imprimir"  style="width:100px;" onClick="window.open('print-pagos.php?Id=<?=$IdPago?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>','_blank')">
															<?
															} */
															?>
															<input name="Volver" type="button" class="btn btn-warning" value="Volver"  onClick="location.href='pagar.php?Idmenu=7&Idsubmenu=14&Idopcmenu=36'">
															<br>
														</div>
													</div>
													
												</form>
													<br><span>&nbsp;</span></br>

<?if ($Estado!=0) { ?>
<!-- Empezando la tabla de pagos -->
  <div class="section-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="box style-transparent">
									<!-- START PROFILE TABS -->
									<div class="box-head">
										<ul class="nav nav-tabs tabs-transparent" data-toggle="tabs">
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Abonos de la factura <strong>NRO. <?=$NumeroFactura?></strong></a></li>
										</ul>
									</div>
									<!-- END PROFILE TABS -->

									<div class="tab-content">

										<!-- START PROFILE EDITOR -->
										<div class="tab-pane active" id="editDetails">
										  <div class="box-body style-white">
												
                                                
                                                
                                                    

                          

                                <table width="100%" border="1" class="btn-support3" style="font-size:10px; font-weight:bold; height:15px; margin-bottom:10px;" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10%" height="33">&nbsp;NRO.</td>
                                    <td width="15%">&nbsp;FECHA</td>
                                    <td width="35%">&nbsp;OBSERVACIONES</td>
                                    <td width="20%">&nbsp;ABONO</td>
                                    <td width="20%" align="right">&nbsp;</td>
                                  </tr>
                                </table>
                                
<?
					 
						
					 $queryUSERS		="SELECT * FROM HistorialPagos where Idcuenta = '$IdPago' order by FechaAbono";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
					 	$x++;
						$Idmovi			=$rowUSERS["Id"];
						$FechaAbono		=$rowUSERS["FechaAbono"];
						$Abono			=$rowUSERS["Abono"];
						$Obser 			=$rowUSERS["Observaciones"];
						$CuentaCon 		=$rowUSERS["CuentaContable"];
						$Cuota			=$rowUSERS["Cuota"];
						$Muestra 		=$rowUSERS["Muestra"];
						$MotivoAnulacion=$rowUSERS["MotivoAnulacion"];
						
						$decimales 	= explode(".",$Abono);
						$CuantosS	= $decimales[1];
						$CuantosDS	= strlen($CuantosS);
						
						if($CuantosDS == 1)
						{
						$Valora				=$Abono.'0';	
						}
						elseif($CuantosDS == 0)
						{
						$Valora				=$Abono.'00';	
						}
						elseif($CuantosDS == 2)
						{
						$Valora				=$Abono;	
						}
						
						if($Muestra==0){
						$Melo=$Obser;
						}else{
						$Melo=$MotivoAnulacion;
						}
						
						$Abono			=number_format($Abono,0,'','.');
						

						$queryPW="SELECT * FROM Usuarios WHERE Id=$_SESSION[IdR]";
						$resultPW=mysql_query($queryPW,$id);
						while ($rowPW=mysql_fetch_array($resultPW)) {
							$ContraActual=$rowPW["Clave"];
						}
						
						 $cont++;
						 
						 if($Totalob == $cont)
						 {
							$stilos		=	''; 
						 }
						 else
						 {
							$stilos		=	'border-bottom: none; '; 
						 }

?>
                                <table width="100%" class="btn-default" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> " >
                                  <tr>
                                    <td width="10%" height="33" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Idmovi?></td>
                                    <td width="15%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$FechaAbono?></td>
                                    <td width="35%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;<?=$Melo?></td>
                                    <td width="20%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> "> $&nbsp;<?=$Abono?></td>
                                    <td width="10%" align="right">
                                    <input name="Procesar" type="button" class="btn btn-success btn-xs" value="VER" style="width:100%;"  onClick="window.open('print-abonopago.php?Id=<?=$IdPago?>&Idpago=<?=$Idmovi?>&Idcliente=<?=$IdclienteUSERS?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>','_blank')"> 
									</td><td width="10%" align="right">
									<?if(($Estado==0 || $Estado==4) && $Muestra==0) { ?>
									<input name="Anular" type="button" class="btn btn-danger btn-xs" value="ANULAR" style="width:100%;"   data-toggle="modal" data-target="#textModal<?=$Idmovi?>" data-placement="top">
									<?} if($Muestra==1){?>  
									<input name="Anular" type="button" class="btn btn-warning btn-xs" value="ANULADA" style="width:100%;">
									<?}?>             
                                    </td>
                                  </tr>
                                </table>

                                
                                                <!-- START LARGE TEXT MODAL MARKUP -->
                                                <div class="modal fade" id="textModal<?=$Idmovi?>" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="textModalLabel">ANULAR RECIBO DE EGRESO NRO. <?=$Idmovi?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            	<P>¿Realmente desea anular?</P>
                                                                <?for ($i=0; $i < $x; $i++) { ?>
																	<?}?>
                                                             	<form id="Anulacion" onsubmit="return valida<?=$i?>(this)" action='eliminar-pago.php?Id=<?=$Idmovi?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>' method="post">
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
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <!-- START FORM MODAL MARKUP -->
                                                <div class="modal fade" id="formModal<?=$Idmovi?>" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="formModalLabel">Modificar Movimiento</h4>
                                                            </div>
                                                          <form class="form-horizontal" role="form" action="act-valor-obra.php" method="post">
       
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-3">
                                                                            <label for="Valor" class="control-label">Valor</label>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control dollar-mask" name="Valor" id="Valor"  placeholder="Valor de la Obra" value="<?=$Valora?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-3">
                                                                            <label for="Fecha" class="control-label">Fecha</label>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <div class='input-group date' id='demo-date'>
                                                                                <input type="text" name="Fecha" class="form-control" id='demo-date' value="<?=$Fecha?>" placeholder="Fecha" required data-date-format="yyyy-mm-dd"/>
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <div class="col-sm-3">
                                                                            <label for="Fecha" class="control-label">Movimiento</label>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <select name="Tipo" id="Tipo" class="form-control select2-list" data-placeholder="Seleccione el Movimiento" required>
                                                                                    <option value="<?=$Tipo?>" selected><?=$Tipo?></option>
                                                                                    <option value="INGRESO" >INGRESO</option>
                                                                                    <option value="EGRESO" >EGRESO</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group">
                                                                        <div class="col-sm-3">
                                                                            <label for="Descripcion" class="control-label">Descripcion</label>
                                                                        </div>
                                                                        <div class="col-sm-9">
																
                                                                  			<textarea name="Descripcion" rows="3" required class="form-control" id="Descripcion" placeholder="Descripción de la Obra" onChange="javascript:this.value=this.value.toUpperCase();"><?=$Descripcion?></textarea>
																
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                                                </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- END FORM MODAL MARKUP -->

                                                
                                                
                                                
                                
                                
                          										
<?
					 }
					 
					 $queryUSERS		="SELECT SUM(Valor) AS INGRESOS FROM Obrasgastos where Idobra = '$IdUS' and Muestra = 0 and Tipo = 'INGRESO' order by Fecha";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
						$INGRESOS		=$rowUSERS["INGRESOS"];
					 }
					 
					 $queryUSERS		="SELECT SUM(Valor) AS EGRESOS FROM Obrasgastos where Idobra = '$IdUS' and Muestra = 0 and Tipo = 'EGRESO' order by Fecha";
					 $resultUSERS		=mysql_query($queryUSERS, $id);
													
					 While($rowUSERS	=mysql_fetch_array($resultUSERS))
					 {
						$EGRESOS		=$rowUSERS["EGRESOS"];
					 }
					 
					 $TOTALT			=$INGRESOS-	$EGRESOS;
?>
<br/>
     <!--                           <table width="100%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> " >
                                  <tr>
                                    <td width="10%" height="33" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;</td>
                                    <td width="15%" align="right" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;</td>
                                    <td width="55%" align="right" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;  <?=$stilos?> ">&nbsp;TOTAL &nbsp</td>
                                    <td width="10%" style="font-size:10px; height:20px; border: 1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC; background-color:#D6EEC4">&nbsp;
                                      <?/*=number_format($TOTALT,0,'','.') */?></td>
                                    <td width="10%" align="right"></td>
                                  </tr>
                                </table>       -->                 

<!--
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
					<!-- Finalizando la tabla de pagos-->
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
function ValidarAbono(){

	var Abono=document.getElementById('Abono').value;
	var ValorActual=document.getElementById('ValorInicial').value;
	var resp=document.getElementById('resp');

	/* Variables a formatear*/
	var Dolar="$";
	var Guion="_";
	var Coma=",";
	var Punto=".";

	/*Fin de las variables*/

	/* Formateando las variables */

	Aban=Abono.replace("$","");
	Aban=Abono.replace("_","");
	Aban=Abono.replace(",","");

	ValorActual=ValorActual.replace("$","");
	ValorActual=ValorActual.replace("_","");
	ValorActual=ValorActual.replace(",","");
	/* Cierre del formateo de las variables */

	Aban=parseInt(Aban);
	ValorActual=parseInt(ValorActual);

	if(Aban>ValorActual){

		resp.innerHTML="<span style='height:30px;width:100px;' class='alert alert-danger'>¡Error! el valor del abono es mayor al valor actual.</span>";
		// alert(Aban);
		// alert(ValorActual);
	};
	if(Aban<ValorActual){
		
		resp.innerHTML="<span style='height:30px;width:100px;' class='alert alert-success'> Valor correcto. √ </span>";
	};
	if (Aban.value.length==0) {
		resp.innerHTML="<span></span>";
	};
	
	


}
</script>
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
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos
	


    $(AddButton).click(function (e) 
	{
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;

            //agregar campo
            $(contenedor).append('<div><table width="100%" border="0" style="font-size:11px; border-color:#E4E4E4;" cellpadding="0" cellspacing="0" height="20"><tr><td width="10%"><input type="text" name="cant'+ FieldCount +'" id="cant'+ FieldCount +'" placeholder="Cantidad" style="width:99%; font-size:11px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" required/></td> <td width="15%"><input type="text" name="plano'+ FieldCount +'" id="plano'+ FieldCount +'" placeholder="Obra" style="width:99%; font-size:11px;" onChange="javascript:this.value=this.value.toUpperCase();" onChange="javascript:this.value=this.value.toUpperCase();" onClick="window.open(&quot;lista-obras.php?Idcliente=<?=$Idcliente?>&Cont='+ FieldCount +'&quot;,&quot;precios&quot;,&quot;menubar=no,scrollbars=yes, width=600, height=600&quot;);return false" readonly/><input type="hidden" name="Idobra'+ FieldCount +'" id="Idobra'+ FieldCount +'"></td><td width="55%"><input type="text" name="descri'+ FieldCount +'" id="descri'+ FieldCount +'" placeholder="Descripcion" style="width:99%; font-size:11px;" onChange="javascript:this.value=this.value.toUpperCase();" required/> </td><td width="10%"><input type="text" name="vlr'+ FieldCount +'" id="vlr'+ FieldCount +'" placeholder="V/Unid" style="width:99%; font-size:11px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" required/></td><td width="10%" align="right"><a href="#" class="borrar"><img src="../../assets/img/delete.png" border = "0" style="margin-right:5px;"></a></td></tr></table></div>');

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
	

	
	
});
 
</script>

    <!-- END JAVASCRIPT CODES FOR THE CURRENT PAGE -->
        <!-- END JAVASCRIPT CODES -->        
        
 
	</body>
</html>
