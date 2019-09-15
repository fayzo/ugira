<?php include "header_navbar_footer/header_if_login.php"?>
<title>Home</title>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

<!-- container-fuild -->
<div class="container mb-5 mt-5">
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-3 mb-3">
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

                <!-- jobs -->
                <div class="sticky-top" style="top: -175px;">
                <?php echo $home->jobsfetch() ;?>
                </div>
                <!-- jobs -->
                  
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div id="response-posts"></div>
                        <div class="card  borders-tops ">
                            <div class="card-body message-color">
                                <form method="post" id="post_form" enctype="multipart/form-data">
                                    <input type="hidden" name="id_posts" id="id_posts"
                                        value="<?php echo $_SESSION['key'];?>">
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
                                            <textarea class="status" name="status" id="status"
                                                placeholder="Type Something here!" rows="4" cols="50"></textarea>
                                            <div class="hash-box">
                                                <ul>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>

                                    <div class="message-footer text-muted">
                                        <div class="t-fo-left">
                                            <ul>
                                                <input type="file" name="files[]" id="file" multiple>
                                                <li><label for="file"><i class="fa fa-camera"
                                                            aria-hidden="true"></i></label>
                                                    <span class="tweet-error">
                                                        <span style="color: red;" id="empty-posts"></span>
                                                         
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="t-fo-right">
                                            <span id="count">200</span>
                                            <input type="submit" class="btn main-active" name="tweet" value="Post">
                                        </div>
                                        <!--  progress-xs -->
                                        <span class="progress progress-hide">
                                            <span class="progress-bar bg-info" role="progressbar"
                                                style="width:0%;" id="pro" aria-valuenow="" aria-valuemin="0"
                                                aria-valuemax="100"></span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- card-body -->
                        </div>
                        <!-- card -->
                    </div>
                    <!-- ./Col -->

                    <div class="col-md-12 mb-4">
                        <div class="posted">
                        <!-- Box Comment -->
                        <div class="card  borders-tops card-profile card1">
                            <div class="card-body">

                                <?php echo $home->tweets( $_SESSION['key'],2)?>
                                <!-- Post -->
                                
                                <!-- Post -->
                                <div class="post mt-2 " style="border-top : 1px solid #00000052">
                                    <div class="user-block mt-4">
                                        <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                          <?php if (!empty($user['profile_img'])) {?>
                                           <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" class="user-image rounded-circle" alt="User Image">
                                           <?php  }else{ ?>
                                             <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" class="user-image rounded-circle" alt="User Image">
                                           <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a href="<?php echo PROFILE ;?>">Adam Jones</a>
                                        </span>
                                        <span class="description">Posted 5 photos - 5 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <img class="img-fluid"
                                                src="<?php echo BASE_URL_LINK ;?>image/img/photo1.png" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-3"
                                                        src="<?php echo BASE_URL_LINK ;?>image/img/photo2.png"
                                                        alt="Photo">
                                                    <img class="img-fluid"
                                                        src="<?php echo BASE_URL_LINK ;?>image/img/photo3.jpg"
                                                        alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-3"
                                                        src="<?php echo BASE_URL_LINK ;?>image/img/photo4.jpg"
                                                        alt="Photo">
                                                    <img class="img-fluid"
                                                        src="<?php echo BASE_URL_LINK ;?>image/img/photo1.png"
                                                        alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i>
                                            Share</a>
                                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i>
                                            Like</a>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                                <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </p>

                                    <div class="input-group">
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="Type a comment">
                                        <div class="input-group-append">
                                            <span class="input-group-text btn" onclick="#" aria-label="Username"
                                                aria-describedby="basic-addon1"><i
                                                    class="fa fa-arrow-right text-muted"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.loader posted -->
                       <div class="loading-div text-center mt-2">
		    		       <img id="loader" src="<?php echo BASE_URL_LINK."image/users_profile_cover/"?>loading.svg" style="display: none;"/> 
		          	   </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-md-6 -->
           

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                       <?php echo $follow->whoTofollow($user_id,$user_id) ;?>
                    </div>

                    <!-- <div class="col-md-12 mb-3"> -->
                        <!-- hastTag Me Box -->
                           <!-- < ?php echo $trending->trends(); ?> -->
                    <!-- </div> -->
                    <!-- /.col -->
                   <!-- <div class="col-md-12 mb-3" style="top: 1px;">
                       < ?php echo $home->options(); ?>
                   </div> -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                 <div class="sticky-top " style="top: 52px;">
                        <div class="mb-2">
                           <?php echo $trending->trends(); ?>
                        </div>
                       <?php echo $home->options(); ?>
                </div>
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "header_navbar_footer/footer.php"?>