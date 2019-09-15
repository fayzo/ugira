<?php 
session_start();
include "core/init.php";

if ($users->employersloggedin() == false) {
    header('location: domestic.php');
}
?>
<?php include "header_navbar_footer/header_domestics_login.php"?>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>
  <?php include "header_navbar_footer/siderbar_Viewdomestic.php"?>
<?php include "header_navbar_footer/footer.php"?>
