<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

     if(isset($_REQUEST['categories'])) {  
        echo $events->eventsList($_REQUEST['pages'],$_REQUEST['categories'],$_SESSION['key']); 
      }

?>