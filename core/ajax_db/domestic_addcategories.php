<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));
$user= $home->userData($_SESSION['key']);

if (isset($_POST['helper_family']) && !empty($_POST['helper_family'])) {
    $user_id= $_SESSION['key'];
     ?>

 <div class="card">
        <div class="card-header text-center">
          <button type="button" class="btn btn-primary btn-sm  float-left " id="domestics" data-domestics="domestics" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5><i>What are you looking for ?</i> </h5>
        </div>
        <div class="card-body">

            <div class="card ">
                <div class="card-header">
                  <h5><i> <i class="fa fa-check" aria-hidden="true"></i> i'm looking for a domestic helper</h5>
                </div> <!-- /.card-header -->

                <div class="card-body">
                    
                    <div class="form-group">
                        <script src="<?php echo BASE_URL_LINK ;?>dist/js/country.js"></script>
                    <label for="address" class="text-muted">Your country</label>
                    <div id="myCountry"></div>

                      <label for="address" class="text-muted mt-1 mb-0">Your current address</label>
                       <small id="helpId" class="form-text text-muted mt-0">City/sector or street number/</small>
                        <div class="input-group">
                            <input type="text" class="form-control" name="full_address" id="full_address" aria-describedby="helpId" placeholder="full address">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <small id="helpId" class="form-text text-muted">We do not disclose your address to any third parties.</small>
                    </div>

                    <div class="text-center">
                        <input type="button" class="btn btn-primary btn-block TermsCondition" value="Next">
                    </div>
                </div><!-- /.card-body -->
            </div>

      </div> <!-- card-body -->
    </div>
<?php } 

if (isset($_POST['job_helper']) && !empty($_POST['job_helper'])) {
    $user_id= $_SESSION['key'];
     ?>
     <div class="card">
        <div class="card-header text-center">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="domestics" data-domestics="domestics" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5><i>What are you looking for ?</i> </h5>
        </div>
        <div class="card-body">

            <div class="card">
                <div class="card-header">
                  <h5><i> <i class="fa fa-check" aria-hidden="true"></i> i'm looking for a job </h5>
                </div> <!-- /.card-header -->

                <div class="card-body">
                    <p>Type</p>
                    <h5> <i class="fa fa-check" aria-hidden="true"></i> Domestic Helper</h5>
                    <div class="form-group">
                      <label for="address" class="text-muted">Your current address</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="full_address" id="full_address" aria-describedby="helpId" placeholder="full address">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <small id="helpId" class="form-text text-muted">We do not disclose your address to any third parties.</small>
                    </div>
                    <div class="text-center">
                        <input type="button" class="btn btn-primary btn-block TermsConditions" value="Next">
                    </div>


                </div><!-- /.card-body -->
            </div>

        </div> <!-- card-body -->
    </div>

<?php }

if (isset($_POST['TermsCondition']) && !empty($_POST['TermsCondition'])) {
    ?>
    <div class="tweet-show-popup-wrap">
    <input type="checkbox" id="tweet-show-popup-wrap">
    <div class="wrap4">
        <label for="tweet-show-popup-wrap">
            <div class="tweet-show-popup-box-cut">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </label>
        <div class="tweet-show-popup-box">

        <div class="card">
            <div class="card-header">
                <h5>Terms and conditions </h5>
            </div>
            <div class="card-body">
                <h5>this is for rwandan and internation migrant living in rwanda only</h5>
                <h5>Please don't waste your time to fill it in the next chapter if your not mention above</h5>
            
                <input type="button" class="btn btn-primary btn-block float-left mt-5 loginTermsCondition" value="Next">
            
            </div>
        </div>

        </div>
    </div>
    </div>

<?php }

if (isset($_POST['TermsCondition0']) && !empty($_POST['TermsCondition0'])) {
    ?>
    <div class="tweet-show-popup-wrap">
    <input type="checkbox" id="tweet-show-popup-wrap">
    <div class="wrap4">
        <label for="tweet-show-popup-wrap">
            <div class="tweet-show-popup-box-cut">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </label>
        <div class="tweet-show-popup-box">

        <div class="card">
            <div class="card-header">
                <h5>Terms and conditions </h5>
            </div>
            <div class="card-body">
                <h5>this is for rwandan and internation migrant living in rwanda only</h5>
                <h5>Please don't waste your time to fill it in the next chapter if your not mention above</h5>
            
                <input type="button" class="btn btn-primary btn-block float-left mt-5 loginTermsCondition0" value="Next">
            
            </div>
        </div>

        </div>
    </div>
    </div>

<?php }

 if (isset($_POST['key']) && $_POST['key'] == 'domesticslogin') {
    $conn = $db;
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $datetime= date('Y-m-d H-i-s');

    $users->domesticslogin($username,$email,$password,$datetime);

  } 

 if (isset($_POST['key']) && $_POST['key'] == 'employerslogin') {
    $conn = $db;
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $datetime= date('Y-m-d H-i-s');

    $users->employersdomesticslogin($username,$email,$password,$datetime);

  } 
 
if (isset($_POST['loginTerms']) && !empty($_POST['loginTerms'])) {
  ?>
    <div class="tweet-show-popup-wrap">
    <input type="checkbox" id="tweet-show-popup-wrap">
    <div class="wrap4">
        <label for="tweet-show-popup-wrap">
            <div class="tweet-show-popup-box-cut">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </label>
        <div class="tweet-show-popup-box" style="margin: 80px auto;">

        <div class="card">
          <div class="card-body">

          <form class="form-signin">
            <h1 class="h3 mb-3  text-center font-weight-normal">Please sign in As Employers</h1>
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Username</label>
              <input type="text" id="Username" class="form-control mb-3" placeholder="Username" >
            </div>

              <label for="inputEmail" class="sr-only">Email address</label>
              <input class="form-control mb-3"
               placeholder="<?php 
                    if (strlen($user["email"]) > 5) {
                      echo substr($user["email"],0,5).'****@******.com';
                    }else{
                      echo $user["email"];
                    } ?> " readonly>
              <input type="hidden" id="inputEmail" class="form-control mb-3"
                value="<?php echo $user["email"];?> ">

              <label for="inputPassword" class="sr-only">Password</label>
              <input type="text" id="inputPassword" class="form-control mb-3" placeholder="Password" >

            <button class="btn btn-lg btn-primary btn-block mb-3" onclick="employersLogin('employerslogin');" type="button">Sign in</button> or
            <button class="btn btn-lg btn-primary btn-sm mb-1" id="helper-family" type="button">Sign up</button> 
            <div class=" text-center h4" id='response'></div>
            <p class="mt-5 mb-3  text-center  text-muted"><?php echo $users->copyright(2018); ?></p>
          </form>

           </div>
           </div>

        </div>
    </div>
    </div>

<?php }

if (isset($_POST['loginTerms0']) && !empty($_POST['loginTerms0'])) {
  ?>
    <div class="tweet-show-popup-wrap">
    <input type="checkbox" id="tweet-show-popup-wrap">
    <div class="wrap4">
        <label for="tweet-show-popup-wrap">
            <div class="tweet-show-popup-box-cut">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </label>
        <div class="tweet-show-popup-box"  style="margin: 80px auto;">

        <div class="card">
          <div class="card-body">

          <form class="form-signin">
            <h1 class="h3 mb-3 text-center font-weight-normal">Please sign in As Domestics Helpers</h1>
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Username</label>
              <input type="text" id="Username" class="form-control mb-3" placeholder="Username" >
            </div>

              <label for="inputEmail" class="sr-only">Email address</label>
               <input class="form-control mb-3"
               placeholder="<?php 
                    if (strlen($user["email"]) > 5) {
                      echo substr($user["email"],0,5).'****@******.com';
                    }else{
                      echo $user["email"];
                    } ?> " readonly>

              <input type="hidden" id="inputEmail" class="form-control mb-3"
                value="<?php echo $user["email"];?> ">

              <label for="inputPassword" class="sr-only">Password</label>
              <input type="text" id="inputPassword" class="form-control mb-3" placeholder="Password" >

            <button class="btn btn-lg btn-primary btn-block mb-3" onclick="domesticsLogin('domesticslogin');" type="button">Sign in</button> or
            <button class="btn btn-lg btn-primary btn-sm mb-1" id="job-helper" type="button">Sign up</button> 
            <div class=" text-center h4" id='response'></div>
            <p class="mt-5 mb-3  text-center  text-muted"><?php echo $users->copyright(2018); ?></p>
          </form>

           </div>
           </div>

        </div>
    </div>
    </div>

<?php }

if (isset($_POST['loginTermsCondition']) && !empty($_POST['loginTermsCondition'])) {
    $user_id= $_SESSION['key'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   

     ?>
     <div class="card">
     <span id="responseSubmitdomestics"></span>
        <div class="card-header text-center">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="domestics" data-domestics="domestics" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5><i>Sign up for Employers  ?</i> </h5>
        </div>
            <script src="<?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script>
           <script>
                  $('input[type="checkbox"]').on('change', function() {
                    $('input[type="checkbox"]').not(this).prop('checked', false).attr('id','').attr('name','');
                    $(this).prop('checked', true).attr('id','photo').attr('name','photo');
                  });
            </script>
         <form method="post" id="form-domestics" name="form-domestics" enctype="multipart/form-data">

                <div class="card-body">
                    <div>Choose your location and categories </div>
                      <input type="hidden" name="user_id0" value="<?php echo $user_id ;?>">
                      <div class="form-row mt-2">

                       <div class="col">
                                <label for=""> country</label>
                           <input type="text" class="form-control" name="country" value="rwanda" id="country" placeholder="rwanda" readonly>
                       </div>

                        <!-- <div class="col">
                            <div id="myProvince"></div>
                        </div>
                        <div class="col">
                            <div id="myDistricts"></div>
                        </div>
                      </div>

                      <div class="form-row mt-2">
                        <div class="col">
                            <div id="mySectors"></div>
                        </div> -->
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
                      <div class="form-row mt-2">

                            <div class="col">
                                <label for="Sector" >Sector</label>
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
                                <label for="Cell" >Cell</label>
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

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us is products in good shape is it original or not and add more details and Try to summarize People can understand what products you try to sale" rows="3"></textarea>
                      </div>

                      <label for="">you may change your information  or not this will be use to login in domestics helpers only </label>
                      <div class="form-row mt-2">
                        
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Firstname</span>
                            </div>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user['firstname']; ?>" placeholder="name of products Example Samsung v8">
                          </div>
                        </div>
                        
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Lastname</span>
                            </div>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>" id="lastname" placeholder="name of lastname">
                          </div>
                        </div>
                      
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;" class="fa fa-phone   "></i></span>
                            </div>
                            <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" id="phone" placeholder="phone number">
                          </div>
                        </div>

                      </div>

                      <div class="form-row mt-2">
                      
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Username</span>
                            </div>
                            <input type="text" class="form-control" name="username"  value="<?php echo $user['username']; ?>" id="username" placeholder="username">
                          </div>
                        </div>

                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">@</span>
                            </div>
                            <input type="text" class="form-control" name="email"  value="<?php echo $user['email']; ?>" id="email" placeholder="email">
                          </div>
                        </div>

                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;"  class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" value="<?php echo $user['password']; ?>"  id="password" placeholder="password">
                          </div>
                        </div>

                      </div>

                      
                      <div class="form-row mt-2">
                          
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;"  class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control" name="cpassword"   id="cpassword" placeholder="Confirmation of password">
                          </div>
                        </div>

                          <div class="col">
                              <div class="form-group">
                                <select class="form-control" name="status" id="status">
                                  <option value="">Choose your status</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                </select>
                              </div>
                          </div>

                          
                        <div class="col">
                              <div class="form-group">
                                <select class="form-control" name="gender" id="gender">
                                <?php if (!empty($user['gender'])) { ?>
                                  <option value="<?php echo $user['gender']; ?>"><?php echo $user['gender']; ?></option>
                                <?php }else{ ?>
                                  <option value="">Choose your status</option>
                                <?php } ?>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                          </div>
                     
                      </div>

<div id="accordianId" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="section1HeaderId">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
          Select one picture that describe you
        </a>
      </h5>
    </div>
    <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
      <div class="card-body">
        
                    <div class="form-row mt-2 mb-3 mr-2">
                            <div class="col">

                                <div class="form-check">
                                    <?php for ($i=1; $i < 27; $i++) { ?>
                                        <label class="form-check-label">
                                                <input class="form-check-input ml-1" type="checkbox" name="photo" id="photo" value="<?php echo $i?>.png"> <img src="<?php echo BASE_URL_PUBLIC.'uploads/domesticsEmployers/'.$i.'.png'; ?>" class="mt-3" width="100px" height="100px" style="border: #bf4170 1px solid;">
                                            </label>
                                    <?php } ?>
                                </div>

                             </div>
                    </div>
      </div>
    </div>
  </div>
</div>

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <button type="button" id="submit-sale" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
                </div><!-- card-footer -->
               </form>
    </div>
<script type="text/javascript">
    $('.progress-hidex').hide();
    $('.progress-hidec').hide();
    $('.progress-hidez').hide();
</script>
<?php } 

if (isset($_POST['loginTermsCondition0']) && !empty($_POST['loginTermsCondition0'])) {
    $user_id= $_SESSION['key'];
    $get_province = mysqli_query($db,"SELECT * FROM provinces");   

     ?>
     <div class="card">
     <span id="responseSubmitdomestics"></span>
        <div class="card-header text-center">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="domestics" data-domestics="domestics" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5><i>Sign up for Domestics Helpers ?</i> </h5>
        </div>

        <script src="<?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script>
        <script type="text/javascript">

        function ValidateForm(frm) {
            if (frm.email.value == "") { alert('Email address is required.'); frm.email.focus(); return false; }
            if (frm.email.value.indexOf("@") < 1 || frm.email.value.indexOf(".") < 1) { alert('Please enter a valid email address.'); frm.email.focus(); return false; }
            if (frm.Cpassiword.value === frm.passiword.value) { alert('Position is required.'); frm.Cposition.focus(); return false; }
            if (frm.phone.value == "") { alert('Phone is required.'); frm.phone.focus(); return false; }
            return true; 
        }
        </script>
         <form method="post" id="form-domesticss"  enctype="multipart/form-data" >
                <div class="card-body">
                    <div>Choose your location and categories </div>
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row mt-2">

                       <div class="col">
                          <label for=""> country</label>
                           <input type="text" class="form-control" name="country" value="rwanda" id="country" placeholder="rwanda" readonly>
                       </div>

                        <!-- <div class="col">
                            <div id="myProvince"></div>
                        </div>
                        <div class="col">
                            <div id="myDistricts"></div>
                        </div> -->
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
                      <div class="form-row mt-2">

                            <div class="col">
                                <label for="Sector" >Sector</label>
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
                                <label for="Cell" >Cell</label>
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

                      <!-- <div class="form-row mt-2">
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

                      </div> -->

                      <div class="form-group mt-2">
                        <textarea class="form-control" name="additioninformation" id="addition-information" placeholder="tell us is products in good shape is it original or not and add more details and Try to summarize People can understand what products you try to sale" rows="3"></textarea>
                      </div>

                      <label for="">you may change your information  or not this will be use to login in domestics helpers only </label>
                      <div class="form-row mt-2">
                        
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Firstname</span>
                            </div>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user['firstname']; ?>" placeholder="name of products Example Samsung v8">
                          </div>
                        </div>
                        
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Lastname</span>
                            </div>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>" id="lastname" placeholder="name of lastname">
                          </div>
                        </div>
 
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;" class="fa fa-phone   "></i></span>
                            </div>
                            <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" id="phone" placeholder="phone number">
                          </div>
                        </div>
                      </div>

                      <div class="form-row mt-2">
                      
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Username</span>
                            </div>
                            <input type="text" class="form-control" name="username"  value="<?php echo $user['username']; ?>" id="username" placeholder="username">
                          </div>
                        </div>

                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">@</span>
                            </div>
                            <input type="text" class="form-control" name="email"  value="<?php echo $user['email']; ?>" id="email" placeholder="email">
                          </div>
                        </div>

                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;"  class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" value="<?php echo $user['password']; ?>"  id="password" placeholder="password">
                          </div>
                        </div>

                      </div>

                      
                      <div class="form-row mt-2">

                       <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i style="font-size:20px;"  class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input type="password" class="form-control" name="cpassword"  id="cpassword" placeholder="password">
                          </div>
                        </div>
                          
                          <div class="col">
                              <div class="form-group">
                                <select class="form-control" name="status" id="status">
                                  <option value="">Choose your status</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                </select>
                              </div>
                          </div>

                          
                        <div class="col">
                              <div class="form-group">
                                <select class="form-control" name="gender" id="gender">
                                <?php if (!empty($user['gender'])) { ?>
                                  <option value="<?php echo $user['gender']; ?>"><?php echo $user['gender']; ?></option>
                                <?php }else{ ?>
                                  <option value="">Choose your status</option>
                                <?php } ?>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
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
                        <!-- <div class="col">
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
                        </div> -->
                      </div>
                      <!-- <span onclick="fundAddmoreVideo()" id="add-more" class="btn btn-primary btn-md ">+ add more</span>

                    <div id="add-videohelp">
                      
                    </div> -->
                    <!-- collapse addmore-->

                 </div><!-- card-body end-->
                <div class="card-footer text-center">
                    <button type="button" id="submit-sale" class="btn btn-primary btn-lg btn-block text-center">Submit</button>
                </div><!-- card-footer -->
               </form>
    </div>
<script type="text/javascript">
    $('.progress-hidex').hide();
    $('.progress-hidec').hide();
    $('.progress-hidez').hide();
</script>
<?php } 

if (isset($_POST['domestics']) && !empty($_POST['domestics'])) {
    echo $domestics->domesticshelpers();
 } 

 if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id= $_POST['user_id'];
    $datetime= date('Y-m-d H-i-s');

    $photo= $_FILES['photo'];
    // $other_photo= $_FILES['otherphoto'];

    $firstname = $users->test_input($_POST['firstname']);
    $lastname = $users->test_input($_POST['lastname']);
    $phone = $users->test_input($_POST['phone']);
    $country = $users->test_input($_POST['country']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $gender=  $users->test_input($_POST['gender']);
    $status=  $users->test_input($_POST['status']);
    $password=  $users->test_input($_POST['password']);
    $cpassword=  $users->test_input($_POST['cpassword']);
    $email=  $users->test_input($_POST['email']);
    $username=  $users->test_input($_POST['username']);
    $location_province =  $users->test_input($_POST['provincecode']);
    $location_districts =  $users->test_input($_POST['districtcode']);
    $location_Sector =  $users->test_input($_POST['sectorcode']);
    $location_cell =  $users->test_input($_POST['codecell']);
    $location_village =  $users->test_input($_POST['CodeVillage']);
    // $location_province=  $users->test_input($_POST['location_province']);
    // $location_districts=  $users->test_input($_POST['location_districts']);
    // $location_Sector=  $users->test_input($_POST['location_sectors']);
    // $location_cell=  $users->test_input($_POST['location_cell']);
    // $location_village=  $users->test_input($_POST['location_village']);

if ($password === $cpassword) {
	// if (!empty($phone) || !empty(array_filter($photo['name'])) || !empty(array_filter($other_photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploaddomesticsFile($photo);
      // $other_photo_ = $home->uploaddomesticsFile($other_photo);
		}

		if (strlen($additioninformation ) > 400) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('domestics',array( 
    'firstname_'=> $firstname,
    'lastname_'=> $lastname,
    'phone_'=> $phone,
    'country_'=> $country,
    'photo_'=> $photo_,
    // 'other_photo_'=> $other_photo_, 
    'text_'=> $additioninformation,
    'gender'=> $gender,
    'cpassword'=> $cpassword, 
    'password'=> $password, 
    'text_'=> $additioninformation,
    'gender'=> $gender,
    'status'=> $status,
    'email'=> $email,
    'username'=> $username,
    'location_province'=> $location_province,
    'location_districts'=> $location_districts,
    'location_Sector'=> $location_Sector,
    'location_cell'=> $location_cell,
    'location_village'=> $location_village,
    'user_id_'=> $user_id,
    'created_on_'=> $datetime ));

  }else{
        exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>Passwords do not match..!!!</strong> </div>');
    }
} 


if (isset($_POST['user_id0']) && !empty($_POST['user_id0'])) {
    $user_id= $_POST['user_id0'];
    $datetime= date('Y-m-d H-i-s');

    $firstname = $users->test_input($_POST['firstname']);
    $lastname = $users->test_input($_POST['lastname']);
    $phone = $users->test_input($_POST['phone']);
    $country = $users->test_input($_POST['country']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $gender=  $users->test_input($_POST['gender']);
    $status=  $users->test_input($_POST['status']);
    $password=  $users->test_input($_POST['password']);
    $cpassword=  $users->test_input($_POST['cpassword']);
    $email=  $users->test_input($_POST['email']);
    $username=  $users->test_input($_POST['username']);
    $photo= $users->test_input($_POST['photo']);
    
    $location_province =  $users->test_input($_POST['provincecode']);
    $location_districts =  $users->test_input($_POST['districtcode']);
    $location_Sector =  $users->test_input($_POST['sectorcode']);
    $location_cell =  $users->test_input($_POST['codecell']);
    $location_village =  $users->test_input($_POST['CodeVillage']);

    // $location_province=  $users->test_input($_POST['location_province']);
    // $location_districts=  $users->test_input($_POST['location_districts']);
    // $location_Sector=  $users->test_input($_POST['location_sectors']);
    // $location_cell=  $users->test_input($_POST['location_cell']);
    // $location_village=  $users->test_input($_POST['location_village']);


	if ($password === $cpassword) {

		if (strlen($additioninformation ) > 400) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
    }

    $users->Postsjobscreates('employersdomestics',array( 
    'firstname_'=> $firstname,
    'lastname_'=> $lastname,
    'phone_'=> $phone,
    'country_'=> $country,
    'photo_'=> $photo,
    'cpassword'=> $cpassword, 
    'password'=> $password, 
    'text_'=> $additioninformation,
    'gender'=> $gender,
    'status'=> $status,
    'email'=> $email,
    'username'=> $username,
    'location_province'=> $location_province,
    'location_districts'=> $location_districts,
    'location_Sector'=> $location_Sector,
    'location_cell'=> $location_cell,
    'location_village'=> $location_village,
    'user_id_'=> $user_id,
    'created_on_'=> $datetime ));

    }else{
        exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>Passwords do not match..!!!</strong> </div>');
    }
}
?> 