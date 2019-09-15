<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['retweet']) && !empty($_POST['retweet'])) {
      $user_id= $_SESSION['key'];
	  $retweet_events_id= $_POST['retweet'];
	  $tweet_events_by= $_POST['tweet_By'];
	  $comment= $_POST['comments'];
	  $comments= $users->test_input($comment);
      $g=$events->Eventsretweet($retweet_events_id,$user_id,$tweet_events_by,$comments);
}

if (isset($_POST['showpopretweet_events_id']) && !empty($_POST['showpopretweet_events_id'])) {
    $user_id= $_SESSION['key'];
    $events_id= $_POST['showpopretweet_events_id'];
    $events_by= $_POST['tweet_events_By'];
	$retweet= $events->getPopupEventsTweet($user_id, $events_id, $events_by); 
	?>

            <div class="events-share-popup">
                <div class="wrap5">
                    <div class="retweet-popup-body-wrap" style="top:15%;">
                    <div class="card">
                       <div class="card-header py-1 main-active">
                		    <button class="close-retweet-popup float-right" style="font-size: 14px;cursor: pointer;"><i class="fa fa-times" aria-hidden="true"></i></button></span>
                			<h3 class="text-center" style="font-weight: normal; font-size: 16px;">Shares this to followers?</h3>
                		</div>
                		<div class="card-body">

                		    <div class="retweet-popup-input">
                               <div class="input-group">
                                    <input class="form-control form-control-md retweetMsg " type="additioninformation" 
                                       placeholder="Add a comment... to share <?php echo $retweet['username'] ;?> Post" >
                                    <div class="input-group-append">
                                      <span class="input-group-text btn events-retweet-it" style="padding: 0px 10px;" 
                                            aria-label="Username" aria-describedby="basic-addon1" id="post_HomeComment" >
                                            <span class="fa fa-share"  > Shares</span>
                                      </span>
                                    </div>
                                </div> <!-- input-group -->
                            </div>

                				<div class="retweet-popup-comment-wrap shadow-lg">
									<div class="user-block border-bottom" style="margin-bottom:10px;">
                                        <div class="user-blockImgBorder">
                                        <div class="user-blockImg" >
                                              <?php if (!empty($retweet['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $retweet['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username">
                                            <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$retweet['username'] ;?>"><?php echo $retweet['firstname']." ".$retweet['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                        </span>
                                           <span class="description">Shared public - <?php echo $home->timeAgo($retweet['created_on3']); ?></span>
                                    </div>

                                  <div class="row">
                                    <div class="col-md-12">
                                    <div class="card flex-md-row mb-4 border-0 h-md-250" >
                                    <img class="card-img-left flex-auto d-none d-lg-block" width="200px" height="250px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/events/<?php echo $retweet['photo'] ;?>" alt="Card image cap">
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <h4 style="font-family: Playfair Display, Georgia, Times New Roman, serif;text-align:left;">
                                        <a class="text-primary" href="javascript:void(0)" id="events-readmore" data-events="<?php echo $retweet['events_id'] ;?>"> <?php echo  $retweet['title']; ?></a>
                                        </h4>
                                        <div class="mb-1 text-muted">Created on <?php echo $home->timeAgo($retweet['created_on3']) ;?> By <?php echo $retweet['authors'] ;?> </div>
                                        <p class="mb-auto"> 
                                        <?php 
                                            if (strlen($retweet["additioninformation"]) > 200) {
                                                echo $retweet["additioninformation"] = substr($retweet["additioninformation"],0,200).'...<br><span class="mb-0"><a href="javascript:void(0)" id="events-readmore" data-events="'.$retweet['events_id'].'" class="text-muted" style"font-weight: 500 !important;">Continue reading...</a></span>';
                                            }else{
                                                echo $retweet["additioninformation"];
                                            } ?> 
                                        </p>
                                            <ul class="list-inline mb-0" style="list-style-type: none;">  

                                                <?php if($retweet['events_id'] == $retweet['retweet_events_id']){ ?>
                                                        <li class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="share-btn events-retweeted0 text-sm mr-2" data-events"'.$retweet['events_id'].'"  data-user="'.$retweet['user_id3'].'"'; }else{ echo 'id="login-please" class="more float-right" data-login="1"'; } ?>  >
                                                        <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $user['retweet_counts'] ;?> </span></i></button></li>
                                                <?php }else{ ?>
                                                        <li class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="share-btn events-retweet0 text-sm mr-2" data-events"'.$retweet['events_id'].'"  data-user="'.$retweet['user_id3'].'"'; }else{ echo 'id="login-please" class="more float-right" data-login="1"'; } ?>  >
                                                        <?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?>
                                                <?php } ?>

                                                <?php if($retweet['like_on'] == $retweet['events_id']){ ?>
                                                    <li  class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="unlike-events-btn text-sm  mr-2"'; }else{ echo 'id="login-please" class="more float-right" data-login="1"'; } ?> data-events="<?php echo $retweet['events_id']; ?>" data-user="<?php echo $retweet['user_id']; ?>">
                                                    <i class="fa fa-heart-o mr-1" style="color: red"> <span class="likescounter"><?php echo $retweet['likes_counts'] ;?> </span></i></button></li>
                                                <?php }else{ ?>
                                                    <li  class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="unlike-events-btn text-sm  mr-2"'; }else{ echo 'id="login-please" class="more float-right" data-login="1"'; } ?> data-events="<?php echo $retweet['events_id']; ?>" data-user="<?php echo $retweet['user_id']; ?>">
                                                    <i class="fa fa-heart-o mr-1" > <span class="likescounter">  <?php if ($retweet['likes_counts'] > 0){ echo $retweet['likes_counts'];}else{ echo '';} ?></span>343</span></i></button></li>
                                                <?php } ?>

                                                    <span class='text-right float-right'>
                                                
                                                        <li  class="list-inline-item"><button class="comments-btn text-sm" data-toggle="collapse">
                                                            <i class="fa fa-comments-o mr-1"></i> (5)
                                                        </button></li>

                                                    <?php if($_SESSION['key'] == $retweet['user_id3']){ ?>

                                                        <li  class=" list-inline-item">
                                                            <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                                <li>
                                                                    <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                                    <ul style="list-style-type: none; margin:0px;" >
                                                                        <li style="list-style-type: none; margin:0px;"> 
                                                                            <label class="deleteTweet" >Delete </label>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                        </span>
                                                </ul>
                                    </div>
                                    </div>
                                </div>

                            </div><!-- row -->
                         </div><!-- retweet-popup-comment-wrap -->
                		</div> <!-- card-body -->
                		<div class="card-footer"> 
                		</div>
                	</div>
                </div>
             </div> 

<?php 
}
?>
