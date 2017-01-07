<?
session_start(); 

include("../../includes/conexion.php");

$horaactual 			= date("Y-m-d H:i:s");
$fechahoy 				= date("Y-m-d");


		$Id				=$_REQUEST["Id"];
		
		$query			="SELECT* FROM Informacion" ;
		$result			=mysql_query($query, $id);
		
		While($row		=mysql_fetch_array($result))
		{
		$NitM			  =$row["Nit"];
		$NombreM		=utf8_decode($row["Nombre"]);
		$EmailM			=utf8_decode($row["Email"]);
		$PaisM			=utf8_decode($row["Pais"]);
		$CiudadM		=utf8_decode($row["Ciudad"]);
		$DirM			  =utf8_decode($row["Dir"]);
		$TelefonoM	=utf8_decode($row["Telefono"]);
		$CelularM		=utf8_decode($row["Celular"]);
		$LogoM			=utf8_decode($row["Logo"]);
    $PieFactura =utf8_decode($row["PieFactura"]);


		}
		
		
		$query			   ="SELECT* FROM Actasobra where Id = '$Id' ORDER BY Id Desc" ;
		$result			   =mysql_query($query, $id);
		
		While($row		 =mysql_fetch_array($result))
		{
    $Proveedor     =utf8_decode($row["Idproveedor"]);
    $Obra          =$row["Idobra"];
		$Fechaf			   =utf8_decode($row["Fechafact"]);
		$Ciudad			   =utf8_decode($row["Ciudad"]);
    $Contrato      =utf8_decode($row["Contrato"]);
		$Valors			   =($row["Valor"]);
		$Totals			   =($row["Total"]);
    $ValorRte      =$row["ValorRte"];
		
    $queryQQ         ="SELECT * FROM Proveedores where Id = '$Proveedor' ORDER BY Id Desc" ;
    $resultQQ        =mysql_query($queryQQ, $id);
    
    while($rowQQ     =mysql_fetch_array($resultQQ))
    {
    $NombreProveedor =utf8_decode($rowQQ["Nombre"]);
    $Cedula          =$rowQQ["Cedula"];
    $Direccion       =$rowQQ["Dir"];
    }

    $queryKK         ="SELECT * FROM Obras where Id = '$Obra' ORDER BY Id Desc" ;
    $resultKK        =mysql_query($queryKK, $id);
    
    while($rowKK     =mysql_fetch_array($resultKK))
    {
    $NombreObra =utf8_decode($rowKK["Nombre"]);
    }

    $Completo      =($Totals);
		$Valors			   =number_format($Valors,0,'','.');
		$Totals			   =number_format($Totals,0,'','.');
		$Ivas			     =number_format($Ivas,0,'','.');
    $Utilidad      =number_format($Utilidad,0,'','.');
    $Completo      =number_format($Completo,0,'','.');
    $ValorRte      =number_format($ValorRte,0,'','.');
    
    
		}
		

		
?>
<style>
table {
text-align:justify;
}
td {
text-align:justify;
}
</style>
<page backtop="0mm" backbottom="0mm" backleft="4mm" backright="4mm">
  
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="228" height="110"align="left" valign="top"><img src="logo/<?=$LogoM?>" height="100" /></td>
      <td width="222"align="left" valign="top"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="200" height="94" align="left" valign="middle" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; color: #6ab8c2;">
          <?
         /* if($Estado == 0)
		  {
		  ?>
          SIN FINALIZAR
          <?
		  }
          elseif($Estado == 2)
		  {
		  ?>
          ANULADA
          <?
		  } */
		  ?>
		</td> 
        </tr>
      </table></td>
      <td width="250"align="left" valign="top"><table width="220" border="1px" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="220" height="94" align="center" valign="middle" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold;">ACTA OBRA<br />
            <br />
            <span style="color: #F00">            <?=utf8_decode("Nº")?> <?=$Id?></span></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="700" height="25"align="center" bgcolor="#F0F0F0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10px;"> 
      <strong><?=$NombreM?></strong> |  NIT. <?=$NitM?> | TELEFONO: <?=$TelefonoM?> | <?=$DirM?> -  <?=$CiudadM?> <?=$PaisM?> </td>
    </tr>
  </table>
  <br />
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="527" height="118" align="left">
      
      <table width="517" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="517" height="121">
          
          
          <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;PROVEEDOR:</td>
              <td width="386" align="left" style="font-size: 11px; font-family: Arial, Helvetica, sans-serif;"><?=$NombreProveedor?></td>
            </tr>
          </table>
          <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;OBRA:</td>
              <td width="386" align="left" style="font-size: 11px; font-family: Arial, Helvetica, sans-serif;"><?=$NombreObra?></td>
            </tr>
          </table>
            <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;CONTRATO:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$Contrato?></td>
              </tr>
            </table>
            <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;DIRECCI<?=utf8_decode("Ó")?>N:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$Direccion?></td>
              </tr>
            </table>
            <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;CIUDAD:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$Ciudad?> (Colombia)</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
      <td width="173">
      
      <table width="170" border="1px" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="170" height="121">
          
          <table width="140" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="140" height="15" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;FECHA DE FACTURACI<?=utf8_decode("Ó")?>N</td>
              </tr>
          </table>
          
            <table width="160" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="160" height="20" align="left" bgcolor="#F3F3F3" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><?=$Fechaf?> </td>
              </tr>
            </table>
          </td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="60" height="49" align="left"><table width="50" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="50" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Cant.</span></td>
        </tr>
      </table></td>
      <td width="285" align="left"><table width="275" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="275" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Descripci<?=utf8_decode("ó")?>n</span></td>
        </tr>
      </table></td>
      <td width="95" align="left"><table width="85" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="85" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Unidad</span></td>
        </tr>
      </table></td>
      <td width="126" align="left"><table width="120" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Vlr. Unitario</span></td>
        </tr>
      </table></td>
      <td width="129" align="left"><table width="120" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
          <tr>
            <td width="120" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Vlr. Neto</span></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="60" height="549" valign="top"><table width="50" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="50" height="534" valign="top"><table width="40" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="40" height="5" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</td>
            </tr>
          </table>
            <?
		$query						="SELECT* FROM Movacta where Idacta = '$Id'" ;
		$result						=mysql_query($query, $id);
		
		while($row					=mysql_fetch_array($result))
		{
		$Cant						= $row["Cant"];

?>
            <table width="40" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="40" height="35" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;
                  <?=$Cant?></td>
              </tr>
            </table>
<?
		$Cant						=0;  
		}
?></td>
        </tr>
      </table></td>
      <td width="285" valign="top"><table width="275" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="275" height="534" valign="top"><table width="265" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="265" height="5" align="left">&nbsp;</td>
            </tr>
          </table>
            <?
		$query						="SELECT* FROM Movacta where Idacta = '$Id'" ;
		$result						=mysql_query($query, $id);
		
		while($row					=mysql_fetch_array($result))
		{
		$Plano						  = $row["Idobra"];
		$Descripcion				= utf8_decode($row["Descripcion"]);
?>
            <table width="265" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="10" height="35" align="left">&nbsp;</td>
                <td width="255" align="left">
                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
                  <?=$Descripcion?>
                </span></td>
              </tr>
            </table>
<?
		}
?>
</td>
        </tr>
      </table></td>
      <td width="80" valign="top"><table width="70" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="70" height="534" valign="top"><table width="70" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="70" height="5" align="left">&nbsp;</td>
            </tr>
          </table>
            <?
    $query            ="SELECT* FROM Movacta where Idacta = '$Id'" ;
    $result           =mysql_query($query, $id);
    
    while($row          =mysql_fetch_array($result))
    {
    $Unidad        = $row["Unidad"];
?>
            <table width="70" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="10" height="35" align="left">&nbsp;</td>
                <td width="70" align="left">
                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
                  <?=$Unidad?>
                </span></td>
              </tr>
            </table>
<?
    }
?>
</td>
        </tr>
      </table></td>
      <td width="126" valign="top"><table width="120" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="534" valign="top"><table width="116" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="116" height="5" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</td>
            </tr>
          </table>
        <?
		$query						="SELECT* FROM Movacta where Idacta = '$Id'" ;
		$result						=mysql_query($query, $id);
		
		while($row					=mysql_fetch_array($result))
		{
		$Valox						= $row["Neto"];
		$Valox						=number_format($Valox,0,'','.');
		
?>
            <table width="116" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="116" height="35" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">$ <?=$Valox?></td>
              </tr>
            </table>
            <?
		$Valox						= 0;
			
		}
?></td>
        </tr>
      </table></td>
      <td width="129" valign="top"><table width="120" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="534" valign="top"><table width="116" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="116" height="5" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</td>
            </tr>
          </table>
            <?
		$query						="SELECT* FROM Movacta where Idacta = '$Id'" ;
		$result						=mysql_query($query, $id);
		
		while($row					=mysql_fetch_array($result))
		{
		$Valor						= $row["Valor"];
		$Valor						=number_format($Valor,0,'','.');
		
?>
            <table width="116" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="116" height="35" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">$ <?=$Valor?></td>
              </tr>
            </table>
          <?
		$Cant						= 0;
		$Valor						= 0;
		  
		}
?></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="431" height="118" rowspan="3" align="left" style="font-size: 10px; font-family: Arial, Helvetica, sans-serif; text-align:justify;">
        <?//=nl2br($PieFactura);?>
    </td>
      <td width="14" rowspan="3" align="left" style="font-size: 10px; font-family: Arial, Helvetica, sans-serif; text-align:justify;">&nbsp;</td>
      <td width="126" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span>Subtotal</td>
        </tr>
      </table></td>
      <td width="129" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">$ <?=$Valors?><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;</span></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="126" height="45" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
          <tr>
            <td width="120" height="33" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Valor Rte.</span></td>
          </tr>
      </table></td>
      <td width="129" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="right"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">$ <?=$ValorRte?><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;</span></span></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td width="126" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Total</span></td>
        </tr>
      </table></td>
      <td width="129" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="right"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">$ <?=$Completo?><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;</span></span></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <page_footer></page_footer>
</page>

