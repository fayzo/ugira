<?php 
// FOR PRIVATE
include('../private/core/init.php');

// FOR PUBLIC
include('core/init.php');
$max = 400*1024;
$message ="";

?>
<?php include "header_nav_footer/header.php"?>

<?php include "header_nav_footer/navbar.php"?>

<div class="container-fluid">
       <div class="mb-3 text-center">
          <a href="<?php echo BASE_URL_PUBLIC ;?>indexx.php" class="btn btn-primary"  role="button" style="float:left;"><<< Back</a>
          <h4 class="display-4 ">Add Post</h4>
       </div>
        <!-- <div class="well" style="margin:auto; padding:auto; width:auto;"> -->
       <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
         <div class="d-flex flex-column  row-hl mb-3 ">
          <?php 
          if (isset($_GET['btn_search'])) {
                  $search= $_GET['search'];
                  $sql = $mysqli->query("SELECT * FROM addpost WHERE title LIKE '%$search%' OR
                  date LIKE '%$search%' OR textarea LIKE '%$search%'");
          }else{
              $getID= $_GET['id'];
          	  $sql = $conn->query("SELECT * FROM addpost WHERE post_id= $getID");
              while($row = $sql->fetch_array()) {
                  $title= $row['title'];
                  $image= $row['image'];
                  $textarea= $row['textarea'];
                  $date= $row['date'];
                  ?>

                 <div class="card bg-dark text-white item-hl mb-3 " style='width:auto;height:auto;' >
                    <div class="card-header">
                        My Card <?php echo $title;?>
                    </div>
                    <img class="px-1 rounded" src="<?php echo BASE_URL_LINK ;?>image/uploads_posts/<?php echo $image;?>">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text"><?php echo $textarea;?></p>
                     </div>
                     <div class="card-footer text-muted">
                       Last updated <?php echo $date;?>
                     </div>
                 </div>
                <?php }
                }
                ?>
                
            <?php
              $getID= $_GET['id'];
          	  $query = $mysqli->query("SELECT * FROM comment WHERE post_comment= $getID AND approved='on'");
              while($row = $query->fetch_array()) {
                  $title= $row['title'];
                  $image= $row['image'];
                  $textarea= $row['textarea'];
                  $date= $row['date'];
              ?>
              <h3>Comments :</h3>
              <div class="thumbnail bg-primary">
                <div class="media ">
                  <img class="d-flex mr-3" src="<?php echo BASE_URL_LINK_PUBLIC ;?>image/img/image4.jpg">
                  <div class="media-body">
                      <h5><?php echo $title;?></h5>
                             <?php echo $textarea;?><br>
                             Last updated: <?php echo $date;?>
                         <div class="media mt-3">
                             <a class="d-flex pr-3" href="#">
                                 <img src="<?php echo BASE_URL_LINK_PUBLIC ;?>image/img/image4.jpg">
                             </a>
                             <div class="media-body">
                                 <h5 class="mt-0">Media heading</h5>
                                 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                             </div>
                         </div>
                  </div>
                </div>
              </div>
             <?php } ?>

           <h3 class="mt-3">Share your Thoughts about This Post </h3>
            <form class="needs-validation" novalidate id="form"  method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <input type="hidden" name="RowID" id="RowID" value="<?php echo $_GET['id'] ;?>">
                  <input type="hidden" name="approved" id="approved" value="off">
                  <label for="firstName">Title</label>
                  <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  <label for="lastName">Athors</label>
                  <input type="text" name="athors" class="form-control" id="athors" placeholder="Athors" value="" required>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                <label for="username">Text</label>
                <textarea class="form-control" name="textarea" id="textarea" rows="3"></textarea>
                  <div class="invalid-feedback" style="width: 100%;">
                    Your Text is required.
                  </div>
                  <label for="email">Email <span class="text-muted">(Optional)</span></label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@ </span>
                      </div>
                     <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
                       <div class="invalid-feedback">
                         Please enter a valid email address for shipping updates.
                       </div>
                  </div>
                    <?php
                    date_default_timezone_set("Africa/Kigali");
                    $currentTimes = time();
                    $dateTimes = strftime("%A,%b-%d-%Y %Hh:%Mmin:%Ssec %p",$currentTimes);
                   //  echo $dateTimes;
                   // type="datetime-local"
                    ?>
                  <label for="Date-Time">Date-Time</label>
                  <input type="type" class="form-control" name="date" id="date" value="<?php echo $dateTimes; ?>" readonly>
                    <div class="invalid-feedback">
                      Please enter your Date-Time.
                    </div>
                  <label for="address2">Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Apartment or suite">
                   <label for="country">Country</label>
                   <select class="custom-select d-block w-100" name="country" id="country" required>
                     <option value="">Choose...</option>
                     <option>Rwanda</option>
                     <option>Burundi</option>
                     <option>Tanzania</option>
                     <option>Uganda</option>
                   </select>
                   <div class="invalid-feedback">
                     Please select a valid country.
                   </div>
                    <label for="state">State</label>
                    <select class="custom-select d-block w-100" name="state" id="state" required>
                      <option value="">Choose...</option>
                      <option>Kigali</option>
                      <option>Bujumbura</option>
                      <option>Dar-Salam</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                   </div>       
                     	<div id="preview"><img src="<?php echo BASE_URL_LINK ;?>image/file_log/filed.png" width="100px"/></div><br>
                      <label for="file">File input :</label><?php echo " ".$message ; ?><br>
                      <input type="hidden" name="MAX_FILE_SIZE" value ="<?php echo $max;?>">
                        <input id="uploadImage" type="file" accept="image/*" name="image" />
                      <small id="fileHelp" class="form-text text-muted">Max 3mb size</small>
              </div>
               <input type="submit" id="manager" value="submit" class="btn btn-success">
            </form>

          </div>
        </div>
      </div>
</div>
<?php include "header_nav_footer/footer.php"?>