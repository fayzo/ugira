<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if(isset($_POST['price_range'])){
    
    //Include database configuration file
    
    //set conditions for filter by price range
    $whereSQL = $orderSQL = '';
    $priceRange = $_POST['price_range'];
    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $whereSQL = "WHERE price BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'";
        $orderSQL = " ORDER BY price ASC ";
    }else{
        $orderSQL = " ORDER BY created DESC ";
    }
    
    //get product rows
    $query = $db->query("SELECT * FROM rwandahotel $whereSQL $orderSQL");
    
    if($query->num_rows > 0){
        echo "<h4 style='padding: 0px 10px;text-align:center;'>FROM <span style='color:red;'> $priceRangeArr[0] US$ </span> TO <span style='color:red;'> $priceRangeArr[1] US$</span> </h4> ";

        while($row = $query->fetch_assoc()){
    ?>

             <div class="row">

                    <div class="col-md-6">
                       <div class="card flex-md-row h-md-100 border-0 mb-3">
                              <img class="card-img-left flex-auto d-none d-lg-block" height="80px" width="80px" src="<?php echo BASE_URL_PUBLIC.'uploads/Rwandahotel/'.$row['photo_']; ?>" alt="Card image cap">
                          <div class="card-body d-flex flex-column align-items-start pt-0">
                              <h5 class="text-primary mb-0">
                              <a class="text-primary" href="javascript:void(0)"  id="hotel-readmore" data-hotel="<?php echo $row['hotel_id']; ?>"><?php echo $row['title_']; ?></a>
                              </h5>
                              <div class="text-warning"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                              <div class="text-left text-muted mb-1"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['location_districts'].' districts/'.$row['location_Sector'].' sector'; ?></div>
                              <div class='d-inline text-muted'>
                                <i class="fa fa-utensils"></i> 
                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                <i class="fa fa-cocktail    "></i>
                                <i class="fa fa-glass-martini    "></i>
                                <i class="fa fa-shower" aria-hidden="true"></i>
                                <i class="fa fa-bath    "></i>
                                <i class="fa fa-spa    "></i>
                                <i class="fa fa-swimmer    "></i>
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <i class="fa fa-wifi" aria-hidden="true"></i>
                              </div>

                          </div><!-- card-body -->
                      </div><!-- card -->
                    </div>

                     <div class="col-md-2">
                          <h5 class="mt-4 text-success text-right mb-0"> US<i class="fa fa-usd" aria-hidden="true"></i> <?php echo $row['price']; ?></h5>
                          <div class="text-muted text-right mt-0">Per night</div> 
                      </div>
                      <div class="col-md-2 text-center">
                           <h5 class="mt-4 text-muted "> Good <span class="badge badge-primary"><?php echo $row['ranges']; ?></span></h5>
                      </div>
                      <div class="col-md-2">
                      <button type="button" name="" id="" class="btn btn-primary btn-md btn-block mt-4"><i class="fa fa-check" aria-hidden="true"></i> Book Now</button>
                      </div>
                    <hr class="bg-info mt-0 mb-1 " style="width:95%;">
                </div><!-- row -->
    <?php }
    }else{
        echo 'Hotel(s) not found';
        // echo 'Product(s) not found';
    }
}


if (isset($_POST['search']) && !empty($_POST['search'])) {
    $user_id= $_SESSION['key'];
    $search= $users->test_input($_POST['search']);
    $result= $home->searchHotel($search);
    echo '<h4 style="padding: 0px 10px;">'.$_POST['search'].'</h4> ';

     if (is_array($result) || is_object($result)){

     foreach ($result as $row) { ?>

          
                <div class="row">

                    <div class="col-md-6">
                       <div class="card flex-md-row h-md-100 border-0 mb-3">
                              <img class="card-img-left flex-auto d-none d-lg-block" height="80px" width="80px" src="<?php echo BASE_URL_PUBLIC.'uploads/Rwandahotel/'.$row['photo_']; ?>" alt="Card image cap">
                          <div class="card-body d-flex flex-column align-items-start pt-0">
                              <h5 class="text-primary mb-0">
                              <a class="text-primary" href="javascript:void(0)"  id="hotel-readmore" data-hotel="<?php echo $row['hotel_id']; ?>"><?php echo $row['title_']; ?></a>
                              </h5>
                              <div class="text-warning"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                              <div class="text-left text-muted mb-1"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['location_districts'].' districts/'.$row['location_Sector'].' sector'; ?></div>
                              <div class='d-inline text-muted'>
                                <i class="fa fa-utensils"></i> 
                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                <i class="fa fa-cocktail    "></i>
                                <i class="fa fa-glass-martini    "></i>
                                <i class="fa fa-shower" aria-hidden="true"></i>
                                <i class="fa fa-bath    "></i>
                                <i class="fa fa-spa    "></i>
                                <i class="fa fa-swimmer    "></i>
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <i class="fa fa-wifi" aria-hidden="true"></i>
                              </div>

                          </div><!-- card-body -->
                      </div><!-- card -->
                    </div>

                     <div class="col-md-2">
                          <h5 class="mt-4 text-success text-right mb-0"> US<i class="fa fa-usd" aria-hidden="true"></i> <?php echo $row['price']; ?></h5>
                          <div class="text-muted text-right mt-0">Per night</div> 
                      </div>
                      <div class="col-md-2 text-center">
                           <h5 class="mt-4 text-muted "> Good <span class="badge badge-primary"><?php echo $row['ranges']; ?></span></h5>
                      </div>
                      <div class="col-md-2">
                      <button type="button" name="" id="" class="btn btn-primary btn-md btn-block mt-4"><i class="fa fa-check" aria-hidden="true"></i> Book Now</button>
                      </div>
                    <hr class="bg-info mt-0 mb-1 " style="width:95%;">
                </div><!-- row -->
        <?php } 
        }
} 
?>