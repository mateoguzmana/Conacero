			<!-- BEGIN NAVBAR -->
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="btn btn-transparent btn-equal btn-menu" href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a>
				    <div class="navbar-brand">
						<a class="main-brand" href="zona.php">
							<h3 class="text-light text-white"><span><strong><?=$NombreEmpresa?></strong> </span></h3>
						</a>
					</div><!--end .navbar-brand -->
					<a class="btn btn-transparent btn-equal navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse"><i class="fa fa-wrench fa-lg"></i></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="header-navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="zona.php"><i class="fa fa-home fa-lg"></i></a></li>
					</ul><!--end .nav -->
					<ul class="nav navbar-nav navbar-right">



<?
					$query000		="SELECT COUNT(*) AS TOTAL FROM Mensajes WHERE Estado = 0" ;
					$result000		=mysql_query($query000, $id);
					
					While($row000	=mysql_fetch_array($result000))
					{
					$TOTAL			=$row000["TOTAL"];
					}
?>
					  <!--<li><span class="navbar-devider"></span></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lg fa-money"></i><sup class="badge badge-support2">2</sup></a>
							<ul class="dropdown-menu animation-zoom">
								<li class="dropdown-header">Notificaciones de hoy</li>
								<li>
									<a class="alert alert-warning" href="javascript:void(0);">
										<img class="pull-right img-circle dropdown-avatar" src="../../assets/img/avatar2.jpg?1400333014" alt="" />
										<strong>Cuentas pagar</strong><br/>
										<small>Proveedor...</small><br/>
										<small>Deuda...</small>
									</a>
								</li>
								<li>
									<a class="alert alert-info" href="javascript:void(0);">
										<img class="pull-right img-circle dropdown-avatar" src="../../assets/img/avatar3.jpg?1400333021" alt="" /> 
										<strong>Cuentas cobrar</strong><br/>
										<small>Cliente...</small><br/>
										<small>Deuda</small>
									</a>
								</li>
								<li class="dropdown-header">Opciones</li>
								<li><a href="../../html/pages/login.html">Ver pagos pendientes <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
								<li><a href="../../html/pages/login.html">Ver cobros pendientes<span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown --> 

					  <li><span class="navbar-devider"></span></li>
						<li class="dropdown">
							<a href="javascript:void(0);" class="navbar-profile dropdown-toggle text-bold" data-toggle="dropdown"><?=$_SESSION['NombreR']?><i class="fa fa-fw fa-angle-down"></i></a>
							<ul class="dropdown-menu animation-slide">
                           	  <li class="divider"></li>
								<li><a href="perfil.php?Idmenu=2&Idsubmenu=1">Mi Cuenta</a></li>
								<li class="divider"></li>
								<li><a href="../../html/pages/salir.php"><i class="fa fa-fw fa-power-off text-danger"></i> Cerrar Sesion</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .nav -->
				</div><!--end #header-navbar-collapse -->
			</nav>
			<!-- END NAVBAR -->
