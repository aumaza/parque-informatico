<?php

class Supports{

	// ==================================================================================================== //
	// PROPERTIES //
	// ==================================================================================================== //

		private $device_id = '';
		private $usuario_responsable = '';
		private $nro_soporte = '';
		private $fecha_soporte = '';
		private $usuario_informatica = '';
		private $descripcion = '';

	// ==================================================================================================== //
	// CONTRUCTOR //
	// ==================================================================================================== //

		function __construct(){

			$this->device_id = '';
			$this->usuario_responsable = '';
			$this->nro_soporte = '';
			$this->fecha_soporte = '';
			$this->usuario_informatica = '';
			$this->descripcion = '';

		} // END OF FUNCTION

	// ==================================================================================================== //
	// SETTERS //
	// ==================================================================================================== //
		
		private function setDeviceID($var){
			$this->device_id = $var;
		}

		private function setUsuarioResponsable($var){
			$this->usuario_responsable = $var;
		}

		private function setNroSoporte($var){
			$this->nro_soporte = $var;
		}

		private function setFechaSoporte($var){
			$this->fecha_soporte = $var;
		}

		private function setUsuarioInformatica($var){
			$this->usuario_informatica = $var;
		}

		private function setDescripcion($var){
			$this->descripcion = $var;
		}

	// ==================================================================================================== //
	// GETTERS //
	// ==================================================================================================== //

		private function getDeviceID($var){
			return $this->device_id = $var;
		}

		private function getUsuarioResponsable($var){
			return $this->usuario_responsable = $var;
		}

		private function getNroSoporte($var){
			return $this->nro_soporte = $var;
		}

		private function getFechaSoporte($var){
			return $this->fecha_soporte = $var;
		}

		private function getUsuarioInformatica($var){
			return $this->usuario_informatica = $var;
		}

		private function getDescripcion($var){
			return $this->descripcion = $var;
		}

	// ==================================================================================================== //
	// METHODS //
	// ==================================================================================================== //

	/*
	** LISTAR TODOS LOS PEDIDOS DE SOPORTE DE UN EQUIPO
	**  @device_id
	**	@oneSupport
	**  @conn
	**	@db_basename
	*/
	public function supportsList($oneSupport,$device_id,$conn,$db_basename){

        
        if($conn)
        {
            $sql = "SELECT * FROM pi_soporte where device_id = '$device_id'";
                mysqli_select_db($conn,$db_basename);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
		   echo '<div class="container-fluid">
			      <div class="jumbotron">
			      <h2>
			      <footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Pedidos de Soporte</h2>
			      </footer>
			      <hr>';
			      
			      	echo '<button type="button" class="btn btn-success btn-sm" value="'.$device_id.'" onclick="callAltaSoporte(this.value);">
			      			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta de Soporte</button><hr>';
			      
		          
		   echo "<table class='table table-condensed table-hover' style='width:100%' id='supportTable'>";
		   echo "<thead>
		         <th class='text-nowrap text-center'><span class='label label-default'>Usuario Responsable</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Nro. Soporte</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Fecha Pedido</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Usuario Informática</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Descripción</span></th>
		         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
		         </thead>";


		            while($fila = mysqli_fetch_array($resultado)){
		                    // Listado normal
		                    echo "<tr>";
		                    echo "<td align=center><span class='label label-default'>".$oneSupport->getUsuarioResponsable($fila['usuario_responsable'])."</span></td>";
		                    echo "<td align=center><span class='label label-primary'>".$oneSupport->getNroSoporte($fila['nro_soporte'])."</span></td>";
		                    echo "<td align=center><span class='label label-info'>".$oneSupport->getFechaSoporte($fila['fecha_soporte'])."</span></td>";
		                    
		                    echo "<td align=center><span class='label label-default'>".$oneSupport->getUsuarioInformatica($fila['usuario_informatica'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneSupport->getDescripcion($fila['descripcion'])."</span></td>";
		                    
		                    echo "<td class='text-nowrap' align=center>";
		                    
		                            echo '<button type="button" class="btn btn-default btn-sm" value="'.$fila['id'].'" onclick="callEditarSoporte(this.value);">
			      							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>';
			      						  
		                    
		                    echo "</td>";
		                    $count++;
		                }

		                echo "</table>";
		                echo "<hr>";
		                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Pedidos de Soporte:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
		                echo '</div></div>';
		                }else{
		                echo 'Connection Failure...' .mysqli_error($conn);
		                }

		            mysqli_close($conn);


			} // END OF FUNCTION


	// ==================================================================================================== //
	// FORMULARIOS //
	// ==================================================================================================== //

	public function formAltaSoporte($device_id,$nombre,$conn,$db_basename){



		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta Soporte</h2>
			      </footer><hr>

					<form id="fr_new_support_ajax" method="POST">

						<input type="hidden" id="device_id" name="device_id" value="'.$device_id.'">
						<div class="col-sm-6">

						  <div class="form-group">
						    <label for="usuario_responsable"><span class="badge">Usuario Responsable</span></label>
						    <input type="text" class="form-control" id="usuario_responsable" name="usuario_responsable" value="'.$nombre.'" readonly>
						  </div>

						  <div class="form-group">
						    <label for="nro_soporte"><span class="badge">Nro. Soporte</span></label>
						    <input type="text" class="form-control" id="nro_soporte" name="nro_soporte">
						  </div>

						  <div class="form-group">
						    <label for="fecha_soporte"><span class="badge">Fecha Soporte</span></label>
						    <input type="date" class="form-control" id="fecha_soporte" name="fecha_soporte">
						  </div>

						  <div class="form-group">
						    <label for="usuario_informatica"><span class="badge">Usuario Informática</span></label>
						    <input type="text" class="form-control" id="usuario_informatica" name="usuario_informatica">
						  </div>

			            </div>

			            <div class="col-sm-6">

			        	  
						  <div class="form-group">
						    <label for="descripcion"><span class="badge">Descripción</span></label>
						    <textarea class="form-control" rows="10" id="descripcion" name="descripcion" style="resize: none;"></textarea>
						  </div>

						  
					    </div>
					
						  <button type="submit" class="btn btn-success btn-block" id="new_support">
						  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION



	public function formEditarSoporte($oneSupport,$id,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);
		$sql = "select * from pi_soporte where id = '$id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);


		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Soporte</h2>
			      </footer><hr>

					<form id="fr_edit_support_ajax" method="POST">

						<input type="hidden" id="id" name="id" value="'.$id.'">
						<div class="col-sm-6">

						  <div class="form-group">
						    <label for="usuario_responsable"><span class="badge">Usuario Responsable</span></label>
						    <input type="text" class="form-control" id="usuario_responsable" name="usuario_responsable" value="'.$oneSupport->getUsuarioResponsable($row['usuario_responsable']).'">
						  </div>

						  <div class="form-group">
						    <label for="nro_soporte"><span class="badge">Nro. Soporte</span></label>
						    <input type="text" class="form-control" id="nro_soporte" name="nro_soporte" value="'.$oneSupport->getNroSoporte($row['nro_soporte']).'">
						  </div>

						  <div class="form-group">
						    <label for="fecha_soporte"><span class="badge">Fecha Soporte</span></label>
						    <input type="date" class="form-control" id="fecha_soporte" name="fecha_soporte" value="'.$oneSupport->getFechaSoporte($row['fecha_soporte']).'">
						  </div>

						  <div class="form-group">
						    <label for="usuario_informatica"><span class="badge">Usuario Informática</span></label>
						    <input type="text" class="form-control" id="usuario_informatica" name="usuario_informatica" value="'.$oneSupport->getUsuarioInformatica($row['usuario_informatica']).'">
						  </div>

			            </div>

			            <div class="col-sm-6">

			        	  
						  <div class="form-group">
						    <label for="descripcion"><span class="badge">Descripción</span></label>
						    <textarea class="form-control" rows="10" id="descripcion" name="descripcion" style="resize: none;">'.$oneSupport->getDescripcion($row['descripcion']).'</textarea>
						  </div>

						  
					    </div>
					
						  <button type="submit" class="btn btn-success btn-block" id="edit_support">
						  	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION

	// ==================================================================================================== //
	// PERSISTENCIA //
	// ==================================================================================================== //

		public function addSupport($oneSupport,$device_id,$usuario_responsable,$nro_soporte,$fecha_soporte,$usuario_informatica,$descripcion,$conn,$db_basename){

			mysqli_select_db($conn,$db_basename);
			$sql = "insert into pi_soporte ".
				   "(device_id, ".
				   " usuario_responsable, ".
				   " nro_soporte, ".
				   " fecha_soporte, ".
				   " usuario_informatica, ".
				   " descripcion) ".
				   "values ".
				   "($oneSupport->setDeviceID('$device_id'), ".
				   " $oneSupport->setUsuarioResponsable('$usuario_responsable'), ".
				   " $oneSupport->setNroSoporte('$nro_soporte'), ".
				   " $oneSupport->setFechaSoporte('$fecha_soporte'), ".
				   " $oneSupport->setUsuarioInformatica('$usuario_informatica'), ".
				   " $oneSupport->setDescripcion('$descripcion'))";

			$query = mysqli_query($conn,$sql);

			if($query){

				$success = "Se ha insertado registro en la tabla pi_soporte";
				$oneSupport->mysqlSupportSuccessLogs($success);
				echo 1;
			}else{

				$error = mysqli_error($conn);
				$oneSupport->mysqlSupportErrorLogs($error);
				echo -1;
			}

		} // END OF FUNCTION


		public function updateSupport($oneSupport,$id,$usuario_responsable,$nro_soporte,$fecha_soporte,$usuario_informatica,$descripcion,$conn,$db_basename){

			mysqli_select_db($conn,$db_basename);
			$sql = "update pi_soporte set ".
			       "usuario_responsable = $oneSupport->setUsuarioResponsable('$usuario_responsable'), ".
			       "nro_soporte = $oneSupport->setNroSoporte('$nro_soporte'), ".
			       "fecha_soporte = $oneSupport->setFechaSoporte('$fecha_soporte'), ".
			       "usuario_informatica = $oneSupport->setUsuarioInformatica('$usuario_informatica'), ".
			       "descripcion = $oneSupport->setDescripcion('$descripcion') where id = '$id'";

			$query = mysqli_query($conn,$sql);

			if($query){
				$success = "Se ha actualizado registro en la tabla pi_soporte con ID: ".$id;
				$oneSupport->mysqlSupportSuccessLogs($success);
				echo 1;
			}else{

				$error = mysqli_error($conn);
				$oneSupport->mysqlSupportErrorLogs($error);
				echo -1;
			}

		} // END OF FUNCTION

	// ==================================================================================================== //
	// HANDLER LOGS //
	// ==================================================================================================== //

	public function mysqlSupportErrorLogs($error){
	    
	      $fileName = "support_mysql_error.log.txt"; 
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


	public function mysqlSupportSuccessLogs($success){
    
      $fileName = "support_mysql_success.log.txt"; 
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

	} // END OF FUNCTION


} // END OF CLASS


?>