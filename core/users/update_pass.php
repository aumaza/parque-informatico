<?php include "../../connection/connection.php";
	  include "lib_users.php";

	  if($conn){

	  	$oneUser = new Users();

	  	$id = mysqli_real_escape_string($conn,$_POST['user_id']);
	  	$password_actual = mysqli_real_escape_string($conn,$_POST['password_actual']);
	  	$password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
	  	$password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

	  	if(($id == '') || ($password_actual == '') || ($password_1 == '') || ($password_2 == '')){
	  		echo 5;
	  	}else{
	  		$oneUser->updatePassword($oneUser,$id,$password_actual,$password_1,$password_2,$conn,$db_basename);
	  	}

	  }else{
	  	echo 13;
	  }


?>