<?php include "header_navbar_footer/Get_usernameProfile.php"?>
<title><?php echo $profileData['username'].' you Following'; ?></title>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

<div class="container-fuild">
    <div class="row">
        <div class="col-12">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
            <?php if (!empty($profileData['cover_img'])) { ?>
                    <div class="widget-user-header text-white"
                        style="background: url('<?php echo BASE_URL_LINK."image/users_profile_cover/".$profileData['cover_img'] ;?>')no-repeat center center;background-size:cover;">
                <?php }else{ ?>
                    <div class="widget-user-header text-white"
                        style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>')no-repeat center center;background-size:cover;">
              <?php  } ?>                    <h3 class="widget-user-username"><?php echo $profileData['username'] ;?></h3>
                    <h5 class="widget-user-desc">Web Designer</h5>
                </div>
                <div class="widget-user-image">
                    <?php if (!empty($profileData['profile_img'])) {?>
                    <img class="rounded-circle" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $profileData['profile_img'];?>"
                        alt="User Avatar">
                    <?php  }else{ ?>
                    <img class="rounded-circle" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Avatar">
                    <?php } ?>           
                </div>
                <div class="widget-user-image-under">
                </div>
                <div class="card-footer">
                      <div class="description">
                        <h5 class="description-header count-followers"><?php echo $profileData['followers']; ?></h5>
                        <span class="description-text"><a href="<?php echo BASE_URL_PUBLIC.$profileData['username'].'.followers' ;?>">FOLLOWERS</a></span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description ">
                        <h5 class="description-header count-following"><?php echo $profileData['following']; ?></h5>
                        <span class="description-text"><a href="<?php echo BASE_URL_PUBLIC.$profileData['username'].'.following' ;?>"> FOLLOWING</a></span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description">
                        <h5 class="description-header"> <?php echo $home->countsPosts($profileData['user_id']);?></h5>
                        <span class="description-text"><a href="<?php echo BASE_URL_PUBLIC.$profileData['username'].'.posts' ;?>"> POSTS</a></span>
                    </div>
                    <!-- /.description-block -->
                    <!-- /.description-block -->
                    <div class="description">
                        <h5 class="description-header"> <?php echo $home->countsLike($profileData['user_id']);?></h5>
                        <span class="description-text">LIKES</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">VIEWS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.footer -->
            </div>
            <!-- /. card widget-user -->
        </div>
        <!-- column -->
    </div>
    <!-- row -->
</div>
<!-- container-fuild -->
<div class="container mt-2">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Following</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                      <?php if (isset($_SESSION['key'])){ ?>
                      <?php if ($profileData['user_id'] != $_SESSION['key']) { ?>
                    <li class="breadcrumb-item"><span class="people-message more" data-user="<?php echo $profileData['user_id'];?>"><a href="javascript:void(0);" ><i style="font-size: 20px;" class="fa fa-envelope-o"></i> Message </a></span></li>
                    <?php } } ?>
                    <li class="breadcrumb-item active"><i><?php echo $follow->followBtn($profileData['user_id'],$user_id,$profileData['user_id']) ;?></i></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-3 mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Profile Image -->
                        <div class="info-box mb-3">
                            <div class="info-inner">
                                <div class="info-in-head">
                                    <!-- PROFILE-COVER-IMAGE -->
                                     <?php if (!empty($profileData['cover_img'])) {?>
                                      <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $profileData['cover_img'] ;?>" alt="User Image">
                                      <?php  }else{ ?>
                                        <img src="<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>"  alt="User Image">
                                      <?php } ?>
                                </div>
                                <!-- info in head end -->
                                <div class="info-in-body">
                                    <div class="in-b-box">
                                        <div class="in-b-img">
                                            <!-- PROFILE-IMAGE -->
                                             <?php if (!empty($profileData['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $profileData['profile_img'] ;?>"  alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                    </div><!--  in b box end-->
                                    <div class="info-body-name">
                                        <div class="in-b-name">
                                            <div><a href="<?php echo PROFILE ;?>"><?php echo $profileData['firstname']." ".$profileData['lastname'] ;?></a></div> <!-- Nina Mcintire -->
                                            <span><small><a href="<?php echo PROFILE ;?>"><?php echo $profileData['career'] ;?></a></small></span>
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
                                                <span class="count-following"><?php echo $profileData['following'] ;?></span>
                                            </div>
                                        </div>
                                        <div class="num-box">
                                            <div class="num-head">
                                                FOLLOWERS
                                            </div>
                                            <div class="num-body">
                                                <span class="count-followers"><?php echo $profileData['followers'] ;?></span>
                                            </div>
                                        </div>
                                    </div><!-- mumber wrapper-->
                                </div><!-- info in footer -->
                            </div><!-- info inner end -->
                        </div><!-- info box -->
                    </div><!-- col  -->

                    <div class="col-md-12 mb-3">
                        <!-- About Me Box -->
                        <div class="card card-primary mb-3">
                            <div class="card-header main-active p-1">
                                <h5 class="card-title text-center"><i> About Me</i></h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fa fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    <?php echo $profileData['education']; ?>
                                </p>

                                <strong><i class="fa fa-book mr-1"></i> Diploma</strong>

                                <p class="text-muted">
                                    <?php echo $profileData['diploma']; ?>
                                </p>

                                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                                <p class="text-muted"> <?php echo $profileData['location']; ?></p>

                                <strong><i class="fa fa-pencil mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="badge badge-danger"> <?php echo $profileData['skills']; ?></span>
                                    <span class="badge badge-success">Coding</span>
                                    <span class="badge badge-info">Javascript</span>
                                    <span class="badge badge-warning">PHP</span>
                                    <span class="badge badge-primary">Node.js</span>
                                </p>

                                <strong><i class="fa fa-file-text-o mr-1"></i> Hobbys</strong>

                                <p class="text-muted"> <?php echo $profileData['hobbys']; ?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div><!-- col  -->

                    <div class="col-md-12">
                         <?php echo $trending->trends(); ?>
                    </div> <!-- /.col -->

                </div><!-- row  -->
            </div>
            <!-- /.col -->


            <div class="col-md-6">
                <div class="row">
                    <?php  $follow->FollowingLists($profileData['user_id'],$user_id,$profileData['user_id'])?>

                    <div class="col-md-4 mb-3">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-follow user-follow">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="user-header-follow text-white" style="background: url('<?php echo BASE_URL_LINK ;?>image/img/photo1.png') center center;background-size: cover; overflow: hidden; width: 100%;">
                            </div>
                            <div class="user-image-follow">
                                <img class="rounded-circle elevation-2"
                                    src="<?php echo BASE_URL_LINK ;?>image/img/user1-128x128.jpg" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <h5 class="user-username-follow"><a href="<?php echo PROFILE ;?>"> Alexander Pierce</a></h5>
                                <h5 class="user-username-follow"><small> Founder & CEO</small></h5>
                                <button href="#" type="button" class="btn btn-defautlt btn-md main-active ">Following</button>
                            </div>
                            <!-- /.footer -->
                        </div>
                        <!-- /. card widget-user -->
                    </div>
                    <!-- col -->

                </div>
                <!-- row -->
            </div>
            <!-- /.col -->

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <!-- whoTofollow: user whoTofollow style 1 -->
                        <?php $follow->whoTofollow($profileData['user_id'],$profileData['user_id'])?>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-12">
                        <!-- hastTag Me Box -->
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
</div>

<?php include "header_navbar_footer/footer.php"?>