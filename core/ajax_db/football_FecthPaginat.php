<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

     if(isset($_REQUEST['pages']) && $_REQUEST['pages'] === '1' ) {  
        echo $football->currentDatefootballMatch($_REQUEST['pages']);
      }

     if(isset($_REQUEST['pages']) && $_REQUEST['pages'] === '2' ) {  
       echo $football->currentDatefootballMatch($_REQUEST['pages']);
      }

     if(isset($_REQUEST['pages']) && $_REQUEST['pages'] === '3' ) {  
       echo $football->currentDatefootballMatch($_REQUEST['pages']);
      }

     if(isset($_REQUEST['pages']) && $_REQUEST['pages'] === '4' ) {  
       echo $football->currentDatefootballMatch($_REQUEST['pages']);
      }

     if(isset($_REQUEST['pages']) && $_REQUEST['pages'] === '5' ) {  
        echo $football->currentDatefootballMatch($_REQUEST['pages']); 
      }

?>