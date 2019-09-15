<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['blog_view']) && !empty($_POST['blog_view'])) {
    $user_id= $_SESSION['key'];
     ?>

<div class="blog-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmitblog"></span>
                <div class="card-header">
                    <h5 class="card-text">blog</h5>
                    <p class="card-text">Add Blog ? Please fill details below.</p>
                </div>
                <form method="post" id="form-blog"  enctype="multipart/form-data" >
                <div class="card-body">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row">
                        <div class="col">
                          <input type="text" class="form-control" name="title" id="title" placeholder="title">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="authors"  id="authors" placeholder="authors">
                        </div>

                        <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="categories_blog" id="categories_blog">
                                <option value="">Select what types of Blog</option>
                                <option value="Technology">Technology</option>
                                <option value="Design">Design</option>
                                <option value="Culture">Culture</option>
                                <option value="Business">Business</option>
                                <option value="Politics">Politics</option>
                                <option value="Opinion">Opinion</option>
                                <option value="Health">Health</option>
                                <option value="Style">Style</option>
                                <option value="Travel">Travel</option>
                                <option value="history">history</option>
                                <option value="science">science</option>
                                <option value="computer_science">computer science</option>
                                <option value="politics">politics</option>
                                <option value="story">story</option>
                              </select>
                            </div>
                        </div>
                      </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us who are you and what help you need and Try to summarize People can understand what helps you need" rows="3"></textarea>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file" >
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" onChange="displayImage0(this)" name="photo[]" id="photo" multiple>
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
                                   <input type="file" onChange="displayImage(this)" name="otherphoto[]" id="other-photo"  multiple>
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
                    <div id="add-photo0" class="row">
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
    $other_photo= $_FILES['otherphoto'];

    if (!empty($_FILES['video']['name'][0])) {
      $video= $_FILES['video'];
      $video_ = $home->uploadBlogFile($video);
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $video_= "";
      $youtube=  "";
    }

  if (!empty($_POST['photo-Titleo0'])) {
          $photo_Titleo=  $users->test_input($_POST['photo-Titleo0']);
  }else {
           $photo_Titleo='';
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

    $title = $users->test_input($_POST['title']);
    $authors = $users->test_input($_POST['authors']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_blog=  $users->test_input($_POST['categories_blog']);

	if (!empty($title) || !empty(array_filter($photo['name'])) || !empty(array_filter($other_photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadBlogFile($photo);
      $other_photo_ = $home->uploadBlogFile($other_photo);
		}

		if (strlen($additioninformation ) > 800) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('blog',array( 
	'title'=> $title,
	'authors'=> $authors,
	'photo'=> $photo_, 
	'other_photo'=> $other_photo_, 
	'video'=> $video_, 
	'youtube'=> $youtube, 
  'text'=> $additioninformation,
  'categories_blog'=> $categories_blog,
  'photo_Title_main'=> $photo_Titleo,
  'photo_Title'=> $photo_Title0.'='.$photo_Title1.'='.$photo_Title2.'='.$photo_Title3.'='.$photo_Title4.'='.$photo_Title5,
  'user_id3'=> $user_id,
  'tweet_blog_by'=> $user_id,
  'created_on3'=> $datetime ));
    }
} ?> 