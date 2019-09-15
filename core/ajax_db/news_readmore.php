<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['news_id']) && !empty($_POST['news_id'])) {
    $user_id= $_SESSION['key'];
    $news_id = $_POST['news_id'];
    $user= $news->NewsReadmore($news_id);
     ?>

<div class="news-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

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

                    <div class="news-post">
                        <h2 class="blog-post-title">Sample blog post</h2>
                        <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
            
                        <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
                        <hr>
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
                    </div><!-- /.blog-post -->

                   <div class="row reusercolor p-2">
                       <div class="col-md-6">
                      <h5 class="text-center"><?php echo $user['title'] ;?></h5>
                           <div id="jssor_1"  style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:980px;overflow:hidden;visibility:hidden;">
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo BASE_URL_LINK;?>image/users_profile_cover/spin.svg" />
                                </div>
                                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:980px;overflow:hidden;"> <!--width:980px;height:380px -->
                                      <?php 
                                        $file = $user['photo']."=".$user['other_photo'];
                                        $expode = explode("=",$file);
                                        $splice= array_splice($expode,0,10);
                                        for ($i=0; $i < count($splice); ++$i) { 
                                            ?>
                                      <div class="imageblogViewPopup more"  data-news="<?php echo $user["news_id"] ;?>">
                                      <img data-u="image" src="<?php echo BASE_URL_PUBLIC."uploads/news/".$splice[$i] ;?>"
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
                      
                       <h4 class="mt-2"><i>
                        authors: <?php echo $user['authors']; ?>
                       </i></h4>
                       <div class="mt-2">
                           <?php echo $user['text']; ?>
                       </div>
                       <?php 
                        $expodefile = explode("=",$user['other_photo']); 
                        $fileActualExt= array();
                         for ($i=0; $i < count($expodefile); ++$i) { 
                             $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                         }
                         $allower_ext = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
             if (array_diff($fileActualExt,$allower_ext) == false) {

                        $expode = explode("=",$user['other_photo']); 
                        $count = count($expode); ?>

               <?php if ($count === 1) { ?>

                       <div class="mt-2">
                            <?php 
                               $file = $user['other_photo'];
                               $photo_title=  explode("=",$user["photo_Title"]);
                               $expode = explode("=",$file); ?>
                             <div class="imageblogViewPopup more"  data-news="<?php echo $user["news_id"] ;?>">
                                <img src="<?php echo BASE_URL_PUBLIC."uploads/news/".$expode[0] ;?>"
                                    alt="Photo" >
                             </div>
                             <div class="h5"><i><?php echo $photo_title[0]; ?></i></div>
                       </div>

               <?php }else if ($count === 2) { ?>

                         <?php 
                               $file = $user['other_photo'];
                               $photo_title=  explode("=",$user["photo_Title"]);
                               $explode = explode("=",$file);
                               $splice= array_splice($explode,0,2);
                               for ($i=0; $i < count($splice); ++$i) { 
                                   ?>
                                   <div class="mt-2">
                                         <div class="imageblogViewPopup more"  data-news="<?php echo $user["news_id"] ;?>">
                                         <img src="<?php echo BASE_URL_PUBLIC."uploads/news/".$splice[$i] ;?>"
                                             alt="Photo" >
                                         </div>
                                        <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                                   </div>
                             <?php } ?>

               <?php }else if ($count === 3) { ?>

                         <?php 
                               $file = $user['other_photo'];
                               $photo_title=  explode("=",$user["photo_Title"]);
                               $explode = explode("=",$file);
                               $splice= array_splice($explode,0,3);
                               for ($i=0; $i < count($splice); ++$i) { 
                                   ?>
                                   <div class="mt-2">
                                         <div class="imageblogViewPopup more"  data-news="<?php echo $user["news_id"] ;?>">
                                         <img src="<?php echo BASE_URL_PUBLIC."uploads/news/".$splice[$i] ;?>"
                                             alt="Photo" >
                                         </div>
                                        <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                                   </div>
                             <?php } ?>

                  <?php }else if ($count > 3) { ?>

                            <?php 
                               $file = $user['other_photo'];
                               $photo_title=  explode("=",$user["photo_Title"]);
                               $explode = explode("=",$file);
                               $splice= array_splice($explode,0,4);
                               for ($i=0; $i < count($splice); ++$i) { 
                                   ?>
                                   <div class="mt-2">
                                         <div class="imageblogViewPopup more"  data-news="<?php echo $user["news_id"] ;?>">
                                         <img src="<?php echo BASE_URL_PUBLIC."uploads/news/".$splice[$i] ;?>"
                                             alt="Photo" >
                                         </div>
                                        <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                                   </div>
                             <?php } ?>

                            <span class="btn btn-primary imageblogViewPopup  float-right" data-news="<?php echo $user["news_id"] ;?>" > View More photo  <i class="fa fa-picture-o"></i> >>> </span>

                  <?php } ?>
                  
               <?php } ?>

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
                                    <input class="form-control form-control-sm" id="commentHome" type="text"
                                        name="comment" data-news="<?php echo $user['news_id'];?>"
                                        placeholder="Reply to  <?php echo $user['username'] ;?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text btn" style="padding: 0px 10px;" 
                                            aria-label="Username" aria-describedby="basic-addon1">
                                            <span class="fa fa-arrow-right text-muted" id="post_HomeComment"></span></span>
                                    </div>
                                </div> <!-- input-group -->

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