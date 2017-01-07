<?
session_start();

include("../../includes/conexion.php");


$query="SELECT * FROM CuentasCobrar WHERE Estado=4 AND TipoCuenta=2";
$result=mysql_query($query,$id);

while ($row=mysql_fetch_array($result)) {

	$IdCuenta 	=$row["Id"];
	$Opcion		=$row["Opcion"];
	$Idobra 	=$row["Idobra"];
	$Idcliente	=$row["Idcliente"];
	$Obra		=$row["Obra"];
	$Cliente	=$row["Cliente"];
	$FechaInicio=$row["FechaInicio"];
	$FechaFin	=$row["FechaFin"];
	$Valor 		=$row["Valor"];
	$Concepto 	=$row["Concepto"];
	$Usuario	=$row["Usuario"];
	$Estado		=$row["Estado"];
	$Ciclo 		=$row["Periocidad"];	



	if ($Ciclo=="5") {
		$Tiempo=" 5 day";
	}
	elseif ($Ciclo=="10") {
		$Tiempo=" 10 day";
	}
	elseif ($Ciclo=="15") {
		$Tiempo=" 15 day";
	}
	elseif ($Ciclo=="20") {
		$Tiempo=" 20 day";
	}
	elseif ($Ciclo=="25") {
		$Tiempo=" 25 day";
	}
	elseif ($Ciclo=="30") {
		$Tiempo=" 1 month";
	}
	elseif($Ciclo=="60"){
		$Tiempo=" 2 month";
	}
	elseif ($Ciclo=="90") {
		$Tiempo=" 3 month";
	}
	elseif ($Ciclo=="120") {
		$Tiempo=" 4 month";
	}
	elseif ($Ciclo=="150") {
		$Tiempo=" 5 month";
	}
	elseif ($Ciclo=="180") {
		$Tiempo=" 6 month";
	}
	elseif ($Ciclo=="365") {
		$Tiempo=" 1 year";
	}
	else{
		$Tiempo="";
	}


	$FechaInicio=date($FechaInicio);
	$FechaActual=date('Y-m-d');


	$queryN="SELECT * FROM HistorialCobros WHERE Idcuenta='$IdCuenta'";
	$resultN=mysql_query($queryN,$id);

	while ($rowN=mysql_fetch_array($resultN)) {

		$IdC 			=$rowN["Idcuenta"];
		$FechaAnterior	=$rowN["FechaInicial"];
		$FechaProxima	=$rowN["FechaProxima"];
		$Cuota 			=$rowN["Cuota"];
	
	}

	if(($FechaProxima==$FechaActual) && ($FechaProxima<$FechaFin))
	{

				$Cuota++;

				$FechaDesp=date("Y-m-d", strtotime("$FechaProxima + $Tiempo"));
				$FechaRE=date("Y-m-d", strtotime("$FechaDesp + $Tiempo"));

				$query4="INSERT INTO HistorialCobros (Idcuenta,FechaInicial,FechaProxima,Cuota)
				VALUES ('$IdCuenta','$FechaDesp','$FechaRE','$Cuota')";
				$result4=mysql_query($query4,$id);


				$query5="INSERT INTO  CuentasCobrar (TipoCuenta,Opcion,Idobra,Idcliente,Obra,Cliente,FechaInicio,Valor,Concepto,Usuario,Estado)";
				$query5.="VALUES ('1','$Opcion','$Idobra','$Idcliente','$Obra','$Cliente','$FechaProxima','$Valor','COBRO NÚMERO $Cuota DEL COBRO RECURRENTE NRO $IdCuenta','$Usuario',0)"; 
				$result5=mysql_query($query5,$id);

				}

				if($FechaProxima>=$FechaFin){

				$Cuota++;

				$FechaDesp=date("Y-m-d", strtotime("$FechaProxima + $Tiempo"));
				$FechaRE=date("Y-m-d", strtotime("$FechaDesp + $Tiempo"));

				$query4="INSERT INTO HistorialCobros (Idcuenta,FechaInicial,FechaProxima,Cuota)
				VALUES ('$IdCuenta','$FechaDesp','$FechaRE','$Cuota')";
				$result4=mysql_query($query4,$id);


				$query5="INSERT INTO  CuentasCobrar (TipoCuenta,Opcion,Idobra,Idcliente,Obra,Cliente,FechaInicio,Valor,Concepto,Usuario,Estado)";
				$query5.= "VALUES ('1','$Opcion','$Idobra','$Idcliente','$Obra','$Cliente','$FechaProxima','$Valor','COBRO NÚMERO $Cuota DEL COBRO RECURRENTE NRO $IdCuenta, MOVIMIENTO FINALIZADO.','$Usuario',1)"; 
				$result5=mysql_query($query5,$id);

				$query6="UPDATE CuentasCobrar SET Estado='5' WHERE Id='$IdCuenta'";
				$result6=mysql_query($query6,$id);

				}
		
}
?>