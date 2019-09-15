<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['football_view']) && !empty($_POST['football_view'])) {
    $user_id= $_SESSION['key'];
     ?>

<div class="football-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmitfootball"></span>
                <div class="card-header">
                    <h5 class="card-text">Football Match</h5>
                    <p class="card-text">Add Football Match ? Please fill details below.</p>
                </div>
                <form method="post" id="form-football"  enctype="multipart/form-data" >
                <div class="card-body">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row">
                        <div class="col">
                          <input type="text" class="form-control" name="match_game" id="match_game" placeholder="match game">
                        </div>
                        <div class="col">
                          <input type="date" class="form-control" name="date_of_match"  id="date_of_match" placeholder="date of match">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="location_of_match"  id="location_of_match" placeholder="location of match 10PM AT STADIUM AMAHORO">
                        </div>
                      </div>
                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us about the match and how much the tickets and Try to summarize People can understand" rows="3"></textarea>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" name="photo[]" id="photo" multiple>
                                </div>
                                <span>Upload one photo of logo Team home</span><br>
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
                               <span>Upload one photo of logo Team Away</span>
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

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <button type="button" id="submit-football" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
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

    $match_game = $users->test_input($_POST['match_game']);
    $date_of_match = $users->test_input($_POST['date_of_match']);
    $location_of_match = $users->test_input($_POST['location_of_match']);
    $additioninformation = $users->test_input($_POST['additioninformation']);

	if (!empty($match_game)) {

        if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadFootballFile($photo);
            $other_photo_ = $home->uploadFootballFile($other_photo);
		}

		if (strlen($additioninformation) > 1000) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('football',array( 
	'match_game'=> $match_game,
	'date_of_match'=> $date_of_match,
	'location_of_match'=> $location_of_match, 
    'text'=> $additioninformation,
    'home_team_photo'=> $photo_, 
	'away_team_photo'=> $other_photo_, 
    'user_id3'=> $user_id,
    'created_on3'=> $datetime ));
    }
} ?> 