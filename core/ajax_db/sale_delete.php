<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['available']) && !empty($_POST['available'])) {
    $user_ids= $_SESSION['key'];
	$sale_id= $_POST['sale_id'];
	$user_id= $_POST['user_id'];
    $available= $_POST['available'];
    $discount_change= $_POST['discount_change'];
	$discount_price= $_POST['discount_price'];
	$price= $_POST['price'];
	$banner= $_POST['banner'];
    $sale->update_sale($banner,$available,$discount_change,$discount_price,$price,$sale_id);
}

if (isset($_POST['deleteTweetHome']) && !empty($_POST['deleteTweetHome'])) {
    $user_id= $_SESSION['key'];
	$sale_id= $_POST['deleteTweetHome'];
    $sale->deleteLikesSale($sale_id,$user_id);
}

if (isset($_POST['showpopupdelete']) && !empty($_POST['showpopupdelete'])) {
    $user_id= $_SESSION['key'];
	$sale_id= $_POST['showpopupdelete'];
	$car_user_id= $_POST['deleteEvents'];
    $cars=$sale->sale_getPopupTweet($user_id,$sale_id,$car_user_id);
    ?>
    <div class="sale-popup">
      <div class="wrap5">
        <div class="post-popup-body-wrap" style="top: 15%;">
            <div class="card">
            <span id='responseDeletePost'></span>
                <div class="card-header">
                    <span class="closeDelete"><button class="close-retweet-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
                    <h5 class="text-center text-muted">Are you sure you want to delete this Posts?</h5>
                </div>
                <div class="card-body">

                <div class="shadow-lg">
                    <div class="user-block border-bottom">
                     <div class="user-blockImgBorder">
                            <div class="user-blockImg">
                                     <?php if (!empty($cars['profile_img'])) {?>
                                     <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $cars['profile_img'] ;?>" alt="User Image">
                                     <?php  }else{ ?>
                                       <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                     <?php } ?>
                               </div>
                            </div>
                        <span class="username">
                            <a style="float:left;padding-right:3px;" href="<?php echo PROFILE ;?>"><?php echo $cars['firstname']." ".$cars['lastname'] ;?></a>
                            <!-- //Jonathan Burke Jr. -->
                            <span class="description">Shared publicly - <?php echo $users->timeAgo($cars['created_on01']); ?></span>
                        </span>
                        <span class="description"></span>
                    </div> <!-- user-block -->

                      <div class="card">
                            <div class="card-img-top img-fuild" style="background: url('<?php echo BASE_URL_PUBLIC."uploads/sale/".$cars["photo"]; ?>')no-repeat center center;background-size:cover;width: 250px;height:178px">
                                <?php $banner = $cars['banner'];
                                      switch ($banner) {
                                          case $banner == 'new':
                                              # code...
                                              echo '<img style="margin-left: -20px;" src="'.BASE_URL_LINK.'image/banner/new.png"  width="252px" height="178px"  >';
                                              break;
                                          case $banner == 'great_deal':
                                              # code...
                                              echo '<img style="margin-right: -10px;" src="'.BASE_URL_LINK.'image/banner/great-deal.png"  width="252px" height="178px" >';
                                              break;
                                          case $banner == 'new_arrival':
                                              # code...
                                              echo '<img style="margin-right: -10px;" src="'.BASE_URL_LINK.'image/banner/new-arrival.png"  width="252px" height="178px" >';
                                              break;
                                         default:
                                                # code...
                                                echo '';
                                                break;  
                                      } ?>
                                </div>
                              <div class="card-body">
                                  <div class="card-title"><?php echo $cars["title"]; ?>
                                    <?php if($cars['discount'] != 0){ ?>
                                          <span class="float-right text-danger"><?php echo $cars["discount"]; ?>%</span>
                                     <?php } ?>
                                  </div> <!-- product-title -->

                                  <div class="card-text product-price d-inline-block"> 
                                    <?php if($cars['price_discount'] != 0){ ?><span class="text-danger " style="text-decoration: line-through;"><?php echo number_format($cars['price_discount']); ?> Frw</span> <?php } ?> 
                                   <div> <?php echo "$".number_format($cars["price"]); ?> </div>
                                  </div>
                                   <form method="post" id="form-cartitem<?php echo $cars['code']; ?>add" class="float-right">
                                      <div class="cart-action">
                                          <input type="hidden" style="width:30px;" name="action" value="add" />
                                          <input type="hidden" style="width:30px;" name="code" value="<?php echo $cars['code']; ?>" />
                                          <input type="text" class="product-quantity" style="width:30px;" name="quantity" value="1" size="2" readonly/>
                                          <input type="button" onclick="cart_add('add','<?php echo 'form-cartitem'.$cars['code'].'add'; ?>','<?php echo $cars['code']; ?>');" value="Add to Cart" class="btnAddAction" />
                                      </div>
                                  </form>
                              </div><!-- card-body -->
                          </div><!-- card -->
                      
                </div><!-- shadow -->

                </div><!-- card-body -->
                <div class="card-footer"><!-- card-footer -->
                <button class="delete-it-sale  btn btn-primary btn-md float-right ml-3" type="submit">Delete</button>
                <button class="cancel-it btn btn-info btn-md  float-right">Cancel</button>
                </div><!-- card-footer -->
            </div><!-- card end -->
       </div> <!-- recar-popup-body-wrap -->
     </div><!-- wrp5 -->
  </div><!-- recar-popup -->

<?php
}

if(!empty($_FILES['form']['name'])){

    $id= $_POST['sale_id'];
    $files = $_FILES['form'];
    $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/sale/';
    // $fileName = time().'_'.basename($_FILES['form']['name']);
    $fileNames= basename($files['name']);
    $fileExt = explode('.', $fileNames);
    $fileActualExt = strtolower(end($fileExt));

    $fileName = (strlen($fileNames) > 10)? 
    strtolower(rand(100,1000).substr($fileNames,0,4).".".$fileActualExt):
    strtolower(rand(100,1000).$fileNames);
   	$fileTmpName = $files['tmp_name'];
    $targetPath = $uploadDir.$fileName;
    // $path="image\users_profile_cover";
    // chdir($path);
    // $targetPath = getcwd().DIRECTORY_SEPARATOR.$fileName;
    // FILES TO DELETE ON ITS DESTINATIONS
    move_uploaded_file($_FILES['form']['tmp_name'], $targetPath);
        // FILES TO DELETE ON ITS DESTINATIONS
        $query= $db->query("SELECT photo FROM sale WHERE sale_id= $id ");
        $rows= $query->fetch_assoc();
        $files= $uploadDir.$rows['photo'];
        // $files= getcwd().DIRECTORY_SEPARATOR.$rows['profile_img'];
        $filename = 'defaultprofileimage.png';
         if (file_exists($files) == true && $filename == $rows['photo']) { 
              link($files);
            //   echo "<script>alert('file was uploaded')</script>";
            }else{
                unlink($files);
                // echo "<script>alert('file deleted')</script>";
         }
        $update = $db->query("UPDATE sale SET photo = '{$fileName}' WHERE sale_id = $id");
        
        //Update status
        if($update){
            $result = $id ;
            // $result = 2;
        }
        
    //  var_dump($update);
    //  var_dump($_FILES['form']);
    //Load JavaScript function to show the upload status
    $path= $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/sale/'.$fileName.'';
    $strpos_countsTo = strpos($path, 'uploads/sale/'.$fileName.'');
    $path_replace= substr_replace($path,'', 0,$strpos_countsTo);
    echo '<script type="text/javascript">window.top.window.sale_upload(' . $result . ',\'' .$path_replace. '\');</script>  ';
}
?>