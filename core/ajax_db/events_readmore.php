<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['events_id']) && !empty($_POST['events_id'])) {
    if (isset($_SESSION['key'])) {
        # code...
        $user_id= $_SESSION['key'];
    }else {
        # code...
        $username= $users->test_input($_REQUEST['username']);
        $uprofileId= $home->usersNameId($username);
        $profileData= $home->userData($uprofileId['user_id']);
        $user_id= $profileData['user_id'];
    }
    $events_id = $_POST['events_id'];
    $user= $events->EventsReadmore($events_id);
    $comment= $events->comments($events_id);
     ?>
<style>
.img-popup-bodys {
    border-radius: 4px;
    overflow: hidden;
}
</style>

<div class="events-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-bodys">

            <div class="card">
                <div class="card-header">
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
                             <a
                                 href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a>
                             <!-- //Jonathan Burke Jr. -->
                         </span>
                         <span class="description">Shared publicly - <?php echo $users->timeAgo($user['created_on3']) ;?></span>
                     </div> <!-- /.user-block -->
                </div> <!-- /.card-header -->

                <div class="card-body">

                    <div class="events-post mb-0">
                        <h2 class="events-post-title"><?php echo $user['title'] ;?></h2>
                        <p class="events-post-meta">January 1, 2014 by <a href="#"> <?php echo $user['authors']; ?></a></p>
                    </div><!-- /.events-post -->

                   <div class="row reusercolor p-2 clear-float">
                       <div class="col-md-6">
                           <div id="jssor_1"  style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:980px;overflow:hidden;visibility:hidden;">
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo BASE_URL_LINK;?>image/users_profile_cover/spin.svg" />
                                </div>
                                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:980px;overflow:hidden;"> <!--width:980px;height:380px -->
                                      <?php 
                                        $file = $user['photo'];
                                        $expode = explode("=",$file);
                                        $splice= array_splice($expode,0,10);
                                        for ($i=0; $i < count($splice); ++$i) { 
                                            ?>
                                      <div class="imageeventsViewPopup more"  data-events="<?php echo $user["events_id"] ;?>">
                                      <img data-u="image" src="<?php echo BASE_URL_PUBLIC."uploads/events/".$splice[$i] ;?>"
                                          alt="Photo" >
                                      </div>
                                      <?php } ?>
                                   
                                </div>
                                <!-- Bullet Navigator -->
                                <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                                    <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                            <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                        <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                                        <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                        <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                                        <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                                    </svg>
                                </div>
                           </div>
                           <script type="text/javascript">jssor_1_slider_init();</script>
                      
                       <div class="mt-2">
                           <?php echo $user["additioninformation"]; ?>
                       </div>

                       <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                        <blockquote>
                          <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </blockquote>
                        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                        <h2>Heading</h2>
                        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                        <h3>Sub-heading</h3>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <pre><code>Example code block</code></pre>
                        <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                        <h3>Sub-heading</h3>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <ul>
                          <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                          <li>Donec id elit non mi porta gravida at eget metus.</li>
                          <li>Nulla vitae elit libero, a pharetra augue.</li>
                        </ul>
                        <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                        <ol>
                          <li>Vestibulum id ligula porta felis euismod semper.</li>
                          <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                          <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                        </ol>
                        <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>

                     </div> <!-- col-md-6  -->
                     <div class="col-md-6 pl-5">
                              <h5 class="mt-3"> Comments</h5>
                            
                                <div class="user-block mt-3">
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
                                        <a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"> <?php echo $user['username']; ?> comment on - <?php echo $users->timeAgo($user['created_on3']) ;?></a>
                                        <span class="float-right">44 <i class="fa fa-heart"></i></span>
                                        <!-- //Jonathan Burke Jr. -->
                                    </span>
                                    <span class="description"> nice to donate keep up </span>
                                </div> <!-- /.user-block -->

                                <div class="input-group mt-2">
                                    <input class="form-control form-control-sm" id="commentField" type="text"
                                        name="comment" data-events="<?php echo $user['events_id'];?>"
                                        placeholder="Reply to  <?php echo $user['username'] ;?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text btn" style="padding: 0px 10px;"  <?php if(isset($_SESSION['key'])){ echo 'id="events_Comment"'; }else{ echo 'id="login-please" data-login="1"'; } ?>
                                            aria-label="Username" aria-describedby="basic-addon1">
                                            <span class="fa fa-arrow-right text-muted" ></span></span>
                                    </div>
                                </div> <!-- input-group -->
                            <div class=" row mt-1">
                            <div class="col-md-12">
                            <span id="responseComment"></span>
                            <?php if (count($comment) > 5) { ?>

                                <!-- <div class="tweet-show-popup-comment-wrap"> -->
                                <div id="comments" style="height:300px;" class="large-2">
                                        <!--COMMENTS-->
                                    <?php  foreach ($comment as $user) { 
                                            $likes= $events->events_comment_like($user_id,$user['comment_id']);
                                    ?>

                                            <div class="user-block mt-3"  id="userComment<?php echo $user["comment_id"]; ?>">
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
                                                  <a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"> <?php echo $user['username']; ?> comment on - <?php echo $users->timeAgo($user['comment_at']) ;?>
                                                     <!-- <i class="fa fa-share more" aria-hidden="true"></i> -->
                                                  </a>
                                                <!-- <span class="float-right mr-1">44 <i class="fa fa-heart"></i> -->

                                                    <?php if($likes['like_on_'] == $user['comment_id']){ ?>
                                                        <span <?php if(isset($_SESSION['key'])){ echo 'class="unlike-eventsUser-btn more float-right text-sm  mr-1"'; }else{ echo 'id="login-please" class="more float-right" data-login="1"'; } ?> data-comment="<?php echo $user['comment_id']; ?>"  data-user="<?php echo $user['user_id']; ?>"><span class="likescounter "><?php echo $user['likes_counts_'] ;?></span> <i class="fa fa-heart"  ></i></span>
                                                    <?php }else{ ?>
                                                        <span <?php if(isset($_SESSION['key'])){ echo 'class="like-eventsUser-btn more float-right text-sm mr-1"'; }else{ echo 'id="login-please" class="more float-right"  data-login="1"'; } ?> data-comment="<?php echo $user['comment_id']; ?>"  data-user="<?php echo $user['user_id']; ?>" ><span class="likescounter"> <?php if ($user['likes_counts_'] > 0){ echo $user['likes_counts_'];}else{ echo '';} ?></span> <i class="fa fa-heart-o" ></i> </span>
                                                    <?php } ?>

                                                    <?php if($user["comment_by"] === $user_id){ ?>
                                                        <span class="deleteEventsComment more" data-events="<?php echo $user["events_id"]; ?>" data-comment="<?php echo $user["comment_id"]; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                    <?php }else { echo ''; } ?>
                                                </span>
                                                    <!-- //Jonathan Burke Jr. -->
                                                </span>
                                                <span class="description"> <?php echo $user['comment']; ?>  </span>
                                            </div> <!-- /.user-block -->
                                    <?php } ?>
                                </div><!-- comments -->

                                <?php  }else{ ?>
                                <div id="comments">
                                        <!--COMMENTS-->
                                      <?php  foreach ($comment as $user) { 
                                           $likes= $events->events_comment_like($user_id,$user['comment_id']);
                                         ?>
                                            <div class="user-block mt-3" id="userComment<?php echo $user["comment_id"]; ?>">
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
                                                    <a href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"> <?php echo $user['username']; ?> comment on - <?php echo $users->timeAgo($user['comment_at']) ;?></a>
                                                <!-- <span class="float-right mr-1">44 <i class="fa fa-heart"></i> -->
                                                     <?php if($likes['like_on_'] == $user['comment_id']){ ?>
                                                        <span <?php if(isset($_SESSION['key'])){ echo 'class="unlike-eventsUser-btn more float-right text-sm  mr-1"'; }else{ echo 'id="login-please" class="more float-right" data-login="1"'; } ?> data-comment="<?php echo $user['comment_id']; ?>"  data-user="<?php echo $user['user_id']; ?>"><span class="likescounter "><?php echo $user['likes_counts_'] ;?></span> <i class="fa fa-heart"  ></i></span>
                                                    <?php }else{ ?>
                                                        <span <?php if(isset($_SESSION['key'])){ echo 'class="like-eventsUser-btn more float-right text-sm mr-1"'; }else{ echo 'id="login-please" class="more float-right"  data-login="1"'; } ?> data-comment="<?php echo $user['comment_id']; ?>"  data-user="<?php echo $user['user_id']; ?>" ><span class="likescounter"> <?php if ($user['likes_counts_'] > 0){ echo $user['likes_counts_'];}else{ echo '';} ?></span> <i class="fa fa-heart-o" ></i> </span>
                                                    <?php } ?>

                                                    <?php if($user["comment_by"] === $user_id){ ?>
                                                        <span class="deleteEventsComment more" data-events="<?php echo $user["events_id"]; ?>" data-comment="<?php echo $user["comment_id"]; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                    <?php }else { echo ''; } ?>
                                                </span>
                                                    <!-- //Jonathan Burke Jr. -->
                                                </span>
                                                <span class="description"> <?php echo $user['comment']; ?>  </span>
                                            </div> <!-- /.user-block -->
                                    <?php } ?>
                                </div><!-- comments -->
                                <?php  } ?>
                              </div><!-- col -->
                            </div><!-- /.row -->

                       </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.card-body -->
                <div class="card-footer text-muted">
                    Footer
                </div><!-- /.card-footer -->
            </div>


           </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

<?php } 