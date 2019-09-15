<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['school_view']) && !empty($_POST['school_view'])) {
    $user_id= $_SESSION['key'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   

     ?>

<div class="school-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmitschool"></span>
                <div class="card-header">
                    <h5 class="card-text">Rwanda school</h5>
                    <p class="card-text">Do you want to add rwanda school ? Please fill details below.</p>
                </div>
                <form method="post" id="form-school"  enctype="multipart/form-data" >
                <div class="card-body">
                    <div>Choose your location and categories </div>
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      
                      <div class="form-row mt-2">
                        
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;" class="material-icons">school</i></span>
                            </div>
                            <input type="text" class="form-control" name="title" id="title" placeholder="name of School">
                          </div>
                        </div>
                        
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Director</span>
                            </div>
                            <input type="text" class="form-control" name="author" id="author" placeholder="name of Director">
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

                      </div>

                      <div class="form-row mt-2">
                        <script src="<?php echo BASE_URL_LINK ;?>dist/js/country.js"></script>

                        <div class="col">
                            <label for="">Country</label>
                            <div class="input-group" id="myCountry">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col">
                            <div id="myProvince"></div>
                        </div>
                        <div class="col">
                            <div id="myDistricts"></div>
                        </div>

                        <div class="col">
                          <div id="mySectors"></div>
                        </div> -->

                        <div class="col">
                            <label for="">Province</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                                <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control">
                                    <option value="">----Select province----</option>
                                    <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                                    <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for=""> District</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                                <select class="form-control" name="districtcode" id="districtcode" onchange="showResult2();" >
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="Sector">Sector</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                                <select class="form-control" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="Cell">Cell</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                </div>
                                <select name="codecell" id="codecell" class="form-control" onchange="showResult4();">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row mt-2">

                        <div class="col">
                              <label for="Village">Village</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                  </div>
                                    <select name="CodeVillage" id="CodeVillage" class="form-control">
                                        <option> </option>
                                    </select>
                              </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                              <label for="Village">Is it public or private</label>
                              <select class="form-control" name="categories_of_school" id="categories_of_school">
                                <option value="">Select what types of Rwanda school</option>
                                <option value="Public School">Public School</option>
                                <option value="Private School">Private School</option>
                                <option value="Religion School">Religion School</option>
                              </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                              <label for="Village">types of school</label>
                              <select class="form-control" name="type_of_school" id="type_of_school">
                                <option value="">Select what types of school</option>
                                <option value="kindergarden School">kindergarden School</option>
                                <option value="Primary School">Primary School</option>
                                <option value="Secondary School">Secondary School</option>
                                <option value="College School">College School</option>
                                <option value="University">University School</option>
                              </select>
                            </div>
                        </div>
                        
                      </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us is products in good shape is it original or not and add more details and Try to summarize People can understand what products you try to sale" rows="3"></textarea>
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
      $video_ = $home->uploadRwandaschoolFile($video);
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $video_= "";
      $youtube=  "";
    }

    $title = $users->test_input($_POST['title']);
    $author = $users->test_input($_POST['author']);
    $phone = $users->test_input($_POST['phone']);
    $country = $users->test_input($_POST['country']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_of_school=  $users->test_input($_POST['categories_of_school']);
    $type_of_school=  $users->test_input($_POST['type_of_school']);
    $location_province=  $users->test_input($_POST['provincecode']);
    $location_districts=  $users->test_input($_POST['districtcode']);
    $location_Sector=  $users->test_input($_POST['sectorcode']);
    $location_cell=  $users->test_input($_POST['codecell']);
    $location_village=  $users->test_input($_POST['CodeVillage']);


	if (!empty($phone) || !empty(array_filter($photo['name'])) || !empty(array_filter($other_photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadRwandaschoolFile($photo);
            $other_photo_ = $home->uploadRwandaschoolFile($other_photo);
		}

		if (strlen($additioninformation ) > 400) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('school',array( 
	'title_'=> $title,
	'author_'=> $author,
	'phone_'=> $phone,
	'country'=> $country,
	'photo_'=> $photo_,
	'other_photo_'=> $other_photo_, 
	'video_'=> $video_, 
	'youtube_'=> $youtube, 
    'text_'=> $additioninformation,
    'categories_of_school'=> $categories_of_school,
    'type_of_school'=> $type_of_school,
    'location_province'=> $location_province,
    'location_districts'=> $location_districts,
    'location_Sector'=> $location_Sector,
    'location_cell'=> $location_cell,
    'location_village'=> $location_village,
    'user_id_'=> $user_id,
    'created_on_'=> $datetime ));

    }
} ?> 