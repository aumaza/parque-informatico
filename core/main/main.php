<?php session_start(); 
      
      error_reporting(E_ALL ^ E_NOTICE);
      ini_set('display_errors', 1);



      include "../../connection/connection.php";
      include "../lib/lib_system.php";
      include "lib_main.php";
      include "../devices/lib_devices.php";
      include "../OS/lib_os.php";
      include "../support/lib_support.php";
      include "../users/lib_users.php";


      $varsession = $_SESSION['user'];
      
      if($conn){

        $sql = "select id, nombre, avatar, functions from pi_usuarios where user = '$varsession' and find_in_set('Sys Admin', functions)>0";
        mysqli_select_db($conn,$db_basename);
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
          $nombre = $row['nombre'];
          $user_id = $row['id'];
          $avatar = '..'.substr($row['avatar'], 7);
          $function = $row['functions'];
                  
        }
      }else{
        echo 'CONNECTION FAILURE';
      }
  

  if($varsession == null || $varsession == ''){
        echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                <title>Parque Informático - Main</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">';
                skeleton();
                echo '</head><body style = "background: #839192;">';
                echo '<br><div class="container">
                        <div class="alert alert-danger" role="alert">';
                echo '<p align="center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Su sesión ha caducado. Por favor, inicie sesión nuevamente</p>';
                echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Iniciar</button></a>';  
                echo "</div></div>";
                die();
                echo '</body></html>';
  }


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Parque Informático - Menú Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>
</head>


<body>

<?php mainNavBar($nombre,$user_id,$avatar); ?>

  
<div class="container-fluid">
 
  <?php

    if($conn){
       
        // MODALES
        modalAbout();
        modalDocumentation();

        // SALIR DEL SISTEMA
        if(isset($_POST['exit'])){
          logOut($nombre);
        }

        // HOME
        if(isset($_POST['home'])){
          home();
        }

        // DEVICES SPACE
        $oneDevice = new Devices();

        if(isset($_POST['devices'])){
          $oneDevice->devicesList($oneDevice,$function,$conn,$db_basename);
        }


        // OS SPACE
        $oneOS = new OS();

        if(isset($_POST['os'])){
          $oneOS->osList($oneOS,$function,$conn,$db_basename);
        }

        // USERS SPACE
        $oneUser = new Users();

        if(isset($_POST['users'])){
          $oneUser->usersList($oneUser,$function,$conn,$db_basename);
        }


    }else{
      flyerConnFailure();
    }


  ?>


</div>

<script type="text/javascript" src="../devices/lib_devices.js"></script>
<script type="text/javascript" src="../OS/lib_os.js"></script>
<script type="text/javascript" src="../support/lib_support.js"></script>
<script type="text/javascript" src="../users/lib_users.js"></script>

</body>
</html>
