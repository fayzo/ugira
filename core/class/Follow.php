<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Follow extends Home
{
    public function checkfollow($follow_id,$user_id)
    {
       $mysqli= $this->database;
       $query= "SELECT * FROM follow WHERE sender = $user_id AND receiver = $follow_id";
       $result=$mysqli->query($query);
       while ($follow= $result->fetch_array()) {
           # code...
           return $follow;
       }
    }

    static public function checkfollows($follow_id,$user_id)
    {
       $mysqli= self::$databases;
       $query= "SELECT * FROM follow WHERE sender = $user_id AND receiver = $follow_id";
       $result=$mysqli->query($query);
       while ($follow= $result->fetch_array()) {
           # code...
           return $follow;
       }
    }

      public function followBtn($profile_id,$user_id,$follow_id)
    {
       $data= $this->checkfollow($profile_id,$user_id);

       if ($this->loggedin() == true) {
           # code...
           if ($profile_id != $user_id) {
               # code...
               if ($data['receiver'] == $profile_id) {
                   # code...followin Btn
                   return '
                   <button type="button" class="btn btn-primary btn-sm following-btn follow-btn" data-follow="'.$profile_id.'" data-profile="'.$follow_id.'" >Following</button>
                   ';
               }else {
                   # code...follow btn
                    return '
                   <button type="button" class="btn btn-secondary btn-sm follow-btn" data-follow="'.$profile_id.'" data-profile="'.$follow_id.'" ><span  class="fa fa-user-plus"></span> Follow</button>
                   ';
               }
           }else {
               # code...
               return ' 
                <button type="button" class="btn btn-primary btn-sm" onclick=location.href="'.BASE_URL_PUBLIC.'profileEdit.php" >Edit Profile</i></button>
                ';
           }

       }else {
           # code...
          return ' 
           <button type="button" class="btn btn-primary btn-sm" onclick=location.href="'.LOGIN.'" ><i class="fa fa-user-plus"></i> Follow</button>
           ';
       }

    }

    static public function followBtns($profile_id,$user_id,$follow_id)
    {
       $data= self::checkfollows($profile_id,$user_id);

       if (self::loggedins() == true) {
           # code...
           if ($profile_id != $user_id) {
               # code...
               if ($data['receiver'] == $profile_id) {
                   # code...followin Btn
                   return '
                   <button type="button" class="btn btn-primary btn-sm following-btn follow-btn" data-follow="'.$profile_id.'" data-profile="'.$follow_id.'" >Following</button>
                   ';
               }else {
                   # code...follow btn
                    return '
                   <button type="button" class="btn btn-secondary btn-sm follow-btn" data-follow="'.$profile_id.'" data-profile="'.$follow_id.'" ><span  class="fa fa-user-plus"></span> Follow</button>
                   ';
               }
           }else {
               # code...
               return ' 
                <button type="button" class="btn btn-primary btn-sm" onclick=location.href="'.BASE_URL_PUBLIC.'profileEdit.php" >Edit Profile</i></button>
                ';
           }

       }else {
           # code...
          return ' 
           <button type="button" class="btn btn-primary btn-sm" onclick=location.href="'.LOGIN.'" ><i class="fa fa-user-plus"></i> Follow</button>
           ';
       }

    }

     public function follows($follow_id,$user_id,$profile_id)
    {
       $mysqli= $this->database;
       $this->addFollowCounts($follow_id,$user_id);
       $this->creates("follow",array('sender' => $user_id ,'receiver' => $follow_id,'follow_on' => date('Y-m-d H:i:s')));
    //    $query="SELECT * FROM users WHERE user_id= $follow_id LEFT JOIN follow ON sender= $user_id AND CASE WHEN receiver= $user_id THEN sender= user_id END WHERE user_id=$profile_id ";
       $query="SELECT * FROM users WHERE user_id= $follow_id";
       $result= $mysqli->query($query);
       $row= $result->fetch_assoc();
       Notification::SendNotifications($follow_id,$user_id,$follow_id,'follow');
       echo json_encode($row);

    }

    public function unfollow($follow_id,$user_id,$profile_id)
    {
       $mysqli= $this->database;
       $this->removeFollowCounts($follow_id,$user_id);
       $this->delete("follow",array('sender' => $user_id ,'receiver' => $follow_id));
    //    $query="SELECT * FROM users WHERE user_id= $follow_id LEFT JOIN follow ON sender= $user_id AND CASE WHEN receiver= $user_id THEN sender= user_id END WHERE user_id=$profile_id ";
       $query="SELECT * FROM users WHERE user_id= $follow_id";
       $result= $mysqli->query($query);
       $row = $result->fetch_assoc();
       echo json_encode($row);
    }

    public function addFollowCounts($follow_id,$user_id)  
    {
        $mysqli= $this->database;
        $query="UPDATE users SET following = CASE user_id 
                                             WHEN $user_id THEN following +1 
                                             ELSE following 
                                           END, 
                                followers = CASE user_id 
                                            WHEN $follow_id THEN followers +1
                                            ELSE followers 
                                          END
                WHERE user_id IN ($user_id, $follow_id)";
                
       $mysqli->query($query);
    }

     public function removeFollowCounts($follow_id,$user_id)
    {
        $mysqli= $this->database;
        $query="UPDATE users SET following = CASE user_id 
                                             WHEN $user_id THEN following -1 
                                             ELSE following 
                                           END, 
                                followers = CASE user_id 
                                            WHEN $follow_id THEN followers -1
                                            ELSE followers 
                                          END
                WHERE user_id IN ($user_id, $follow_id)";
        $mysqli->query($query);
    }

    public function FollowingLists($profile_id,$user_id,$follow_id)
    {
       $mysqli= $this->database;
       $query= "SELECT * FROM users LEFT JOIN follow ON receiver= user_id AND CASE WHEN sender = $profile_id THEN receiver = user_id END WHERE sender IS NOT NULL";
       $result=$mysqli->query($query);
       while ($following=$result->fetch_array()) {
           # code...
           echo '
                <div class="col-md-4 mb-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-follow user-follow">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                         '.((!empty($following['cover_img']))?
                           '<div class="user-header-follow text-white" style="background: url('.BASE_URL_LINK."image/users_profile_cover/".$following['cover_img'].') center center;background-size: cover; overflow: hidden; width: 100%;">'
                          :'<div class="user-header-follow text-white" style="background: url('.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.') center center;background-size: cover; overflow: hidden; width: 100%;">' ).'
                        </div>
                        <div class="user-image-follow">
                          '.((!empty($following['profile_img']))?
                               ' <img class="rounded-circle elevation-2"
                                    src="'.BASE_URL_LINK."image/users_profile_cover/".$following['profile_img'].'">'
                              :' <img class="rounded-circle elevation-2" src="'.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.'" />' ).'
                             <span> '.$this->lengthsOfusers($following['date_registry']).'</span>
                        </div>
                        <div class="card-footer">
                            <h5 class="user-username-follow m-1 "><a href="'.BASE_URL_PUBLIC.$following['username'].'">'.$following['username'].'</a></h5>
                            <h5 class="user-username-follow m-1"><small>'.((!empty($following['career']))? $this->getTweetLink($following['career']):'no career').'</small></h5>
                            <span>'.$this->followBtn($following['user_id'],$user_id,$profile_id,$follow_id).'</span>
                        </div>
                        <!-- /.footer -->
                    </div>
                    <!-- /. card widget-user -->
                </div>
                <!-- col --> ';
       }

    }

       public function FollowersLists($profile_id,$user_id,$follow_id)
    {
       $mysqli= $this->database;
       $query= "SELECT * FROM users LEFT JOIN follow ON sender= user_id AND CASE WHEN receiver = $profile_id THEN sender = user_id END WHERE receiver IS NOT NULL";
       $result=$mysqli->query($query);
       while ($following=$result->fetch_array()) {
           # code...
           echo '
                <div class="col-md-4 mb-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-follow user-follow">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                         '.((!empty($following['cover_img']))?
                           '<div class="user-header-follow text-white" style="background: url('.BASE_URL_LINK."image/users_profile_cover/".$following['cover_img'].') center center;background-size: cover; overflow: hidden; width: 100%;">'
                          :'<div class="user-header-follow text-white" style="background: url('.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.') center center;background-size: cover; overflow: hidden; width: 100%;">').'
                        </div>
                        <div class="user-image-follow">
                          '.((!empty($following['profile_img']))?
                               ' <img class="rounded-circle elevation-2"
                                    src="'.BASE_URL_LINK."image/users_profile_cover/".$following['profile_img'].'">'
                              :' <img class="rounded-circle elevation-2" src="'.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.'"  /> ').'
                               <span>'.$this->lengthsOfusers($following['date_registry']).'</span>
                        </div>
                        <div class="card-footer">
                            <h5 class="user-username-follow m-1"><a href="'.BASE_URL_PUBLIC.$following['username'].'">'.$following['username'].'</a></h5>
                            <h5 class="user-username-follow m-1"><small>'.((!empty($following['career']))? $this->getTweetLink($following['career']):'no career').'</small></h5>
                            <span>'.$this->followBtn($following['user_id'],$user_id,$profile_id,$follow_id).'</span>
                        </div>
                        <!-- /.footer -->
                    </div>
                    <!-- /. card widget-user -->
                </div>
                <!-- col --> ';
       }

    }

    public function FollowingListsProfile($profile_id,$user_id,$follow_id)
    {
       $mysqli= $this->database;
       $query= "SELECT * FROM users LEFT JOIN follow ON receiver= user_id AND CASE WHEN sender = $profile_id THEN receiver = user_id END WHERE sender IS NOT NULL ORDER BY rand() LIMIT 8 ";
       $result=$mysqli->query($query); 
       $followings= $this->userData($profile_id);
       ?>
        <div class="card card2">
            <div class="card-header text-center main-active">
               <h5><span class="badge badge-danger"><?php echo $followings['following'] ;?></span> Following</h5>
               <!-- <div class="card-tools">
                <span><span class="badge badge-danger">< ?php echo $row['following'] ;?></span>Following</span>
                 <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                 </button>
                 <button type="button" class="btn btn-tool" onclick='remove2();'><i class="fa fa-times"></i>
                 </button>
               </div> -->
             </div>
             <!-- /.card-header -->
             <div class="card-body p-0">
               <ul class="users-list clearfix">

      <?php while ($following=$result->fetch_array()) { 
           # code...
           echo '
                <li>
                     '.((!empty($following['profile_img']))?
                     ' <img class="rounded-circle"
                          src="'.BASE_URL_LINK."image/users_profile_cover/".$following['profile_img'].'">'
                    :' <img class="rounded-circle" src="'.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.'" />' ).'
                     <a class="users-list-name" href="'.BASE_URL_PUBLIC.$following['username'].'">'.$following['lastname'].'</a>
                     <!-- <span class="users-list-date">Today</span> -->
                </li> ';
         } ?>
                 </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="<?php echo  BASE_URL_PUBLIC.$followings['username'].'.following' ;?>">View All Following</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!--/.card -->

   <?php }

    public function whoTofollow($user_id,$follow_id)
    {
       $mysqli= $this->database;
       $query= "SELECT * FROM users WHERE user_id != $user_id AND user_id NOT IN (SELECT receiver FROM follow WHERE sender = $user_id ) ORDER BY rand() LIMIT 4";
       $result=$mysqli->query($query);

             echo ' <div class="card">
                     <div class="card-header main-active text-center">
                           <i> WHO TO FOLLOW </i>
                     </div>
                     <div class="card-body">';
                     while ($whoTofollow=$result->fetch_array()) {
            echo '        <div class="row">
                              <div class="col-md-3 mb-3">
                                    <div class="whoTofollow-list-img">
                                    '.((!empty($whoTofollow['profile_img'])?'
                                       <img src="'.BASE_URL_LINK."image/users_profile_cover/".$whoTofollow['profile_img'].'">
                                        ':'
                                       <img src="'.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.'">
                                    ')).'

                                    '.$this->lengthsOfWhoNewCome($whoTofollow['date_registry']).'
                                    </div>
                              </div>
                              <div class="col-md-9">
                           
                                  <div class="my-0 ml-2 tooltipss">
                                           <ul><li> 
                                          <a href="'.BASE_URL_PUBLIC.$whoTofollow['username'].'" id="'.$whoTofollow["user_id"].'" >'.$whoTofollow['firstname']." ".$whoTofollow['lastname'].'</a>
                                  <ul><li>
                                    <div  class="row" style="width:270px;text-align:left !important;">
                                    <div class="col-md-12">
                        
                                        <!-- Profile Image -->
                                        <div class="info-box">
                                            <div class="info-inner">
                                                <div class="info-in-head">
                                                   <!-- PROFILE-COVER-IMAGE -->
                                                     '.((!empty($whoTofollow['cover_img']))?'
                                                      <img src="'.BASE_URL_LINK.'image/users_profile_cover/'.$whoTofollow['cover_img'].'" alt="User Image">'
                                                     : '<img src="'.BASE_URL_LINK.NO_COVER_IMAGE_URL.'"  alt="User Image">'
                                                     ).'
                                                </div>
                                                <!-- info in head end -->
                                                <div class="info-in-body">
                                                    <div class="in-b-box">
                                                        <div class="in-b-img">
                                                            <!-- PROFILE-IMAGE -->
                                                             '.((!empty($whoTofollow['profile_img']))?'
                                                              <img src="'.BASE_URL_LINK.'image/users_profile_cover/'.$whoTofollow['profile_img'].'" alt="User Image">'
                                                             : '<img src="'.BASE_URL_LINK.NO_PROFILE_IMAGE_URL.'"  alt="User Image">'
                                                             ).'
                                                        </div>
                                                    </div><!--  in b box end-->
                                                    <div class="info-body-name">
                                                        <div class="in-b-name">
                                                            <div><a style="font-size: 13px !important;" href="'.BASE_URL_PUBLIC.$whoTofollow['username'].'">'.$whoTofollow['firstname']." ".$whoTofollow['lastname'].'</a><span>'.self::followBtns($whoTofollow['user_id'],$user_id,$follow_id).'<small><a href="'.BASE_URL_PUBLIC.$whoTofollow['username'].'">'.((!empty($whoTofollow['career']))?$whoTofollow['career']:'').'</a></small></span></div>
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
                                                               '.self::countsPostss($whoTofollow['user_id']).'
                                                            </div>
                                                        </div>
                                                        <div class="num-box">
                                                            <div class="num-head">
                                                                FOLLOWING
                                                            </div>
                                                            <div class="num-body">
                                                                <span class="count-following">'.$whoTofollow['following'].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="num-box">
                                                            <div class="num-head">
                                                                FOLLOWERS
                                                            </div>
                                                            <div class="num-body">
                                                                <span class="count-followers">'.$whoTofollow['followers'].'</span>
                                                            </div>
                                                        </div>
                                                    </div><!-- mumber wrapper-->
                                                </div><!-- info in footer -->
                        
                                         </div><!-- info inner end -->
                                        </div><!-- info box -->
                        
                                    </div><!-- col -->
                                   </div><!-- row --> </div><!-- row -->
                                   </li></ul> 
                                   </li></ul>
                                 
                                  '.((!empty($whoTofollow['career'])?'
                                  <div class="my-0 ml-2"><small style="font-size: 12px;">'.$whoTofollow['career'].'</small></div>
                                  ':'
                                  <div class="my-0 ml-2"><small style="font-size: 12px;">no career</small></div>
                                  ')).'
                                  <div class="my-0 ml-2">'.$this->followBtn($whoTofollow['user_id'],$user_id,$follow_id).'</div>
                              </div>
                          </div> ';
                      }
                      
            echo '  </div>
                 </div>';
    }

    static public function tooltipProfile($whoTofollow,$user_id,$follow_id)
    {
        $mysqli= self::$databases;
        $sql="SELECT * FROM users WHERE user_id = '{$user_id}' ";
        $query= $mysqli->query($sql);
        $user= $query->fetch_assoc(); ?>

         <div  class="row" style="width:362px;">
            <div class="col-md-12">

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
                                    <div><a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a><span><?php echo self::followBtns($whoTofollow,$user_id,$follow_id); ?></span></div>
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
                                       <?php echo self::countsPostss($user['user_id']);?>
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

$follow = new follow();
?>