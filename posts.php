<?php include "header_navbar_footer/Get_usernameProfile.php"?>
<title>Posts</title>
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
              <?php  } ?>
                    <h3 class="widget-user-username"><?php echo $profileData['username'] ;?></h3> <!-- Elizabeth Pierce -->
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
                        <span class="description-text"><a href="<?php echo BASE_URL_PUBLIC.$profileData['username'].'.posts' ;?>"> POSTS</a></span></span>
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

<!-- container -->
<div class="container mb-5 mt-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Post</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                    <li class="breadcrumb-item active"><i> <?php echo $follow->followBtn($profileData['user_id'],$user_id,$profileData['user_id']) ;?></i></li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top " style="top: 52px;">
                    <!-- hastTag Me Box -->
                      <!-- jobs -->
                    <?php echo $home->jobsfetch() ;?>
                    <!-- jobs -->
                </div>
            </div>
            <!-- /.col -->

                    

            <div class="col-md-6 mb-4">
                 <!-- Box Comment -->
                 <div class="card borders-tops card-profile card1">
                     <div class="card-body">
                             <?php echo $home->getUserTweet($profileData['user_id']) ;?>
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <div class="col-md-3">
              <div class="sticky-top " style="top: 52px;">
                 <!-- whoTofollow: user whoTofollow style 1 -->
                         <?php $follow->whoTofollow($profileData['user_id'],$profileData['user_id'])?>
              </div>
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- container -->

<?php include "header_navbar_footer/footer.php"?>