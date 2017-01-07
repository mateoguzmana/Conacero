
<?
session_start(); 

include("../../includes/conexion.php");

$horaactual 			= date("Y-m-d H:i:s");
$fechahoy 				= date("Y-m-d");


		      $Id				=$_REQUEST["Id"];
          $Idpago   =$_REQUEST["Idpago"];

          $query      ="SELECT * FROM Informacion" ;
          $result     =mysql_query($query, $id);
    
          While($row    =mysql_fetch_array($result))
          {
          $NitM         =$row["Nit"];
          $NombreM      =utf8_decode($row["Nombre"]);
          $EmailM       =utf8_decode($row["Email"]);
          $PaisM        =utf8_decode($row["Pais"]);
          $CiudadM      =utf8_decode($row["Ciudad"]);
          $DirM         =utf8_decode($row["Dir"]);
          $TelefonoM    =utf8_decode($row["Telefono"]);
          $CelularM     =utf8_decode($row["Celular"]);
          $LogoM        =utf8_decode($row["Logo"]);
          $PieFactura   =utf8_decode($row["PieFactura"]);
          }


          $queryJAJA      ="SELECT * FROM HistorialCobros WHERE Id='$Idpago'";
          $resultJAJA     =mysql_query($queryJAJA,$id);
          while ($rowJAJA=mysql_fetch_array($resultJAJA)) 
          {
          $NumeroPago   =$rowJAJA["Id"];
          $FechaAbono   =$rowJAJA["FechaAbono"];      
          $Concepto     =utf8_decode($rowJAJA["Observaciones"]);
          $Abono        =$rowJAJA["Abono"];
          $Cuota        =$rowJAJA["Cuota"];
          $ValorReal    =$rowJAJA["ValorReal"];
          $Retencion    =$rowJAJA["Retencion"];
          $Muestra      =$rowJAJA["Muestra"];
          }
          if ($Muestra==1) {
          $Nulo="ANULADA";
          }

          $queryKAKA      ="SELECT * FROM Retenciones WHERE Valor='$Retencion' and Muestra=0";
          $resultKAKA     =mysql_query($queryKAKA,$id);
          while ($rowKAKA=mysql_fetch_array($resultKAKA)) 
          {
          $NombreTR       =$rowKAKA["Nombre"];
          }

		      $querySIN   ="SELECT * FROM Facturacion WHERE Id = '$Id'";
          $resultSIN    =mysql_query($querySIN, $id);
          
          While($rowSIN =mysql_fetch_array($resultSIN))
          {
          $TipoCuenta           =$rowSIN["TipoCuenta"];
          $NOpcion              =$rowSIN["Opcion"];
          $Idobra               =$rowSIN["Idobra"];
          $Idproveedor          =$rowSIN["Idcliente"];
          $NProveedor           =utf8_decode($rowSIN["Proveedor"]);
          $TipoCtaIni           =$rowSIN["TipoCta"];
          $NumeroCuentaIni      =$rowSIN["NumeroCuenta"];
          $FormaPagoIni         =$rowSIN["FormaPago"];
          $FechaInicio          =$rowSIN["FechaInicio"];
          $FechaFin             =$rowSIN["FechaFin"];
          $Periocidad           =$rowSIN["Periocidad"];
          $Valor                =$rowSIN["Valor"];
          $Val                  =$rowSIN["Total"];
          $Estado               =$rowSIN["Estado"];
          $Fecha                =$rowSIN["Fecha"];
          $ValorAbonado         =$rowSIN["ValorCobrado"];
          $Saldado              =($Val-$ValorAbonado);
          $Saldado              =number_format($Saldado,0,'','.');
          $ROpcion      =$NOpcion;

          if($Estado == 1 || $Estado == 2)
            {
            $ponebloqueo  = 'disabled';
            }
          }
          

          $queryMEN   ="SELECT* FROM Clientes WHERE Id='$Idproveedor'" ; 
          $resultMEN    =mysql_query($queryMEN, $id);
          
          while($rowMEN =mysql_fetch_array($resultMEN))
          {
          $IdProve            =$rowMEN["Id"];
          $Direccion          =utf8_decode($rowMEN["Dir"]);
          $Ciudad             =utf8_decode($rowMEN["Ciudad"]);
          $Cedula             =$rowMEN["Cedula"];
          $NombreProve        =utf8_decode($rowMEN["Nombre"]);
          $TipoCtaProve       =utf8_decode($rowMEN["TipoCuenta"]);
          $NumeroCuentaProve  =$rowMEN["NumeroCuenta"];
          $FormaPagoProve     =utf8_decode($rowMEN["FormaPago"]);
          $Banco              =utf8_decode($rowMEN["Banco"]);
          }
          

          $LineaMenuS     =$NombreTITMEN;


          $queryTITMEN    ="SELECT* FROM Obras WHERE Id = '$Idobra'" ;
          $resultTITMEN   =mysql_query($queryTITMEN, $id);
          
          While($rowTITMEN  =mysql_fetch_array($resultTITMEN))
          {
          $Nombreobra     =$rowTITMEN["Nombre"];
          }
          
          $queryRR    ="SELECT* FROM Obrasprov WHERE Idobra = '$Idobra'" ;
          $resultRR   =mysql_query($queryRR, $id);
          
          While($rowRR  =mysql_fetch_array($resultRR))
          {
          $Asunto     =$rowRR["Proveedor"];
          }
          
          $query10    ="SELECT * FROM Impuestos" ;
          $result10   =mysql_query($query10, $id);
          
          While($row10  =mysql_fetch_array($result10))
          {
          $Iva     =$row10["Iva"];
          }
		      
          /*$Ivas    =$Abono*$Iva;
          $Totals  =$Ivas+$Abono;

          $Ivas    =$Ivas.".00";
          $Totals  =$Totals.".00";*/
		      $Abono        =number_format($Abono,0,'','.');

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
          elseif($Estado == 1)
		  {
		  ?>
          PAGADA
          <?
		  }
		  ?>

		</td> 
        </tr>
      </table></td>
      <td width="250"align="left" valign="top"><table width="220" border="1px" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="220" height="94" align="center" valign="middle" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold;">RECIBO DE CAJA<br />
            <br />
            <span style="color: #F00">            <?=utf8_decode("Nº")?> <?=$NumeroPago?></span></td>
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
              <td width="386" align="left" style="font-size: 11px; font-family: Arial, Helvetica, sans-serif;"><?=$NombreProve?></td>
            </tr>
          </table>
          <? if(!empty($Idobra)){ ?>
          <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;OBRA:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$Nombreobra?></td>
              </tr>
            </table>
            <? } ?>
            <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;NIT:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$NitM?></td>
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
            </table>
          <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="114" height="20" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;NRO. FACTURA:</td>
                <td width="386" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;"><?=$Id?></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
      <? if($TipoCuenta=="2"){?>
      <td width="173">
      <table width="170" border="1px" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="170" height="121">
          
          <table width="140" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="140" height="15" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;FECHA DE INICIO</td>
              </tr>
          </table>
          
            <table width="160" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="160" height="20" align="left" bgcolor="#F3F3F3" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><?=$FechaInicio?> </td>
              </tr>
            </table>
            <table width="140" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="140" height="27" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;FECHA DE VENCIMIENTO</td>
              </tr>
            </table>
            <table width="160" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="160" height="20" align="left" bgcolor="#F3F3F3" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><?=$FechaFin?> </td>
              </tr>
          </table></td>
        </tr>
      </table></td><?}else{?>
      <td width="173">
      <table width="170" border="1px" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="170" height="121">
              <table width="140" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
              <td width="140" height="30" align="center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;color:red;text-align:center;"><h2>&nbsp;&nbsp;&nbsp;&nbsp;<?=$Nulo?></h2></td>
              </tr>
              </table>
            <table width="140" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="140" height="27" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;FECHA DE PAGO</td>
              </tr>
            </table>
            <table width="160" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="160" height="20" align="left" bgcolor="#F3F3F3" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><?=$FechaAbono?> </td>
              </tr>
          </table></td>
        </tr>
      </table>
    </td>  
          <? } ?>
    </tr>
  </table>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="571" align="left"><table width="571" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="571" height="31" align="left"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Descripci<?=utf8_decode("ó")?>n</span></td>
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
      <td width="571" valign="top"><table width="571" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="571" height="534" valign="top"><table width="571" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="571" height="5" align="left">&nbsp;</td>
            </tr>
          </table>
            <table width="571" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="10" height="35" align="left">&nbsp;</td>
                <td width="355" align="left">
                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
                  <?=$Concepto?>
                </span></td>
              </tr>
            </table>
</td>
        </tr>
      </table></td>
      <td width="129" valign="top"><table width="120" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="534" valign="top"><table width="116" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
            <tr>
              <td width="116" height="5" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</td>
            </tr>
          </table>
            <table width="116" border="0" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
              <tr>
                <td width="116" height="35" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">$&nbsp;<?=$Abono?></td>
              </tr>
            </table>
          </td>
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
          <td width="120" height="33" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span>Saldo</td>
        </tr>
      </table></td>
      <td width="129" align="left"><table width="120" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E9">
        <tr>
          <td width="120" height="33" align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">$ <?=$Saldado?><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;</span></td>
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
          <td width="120" height="33" align="right"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">$ <?=$Abono?><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;</span><span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px;">&nbsp;&nbsp;&nbsp;</span></span></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <page_footer></page_footer>
</page>

