<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Hotel extends Home{

    public function hotelReadmore($hotel_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN rwandahotel R ON R. user_id_ = u. user_id WHERE R. hotel_id = '$hotel_id' ");
        $row= $query->fetch_array();
        return $row;
    }

    public function hotelList($pages,$categories)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*6)-6;
        }

        $mysqli= $this->database;
        if($categories == 'featured'){
            $query= $mysqli->query("SELECT * FROM rwandahotel ORDER BY rand() Limit $showpages,6");
        }else{
            $query= $mysqli->query("SELECT * FROM rwandahotel WHERE location_province= '{$categories}' ORDER BY rand() Limit $showpages,6");
        }
        ?>
            <div class="card">
                <div class="card-header">

                   <div class="row">
                     <div class="col-md-4">
                        <div>What is your budget ? </div>
                        <small>Price Per night</small>
                     </div>
                     <div class="col-md-4">
                         <h5  class="text-center">Rwanda Hotels </h5>
                          <div class="filter-panel mt-4">
                              <p><input type="hidden" id="price" class="price_range" value="0,500" /></p>
                              <!-- <input type="button" onclick="filterProducts()" value="FILTER" /> -->
                          </div>
                     </div>
                     <div class="col-md-4">
                        <form class="form-inline float-right  mb-2" style="position:relative;right:0px;top:0px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                            </div>
                            <input type="text" class="form-control searchHotel"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                        </div>
                    </form>

                       <div class="dropdown float-right">
                         <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                               MOST POPULAR
                             </button>
                         <div class="dropdown-menu" aria-labelledby="triggerId">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item disabled" href="#">Disabled action</a>
                           <h6 class="dropdown-header">Section header</h6>
                           <a class="dropdown-item" href="#">Action</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">After divider action</a>
                         </div>
                       </div>

                       <div class="float-right h4 mr-2">Sort By </div> 
                     </div>
                   </div>
                 <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                    <nav class="nav d-flex justify-content-between pb-0"  >
                        <a class="p-2" href="javascript:void(0)" onclick="hotelCategories('featured',1);" >All Hotel<span class="badge badge-primary"><?php echo $this->hotelcountPOSTS('featured');?></span></a>
                        <a class="p-2" href="javascript:void(0)" onclick="hotelCategories('kigali city',1);" >kigali city<span class="badge badge-primary"><?php echo $this->hotelcountPOSTS('kigali city');?></span></a>
                        <a class="p-2" href="javascript:void(0)" onclick="hotelCategories('Northern province',1);" >Northern province<span class="badge badge-primary"><?php echo $this->hotelcountPOSTS('Northern province');?></span></a>
                        <a class="p-2" href="javascript:void(0)" onclick="hotelCategories('East province',1);" >East province<span class="badge badge-primary"><?php echo $this->hotelcountPOSTS('East province');?></span></a>
                        <a class="p-2" href="javascript:void(0)" onclick="hotelCategories('West province',1);" >West province<span class="badge badge-primary"><?php echo $this->hotelcountPOSTS('West province');?></span></a>
                        <a class="p-2" href="javascript:void(0)" onclick="hotelCategories('Southern province',1);" >Southern province<span class="badge badge-primary"><?php echo $this->hotelcountPOSTS('Southern province');?></span></a>
                    </nav>
                </div> <!-- nav-scroller -->
                </div>
                <div class="card-body">
                <span class="hotel-show"></span>
                  <div id="productContainer">
                  <table class="table table-hover table-inverse">
                      <!-- <thead class="thead-inverse">
                          <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                          </thead> -->
                          <tbody>
               <?php while($row= $query->fetch_array()) { ?>
                <!-- <td style="background: url('<?php echo BASE_URL_PUBLIC.'uploads/Rwandahotel/'.$row['photo_'] ;?>')no-repeat center center;background-size:cover;height:100px;width:100px;position:relative"></td>
                <td>
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
                </td>
                <td>
                    <h5 class="mt-4 text-success text-right mb-0"> US<i class="fa fa-usd" aria-hidden="true"></i> <?php echo $row['price']; ?></h5>
                    <div class="text-muted text-right mt-0">Per night</div> 
                </td>
                <td>
                     <h5 class="mt-4 text-muted "> Good <span class="badge badge-primary"><?php echo $row['ranges']; ?></span></h5>
                </td>
                <td>
                     <button type="button" name="" id="" class="btn btn-primary btn-md btn-block mt-4"><i class="fa fa-check" aria-hidden="true"></i> Book Now</button>
                </td>
            </tr> -->
       
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

               <?php } ?>
 </tbody>
</table>
                    </div><!-- productContainer -->
                  </div><!-- card-body -->
              </div>
          </div>
        </div> 
        <?php
         if($categories == 'featured'){
            $query1= $mysqli->query("SELECT COUNT(*) FROM rwandahotel ");
        }else{
            $query1= $mysqli->query("SELECT COUNT(*) FROM rwandahotel WHERE location_province= '{$categories}' ");
        }

        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/6;
        $post_Perpage = ceil($post_Perpages); 

        if($post_Perpage > 1){ ?>
         <nav>
             <ul class="pagination justify-content-center mt-3">
                 <?php if ($pages > 1) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="hotelCategories('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
                 <?php } ?>
                 <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                         if ($i == $pages) { ?>
                      <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="hotelCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                      <?php }else{ ?>
                     <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="hotelCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php } } ?>
                 <?php if ($pages+1 <= $post_Perpage) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="hotelCategories('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
                 <?php } ?>
             </ul>
         </nav>
        <?php } ?>

   <?php }

       public function hotelcountPOSTS($categories)
    {
        $mysqli =$this->database;
          if($categories == 'featured'){
            $sql= $mysqli->query("SELECT COUNT(*) FROM rwandahotel ");
        }else{
            $sql= $mysqli->query("SELECT COUNT(*) FROM rwandahotel WHERE location_province= '{$categories}' ");
        }
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }
}

$hotel = new Hotel();
?>
