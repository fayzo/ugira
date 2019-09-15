<?php
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Posts extends blog {
   

    public function tweets($user_id,$limit)
    {
        $mysqli= $this->database;
        // $sql="SELECT * FROM tweets T LEFT JOIN users U ON T. tweetBy= U. user_id LEFT JOIN blog B ON B. tweet_blog_by = U. user_id WHERE T. tweetBy = $user_id AND T. retweet_id='0' AND B. blog_post = 'posted' OR T. tweetBy= U. user_id AND T. retweet_by != $user_id AND B. blog_post= 'posted' AND T. tweetBy IN (SELECT receiver FROM follow WHERE sender= $user_id) ORDER BY T. tweet_id DESC LIMIT $limit ";
        $sql="SELECT * FROM tweets T LEFT JOIN users U ON T. tweetBy= U. user_id WHERE T. tweetBy = $user_id AND T. retweet_id='0' OR T. tweetBy= U. user_id AND T. retweet_by != $user_id AND T. tweetBy IN (SELECT receiver FROM follow WHERE sender= $user_id) ORDER BY T. tweet_id DESC LIMIT $limit ";
        $query= $mysqli->query($sql);
        $tweets=array();
        while ($row= $query->fetch_assoc()) {
            # code...
             $tweets[]= $row;
        }

                               foreach ($tweets as $tweet) {
                                $likes= $this->likes($user_id,$tweet['tweet_id']);
                                $retweet= $this->checkRetweet($tweet['tweet_id'],$user_id);
                                $user= $this->userData($retweet['retweet_by']);
                                $comment= $this->comments($tweet['tweet_id']);
                                // var_dump( $comments);

                                     # code... 
                                    //  echo var_dump($retweet['retweet_Msg']).'<br>';
                                ?>
                                <div class="card borders-tops mb-3">
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
                                        <div class="user-blockImg" >
                                              <?php if (!empty($user['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a style="float:left;padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                            <span class="description">Shared public - <?php echo $this->timeAgo($retweet['posted_on']); ?></span>
                                        </span>
                                        <span class="description"><?php echo $this->getTweetLink($retweet['retweet_Msg']); ?></span>
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
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
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
                                                        <video controls poster="assets/image/img/avatar3.png" preload="metadata" width="248px" height="110px">
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
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
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
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
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
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
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
                                                                       <a style="float:left;padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                       <!-- //Jonathan Burke Jr. -->
                                                                       <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                                   </span>
                                                                   <span class="description"><?php echo $this->getTweetLink($tweet['status']); ?></span>
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
                                        <span class="username tooltips">
                                           <ul><li >
                                            <a href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>" ><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                             <ul><li><?php echo Follow::tooltipProfile($tweet['user_id'],$tweet['user_id'],$tweet['user_id']); ?></li></ul>
                                            </li></ul>
                                        </span>
                                        <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
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
                                    <video controls preload="metadata" width="500px"  height="280px" preload="none">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/mp4"> 
                                        <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                            <!-- fallback content here 
                                            poster="< ?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>"
                                            object-fit="contain"
                                           object-fit= fill
                                           object-fit= none
                                           object-fit= cover
                                           preload=none 
                                           preload=metadata
                                            -->
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
                                     <?php echo $this->getTweetLink($tweet['status']) ;?>
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
                                            <li  class="list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                            <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $tweet['likes_counts'] ;?></span></i>
                                                Like</button></li>
                                        <?php }else{ ?>
                                                <li  class="list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
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
                                                       <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
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
                                        <?php if (!empty($comment)) { ?>
                                         <div class="direct-chat-message direct-chat-messageS">
                                          <h5><i>Comments</i></h5>
                                         <span class="commentsHome" id="commentsHome">
                                           <?php foreach ($comment as $comments) { ?>
                                                <!-- Conversations are loaded here -->
                                                  <!-- Message. Default to the left -->
                                                    <div class="direct-chat-msg">
                                                        <div class="direct-chat-info clearfix">
                                                            <span class="direct-chat-name float-left"><?php echo $comments["username"] ;?></span>
                                                            <span class="direct-chat-timestamp float-right"><?php echo $this->timeAgo($comments['comment_at']); ?></span>
                                                        </div>
                                                        <!-- /.direct-chat-info -->
                                                         <?php if (!empty($comments["profile_img"])) {?>
                                                          <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $comments["profile_img"] ;?>" alt="message user image">
                                                         <?php  }else{ ?>
                                                          <img class="direct-chat-img" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="message user image">
                                                         <?php } ?>
                                                        <!-- /.direct-chat-img -->
                                                        <div class="direct-chat-text">
                                                         <?php echo  $this->getTweetLink($comments["comment"]) ;?>
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
                                                                          <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
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
                                      </div> <!-- /.direct-message -->
                                          <?php } ?>
                                      </div> <!-- /.card-body-->
                                    </div> <!-- /.card collapse -->

                                      <div class="input-group">
                                          <input class="form-control form-control-sm" id="commentHome" type="text" data-tweet="<?php echo $tweet['tweet_id'];?>"
                                              name="comment"  placeholder="Reply to  <?php echo $tweet['username'] ;?>" onkeypress="myFunction()" onkeyup="keyupFunction()">
                                          <div class="input-group-append">
                                            <span class="input-group-text btn" style="padding: 0px 10px;" 
                                                  aria-label="Username" aria-describedby="basic-addon1" id="post_HomeComment" >
                                                  <span class="fa fa-arrow-right text-muted" ></span>
                                            </span>
                                          </div>
                                      </div> <!-- input-group -->
                                </div>
                                <!-- /.post -->
                             </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card-end -->
                                <?php }
                } 
} 
$posts= new Posts();
?>


              