<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['events_view']) && !empty($_POST['events_view'])) {
    $user_id= $_SESSION['key'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   
     ?>
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script>

<div class="events-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmitevents"></span>
                <div class="card-header">
                    <h5 class="card-text">Events</h5>
                    <p class="card-text">Add Events? Please fill details below.</p>
                </div>
                <form method="post" id="form-events"  enctype="multipart/form-data" >
                <div class="card-body">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                     
                      <div class="form-row">
                          <div class="col">
                             <label for="Village">country</label>
                            <!-- <div id="myCountry"></div> -->
                            <div id="myDiv"></div>
                          </div>

                             <div class="col">
                                <label for="">Province</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control provincecode">
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
                                    <select class="form-control districtcode" name="districtcode" id="districtcode" onchange="showResult2();" >
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                      <div class="form-row">

                            <div class="col">
                                <label for="Sector">Sector</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control sectorcode" name="sectorcode" id="sectorcode"  onchange="showResult3();">
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
                                    <select name="codecell" id="codecell" class="form-control codecell" onchange="showResult4();">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                              <label for="Village">Village</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                  </div>
                                    <select name="CodeVillage" id="CodeVillage" class="form-control CodeVillage">
                                        <option> </option>
                                    </select>
                              </div>
                          </div>
                      </div>

                      <div class="form-row  mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="title" id="title" placeholder="title">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="authors"  id="authors" placeholder="authors">
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" name="name_place" id="name_place" placeholder="which name a place events will take place Example stadium, Hotel or Arena etc..... ">
                         </div>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                           <input type="text" class="form-control" name="location_events" id="location_events" placeholder="which a place events will take place Example nyamirambo, huye etc..... ">
                         </div>

                         <div class="col">
                           <input type="date" class="form-control" name="date0" id="date0" >
                         </div>

                         <div class="col">
                           <input type="text" class="form-control" name="start_events" id="start_events" placeholder="What times events will start 07h , 09h or 11h etc...">
                         </div>

                         <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="categories_events" id="categories_events">
                                <option value="">Select what types of Events</option>
                                <option value="Party">Party</option>
                                <option value="Training">Training</option>
                                <option value="Anime-Series">Education</option>
                                <option value="Government">Government</option>
                                <option value="Memorial">Memorial</option>
                                <option value="Religion">Muslim</option>
                                <option value="Religion">christian</option>
                              </select>
                            </div>
                        </div>

                    </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us a liltte bit events is all about and Try to summarize People can understand" rows="3"></textarea>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" onChange="displayImage(this)" name="photo[]" id="photo" multiple>
                                </div>
                                <span>Upload Cover photo of movies</span><br>
                                <span class="progress progress-hidex mt-1">
                                        <span class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                                            style="width:0%;" id="prox" aria-valuenow="" aria-valuemin="0"
                                            aria-valuemax="100"></span>
                                </span>
                               <small class="help-block">Max. 10MB</small>
                           </div> 
                        </div>

                         <div class="col">
                            <span onclick="AddVideo()" id="add-more" class="btn btn-primary btn-md ">+ add video</span>
                             <div id="add-video">
                             </div>
                         </div>

                          <div class="col">
                            <span onclick="Addyoutube()" id="add-more1" class="btn btn-primary btn-md ">+ add youtube Link</span>
                             <div id="add-youtube">
                             </div>
                         </div>

                      </div>
                    <div id="add-photo0" class="row">
                    </div>
                    <!-- collapse addmore-->

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <button type="button" id="submit-events" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
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

    if (!empty($_FILES['video']['name'][0])) {
      $video= $_FILES['video'];
      $video_ = $home->uploadEventsFile($video);
    }else{
      $video_= "";
    }

    if (!empty($_POST['youtube'])) {
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $youtube=  "";
    }

  if (!empty($_POST['photo-Title0'])) {
          $photo_Title0=  $users->test_input($_POST['photo-Title0']);
  }else {
           $photo_Title0='';
  }
  if (!empty($_POST['photo-Title1'])) {
          $photo_Title1=  $users->test_input($_POST['photo-Title1']);
  }else {
           $photo_Title1='';
  }
  if (!empty($_POST['photo-Title2'])) {
          $photo_Title2=  $users->test_input($_POST['photo-Title2']);
  }else {
           $photo_Title2='';
  }
  if (!empty($_POST['photo-Title3'])) {
          $photo_Title3=  $users->test_input($_POST['photo-Title3']);
  }else {
           $photo_Title3='';
  }
  if (!empty($_POST['photo-Title4'])) {
         $photo_Title4=  $users->test_input($_POST['photo-Title4']);
  }else {
           $photo_Title4='';
  }
  if (!empty($_POST['photo-Title5'])) {
         $photo_Title5=  $users->test_input($_POST['photo-Title5']);
  }else {
           $photo_Title5='';
  }

    $country = $users->test_input($_POST['country']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_events =  $users->test_input($_POST['categories_events']);
    $name_place =  $users->test_input($_POST['name_place']);
    $location_events =  $users->test_input($_POST['location_events']);
    $start_events =  $users->test_input($_POST['start_events']);
    $date0 =  $users->test_input($_POST['date0']);

    $title =  $users->test_input($_POST['title']); 
    $authors =  $users->test_input($_POST['authors']); 

        $province=  $users->test_input($_POST['provincecode']);
        $districts=  $users->test_input($_POST['districtcode']);
        $cell=  $users->test_input($_POST['sectorcode']);
        $sector=  $users->test_input($_POST['codecell']);
        $village=  $users->test_input($_POST['CodeVillage']);

	if (!empty($title_movies) || !empty(array_filter($photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadEventsFile($photo);
		}

		if (strlen($additioninformation ) > 800) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('events',array( 
	'name_place'=> $name_place,
	'location_events'=> $location_events,
  'start_events'=> $start_events,
  'title' => $title,
  'authors' => $authors,
  'date0'=> $date0,
	'country'=> $country,
  'province'=> $province,
	'districts'=> $districts,
	'sector'=> $sector,
	'cell'=> $cell,
  'village'=> $village,
  'photo_Title'=> $photo_Title0.'='.$photo_Title1.'='.$photo_Title2.'='.$photo_Title3.'='.$photo_Title4.'='.$photo_Title5,
	'additioninformation'=> $additioninformation, 
	'categories_events'=> $categories_events, 
	'photo'=> $photo_, 
	'video'=> $video_, 
	'youtube'=> $youtube, 
  'user_id3'=> $user_id,
  'tweet_events_by'=> $user_id,
  'created_on3'=> $datetime ));
    }
} ?> 