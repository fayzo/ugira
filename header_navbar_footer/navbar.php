<div class="fixed-top">
<nav class="navbar navbar-expand">
<div class="row">
    <div class="col-lg-6">
    
  <!-- <a class="navbar-brand" href="#">Menya</a> -->
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
      
  <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <ul class="navbar-nav notif">
      <?php if (isset($_SESSION['key'])){?>
     <li class="nav-item">
        <button type="button" class="btn btn-outline-primary"><a class="nav-link more p-0" href="#">Menya</a></button>
     </li>
     <li class="nav-item">
        <button type="button" class="btn btn-outline-primary ml-2"><a class="nav-link more p-0" href="<?php echo HOME ;?>"><i style="font-size: 22px;" class="fa fa-home nav-link p-0"></i> <?php echo $lang['home'];?> <span class="sr-only">(current)</span></a></button>
     </li>
      <li class="nav-item">
        <button type="button" class="btn btn-outline-primary addPostBtn ml-2"><a class="nav-link more p-0" href="#"><i style="font-size: 22px;" class="fa fa-pencil nav-link p-0 m-0"></i> Post</a></button>
      </li>
      <li class="nav-item">
         <button type="button" id='messagePopup' class="btn btn-outline-primary ml-2"><a class="nav-link more p-0" href="#"><i style="font-size: 22px;"  class="fa fa-envelope nav-link p-0 m-0"  aria-hidden="true"></i> Messages<span id="messages"><?php if( $notific['totalmessage'] > 0){echo '<span class="span-i">'.$notific['totalmessage'].'</span>'; } ?></span></a></button>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-outline-primary ml-2"><a class="nav-link p-0 m-0" href="<?php echo BASE_URL_PUBLIC ;?>i.notifications" ><i style="font-size: 22px;" class="fa fa-bell nav-link p-0 m-0"></i> Notification <span id="notification"><?php if( $notific['totalnotification'] > 0){echo '<span class="span-i">'.$notific['totalnotification'].'</span>'; } ?></span></a></button>
      </li>
      <li class="nav-item">
        <button type="button" class="btn btn-outline-primary ml-2"><a class="nav-link p-0 m-0" href="<?php echo JOBS;?>"><i style="font-size: 22px;" class="fa fa-star nav-link p-0 m-0"></i> Jobs </a></button>
      </li>
      <?php if($_SESSION['approval'] === 'on'){ ?>
        <li class="nav-item">
           <button type="button" class="btn btn-outline-primary ml-2"><a class="nav-link more p-0 m-0" href="<?php echo INDEXX ;?>"><i style="font-size: 22px;" class="fa fa-cog nav-link p-0"></i> Dashboard <span class="sr-only">(current)</span></a></button>
        </li>
      <?php  } ?>
      <?php if(isset($_SESSION["cart_item"])){ ?>
        <li class="nav-item">
           <button type="button" class="btn btn-outline-primary ml-2"><a class="nav-link more p-0 m-0" href="<?php echo SHOPPING ;?>"><i style="font-size: 22px;" class="fa fa-shopping-cart nav-link p-0"></i> shopping <span class="sr-only">(current)</span></a></button>
        </li>
      <?php  } ?>
      <?php if(isset($_SESSION['key']) && $_SESSION['key'] === $jobs['business_id'] ||  $_SESSION['key'] === $fundraisingV['user_id2'] || $_SESSION['key'] === $eventV['user_id3'] || $_SESSION['key'] === $blogV['user_id3'] || $_SESSION['key'] === $saleV['user_id01']){ ?>
        <li class="nav-item">
           <button type="button" class="btn btn-outline-primary ml-2"><a class="nav-link more p-0 m-0" href="<?php echo ACTIVITIES ;?>"><i style="font-size: 22px;" class="fa fa-telegram nav-link p-0"></i> activities <span class="sr-only">(current)</span></a></button>
        </li>
      <?php  } ?>
      <?php }else{ ?>
        <li class="nav-item">
           <button type="button" class="btn btn-outline-primary"><a class="nav-link more p-0" href="<?php echo LOGIN ;?>"><i style="font-size: 22px;" class="fa fa-home nav-link p-0"></i> <?php echo $lang['home'];?> <span class="sr-only">(current)</span></a></button>
        </li>
      <?php  } ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $lang['pages'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $lang['posts'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $lang['about'];?></a>
      </li> -->
      
    </ul>
  </div>
  <div class="col-lg-6">
    
    <?php if (isset($_SESSION['key'])){?>
      
      <div class="navbar-custom-menu">
        <ul class="navbar-nav float-right">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu nav-item ">
            <a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown" id="messages-dropdown-menu">
              <i style="font-size: 20px;" class="fa fa-envelope-o"></i>
              <span id="messages1"><?php if( $notific['totalmessage'] > 0){echo '<span  class="badge badge-danger navbar-badge">'.$notific['totalmessage'].'</span>'; } ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header main-active">You have <span><?php if( $notific['totalmessage'] > 0){echo '<span>'.$notific['totalmessage'].'</span>'; }else{ echo 'no' ;} ?></span> messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu large-2" id="messages-menu-view" >
                  <!-- <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="< ?php echo BASE_URL_LINK ;?>image/img/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="footer" id='messagePopup'><a href="#">See All Messages</a></li>
            </ul>
          </li>

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" id="notification-dropdown-menu">
              <i style="font-size: 20px;" class="fa fa-bell-o"></i>
             <span id="notification1"><?php if( $notific['totalnotification'] > 0){echo '<span class="badge badge-warning navbar-badge">'.$notific['totalnotification'].'</span>'; } ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header main-active">You have  <span ><?php if( $notific['totalnotification'] > 0){echo '<span >'.$notific['totalnotification'].'</span>'; }else{ echo 'no';} ?></span> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu large-2" id="notification-menu-view">
                  <!-- <li>
                    <a href="#">
                      <i class="fa fa-users text-info"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-warning"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-danger"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-success"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-danger"></i> You changed your username
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="footer"><a href="<?php echo BASE_URL_PUBLIC ;?>i.notifications" >View all</a></li>
            </ul>
          </li>

           <li>
              <form class="form-inline searchingResult">
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control search" name="search" id="search" aria-describedby="helpId"
                        placeholder="Search">
                      </div>
                      <div class="search-result">			
                      </div>
              </form>
           </li>

           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
               <?php if (!empty($user['profile_img'])) { ?>
              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" class="user-image rounded-circle" alt="User Image">
              <?php  }else{ ?>
                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" class="user-image rounded-circle" alt="User Image">
              <?php } ?>
              <span class="hidden-xs"><span id="welcome-json"></span> <?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <?php if (!empty($user['cover_img'])) { ?>
              <li class="user-header" style="background: url('<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['cover_img'] ;?>') center center;background-size: cover; overflow: hidden; width: 100%;">
                <?php }else{ ?>
              <li class="user-header" style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>') center center;background-size: cover; overflow: hidden; width: 100%;">
              <?php  } ?>

              <?php if (!empty($user['profile_img'])) { ?>
                <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" class="rounded-circle" alt="User Image">
                <?php }else{ ?>
                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" class="rounded-circle" alt="User Image">
              <?php  } ?>
               
                <p>
                  <?php echo $_SESSION['username'];?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <a href="<?php echo SETTINGS;?>">Settings</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="<?php echo PROFILE_EDIT;?>">Profile Edit</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="<?php echo JOBS;?>">Jobs</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer main-active">
                <div class="pull-left">
                  <a href="<?php echo BASE_URL_PUBLIC.$user['username'];?>" class="btn btn-info btn-sm">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo LOGOUT;?>" class="btn btn-danger btn-sm ">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#"  id="siderbarResponsive" onclick="openNav()" class="nav-link"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
<?php }else{?>
 <div class="navbar-nav float-right">
      <div class="nav-item">
         <a href="#" id="siderbarResponsive" onclick="openNav()" class="nav-link float-right pt-3"><i class="fa fa-gears"></i></a>
        <a class="nav-link float-right" id="login-please" data-login="1" href="javascript:void()">
        <span style="text-transform:capitalize" id="welcome-json"></span>, Do you Have an account ? 
        <i style="font-size: 22px;" class="fa fa-expeditedssl"></i> Login <span class="sr-only">(current)</span>
        </a>
      </div>
  </div>
<?php }?>
  <!-- </div> -->

    </div>
  </div>
  <!--  progress-xs -->
</nav>
<span class="progress progress-navbar m-0" style="height: 6px;">
    <span class="progress-bar bg-info" role="progressbar"
        style="width:0%;" id="progress_width" aria-valuenow="" aria-valuemin="0"
        aria-valuemax="100"></span>
</span>
</div>
    <span id="clock" class="main-active" style ="position: fixed;z-index:1030;right:3px;top:-5.5px;" ></span>
  

