<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['hotel_view']) && !empty($_POST['hotel_view'])) {
    $user_id= $_SESSION['key'];
     ?>

<div class="hotel-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmithotel"></span>
                <div class="card-header">
                    <h5 class="card-text">Rwanda hotel</h5>
                    <p class="card-text">Do you want to add rwanda hotel ? Please fill details below.</p>
                </div>
                <form method="post" id="form-hotel"  enctype="multipart/form-data" >
                <div class="card-body">
                    <div>Choose your location and categories </div>
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row mt-2">
                        <script src="<?php echo BASE_URL_LINK ;?>dist/js/country.js"></script>

                        <div class="col">
                            <div id="myCountry"></div>
                        </div>
                        <div class="col">
                            <div id="myProvince"></div>
                        </div>
                        <div class="col">
                            <div id="myDistricts"></div>
                        </div>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                            <div id="mySectors"></div>
                        </div>

                       <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="location_cell" id="location_cell">
                                <option value="">choose what Location of cell is taken</option>
                                <option value="Rugando">Rugando</option>
                                <option value="kimihurura1">kimihurura1</option>
                                <option value="Kicukiro">Kicukiro</option>
                                <option value="muhobe">muhobe</option>
                                <option value="Rutsiro">Rutsiro</option>
                                <option value="rutondo">rutondo</option>
                              </select>
                            </div>
                        </div>

                       <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="location_village" id="location_village">
                                <option value="">choose what Location of village is taken</option>
                                <option value="gasange">gasange</option>
                                <option value="amajyambere">amajyambere</option>
                                <option value="henza">henza</option>
                                <option value="Kicukiro">Kicukiro</option>
                                <option value="kamuhima">kamuhima</option>
                                <option value="rugombe">rugombe</option>
                                <option value="mujabana">mujabana</option>
                              </select>
                            </div>
                        </div>

                         <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">name</span>
                            </div>
                            <input type="text" class="form-control" name="title" id="title" placeholder="name of hotel">
                          </div>
                        </div>
                        
                      </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us is products in good shape is it original or not and add more details and Try to summarize People can understand what products you try to sale" rows="3"></textarea>
                      </div>

                      <div class="form-row mt-2">
                       
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">author</span>
                            </div>
                            <input type="text" class="form-control" name="author" id="author" placeholder="name of author">
                          </div>
                        </div>

                      
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">phone</span>
                            </div>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone number">
                          </div>
                        </div>
                      
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">price</span>
                            </div>
                            <input type="number" class="form-control" name="price" id="price" placeholder="price">
                          </div>
                        </div>

                        
                        <div class="col">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Ranger</span>
                            </div>
                           <select class="form-control" name="range" id="range">
                                <option value="">choose IS it Good /better /very Good </option>
                                <option value="6.5">Good</option>
                                <option value="7.0">Better</option>
                                <option value="8.0">Very Good</option>
                                <option value="9.0">Perfect</option>
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" name="photo[]" id="photo" multiple>
                                </div>
                                <span>Upload one photo of proof</span><br>
                                <span class="progress progress-hidex mt-1">
                                        <span class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                            style="width:0%;" id="prox" aria-valuenow="" aria-valuemin="0"
                                            aria-valuemax="100"></span>
                                </span>
                               <small class="help-block">Max. 10MB</small>
                           </div> 
                        </div>
                        <div class="col">
                             <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" name="otherphoto[]" id="other-photo"  multiple>
                               </div>
                               <span>Other photo</span>
                               <small class="help-block">(e.g show us many photo.) </small><br>
                                <span class="progress progress-hidec mt-1">
                                        <span class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                            style="width:0%;" id="proc" aria-valuenow="" aria-valuemin="0"
                                            aria-valuemax="100"></span>
                                </span>
                               <small class="help-block">Max. 10MB</small>
                           </div> 
                        </div>
                      </div>
                      <span onclick="fundAddmoreVideo()" id="add-more" class="btn btn-primary btn-md ">+ add more</span>

                    <div id="add-videohelp">
                      
                    </div>
                    <!-- collapse addmore-->

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <button type="button" id="submit-sale" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
                </div><!-- card-footer -->
               </form>
            </div><!-- card end-->

          </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<!-- <script src="< ?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script> -->
<script type="text/javascript">
    $('.progress-hidex').hide();
    $('.progress-hidec').hide();
    $('.progress-hidez').hide();
    $('#add-videohelp').hide();
</script>
<?php } 

if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id= $_POST['user_id'];
    $datetime= date('Y-m-d H-i-s');

    $photo= $_FILES['photo'];
    $other_photo= $_FILES['otherphoto'];

    if (!empty($_FILES['video']['name'][0])) {
      $video= $_FILES['video'];
      $video_ = $home->uploadRwandahotelFile($video);
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $video_= "";
      $youtube=  "";
    }

    $title = $users->test_input($_POST['title']);
    $author = $users->test_input($_POST['author']);
    $phone = $users->test_input($_POST['phone']);
    $price = $users->test_input($_POST['price']);
    $country = $users->test_input($_POST['country']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $range=  $users->test_input($_POST['range']);
    $location_province=  $users->test_input($_POST['location_province']);
    $location_districts=  $users->test_input($_POST['location_districts']);
    $location_Sector=  $users->test_input($_POST['location_sectors']);
    $location_cell=  $users->test_input($_POST['location_cell']);
    $location_village=  $users->test_input($_POST['location_village']);


	if (!empty($phone) || !empty(array_filter($photo['name'])) || !empty(array_filter($other_photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadRwandahotelFile($photo);
            $other_photo_ = $home->uploadRwandahotelFile($other_photo);
		}

		if (strlen($additioninformation ) > 400) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('rwandahotel',array( 
	'title_'=> $title,
	'author_'=> $author,
	'phone_'=> $phone,
	'price'=> $price,
	'country'=> $country,
	'photo_'=> $photo_,
	'other_photo_'=> $other_photo_, 
	'video_'=> $video_, 
	'youtube_'=> $youtube, 
    'text_'=> $additioninformation,
    'ranges'=> $range,
    'location_province'=> $location_province,
    'location_districts'=> $location_districts,
    'location_Sector'=> $location_Sector,
    'location_cell'=> $location_cell,
    'location_village'=> $location_village,
    'user_id_'=> $user_id,
    'created_on_'=> $datetime ));

    }
} ?> 