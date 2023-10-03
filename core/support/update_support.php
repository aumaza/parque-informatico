<?php include "../../connection/connection.php";
	  include "lib_support.php";

	  if($conn){

		$oneSupport = new Supports();

		$id = mysqli_real_escape_string($conn,$_POST['id']);
		$usuario_responsable = mysqli_real_escape_string($conn,$_POST['usuario_responsable']);
		$nro_soporte = mysqli_real_escape_string($conn,$_POST['nro_soporte']);
		$fecha_soporte = mysqli_real_escape_string($conn,$_POST['fecha_soporte']);
		$usuario_informatica = mysqli_real_escape_string($conn,$_POST['usuario_informatica']);
		$descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

		if(($id == "") ||
			($usuario_responsable == "") ||
				($nro_soporte == "") ||
					($fecha_soporte == "") ||
						($usuario_informatica == "") ||
							($descripcion == "")){
			echo 5;
		}else{
			$oneSupport->updateSupport($oneSupport,$id,$usuario_responsable,$nro_soporte,$fecha_soporte,$usuario_informatica,$descripcion,$conn,$db_basename);
		}

	  }else{
	  	echo 13;
	  }




?>