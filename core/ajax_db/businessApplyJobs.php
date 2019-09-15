<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['apply_id']) && !empty($_POST['business_id'])) {
    $user_id= $_SESSION['key'];
    $job_id= $_POST['apply_id'];
    $business_id= $_POST['business_id'];
    $user = $home->jobsviewData($business_id,$job_id);
     ?>

<div class="apply-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmit"></span>
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
                          <a style="padding-right:3px;" class="h5" href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $home->htmlspecialcharss($user['job_title']) ;?></a>
                        </span>
                              <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $home->htmlspecialcharss($user['companyname']).' || '.$user['country'];?> <i class="flag-icon flag-icon-<?php echo strtolower($user['country']) ;?> h4 mb-0"
                          id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i></a>
                            <span class="description">Shared public - <?php echo $home->timeAgo($user['created_on']); ?> </span>
                    </div>
                    <h4 class="card-title text-center">CV Submission</h4>
                    <p class="card-text text-center">Do you want to work with us ? Please fill in your details below.</p>
                </div>
                <form method="post" id="form-cv"  enctype="multipart/form-data" >
                <div class="card-body">
                       <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                       <input type="hidden" name="job_id" value="<?php echo $job_id ;?>">
                       <input type="hidden" name="business_id" value="<?php echo $business_id ;?>">
                       <!-- <input type="text" class="form-control" name="deadline" value="< ?php echo $deadline ;?>"> -->
                      <div class="form-row">
                        <div class="col">
                          <input type="text" class="form-control" name="firstname" id="first-name" placeholder="First name">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="middlename"  id="middle-name" placeholder="Middle name if any ">
                        </div>
                      </div>
                      <div class="form-row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="lastname" id="last-name" placeholder="Lastname">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Contact Number">
                        </div>
                      </div>
                      <div class="form-row mt-2">

                        <div class="col">
                         <div class="form-group">
                           <select class="form-control" name="degree" id="degree">
                             <option>Select Highest degree</option>
                             <option value="diploma">diploma</option>
                             <option value="certificate">certificate</option>
                           </select>
                         </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <select class="form-control" name="field" id="field">
                             <option>Select Field study of degree</option>
                              <option value="account">account</option>
                              <option value="finace">finace</option>
                            </select>
                          </div>
                        </div>

                      </div> <!-- form-row mt-2 -->

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="Addition informaton" rows="3"></textarea>
                      </div>
                      <div class="form-row mt-2">
                        <div class="col">
                          <div class="form-group">
                               <div class="btn btn-defaults btn-file">
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" name="uploadcv[]" id="upload-cv" multiple>
                                </div>
                                <span>Upload your CV Here</span><br>
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
                               <div class="btn btn-defaults btn-file">
                                   <i class="fa fa-paperclip"></i> Attachment
                                   <input type="file" name="uploadcertificates[]" id="upload-certificates"multiple>
                               </div>
                               <span>Other Testmonials</span>
                               <small class="help-block">(e.g Certificates, etc...) </small><br>
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
                    <button type="button" id="submit-cv" class="btn btn-primary text-center">Submit CV</button>
                </div><!-- card-footer -->
               </form>
            </div><!-- card end-->

          </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->
<script type="text/javascript">
    $('.progress-hidex').hide();
    $('.progress-hidec').hide();
</script>
<?php } 

if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id= $_POST['user_id'];
    $job_id= $_POST['job_id'];
    $business_id= $_POST['business_id'];
    $datetime= date('Y-m-d H-i-s');

    $uploadcv= $_FILES['uploadcv'];
    $uploadcertificates= $_FILES['uploadcertificates'];

    $firstname = $users->test_input($_POST['firstname']);
    $middlename = $users->test_input($_POST['middlename']);
    $lastname = $users->test_input($_POST['lastname']);
    $email = $users->test_input($_POST['email']);
    $address = $users->test_input($_POST['address']);
    $telephone = $users->test_input($_POST['telephone']);
    $degree = $users->test_input($_POST['degree']);
    $field = $users->test_input($_POST['field']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    // $deadline = $users->test_input($_POST['deadline']);


	if (!empty($telephone) || !empty(array_filter($uploadcv['name'])) || !empty(array_filter($uploadcertificates['name'])) ) {
		if (!empty($uploadcv['name'][0])) {
			# code...
			$uploadcv_ = $home->uploadJobsFile($uploadcv);
			$uploadcertificates_ = $home->uploadJobsFile($uploadcertificates);
		}

		if (strlen($additioninformation ) > 400) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('apply_job',array( 
	'firstname0'=> $firstname, 
	'middlename0'=> $middlename, 
	'lastname0'=> $lastname,
	'email0'=> $email, 
	'address0'=> $address,
  'telephone'=> $telephone, 
  'degree' => $degree,
  'field' => $field,
	'uploadfilecv'=> $uploadcv_, 
	'uploadfilecertificates'=> $uploadcertificates_, 
  'addition_information'=> $additioninformation,
  'user_id0'=> $user_id,
  'job_id0'=> $job_id,
  'business_id0'=> $business_id,
  'created_on0'=> $datetime ));

    // 'deadline'=> $deadline,
    }
} ?> 