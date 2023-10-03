<?php include "../../connection/connection.php";
	  include "lib_users.php";

	  if($conn){

	  	$oneUser = new Users();

	  	$id = mysqli_real_escape_string($conn,$_POST['id']);
	  	$role = mysqli_real_escape_string($conn,$_POST['role']);

	  	if(($id == '') || ($role == '')){
	  		echo 5;
	  	}else{
	  		$oneUser->updateRole($oneUser,$id,$role,$conn,$db_basename);
	  	}

	  }else{
	  	echo 13;
	  }


?>