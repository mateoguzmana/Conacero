<?
session_start();

if (empty($_SESSION['sesionx']))
{
header("Location: login.php");
}

include("../../includes/conexion.php");


$Idtipo										=$_REQUEST["Idtipo"];


$SQL2 										="Delete From Permisos Where Idtipo = '$Idtipo'";
mysql_query($SQL2);	
						
						
						
					$cont					=0;
					$queryMen1				="SELECT* FROM Menu Order by Pos";
					$resultMen1				=mysql_query($queryMen1, $id);
					
					while($rowMen1			=mysql_fetch_array($resultMen1))
					{
					$IdMen1					=$rowMen1["Id"];
					$cont++;				
						
						$mostrarmen1		=$_REQUEST["mostrar".$IdMen1.$cont];
						$ingresarmen1		=$_REQUEST["ingresar".$IdMen1.$cont];
						$modificarmen1		=$_REQUEST["modificar".$IdMen1.$cont];
						$borrarmen1			=$_REQUEST["borrar".$IdMen1.$cont];
						
						$sql="INSERT INTO  Permisos (Idtipo, Men, Mos, Agr, Act, Del)";
						$sql.= "VALUES ('$Idtipo', '$IdMen1', '$mostrarmen1', '$ingresarmen1', '$modificarmen1', '$borrarmen1')";
						mysql_query($sql);	
						
						
						$mostrarmen1		=0;
						$ingresarmen1		=0;
						$modificarmen1		=0;
						$borrarmen1			=0;
						
						
						
							$queryMen2		="SELECT* FROM Menusub where Idmenu = '$IdMen1' Order by Pos";
							$resultMen2		=mysql_query($queryMen2, $id);
							
							while($rowMen2	=mysql_fetch_array($resultMen2))
							{
							$IdMen2			=$rowMen2["Id"];
							$cont++;
							
							
							$mostrarmen2		=$_REQUEST["mostrar".$IdMen1.$IdMen2.$cont];
							$ingresarmen2		=$_REQUEST["ingresar".$IdMen1.$IdMen2.$cont];
							$modificarmen2		=$_REQUEST["modificar".$IdMen1.$IdMen2.$cont];
							$borrarmen2			=$_REQUEST["borrar".$IdMen1.$IdMen2.$cont];
							
							$sql="INSERT INTO  Permisos (Idtipo, Men, Submenu, Mos, Agr, Act, Del)";
							$sql.= "VALUES ('$Idtipo', '$IdMen1', '$IdMen2', '$mostrarmen2', '$ingresarmen2', '$modificarmen2', '$borrarmen2')";
							mysql_query($sql);	
							
							
								$mostrarmen2		=0;
								$ingresarmen2		=0;
								$modificarmen2		=0;
								$borrarmen2			=0;
							
							
								$queryMen3		="SELECT* FROM Menuopc where Idmenu = '$IdMen1' and Idsub = '$IdMen2' Order by Pos";
								$resultMen3		=mysql_query($queryMen3, $id);
								
								while($rowMen3	=mysql_fetch_array($resultMen3))
								{
								$IdMen3				=$rowMen3["Id"];
								$cont++;
								
								$mostrarmen3		=$_REQUEST["mostrar".$IdMen1.$IdMen2.$IdMen3.$cont];
								$ingresarmen3		=$_REQUEST["ingresar".$IdMen1.$IdMen2.$IdMen3.$cont];
								$modificarmen3		=$_REQUEST["modificar".$IdMen1.$IdMen2.$IdMen3.$cont];
								$borrarmen3			=$_REQUEST["borrar".$IdMen1.$IdMen2.$IdMen3.$cont];
								
							
									$sql="INSERT INTO  Permisos (Idtipo, Men, Submenu, Opciones, Mos, Agr, Act, Del)";
									$sql.= "VALUES ('$Idtipo', '$IdMen1', '$IdMen2', '$IdMen3', '$mostrarmen3', '$ingresarmen3', '$modificarmen3', '$borrarmen3')";
									mysql_query($sql);
									
									$mostrarmen3		=0;
									$ingresarmen3		=0;
									$modificarmen3		=0;
									$borrarmen3			=0;
									
								}
								
							}
											
						
					}




				

?>
<script type="text/javascript">
alert('La operacion se realizo con exito.');
window.location.href = '<?=$_SESSION['anterior']?>';
</script>	


