<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));


if (isset($_POST["id"]))
{
   $mysqli= $db;
   $sql="SELECT * FROM users WHERE user_id = '".$_POST["id"]."'";
   $query= $mysqli->query($sql);
  
   $output = '';
   while ($result = $query->fetch_assoc()) {
     # code...
     $results[]= $result ;
   }

   foreach($results as $user)
   { ?>

     <div  class="row" >
            <div class="col-md-12" style="width:362px;text-align:normal !important;" >

                <!-- Profile Image -->
                <div class="info-box">
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
                                    <div><a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a><span><?php echo $follow::followBtns( $user['user_id'], $user['user_id'], $user['user_id']); ?></span></div>
                                    <span><small><a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php if(!empty($user['career'])){ echo $user['career'] ;}else{ echo 'no career' ;} ?></a></small></span>
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
                                       <?php echo $home->countsPostss($user['user_id']);?>
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

            </div><!-- col -->
        </div><!-- row -->
   
   <?php }

}

?>