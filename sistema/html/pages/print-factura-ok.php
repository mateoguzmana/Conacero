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
		
		
		$query			="SELECT* FROM Facturacion where Id = '$Id' ORDER BY Id Desc" ;
		$result			=mysql_query($query, $id);
		
		While($row		=mysql_fetch_array($result))
		{
		$Nit			     =$row["Nit"];
		$Razon			   =utf8_decode($row["Razon"]);
		$Direccion		 =utf8_decode($row["Direccion"]);
		$Telefono		   =utf8_decode($row["Telefono"]);
		$Ciudad			   =utf8_decode($row["Ciudad"]);
		$Fechaf			   =utf8_decode($row["Fechafact"]);
		$Fechau			   =utf8_decode($row["Fechalim"]);
		$Idcotiz		   =utf8_decode($row["Id"]);
		$Ciudad			   =utf8_decode($row["Ciudad"]);
		$Valors			   =($row["Valor"]);
		$Totals			   =($row["Total"]);
		$Ivas			     =($row["Iva"]);
		
    

    $Utilidad      =($Ivas*0.05);
    $Completo      =($Ivas+$Valors);
		$Valors			   =number_format($Valors,0,'','.');
		$Totals			   =number_format($Totals,0,'','.');
		$Ivas			     =number_format($Ivas,0,'','.');
    $Utilidad      =number_format($Utilidad,0,'','.');
    $Completo      =number_format($Completo,0,'','.');
    
    
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
          if($Estado == 0)
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
		  }
		  ?>
		</td> 
        </tr>
      </table></td>
      <td width="250"align="left" valign="top"><table width="220" border="1px" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="220" height="94" align="center" valign="middle" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold;">FACTURA DE VENTA<br />
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
              <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;CLIENTE:</td>
              <td width="386" align="left" style="font-size: 11px; font-family: Arial, Helvetica, sans-serif;"><?=$Razon?></td>
            </tr>
          </table>
          
          
            <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;NIT:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$Nit?></td>
              </tr>
            </table>
            <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;DIRECCION:</td>
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
              <td width="140" height="15" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;FECHA DE FACTURACION</td>
              </tr>
          </table>
          
            <table width="160" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="160" height="20" align="left" bgcolor="#F3F3F3" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><?=$Fechaf?> </td>
              </tr>
            </table>
            <table width="140" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="140" height="27" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;FECHA DE VENCIMIENTO</td>
              </tr>
            </table>
            <table width="160" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="160" height="20" align="left" bgcolor="#F3F3F3" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><?=$Fechau?> </td>
              </tr>
          </table></td>
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
      <td width="385" align="left"><table width="375" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="375" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Descripci<?=utf8_decode("ó")?>n</span></td>
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
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" <?if($Estado==0){ ?> style="background-image:url(../../assets/img/marca.jpg); background-position:center; background-repeat:no-repeat" <?}?>>
    <tr>
      <td width="60" height="549" valign="top"><table width="50" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="50" height="534" valign="top"><table width="40" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="40" height="5" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</td>
            </tr>
          </table>
            <?
		$query						="SELECT* FROM Facturacionmov where Idfact = '$Idcotiz'" ;
		$result						=mysql_query($query, $id);
		
		while($row					=mysql_fetch_array($result))
		{
		$Cant						= $row["Cant"];

?>
            <table width="40" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="40" height="35" align="center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;
                  <?=$Cant?></td>
              </tr>
            </table>
<?
		$Cant						=0;  
		}
?></td>
        </tr>
      </table></td>
      <td width="385" valign="top"><table width="375" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="375" height="534" valign="top"><table width="365" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="365" height="5" align="left">&nbsp;</td>
            </tr>
          </table>
            <?
		$query						="SELECT* FROM Facturacionmov where Idfact = '$Idcotiz'" ;
		$result						=mysql_query($query, $id);
		
		while($row					=mysql_fetch_array($result))
		{
		$Plano						  = $row["Idobra"];
		$Descripcion				= $row["Descripcion"];
?>
            <table width="365" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="10" height="35" align="left">&nbsp;</td>
                <td width="355" align="left">
                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
                  <?=$Plano?> - <?=$Descripcion?>
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
		$query						="SELECT* FROM Facturacionmov where Idfact = '$Idcotiz'" ;
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
		$query						="SELECT* FROM Facturacionmov where Idfact = '$Idcotiz'" ;
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
        <?=nl2br($PieFactura);?>
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
            <td width="120" height="33" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>IVA</span></td>
          </tr>
      </table></td>
      <td width="129" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="right"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">$ <?=$Ivas?><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;</span></span></td>
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

