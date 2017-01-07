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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Crear Factura</a></li>
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
												<form class="form-horizontal form-validate" role="form" method="post" action="add-factura.php" novalidate>
                                                        <?
														}
														else
														{
														?>
												<form class="form-horizontal form-validate" role="form" method="post"  novalidate>
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
                                                              	<input name="Idcliente" id="Idcliente" type="hidden" value="<?=$Idcliente?>">
                                                                <select name="jumpMenu" id="jumpMenu" class="form-control" onChange="MM_jumpMenu('parent',this,0)" data-placeholder="Seleccione el Cliente" style="background-color:#CCC">
            
                                                                        <?
                                                                        if(!empty($Idcliente))
																		{
																		?>
                                                                        <option value="add-factura.php?Idcliente=<?=$Idcliente?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>" selected><?=$Nombreclien?></option>
                                                                        <?
																		}
																		else
																		{
																		?>
                                                                        <option value="add-factura.php" selected>Seleccione el Cliente</option>
                                                                        <?
																		}
																		
                                                                        $queryTIP		="SELECT* FROM Clientes where Muestra = 0 and Id <> '$Idcliente' order by Nombre";
                                                                        $resultTIP		=mysql_query($queryTIP, $id);
                                                                        
                                                                        While($rowTIP	=mysql_fetch_array($resultTIP))
                                                                        {
                                                                        $IdTIP			=$rowTIP["Id"];
																		$NombreTIP		=$rowTIP["Nombre"];
                                                                        ?>
                                                                        <option value="add-factura.php?Idcliente=<?=$IdTIP?>&Idmenu=<?=$Idmenux?>&Idmenu=<?=$Idmenux?>&Idsubmenu=<?=$Idsubmenux?>&Idopcmenu=<?=$Idopcmenux?>"><?=$NombreTIP?></option>
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
                                                                	<input type="text" name="Ubicacion" id="Nit" class="form-control" placeholder="Nit del Cliente" value="<?=$Nitclien?>" readonly style="background-color: #CCC">
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
                                                                	<input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Direccion del Cliente" value="<?=$Dirclien?>" readonly style="background-color:#CCC">
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                                    <label class="control-label">Ciudad</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="Ciudad" id="Ciudad" value ="<?=$Ciudadclien?>" placeholder="Ciudad del Cliente" readonly style="background-color:#CCC">
                                                                </div>
                                                            </div>
														</div>












                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Inicio" class="control-label">Fecha Factura</label>
																</div>
                                                                
                                                                <div class="col-md-10">
                                                                    <div class='input-group control-width-normal' id='demo-date'>
                                                                        <input type="text" name="Fechainicio" class="form-control" id='demo-date-inline' placeholder="Fecha de Facturacion" required data-date-format="yyyy-mm-dd"/>
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                                                                    <div class='input-group control-width-normal' id='demo-date-end'>
                                                                        <input type="text" class="form-control" name="Fechafin" id='demo-date-inline' required placeholder="Fecha de vencimiento" />
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                                                                  <textarea name="Descripcion" rows="3" required class="form-control" id="Descripcion" placeholder="Detalles de la Factura" onChange="javascript:this.value=this.value.toUpperCase();"></textarea>
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
                                    <td width="15%">&nbsp;OBRA</td>
                                    <td width="55%">&nbsp;DESCRIPCIÓN</td>
                                    <td width="10%">&nbsp;V/UNID.</td>
                                    <td width="10%" align="right">
                                    <a id="agregarCampo" href="#" style="border:0px;"><img src="../../assets/img/add.png" border= "0"></a></td>
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
    <div class="added">
                                <table width="100%" border="0" style="font-size:10px; font-weight:bold; border-color:#E4E4E4" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10%"><input type="text" name="cant1" id="cant1" placeholder="CANT 1" style="width:99%; font-size:9px;" required/></td>
                                    <td width="15%"><input type="text" name="plano1" id="plano1" placeholder="<?=$poner?> 1" style="width:99%; font-size:9px;" required/></td>
                                    <td width="55%"><input type="text" name="descri1" id="descri1" placeholder="DESCRIPCIÓN 1" style="width:99%; font-size:9px;" required/></td>
                                    <td width="10%"><input type="text" name="vlr1" id="vlr1" required placeholder="V/UNID 1" style="width:99%; font-size:9px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));"/></td>
                                    <td width="10%" align="right">
                                    <a href="#" class="eliminar"><img src="../../assets/img/delete.png" border = "0"></a></td>
                                  </tr>
                                </table>






    
        
        
    </div>
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
                                                        if($MosPerz1 == 1)
														{
														?>
															<br/><br/><button type="submit" class="btn btn-primary">Realizar Operación</button>
                                                        <?
														}
														?> 
														</div>
													</div>
                                                    
                                                    
<?
}
?>
                                                    
                                                    

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
        
		<script src="../../assets/js/libs/select2/select2.min.js"></script>
		<script src="../../assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
		<script src="../../assets/js/libs/multi-select/jquery.multi-select.js"></script>
		<script src="../../assets/js/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../../assets/js/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
        <script src="../../assets/js/libs/bootstrap-datetimepicker/locales/bootstrap-datetimepicker.es.js"></script>
		<script src="../../assets/js/core/demo/DemoFormComponents.js"></script>
		<script src="../../assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
		<script src="../../assets/js/core/App.js"></script>
		<script src="../../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->



<script type="text/javascript">
 
$(document).ready(function() {

    var MaxInputs       = 50; //Número Maximo de Campos
    var contenedor      = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;

            //agregar campo
            $(contenedor).append('<div><table width="100%" border="0" style="font-size:10px; font-weight:bold; border-color:#E4E4E4;" cellpadding="0" cellspacing="0"><tr><td width="10%"><input type="text" name="cant'+ FieldCount +'" id="cant'+ FieldCount +'" placeholder="CANT '+ FieldCount +'" style="width:99%; font-size:9px;" required/></td> <td width="15%"><input type="text" name="plano'+ FieldCount +'" id="plano'+ FieldCount +'" placeholder="<?=$poner?> '+ FieldCount +'" style="width:99%; font-size:9px;" required/></td><td width="55%"><input type="text" name="descri'+ FieldCount +'" id="descri'+ FieldCount +'" placeholder="DESCRIPCION '+ FieldCount +'" style="width:99%; font-size:9px;" required/> </td><td width="10%"><input type="text" name="vlr'+ FieldCount +'" id="vlr'+ FieldCount +'" placeholder="V/UNID '+ FieldCount +'" style="width:99%; font-size:9px;" onKeyUp="puntitos(this,this.value.charAt(this.value.length-1));" required/></td><td width="10%" align="right"><a href="#" class="eliminar"><img src="../../assets/img/delete.png" border = "0"></a></td></tr></table></div>');

            x++; //text box increment
        }
        return false;
    });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
});
 
</script>

    <!-- END JAVASCRIPT CODES FOR THE CURRENT PAGE -->
        <!-- END JAVASCRIPT CODES -->        
        
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
