<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['deleteTweetHome']) && !empty($_POST['deleteTweetHome'])) {
    $user_id= $_SESSION['key'];
	$tweet_id= $_POST['deleteTweetHome'];
    $comment->deleteLikesNotificatPosts($tweet_id,$user_id);
}

if (isset($_POST['showpopupdelete']) && !empty($_POST['showpopupdelete'])) {
    $user_id= $_SESSION['key'];
	$tweet_id= $_POST['showpopupdelete'];
	$deleteTweet_id= $_POST['deleteTweet'];
    $tweet=$home->getPopupTweet($user_id,$tweet_id,$deleteTweet_id);
    ?>
    <div class="retweet-popup">
      <div class="wrap5">
        <div class="post-popup-body-wrap">
            <div class="card">
            <span id='responseDeletePost'></span>
                <div class="card-header">
                    <span class="closeDelete"><button class="close-retweet-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
                    <h5 class="text-center text-muted">Are you sure you want to delete this Posts?</h5>
                </div>
                <div class="card-body">

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
                            <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                            <!-- //Jonathan Burke Jr. -->
                            <span class="description">Shared publicly - <?php echo $users->timeAgo($tweet['posted_on']); ?></span>
                        </span>
                        <span class="description">
                <?php echo 
                $home->getTweetLink($tweet['status']); 
                if (!empty($tweet['tweet_image'])) {
                    $expode = explode("=",$tweet['tweet_image']);
                    $count = count($expode); ?>

                    <?php if ($count === 1) { ?>

                    <div class="row mb-1 more">
                        <?php $expode = explode("=",$tweet['tweet_image']); ?>
                        <div class="col-sm-12">
                            <img class="img-fluid imagePopup"
                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>" alt="Photo"
                                data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                        </div>
                    </div>


                    <?php }else if($count === 2 || $count > 2){?>
                            <?php $expode = explode("=",$tweet['tweet_image']);
                                    $splice= array_splice($expode,0,10);
                                    for ($i=0; $i < count($splice); ++$i) { 
                                    ?>
                                <img class="img-fluid imagePopup ml-2 mb-2"
                                    src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                    data-tweet="<?php echo $tweet["tweet_id"] ;?>" alt="Photo">
                            <?php }?>
                     <?php }
                    }?>
                          </span>
                    </div> <!-- user-block -->
                </div><!-- card-body -->
                <div class="card-footer"><!-- card-footer -->
                <button class="delete-it  btn btn-primary btn-md float-right ml-3" type="submit">Delete</button>
                <button class="cancel-it btn btn-info btn-md  float-right">Cancel</button>
                </div><!-- card-footer -->
            </div><!-- card end -->
       </div> <!-- retweet-popup-body-wrap -->
     </div><!-- wrp5 -->
  </div><!-- retweet-popup -->

<?php
}
?>