<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['hotel_id']) && !empty($_POST['hotel_id'])) {
    $user_id= $_SESSION['key'];
    $hotel_id = $_POST['hotel_id'];
    $user= $hotel->hotelReadmore($hotel_id);
     ?>
 <style>
    	ul{
			list-style: none outside none;
		    padding-left: 0;
            margin: 0;
		}
        .demo .item{
            margin-bottom: 60px;
        }
		.content-slider li{
		    background-color: #ed3020;
		    text-align: center;
		    color: #FFF;
		}
		.content-slider h3 {
		    margin: 0;
		    padding: 70px 0;
		}
		.demo{
			width: 800px;
		}
    </style>
<div class="hotel-popup">
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
                         <span class="description">Shared publicly - <?php echo $users->timeAgo($user['created_on_']) ;?></span>
                     </div> <!-- /.user-block -->
                </div> <!-- /.card-header -->

                <div class="card-body">

                   <div class="row reusercolor p-2">
                       <div class="col-md-12">
                           <div class="float-left">
                           <h5 ><?php echo $user['title_'] ;?>
                                <span class="text-warning"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i></span>
                            </h5>
                                <div class="text-muted mb-1"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $user['location_districts'].' districts/'.$user['location_Sector'].' sector'; ?></div>
                            </div>
                            <div class="float-right text-muted mb-1"><i class="fa fa-eye" aria-hidden="true"></i>30000 views</div>
                       </div>
                       <div class="col-md-6">
                             <div class="clearfix" style="max-width:474px;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <?php 
                                        $file = $user['photo_']."=".$user['other_photo_'];
                                        $expode = explode("=",$file);
                                        // $splice = array_expode ($expode,0,10);
                                        for ($i=0; $i < count($expode); ++$i) { 
                                            ?>
                                            <li data-thumb="<?php echo BASE_URL_PUBLIC.'uploads/Rwandahotel/'.$expode [$i]; ?>"> 
                                                <img src="<?php echo BASE_URL_PUBLIC.'uploads/Rwandahotel/'.$expode [$i]; ?>" />
                                                </li>
                                      <?php } ?>
                                </ul>
                            </div>
                     </div><!-- /.col -->
                     <div class="col-md-6">
                         <div class="row">
                             <div class="col-md-6">
                                     <ul class="list-group">
                                        <li class="list-group-item active"> How to get to Hotel </li>
                                        <li class="list-group-item "><i class="fa fa-plane" aria-hidden="true"></i> From kigali Airport to Hotel  </li>
                                        <li class="list-group-item "><i class="fa fa-taxi" aria-hidden="true"></i> Taxi 15 minutes</li>
                                        <li class="list-group-item "><i class="fa fa-motorcycle" aria-hidden="true"></i> Taxi 8 minutes</li>
                                        <li class="list-group-item "><i class="fa fa-walk" aria-hidden="true"></i> Walking 8 minutes</li>
                                    </ul>
                             </div>
                             <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item active"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> Guest love <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </li>
                                    <li class="list-group-item "><i class="fa fa-star" aria-hidden="true"></i> swimming pool</li>
                                    <li class="list-group-item "><i class="fa fa-star" aria-hidden="true"></i> Nice view</li>
                                    <li class="list-group-item "><i class="fa fa-star" aria-hidden="true"></i> Break Fast</li>
                                    <li class="list-group-item "><i class="fa fa-star" aria-hidden="true"></i> Wifi Free</li>
                                    <li class="list-group-item "><i class="fa fa-star"></i> Restaurent</li>
                                    <li class="list-group-item "><i class="fa fa-star"></i> Fitness center</li>
                                </ul>
                             </div>
                             
                         </div><!-- /.row -->
                     </div><!-- /.col -->
                     <div class="col-md-12 mt-3">
                      <div class="blog-post">
                        <h2 class="blog-post-title">About the Hotel</h2>
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

                        <h3>Most Popular facilities</h3>
                            <ul class="float-left mr-3">
                                <li><i class="fa fa-star" aria-hidden="true"></i> swimming pool</li>
                                <li><i class="fa fa-star" aria-hidden="true"></i> Nice view</li>
                                <li><i class="fa fa-star" aria-hidden="true"></i> Break Fast</li>
                                <li><i class="fa fa-star" aria-hidden="true"></i> Wifi Free</li>
                            </ul>
                            <ul class="ml-5">
                                <li><i class="fa fa-star" aria-hidden="true"></i> swimming pool</li>
                                <li><i class="fa fa-star" aria-hidden="true"></i> Nice view</li>
                                <li><i class="fa fa-star" aria-hidden="true"></i> Break Fast</li>
                                <li><i class="fa fa-star" aria-hidden="true"></i> Wifi Free</li>
                            </ul>
                        <h1 class="blog-post-title">Available Rooms</h1>

                        <table class="table table-hover table-bordered table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>image</th>
                                    <th>Room Type</th>
                                    <th>Conditions</th>
                                    <th>Single/Doule</th>
                                    <th>Price per Night</th>
                                    <th>Number Rooms</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td  style="background: url('<?php echo BASE_URL_PUBLIC ;?>uploads/Rwandahotel/2019_10cs-7.jpg')no-repeat center center;background-size:cover;height:80px;width:80px;position:relative"></td>
                                        <td>
                                            <div>Single Room</div>
                                            <div class="d-inline">
                                                <i class="fa fa-glass-martini"></i>
                                                <i class="fa fa-shower"></i>
                                                <i class="fa fa-bath"></i>
                                                <i class="fa fa-spa"></i>
                                                <i class="fa fa-swimmer"></i>
                                                <button type="button" class="btn btn-primary btn-sm">+</button>
                                            </div>
                                        </td>
                                        <td><ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> air condition</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Break Fast</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Watch machine</li>
                                            </ul>
                                        </td>       
                                        <td style="text-align:center;font-size:22px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> </td>
                                        <td style="text-align:center;color:green;font-size:22px;">245 US$</td>
                                        <td><button type="button" class="btn btn-primary btn-sm float-left">-</button>
                                            <button type="button" class="btn btn-default btn-sm">1</button>
                                             <button type="button" class="btn btn-primary btn-sm mr-2">+</button> 
                                             <button type="button" class="btn btn-primary btn-sm clear-float"><i class="fa fa-check" aria-hidden="true"></i> Book</button> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style="background: url('<?php echo BASE_URL_PUBLIC ;?>uploads/Rwandahotel/2019_10cs-7.jpg')no-repeat center center;background-size:cover;height:80px;width:80px;position:relative"></td>
                                        <td>
                                            <div>Single Room</div>
                                            <div class="d-inline">
                                                <i class="fa fa-glass-martini"></i>
                                                <i class="fa fa-shower"></i>
                                                <i class="fa fa-bath"></i>
                                                <i class="fa fa-spa"></i>
                                                <i class="fa fa-swimmer"></i>
                                                <button type="button" class="btn btn-primary btn-sm">+</button>
                                            </div>
                                        </td>
                                        <td><ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> air condition</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Break Fast</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Watch machine</li>
                                            </ul>
                                        </td>       
                                        <td style="text-align:center;font-size:22px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> </td>
                                        <td style="text-align:center;color:green;font-size:22px;">245 US$</td>
                                        <td><button type="button" class="btn btn-primary btn-sm float-left">-</button>
                                            <button type="button" class="btn btn-default btn-sm">1</button>
                                             <button type="button" class="btn btn-primary btn-sm mr-2">+</button> 
                                             <button type="button" class="btn btn-primary btn-sm clear-float"><i class="fa fa-check" aria-hidden="true"></i> Book</button> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style="background: url('<?php echo BASE_URL_PUBLIC ;?>uploads/Rwandahotel/2019_10cs-7.jpg')no-repeat center center;background-size:cover;height:80px;width:80px;position:relative"></td>
                                        <td>
                                            <div>Single Room</div>
                                            <div class="d-inline">
                                                <i class="fa fa-glass-martini"></i>
                                                <i class="fa fa-shower"></i>
                                                <i class="fa fa-bath"></i>
                                                <i class="fa fa-spa"></i>
                                                <i class="fa fa-swimmer"></i>
                                                <button type="button" class="btn btn-primary btn-sm">+</button>
                                            </div>
                                        </td>
                                        <td><ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> air condition</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Break Fast</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Watch machine</li>
                                            </ul>
                                        </td>       
                                        <td style="text-align:center;font-size:22px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> </td>
                                        <td style="text-align:center;color:green;font-size:22px;">245 US$</td>
                                        <td><button type="button" class="btn btn-primary btn-sm float-left">-</button>
                                            <button type="button" class="btn btn-default btn-sm">1</button>
                                             <button type="button" class="btn btn-primary btn-sm mr-2">+</button> 
                                             <button type="button" class="btn btn-primary btn-sm clear-float"><i class="fa fa-check" aria-hidden="true"></i> Book</button> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  style="background: url('<?php echo BASE_URL_PUBLIC ;?>uploads/Rwandahotel/2019_10cs-7.jpg')no-repeat center center;background-size:cover;height:80px;width:80px;position:relative"></td>
                                        <td>
                                            <div>Single Room</div>
                                            <div class="d-inline">
                                                <i class="fa fa-glass-martini"></i>
                                                <i class="fa fa-shower"></i>
                                                <i class="fa fa-bath"></i>
                                                <i class="fa fa-spa"></i>
                                                <i class="fa fa-swimmer"></i>
                                                <button type="button" class="btn btn-primary btn-sm">+</button>
                                            </div>
                                        </td>
                                        <td><ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> air condition</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Break Fast</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>Watch machine</li>
                                            </ul>
                                        </td>       
                                        <td style="text-align:center;font-size:22px;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> </td>
                                        <td style="text-align:center;color:green;font-size:22px;">245 US$</td>
                                        <td><button type="button" class="btn btn-primary btn-sm float-left">-</button>
                                            <button type="button" class="btn btn-default btn-sm">1</button>
                                             <button type="button" class="btn btn-primary btn-sm mr-2">+</button> 
                                             <button type="button" class="btn btn-primary btn-sm clear-float"><i class="fa fa-check" aria-hidden="true"></i> Book</button> 
                                        </td>
                                    </tr>
                                </tbody>
                        </table>

                    </div><!-- /.blog-post -->
                     </div>
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
    <script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>
<?php } 