<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['employers']) && !empty($_POST['employers'])) {
    $user_id= $_SESSION['key'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   
     ?>
<script src="<?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script>

<div class="employers-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmit-Employers"></span>
                <div class="card-header">
                    <h5 class="card-text">Request domestics heplers </h5>
                    <p class="card-text">Add Request ? Please fill details below.</p>
                </div>
                <form method="post" id="form_domestics_jobs"  enctype="multipart/form-data" >
                <div class="card-body">
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row">
                        
                        <div class="col">
                          <div class="form-group">
                            <label for="">Family type</label>
                            <select class="form-control" name="family_type" id="family_type">
                              <option value="">Select family type</option>
                              <option value="African family">African family</option>
                              <option value="Western family">Western family</option>
                              <option value="Northern family">Northern family</option>
                              <option value="Eastern family">Eastern family</option>
                            </select>
                          </div>
                        </div>

                        <div class="col">
                        <div class="form-group">
                          <label for="">Status type</label>
                          <select class="form-control" name="status_type" id="status_type">
                            <option value="">Select status type</option>
                            <option value="single">single</option>
                            <option value="couple">couple</option>
                          </select>
                        </div>
                        </div>

                        <div class="col">
                          <label for="Country">your Country</label>
                            <!-- <div id="myCountry"></div> -->
                            <div id="myDiv"></div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label for="">Looking For</label>
                            <select class="form-control" name="looking_for" id="looking_for">
                              <option value="">Select what you looking_for</option>
                              <option value="domestics helper">domestics</option>
                              <option value="driver">driver</option>
                              <option value="gate man">gate man</option>
                            </select>
                          </div>
                        </div>

                       

                      </div>

                      <div class="form-row">
                          <div class="col">
                               <div style="text-decoration:underline;">
                                where are you live now we will not share you last location cell,village it will be visible
                              </div>
                          </div>
                      </div>

                      <div class="form-row">
                       <div class="col">
                                <label for="" class="text-dark">Province</label>
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
                                <label for="" class="text-dark"> District</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control districtcode" name="districtcode" id="districtcode" onchange="showResult2();" >
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <label for="Sector" class="text-dark">Sector</label>
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
                                <label for="Cell" class="text-dark">Cell</label>
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

                      <div class="form-row mt-2">

                              <div class="col">
                                  <div class="form-group">
                                  <label for=""> language</label>
                                    <select multiple class="form-control" name="language_speak[]" id="language_speak">
                                      <option value="">Select language may know</option>
                                      <option value="kinyarwanda">kinyarwanda</option>
                                      <option value="kiswahili">kiswahili</option>
                                      <option value="French">French</option>
                                      <option value="kirundi">kirundi</option>
                                      <option value="English">English</option>
                                    </select>
                                  </div>
                              </div>

                             <div class="col">
                               <label for=""> required skills</label>
                                <div class="form-group">
                                  <select multiple class="form-control" name="required_skills[]" id="required_skills">
                                    <option value="">Select maximum 3 required skills </option>
                                    <option value="cooking">cooking</option>
                                    <option value="Housekeeping">Housekeeping</option>
                                    <option value="Pet care">Pet care</option>
                                    <option value="Baby care">Baby care</option>
                                    <option value="gate man">gate man</option>
                                  </select>
                                </div>
                            </div>

                             <div class="col">
                             <label for="Salary & accomodation">Salary</label>
                                <div class="form-group">
                                  <select multiple class="form-control" name="salary_accomodation[]" id="salary_accomodation">
                                    <option value="">Salary & accomodation </option>
                                    <option value="Monthly Salary to be discussed"> Monthly Salary to be discussed</option>
                                    <option value="Accomodation Private room">Accomodation Private room</option>
                                    <option value="Day off To be discussed">Day off To be discussed</option>
                                    <option value="Working Status any Sitution">Working Status any Sitution</option>
                                  </select>
                                </div>
                            </div>

                             <div class="col">
                             <label for="Cooking skills">Cooking skills</label>
                                <div class="form-group">
                                  <select multiple class="form-control" name="cooking_skills[]" id="cooking_skills">
                                    <option value="">Select maximum 3 Cooking skills </option>
                                    <option value="African foods">African foods</option>
                                    <option value="Western foods">Western foods</option>
                                    <option value="Northern foods">Northern foods</option>
                                    <option value="Bread">Bread</option>
                                    <option value="Sambusa">Sambusa</option>
                                    <option value="Madazi">Madazi</option>
                                  </select>
                                </div>
                            </div>

                             <div class="col">
                               <label for="Main duties">Main duties</label>
                                <div class="form-group">
                                  <select multiple class="form-control" name="main_duties[]" id="main_duties">
                                    <option value="">Select maximum 3 Main duties </option>
                                    <option value="African foods">Baby care</option>
                                    <option value="Western foods">Child care</option>
                                    <option value="Northern foods">Groceries</option>
                                    <option value="Bread">Housekeeping</option>
                                    <option value="Sambusa">Sambusa</option>
                                    <option value="Madazi">Madazi</option>
                                  </select>
                                </div>
                            </div>

                             <div class="col">
                               <label for="other skills">other skills</label>
                                <div class="form-group">
                                  <select multiple class="form-control" name="other_skills[]" id="other_skills">
                                    <option value="">Select maximum 2 other skills </option>
                                    <option value="Pet care">Pet care</option>
                                    <option value="Car wash">Car wash</option>
                                    <option value="Housework">Housework</option>
                                  </select>
                                </div>
                            </div>

                      </div>

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us who are you and what help you need and Try to summarize People can understand what helps you need" rows="3"></textarea>
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
<?php } 

if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id= $_POST['user_id'];
    $datetime= date('Y-m-d H-i-s');

    $family_type = $db->real_escape_string($_POST['family_type']);
    $status_type = $db->real_escape_string($_POST['status_type']);
    $country = $db->real_escape_string($_POST['country']);
    $looking_for = $db->real_escape_string($_POST['looking_for']);
    $province = $db->real_escape_string($_POST['provincecode']);
    $districts = $db->real_escape_string($_POST['districtcode']);
    $sector = $db->real_escape_string($_POST['sectorcode']);
    $cell = $db->real_escape_string($_POST['codecell']);
    $village = $db->real_escape_string($_POST['CodeVillage']);
    $additioninformation = $db->real_escape_string($_POST['additioninformation']);
    
    $language_speak1 = [];
    $language_speak1 = $_POST['language_speak'];
    $required_skills1 = [];
    $required_skills1 = $_POST['required_skills'];
    $salary_accomodation1 = [];
    $salary_accomodation1 = $_POST['salary_accomodation'];
    $cooking_skills1 = [];
    $cooking_skills1 = $_POST['cooking_skills'];
    $main_duties1 = [];
    $main_duties1 = $_POST['main_duties'];
    $other_skills1 = [];
    $other_skills1 = $_POST['other_skills'];

    $required_skills = implode("=", $required_skills1);
    $salary_accomodation = implode("=", $salary_accomodation1);
    $cooking_skills = implode("=", $cooking_skills1);
    $main_duties = implode("=", $main_duties1);
    $other_skills = implode("=", $other_skills1);
    $language_speak = implode("=", $language_speak1);

	if (!empty($family_type) ) {

		if (strlen($additioninformation ) > 800) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('domestics_employers_jobs',array( 
      'family_type' => $family_type,
      'status_type' => $status_type,
      'country' => $country,
      'looking_for' => $looking_for,
      'language_speak' => $language_speak,
      'province' => $province,
      'districts' => $districts,
      'sector' => $sector,
      'cell' => $cell,
      'village' => $village,
      'required_skills' => $required_skills,
      'salary_accomodation' => $salary_accomodation,
      'cooking_skills' => $cooking_skills,
      'main_duties' => $main_duties,
      'other_skills' => $other_skills,
      'additioninformation' => $additioninformation ,
      'created_on2' => $datetime ,
      'user_id2' => $user_id 

      ));

    }
} ?> 