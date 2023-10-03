<?php include "../../connection/connection.php";
	  include "lib_os.php";

	  if($conn){

	  	$oneOS = new OS();

	  	$id = mysqli_real_escape_string($conn,$_POST['id']);
	  	$descripcion = mysqli_real_escape_string($conn,$_POST['descripcion']);

	  	if(($id == '') || ($descripcion == '')){
	  		echo 5;
	  	}else{
	  		$oneOS->updateOS($oneOS,$id,$descripcion,$conn,$db_basename);
	  	}

	  }else{
	  	echo 13;
	  }


?>