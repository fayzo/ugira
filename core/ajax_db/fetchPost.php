<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['fetchPost']) && !empty($_POST['fetchPost'])) {
    $user_id= $_SESSION['key'];
    $limit= (int) trim($_POST['fetchPost']);
    // echo  $limit;
    $posts->tweets($user_id,$limit);
}
?>