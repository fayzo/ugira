<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

// MOVIES LIST // MOVIES LIST // MOVIES LIST

     if(isset($_REQUEST['categories']) && $_REQUEST['categories'] === 'america-movies' ) {  
        echo $movies->moviesViewMoreList($_REQUEST['pages'],$_REQUEST['categories']); 
      }

     if(isset($_REQUEST['categories']) && $_REQUEST['categories'] === 'Tv-Series' ) {  
       echo $movies->moviesViewMoreList($_REQUEST['pages'],$_REQUEST['categories']); 
      }

     if(isset($_REQUEST['categories']) && $_REQUEST['categories'] === 'Anime-Series' ) {  
       echo $movies->moviesViewMoreList($_REQUEST['pages'],$_REQUEST['categories']); 
      }

     if(isset($_REQUEST['categories']) && $_REQUEST['categories'] === 'Cartoons-Movies' ) {  
       echo $movies->moviesViewMoreList($_REQUEST['pages'],$_REQUEST['categories']); 
      }

     if(isset($_REQUEST['categories']) && $_REQUEST['categories'] === 'Africans-Movies' ) {  
        echo $movies->moviesViewMoreList($_REQUEST['pages'],$_REQUEST['categories']); 
      }

  //  MOVIES CATEGORIES //  MOVIES CATEGORIES //  MOVIES CATEGORIES 

     if(isset($_REQUEST['categories']) && $_REQUEST['categories'] === 'Action' ) {  
        echo $movies->moviesCategoriesList($_REQUEST['pages'],$_REQUEST['categories']); 
      }
   
?>