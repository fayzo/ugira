<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['car_id']) && !empty($_POST['car_id'])) {
    $user_id= $_SESSION['key'];
    if (isset($_SESSION['key'])) {
        # code...
        $user_id= $_SESSION['key'];
    }
    $car_id = $_POST['car_id'];
    $user= $car->carReadmore($car_id);
     ?>

<div class="car-popup">
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

                   <div class="row reusercolor ">
                       <div class="col-md-12">
                            <h5 class="text-center  black-bg h4 mb-2"><?php echo $user['categories_car']." in ".$user['province']." Location ".$user['cell']."/".$user['sector']." at ".$user['price']." Frw"; ?></h5>
                       </div>
                       <div class="col-md-1-12 ">
                           <div id="jssor_3" style="position:relative;margin:0;top:0px;left:0px;width:840px;height:380px;overflow:hidden;visibility:hidden;">
                                <!-- Loading Screen -->
                                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo BASE_URL_LINK."image/img/"?>img/spin.svg" />
                                </div>
                                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:840px;height:380px;overflow:hidden;">
                                        <?php 
                                            $file = $user['photo']."=".$user['other_photo'];
                                            $title = $user['photo_Title_main']."=".$user['photo_Title'];
                                            $titles = explode("=",$title);
                                            $expode = explode("=",$file);
                                            $splice= array_splice($expode,0,10);
                                            for ($i=0; $i < count($splice); ++$i) { 
                                                ?>
                                                <div class="imagecarViewPopup more"  data-car="<?php echo $user["car_id"] ;?>">
                                                    <img data-u="image" src="<?php echo BASE_URL_PUBLIC."uploads/car/".$splice[$i] ;?>" />
                                                    <div class="h5" u="thumb"><?php echo $titles[$i] ;?></div>
                                                </div>
                                        <?php } ?>
                                    
                                    </div>
                                <!-- Thumbnail Navigator -->
                                <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:840px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
                                    <div u="slides">
                                        <div u="prototype" style="position:absolute;top:0;left:0;width:840px;height:50px;">
                                            <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Arrow Navigator -->
                                <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
                                    </svg>
                                </div>
                                <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                        <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
                                    </svg>
                                </div>
                            </div>
                            <script type="text/javascript">jssor_3_slider_init();</script>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mt-2"><i>
                                authors: <?php echo $user['authors']; ?>
                            </i></h4>
                            <div class="mt-2">
                                <?php echo $user['text']; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <h4 class="mt-2"><i>Details of car</i></h4>
                            <ul>
                                <li>200 m square feet Garden,</li>
                                <li>4 bedroom,</li>
                                <li>2 bathroom, </li>
                                <li>kitchen and cabinet,</li>
                                <li>car parking ,</li>
                                <li>dapibuseget quame</li>
                            </ul>     
                        </div>
                       <?php 
                        $file = $user['photo']."=".$user['other_photo'];
                        $expodefile = explode("=",$file); 
                        $fileActualExt= array();
                         for ($i=0; $i < count($expodefile); ++$i) { 
                             $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                         }
                         $allower_ext = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
             if (array_diff($fileActualExt,$allower_ext) == false) {

                        $file = $user['photo']."=".$user['other_photo'];
                        $expode = explode("=",$file); 
                        $count = count($expode);?>

               <?php if ($count < 4) { ?>

                         <?php 
                               $file = $user['photo']."=".$user['other_photo'];
                               $title= $user['photo_Title_main']."=".$user["photo_Title"];
                               $photo_title=  explode("=",$title);
                               $explode = explode("=",$file);
                               $splice= array_splice($explode,0,3);
                               for ($i=0; $i < count($splice); ++$i) { 
                                   ?>
                                    <div class="col-md-6">
                                         <div class="imagecarViewPopup more"  data-car="<?php echo $user["car_id"] ;?>">
                                         <img src="<?php echo BASE_URL_PUBLIC."uploads/car/".$splice[$i] ;?>"
                                             alt="Photo" >
                                         </div>
                                     <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                                   </div>
                             <?php } ?>

                  <?php }else if ($count > 4) { ?>

                            <?php 
                                $file = $user['photo']."=".$user['other_photo'];
                                $title= $user['photo_Title_main']."=".$user["photo_Title"];
                               $photo_title=  explode("=",$title);
                               $explode = explode("=",$file);
                               $splice= array_splice($explode,0,4);
                               for ($i=0; $i < count($splice); ++$i) { 
                                   ?>
                                    <div class="col-md-6">
                                         <div class="imagecarViewPopup more"  data-car="<?php echo $user["car_id"] ;?>">
                                         <img src="<?php echo BASE_URL_PUBLIC."uploads/car/".$splice[$i] ;?>"
                                             alt="Photo" >
                                         </div>
                                     <div class="h5"><i><?php echo $photo_title[$i]; ?></i></div>
                                   </div>
                             <?php } ?>

                            <span class="btn btn-primary imagecarViewPopup  float-right" data-car="<?php echo $user["car_id"] ;?>" > View More photo  <i class="fa fa-picture-o"></i> >>> </span>

                  <?php } ?>
                  
               <?php } ?>

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