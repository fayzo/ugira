<?php 
session_start();
include "core/init.php";

if ($users->loggedin() == false) {
    header('location: '.LOGIN.'');
}

if (isset($_GET['hashtag']) && !empty($_GET['hashtag'])) {
    $user_id= $_SESSION['key'];
    $hashtag= $users->test_input($_GET['hashtag']);
    $jobs= $home->jobsData($_SESSION['key']);
    $fundraisingV= $home->fundraisingData($_SESSION['key']);
    $eventV= $home->eventsData($_SESSION['key']);
    $blogV= $home->blogData($_SESSION['key']);
    $saleV= $home->saleData($_SESSION['key']);
	$user= $home->userData($user_id);
	$notific= $notification->getNotificationCount($user_id);
	$notification->notificationsView($user_id);
}

if(!empty($data['language'])){
    $_SESSION['language'] = $user['language'];
}

 if (!isset($_SESSION['language'])){
 		$_SESSION['lang'] = "en";
}else if (isset($_SESSION['language']) && !empty($_SESSION['language'])) {
		$_SESSION['lang'] = $_SESSION['language'];
}
 require_once "assets/languages/".$_SESSION['lang']. ".php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo '#'.$hashtag.' hashtag on Posts' ; ?></title>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

<!-- container-fuild -->
<div class="container mb-5 mt-4">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i><?php echo '#'.$hashtag.' hashtag' ; ?></i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><i><a href="<?php echo BASE_URL_PUBLIC.$hashtag.'.latest.hashtag' ;?>">Latest</a></i></li>
                    <li class="breadcrumb-item "><i><a href="<?php echo BASE_URL_PUBLIC.$hashtag.'.users.hashtag' ;?>">Accounts</a></i></li>
                    <li class="breadcrumb-item "><i><a href="<?php echo BASE_URL_PUBLIC.$hashtag.'.photos.hashtag' ;?>">Photos</a></i></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-3 mb-3">
                <!-- Profile Image -->
                    <!-- Profile Image -->
                        <div class="info-box mb-3">
                            <div class="info-inner">
                                <div class="info-in-head">
                                    <!-- PROFILE-COVER-IMAGE -->
                                     <?php if (!empty($user['cover_img'])) {?>
                                      <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['cover_img'] ;?>" alt="User Image">
                                      <?php  }else{ ?>
                                        <img src="<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>"  alt="User Image">
                                      <?php } ?>
                                </div>
                                <!-- info in head end -->
                                <div class="info-in-body">
                                    <div class="in-b-box">
                                        <div class="in-b-img">
                                            <!-- PROFILE-IMAGE -->
                                             <?php if (!empty($user['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>"  alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                    </div><!--  in b box end-->
                                    <div class="info-body-name">
                                        <div class="in-b-name">
                                            <div><a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a></div> <!-- Nina Mcintire -->
                                            <span><small><a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['career'] ;?></a></small></span>
                                        </div><!-- in b name end-->
                                    </div><!-- info body name end-->
                                </div><!-- info in body end-->
                                <div class="info-in-footer">
                                    <div class="number-wrapper">
                                        <div class="num-box">
                                            <div class="num-head">
                                                POSTS
                                            </div>
                                            <div class="num-body">
                                               <?php echo $home->countsPosts($user_id);?>
                                            </div>
                                        </div>
                                        <div class="num-box">
                                            <div class="num-head">
                                                FOLLOWING
                                            </div>
                                            <div class="num-body">
                                                <span class="count-following"><?php echo $user['following'] ;?></span>
                                            </div>
                                        </div>
                                        <div class="num-box">
                                            <div class="num-head">
                                                FOLLOWERS
                                            </div>
                                            <div class="num-body">
                                                <span class="count-followers"><?php echo $user['followers'] ;?></span>
                                            </div>
                                        </div>
                                    </div><!-- mumber wrapper-->
                                </div><!-- info in footer -->
                            </div><!-- info inner end -->
                        </div><!-- info box -->

                <!-- hastTag Me Box -->
                 <?php echo $trending->trends(); ?>
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <?php 
                    if (strpos($_SERVER['REQUEST_URI'],'.photos')): 
                    	?>
                    <!-- TWEETS IMAGES  -->
                    	 <?php 
                    	$tweets = $trending->getTweetsTrendbyhastag($hashtag);
                    	// echo var_dump($tweets);
                    	foreach ($tweets as $tweet) {
                    	     if (!empty($tweet['tweet_image'])) {
                                # code...
                    		    $likes= $home->likes($user_id,$tweet['tweet_id']);
                                $retweet= $home->checkRetweet($tweet['tweet_id'],$user_id);
                                $user= $home->userData($retweet['retweet_by']);
                                $comment= $posts->comments($tweet['tweet_id']);
                                ?>

                          <div class="card mb-3">
                              <div class="card-body">
                                   
                                <div class="post">
                                    <?php 
                                     if($retweet['retweet_id'] == $tweet["tweet_id"] || $tweet["retweet_id"] > 0){ ?>
                                      <span class="t-show-banner">
                                          <div class="t-show-banner-inner">
                                              <span><i class="fa fa-retweet "></i></span><span><?php echo $user['username'].' Shared';?></span>
                                          </div>
                                      </span>
                                     <?php } else{ echo '';}?>

                               <?php if(!empty($retweet['retweet_Msg']) && $tweet["tweet_id"] == $retweet["retweet_id"] || $tweet["retweet_id"] > 0){ ?> 
                                    <div class="user-block">
                                        <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                              <?php if (!empty($user['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                            <span class="description">Shared public - <?php echo $home->timeAgo($retweet['posted_on']); ?></span>
                                        </span>
                                        <span class="description"><?php echo $home->getTweetLink($retweet['retweet_Msg']); ?></span>
                                    </div>

                                    <div class="card retweetcolor t-show-popup more" data-tweet="<?php echo $tweet["tweet_id"];?>">
                                      <div class="card-body ">
                                          <?php 
                                              $filename = $tweet['tweet_image'];
                                              $expodefile = explode("=",$tweet['tweet_image']);
                                              $fileActualExt= array();
                                              for ($i=0; $i < count($expodefile); ++$i) { 
                                                  $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                              }
                                              $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                              if (array_diff($fileActualExt,$allower_ext) == false) {
                                     			$expode = explode("=",$tweet['tweet_image']); 
                                                $count = count($expode); ?>
                                          <div class="row">
                                              <div class="col-6 ">

                                               <?php if ($count === 1) { ?>
                                                    <div class="row mb-1">
                                                           <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                                       <div class="col-sm-12">
                                                           <img class="img-fluid"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                    </div>

                                               <?php }else if($count == 2 || $count > 2){ ?>
                                                     <div class="row mb-2">
                                                           <?php 
                                                             $expode = explode("=",$tweet['tweet_image']);
                                                             $splice= array_splice($expode,0,2);
                                                             for ($i=0; $i < count($splice); ++$i) { 
                                                             ?>
                                                       <div class="col-sm-6">
                                                           <img class="img-fluid mb-2"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                           <?php } ?>
                                                    </div>
                                                    <div class="row">
                                                       <div class="col-sm-12">
                                                              <span class="btn btn-primary btn-sm float-right" >View More photo  <i class="fa fa-picture-o"></i> >>></span>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                               <?php } ?>
                                                </div> <!-- col -->

                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->
                                           </div><!-- row -->
                                           
                                            <?php   }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <video controls poster="../assets/image/img/avatar3.png" width="248px" height="110px">
                                                            <source src="git.mp4" type="video/mp4"> 
                                                            <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                                                <!-- fallback content here -->
                                                        </video>
                                                    </div><!-- col -->
                                                    
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                   <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            //  <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                            }else{
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-camera-retro main-active" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                                <div class="row">
                                                    <div class="col-6 ">
                                                         <video controls poster="../assets/image/img/avatar3.png" width="640" height="360">
                                                             <source src="video/boatride.webm" type="video/webm"> 
                                                                 <!-- fallback content herehere -->
                                                         </video>      
                                                     </div><!-- col -->

                                                 <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                   <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                                <div class="row">
                                                     <div class="col-6 ">
                                                          <audio controls>
                                                              <source src="50-Cent-Baby-By-Me-ft-Ne-Yo-128K-MP3.mp3" type="audio/mp3">
                                                                  <!-- fallback content here -->
                                                          </audio>
                                                       </div><!-- col -->

                                                 <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                                    <audio controls>
                                                         <source src="audio/heavymetal.ogg" type="audio/ogg"> 
                                                             <!-- fallback content here -->
                                                     </audio>
                                              <?php }else { ?>
                                                    <div class="row">
                                                       <div class="col-12">

                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                   <span class="username">
                                                                       <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                       <!-- //Jonathan Burke Jr. -->
                                                                       <span class="description">Shared publicly - <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                                   </span>
                                                                   <span class="description"><?php echo $home->getTweetLink($tweet['status']); ?></span>
                                                               </div>

                                                        </div><!-- col -->
                                                    </div><!-- row -->

                                            <?php } ?>

                                      </div><!-- card-body -->
                                    </div><!-- card -->

                                <?php } else { ?> 

                                    <div class="user-block">
                                       <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                              <?php if (!empty($tweet['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a
                                                href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                        </span>
                                        <span class="description">Shared publicly - <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <?php 
                                    $expodefile = explode("=",$tweet['tweet_image']);
                                    $fileActualExt= array();
                                    for ($i=0; $i < count($expodefile); ++$i) { 
                                        $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                    }
                                    $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                    if (array_diff($fileActualExt,$allower_ext) == false) {
                                    // if (!empty($tweet['tweet_image'])) {
                                        $expode = explode("=",$tweet['tweet_image']);
                                        $count = count($expode); ?>

                                     <?php if ($count === 1) { ?>

                                     <div class="row mb-1">
                                            <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                        <div class="col-sm-12 more">
                                            <img class="img-fluid "
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                     </div>


                                    <?php
                                     }else if($count === 2){?>
                                        <div class="row mb-2 more">
                                                <?php $expode = explode("=",$tweet['tweet_image']);
                                                  $splice= array_splice($expode,0,2);
                                                  for ($i=0; $i < count($splice); ++$i) { 
                                                  ?>
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-2 imageViewPopup"
                                                    src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                    alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                            </div>
                                                <?php }?>
                                        </div>

                                    <?php }else if($count == 3 || $count > 3){?>
                                     <div class="row mb-2 more">
                                            <?php $expode = explode("=",$tweet['tweet_image']);
                                              $splice= array_splice($expode,0,1);
                                              ?>
                                        <div class="col-sm-6">
                                            <img class="img-fluid mb-2 imageViewPopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-sm-6">
                                            <div class="row mb-2 more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    // var_dump($expode);
                                                    $splice= array_splice($expode,1,2);
                                                    // var_dump($splice);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imageViewPopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                            <div class="row more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    $splice= array_splice($expode,3,2);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imageViewPopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- /.row -->
                                    <div class="row">
                                       <div class="col-sm-12">
                                           <span class="btn btn-primary btn-sm float-right imageViewPopup more"  data-tweet="<?php echo $tweet["tweet_id"] ;?>" >View More photo <i class="fa fa-picture-o"></i>  >>></span>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                <?php }
                                     
                                    }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                    <div class="row mb-2" >
                                    <div class="col-12" >
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="500px" height="280px">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/mp4"> 
                                        <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                            <!-- fallback content here -->
                                    </video>
                                    </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                 <div class="row mb-2">
                                    <div class="col-12">
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="auto" height="auto">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/webm"> 
                                            <!-- fallback content herehere -->
                                    </video>
                                     </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/mp3">
                                             <!-- fallback content here -->
                                     </audio>
                                      </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/ogg"> 
                                             <!-- fallback content here -->
                                     </audio>
                              <?php } ?>

                             <?php } ?>

                              <ul class="mt-2 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                        <?php if($tweet['tweet_id'] == $retweet['retweet_id']){ ?>
                                         <li class=" list-inline-item"><button class="share-btn retweeted text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                         <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet["retweet_counts"];?></span></i>
                                            Share</button></li>
                                        <?php }else{ ?>

                                               <li  class=" list-inline-item"> <button class="share-btn retweet text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                <?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?>
                                                   Share</button></li>

                                         <?php } ?>
                                            <?php if($likes['like_on'] == $tweet['tweet_id']){ ?>
                                                <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweet_by']; ?>">
                                                <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $tweet['likes_counts'] ;?></span></i>
                                                    Like</button></li>

                                            <?php }else{ ?>
                                                  <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweet_by']; ?>">
                                                   <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($tweet['likes_counts'] > 0){ echo $tweet['likes_counts'];}else{ echo '';} ?></span></i>
                                                       Like</button></li>
                                            <?php } ?>
                                         <span style="float:right">
                                    
                                         <?php if ($tweet["tweetBy"] == $user_id){ ?>
                                            <li  class=" list-inline-item">
                                                <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                    <li>
                                                       <a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                        <ul style="list-style-type: none; margin:0px;" >
											                <li style="list-style-type: none; margin:0px;"> 
                        					                    <label class="deleteTweet" data-tweet="<?php echo  $tweet["tweet_id"];?>"  data-user="<?php echo $tweet["tweetBy"];?>" >Delete </label>
                                                           </li>
                                                       </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                         <?php }else{ echo '';}?>
                                         </span>
                                </ul>
                              </div>
                             <!-- /.post -->
                          </div>
                           <!-- /.card-body -->
                         </div>
                         <!-- /.card-end -->
                    
                      <?php }else{ ?>
                             <div class="card">
                                 <img class="card-img-top img-fluid" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL; ?>" alt="">
                                 <div class="card-body">
                                     <h4 class="card-title text-center">NO PHOTO</h4>
                                 </div>
                             </div>
                    <?php 	} 
                    	}
                    	 ?>
                    <!-- TWEETS IMAGES -->
                    <?php 
                    elseif (strpos($_SERVER['REQUEST_URI'],'.users')):?>
                    <!--TWEETS ACCOUTS-->
                             <div class="row">
                            <?php 
                            $accounts= $trending->getUsersHashtag($hashtag);
                            foreach ($accounts as $account) { ?>
                             <div class="col-md-4 mb-3">
                                  <!-- Widget: user widget style 1 -->
                                  <div class="card card-follow user-follow">
                                      <!-- Add the bg color to the header using any of the bg-* classes -->
                                       <?php if (!empty($account['cover_img'])) { ?>
                                        <div class="user-header-follow text-white" style="background: url('<?php echo BASE_URL_LINK."image/users_profile_cover/".$account['cover_img'] ;?>') center center;background-size: cover; overflow: hidden; width: 100%;">
                                        <?php }else{ ?>
                                          <div class="user-header-follow text-white" style="background: url('<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>') center center;background-size: cover; overflow: hidden; width: 100%;">
                                       <?php  } ?>
              
                                      </div>
                                      <div class="user-image-follow">
                                        <?php if(!empty($account['profile_img'])){ ?>
                                          <img class="rounded-circle elevation-2"
                                              src="<?php echo BASE_URL_LINK."image/users_profile_cover/".$account['profile_img'] ;?>" >
                                        <?php }else{ ?>
                                             <img class="rounded-circle elevation-2" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>"  />
                                          <?php } ?>
                                      </div>
                                      <div class="card-footer">
                                          <h5 class="user-username-follow"><a href="<?php echo BASE_URL_PUBLIC.$account['username'] ;?>"><?php echo $account['username'] ;?></a></h5>
                                          <h5 class="user-username-follow"><small><?php echo $home->getTweetLink($account['career']) ;?></small></h5>
                                          <span><?php echo $follow->followBtn($account['user_id'],$user_id,$user_id) ;?></span>
                                      </div>
                                      <!-- /.footer -->
                                  </div>
                                  <!-- /. card widget-user -->
                              </div>
                              <!-- col --> 
                            <?php } ?>
                         </div>
                    <!-- TWEETS ACCOUNTS -->
                    <?php 
                    else :	?>
                    	<?php 
                    	$tweets = $trending->getTweetsTrendbyhastag($hashtag);
                    	 foreach ($tweets as $tweet) {
                                # code...
                                $likes= $home->likes($user_id,$tweet['tweet_id']);
                                $retweet= $home->checkRetweet($tweet['tweet_id'],$user_id);
                                $user= $home->userData($retweet['retweet_by']);
                                $comment= $posts->comments($tweet['tweet_id']);
                                // var_dump( $comments);

                                     # code... 
                                    //  echo var_dump($retweet['retweet_Msg']).'<br>';
                                ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                   
                                <div class="post">
                                    <?php 
                                     if($retweet['retweet_id'] == $tweet["tweet_id"] || $tweet["retweet_id"] > 0){ ?>
                                      <span class="t-show-banner">
                                          <div class="t-show-banner-inner">
                                              <span><i class="fa fa-retweet "></i></span><span><?php echo $user['username'].' Shared';?></span>
                                          </div>
                                      </span>
                                     <?php } else{ echo '';}?>

                               <?php if(!empty($retweet['retweet_Msg']) && $tweet["tweet_id"] == $retweet["retweet_id"] || $tweet["retweet_id"] > 0){ ?> 
                                    <div class="user-block">
                                        <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                              <?php if (!empty($user['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                            <span class="description">Shared public - <?php echo $home->timeAgo($retweet['posted_on']); ?></span>
                                        </span>
                                        <span class="description"><?php echo $home->getTweetLink($retweet['retweet_Msg']); ?></span>
                                    </div>

                                    <div class="card retweetcolor t-show-popup more" data-tweet="<?php echo $tweet["tweet_id"];?>">
                                      <div class="card-body ">
                                          <?php 
                                              $filename = $tweet['tweet_image'];
                                              $expodefile = explode("=",$tweet['tweet_image']);
                                              $fileActualExt= array();
                                              for ($i=0; $i < count($expodefile); ++$i) { 
                                                  $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                              }
                                              $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                              if (array_diff($fileActualExt,$allower_ext) == false) {
                                     			$expode = explode("=",$tweet['tweet_image']); 
                                                $count = count($expode); ?>
                                          <div class="row">
                                              <div class="col-6 ">

                                               <?php if ($count === 1) { ?>
                                                    <div class="row mb-1">
                                                           <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                                       <div class="col-sm-12">
                                                           <img class="img-fluid"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                    </div>

                                               <?php }else if($count == 2 || $count > 2){ ?>
                                                     <div class="row mb-2">
                                                           <?php 
                                                             $expode = explode("=",$tweet['tweet_image']);
                                                             $splice= array_splice($expode,0,2);
                                                             for ($i=0; $i < count($splice); ++$i) { 
                                                             ?>
                                                       <div class="col-sm-6">
                                                           <img class="img-fluid mb-2"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                           <?php } ?>
                                                    </div>
                                                    <div class="row">
                                                       <div class="col-sm-12">
                                                              <span class="btn btn-primary btn-sm float-right" >View More photo  <i class="fa fa-picture-o"></i> >>></span>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                               <?php } ?>
                                                </div> <!-- col -->

                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->
                                           </div><!-- row -->
                                           
                                            <?php   }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <video controls poster="../assets/image/img/avatar3.png" width="248px" height="110px">
                                                            <source src="git.mp4" type="video/mp4"> 
                                                            <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                                                <!-- fallback content here -->
                                                        </video>
                                                    </div><!-- col -->
                                                    
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                   <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            //  <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                            }else{
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-camera-retro main-active" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                                <div class="row">
                                                    <div class="col-6 ">
                                                         <video controls poster="../assets/image/img/avatar3.png" width="640" height="360">
                                                             <source src="video/boatride.webm" type="video/webm"> 
                                                                 <!-- fallback content herehere -->
                                                         </video>      
                                                     </div><!-- col -->

                                                 <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                   <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                                <div class="row">
                                                     <div class="col-6 ">
                                                          <audio controls>
                                                              <source src="50-Cent-Baby-By-Me-ft-Ne-Yo-128K-MP3.mp3" type="audio/mp3">
                                                                  <!-- fallback content here -->
                                                          </audio>
                                                       </div><!-- col -->

                                                 <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                                    <audio controls>
                                                         <source src="audio/heavymetal.ogg" type="audio/ogg"> 
                                                             <!-- fallback content here -->
                                                     </audio>
                                              <?php }else { ?>
                                                    <div class="row">
                                                       <div class="col-12">

                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                   <span class="username">
                                                                       <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                       <!-- //Jonathan Burke Jr. -->
                                                                       <span class="description">Shared publicly - <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                                                   </span>
                                                                   <span class="description"><?php echo $home->getTweetLink($tweet['status']); ?></span>
                                                               </div>

                                                        </div><!-- col -->
                                                    </div><!-- row -->

                                            <?php } ?>

                                      </div><!-- card-body -->
                                    </div><!-- card -->

                                <?php } else { ?> 

                                    <div class="user-block">
                                       <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                              <?php if (!empty($tweet['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a
                                                href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                        </span>
                                        <span class="description">Shared publicly - <?php echo $home->timeAgo($tweet['posted_on']); ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <?php 
                                    $expodefile = explode("=",$tweet['tweet_image']);
                                    $fileActualExt= array();
                                    for ($i=0; $i < count($expodefile); ++$i) { 
                                        $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                    }
                                    $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                    if (array_diff($fileActualExt,$allower_ext) == false) {
                                    // if (!empty($tweet['tweet_image'])) {
                                        $expode = explode("=",$tweet['tweet_image']);
                                        $count = count($expode); ?>

                                     <?php if ($count === 1) { ?>

                                     <div class="row mb-1">
                                            <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                        <div class="col-sm-12 more">
                                            <img class="img-fluid imageViewPopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                     </div>


                                    <?php
                                     }else if($count === 2){?>
                                        <div class="row mb-2 more">
                                                <?php $expode = explode("=",$tweet['tweet_image']);
                                                  $splice= array_splice($expode,0,2);
                                                  for ($i=0; $i < count($splice); ++$i) { 
                                                  ?>
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-2 imageViewPopup"
                                                    src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                    alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                            </div>
                                                <?php }?>
                                        </div>

                                    <?php }else if($count == 3 || $count > 3){?>
                                     <div class="row mb-2 more">
                                            <?php $expode = explode("=",$tweet['tweet_image']);
                                              $splice= array_splice($expode,0,1);
                                              ?>
                                        <div class="col-sm-6">
                                            <img class="img-fluid mb-2 imageViewPopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-sm-6">
                                            <div class="row mb-2 more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    // var_dump($expode);
                                                    $splice= array_splice($expode,1,2);
                                                    // var_dump($splice);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imageViewPopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                            <div class="row more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    $splice= array_splice($expode,3,2);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imageViewPopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- /.row -->
                                    <div class="row">
                                       <div class="col-sm-12">
                                           <span class="btn btn-primary btn-sm float-right imageViewPopup more"  data-tweet="<?php echo $tweet["tweet_id"] ;?>" >View More photo <i class="fa fa-picture-o"></i>  >>></span>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                <?php }
                                     
                                    }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                    <div class="row mb-2" >
                                    <div class="col-12" >
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="500px" height="280px">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/mp4"> 
                                        <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                            <!-- fallback content here -->
                                    </video>
                                    </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                 <div class="row mb-2">
                                    <div class="col-12">
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="auto" height="auto">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/webm"> 
                                            <!-- fallback content herehere -->
                                    </video>
                                     </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/mp3">
                                             <!-- fallback content here -->
                                     </audio>
                                      </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/ogg"> 
                                             <!-- fallback content here -->
                                     </audio>
                              <?php }?>

                                  <p id="link_">
                                     <?php echo $home->getTweetLink($tweet['status']) ;?>
                                   </p>
                             <?php } ?>

                              <ul class="mt-2 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                        <?php if($tweet['tweet_id'] == $retweet['retweet_id']){ ?>
                                         <li class=" list-inline-item"><button class="share-btn retweeted text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                         <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet["retweet_counts"];?></span></i>
                                            Share</button></li>
                                        <?php }else{ ?>

                                               <li  class=" list-inline-item"> <button class="share-btn retweet text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                <?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?>
                                                   Share</button></li>

                                         <?php } ?>
                                            <?php if($likes['like_on'] == $tweet['tweet_id']){ ?>
                                                <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweet_by']; ?>">
                                                <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $tweet['likes_counts'] ;?></span></i>
                                                    Like</button></li>

                                            <?php }else{ ?>
                                                  <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweet_by']; ?>">
                                                   <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($tweet['likes_counts'] > 0){ echo $tweet['likes_counts'];}else{ echo '';} ?></span></i>
                                                       Like</button></li>
                                            <?php } ?>
                                         <span style="float:right">
                                    
                                          <li  class=" list-inline-item"><button class="comments-btn text-sm" data-target="#a<?php echo  $tweet["tweet_id"];?>" data-toggle="collapse">
                                              <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                          </button></li>
                                        

                                         <?php if ($tweet["tweetBy"] == $user_id){ ?>
                                            <li  class=" list-inline-item">
                                                <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                    <li>
                                                       <a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                        <ul style="list-style-type: none; margin:0px;" >
											                <li style="list-style-type: none; margin:0px;"> 
                        					                    <label class="deleteTweet" data-tweet="<?php echo  $tweet["tweet_id"];?>"  data-user="<?php echo $tweet["tweetBy"];?>" >Delete </label>
                                                           </li>
                                                       </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                         <?php }else{ echo '';}?>
                                         </span>
                                </ul>

                                   <div class="card collapse hide" id="a<?php echo  $tweet["tweet_id"];?>">
                                      <div class="card-body">
                                         <div class="direct-chat-message direct-chat-messageS">
                                         <span id="commentsHome">
                                           <?php foreach ($comment as $comments) { ?>
                                                <!-- Conversations are loaded here -->
                                                  <!-- Message. Default to the left -->
                                                    <div class="direct-chat-msg">
                                                        <div class="direct-chat-info clearfix">
                                                            <span class="direct-chat-name float-left"><?php echo $comments["username"] ;?></span>
                                                            <span class="direct-chat-timestamp float-right"><?php echo $home->timeAgo($comments['comment_at']); ?></span>
                                                        </div>
                                                        <!-- /.direct-chat-info -->
                                                         <?php if (!empty($comments["profile_img"])) {?>
                                                          <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $comments["profile_img"] ;?>" alt="message user image">
                                                         <?php  }else{ ?>
                                                          <img class="direct-chat-img" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="message user image">
                                                         <?php } ?>
                                                        <!-- /.direct-chat-img -->
                                                        <div class="direct-chat-text">
                                                         <?php echo  $home->getTweetLink($comments["comment"]) ;?>
                                                        </div>
                                                      <!-- /.direct-chat-text -->
                                                      <ul class="mt-3 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                                                  
                                                        <?php if($likes['like_on'] == $comments['comment_id']){ ?>
                                                            <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $comments['comment_id']; ?>"  >
                                                            <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $comments['likes_counts'] ;?></span></i>
                                                                Like</button></li>
                                    
                                                         <?php }else{ ?>
                                                               <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $comments['comment_id']; ?>"  >
                                                                <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($tweet['likes_counts'] > 0){ echo $tweet['likes_counts'];}else{ echo '';} ?></span></i>
                                                                    Like</button></li>
                                                         <?php } ?>
                            
                                                           <span style="float:right">
                                                                              
                                                        <li  class=" list-inline-item"><button class="comments-btn text-sm" data-target="#a<?php echo  $comments["comment_id"] ;?>" data-toggle="collapse">
                                                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                                        </button></li>
                                                                     
                            
                                                            <?php if ($comments["comment_by"] == $user_id){ ?>
                                                               <li  class=" list-inline-item">
                                                                   <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                                       <li>
                                                                          <a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                                           <ul style="list-style-type: none; margin:0px;" >
					                            	    	                <li style="list-style-type: none; margin:0px;"> 
                                                 	    	                    <label class="deleteCommentPost" data-tweet="<?php echo  $comments["comment_id"];?>"  data-user="<?php echo $comments["comment_by"];?>" >Delete </label>
                                                                              </li>
                                                                          </ul>
                                                                       </li>
                                                                   </ul>
                                                               </li>
                                                            <?php }else{ echo '';}?>
                                                            </span>
                                                        </ul>
                            
                                                    <div class="card collapse hide border-bottom-0" id="a<?php echo  $comments["comment_id"];?>" >
                                                        <div class="card-body">
                                                          <!-- Conversations are loaded here -->
                                                          <div class="direct-chat-message">
                                                            <!-- Message. Default to the left -->
                                                              <div class="direct-chat-msg">
                                                                  <div class="direct-chat-info clearfix">
                                                                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                                  </div>
                                                                  <!-- /.direct-chat-info -->
                                                                         <?php if (!empty($comments['profile_img'])) {?>
                                                                          <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $comments['profile_img'] ;?>" alt="message user image">
                                                                         <?php  }else{ ?>
                                                                          <img class="direct-chat-img" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="message user image">
                                                                         <?php } ?>
                                                                  <!-- /.direct-chat-img -->
                                                                  <div class="direct-chat-text">
                                                                    Is this template really for free? That's unbelievable!
                                                                  </div> <!-- /.direct-chat-text -->
                                                               </div> <!-- /.direct-chat-msg -->
                                                           </div> <!-- /.direct-chat-message -->
                                                        </div> <!-- /.card-body-->
                            
                                                         <div class="card-footer p-0 border-top-0 border-bottom-0">
                                                            <div class="input-group">
                                                                 <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                                                 <div class="input-group-append">
                                                                     <span class="input-group-text btn" onclick="#" aria-label="Username" aria-describedby="basic-addon1"><span
                                                                             class="fa fa-arrow-right text-muted"></span></span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                    </div> <!-- /.card collapse -->
                                                   </div> <!-- /.direct-chat-msg -->
                                          <?php } ?>
                                          </span>
                                      </div> <!-- /.card-body-->
                                      </div> <!-- /.direct-message -->
                                    </div> <!-- /.card collapse -->

                                      <div class="input-group">
                                          <input class="form-control form-control-sm" id="commentHome" type="text"
                                              name="comment" data-tweet="<?php echo $tweet['tweet_id'];?>"
                                              placeholder="Reply to  <?php echo $tweet['username'] ;?>">
                                          <div class="input-group-append">
                                              <span class="input-group-text btn" style="padding: 0px 10px;" 
                                                  aria-label="Username" aria-describedby="basic-addon1">
                                                  <span class="fa fa-arrow-right text-muted" id="post_HomeComment"></span></span>
                                          </div>
                                      </div> <!-- input-group -->
                                </div>
                                <!-- /.post -->
                             </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card-end -->
                                <?php } ?>

				<?php endif; ?>
            </div>
            <!-- /.col-md-6 -->

            <div class="col-md-3">
                 <div class="row">
                    <div class="col-md-12 mb-3">
                        <!-- whoTofollow: user whoTofollow style 1 -->
                       <?php echo $follow->whoTofollow($user_id,$user_id) ;?>
                    </div>
                    <!-- /. col -->

                    <div class="col-md-12">
                       <!-- jobs -->
                        <?php echo $home->jobsfetch() ;?>
                        <!-- jobs -->
                         
                    </div>
                    <!-- /.col -->
                 </div>
                 <!-- /.row -->
            </div>
              <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "header_navbar_footer/footer.php"?>