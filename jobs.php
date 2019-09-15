<?php include "header_navbar_footer/header_if_login.php"?>
<title>Jobs</title>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

<!-- container-fuild -->
<div class="container mb-5 mt-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Jobs</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                      <?php if (isset($_SESSION['key'])){ ?>
                      <?php if ($user['user_id'] === $_SESSION['key']) { ?>
                    <li class="breadcrumb-item"><span id="messagePopup" class="more" data-user="<?php echo $user['user_id'];?>"><a href="javascript:void(0);" ><i style="font-size: 20px;" class="fa fa-envelope-o"></i> Message </a></span></li>
                    <?php } } ?>
                    <li class="breadcrumb-item active"><i><a href="<?php echo PROFILE ;?>"> User Profile</a></i></li>
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
                <div class="row">

                    <div class="col-md-12 mb-4"  id="jobs-hides">
                        <!-- jobs -->
                               <?php echo $home->jobsfetchALL('Featured',1) ;?>
                        <!-- /.card -->
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
                    <!-- /.col -->
                    <div class="col-md-12 mb-3">
                       <?php echo $home->options(); ?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "header_navbar_footer/footer.php"?>