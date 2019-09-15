<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

     if(isset($_REQUEST['categories']) && $_REQUEST['categories']) {  
        echo $landscapes->landscapesfetchALL($_REQUEST['categories']); 
      }
   
?>