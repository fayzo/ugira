<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Movies extends Home{

    public function moviesList($categories)
    {
        $mysqli= $this->database;
         $query= $mysqli->query("SELECT * FROM movies WHERE latest_movies ='$categories'  ORDER BY created_on3 Desc Limit 0,8 ");
        ?>
          <div class="row">
        <?php while($row= $query->fetch_array()){ ?>
                      
                <div class="col-md-3 mb-2">
                  <div class="card more" id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> ">
                    <img class="card-img" src="<?php echo BASE_URL_PUBLIC."uploads/movies/".$row['photo'] ;?>" width="103px" height="152px" >
                    <div class="card-footer bg-white py-0  text-center">
                      <div style="border-bottom: 1px #d6cccc solid;" class="text-primary"><?php echo $row['title_movies'] ;?></div>
                      <div style="font-size:9px"><i class="fa fa-eye" aria-hidden="true"></i> 30 000 000 </div>
                    </div><!-- card-footer -->
                  </div><!-- card -->
                </div> <!-- col -->
         <?php   } ?>
         </div> <!-- row -->

    <?php }

    public function moviesViewMoreList($pages,$categories)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*16)-16;
        }
        $mysqli= $this->database;
         $query= $mysqli->query("SELECT * FROM movies WHERE latest_movies ='$categories'  ORDER BY created_on3 Desc Limit $showpages,16 ");
        ?>
        <div class="card">
          <div class="card-header py-1 main-active">
             <h5 class="text-center" ><i> Watch Movies Online Free</i></h5>
          </div>
          <div class="card-body">
          <div class="row">
        <?php while($row= $query->fetch_array()){ ?>
                      
                <div class="col-md-3 mb-2">
                  <div class="card more" id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> ">
                    <img class="card-img" src="<?php echo BASE_URL_PUBLIC."uploads/movies/".$row['photo'] ;?>" width="103px" height="152px" >
                    <div class="card-footer bg-white py-0  text-center">
                      <div style="border-bottom: 1px #d6cccc solid;" class="text-primary"><?php echo $row['title_movies'] ;?></div>
                      <div style="font-size:9px"><i class="fa fa-eye" aria-hidden="true"></i> 30 000 000 </div>
                    </div><!-- card-footer -->
                  </div><!-- card -->
                </div> <!-- col -->
         <?php   } 

        $query1= $mysqli->query("SELECT COUNT(*) FROM movies WHERE latest_movies ='$categories'  ORDER BY created_on3 Desc ");
        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/16;
        $post_Perpage = ceil($post_Perpages); ?>

           </div> <!-- row -->
          </div><!-- card-body -->
        </div><!-- card -->

        <?php if($post_Perpage > 1){ ?>
         <nav>
             <ul class="pagination justify-content-center mt-3">
                 <?php if ($pages > 1) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
                 <?php } ?>
                 <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                         if ($i == $pages) { ?>
                      <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                      <?php }else{ ?>
                     <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php } } ?>
                 <?php if ($pages+1 <= $post_Perpage) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
                 <?php } ?>
             </ul>
         </nav>
     
        <?php }

    }

    public function moviesCategoriesList($pages,$categories)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*16)-16;
        }
        $mysqli= $this->database;
         $query= $mysqli->query("SELECT * FROM movies WHERE categories_movies ='$categories'  ORDER BY created_on3 Desc Limit $showpages,16 ");
        ?>
        <div class="card">
          <div class="card-header py-1 main-active">
             <h5 class="text-center" ><i> Watch Action Movies Online Free</i></h5>
          </div>
          <div class="card-body">
          <div class="row">
        <?php while($row= $query->fetch_array()){ ?>
                      
                <div class="col-md-3 mb-2">
                  <div class="card more" id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> ">
                    <img class="card-img" src="<?php echo BASE_URL_PUBLIC."uploads/movies/".$row['photo'] ;?>" width="103px" height="152px" >
                    <div class="card-footer bg-white py-0  text-center">
                      <div style="border-bottom: 1px #d6cccc solid;" class="text-primary"><?php echo $row['title_movies'] ;?></div>
                      <div style="font-size:9px"><i class="fa fa-eye" aria-hidden="true"></i> 30 000 000 </div>
                    </div><!-- card-footer -->
                  </div><!-- card -->
                </div> <!-- col -->
         <?php   } 

        $query1= $mysqli->query("SELECT COUNT(*) FROM movies WHERE categories_movies ='$categories'  ORDER BY created_on3 Desc ");
        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/16;
        $post_Perpage = ceil($post_Perpages); ?>

         </div> <!-- row -->
        </div><!-- card-body -->
        </div><!-- card -->

        <?php if($post_Perpage > 1){ ?>
         <nav>
             <ul class="pagination justify-content-center mt-3">
                 <?php if ($pages > 1) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
                 <?php } ?>
                 <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                         if ($i == $pages) { ?>
                      <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                      <?php }else{ ?>
                     <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php } } ?>
                 <?php if ($pages+1 <= $post_Perpage) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="movies_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
                 <?php } ?>
             </ul>
         </nav>
     
        <?php } ?>

    <?php }

      public function moviesMayLike()
    { 
      $mysqli= $this->database;
      $query= $mysqli->query("SELECT * FROM movies WHERE  title_movies = title_movies  ORDER BY created_on3 Asc Limit 0,20 ");
      ?>
        <ul class="list-group mb-5 " style="list-style-type: none;">
        <a class="list-group-item list-group-item-action text-center py-1 main-active" href="javascript:void(0)"><h5><i> You May Also Liked</i></h5></a>
        <?php while($row= $query->fetch_array()){ ?>

    
       <li class="movies-dropdown" >
        <ul><li>
         <a class="list-group-item list-group-item-action" href="javascript:void(0)"  id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> "> <?php echo $row['title_movies']; ?></a>
              <ul><li>
                <?php echo $this->moviesDropdown($row['movies_id']); ?>
              </li></ul>
          </li></ul>
        </li>

        <?php } ?>

        </ul><!-- LIST GROUP WITH LINKS -->
    <?php }

      public function moviesMayLike0()
    { 
      $mysqli= $this->database;
      $query= $mysqli->query("SELECT * FROM movies WHERE  title_movies = title_movies  ORDER BY created_on3 Asc Limit 0,20 ");
      ?>
        <ul class="list-group mb-5 " style="list-style-type: none;">
        <a class="list-group-item list-group-item-action text-center py-1 main-active" href="javascript:void(0)"><h5><i> You May Also Liked</i></h5></a>
        <?php while($row= $query->fetch_array()){ ?>

    
       <li class="movies-dropdown0" >
        <ul><li>
         <a class="list-group-item list-group-item-action" href="javascript:void(0)"  id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> "> <?php echo $row['title_movies']; ?></a>
              <ul><li>
                <?php echo $this->moviesDropdown($row['movies_id']); ?>
              </li></ul>
          </li></ul>
        </li>

        <?php } ?>

        </ul><!-- LIST GROUP WITH LINKS -->
    <?php }

      public function moviesDropdown($movies_id)
    { 
      $mysqli= $this->database;
      $query= $mysqli->query("SELECT * FROM movies WHERE  movies_id = '{$movies_id}' ");
      $row = $query->fetch_assoc();
      ?>
         <div  class="row" style="width:205px;">
            <div class="col-md-12">

              <div class="card more" id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> ">
                <img class="card-img" src="<?php echo BASE_URL_PUBLIC."uploads/movies/".$row['photo'] ;?>" width="203px" height="252px" >
                <div class="card-footer bg-white py-0  text-center">
                  <div style="border-bottom: 1px #d6cccc solid;" class="text-primary"><?php echo $row['title_movies'] ;?></div>
                  <div style="font-size:9px"><i class="fa fa-eye" aria-hidden="true"></i> 30 000 000 </div>
                </div><!-- card-footer -->
              </div><!-- card -->

            </div> <!-- col -->
        </div> <!-- row -->

  <?php  }

      public function moviesWatchVideo($movies_id)
    {
         $mysqli= $this->database;
         $query= $mysqli->query("SELECT * FROM movies WHERE movies_id= $movies_id ");
         $row= $query->fetch_array();
         $query0= $mysqli->query("SELECT * FROM movies WHERE categories_movies= 'Action' ");
        ?>
       <div class="card">
       <div class="card-body">
       <div class="row">
        <div class="col-md-9">

       <div class="card">
        <div class="card-header">
         <h2 style="color:green;"><i> <?php echo $row['title_movies'] ;?></i></h2>
        </div>
        <div class="card-body">

           <div class="row">

            <div class="col-md-4 mb-2">
              <div class="card">
                <img class="card-img" src="<?php echo BASE_URL_PUBLIC."uploads/movies/".$row['photo'] ;?>" width="165px" height="230px"  >
              </div><!-- card -->
            </div> <!-- col -->

            <div class="col-md-8 mb-2">
               <div class="h5">Director: <?php echo $row['director']; ?></div>
               <div class="h5">Actors: <?php echo $row['actors']; ?></div>
               <div class="h5">Genres: <?php echo $row['categories_movies']; ?></div>
               <div class="h5">Country: <?php echo $row['country']; ?></div>
               <div class="h5">Releases Year: <?php echo $row['date_release']; ?></div>
               <div class="h5">Duration: <?php echo $row['duration']; ?> </div>
               <div class="h5">About Movies: <?php echo $row['additioninformation']; ?></div>
            </div> <!-- col -->
         </div> <!-- row -->

         </div> <!-- card-body -->
           <div class="card-footer">
             <h5 style="color:green;"><i>YOU ARE WATCHING: </i><?php echo $row['title_movies'] ;?></h5>

             <?php 
              $expodefile = explode("=",$row['video']);
              $fileActualExt= array();
              for ($i=0; $i < count($expodefile); ++$i) { 
                  $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
              }
              $allower_ext = array('gif','mp4'); // valid extensions
             
             if(array_diff($fileActualExt,$allower_ext) == false) { ?>
                      <div class="mb-2" >
                           <video controls preload="metadata" width="545px" height="300px" preload="none">
                               <source src="<?php echo BASE_URL_PUBLIC."uploads/movies/2019_50vlc-.mp4" ;?>" type="video/mp4"> 
                              <!-- fallback content here 
                              poster="< ?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>"
                              object-fit="contain"
                             object-fit= fill
                             object-fit= none
                             object-fit= cover
                             preload=none 
                             preload=metadata
                              -->
                           </video>
                      </div><!-- div -->
             <?php } ?>

              <div class="mt-4 text-center" >
                 <div style="color:green;" class="h5">The video Keeps buffering ? Just Wait it for 5-10 minutes then continue playing  </div>
              </div><!-- div -->

           </div> <!-- card-footer -->
         </div> <!-- card -->
         </div><!-- col -->

         <div class="col-md-3 mb-2">
           <?php echo $this->moviesMayLike0(); ?>
         </div><!-- col -->

         <div class="col-md-12 d-none d-md-block">

            <div class="frame" id="cycleitems">
               <ul class="clearfix">
                <?php 
                    while ($row0= $query0->fetch_array()) { ?>
                            <li style="width:165px;">
                               <img  src="<?php echo BASE_URL_PUBLIC."uploads/movies/".$row0['photo'] ;?>" id="movies_watchvideo" data-movies="<?php echo $row0['movies_id'];?> " alt="Card image cap">
                         		</li>
                 <?php } ?>
                 </ul>
                </div>
                <!-- <div class="controls text-center mt-3">
                     <span class="prev" id="prev1"><i class="fa fa-chevron-left"></i></span>
                     <div class="btn-group">
                       <button class="btn pause"><i class="fa fa-pause"></i> pause</button>
                       <button class="btn resume"><i class="fa fa-play"></i> resume</button>
                       <button class="btn toggle"><i class="fa fa-pause"></i> toggle</button>
                     </div>
                     <span class="next" id="next1"><i class="fa fa-chevron-right"></i> </span>
                </div> -->

            </div><!-- frame -->
               <script src="<?php echo BASE_URL_LINK ;?>dist/js/sly_scroll/sly.min.js"></script>
               <script src="<?php echo BASE_URL_LINK ;?>dist/js/sly_scroll/jquery.easing.min.js"></script>
               <script src="<?php echo BASE_URL_LINK ;?>dist/js/sly_scroll/image_scroll.js"></script>
           </div><!-- col -->

          </div><!-- row -->
         </div><!-- card-body -->
        </div><!-- card -->

    <?php }

    public function mostwatchesMovies()
    { 
      $mysqli= $this->database;
      $query= $mysqli->query("SELECT * FROM movies WHERE  title_movies = title_movies  ORDER BY created_on3 Asc Limit 0,10 ");
      ?>
        <ul class="list-group mb-5 " style="list-style-type: none;">
        <a class="list-group-item list-group-item-action text-center py-1 main-active" href="javascript:void(0)"><h5><i> Most Watchest Movies</i></h5></a>
        <?php while($row= $query->fetch_array()){ ?>
    
       <li class="movies-dropdown" >
        <ul><li>
         <a class="list-group-item list-group-item-action" href="javascript:void(0)"  id="movies_watchvideo" data-movies="<?php echo $row['movies_id'];?> "> =>  <?php echo $row['title_movies']; ?><div><i class="fa fa-eye" aria-hidden="true"></i> 23 000 000 Viewers</div></a>
              <ul><li>
                <?php echo $this->moviesDropdown($row['movies_id']); ?>
              </li></ul>
          </li></ul>
        </li>

        <?php } ?>

        </ul><!-- LIST GROUP WITH LINKS -->

<?php }

}

$movies = new Movies();