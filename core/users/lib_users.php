<?php

class Users{

	// ==================================================================================================== //
	// PROPERTIES //
	// ==================================================================================================== //
		private $nombre = '';
		private $user = '';
		private $password = '';
		private $email = '';
		private $functions = '';
		private $avatar = '';
		private $role = '';

	// ==================================================================================================== //
	// CONSTRUCTOR //
	// ==================================================================================================== //

		function __construct(){

			$this->nombre = '';
			$this->user = '';
			$this->password = '';
			$this->email = '';
			$this->functions = '';
			$this->avatar = '';
			$this->role = '';
		}

	// ==================================================================================================== //
	// SETTERS //
	// ==================================================================================================== //
		
		private function setNombre($var){
			$this->nombre = $var;
		}

		private function setUser($var){
			$this->user = $var;
		}

		private function setPassword($var){
			$this->password = $var;
		}

		private function setEmail($var){
			$this->email = $var;
		}

		private function setFunctions($var){
			$this->functions = $var;
		}

		private function setAvatar($var){
			$this->avatar = $var;
		}

		private function setRole($var){
			$this->role = $var;
		}

	// ==================================================================================================== //
	// GETTERS //
	// ==================================================================================================== //

		private function getNombre($var){
			return $this->nombre = $var;
		}

		private function getUser($var){
			return $this->user = $var;
		}

		private function getPassword($var){
			return $this->password = $var;
		}

		private function getEmail($var){
			return $this->email = $var;
		}

		private function getFunctions($var){
			return $this->functions = $var;
		}

		private function getAvatar($var){
			return $this->avatar = $var;
		}

		private function getRole($var){
			return $this->role = $var;
		}

	// ==================================================================================================== //
	// METHODS //
	// ==================================================================================================== //

	/*
	** LISTAR TODOS LOS USUARIOS
	**  
	**	@oneUser
	**  @conn
	**	@db_basename
	*/
	public function usersList($oneUser,$function,$conn,$db_basename){

		$enabled = 'Habilitado';
		$disabled = 'Deshabilitado';
        
        if($conn)
        {
            $sql = "SELECT * FROM pi_usuarios";
                mysqli_select_db($conn,$db_basename);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
		   echo '<div class="container-fluid">
			      <div class="jumbotron">
			      <h2>
			      <footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</h2>
			      </footer>
			      <hr>';

		          
		   echo "<table class='table table-condensed table-hover' style='width:100%' id='usersTable'>";
		   echo "<thead>
		         <th class='text-nowrap text-center'><span class='label label-default'>Nombre y Apellido</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Usuario</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Email</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Funciones</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Estado</span></th>
		         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
		         </thead>";


		            while($fila = mysqli_fetch_array($resultado)){
		                    // Listado normal
		                    echo "<tr>";
		                    echo "<td align=center><span class='label label-default'>".$oneUser->getNombre($fila['nombre'])."</span></td>";
		                    echo "<td align=center><span class='label label-primary'>".$oneUser->getUser($fila['user'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneUser->getEmail($fila['email'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneUser->getFunctions($fila['functions'])."</span></td>";
		                    if($oneUser->getRole($fila['role']) == '1'){
		                    	echo "<td align=center><span class='label label-success'>".$enabled."</span></td>";
		                    }if($oneUser->getRole($fila['role']) == '0'){
		                    	echo "<td align=center><span class='label label-danger'>".$disabled."</span></td>";
		                    }
		                    echo "<td class='text-nowrap' align=center>";
		                    		
		                    		if($oneUser->getNombre($fila['nombre']) != 'Administrador'){
		                            	echo '<button type="button" class="btn btn-default btn-sm" value="'.$fila['id'].'" onclick="callCambiarEstado(this.value);">
			      							<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar Estado</button>';
			      					}
		                    
		                    echo "</td>";
		                    $count++;
		                }

		                echo "</table>";
		                echo "<hr>";
		                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Usuarios:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
		                echo '</div></div>';
		                }else{
		                	echo 'Connection Failure...' .mysqli_error($conn);
		                }

		            mysqli_close($conn);


			} // END OF FUNCTION

	// ==================================================================================================== //
	// FORMULARIOS //
	// ==================================================================================================== //
	
	public function formCambiarEstado($oneUser,$id,$conn,$db_basename){

		// se consulta el registro
		mysqli_select_db($conn,$db_basename);
		$sql = "select role from pi_usuarios where id = '$id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);

		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar Estado Usuario</h2>
			      </footer><hr>

					<form id="fr_change_role_ajax" method="POST">

						  <input type="hidden" id="id" name="id" value="'.$id.'">

						   <div class="form-group">
							  <label for="role"><span class="badge">Estado</span></label>
							  <select class="form-control" id="role" name="role">
							    <option value="" selected disabled>Seleccionar</option>
							    <option value="1" '.("1" == $oneUser->getRole($row['role']) ? "selected" : "").' >Habilitado</option>
							    <option value="0" '.("0" == $oneUser->getRole($row['role']) ? "selected" : "").' >Deshabilitado</option>
							  </select>
							</div> 

						  
					
						  <button type="submit" class="btn btn-success btn-block" id="change_role">
						  	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION


	public function formCambiarPassword($user_id){

		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Cambiar Password</h2>
			      </footer><hr>

					<form id="fr_change_pass_ajax" method="POST">

						<input type="hidden" id="user_id" name="user_id" value="'.$user_id.'">

						  <div class="form-group">
						    <label for="password_actual"><span class="badge">Ingrese Password Actual</span></label>
						    <input type="password" class="form-control" id="password_actual" name="password_actual">
						  </div>

						  <div class="form-group">
						    <label for="password_1"><span class="badge">Ingrese Nuevo Password</span></label>
						    <input type="password" class="form-control" id="password_1" name="password_1">
						  </div>


						  <div class="form-group">
						    <label for="password_2"><span class="badge">Repita Password Nuevo</span></label>
						    <input type="password" class="form-control" id="password_2" name="password_2">
						  </div>

						  
					
						  <button type="submit" class="btn btn-success btn-block" id="change_pass">
						  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION

	// ==================================================================================================== //
	// PERSISTENCIA //
	// ==================================================================================================== //

	public function updateRole($oneUser,$id,$role,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);
		$sql = "update pi_usuarios set role = $oneUser->setRole('$role') where id = '$id'";
		$query = mysqli_query($conn,$sql);

		if($query){
			$success = "Se ha actualizado estado del usuario con ID: ".$id;
			$oneUser->mysqlUsersSuccessLogs($success);
			echo 1;
		}else{
			$error = mysqli_error($conn);
			$oneUser->mysqlUsersErrorLogs($error);
			echo -1;
		}

	} // END OF FUNCTION



	public function updatePassword($oneUser,$id,$password_actual,$password_1,$password_2,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);
		$sql = "select password from pi_usuarios where id = '$id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		$hash_pass = $row['password'];

		if(password_verify($password_actual,$hash_pass)){

			$pass_validate = $oneUser->passwordValidate($password_1,$password_2);

			if($pass_validate == 0){

				$passHash = password_hash($password_1, PASSWORD_BCRYPT);

				$sql_1 = "update pi_usuarios set password = $oneUser->setPassword('$passHash') where id = '$id'";
				$query_1 = mysqli_query($conn,$sql_1);

				if($query_1){
					$success = "Se ha actualizado el password del usuario con ID: ".$id;
					$oneUser->mysqlUsersSuccessLogs($success);
					echo 1;
				}else{
					$error = mysqli_error($conn);
					$oneUser->mysqlUsersErrorLogs($error);
					echo -1;
				}

			}if($pass_validate == -1){
				echo 9; // PASSWORDS DON'T MATCH
			}if($pass_validate == -2){
				echo 11; // PASSWORD WITH CANT OF CHARACTERS WRONG
			}

		}else{
			echo 2; // password actual inválida
		}


	} // END OF FUNCTION

	// ==================================================================================================== //
	// HANDLER LOGS //
	// ==================================================================================================== //

	public function mysqlUsersErrorLogs($error){
	    
	      $fileName = "users_mysql_error.log.txt"; 
	      $date = date("d-m-Y H:i:s");
	      $message = 'Error: '.$error.' - '.$date;
	       
	        if (file_exists($fileName)){
	        
		        $file = fopen($fileName, 'a');
		        fwrite($file, "\n".$date);
		        fclose($file);
	        
	        }else{
	            $file = fopen($fileName, 'w');
	            fwrite($file, $message);
	            fclose($file);
	            
	        }

	} // END OF FUNCTION


	public function mysqlUsersSuccessLogs($success){
    
      $fileName = "users_mysql_success.log.txt"; 
      $date = date("d-m-Y H:i:s");
      $message = 'Success: '.$success.' - '.$date;
       
        if (file_exists($fileName)){
        
	        $file = fopen($fileName, 'a');
	        fwrite($file, "\n".$message);
	        fclose($file);
	        
        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            
        }

	}


	public function passwordValidate($password_1,$password_2){

	$limInf = 10;
	$limSup = 15;

	if(((strlen($password_1) >= $limInf) && (strlen($password_1) <= $limSup)) && ((strlen($password_2) >= $limInf) && (strlen($password_2) <= $limSup))){

			if((strcmp($password_2,$password_1) == 0)){
				return 0;
			}else{
				return -1; // THE PASSWORDS DON'T MATCH
			}

	}else{
		return -2; // THE PASSWORDS DON'T HAVE THE CANT OF CHARACTERS CORRECT
	}


} // END OF FUNCTION



} // END OF CLASS




?>