<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

     if(isset($_REQUEST['categories'])) {  
        echo $house->houseList($_REQUEST['categories'],$_REQUEST['pages'],$_REQUEST['user_id']); 
      }

?>