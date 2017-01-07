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
											<li class="active"><a href="#editDetails"><i class="fa fa-edit"></i> Informacion de la Obra</a></li>
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
												<form class="form-horizontal form-validate" role="form" method="post" action="ing-obra2.php" novalidate>
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
                                                                
                                                                
                                                                <select name="Cliente" id="Cliente" class="form-control select2-list" data-placeholder="Seleccione el Cliente" required>
            
                                                                        <option value="" selected>Seleccione el Cliente</option>

																		<?
                                                                        $queryTIP		="SELECT* FROM Clientes where Muestra = 0 order by Nombre";
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
																	<input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre de la Obra" value="" onChange="javascript:this.value=this.value.toUpperCase();" required data-rule-minlength="3">
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
                                                                        <input type="text" name="Fechainicio" class="form-control" id='demo-date-inline' placeholder="Fecha de inicio" required data-date-format="yyyy-mm-dd"/>
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                                                                        <input type="text" class="form-control" name="Fechafin" id='demo-date-inline' required placeholder="Fecha de entrega" />
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                
                                                                
															</div>
														</div>
                                                        
                                                        
                                                        
                                                        
														<div class="col-sm-6">
															<div class="form-group">
																<div class="col-lg-2 col-md-4 col-sm-6">
																	<label for="Ubicacion" class="control-label">Ubicación</label>
																</div>
																<div class="col-lg-10 col-md-8 col-sm-6">
                                                                	<input type="text" name="Ubicacion" id="Ubicacion" class="form-control" placeholder="Ubicación de la Obra" onChange="javascript:this.value=this.value.toUpperCase();" required>
																</div>
															</div>
														</div>
                                                        
                                                        
                                                        
														<div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label">Valor</label>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <input type="text" class="form-control dollar-mask" name="Valor" id="Valor"  placeholder="Valor de la Obra">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <select name="Utilidad" id="Utilidad" class="form-control select2-list" data-placeholder="Utilidad" required>
                                                                        <option value="" selected>Seleccione el valor de la utilidad</option>
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
                                                                  <textarea name="Descripcion" rows="3" required class="form-control" id="Descripcion" placeholder="Descripción de la Obra" onChange="javascript:this.value=this.value.toUpperCase();"></textarea>
																</div>
															</div>
														
                                                        

													
                                                    
                                                    

                                                     
                                                     
                                                     
                                                     
                                                     
                                                        
                                                        
                                                        

                                                        
                                                        
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="col-lg-2 col-md-4 col-sm-6">
															<label for="password1" class="control-label">Proveedores</label>
														</div>
														<div class="col-lg-10 col-md-8 col-sm-6">
																			<select class="form-control" name="sel1" size="15" multiple="multiple" id ="sel1">
																			<?
                                                                             $queryUSERS		="SELECT* FROM Proveedores where Muestra = 0 Order by Nombre";
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
                                                         


                                                            <a href="#" onClick="moveOptions('sel1','sel2');"><img src="../../assets/img/agre.png" border="0"></a>
                                                            <a href="#" onClick="moveOptions('sel2', 'sel1');"><img src="../../assets/img/rem.png" border="0"></a>


                                                            
														</div>
														<div class="col-lg-10 col-md-8 col-sm-6">
															<select name="sel2" size="15" class="form-control" multiple="multiple" id="sel2"></select>
                                                            <input name="hidY" type="hidden" id="hidY" />
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
															<button type="submit" class="btn btn-primary">Realizar Operación</button>
                                                        <?
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
