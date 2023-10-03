<?php

class OS{

	// ==================================================================================================== //
	// PROPERTIES //
	// ==================================================================================================== //
		private $descripcion = '';

	// ==================================================================================================== //
	// CONSTRUCTOR //
	// ==================================================================================================== //
		function __construct(){
			$this->descripcion = '';
		}

	// ==================================================================================================== //
	// SETTERS //
	// ==================================================================================================== //
		private function setOS($var){
			$this->descripcion = $var;
		}

	// ==================================================================================================== //
	// GETTERS //
	// ==================================================================================================== //
		private function getOS($var){
			return $this->descripcion = $var;
		}

	// ==================================================================================================== //
	// METHODS //
	// ==================================================================================================== //

		/*
	** LISTAR TODOS LOS SISTEMAS OPERATIVOS
	**	@oneOS
	**  @conn
	**	@db_basename
	*/
	public function osList($oneOS,$function,$conn,$db_basename){

        
        if($conn)
        {
            $sql = "SELECT * FROM pi_sistemas_operativos";
                mysqli_select_db($conn,$db_basename);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
		   echo '<div class="container-fluid">
			      <div class="jumbotron">
			      <h2>
			      <footer class="container-fluid text-left">
			      <img src="../img/lcd32x32.png" alt="Avatar" class="avatar" /> Sistemas Operativos</h2>
			      </footer>
			      <hr>';
			      if($function == 'Sys Admin'){
			      	echo '<button type="button" class="btn btn-success btn-sm" onclick="callAltaOS();">
			      			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta de Sistema Operativo</button><hr>';
			      }
		          
		   echo "<table class='table table-condensed table-hover' style='width:100%' id='osTable'>";
		   echo "<thead>
		         <th class='text-nowrap text-center'><span class='label label-default'>Descripción</span></th>
		         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
		         </thead>";


		            while($fila = mysqli_fetch_array($resultado)){
		                    // Listado normal
		                    echo "<tr>";
		                    echo "<td align=center><span class='label label-default'>".$oneOS->getOS($fila['descripcion'])."</span></td>";
		                    echo "<td class='text-nowrap' align=center>";
		                    if($function == 'Sys Admin') {
		                            
		                            echo '<button type="button" class="btn btn-default btn-sm" value="'.$fila['id'].'" onclick="callEditarOS(this.value);">
			      							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>';

		                    }
		                    echo "</td>";
		                    $count++;
		                }

		                echo "</table>";
		                echo "<hr>";
		                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Sistemas Operativos:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
		                echo '</div></div>';
		                }else{
		                echo 'Connection Failure...' .mysqli_error($conn);
		                }

		            mysqli_close($conn);


			} // END OF FUNCTION


	// FORMULARIOS
	public function formAltaOS(){

		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta Sistema Operativo</h2>
			      </footer><hr>

					<form id="fr_new_os_ajax" method="POST">

						  <div class="form-group">
						    <label for="descripcion"><span class="badge">Descripción</span></label>
						    <input type="text" class="form-control" id="descripcion" name="descripcion">
						  </div>

						  
					
						  <button type="submit" class="btn btn-success btn-block" id="new_os">
						  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION


	public function formEditarOS($oneOS,$id,$conn,$db_basename){

		// se consulta el registro
		mysqli_select_db($conn,$db_basename);
		$sql = "select descripcion from pi_sistemas_operativos where id = '$id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);

		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta Sistema Operativo</h2>
			      </footer><hr>

					<form id="fr_update_os_ajax" method="POST">

						  <input type="hidden" id="id" name="id" value="'.$id.'">

						  <div class="form-group">
						    <label for="descripcion"><span class="badge">Descripción</span></label>
						    <input type="text" class="form-control" id="descripcion" name="descripcion" value="'.$oneOS->getOS($row['descripcion']).'">
						  </div>

						  
					
						  <button type="submit" class="btn btn-success btn-block" id="update_os">
						  	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION


	// ==================================================================================================== //
	// PERSISTENCIA //
	// ==================================================================================================== //	

	public function addOS($oneOS,$descripcion,$conn,$db_basename){

		// se verifica que exista en la base de datos
		mysqli_select_db($conn,$db_basename);
		$sql = "select * from pi_sistemas_operativos where descripcion = '$descripcion'";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);

		if($rows == 0){

			$sql_1 = "insert into pi_sistemas_operativos ".
					 "(descripcion) ".
					 "values ".
					 "($oneOS->setOS('$descripcion'))";
			$query_1 = mysqli_query($conn,$sql_1);

			if($query_1){
				$success = "Se ha insertado registro en la tabla pi_sistemas_operativos";
				$oneOS->mysqlOSSuccessLogs($success);
				echo 1;
			}else{
				$error = mysqli_error($conn);
				$oneOS->mysqlOSErrorLogs($error);
				echo -1;
			}

		}else if($rows > 0){
			echo 9; // sistema existente
		}


	}// END OF FUNCTION



	public function updateOS($oneOS,$id,$descripcion,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);
		$sql = "update pi_sistemas_operativos set descripcion = $oneOS->setOS('$descripcion') where id = '$id'";
		$query = mysqli_query($conn,$sql);

		if($query){
			$success = "Se ha actualizado registro en la tabla pi_sistemas_operativos con ID: ".$id;
			$oneOS->mysqlOSSuccessLogs($success);
			echo 1;
		}else{
			$error = mysqli_error($conn);
			$oneOS->mysqlOSErrorLogs($error);
			echo -1;
		}
	} // END OF FUNCTION


	// ==================================================================================================== //
	// MANEJO DE LOGS //
	// ==================================================================================================== //
	public function mysqlOSErrorLogs($error){
	    
	      $fileName = "os_mysql_error.log.txt"; 
	      $date = date("d-m-Y H:i:s");
	      $message = 'Error: '.$error.' - '.$date;
	       
	        if (file_exists($fileName)){
	        
	        $file = fopen($fileName, 'a');
	        fwrite($file, "\n".$date);
	        fclose($file);
	        chmod($file, 0777);
	        
	        }else{
	            $file = fopen($fileName, 'w');
	            fwrite($file, $message);
	            fclose($file);
	            chmod($file, 0777);
	            }

	} // END OF FUNCTION


	public function mysqlOSSuccessLogs($success){
    
      $fileName = "os_mysql_success.log.txt"; 
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



} // END OF CLASS


?>