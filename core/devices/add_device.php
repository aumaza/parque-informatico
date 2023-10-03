<?php include "../../connection/connection.php";
	  include "lib_devices.php";

	  if($conn){

	  	$oneDevice = new Devices();

	  	$nombre_apellido = mysqli_real_escape_string($conn,$_POST['nombre_apellido']);
	  	$patrimonio = mysqli_real_escape_string($conn,$_POST['patrimonio']);
	  	$ip = mysqli_real_escape_string($conn,$_POST['ip']);
	  	$gateaway = mysqli_real_escape_string($conn,$_POST['gateaway']);
	  	$submask = mysqli_real_escape_string($conn,$_POST['submask']);
	  	$dns = mysqli_real_escape_string($conn,$_POST['dns']);
	  	$nro_oficina = mysqli_real_escape_string($conn,$_POST['nro_oficina']);
	  	$login_usuario = mysqli_real_escape_string($conn,$_POST['login_usuario']);
	  	$sistema_operativo = mysqli_real_escape_string($conn,$_POST['sistema_operativo']);
	  	$periscopio = mysqli_real_escape_string($conn,$_POST['periscopio']);
	  	$puesto_ubicacion = mysqli_real_escape_string($conn,$_POST['puesto_ubicacion']);
	  	$mac_address = mysqli_real_escape_string($conn,$_POST['mac_address']);

	  	if(($nombre_apellido == "") ||
	  		($patrimonio == "") ||
	  			($ip == "") ||
	  				($gateaway == "") ||
	  					($submask == "") ||
	  						($dns == "") ||
	  							($nro_oficina == "") ||
	  								($login_usuario == "") ||
	  									($sistema_operativo == "") ||
	  										($periscopio == "") ||
	  											($puesto_ubicacion == "") ||
	  												($mac_address == "")){
	  		echo 5;
	  	}else{
	  		$oneDevice->addDevice($oneDevice,$nombre_apellido,$patrimonio,$ip,$gateaway,$submask,$dns,$nro_oficina,$login_usuario,$sistema_operativo,$periscopio,$puesto_ubicacion,$mac_address,$conn,$db_basename);
	  	}

	  }else{
	  	echo 13; // sin conexion a la base de datos
	  }


?>