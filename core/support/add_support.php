<?php include "../../connection/connection.php";
	  include "lib_support.php";

	  if($conn){

		$oneSupport = new Supports();

		$device_id = mysqli_real_escape_string($conn,$_POST['device_id']);
		$usuario_responsable = mysqli_real_escape_string($conn,$_POST['usuario_responsable']);
		$nro_soporte = mysqli_real_escape_string($conn,$_POST['nro_soporte']);
		$fecha_soporte = mysqli_real_escape_string($conn,$_POST['fecha_soporte']);
		$usuario_informatica = mysqli_real_escape_string($conn,$_POST['usuario_informatica']);
		$descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

		if(($device_id == "") ||
			($usuario_responsable == "") ||
				($nro_soporte == "") ||
					($fecha_soporte == "") ||
						($usuario_informatica == "") ||
							($descripcion == "")){
			echo 5;
		}else{
			$oneSupport->addSupport($oneSupport,$device_id,$usuario_responsable,$nro_soporte,$fecha_soporte,$usuario_informatica,$descripcion,$conn,$db_basename);
		}

	  }else{
	  	echo 13;
	  }




?>