<?php

function mainNavBar($nombre,$user_id,$avatar){
	

	echo '<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			    <form action="#" method="POST">
			      <button class="btn btn-default btn-sm navbar-btn" type="submit" name="home"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Parque Informático</button>
			    </form>
			    </div>

			    <ul class="nav navbar-nav">
			      
			      <button type="button" class="btn btn-default btn-sm navbar-btn" data-toggle="modal" data-target="#myModalAbout">
			      	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> A cerca de..</button>
			      
			      <button type="button" class="btn btn-default btn-sm navbar-btn" data-toggle="modal" data-target="#myModalDocumentation">
			      	<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Documentación</button>
			    </ul>
			    
			    <ul class="nav navbar-nav navbar-right">
			      
			      <div class="dropdown">
				    <button class="btn btn-primary dropdown-toggle navbar-btn" type="button" data-toggle="dropdown" data-toggle="tooltip" title="Menú"><img src="'.$avatar.'" alt="Avatar" class="avatar" /> '.$nombre.'</button>
				    <ul class="dropdown-menu">
				    <form action="#" method="POST">
				      <li class="dropdown-header">Menú del Usuario</li>
				      <li><button type="button" class="btn btn-default btn-sm btn-block" value="'.$user_id.'" onclick="callCambiarPassword(this.value);">
				      	<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Cambiar Password</button></li>
				      
				      <li><button type="submit" name="devices" class="btn btn-default btn-sm btn-block">
				      	<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Equipos</button></li>
				      
				      <li><button type="submit" name="map" class="btn btn-default btn-sm btn-block">
				      	<span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Mapa Equipos</button></li>
				      
				      <li class="divider"></li>
				      <li class="dropdown-header">Menú del sistema</li>
				      <li><button type="submit" name="users" class="btn btn-default btn-sm btn-block">
				      	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>

				      <li><button type="submit" name="os" class="btn btn-default btn-sm btn-block">
				      	<span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span> Sistemas Operativos</button></li>
				      
				      <li><button class="btn btn-danger btn-sm btn-block" type="submit" name="exit">
				      	<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
				     </form>
				    </ul>
				  </div>

			</div>
			      
			      
			    </ul>
			  </div>
			</nav>';

}


function modalAbout(){

	echo '<div class="modal fade" id="myModalAbout" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> A Cerca de...</h4>
		        </div>
		        <div class="modal-body">
		          
		        	<p><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Sistema de Gestión del Parque informáico</p><hr>

		          <ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#menu_1">
				    	<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Desarrollo</a></li>
				    
				    <li><a data-toggle="tab" href="#menu_2">
				    	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Tecnologías</a></li>
				    
				    <li><a data-toggle="tab" href="#menu_3">
				    	<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> Colaboradores</a></li>
				    
				    <li><a data-toggle="tab" href="#menu_4">
				    	<span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Versión</a></li>
				  </ul>

				  <div class="tab-content">
				    <div id="menu_1" class="tab-pane fade in active">
				      <h3>DESARROLLO</h3>
				      <p>Desarrollador Principal: Augusto Maza</p>
				    </div>
				    <div id="menu_2" class="tab-pane fade">
				      <h3>TECNOLGÍAS</h3>
				      <p>Bootstrap</p>
				      <p>PHP</p>
				      <p>HTML</p>
				      <p>Mysql/MariaDB</p>
				      <p>JavaScript</p>
				    </div>
				    <div id="menu_3" class="tab-pane fade">
				      <h3>COLABORADORES</h3>
				      <p>Gustavo Flores</p>
				    </div>
				    <div id="menu_4" class="tab-pane fade">
				      <h3>VERSION</h3>
				      <p>0.0.1 Beta.</p>
				    </div>
				  </div>

		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>';
}


function modalDocumentation(){

	echo '<div class="modal fade" id="myModalDocumentation" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Documentación</h4>
		        </div>
		        <div class="modal-body">
		          <p>Próximamente se incorporará documentación aquí</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>';

}




?>