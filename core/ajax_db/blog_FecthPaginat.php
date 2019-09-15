<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_SESSION['key'])) {
        # code...
    $user_id= $_SESSION['key'];
}else {
    # code...
    $username= $users->test_input($_REQUEST['username']);
    $uprofileId= $home->usersNameId($username);
    $profileData= $home->userData($uprofileId['user_id']);
    $user_id= $profileData['user_id'];
}

if(isset($_REQUEST['categories'])) {  
  echo $blog->blogs($_REQUEST['pages'],$_REQUEST['categories'],$user_id); 
}

?>