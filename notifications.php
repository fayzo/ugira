<?php include "header_navbar_footer/header_if_login.php"?>
<title>Notifications</title>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>


<div class="container mt-3 mb-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Notification</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo HOME ;?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo HOME ;?>"> User Profile</a></i></li>
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
                  <!-- jobs -->
                <?php echo $home->jobsfetch() ;?>
                <!-- jobs -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header borders-tops text-center p-2">
                        <h3><i> Notification</i></h3>
                    </div><!-- /.card-header -->
                    <div class="card-body mb-2">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                    
                            <li class="time-label">
                                <span class="bg-danger text-light">
                                    10 Feb. 2014
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                        <?php 
                              $notif= $notification->notifications($user_id);
                              // var_dump($notif);
                              foreach ($notif as $data): 
                                      if ($data['type'] == 'message'):
                        ?>
                            <li>
                                <i class="fa fa-envelope bg-primary text-light"></i>

                                <div class="timeline-item card">
                                  <div class="card-body">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                        email</h3>

                                    <div class="timeline-body">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                        quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                  </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                         <?php  endif; 
      
                           if ($data['type'] == 'follow'):
                          ?>
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-user bg-info text-light"></i>

                                <div class="timeline-item card">
                                  <div class="card-body">
                                     <span class="time float-right mt-3"><i class=" fa fa-clock-o"></i> <?php echo $users->timeAgo($data['follow_on']) ;?></span>
                                    <div class="user-block">
                                        <div class="user-blockImgBorder">
                                            <div class="user-blockImg">
                                                 <?php if (!empty($data['profile_img'])) {?>
                                                  <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                  <?php  }else{ ?>
                                                    <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                  <?php } ?>
                                            </div>
                                        </div> 
                                       <span class="username">
                                            <a
                                                href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                        </span>
                                        <span class="description"> <h3 >Followed you on <!-- accepted your friend request --> </h3></span>
                                    </div><!-- /.user-block -->
                                   
                                  </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                         <?php  endif; 
      
                           if ($data['type'] == 'likes'):
                                $likes= $home->likes($user_id,$data['tweet_id']);
                                $retweet= $home->checkRetweet($data['tweet_id'],$user_id);
                                $user= $home->userData($retweet['retweet_by']);
                                // $comment= $comment->comments($data['tweet_id']);
                          ?>
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-heart bg-danger text-light"></i>

                                <div class="timeline-item card">
                                    <div class="card-header ">
                                        <span class="time float-right mt-3"><i class=" fa fa-clock-o"></i> <?php echo $users->timeAgo($data['posted_on']) ;?></span>
                                        <div class="user-block">
                                            <div class="user-blockImgBorder">
                                                <div class="user-blockImg">
                                                     <?php if (!empty($data['profile_img'])) {?>
                                                      <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                      <?php  }else{ ?>
                                                        <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                      <?php } ?>
                                                </div>
                                            </div> 
                                           <span class="username">
                                                <a
                                                    href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                <!-- //Jonathan Burke Jr. -->
                                            </span>
                                            <span class="description"> <h3>Likes your Post <!-- accepted your friend request --> </h3></span>
                                        </div><!-- /.user-block -->
                                  </div><!-- /.card-header -->
                                  <div class="card-body">
                                    <?php 
                                    $expodefile = explode("=",$data['tweet_image']);
                                    $fileActualExt= array();
                                    for ($i=0; $i < count($expodefile); ++$i) { 
                                        $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                    }
                                    $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                    if (array_diff($fileActualExt,$allower_ext) == false) {
                                    // if (!empty($data['tweet_image'])) {
                                        $expode = explode("=",$data['tweet_image']);
                                        $count = count($expode); ?>

                                     <?php if ($count === 1) { ?>

                                     <div class="row mb-1">
                                            <?php $expode = explode("=",$data['tweet_image']); ?>
                                        <div class="col-sm-12 more">
                                            <img class="img-fluid imagePopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $data["tweet_id"] ;?>">
                                        </div>
                                     </div>


                                    <?php
                                     }else if($count === 2){?>
                                        <div class="row mb-2 more">
                                                <?php $expode = explode("=",$data['tweet_image']);
                                                  $splice= array_splice($expode,0,2);
                                                  for ($i=0; $i < count($splice); ++$i) { 
                                                  ?>
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-2 imagePopup"
                                                    src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                    alt="Photo"  data-tweet="<?php echo $data["tweet_id"] ;?>">
                                            </div>
                                                <?php }?>
                                        </div>

                                    <?php }else if($count == 3 || $count > 3){?>
                                     <div class="row mb-2 more">
                                            <?php $expode = explode("=",$data['tweet_image']);
                                              $splice= array_splice($expode,0,1);
                                              ?>
                                        <div class="col-sm-6">
                                            <img class="img-fluid mb-2 imagePopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $data["tweet_id"] ;?>">
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-sm-6">
                                            <div class="row mb-2 more">
                                                    <?php 
                                                    $expode = explode("=",$data['tweet_image']);
                                                    // var_dump($expode);
                                                    $splice= array_splice($expode,1,2);
                                                    // var_dump($splice);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imagePopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $data["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                            <div class="row more">
                                                    <?php 
                                                    $expode = explode("=",$data['tweet_image']);
                                                    $splice= array_splice($expode,3,2);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imagePopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $data["tweet_id"] ;?>">
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
                                           <span class="btn btn-primary btn-sm float-right imageViewPopup more"  data-tweet="<?php echo $data["tweet_id"] ;?>" >View More photo <i class="fa fa-picture-o"></i>  >>></span>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                <?php }
                                     
                                    }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                    <div class="row mb-2" >
                                    <div class="col-12" >
                                    <video controls preload="metadata" preload="none" width="390" height="270px">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$data['tweet_image'] ;?>" type="video/mp4"> 
                                        <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                            <!-- fallback content here -->
                                    </video>
                                    </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                 <div class="row mb-2">
                                    <div class="col-12">
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$data['tweet_image'] ;?>" width="auto" height="auto">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$data['tweet_image'] ;?>" type="video/webm"> 
                                            <!-- fallback content herehere -->
                                    </video>
                                     </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$data['tweet_image'] ;?>" type="audio/mp3">
                                             <!-- fallback content here -->
                                     </audio>
                                      </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$data['tweet_image'] ;?>" type="audio/ogg"> 
                                             <!-- fallback content here -->
                                     </audio>
                              <?php }?>

                                  <p id="link_">
                                     <?php echo $home->getTweetLink($data['status']) ;?>
                                   </p>

                              <ul class="mt-2 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                        <?php if($data['tweet_id'] == $retweet['retweet_id']){ ?>
                                         <li class=" list-inline-item"><button class="share-btn retweeted text-sm mr-2" data-tweet="<?php echo $data['tweet_id']; ?>"  data-user="<?php echo $data['tweetBy']; ?>">
                                         <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet["retweet_counts"];?></span></i>
                                            Share</button></li>
                                        <?php }else{ ?>

                                               <li  class=" list-inline-item"> <button class="share-btn retweet text-sm mr-2" data-tweet="<?php echo $data['tweet_id']; ?>"  data-user="<?php echo $data['tweetBy']; ?>">
                                                <?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?>
                                                   Share</button></li>

                                         <?php } ?>
                                            <?php if($likes['like_on'] == $data['tweet_id']){ ?>
                                                <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $data['tweet_id']; ?>"  data-user="<?php echo $data['tweet_by']; ?>">
                                                <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $data['likes_counts'] ;?></span></i>
                                                    Like</button></li>

                                            <?php }else{ ?>
                                                  <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $data['tweet_id']; ?>"  data-user="<?php echo $data['tweet_by']; ?>">
                                                   <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($data['likes_counts'] > 0){ echo $data['likes_counts'];}else{ echo '';} ?></span></i>
                                                       Like</button></li>
                                            <?php } ?>
                                         <span style="float:right">
                                    
                                          <li  class=" list-inline-item"><button class="comments-btn text-sm" data-target="#a<?php echo  $data["tweet_id"];?>" data-toggle="collapse">
                                              <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                          </button></li>
                                        

                                         <?php if ($data["tweetBy"] == $user_id){ ?>
                                            <li  class=" list-inline-item">
                                                <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                    <li>
                                                       <a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                        <ul style="list-style-type: none; margin:0px;" >
											                <li style="list-style-type: none; margin:0px;"> 
                        					                    <label class="deleteTweet" data-tweet="<?php echo  $data["tweet_id"];?>"  data-user="<?php echo $data["tweetBy"];?>" >Delete </label>
                                                           </li>
                                                       </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                         <?php }else{ echo '';}?>
                                         </span>
                                </ul>

                                   <div class="card collapse hide" id="a<?php echo  $data["tweet_id"];?>">
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
                                                                <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($data['likes_counts'] > 0){ echo $data['likes_counts'];}else{ echo '';} ?></span></i>
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
                                              name="comment" data-tweet="<?php echo $data['tweet_id'];?>"
                                              placeholder="Reply to  <?php echo $data['username'] ;?>">
                                          <div class="input-group-append">
                                              <span class="input-group-text btn" style="padding: 0px 10px;" 
                                                  aria-label="Username" aria-describedby="basic-addon1">
                                                  <span class="fa fa-arrow-right text-muted" id="post_HomeComment"></span></span>
                                          </div>
                                      </div> <!-- input-group -->
                                   </div> <!-- /.card-body -->
                                  </div><!-- /.card -->
                            </li>
                            <!-- END timeline item -->
                         <?php  endif; 
      
                              if ($data['type'] == 'retweet'):

                                 $likes= $home->likes($user_id,$data['tweet_id']);
                                 $retweet= $home->checkRetweet($data['tweet_id'],$user_id);
                          ?>
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-retweet bg-success text-light"></i>

                                <div class="timeline-item card">
                                    <div class="card-header ">
                                        <span class="time float-right mt-3"><i class=" fa fa-clock-o"></i> <?php echo $users->timeAgo($data['posted_on']) ;?></span>
                                        <div class="user-block">
                                            <div class="user-blockImgBorder">
                                                <div class="user-blockImg">
                                                     <?php if (!empty($data['profile_img'])) {?>
                                                      <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                      <?php  }else{ ?>
                                                        <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                      <?php } ?>
                                                </div>
                                            </div> 
                                           <span class="username">
                                                <a href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                <!-- //Jonathan Burke Jr. -->
                                            </span>
                                            <span class="description"> <h3>Shares your Post <!-- accepted your friend request --> </h3></span>
                                        </div><!-- /.user-block -->
                             </div><!-- /.card-header -->

                             <div class="card-body">

                               <?php if(!empty($retweet['retweet_Msg']) && $data["tweet_id"] == $retweet["retweet_id"] || $data["retweet_id"] > 0){ ?> 

                                    <div class="card retweetcolor t-show-popup more" data-tweet="<?php echo $data["tweet_id"];?>">
                                      <div class="card-body ">
                                          <?php 
                                              $filename = $data['tweet_image'];
                                              $expodefile = explode("=",$data['tweet_image']);
                                              $fileActualExt= array();
                                              for ($i=0; $i < count($expodefile); ++$i) { 
                                                  $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                              }
                                              $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                              if (array_diff($fileActualExt,$allower_ext) == false) {
                                     			$expode = explode("=",$data['tweet_image']); 
                                                $count = count($expode); ?>
                                          <div class="row">
                                              <div class="col-6 ">

                                               <?php if ($count === 1) { ?>
                                                    <div class="row mb-1">
                                                           <?php $expode = explode("=",$data['tweet_image']); ?>
                                                       <div class="col-sm-12">
                                                           <img class="img-fluid"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                    </div>

                                               <?php }else if($count == 2 || $count > 2){ ?>
                                                     <div class="row mb-2">
                                                           <?php 
                                                             $expode = explode("=",$data['tweet_image']);
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
                                                                         <?php if (!empty($data['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly</span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12 mt-1" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($data['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$data["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
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
                                                                         <?php if (!empty($data['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly </span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($data['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            //  <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                            }else{
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$data["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
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
                                                                         <?php if (!empty($data['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly </span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($data['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$data["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
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
                                                                         <?php if (!empty($data['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly</span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $home->getTweetLink($data['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$data["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
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
                                                                         <?php if (!empty($data['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                   <span class="username">
                                                                       <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                                       <!-- //Jonathan Burke Jr. -->
                                                                       <span class="description">Shared publicly </span>
                                                                   </span>
                                                                   <span class="description"><?php echo $home->getTweetLink($data['status']); ?></span>
                                                               </div>

                                                        </div><!-- col -->
                                                    </div><!-- row -->

                                            <?php } ?>

                                      </div><!-- card-body -->
                                    </div><!-- card -->

                                <?php }?> 
                                   
                                </div>
                                </div>
                            </li>

                            <!-- END timeline item -->
                         <?php  endif; 
      
                              if ($data['type'] == 'mention'):
                                	$tweet= $data;
			                        $likes= $home->likes($user_id,$tweet['tweet_id']);
                                    $retweet= $home->checkRetweet($tweet['tweet_id'],$user_id);
                                    $user= $home->userData($retweet['retweet_by']);
                                    // $comment= $comment->comments($tweet['tweet_id']);
                          ?>
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-at bg-purple text-dark "></i>
                                <!-- <i class="fa fa-at bg-warning text-light">@</i> -->
                              <div class="timeline-item card">
                                <div class="card-header ">
                                        <span class="time float-right mt-3"><i class=" fa fa-clock-o"></i> <?php echo $users->timeAgo($data['posted_on']) ;?></span>
                                        <div class="user-block">
                                            <div class="user-blockImgBorder">
                                                <div class="user-blockImg">
                                                     <?php if (!empty($data['profile_img'])) {?>
                                                      <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $data['profile_img'] ;?>" alt="User Image">
                                                      <?php  }else{ ?>
                                                        <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                      <?php } ?>
                                                </div>
                                            </div> 
                                           <span class="username">
                                                <a
                                                    href="<?php echo PROFILE ;?>"><?php echo $data['firstname']." ".$data['lastname'] ;?></a>
                                                <!-- //Jonathan Burke Jr. -->
                                            </span>
                                            <span class="description"> <h3>Posted <!-- accepted your friend request --> </h3></span>
                                        </div><!-- /.user-block -->
                                  </div><!-- /.card-header -->
                                  <div class="card-body">
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
                                            <img class="img-fluid imagePopup"
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
                                                <img class="img-fluid mb-2 imagePopup"
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
                                            <img class="img-fluid mb-2 imagePopup"
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
                                                    <img class="img-fluid mb-2 imagePopup"
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
                                                    <img class="img-fluid mb-2 imagePopup"
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
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card-end -->
                            </li>
                            <!-- END timeline item -->
                        <?php  endif; 
      
                              if ($data['type'] == 'tweets_photo'):
                          ?>
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-success text-light">
                                    3 Jan. 2014
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-camera text-light" style="background-color:#6f42c1"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o text-light"></i> 2 days
                                        ago</span>

                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                    </h3>

                                    <div class="timeline-body">
                                        <img src="<?php echo BASE_URL_LINK ;?>image/img/user4-128x128.jpg" alt="..."
                                            class="margin">
                                        <img src="<?php echo BASE_URL_LINK ;?>image/img/user4-128x128.jpg" alt="..."
                                            class="margin">
                                        <img src="<?php echo BASE_URL_LINK ;?>image/img/user4-128x128.jpg" alt="..."
                                            class="margin">
                                        <img src="<?php echo BASE_URL_LINK ;?>image/img/user4-128x128.jpg" alt="..."
                                            class="margin">
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <?php    endif; 
                             endforeach; ?>
                            <li >
                                <i class="fa fa-clock-o bg-info text-light"></i>
                            </li>
                        </ul>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <!-- whoTofollow: user whoTofollow style 1 -->
                       <?php echo $follow->whoTofollow($user_id,$user_id) ;?>
                    </div>
                    <!-- /. col -->

                    <div class="col-md-12">
                        <!-- hastTag Me Box -->
                           <?php echo $trending->trends(); ?>
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
</div>

<?php include "header_navbar_footer/footer.php"?>