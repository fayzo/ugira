<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['sale_view']) && !empty($_POST['sale_view'])) {
    $user_id= $_SESSION['key'];
     ?>

<div class="sale-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="card">
                <span id="responseSubmitsale"></span>
                <div class="card-header">
                    <h5 class="card-text">Sale</h5>
                    <p class="card-text">Do you want to sale a products ? Please fill details below.</p>
                </div>
                <form method="post" id="form-sale"  enctype="multipart/form-data" >
                <div class="card-body">
                    <div>Choose your location and categories </div>
                      <input type="hidden" name="user_id" value="<?php echo $user_id ;?>">
                      <div class="form-row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="city" id="city" placeholder="City">
                        </div>
                      </div>
                      <div class="form-row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="province" id="province" placeholder="Province">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="districts" id="districts" placeholder="districts">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="sector" id="sector" placeholder="sector">
                        </div>
                      </div>
                      <div class="form-row mt-2">
                        <div class="col">
                          <input type="text" class="form-control" name="cell" id="cell" placeholder="cell">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" name="village" id="village" placeholder="village">
                        </div>

                        <div class="col">
                            <div class="form-group">
                              <select class="form-control" name="categories_sale" id="categories_sale">
                                <option value="">Select what types of sale</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothes">Clothes</option>
                                <option value="sports">Sports</option>
                                <option value="health_beauty">Health & beauty</option>
                                <option value="house">House</option>
                                <option value="car">car</option>
                                <option value="home_garden">Home & Garden</option>
                              </select>
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
                                <span class="input-group-text" id="basic-addon2">name</span>
                            </div>
                            <input type="text" class="form-control" name="title" id="title" placeholder="name of products Example Samsung v8">
                          </div>
                        </div>

                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">code</span>
                            </div>
                            <input type="text" class="form-control" name="code" id="code" placeholder="code of products Example nokia x94">
                          </div>
                        </div>
                      </div>

                      <div class="form-row mt-2">

                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Frw</span>
                            </div>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price ">
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
      $video_ = $home->uploadSaleFile($video);
      $youtube=  $users->test_input($_POST['youtube']);
    }else{
      $video_= "";
      $youtube=  "";
    }

    $title = $users->test_input($_POST['title']);
    $code = $users->test_input($_POST['code']);
    $price = $users->test_input($_POST['price']);
    $phone = $users->test_input($_POST['phone']);
    $country = $users->test_input($_POST['country']);
    $city = $users->test_input($_POST['city']);
    $province = $users->test_input($_POST['province']);
    $districts = $users->test_input($_POST['districts']);
    $cell = $users->test_input($_POST['cell']);
    $sector = $users->test_input($_POST['sector']);
    $village = $users->test_input($_POST['village']);
    $additioninformation = $users->test_input($_POST['additioninformation']);
    $categories_sale=  $users->test_input($_POST['categories_sale']);


	if (!empty($phone) || !empty(array_filter($photo['name'])) || !empty(array_filter($other_photo['name'])) ) {
		if (!empty($photo['name'][0])) {
			# code...
			$photo_ = $home->uploadSaleFile($photo);
            $other_photo_ = $home->uploadSaleFile($other_photo);
		}

		if (strlen($additioninformation ) > 400) {
			exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>The text is too long !!!</strong> </div>');
		}

	$users->Postsjobscreates('sale',array( 
	'title'=> $title,
	'code'=> $code,
	'price'=> $price,
	'phone'=> $phone,
	'country01'=> $country,
	'city'=> $city,
	'province'=> $province,
	'districts'=> $districts,
	'sector'=> $sector,
	'cell'=> $cell,
	'village'=> $village,
	'photo'=> $photo_, 
	'other_photo'=> $other_photo_, 
	'video'=> $video_, 
	'youtube'=> $youtube, 
    'text'=> $additioninformation,
    'categories_sale'=> $categories_sale,
    'user_id01'=> $user_id,
    'created_on01'=> $datetime ));

    }
} ?> 