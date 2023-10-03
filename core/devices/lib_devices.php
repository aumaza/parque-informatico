<?php


class Devices{

	// ==================================================================================================== //
	// PROPERTIES //
	// ==================================================================================================== //
		private $nombre_apellido = '';
		private $patrimonio = '';
		private $ip = '';
		private $gateaway = '';
		private $submask = '';
		private $dns = '';
		private $nro_oficina = '';
		private $usuario = '';
		private $sistema_operativo = '';
		private $periscopio = '';
		private $puesto_ubicacion = '';
		private $mac_address = '';

	// ==================================================================================================== //
	// CONSTRUCTOR //
	// ==================================================================================================== //
		function __construct(){
			$this->nombre_apellido = '';
			$this->patrimonio = '';
			$this->ip = '';
			$this->gateaway = '';
			$this->submask = '';
			$this->dns = '';
			$this->nro_oficina = '';
			$this->usuario = '';
			$this->sistema_operativo = '';
			$this->periscopio = '';
			$this->puesto_ubicacion = '';
			$this->mac_address = '';
		}


	// ==================================================================================================== //
	// SETTERS //
	// ==================================================================================================== //
		private function setNombreApellido($var){
			$this->nombre_apellido = $var;
		}

		private function setPatrimonio($var){
			$this->patrimonio = $var;
		}

		private function setIp($var){
			$this->ip = $var;
		}

		private function setGateaway($var){
			$this->gateaway = $var;
		}

		private function setSubmask($var){
			$this->submask = $var;
		}

		private function setDns($var){
			$this->dns = $var;
		}

		private function setNroOficina($var){
			$this->nro_oficina = $var;
		}

		private function setUsuario($var){
			$this->usuario = $var;
		}

		private function setSistemaOperativo($var){
			$this->sistema_operativo = $var;
		}

		private function setPeriscopio($var){
			$this->periscopio = $var;
		}

		private function setPuestoUbicacion($var){
			$this->puesto_ubicacion = $var;
		}

		private function setMacAddress($var){
			$this->mac_address = $var;
		}


	// ==================================================================================================== //
	// GETTERS //
	// ==================================================================================================== //
		private function getNombreApellido($var){
			return $this->nombre_apellido = $var;
		}

		private function getPatrimonio($var){
			return $this->patrimonio = $var;
		}

		private function getIp($var){
			return $this->ip = $var;
		}

		private function getGateaway($var){
			return $this->gateaway = $var;
		}

		private function getSubmask($var){
			return $this->submask = $var;
		}

		private function getDns($var){
			return $this->dns = $var;
		}

		private function getNroOficina($var){
			return $this->nro_oficina = $var;
		}

		private function getUsuario($var){
			return $this->usuario = $var;
		}

		private function getSistemaOperativo($var){
			return $this->sistema_operativo = $var;
		}

		private function getPeriscopio($var){
			return $this->periscopio = $var;
		}

		private function getPuestoUbicacion($var){
			return $this->puesto_ubicacion = $var;
		}

		private function getMacAddress($var){
			return $this->mac_address = $var;
		}


	// ==================================================================================================== //
	// METHODS //
	// ==================================================================================================== //


	/*
	** LISTAR TODO EL EQUIPAMIENTO
	**	@oneDevice
	**  @conn
	**	@db_basename
	*/
	public function devicesList($oneDevice,$function,$conn,$db_basename){

        
        if($conn)
        {
            $sql = "SELECT * FROM pi_equipamiento";
                mysqli_select_db($conn,$db_basename);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
		   echo '<div class="container-fluid">
			      <div class="jumbotron">
			      <h2>
			      <footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Equipamiento</h2>
			      </footer>
			      <hr>';
			      if($function == 'Sys Admin'){
			      	echo '<button type="button" class="btn btn-success btn-sm" onclick="callAltaEquipo();">
			      			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta de Equipo</button><hr>';
			      }
		          
		   echo "<table class='table table-condensed table-hover' style='width:100%' id='devicesTable'>";
		   echo "<thead>
		         <th class='text-nowrap text-center'><span class='label label-default'>Nombre Apellido</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Patrimonio</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>IP</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Gateway</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Submask</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>DNS</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Nro. Oficina</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Usuario</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Sistema Operativo</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Periscopio</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Puesto / Ubicación</span></th>
		         <th class='text-nowrap text-center'><span class='label label-default'>Mac Address</span></th>
		         <th class='text-nowrap text-center'><span class='label label-warning'>Acciones</span></th>
		         </thead>";


		            while($fila = mysqli_fetch_array($resultado)){
		                    // Listado normal
		                    echo "<tr>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getNombreApellido($fila['nombre_apellido'])."</span></td>";
		                    echo "<td align=center><span class='label label-primary'>".$oneDevice->getPatrimonio($fila['patrimonio'])."</span></td>";
		                    echo "<td align=center><span class='label label-info'>".$oneDevice->getIp($fila['ip'])."</span></td>";
		                    
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getGateaway($fila['gateaway'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getSubmask($fila['submask'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getDns($fila['dns'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getNroOficina($fila['nro_oficina'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getUsuario($fila['login_usuario'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getSistemaOperativo($fila['sistema_operativo'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getPeriscopio($fila['periscopio'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getPuestoUbicacion($fila['puesto_ubicacion'])."</span></td>";
		                    echo "<td align=center><span class='label label-default'>".$oneDevice->getMacAddress($fila['mac_address'])."</span></td>";
		                    
		                    echo "<td class='text-nowrap' align=center>";
		                    if($function == 'Sys Admin') {
		                            echo '<button type="button" class="btn btn-default btn-sm" value="'.$fila['id'].'" onclick="callEditarEquipo(this.value);">
			      							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

			      							<button type="button" class="btn btn-warning btn-sm" value="'.$fila['id'].'" onclick="callPedidoSoporte(this.value);">
			      							<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Pedido Soporte</button>';
			      						  
		                    }
		                    echo "</td>";
		                    $count++;
		                }

		                echo "</table>";
		                echo "<hr>";
		                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span> <strong>Cantidad de Equipos:</strong>  <span class="badge">'.$count.'</span></footer><hr>';
		                echo '</div></div>';
		                }else{
		                echo 'Connection Failure...' .mysqli_error($conn);
		                }

		            mysqli_close($conn);


			} // END OF FUNCTION


	// ==================================================================================================== //
	// FORMULARIOS //
	// ==================================================================================================== //

	public function formAltaDevice($conn,$db_basename){

		echo '<div class="container">
				
				<div class="jumbotron">
					<footer class="container-fluid text-left">
				      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Alta Equipo</h2>
				    </footer><hr>

					<form id="fr_new_device_ajax" method="POST">

						<div class="col-sm-6">

							  <div class="form-group">
							    <label for="nombre_apellido"><span class="badge">Nombre y Apellido</span></label>
							    <input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido">
							  </div>

							  <div class="form-group">
							    <label for="patrimonio"><span class="badge">Patrimonio</span></label>
							    <input type="text" class="form-control" id="patrimonio" name="patrimonio">
							  </div>

							  <div class="form-group">
							    <label for="ip"><span class="badge">IP Address</span></label>
							    <input type="text" class="form-control" id="ip" name="ip">
							  </div>

							  <div class="form-group">
							    <label for="gateaway"><span class="badge">Gateway Address</span></label>
							    <input type="text" class="form-control" id="gateaway" name="gateaway">
							  </div>

							  <div class="form-group">
							    <label for="submask"><span class="badge">Submask</span></label>
							    <input type="text" class="form-control" id="submask" name="submask">
							  </div>

							  <div class="form-group">
							    <label for="dns"><span class="badge">DNS</span></label>
							    <input type="text" class="form-control" id="dns" name="dns">
							  </div>

			            </div>

			            <div class="col-sm-6">

			        	  
							  <div class="form-group">
							    <label for="nro_oficina"><span class="badge">Nro. Oficina</span></label>
							    <input type="text" class="form-control" id="nro_oficina" name="nro_oficina">
							  </div>

							  <div class="form-group">
							    <label for="login_usuario"><span class="badge">Login / Usuario</span></label>
							    <input type="text" class="form-control" id="login_usuario" name="login_usuario">
							  </div>

							  <div class="form-group">
				                <label for="sistema_operativo"><span class="badge">Sistema Operativo</span></label>
				                <select class="form-control" id="sistema_operativo" name="sistema_operativo">
				                <option value="" disabled selected>Seleccionar</option>';
				                    
				                
				                    $query = "SELECT descripcion FROM pi_sistemas_operativos order by descripcion ASC";
				                    mysqli_select_db($conn,$db_basename);
				                    $res = mysqli_query($conn,$query);

				                    if($res){
				                        while ($valores = mysqli_fetch_array($res)){
				                        	echo '<option value="'.$valores['descripcion'].'">'.$valores['descripcion'].'</option>';
				                        }
				                    }
				                

				                    //mysqli_close($conn);
				                
						      	echo '</select>
						        </div>

				        	  <div class="form-group">
							    <label for="periscopio"><span class="badge">Periscopio</span></label>
							    <input type="text" class="form-control" id="periscopio" name="periscopio">
							  </div>

							  <div class="form-group">
							    <label for="puesto_ubicacion"><span class="badge">Puesto / Ubicación</span></label>
							    <input type="text" class="form-control" id="puesto_ubicacion" name="puesto_ubicacion">
							  </div>

							  <div class="form-group">
							    <label for="mac_address"><span class="badge">Mac Address</span></label>
							    <input type="text" class="form-control" id="mac_address" name="mac_address">
							  </div>

						  
					    </div>
					
						  <button type="submit" class="btn btn-success btn-block" id="new_device">
						  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
						</form> 

				</div>
			</div>';


	} // END OF FUNCTION


	public function formEditarDevice($oneDevice,$id,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);
		$sql = "select * from pi_equipamiento where id = '$id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);

		echo '<div class="container">
				<div class="jumbotron">
				<footer class="container-fluid text-left">
			      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Equipo</h2>
			      </footer><hr>

					<form id="fr_edit_device_ajax" method="POST">

						<input type="hidden" id="id" name="id" value="'.$id.'">

						<div class="col-sm-6">

						  <div class="form-group">
						    <label for="nombre_apellido"><span class="badge">Nombre y Apellido</span></label>
						    <input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido" value="'.$oneDevice->getNombreApellido($row['nombre_apellido']).'">
						  </div>

						  <div class="form-group">
						    <label for="patrimonio"><span class="badge">Patrimonio</span></label>
						    <input type="text" class="form-control" id="patrimonio" name="patrimonio" value="'.$oneDevice->getPatrimonio($row['patrimonio']).'">
						  </div>

						  <div class="form-group">
						    <label for="ip"><span class="badge">IP Address</span></label>
						    <input type="text" class="form-control" id="ip" name="ip" value="'.$oneDevice->getIp($row['ip']).'">
						  </div>

						  <div class="form-group">
						    <label for="gateaway"><span class="badge">Gateway Address</span></label>
						    <input type="text" class="form-control" id="gateaway" name="gateaway" value="'.$oneDevice->getGateaway($row['gateaway']).'">
						  </div>

						  <div class="form-group">
						    <label for="submask"><span class="badge">Submask</span></label>
						    <input type="text" class="form-control" id="submask" name="submask" value="'.$oneDevice->getSubmask($row['submask']).'">
						  </div>

						  <div class="form-group">
						    <label for="dns"><span class="badge">DNS</span></label>
						    <input type="text" class="form-control" id="dns" name="dns" value="'.$oneDevice->getDns($row['dns']).'">
						  </div>

			            </div>

			            <div class="col-sm-6">

			        	  
						  <div class="form-group">
						    <label for="nro_oficina"><span class="badge">Nro. Oficina</span></label>
						    <input type="text" class="form-control" id="nro_oficina" name="nro_oficina" value="'.$oneDevice->getNroOficina($row['nro_oficina']).'">
						  </div>

						  <div class="form-group">
						    <label for="login_usuario"><span class="badge">Login / Usuario</span></label>
						    <input type="text" class="form-control" id="login_usuario" name="login_usuario" value="'.$oneDevice->getUsuario($row['login_usuario']).'">
						  </div>

						  <div class="form-group">
			                <label for="sistema_operativo"><span class="badge">Sistema Operativo</span></label>
			                <select class="form-control" id="sistema_operativo" name="sistema_operativo">
			                <option value="" disabled selected>Seleccionar</option>';
			                    
			                if($conn){
			                    $query = "SELECT descripcion FROM pi_sistemas_operativos order by descripcion ASC";
			                    mysqli_select_db($conn,$db_basename);
			                    $res = mysqli_query($conn,$query);

			                    if($res){
			                        while ($valores = mysqli_fetch_array($res)){
			                        	echo '<option value="'.$valores['descripcion'].'" '.($valores['descripcion'] == $oneDevice->getSistemaOperativo($row['sistema_operativo']) ? "selected" : "").'>'.$valores['descripcion'].'</option>';
			                        }
			                    }
			                }

			                    //mysqli_close($conn);
			                
				      	echo '</select>
				        </div>

			        	  <div class="form-group">
						    <label for="periscopio"><span class="badge">Periscopio</span></label>
						    <input type="text" class="form-control" id="periscopio" name="periscopio" value="'.$oneDevice->getPeriscopio($row['periscopio']).'">
						  </div>

						  <div class="form-group">
						    <label for="puesto_ubicacion"><span class="badge">Puesto / Ubicación</span></label>
						    <input type="text" class="form-control" id="puesto_ubicacion" name="puesto_ubicacion" value="'.$oneDevice->getPuestoUbicacion($row['puesto_ubicacion']).'">
						  </div>

						  <div class="form-group">
						    <label for="mac_address"><span class="badge">Mac Address</span></label>
						    <input type="text" class="form-control" id="mac_address" name="mac_address" value="'.$oneDevice->getMacAddress($row['mac_address']).'">
						  </div>

						  
					    </div>
					
						  <button type="submit" class="btn btn-success btn-block" id="edit_device">
						  	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
						</form> 

				</div>


			  </div>';


	} // END OF FUNCTION



	// ==================================================================================================== //
	// PERSISTENCIA //
	// ==================================================================================================== //
	public function addDevice($oneDevice,$nombre_apellido,$patrimonio,$ip,$gateaway,$submask,$dns,$nro_oficina,$login_usuario,$sistema_operativo,$periscopio,$puesto_ubicacion,$mac_address,$conn,$db_basename){

		// se verifica si existe el registro
		mysqli_select_db($conn,$db_basename);
		$sql = "select * from pi_equipamiento where ip = '$ip'";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);

		if($rows == 0){

			$sql_1 = "insert into pi_equipamiento ".
					 "(nombre_apellido,
					   patrimonio,
					   ip,
					   gateaway,
					   submask,
					   dns,
					   nro_oficina,
					   login_usuario,
					   sistema_operativo,
					   periscopio,
					   puesto_ubicacion,
					   mac_address
					  ) ".
					  "values ".
					  "($oneDevice->setNombreApellido('$nombre_apellido'),
					    $oneDevice->setPatrimonio('$patrimonio'),
					    $oneDevice->setIp('$ip'),
					    $oneDevice->setGateaway('$gateaway'),
					    $oneDevice->setSubmask('$submask'),
					    $oneDevice->setDns('$dns'),
					    $oneDevice->setNroOficina('$nro_oficina'),
					    $oneDevice->setUsuario('$login_usuario'),
					    $oneDevice->setSistemaOperativo('$sistema_operativo'),
					    $oneDevice->setPeriscopio('$periscopio'),
					    $oneDevice->setPuestoUbicacion('$puesto_ubicacion'),
					    $oneDevice->setMacAddress('$mac_address'))";

			$query_1 = mysqli_query($conn,$sql_1);

			if($query_1){
				
				$success = "Se ha insertado registro en la tabla pi_equipamiento";
				$oneDevice->mysqlDeviceSuccessLogs($success);
				echo 1;

			}else{
				
				$error = mysqli_error($conn);
				$oneDevice->mysqlDeviceErrorLogs($error);
				echo -1;
				
			}

		}else if($rows > 0){
			echo 9; // registro existente
		}
 
	} // END OF FUNCTION


	public function updateDevice($oneDevice,$id,$nombre_apellido,$patrimonio,$ip,$gateaway,$submask,$dns,$nro_oficina,$login_usuario,$sistema_operativo,$periscopio,$puesto_ubicacion,$mac_address,$conn,$db_basename){

		mysqli_select_db($conn,$db_basename);
		$sql = "update pi_equipamiento set ".
			   "nombre_apellido = $oneDevice->setNombreApellido('$nombre_apellido'), ".
			   "patrimonio = $oneDevice->setPatrimonio('$patrimonio'), ".
			   "ip = $oneDevice->setIp('$ip'), ".
			   "gateaway = $oneDevice->setGateaway('$gateaway'), ".
			   "submask = $oneDevice->setSubmask('$submask'), ".
			   "dns = $oneDevice->setDns('$dns'), ".
			   "nro_oficina = $oneDevice->setNroOficina('$nro_oficina'), ".
			   "login_usuario = $oneDevice->setUsuario('$login_usuario'), ".
			   "sistema_operativo = $oneDevice->setSistemaOperativo('$sistema_operativo'), ".
			   "periscopio = $oneDevice->setPeriscopio('$periscopio'), ".
			   "puesto_ubicacion = $oneDevice->setPuestoUbicacion('$puesto_ubicacion'), ".
			   "mac_address = $oneDevice->setMacAddress('$mac_address') where id = '$id'";

		$query = mysqli_query($conn,$sql);

		if($query){
			$success = "Se ha actualizado registro en la tabla pi_equipamiento con ID: ".$id;
			$oneDevice->mysqlDeviceSuccessLogs($success);
			echo 1;
		}else{
			$error = mysqli_error($conn);
			$oneDevice->mysqlDeviceErrorLogs($error);
			echo -1;
		}

	} // END OF FUNCTION



	// ==================================================================================================== //
	// MANEJO DE LOGS //
	// ==================================================================================================== //
	public function mysqlDeviceErrorLogs($error){
	    
	      $fileName = "device_mysql_error.log.txt"; 
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


	public function mysqlDeviceSuccessLogs($success){
    
      $fileName = "device_mysql_success.log.txt"; 
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