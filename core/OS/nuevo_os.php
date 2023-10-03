<?php include "../../connection/connection.php";
	  include "lib_os.php";

	  if($conn){

	  	$oneOS = new OS();

	  	$descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

	  	if($descripcion == ''){
	  		echo 5;
	  	}else{
	  		$oneOS->addOS($oneOS,$descripcion,$conn,$db_basename);
	  	}

	  }else{
	  	echo 13;
	  }


?>