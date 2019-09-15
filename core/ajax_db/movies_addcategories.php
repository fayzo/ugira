<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['movies_view']) && !empty($_POST['movies_view'])) {
    $user_id= $_SESSION['key'];
     ?>

<div class="movies-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmitmovies"></span>
                <div class="card-header">
                    <h5 class="card-text">movies</h5>
                    <p class="card-text">Add movies? Please fill details below.</p>
                </div>
                <form method="post" id="form-movies"  enctype="multipart/form-data" >
                <div class="card-body">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row">
                        <div class="col">
                          <input type="text" class="form-control" name="title_movies" id="title_movies" placeholder="name of movies">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="director"  id="director" placeholder="name of director">
                        </div>

                         <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="latest_movies" id="latest_movies">
                                <option value="">Select what types of latest_movies</option>
                                <option value="america-movies">America movies</option>
                                <option value="Tv-Series">Tv Series</option>
                                <option value="Anime-Series">Anime Series</option>
                                <option value="Cartoons-Movies">Cartoons Movies</option>
                                <option value="Africans-Movies">Africans Movies</option>
                              </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="categories_movies" id="categories_movies">
                                <option value="">Select what types of Movies</option>
                                <option value="Action">Action</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Drama">Drama</option>
                                <option value="Fiction">Fiction</option>
                                <option value="Horror">Horror</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Animation">Animation</option>
                                <option value="Comedie">Comedie</option>
                                <option value="History">History</option>
                                <option value="Police">Police</option>
                                <option value="Music">Music</option>
                                <option value="Africans-Movies">Africans movies</option>
                                <option value="Tv-Series">Tv series</option>
                                <option value="Anime-Series">Anime series</option>
                                <option value="War">War</option>
                              </select>
                            </div>
                        </div>
                       
                      </div>

                       <div class="form-row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="actors" id="actors" placeholder="name of actors jhon,jean etc...">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="country"  id="country" placeholder="From which country">
                        </div>
                       </div>

                       <div class="form-row mt-2">
                        <div class="col">
                          <input type="date" class="form-control" name="date_release" id="date_release" placeholder="date release">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="duration"  id="duration" placeholder="duration of movies">
                        </div>
                       </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us a liltte bit what film is all about and Try to summarize People can understand what film is all about" rows="3"></textarea>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" name="photo[]" id="photo" multiple>
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

                      </div>

                      <span onclick="AddVideo()" id="add-more" class="btn btn-primary btn-md ">+ add video</span>
                      
                      <span onclick="Addyoutube()" id="add-more1" class="btn btn-primary btn-md ">+ add youtube Link</span>

                    <div id="add-video">
                      
                    </div>
                    <div id="add-youtube">
                      
                    </div>
                    <!-- collapse addmore-->

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <button type="button" id="submit-blog" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
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
      $video_ = $home->uploadMoviesFile($video);
    }else{
      $video_= "";
    }

    if (!empty($_POST['youtube'])) {
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $youtube=  "";
    }

    $title_movies = $users->test_input($_POST['title_movies']);
    $director = $users->test_input($_POST['director']);
    $actors = $users->test_input($_POST['actors']);
    $country = $users->test_input($_POST['country']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_movies =  $users->test_input($_POST['categories_movies']);
    $latest_movies =  $users->test_input($_POST['latest_movies']);
    $date_release =  $users->test_input($_POST['date_release']);
    $duration =  $users->test_input($_POST['duration']);

	if (!empty($title_movies) || !empty(array_filter($photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadMoviesFile($photo);
		}

		if (strlen($additioninformation ) > 800) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('movies',array( 
	'title_movies'=> $title_movies,
	'director'=> $director,
	'actors'=> $actors,
	'country'=> $country,
	'additioninformation'=> $additioninformation, 
	'categories_movies'=> $categories_movies, 
	'latest_movies'=> $latest_movies, 
	'date_release'=> $date_release, 
	'duration'=> $duration, 
	'photo'=> $photo_, 
	'video'=> $video_, 
	'youtube'=> $youtube, 
    'user_id3'=> $user_id,
    'created_on3'=> $datetime ));
    }
} ?> 