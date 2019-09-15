<?php
include "../core/init.php";

session_start();
$users->forgotUsernameCountsTodelete('users',
array('forgotUsernameCounts' => 0, ),$_SESSION['keycreate']);
$db->query("UPDATE users SET chat = 'off' WHERE user_id= $_SESSION[key] ");

session_unset($_SESSION['key']);
session_unset($_SESSION['keycreate']);
session_unset($_SESSION['profile_img']);
session_unset($_SESSION['approval']);
session_unset($_SESSION['chat']);
session_unset($_SESSION['domestics']);
session_unset($_SESSION['employers']);
session_destroy();
header ('location: '.LOGIN.'');


?>