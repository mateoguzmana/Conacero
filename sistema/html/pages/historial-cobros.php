<?
session_start();

include("../../includes/conexion.php");


$query="SELECT * FROM CuentasCobrar WHERE Estado=0 AND TipoCuenta=2";
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

	while ($rowN=mysql_fetch_array($resultN)) 
	{

		$IdC 			=$rowN["Idcuenta"];
		$FechaAnterior	=$rowN["FechaInicial"];
		$FechaProxima	=$rowN["FechaProxima"];
		$Cuota 			=$rowN["Cuota"];
	}

		if (empty($IdC) && ($FechaInicio=$FechaActual)) {

			
			
			$FechaProxima=date("Y-m-d", strtotime("$FechaInicio + $Tiempo"));

			$query2="INSERT INTO HistorialCobros (Idcuenta,FechaInicial,FechaProxima,Cuota)
			VALUES ('$IdCuenta','$FechaInicio','$FechaProxima','1')";
			$result2=mysql_query($query2,$id);


			$query3="INSERT INTO CuentasCobrar (TipoCuenta,Opcion,Idobra,Idcliente,Obra,Cliente,FechaInicio,Valor,Concepto,Usuario,Estado)";
			$query3.= "VALUES ('1','$Opcion','$Idobra','$Idcliente','$Obra','$Cliente','$FechaInicio','$Valor','COBRO NÚMERO 1 DEL COBRO RECURRENTE NRO $IdCuenta','$Usuario','$Estado')"; 
			$result3=mysql_query($query3,$id);
			
			$query4="UPDATE CuentasCobrar SET Estado='4' WHERE Id='$IdCuenta'";
			$result4=mysql_query($query4,$id);
		}
}
?>