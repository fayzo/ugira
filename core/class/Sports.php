<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Sports extends Home{

    public function sportsReadmore($blog_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id WHERE B. blog_id = '$blog_id' ");
        $row= $query->fetch_array();
        return $row;
    }

    public function sportscarousel($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN sports S ON S. user_id3 = u. user_id WHERE S. categories_sports ='$categories'  ORDER BY created_on3 Desc Limit 1,3");
        $query1= $mysqli->query("SELECT * FROM users U Left JOIN sports S ON S. user_id3 = u. user_id WHERE S. categories_sports ='$categories'  ORDER BY created_on3 Desc Limit 0,1");
        $countRow= $mysqli->query("SELECT categories_sports FROM sports WHERE categories_sports ='$categories'  ORDER BY created_on3 Desc Limit 0,4");
        $row1= $query1->fetch_array()
        ?>

        <div id="slider4" class="carousel slide mb-5" data-ride="carousel">
          <ol class="carousel-indicators">
            <li class="active" data-target="#slider4" data-slide-to="0"></li>
            <?php  for($i=2;$i <= $countRow->num_rows ; ++$i) {  ?>
               <li data-target="#slider4" data-slide-to="<?php echo $i; ?>"></li>
            <?php } ?>

          </ol>

          <div class="carousel-inner" role="listbox">

             <div class="carousel-item active">
                   <img class="d-block" width="100%" height="400px" src="<?php echo BASE_URL_PUBLIC.'uploads/sports/'.$row1['photo'] ;?>">
                    <div class="container">
                       <div class="carousel-caption text-left">
                         <h1 class="display-4 font-italic" style="font-family: Playfair Display, Georgia, Times New Roman, serif;"><a href="javascript:void(0)" id="sports-readmore" data-sports="<?php echo $row1['sports_id'];?> "> <?php echo  $row1['title']; ?></a></h1>
                         <div class="text-muted">Created on <?php echo $this->timeAgo($row1['created_on3']) ;?> By <?php echo $row1['authors'] ;?> </div>
                         <div class="text-dark lead my-1">
                          <?php 
                             if (strlen($row1["text"]) > 184) {
                              echo $row1["text"] = substr($row1["text"],0,184).'... <br><span class="mb-0"><a href="javascript:void(0)" id="sports-readmore" data-sports="'.$row1['sports_id'].'" class="text-muted font-weight-bold">Continue reading...</a></span>';
                            }else{
                              echo $row1["text"];
                            } ?> 
                         </div>
                       </div>
                     </div>
                </div>

           <?php while($row= $query->fetch_array()) {  ?>

                <div class="carousel-item">
                   <img class="d-block" width="100%" height="400px" src="<?php echo BASE_URL_PUBLIC.'uploads/sports/'.$row['photo'] ;?>">
                    <div class="container">
                       <div class="carousel-caption text-left">
                         <h1 class="display-4 font-italic" style="font-family: Playfair Display, Georgia, Times New Roman, serif;"><a style="color: #c3bebe;" class="text-white" href="javascript:void(0)" id="sports-readmore" data-sports="<?php echo $row['sports_id']; ?>"> <?php echo  $row['title']; ?></a></h1>
                         <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
                         <p class="lead my-3">
                          <?php 
                             if (strlen($row["text"]) > 184) {
                              echo $row["text"] = substr($row["text"],0,184).'... <br><span class="mb-0"><a href="javascript:void(0)" id="sports-readmore" data-sports="'.$row1['sports_id'].'" class="text-white font-weight-bold">Continue reading...</a></span>';
                            }else{
                              echo $row["text"];
                            } ?> 
                         </p>
                       </div>
                     </div>
                </div>
    
            <?php } ?>
          </div>

          <a href="#slider4" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>

          <a href="#slider4" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

<?php }

    public function SportsRecent_Articles($pages,$categories)
    {
         $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*8)-8;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN sports S ON S. user_id3 = u. user_id WHERE S. categories_sports ='$categories' and created_on3  > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_on3 Desc , rand() Limit $showpages,8");
            //  SECOND	, MINUTE, HOUR, DAY, WEEK	, MONTH	, QUARTER	, YEAR,
        if($query->num_rows != 0){
        ?>
       <div class="card">
        <div class="card-header main-active">
          <h5>Recent Articles</h5>
        </div>
        <div class="card-body px-2">
            <div class="row">
        <?php while($row= $query->fetch_array()) {  ?>

              <div class="col-md-12 mb-2">
                <div class="card flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="100px" width="100px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/sports/<?php echo $row['photo'] ;?>" alt="Card image cap">
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="sports-readmore" data-sports="<?php echo $row['sports_id']; ?> "> <?php echo  $row['title']; ?></a>
                    </h5>
                    <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
                    <p class="card-text mb-1">
                         <?php 
                             if (strlen($row["text"]) > 200) {
                              echo $row["text"] = substr($row["text"],0,200).'... <span class="mb-0"><a href="javascript:void(0)" id="sports-readmore" data-sports="'.$row['sports_id'].'" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                            }else{
                              echo $row["text"];
                            } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
              </div> <!-- col -->

           <?php } ?>
         </div> <!-- row -->
        </div> <!-- card-body -->
      </div> <!-- card -->
    <?php 
        $query1= $mysqli->query("SELECT COUNT(*) FROM users U Left JOIN sports S  ON S. user_id3 = u. user_id WHERE S. categories_sports ='$categories'  ORDER BY created_on3 Desc ");
        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/8;
        $post_Perpage = ceil($post_Perpages); ?>

    <?php if($post_Perpage > 1){ ?>
    <nav>
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="sports_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="sports_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="sports_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="sports_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

        <?php } }
    }
}

$sports = new Sports();
