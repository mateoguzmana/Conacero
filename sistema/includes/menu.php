			    <!-- BEGIN MAIN MENU -->
			    <ul class="main-menu">
			      <!-- Menu Dashboard -->
                  
                  
<?
					$tipouzer		=$_SESSION['tipo'];
					$Idmenux		=$_REQUEST["Idmenu"];
					$Idsubmenux		=$_REQUEST["Idsubmenu"];
					$Idopcmenux		=$_REQUEST["Idopcmenu"];

					$conMenu		=0;
					
					$queryMenu		="SELECT* FROM Menu order by Pos" ;
					$resultMenu		=mysql_query($queryMenu, $id);
					
					While($rowMenu	=mysql_fetch_array($resultMenu))
					{
					$NombreMenu		=$rowMenu["Nombre"];
					$UrlMenu		=$rowMenu["Url"];
					$IdMenu			=$rowMenu["Id"];
					$MosPers1		=	0;
					
					
					
							$queryPers1			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$IdMenu' and Submenu = '0' and Opciones = '0' ";
							$resultPers1		=mysql_query($queryPers1, $id);
							
							while($rowPers1		=mysql_fetch_array($resultPers1))
							{
							$MosPersA			=$rowPers1["Mos"];
							
							
								if($MosPersA > 0)
								{
								$MosPers1	=	1;
								}
							}
					
							
							
							
					
							if($UrlMenu	==	'#')
							{
							$UrlMenu	=	'javascript:void(0);';	
							$addMenu	=	'<span class="expand-sign">+</span>';
							}
							else
							{
							$UrlMenu		=$UrlMenu;
							}
							
							$conMenu++;
							
							
							if(empty($Idmenux))
							{
								if($conMenu == 1)
								{
								$Activa	=	'class="active"';
								}
								else
								{
								$Activa	=	'';		
								}
							}
							elseif($IdMenu	== $Idmenux)
							{
								$Activa	=	'class="active"';
							}
							else
							{
								$Activa	=	'';	
							}
							
							

							

										if($MosPers1 == 1)
										{							
?>



                                            <li> 
                                            <a href="<?=$UrlMenu?>?Idmenu=<?=$IdMenu?>" <?=$Activa?>> <i class="fa fa-th fa-fw"></i><span class="title"><?=$NombreMenu?></span> <?=$addMenu?></a> 
                                            
                                            <?
                                            ///////////Menusub
                                            if($UrlMenu =! 'javascript:void(0);')
                                            {
                                            ?>
                                            
                                            </li>
                                           
                                            <?
                                            }
                                            else
                                            {
                                            ?>
                    
                                                            <!--start submenu -->
                                                            <ul>
                                                  
                                                                    <?
                                    
                                                               
                                                                    
                                                                    $querySUBMenu		="SELECT* FROM Menusub where Idmenu = '$IdMenu' order by Pos" ;
                                                                    $resultSUBMenu		=mysql_query($querySUBMenu, $id);
                                                                    
                                                                    While($rowSUBMenu	=mysql_fetch_array($resultSUBMenu))
                                                                    {
                                                                    $NombreSUBMenu		=$rowSUBMenu["Nombre"];
                                                                    $UrlSUBMenu			=$rowSUBMenu["Url"];
                                                                    $IdSUBMenu			=$rowSUBMenu["Id"];
																	
																	$MosPers2		=	0;
																	
																	
																	
																			$queryPers2			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$IdMenu' and Submenu = '$IdSUBMenu' and Opciones = '0' ";
																			$resultPers2		=mysql_query($queryPers2, $id);
																			
																			while($rowPers2		=mysql_fetch_array($resultPers2))
																			{
																			$MosPersB			=$rowPers2["Mos"];
																			
																			
																				if($MosPersB > 0)
																				{
																				$MosPers2	=	1;
																				}
																			}
																	
																	
																	
                                                                    
																		if($UrlSUBMenu	==	'#')
																		{
																		$UrlSUBMenu		=	'javascript:void(0);';
																		$addSUBMenu		=	'<span class="expand-sign">+</span>';	
																		$TitleSUBMenu	=	'<span class="title">';
																		$ENDTitleSUBMenu=	'</span>';
																		}
																		else
																		{
																		$UrlSUBMenu		=$UrlSUBMenu;
																		$addSUBMenu		=	'';
																		$TitleSUBMenu	=	'';
																		$ENDTitleSUBMenu=	'';
																		}
																		
																
																		
																		

																		if(($IdSUBMenu	== $Idsubmenux))
																		{
																			if(empty($Idopcmenux))
																			{
																			$ActivaS	=	'class="active"';
																			}
																			else
																			{
																			$ActivaS	=	'';	
																			}
																		}
																		else
																		{
																			$ActivaS	=	'';	
																		}
																		
																		
																		
																		
																		
																		
																		
																		if($MosPers2)
																		{
                                    
                                                                    ?>





            
                                                                                    <li>
                                               <a href="<?=$UrlSUBMenu?>?Idmenu=<?=$IdMenu?>&Idsubmenu=<?=$IdSUBMenu?>" <?=$ActivaS?>> <?=$TitleSUBMenu?><?=$addSUBMenu?><?=$ENDTitleSUBMenu?> <?=$NombreSUBMenu?>  </a>
                                                                                  
                                                                        
                                                                        
                                                                        
                                                                                    <?
                                                                                    ///////////Menuopc
                                                                                    if($UrlSUBMenu =! 'javascript:void(0);')
                                                                                    {
                                                                                    ?>
                                                                                    </li>
                                                                                    <?
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    ?> 
                        
                        
                                                                                                    <!--start submenu -->
                                                                                                    <ul>
                                                                                                    <?

                                                                                                    $querySUBMenuO		="SELECT* FROM Menuopc where Idmenu	= '$IdMenu' and Idsub = '$IdSUBMenu' order by Pos" ;
                                                                                                    $resultSUBMenuO		=mysql_query($querySUBMenuO, $id);
                                                                                                    
                                                                                                    While($rowSUBMenuO	=mysql_fetch_array($resultSUBMenuO))
                                                                                                    {
                                                                                                    $NombreSUBMenuO		=$rowSUBMenuO["Nombre"];
                                                                                                    $UrlSUBMenuO		=$rowSUBMenuO["Url"];
                                                                                                    $IdSUBMenuO			=$rowSUBMenuO["Id"];
																									
																									
																									
																									
																									$MosPers3		=	0;
																	
																	
																	
																									$queryPers3			="SELECT* FROM Permisos where Idtipo = '$tipouzer'  and Men = '$IdMenu' and Submenu = '$IdSUBMenu' and Opciones = '$IdSUBMenuO' ";
																									$resultPers3		=mysql_query($queryPers3, $id);
																									
																									while($rowPers3		=mysql_fetch_array($resultPers3))
																									{
																									$MosPersC			=$rowPers3["Mos"];
																									
																									
																										if($MosPersC > 0)
																										{
																										$MosPers3	=	1;
																										}
																									}
																									
																									
																									
																									
																									
                                                                                                    
																											if($UrlSUBMenuO	==	'#')
																											{
																											$UrlSUBMenuO		=	'javascript:void(0);';	
																											$addSUBMenuO		=	'<span class="expand-sign">+</span>';	
																											$TitleSUBMenuO		=	'<span class="title">';
																											$ENDTitleSUBMenuO	=	'</span>';
																											}
																											else
																											{
																											$UrlSUBMenuO		=	$UrlSUBMenuO;
																											$TitleSUBMenuO		=	'';
																											$ENDTitleSUBMenuO	=	'';
																											}
																											

																											if($IdSUBMenuO	== $Idopcmenux)
																											{
																												$ActivaSO	=	'class="active"';
																											}
																											else
																											{
																												$ActivaSO	=	'';	
																											}
                                                
																						
																												if($MosPers3)
																												{
												
												
                                                                                                        ?>
                                                                                        
                                                                                                                 <li><a href="<?=$UrlSUBMenuO?>?Idmenu=<?=$IdMenu?>&Idsubmenu=<?=$IdSUBMenu?>&Idopcmenu=<?=$IdSUBMenuO?>" <?=$ActivaSO?>><?=$NombreSUBMenuO?> <?=$addSUBMenuO?></a></li>
																									<?
																												}
                                                                                                    }
                                                                                                    ?>
                                                
                                                                                                    </ul><!--end /submenu -->
                                                
                                                                                    </li>
                                                                                    <?
                                                                                    }
																	}
																	}
																					
                                                                                    ?> 
                                                                                    
                                                                                    
                                                                                    
                                                            </ul>
                                            </li> 
                                           
                                            <?
											}
					}
					
					}
                                            ?>

                  
                  

		        </ul>
			    <!--end .main-menu -->
			    <!-- END MAIN MENU -->