<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Home extends Comment {

     public function usersNameId($username)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT user_id FROM users WHERE username= '$username'");
        $row= $query->fetch_array();
        return $row;
    }

        public function userData($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users WHERE user_id= '{$user_id}' ");
        $row= $query->fetch_array();
        return $row;
    }
        public function jobsData($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users Left JOIN jobs ON business_id = '{$user_id}' WHERE business_id = '{$user_id}' and user_id= '{$user_id}' ");
        $row= $query->fetch_array();
        return $row;
    }

        public function jobsviewData($business_id,$job_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN  jobs J ON J. business_id = U. user_id WHERE J. business_id = '{$business_id}' and J. job_id= '{$job_id}' ");
        $row= $query->fetch_array();
        return $row;
    }

        public function jobsactivities($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM  users U Left JOIN  jobs J ON J. business_id = U. user_id WHERE J.turn = 'on' and J. business_id = '{$user_id}' ");
        ?>
        <div class="card">
            <div class="card-header main-active">
             <h5 class="text-center">jobs</h5>
            </div>
            <div class="card-body">
              <div class="row ">
           
          <?php while($jobs= $query->fetch_array()) { ?>
            <div class="col-8 offset-2 px-0 jobHovers more" data-job="<?php echo $jobs['job_id'];?>"  data-business="<?php echo $jobs['business_id'];?>">
               <div class="user-block mb-2 jobHover" >
                   <div class="user-jobImgBorder">
                   <div class="user-jobImg">
                         <?php if (!empty($jobs['profile_img'])) {?>
                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $jobs['profile_img'] ;?>" alt="User Image">
                         <?php  }else{ ?>
                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                         <?php } ?>
                   </div>
                   </div>
                   <span class="username">
                       <a style="padding-right:3px;" href="#">Job Title: <?php echo $this->htmlspecialcharss($jobs['job_title']) ;?></a> 
                   </span>
                   <span class="description"><?php echo $this->htmlspecialcharss($jobs['companyname']); ?> || <i class="flag-icon flag-icon-<?php echo strtolower( $jobs['location']) ;?> h4 mb-0"
                            id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i></span>
                   <span class="description">Shared public - <?php echo $this->timeAgo($jobs['created_on']); ?></span>
                   <span class="description">Deadline -  <?php echo $this->htmlspecialcharss($jobs['deadline']); ?></span>
               </div>
               <hr class="main-active" style="width:100%">
            </div>
          <?php } ?>
           </div> <!-- row -->
           </div> <!-- card-body -->
        </div> <!-- card -->
    <?php }

        public function jobsfetch()
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM  users U Left JOIN  jobs J ON J. business_id = U. user_id WHERE J.turn = 'on' ORDER BY rand() LIMIT 6 ");
        ?>
        <div class="card card-primary mb-3 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title text-center"><i> Jobs</i></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
          <?php while($jobs= $query->fetch_array()) { ?>

            <div class="col-12 px-0 border-bottom jobHovers more" data-job="<?php echo $jobs['job_id'];?>"  data-business="<?php echo $jobs['business_id'];?>">
               <div class="user-block mb-2 jobHover" >
                   <div class="user-jobImgBorder">
                   <div class="user-jobImg">
                         <?php if (!empty($jobs['profile_img'])) {?>
                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $jobs['profile_img'] ;?>" alt="User Image">
                         <?php  }else{ ?>
                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                         <?php } ?>
                   </div>
                   </div>
                   <span class="username">
                       <a style="padding-right:3px;" href="#">Job Title: <?php echo $this->htmlspecialcharss($jobs['job_title']) ;?></a> 
                   </span>
                   <span class="description"><?php echo $this->htmlspecialcharss($jobs['companyname']); ?> || <i class="flag-icon flag-icon-<?php echo strtolower($jobs['location']) ;?> h4 mb-0"
                            id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i></span>
                   <span class="description">Shared public - <?php echo $this->timeAgo($jobs['created_on']); ?></span>
                   <span class="description">Deadline -  <?php echo $this->htmlspecialcharss($jobs['deadline']); ?></span>
               </div>
            </div>
            <hr >

          <?php } ?>
        </div>
          </div> <!-- /.card-body -->
           <div class="card-footer text-center">
            <a href="<?php echo JOBS;?>"><i> View all Jobs</i></a>
           </div> <!-- /.card-footer -->
       </div>
       <!-- /.card -->

    <?php }
        
        function htmlspecialcharss($string)
    {
        return strip_tags(html_entity_decode($string));
    }

        function jobsfetchALL($categories,$pages)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*10)-10;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM  users U Left JOIN  jobs J ON J. business_id = U. user_id WHERE J.categories_jobs ='$categories' AND J. turn = 'on' ORDER BY rand() Desc Limit $showpages,10");
        ?>
        <div class="card card-primary mb-1 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title float-left pl-2"><i> Jobs to Search</i></h5>
             <form class="form-inline float-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control search0"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                </div>
              </form>

            <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                <nav class="nav d-flex justify-content-between pb-0"  >
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories('Featured',1);" >Featured<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Featured');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories('Tenders',1);" >Tenders<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Tenders');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories('Consultancy',1);" >Consultancy<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Consultancy');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories('Internships',1);" >Internships<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Internships');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories('Public',1);" >Public<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Public');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories('Training',1);" >Training<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Training');?></span></a>
                </nav>
            </div> <!-- nav-scroller -->
        </div> <!-- /.card-header -->

        <div class="card-body">
        <span class="job-show"></span>
        <div class="job-hide">
          <?php while($jobs= $query->fetch_array()) { ?>

            <div class="col-12 px-0 py-2 jobHover jobHovers more" data-job="<?php echo $jobs['job_id'];?>" data-business="<?php echo $jobs['business_id'];?>">
            <div class="user-block mb-2" >
             <div class="row">
              <div class="col-2">
                   <div class="user-jobImgall">
                         <?php if (!empty($jobs['profile_img'])) {?>
                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $jobs['profile_img'] ;?>" alt="User Image">
                         <?php  }else{ ?>
                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                         <?php } ?>
                   </div>
              </div>
              <div class="col-10 pl-4">
                   <span>Job Title: <?php echo $this->htmlspecialcharss($jobs['job_title']) ;?></span><br>
                   <span><?php echo $this->htmlspecialcharss($jobs['companyname']); ?></span> || 
                       <i class="flag-icon flag-icon-<?php echo strtolower( $jobs['location']) ;?> h4 mb-0"
                            id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i><br>
                   <span>Shared public - <?php echo $this->timeAgo($jobs['created_on']); ?></span><br>
                   <span>Deadline - <?php echo $this->htmlspecialcharss($jobs['deadline']); ?></span>
               </div> <!-- col-10 -->
            </div> <!-- row -->
          </div> <!-- user-block -->
          </div> <!-- col-12 -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php }

        $query1= $mysqli->query("SELECT COUNT(*) FROM jobs WHERE categories_jobs ='$categories' AND turn = 'on' ");
        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/10;
        $post_Perpage = ceil($post_Perpages); ?>
           </div>
          </div> <!-- /.card-body -->
       </div> <!-- /.card -->

        <?php if($post_Perpage > 1){ ?>
         <nav>
             <ul class="pagination justify-content-center mt-3">
                 <?php if ($pages > 1) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="jobsCategories('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
                 <?php } ?>
                 <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                         if ($i == $pages) { ?>
                      <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="jobsCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                      <?php }else{ ?>
                     <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="jobsCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php } } ?>
                 <?php if ($pages+1 <= $post_Perpage) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="jobsCategories('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
                 <?php } ?>
             </ul>
         </nav>
        <?php } ?>

    <?php } 

        function jobsfetchALL0($categories,$pages)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*10)-10;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM  users U Left JOIN  jobs J ON J. business_id = U. user_id WHERE J.categories_jobs ='$categories' AND J. turn = 'on' ORDER BY rand() Desc Limit $showpages,10");
        ?>
        <div class="card card-primary mb-1 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title float-left pl-2"><i> Jobs to Search</i></h5>
             <form class="form-inline float-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control search0"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                </div>
              </form>

            <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                <nav class="nav d-flex justify-content-between pb-0"  >
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories0('Featured',1);" >Featured<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Featured');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories0('Tenders',1);" >Tenders<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Tenders');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories0('Consultancy',1);" >Consultancy<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Consultancy');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories0('Internships',1);" >Internships<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Internships');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories0('Public',1);" >Public<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Public');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="jobsCategories0('Training',1);" >Training<span class="badge badge-primary"><?php echo $this->jobscountPOSTS('Training');?></span></a>
                </nav>
            </div> <!-- nav-scroller -->
        </div> <!-- /.card-header -->

        <div class="card-body">
        <span class="job-show"></span>
        <div class="job-hide row">
            <div class="col-md-6 large-2 ">
          <?php while($jobs= $query->fetch_array()) { ?>

            <div class="px-0 py-2 jobHover jobHovers0 more" data-job="<?php echo $jobs['job_id'];?>" data-business="<?php echo $jobs['business_id'];?>">
            <div class="user-block mb-2" >
             <div class="row">
              <div class="col-2">
                   <div class="user-jobImgall">
                         <?php if (!empty($jobs['profile_img'])) {?>
                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $jobs['profile_img'] ;?>" alt="User Image">
                         <?php  }else{ ?>
                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                         <?php } ?>
                   </div>
              </div>
              <div class="col-10 pl-4">
                   <span>Job Title: <?php echo $this->htmlspecialcharss($jobs['job_title']) ;?></span><br>
                   <span><?php echo $this->htmlspecialcharss($jobs['companyname']); ?></span> || 
                       <i class="flag-icon flag-icon-<?php echo strtolower( $jobs['location']) ;?> h4 mb-0"
                            id="<?php echo strtolower( $jobs['location']) ;?>" title="us"></i><br>
                   <span>Shared public - <?php echo $this->timeAgo($jobs['created_on']); ?></span><br>
                   <span>Deadline - <?php echo $this->htmlspecialcharss($jobs['deadline']); ?></span>
               </div> <!-- col-10 -->
            </div> <!-- row -->
          </div> <!-- user-block -->
          </div> <!-- col-12 -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php }

        $query1= $mysqli->query("SELECT COUNT(*) FROM jobs WHERE categories_jobs ='$categories' AND turn = 'on' ");
        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/10;
        $post_Perpage = ceil($post_Perpages); ?>
            </div>
            <div class="col-md-6 large-2 jobslarge">
                
            </div>
           </div><!-- row -->
          </div> <!-- /.card-body -->
       </div> <!-- /.card -->

        <?php if($post_Perpage > 1){ ?>
         <nav>
             <ul class="pagination justify-content-center mt-3">
                 <?php if ($pages > 1) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="jobsCategories0('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
                 <?php } ?>
                 <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                         if ($i == $pages) { ?>
                      <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="jobsCategories0('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                      <?php }else{ ?>
                     <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="jobsCategories0('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php } } ?>
                 <?php if ($pages+1 <= $post_Perpage) { ?>
                     <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="jobsCategories0('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
                 <?php } ?>
             </ul>
         </nav>
        <?php } ?>

    <?php } 

      public function jobscountPOSTS($categories)
    {
        $db =$this->database;
        $sql= $db->query("SELECT COUNT(*) FROM jobs WHERE categories_jobs ='$categories' AND turn = 'on'");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }


    public function options(){ ?>

         <div class="card text-center">
            <div class="card-header main-active p-1">
              <h5 class="card-title"><i> Options</i></h5>
            </div>
            <div class="card-body options-list">

            <?php if (isset($_SESSION['key'])) { ?>
                <ul>
                    <li><h5 class="card-title"><a href="crowfund.php">GushoraStartUp</a></h5> </li>
                    <li><h5 class="card-title"><a href="fundraising.php"> Fundraising</a></h5>
                         <ul>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Education">Education</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Emergency">Emergency</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Faith">Faith</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Medical">Medical</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Memorial">Memorial</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Community">Community</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Competition">Competition</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Creative">Creativity</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Business">Business</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Animals">Animals</a></h5></li>
                              <li><h5 class="card-title"><a href="fundraising.php#list-Nonprofit">Nonprofit</a></h5></li>
                         </ul>
                    </li>
                    <li><h5><a href="Unemployment.php"> Unemployment</a></h5> </li>
                    <li><h5 class="card-title"><a href="sale.php">Sale</a></h5>
                        <ul>
                              <li><h5 class="card-title"><a href="sale.php">Electronics</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">Health & Beauty</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">Clothes</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">Motors</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">House</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">Sports</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">cars</a></h5></li>
                              <li><h5 class="card-title"><a href="sale.php">Food</a></h5></li>
                         </ul>
                    </li>
                    <li><h5 class="card-title"><a href="blog.php">Blog</a></h5>
                        <ul>
                              <li><h5 class="card-title"><a href="blog.php#list-Technology">Technology</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Design">Design</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Culture">Culture</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Business">Business</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Politics">Politics</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Opinion">Opinion</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Health">Health</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Style">Style</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Travel">Travel</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-History">History</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Science">Science</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Computer_science">Computer science</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Story">Story</a></h5></li>
                              <li><h5 class="card-title"><a href="blog.php#list-Politics">Politics</a></h5></li>
                         </ul>
                    </li>
                    <li><h5 class="card-title"><a href="jobs0.php">Jobs</a></h5></li>
                    <li><h5 class="card-title"><a href="events.php">Events</a></h5>
                    <li><h5 class="card-title"><a href="movies.php">Movies</a></h5>
                    <li><h5 class="card-title"><a href="sports.php">Sports</a></h5>
                    <li><h5 class="card-title"><a href="news.php">news</a></h5>
                    <li><h5 class="card-title"><a href="entertainment.php">Entertainment</a></h5>
                    <li><h5 class="card-title"><a href="rwandaPhotos.php">Rwanda-Landscape</a></h5>
                    <li><h5 class="card-title"><a href="Tembera.php">Tembera-ltd</a></h5>
                    <li><h5 class="card-title"><a href="hotelbooking.php">Hotel-booking</a></h5>
                    <li><h5 class="card-title"><a href="house.php">House</a></h5>
                    <li><h5 class="card-title"><a href="car.php">Car</a></h5>
                    <li><h5 class="card-title"><a href="food.php">Foodzana</a></h5>
                    <li><h5 class="card-title"><a href="domestic.php">domestic Helpers</a></h5> </li>
                    <li><h5 class="card-title"><a href="school.php">school</a></h5> </li>
                    <li><h5 class="card-title"><a href="members_earning.php">members earning</a></h5> </li>
                </ul>
              
              <?php }else { ?>
               <ul>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.crowfund">GushoraStartUp</a></h5> </li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.fundraising"> Fundraising</a></h5></li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.Unemployment"> Unemployment</a></h5> </li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.sale">Sale</a></h5></li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.blog">Blog</a></h5></li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.jobs0">Jobs</a></h5></li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.events">Events</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.movies">Movies</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.sports">Sports</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.news">news</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.entertainment">Entertainment</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.rwandaPhotos">Rwanda-Landscape</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.Tembera">Tembera-ltd</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.hotelbooking">Hotel-booking</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.house">House</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.car">Car</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.food">Foodzana</a></h5>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.domestic">domestic Helpers</a></h5> </li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.school">school</a></h5> </li>
                    <li><h5 class="card-title "><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.members_earning">members earning.php</a></h5> </li>
                </ul>
                <?php } ?>
            </div>
        </div>

    <?php }

    public function options0(){ ?>

         <div class="card text-center m-0">
            <div class="card-header main-active p-1">
              <h5 class="card-title"><i> Options</i></h5>
            </div>
            <div class="card-body options-list large-2" style="height:520px;">
            <?php if (isset($_SESSION['key'])) { ?>
                <ul>
                    <li><h5><a href="crowfund.php">GushoraStartUp</a></h5> </li>
                    <li><h5><a href="fundraising.php"> Fundraising</a></h5> </li>
                    <li><h5><a href="Unemployment.php"> Unemployment</a></h5> </li>
                    <li><h5><a href="sale.php">Sale</a></h5> </li>
                    <li><h5><a href="blog.php">Blog</a></h5> </li>
                    <li><h5><a href="jobs0.php">Jobs</a></h5></li>
                    <li><h5><a href="events.php">Events</a></h5>
                    <li><h5><a href="movies.php">Movies</a></h5>
                    <li><h5><a href="sports.php">Sports</a></h5>
                    <li><h5><a href="news.php">news</a></h5>
                    <li><h5><a href="entertainment.php">Entertainment</a></h5>
                    <li><h5><a href="rwandaPhotos.php">Rwanda-Landscape</a></h5>
                    <li><h5><a href="Tembera.php">Tembera-ltd</a></h5>
                    <li><h5><a href="hotelbooking.php">Hotel-booking</a></h5>
                    <li><h5><a href="house.php">House</a></h5>
                    <li><h5><a href="car.php">Car</a></h5>
                    <li><h5><a href="food.php">Foodzana</a></h5>
                    <li><h5><a href="domestic.php">domestic Helpers</a></h5> </li>
                    <li><h5><a href="school.php">school</a></h5> </li>
                    <li><h5><a href="members_earning.php">members earning.php</a></h5> </li>
                </ul>
              <?php }else { ?>
               <ul>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.crowfund">GushoraStartUp</a></h5> </li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.fundraising"> Fundraising</a></h5></li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.Unemployment"> Unemployment</a></h5> </li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.sale">Sale</a></h5></li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.blog">Blog</a></h5></li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.jobs0">Jobs</a></h5></li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.events">Events</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.movies">Movies</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.sports">Sports</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.news">news</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.entertainment">Entertainment</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.rwandaPhotos">Rwanda-Landscape</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.Tembera">Tembera-ltd</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.hotelbooking">Hotel-booking</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.house">House</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.car">Car</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.food">Foodzana</a></h5>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.domestic">domestic Helpers</a></h5> </li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.school">school</a></h5> </li>
                    <li><h5 class="card-title"><a class="alink" href="<?php echo BASE_URL_PUBLIC; ?>jojo.members_earning">members earning</a></h5> </li>
                </ul>
                <?php } ?>
            </div>
        </div>

    <?php }

      public function links(){ ?>
            <?php if (isset($_SESSION['key'])) { ?>
         <ul class="list-inline link-view">
              <li class="list-inline-item"><a href="crowfund.php"><i class="fa fa-money" aria-hidden="true"></i> GushoraStartUp</a></li>
              <li class="list-inline-item"><a href="fundraising.php"><i class="fa fa-heartbeat" aria-hidden="true"></i> Fundraising</a></li>
              <li class="list-inline-item"><a href="Unemployment.php"><i class="fa fa-running    "></i> Unemployment</a></li>
              <li class="list-inline-item"><a href="sale.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sale</a></li>
              <li class="list-inline-item"><a href="blog.php"><i class="fas fa-blogger    "></i> Blog</a></li>
              <li class="list-inline-item"><a href="jobs0.php"><i class="fas fa-newspaper    "></i> Jobs</a></li>
              <li class="list-inline-item"><a href="events.php"><i class="fas fa-envelope-open-text    "></i> Events</a></li>
              <li class="list-inline-item"><a href="movies.php"><i class="fa fa-film" aria-hidden="true"></i> Movies</a></li>
              <li class="list-inline-item"><a href="sports.php"><i class="fas fa-football-ball    "></i> Sports</a></li>
              <li class="list-inline-item"><a href="news.php"><i class="fas fa-newspaper    "></i> news</a></li>
              <li class="list-inline-item"><a href="entertainment.php"><i class="fa fa-microphone" aria-hidden="true"></i> Entertainment</a></li>
              <li class="list-inline-item"><a href="rwandaPhotos.php"><i class="fa fa-map-marker" aria-hidden="true"></i> Rwanda-Landscape</a></li>
              <li class="list-inline-item"><a href="Tembera.php"><i class="fa fa-safari" aria-hidden="true"></i> Tembera-ltd</a></li>
              <li class="list-inline-item"><a href="hotelbooking.php"><i class="fas fa-hotel    "></i> Hotel-booking</a></li>
              <li class="list-inline-item"><a href="house.php"><i class="fas fa-house-damage    "></i> House</a></li>
              <li class="list-inline-item"><a href="car.php"><i class="fa fa-car" aria-hidden="true"></i> Car</a></li>
              <li class="list-inline-item"><a href="food.php"><i class="fa fa-cutlery" aria-hidden="true"></i> Foodzana</a></li>
              <li class="list-inline-item"><a href="domestic.php">domestic Helpers</a></li>
              <li class="list-inline-item"><a href="school.php"><i class="fas fa-school    "></i> school</a></li>
              <li class="list-inline-item"><a href="members_earning.php">members earning</a></li>
            </ul>
            <?php }else { ?>
            <ul  class="list-inline link-view">
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.crowfund">GushoraStartUp</a> </li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.fundraising"> Fundraising</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.Unemployment"> Unemployment</a> </li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.sale">Sale</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.blog">Blog</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.jobs0">Jobs</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.events">Events</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.movies">Movies</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.sports">Sports</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.news">news</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.entertainment">Entertainment</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.rwandaPhotos">Rwanda-Landscape</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.Tembera">Tembera-ltd</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.hotelbooking">Hotel-booking</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.house">House</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.car">Car</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.food">Foodzana</a></li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.domestic">domestic Helpers</a> </li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.school">school</a> </li>
                <li class="list-inline-item"><a href="<?php echo BASE_URL_PUBLIC; ?>jojo.members_earning">members earning</a> </li>
            </ul>
        <?php } ?>

    <?php }

      public function fundraisingData($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM fundraising WHERE user_id2 = '$user_id' ");
        $row= $query->fetch_array();
        return $row;
    }

        public function fundraisingsActivities($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN fundraising F ON F. user_id2 = u. user_id WHERE F. user_id2 = '$user_id'  ORDER BY created_on2 Desc ");
        ?>
        <div class="card card-primary mb-3 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title text-center"><i> Fundraising</i></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
        <?php while($row= $query->fetch_array()) { ?>
        
                <div class="col-md-3 mb-3" >
                    <div class="card" style="border-bottom-left-radius: 0px !important;border-bottom-right-radius: 0px !important;">
                        <img class="card-img-top" height="244px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/fundraising/<?php echo $row['photo'] ;?>" >
                        <div style="position: absolute; top: 0px; right: 0;padding: 1rem;">
                            <span class="btn btn-light"><span style="font-size: 14px" class="material-icons p-0 m-0"> trending_up</span> trending</span>
                        </div>
                        <div style="position: absolute;bottom: 0px; right: 0;left:0px;background-color: #cfd3d6a1">
                               <h5 class="card-title text-dark m-1 pb-1 pl-2">Helps <?php echo $row['lastname'] ;?> </h5>
                              <div class="progress " style="height: 6px;">
                                <div class="progress-bar  bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                    <div class="card" style="border-top-left-radius: 0px !important;border-top-right-radius: 0px !important;">
                            <div class="card-body pl-1 pb-1">
                              <span class="h5">500 Frw raised </span>
                              <span class="text-muted"> Out of 5000 Frw</span>
                              <p> lifelifelifelifelifelifelifelifelifelifelifelifeli</p>
                              <div class="float-right">
                              <button type="button" id="fund-readmore" data-fund="<?php echo $row['fund_id'] ;?>" class="btn btn-primary" >+ Read more</button></div>
                            </div>
                    </div>
                </div>

        <?php } ?>
             </div> <!-- row -->
           </div> <!-- card-body -->
        </div> <!-- card -->
   <?php }

      public function eventsData($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM events WHERE user_id3 ='$user_id' ");
        $row= $query->fetch_array();
        return $row;
    }

    public function eventsListActivities($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM events WHERE user_id3 ='$user_id' ORDER BY created_on3 Desc");
        ?>
        <div class="card card-primary mb-3 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title text-center"><i> Events</i></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">

           <?php while($row= $query->fetch_array()){ ?>

          <div class="col-md-3 mb-3">
             <div class="card">
                 <img class="card-img-top" src="<?php echo BASE_URL_PUBLIC.'uploads/events/'.$row['photo']; ?>" width="296px" height="296px" >
                 <div class="card-body py-1 ">
                     <div>Avenue: <?php echo $row['location_events']; ?> at <?php echo $row['name_place']; ?> </div>
                     <div>date: <?php echo $row['date0']; ?> || start events: <?php echo $row['start_events']; ?> </div>
                     <div>Posted on <?php echo $row['created_on3']; ?> </div>
                 </div>
             </div>
           </div><!-- col -->

            <?php   } ?>
            </div> <!-- row -->
           </div> <!-- card-body -->
        </div> <!-- card -->
     
    <?php }

      public function blogData($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM blog WHERE user_id3 ='$user_id' ");
        $row= $query->fetch_array();
        return $row;
    }
    
    public function blogsActivities($user_id){
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM blog WHERE user_id3 ='$user_id' ORDER BY created_on3 Desc ");
        ?>
       <div class="card card-primary mb-3 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title text-center"><i> Blogs</i></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
        <?php while($row= $query->fetch_array()) { ?>

        <div class="col-md-4">
          <div class="card flex-md-row mb-4 border-0 h-md-250" style="box-shadow:0 0 0.5ch 0.5ch rgba(35, 35, 32, 0.15);">
            <img class="card-img-left flex-auto d-none d-lg-block" width="200px" height="250px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/Blog/<?php echo $row['photo'] ;?>" alt="Card image cap">
            <div class="card-body d-flex flex-column align-items-start">
              <h4 style="font-family: Playfair Display, Georgia, Times New Roman, serif;text-align:left;">
               <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="<?php echo $row['blog_id'] ;?>"> <?php echo  $row['title']; ?></a>
              </h4>
              <div class="mb-1 text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
              <p class="mb-auto"> 
                <?php 
                    if (strlen($row["text"]) > 125) {
                      echo $row["text"] = substr($row["text"],0,125).'...<br><span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="'.$row['blog_id'].'" class="text-muted" style"font-weight: 500 !important;">Continue reading...</a></span>';
                    }else{
                      echo $row["text"];
                    } ?> 
              </p>
            </div>
          </div>
        </div>

        <?php } ?>
             </div> <!-- row -->
           </div> <!-- card-body -->
        </div> <!-- card -->
   <?php }

      public function saleData($user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM sale WHERE user_id01 ='$user_id' ");
        $row= $query->fetch_array();
        return $row;
    }

    public function saleActivities($user_id)
    {
        $mysqli= $this->database;
        $query = $mysqli->query("SELECT * FROM sale WHERE user_id01 = '$user_id' ORDER BY created_on01 Desc "); ?>
        <div class="card card-primary mb-3 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title text-center"><i> Sales</i></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php while($row=$query->fetch_assoc()) { ?>
                <div class="ml-1 mb-3 float-left" style="width: 252px;">

                  <div class="card">
                    <div class="card-img-top img-fuild"><img src="<?php echo BASE_URL_PUBLIC."uploads/sale/".$row["photo"]; ?>" width="250px" height="155px;"></div>
                      <div class="card-body">
                          <div class="card-title"><?php echo $row["title"]; ?></div> <!-- product-title -->
                          <p class="card-text product-price"><?php echo "$".$row["price"]; ?></p>
                          <form method="post" action="sale.php?action=add&code=<?php echo $row["code"]; ?>">
               	      	  <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" readonly/><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
                          </form>
                      </div><!-- card-body -->
                  </div><!-- card -->

                </div><!-- col -->
      <?php } ?>
             </div> <!-- row -->
           </div> <!-- card-body -->
        </div> <!-- card -->
   <?php }


    public function inbox($sessions)
    {
        $mysqli = $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN apply_job A ON A. business_id0= U. user_id LEFT JOIN jobs J ON J. job_id = A. job_id0  WHERE A. business_id0= '$sessions' ORDER BY created_on0 DESC ");
        while($apply = $query->fetch_array()) { 
            # code...
       echo '
             <tr class="inbox-view more" data-cv_id="'.$apply['cv_id'].'" data-business="'.$apply['business_id'].'" >
                   <td><input type="checkbox" name="a'.$apply['cv_id'].'" value="'.$apply['cv_id'].'"></td>
                   <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                   <td class="mailbox-name inbox-view more"><a href="#">'.$apply['firstname0']." ".$apply['lastname0'].'</a></td>
                   <td class="mailbox-subject"><b>'.$apply['job_title'].'</b> - '.$apply['addition_information'].'
                   </td>
                   <td class="mailbox-attachment">'.((!empty($apply['uploadfilecv']))? '<i class="fa fa-paperclip"></i>':'' ).'</td>
                   <td class="mailbox-date">'.$this->timeAgo($apply['created_on0']).'</td>
              </tr>';

        }
    }

    public function trash($sessions)
    {
        $mysqli = $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN trash T ON T. business_id0= U. user_id LEFT JOIN jobs J ON J. job_id = T. job_id0  WHERE T. business_id0= '$sessions' ORDER BY created_on0 DESC ");
        while($trash = $query->fetch_array()) { 
            # code...
       echo '
             <tr class="trash-view more" data-trash_id="'.$trash['trash_id'].'" data-business="'.$trash['business_id'].'" >
                   <td><input type="checkbox"></td>
                   <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                   <td class="mailbox-name trash-view more"><a href="#">'.$trash['firstname0']." ".$trash['lastname0'].'</a></td>
                   <td class="mailbox-subject"><b>'.$trash['job_title'].'</b> - '.$trash['addition_information'].'
                   </td>
                   <td class="mailbox-attachment">'.((!empty($trash['uploadfilecv']))? '<i class="fa fa-paperclip"></i>':'' ).'</td>
                   <td class="mailbox-date">'.$this->timeAgo($trash['created_on0']).'</td>
              </tr>';
        }
    }

    public function search($search)
    {
        $mysqli= $this->database;
        $param= '%'.$search.'%';
        $query = "SELECT user_id, username, email, career,hobbys, profile_img,chat FROM users Where username LIKE '{$param}' OR firstname LIKE '{$param}' OR lastname LIKE '{$param}' ";
        $result= $mysqli->query($query);
        $contacts = array();
        while ($row= $result->fetch_array()) {
            $contacts[] = array(
            'user_id' => $row['user_id'],
            'username' => $row['username'],
            'email' => $row['email'],
            'career' => $row['career'],
            'hobbys' => $row['hobbys'],
            'profile_img' => $row['profile_img'],
            'chat' => $row['chat']
           );
        }
        return $contacts; // Return the $contacts array
    }

    public function searchJobs($search)
    {
        $mysqli= $this->database;
        $param= '%'.$search.'%';
        $query = "SELECT * FROM users Left JOIN jobs ON business_id= user_id WHERE turn = 'on' AND job_title LIKE '{$param}' ";
        $result= $mysqli->query($query);
        $contacts = array();
        while ($row= $result->fetch_array()) {
            $contacts[] = array(
            'user_id' => $row['user_id'],
            'job_id' => $row['job_id'],
            'job_title' => $row['job_title'],
            'companyname' => $row['companyname'],
            'created_on' => $row['created_on'],
            'location' => $row['location'],
            'business_id' => $row['business_id'],
            'deadline' => $row['deadline'],
            'profile_img' => $row['profile_img']
           );
        }
        return $contacts; // Return the $contacts array
    }

    public function searchHotel($search)
    {
        $mysqli= $this->database;
        $param= '%'.$search.'%';
        $query = "SELECT * FROM rwandahotel WHERE title_ LIKE '{$param}' ";
        $result= $mysqli->query($query);
        $contacts = array();
        while ($row= $result->fetch_array()) {
            $contacts[] = $row;
        }
        return $contacts; // Return the $contacts array
    }

    public function searchSchool($search)
    {
        $mysqli= $this->database;
        $param= '%'.$search.'%';
        // $query = "SELECT * FROM school WHERE title_ LIKE '{$param}' ";
        $query="SELECT * FROM school S 
						Left JOIN provinces P ON S. location_province = P. provincecode
						Left JOIN districts D ON S. location_districts = D. districtcode
						Left JOIN sectors T ON S. location_Sector = T. sectorcode
						Left JOIN cells C ON S. location_cell = C. codecell
						Left JOIN vilages V ON S. location_village = V. CodeVillage
	    WHERE title_ LIKE '{$param}' ";

        $result= $mysqli->query($query);
        $contacts = array();
        while ($row= $result->fetch_array()) {
            $contacts[] = $row;
        }
        return $contacts; // Return the $contacts array
    }

    public function landscapeSearchJobs($search)
    {
        $mysqli= $this->database;
        $param= '%'.$search.'%';
        $query = "SELECT * FROM rwandalandscapes WHERE title_ LIKE '{$param}' OR categories_of_landscapes LIKE '{$param}' ";
        $result= $mysqli->query($query);
        $search = array();
        while ($row= $result->fetch_array()) {
            $search[] = $row;
        }
        return $search; // Return the $contacts array
    }

     public function uploadImageProfiles($files)
    {
        $mysqli= $this->database;
        $filename= basename($files['name']);
        $fileTmpName= $files['tmp_name'];
        $filesize= $files['size'];
        $error= $files['error'];

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));
        $allower_ext = array('jpeg', 'jpg', 'png'); // valid extensions

        if (in_array($fileActualExt,$allower_ext) == true) {
            # code...
             if ($error == 0) {
                 if ($filesize <= 100*1024) {
                     # code...
                     $filename= basename($files['name']);
                     $filenames = (strlen($filename) > 10)? 
                     strtolower(rand(100,1000).substr($filename,0,4).".".$fileActualExt):
                     strtolower(rand(100,1000).$filename);
   		             $fileTmpName = $files['tmp_name'];
                    //  $file_dest= 'uploads/posts/'.$filenames;
                     $file_dest= $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/posts/'.$filenames;
                     move_uploaded_file($fileTmpName,$file_dest);
                   
                    return substr($file_dest,42);

                 }else {
                      switch ($files['error']) {

                        case 2:
                            exit( $files['name'].' <span style = "color:red";>is too big</span>');
                            break;
                         case 4:
                             exit( $files['name'].' <span style = "color:red";>No file selected</span>');
                            break;
                        default:
                             exit( $files['name'].' <span style = "color:red";>sorry that type of file is not allowed</span>');
                            break;
                       }
                 }
             }

        }else {
                exit( "the extension is not allowed");
        }
    }

    public function uploadPostsImage($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/posts/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            $size  = $file['size'][$key];
            $type  = $file['type'][$key];
            $error = $file['error'][$key];
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadAlbumImage($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/album/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            $size  = $file['size'][$key];
            $type  = $file['type'][$key];
            $error = $file['error'][$key];
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadJobsFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/jobs/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            $size  = $file['size'][$key];
            $type  = $file['type'][$key];
            $error = $file['error'][$key];

            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadFundraisingFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/fundraising/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadSaleFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/sale/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadBlogFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/Blog/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadHouseFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/house/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadcarFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/car/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploaddomesticsFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/domestics/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadfoodFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/food/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadSportsFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/sports/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadFootballFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/sports/football/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadRwandaschoolFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/schoolFile/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadBasketballFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/sports/basketball/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadMoviesFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/movies/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadEventsFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/events/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadRwandaLandscapesFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/rwandaLandscapes/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadnewsFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/news/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadRwandahotelFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/Rwandahotel/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function uploadcrowfundraisingFile($file)
    {

        $insertValuesSQL ="";
        $targetDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/crowfund/';
        $allowTypes = array('jpg','png','jpeg','mp4','mp3', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt','docx', 'xlsx','xls','zip');
        
        foreach($file['name'] as $key => $value){
            // File upload path
            $fileName = basename($file['name'][$key]);
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

             $filenames = (strlen($fileName) > 10)? 
                     strtolower(date('Y').'_'.rand(10,100).substr($fileName,0,4).".".$fileActualExt):
                     strtolower(date('Y').'_'.rand(10,100).$fileName);

            $valued[] = $filenames;

            $targetFilePath = $targetDir . $filenames;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                $fileTmpName = $file["tmp_name"];
                move_uploaded_file($fileTmpName[$key], $targetFilePath);
            }
        }
        
        # Build the values
        $filenamedb = implode("=", $valued);
        return  $filenamedb;

    }

    public function tweets($user_id,$limit)
    {
        $mysqli= $this->database;
        $sql="SELECT * FROM tweets LEFT JOIN users ON tweetBy= user_id WHERE tweetBy = $user_id AND retweet_id='0' OR tweetBy= user_id AND retweet_by != $user_id AND tweetBy IN (SELECT receiver FROM follow WHERE sender= $user_id) ORDER BY tweet_id DESC LIMIT $limit ";
        $query= $mysqli->query($sql);
        $tweets=array();
        while ($row= $query->fetch_assoc()) {
            # code...
             $tweets[]= $row;
        }

                          
                               foreach ($tweets as $tweet) {
                                $likes= $this->likes($user_id,$tweet['tweet_id']);
                                $retweet= $this->checkRetweet($tweet['tweet_id'],$user_id);
                                $user= $this->userData($retweet['retweet_by']);
                                $comment= $this->comments($tweet['tweet_id']);

                                     # code... 
                                ?>
                                   
                                <div class="post">
                                    <?php 
                                     if($retweet['retweet_id'] == $tweet["tweet_id"] || $tweet["retweet_id"] > 0){ ?>
                                      <span class="t-show-banner">
                                          <div class="t-show-banner-inner">
                                              <span><i class="fa fa-retweet "></i></span><span><?php echo $user['username'].' Shared';?></span>
                                          </div>
                                      </span>
                                     <?php } else{ echo '';}?>

                               <?php if(!empty($retweet['retweet_Msg']) && $tweet["tweet_id"] == $retweet["retweet_id"] || $tweet["retweet_id"] > 0){ ?> 
                                    <div class="user-block">
                                        <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                             <?php if (!empty($user['profile_img'])) {?>
                                             <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" class="user-image rounded-circle" alt="User Image">
                                             <?php  }else{ ?>
                                               <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" class="user-image rounded-circle" alt="User Image">
                                             <?php } ?>
                                        </div>
                                        </div>

                                        <span class="username">
                                            <a style="float:left;padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                            <span class="description">Shared public - <?php echo $this->timeAgo($retweet['posted_on']); ?></span>
                                        </span>
                                        <span class="description"><?php echo $this->getTweetLink($retweet['retweet_Msg']); ?></span>
                                    </div>

                                    <div class="card retweetcolor t-show-popup more" data-tweet="<?php echo $tweet["tweet_id"];?>">
                                      <div class="card-body ">

                                        <?php 
                                              $filename = $tweet['tweet_image'];
                                              $expodefile = explode("=",$tweet['tweet_image']);
                                              $fileActualExt= array();
                                              for ($i=0; $i < count($expodefile); ++$i) { 
                                                  $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                              }
                                              $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                              if (array_diff($fileActualExt,$allower_ext) == false) {
                                     			$expode = explode("=",$tweet['tweet_image']); 
                                                $count = count($expode); ?>
                                          <div class="row">
                                              <div class="col-6 ">

                                               <?php if ($count === 1) { ?>
                                                    <div class="row mb-1">
                                                           <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                                       <div class="col-sm-12">
                                                           <img class="img-fluid"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                    </div>

                                               <?php }else if($count == 2 || $count > 2){ ?>
                                                     <div class="row mb-2">
                                                           <?php 
                                                             $expode = explode("=",$tweet['tweet_image']);
                                                             $splice= array_splice($expode,0,2);
                                                             for ($i=0; $i < count($splice); ++$i) { 
                                                             ?>
                                                       <div class="col-sm-6">
                                                           <img class="img-fluid mb-2"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                           <?php } ?>
                                                    </div>
                                                    <div class="row">
                                                       <div class="col-sm-12">
                                                          <span class="btn btn-primary btn-sm float-right" >View More photo >>></span>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                               <?php } ?>
                                                </div> <!-- col -->

                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                     <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                      <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                   <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->
                                           </div><!-- row -->

                                            <?php   }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <video controls poster="../assets/image/img/avatar3.png" width="248px" height="110px">
                                                            <source src="git.mp4" type="video/mp4"> 
                                                            <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                                                <!-- fallback content here -->
                                                        </video>
                                                    </div><!-- col -->
                                                    
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                   <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            //  <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                            }else{
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-camera-retro main-active" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                                <div class="row">
                                                    <div class="col-6 ">
                                                         <video controls poster="../assets/image/img/avatar3.png" width="640" height="360">
                                                             <source src="video/boatride.webm" type="video/webm"> 
                                                                 <!-- fallback content herehere -->
                                                         </video>      
                                                     </div><!-- col -->

                                                 <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                   <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                                <div class="row">
                                                     <div class="col-6 ">
                                                          <audio controls>
                                                              <source src="50-Cent-Baby-By-Me-ft-Ne-Yo-128K-MP3.mp3" type="audio/mp3">
                                                                  <!-- fallback content here -->
                                                          </audio>
                                                       </div><!-- col -->

                                                 <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                     <a style="padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                  </span>
                                                                    <span class="description">Shared publicly -  <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                  <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->

                                                </div><!-- row -->
                                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                                    <audio controls>
                                                         <source src="audio/heavymetal.ogg" type="audio/ogg"> 
                                                             <!-- fallback content here -->
                                                     </audio>
                                            <?php }else { ?>
                                                    <div class="row">
                                                       <div class="col-12">

                                                              <div class="user-block">
                                                                    <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                   <span class="username">
                                                                       <a style="float:left;padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                       <!-- //Jonathan Burke Jr. -->
                                                                       <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                                   </span>
                                                                   <span class="description"><?php echo $this->getTweetLink($tweet['status']); ?></span>
                                                               </div>

                                                        </div><!-- col -->
                                                    </div><!-- row -->

                                            <?php } ?>

                                      </div><!-- card-body -->
                                    </div><!-- card -->

                                <?php } else { ?> 

                                    <div class="user-block">
                                        <div class="user-blockImgBorder">
                                        <div class="user-blockImg">
                                              <?php if (!empty($tweet['profile_img'])) {?>
                                              <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                              <?php  }else{ ?>
                                                <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                              <?php } ?>
                                        </div>
                                        </div>
                                        <span class="username tooltips">
                                           <ul><li >
                                            <a href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>" ><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                            <ul><li><?php echo Follow::tooltipProfile($tweet['user_id'],$tweet['user_id'],$tweet['user_id']); ?></li></ul>
                                            </li></ul>
                                        </span>
                                        <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <?php 
                                    $expodefile = explode("=",$tweet['tweet_image']);
                                    $fileActualExt= array();
                                    for ($i=0; $i < count($expodefile); ++$i) { 
                                        $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                    }
                                    $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                    if (array_diff($fileActualExt,$allower_ext) == false) {
                                        $expode = explode("=",$tweet['tweet_image']);
                                        $count = count($expode); ?>

                                     <?php if ($count === 1) { ?>

                                     <div class="row mb-1">
                                            <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                        <div class="col-sm-12 more">
                                            <img class="img-fluid imagePopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                     </div>


                                    <?php
                                     }else if($count === 2){?>
                                        <div class="row mb-2 more">
                                                <?php $expode = explode("=",$tweet['tweet_image']);
                                                  $splice= array_splice($expode,0,2);
                                                  for ($i=0; $i < count($splice); ++$i) { 
                                                  ?>
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-2 imagePopup"
                                                    src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                    alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                            </div>
                                                <?php }?>
                                        </div>

                                    <?php }else if($count === 3 || $count > 3){?>
                                     <div class="row mb-2 more">
                                            <?php $expode = explode("=",$tweet['tweet_image']);
                                              $splice= array_splice($expode,0,1);
                                              ?>
                                        <div class="col-sm-6">
                                            <img class="img-fluid mb-2 imagePopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-sm-6">
                                            <div class="row mb-2 more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    // var_dump($expode);
                                                    $splice= array_splice($expode,1,2);
                                                    // var_dump($splice);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imagePopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                            <div class="row more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    $splice= array_splice($expode,3,2);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imagePopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                  
                                     <!-- /.row -->
                                    <div class="row">
                                       <div class="col-sm-12">
                                           <span class="btn btn-primary btn-sm float-right imageViewPopup more"  data-tweet="<?php echo $tweet["tweet_id"] ;?>" >View More photo <i class="fa fa-picture-o"></i>  >>></span>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                       <?php }
                                     
                                  }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                    <div class="row mb-2" >
                                    <div class="col-12" >
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="500px" height="280px">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/mp4"> 
                                        <!-- <source src="video/boatride.webm" type="video/webm">  -->
                                            <!-- fallback content here -->
                                    </video>
                                    </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                 <div class="row mb-2">
                                    <div class="col-12">
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="auto" height="auto">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/webm"> 
                                            <!-- fallback content herehere -->
                                    </video>
                                     </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/mp3">
                                             <!-- fallback content here -->
                                     </audio>
                                      </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/ogg"> 
                                             <!-- fallback content here -->
                                     </audio>
                              <?php }?>

                                    <p id="link_">
                                        <?php echo $this->getTweetLink($tweet['status']) ;?>
                                    </p>
                                    
                              <?php }?>

                              <ul class="mt-2 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                        <?php if($tweet['tweet_id'] == $retweet['retweet_id']){ ?>
                                         <li class=" list-inline-item"><button class="share-btn retweeted text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                         <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet["retweet_counts"];?></span></i>
                                            Share</button></li>
                                        <?php }else{ ?>

                                               <li  class=" list-inline-item"> <button class="share-btn retweet text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                <?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?>
                                                   Share</button></li>

                                         <?php } ?>
                                            <?php if($likes['like_on'] == $tweet['tweet_id']){ ?>
                                                <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $tweet['likes_counts'] ;?></span></i>
                                                    Like</button></li>

                                            <?php }else{ ?>
                                                  <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                   <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($tweet['likes_counts'] > 0){ echo $tweet['likes_counts'];}else{ echo '';} ?></span></i>
                                                       Like</button></li>
                                            <?php } ?>
                                         <span style="float:right">
                                    
                                          <li  class=" list-inline-item"><button class="comments-btn text-sm" data-target="#a<?php echo  $tweet["tweet_id"];?>" data-toggle="collapse">
                                              <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                          </button></li>
                                        

                                         <?php if ($tweet["tweetBy"] == $user_id){ ?>
                                            <li  class=" list-inline-item">
                                                <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                    <li>
                                                       <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                        <ul style="list-style-type: none; margin:0px;" >
											                <li style="list-style-type: none; margin:0px;"> 
                        					                    <label class="deleteTweet" data-tweet="<?php echo  $tweet["tweet_id"];?>"  data-user="<?php echo $tweet["tweetBy"];?>" >Delete </label>
                                                           </li>
                                                       </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                         <?php }else{ echo '';}?>
                                         </span>
                                </ul>

                            <div class="card collapse hide" id="a<?php echo  $tweet["tweet_id"];?>">
                               <div class="card-body">
                               <?php if (!empty($comment)) { ?>
                                  <div class="direct-chat-message direct-chat-messageS">
                                  <h5><i>Comments</i></h5>
                                  <span class="commentsHome" id="commentsHome">
                                    <?php foreach ($comment as $comments) { ?>
                                         <!-- Conversations are loaded here -->
                                           <!-- Message. Default to the left -->
                                             <div class="direct-chat-msg">
                                                 <div class="direct-chat-info clearfix">
                                                     <span class="direct-chat-name float-left"><?php echo $comments["username"] ;?></span>
                                                     <span class="direct-chat-timestamp float-right"><?php echo $this->timeAgo($comments['comment_at']); ?></span>
                                                 </div>
                                                 <!-- /.direct-chat-info -->
                                                  <?php if (!empty($comments["profile_img"])) {?>
                                                   <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $comments["profile_img"] ;?>" alt="message user image">
                                                  <?php  }else{ ?>
                                                   <img class="direct-chat-img" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="message user image">
                                                  <?php } ?>
                                                 <!-- /.direct-chat-img -->
                                                 <div class="direct-chat-text">
                                                  <?php echo  $this->getTweetLink($comments["comment"]) ;?>
                                                 </div>
                                               <!-- /.direct-chat-text -->
                                               <ul class="mt-3 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                                           
                                                 <?php if($likes['like_on'] == $comments['comment_id']){ ?>
                                                     <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $comments['comment_id']; ?>"  >
                                                     <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $comments['likes_counts'] ;?></span></i>
                                                         Like</button></li>
                             
                                                  <?php }else{ ?>
                                                        <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $comments['comment_id']; ?>"  >
                                                         <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($tweet['likes_counts'] > 0){ echo $tweet['likes_counts'];}else{ echo '';} ?></span></i>
                                                             Like</button></li>
                                                  <?php } ?>
                    
                                                    <span style="float:right">
                                                                       
                                                 <li  class=" list-inline-item"><button class="comments-btn text-sm" data-target="#a<?php echo  $comments["comment_id"] ;?>" data-toggle="collapse">
                                                     <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                                 </button></li>
                                                              
                    
                                                     <?php if ($comments["comment_by"] == $user_id){ ?>
                                                        <li  class=" list-inline-item">
                                                            <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                                <li>
                                                                   <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                                    <ul style="list-style-type: none; margin:0px;" >
					                     	    	                <li style="list-style-type: none; margin:0px;"> 
                                          	    	                    <label class="deleteCommentPost" data-tweet="<?php echo  $comments["comment_id"];?>"  data-user="<?php echo $comments["comment_by"];?>" >Delete </label>
                                                                       </li>
                                                                   </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                     <?php }else{ echo '';}?>
                                                     </span>
                                                 </ul>
                    
                                             <div class="card collapse hide border-bottom-0" id="a<?php echo  $comments["comment_id"];?>" >
                                                 <div class="card-body">
                                                   <!-- Conversations are loaded here -->
                                                   <div class="direct-chat-message">
                                                     <!-- Message. Default to the left -->
                                                       <div class="direct-chat-msg">
                                                           <div class="direct-chat-info clearfix">
                                                               <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                               <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                           </div>
                                                           <!-- /.direct-chat-info -->
                                                                  <?php if (!empty($comments['profile_img'])) {?>
                                                                   <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $comments['profile_img'] ;?>" alt="message user image">
                                                                  <?php  }else{ ?>
                                                                   <img class="direct-chat-img" src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="message user image">
                                                                  <?php } ?>
                                                           <!-- /.direct-chat-img -->
                                                           <div class="direct-chat-text">
                                                             Is this template really for free? That's unbelievable!
                                                           </div> <!-- /.direct-chat-text -->
                                                        </div> <!-- /.direct-chat-msg -->
                                                    </div> <!-- /.direct-chat-message -->
                                                 </div> <!-- /.card-body-->
                    
                                                  <div class="card-footer p-0 border-top-0 border-bottom-0">
                                                     <div class="input-group">
                                                          <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                                          <div class="input-group-append">
                                                              <span class="input-group-text btn" onclick="#" aria-label="Username" aria-describedby="basic-addon1"><span
                                                                      class="fa fa-arrow-right text-muted"></span></span>
                                                          </div>
                                                      </div>
                                                </div><!-- /.card footer -->
                                            </div> <!-- /.card collapse -->
                                         </div> <!-- /.direct-chat-msg -->
                                          <?php } ?>
                                          </span>
                                      </div> <!-- /.direct-message -->
                                       <?php  } ?>
                                      </div> <!-- /.card-body-->
                                    </div> <!-- /.card collapse -->
                                    <form method="post">
                                     <div class="input-group">
                                          <input class="form-control form-control-sm" id="commentHome" type="text" data-tweet="<?php echo $tweet['tweet_id'];?>"
                                              name="comment"  placeholder="Reply to  <?php echo $tweet['username'] ;?>" onkeypress="myFunction()" onkeyup="keyupFunction()">
                                          <div class="input-group-append">
                                            <span class="input-group-text btn" style="padding: 0px 10px;"
                                                  aria-label="Username" aria-describedby="basic-addon1" id="post_HomeComment" >
                                                  <span class="fa fa-arrow-right text-muted" ></span>
                                            </span>
                                          </div>
                                      </div> <!-- input-group -->
                                    </form>
                                </div>
                                <!-- /.post -->

                         <?php }
              
    }

    public function getTrendshashtag($trend)
    {
        $mysqli= $this->database;
        $param= '%'.$trend.'%';
        $query = "SELECT * FROM trends WHERE hashtag LIKE '{$param}' LIMIT 5";
        $result= $mysqli->query($query);

        $trendshash = array();
        while ($row= $result->fetch_assoc()) {
            $trendshash[] = array(
            'trend_id' => $row['trend_id'],
            'hashtag' => $row['hashtag'],
            'created_on' => $row['created_on'],
           );
        }
        return $trendshash; // Return the $contacts array
        $mysqli->close();
    }

     public function getmention($mention)
    {
        $mysqli= $this->database;
        $param= '%'.$mention.'%';
        $query = "SELECT user_id, username , career, profile_img FROM users WHERE username LIKE '{$param}' OR lastname LIKE '{$param}' LIMIT 5";
        $result= $mysqli->query($query);
        $trendMention = array();
        while ($row=$result->fetch_assoc()) {
            $trendMention[] = array(
            'user_id' => $row['user_id'],
            'username' => $row['username'],
            'career' => $row['career'],
            'profile_img' => $row['profile_img']
           );
        }
        return $trendMention; // Return the $contacts array
        $mysqli->close();
    }

     public function addTrends($hashtag,$tweet_id)
    {
        $mysqli= $this->database;
        preg_match_all('/#+([a-zA-Z0-9_]+)/i',$hashtag, $matches);
        if ($matches) {
            # code...
            $resuslt= array_values($matches[1]);
        }
        $date= date('Y-m-d H-i-s');
        // CURRENT_TIMESTAMP
        foreach ($resuslt as $trend) {
            # code...
            $query = "INSERT INTO trends (hashtag,created_on,target) VALUES('$trend', '$date','$tweet_id')";
            $mysqli->query($query);
        }
      
    }

     public function addmention($status,$user_id,$tweet_id)
    {
        $mysqli= $this->database;
        preg_match_all('/@+([a-zA-Z0-9_]+)/i',$status, $matches);
        if ($matches) {
            # code...
            $resuslt= array_values($matches[1]);
        }
        $date= date('Y-m-d H-i-s');
        // CURRENT_TIMESTAMP
        foreach ($resuslt as $username) {
            # code...
            $query = "SELECT * FROM users WHERE username ='$username' ";
            $resul = $mysqli->query($query);
            $data= $resul->fetch_assoc();
            if ($data['user_id'] != $user_id ) {
                Notification::SendNotifications($data['user_id'],$user_id,$tweet_id,'mention');
            }
        }
      
    }

      public function jobsRemoveDiv($tweet)
    { 
        // $tweet= preg_replace('/<[^<]+? >/si','',$tweet);
        //   $tweet= preg_replace('/<(\w+)\b.*? >.*?<\/(\w+)>/','',$tweet);
        //   $tags= array('p','i','h4');
        //   foreach($tags as $tag){
        //        $tweet= preg_replace('/<(\w+)\b.*? >.*?<\/(\w+)>/','',$tweet);
        //   }
        // $tweet= preg_replace('/[\r\n\t]+/','',$tweet);
        $tweet= strip_tags($tweet);
        $tweet= trim($tweet);
        return  $tweet;
    }

      public function getTweetLink($tweet)
    {
        $tweet= preg_replace('/(http:\/\/)([\w+.])([\w.]+)/','<a  style="color:green;" href="$0" target="_blink">$0</a>',$tweet);
        // $tweet= preg_replace('/(https:\/\/)([\w+.])([\w.]+)/','<a style="color:green;" href="$0" target="_blink">$0</a>',$tweet);
        $tweet= preg_replace('/#([\w]+)/','<a style="color:green;" href="'.BASE_URL_PUBLIC.'$1.hashtag" >$0</a>',$tweet);
        $tweet= preg_replace('/@([\w]+)/','<a style="color:green;" href="'.BASE_URL_PUBLIC.'$1">$0</a>',$tweet);
        $search = '/((https:\/\/)www\.youtube\.com\/embed\/\w+)/';
        $tweet= preg_replace($search,'<section class="content iframe-container">
                                            <iframe width="500" height="280" src="$0" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                            </iframe>
                                            </section>',$tweet);
        $search0 = '/((https:\/\/)www\.youtube\.com\/watch\?v=\w+)/';
        $tweet= preg_replace($search0,'<a style="color:green;" href="$0" target="_blink">$0</a>',$tweet);
        // $search0 = '/((https:\/\/)www\.youtube\.com\/watch\?v=\w+)/';
        // $tweet= preg_replace($search0,'<section class="content iframe-container">
        //                                     <iframe width="500" height="280" src="$0" frameborder="0"
        //                                         allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        //                                     </iframe>
        //                                     </section>',$tweet);
        return  $tweet;
    }

     public function addLike($user_id,$tweet_id,$get_id)
    {
        $mysqli= $this->database;
        $query= "UPDATE tweets SET likes_counts = likes_counts +1 WHERE tweet_id= $tweet_id ";
        $mysqli->query($query);
        if ($get_id != $user_id) {
            Notification::SendNotifications($get_id,$user_id,$tweet_id,'likes');
        }
        $this->creates('likes',array('like_by' => $user_id ,'like_on' => $tweet_id));
    }

      public function unLike( $user_id,$tweet_id, $get_id)
    {
        $mysqli= $this->database;
        $query= "UPDATE tweets SET likes_counts = likes_counts -1 WHERE tweet_id= $tweet_id ";
        $mysqli->query($query);

        $query= "DELETE FROM likes WHERE like_by = $user_id AND like_on = $tweet_id";
        $mysqli->query($query);

    }

      public function likes($user_id,$tweet_id)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM likes WHERE like_by = $user_id AND like_on = $tweet_id";
        $result= $mysqli->query($query);

        $fetchCountLikes= array();
        while ($row= $result->fetch_assoc()) {
             $fetchCountLikes[] = array(
            'like_id' => $row['like_id'],
            'like_by' => $row['like_by'],
            'like_on' => $row['like_on']
           );
        }
        foreach ($fetchCountLikes as $fetchLikes) {
            # code...
            return $fetchLikes; // Return the $contacts array
        }
    }

     public function getPopupTweet($user_id,$tweet_id,$tweet_by)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM tweets, users WHERE tweet_id = $tweet_id AND tweetBy = user_id";
        $result= $mysqli->query($query);
        while ($row= $result->fetch_array()) {
            # code...
            return $row;
        }
    }

     public function getPopupDeleteComPost($comment_id)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM comment, users WHERE comment_id = $comment_id AND comment_by = user_id";
        $result= $mysqli->query($query);
        while ($row= $result->fetch_array()) {
            # code...
            return $row;
        }
    }

      public function retweet($retweet_id,$user_id,$tweet_by,$comments)
    {
        $mysqli= $this->database;
        $stmt = $mysqli->stmt_init();
        $query= "UPDATE tweets SET retweet_counts = retweet_counts +1  WHERE tweet_id= ? ";
        $stmt->prepare($query);
        $stmt->bind_param('i',$retweet_id);
        $stmt->execute();

        $query= "INSERT INTO tweets (status, tweetBy, retweet_id, retweet_by, tweet_image, likes_counts, retweet_counts, posted_on, retweet_Msg) 
        SELECT status, tweetBy, ?, ?, tweet_image, likes_counts, retweet_counts, ? , ?  FROM tweets WHERE tweet_id= ? ";
        $stmt->prepare($query);
        $time = date('Y-m-d H-i-s');
        $stmt->bind_param('iissi', $retweet_id, $user_id,$time,$comments, $retweet_id);
        $stmt->execute();  
        $query= "DELETE FROM tweets WHERE tweet_id= ?";
        $stmt->prepare($query);
        $stmt->bind_param('i',$stmt->insert_id);

        if ($retweet_id != $user_id) {
            var_dump($tweet_by,$user_id, $retweet_id,'retweet');
            Notification::SendNotifications($tweet_by,$user_id,$retweet_id,'retweet');
            var_dump(Notification::SendNotifications($tweet_by,$user_id,$retweet_id,'retweet'));
        }
        
        return $stmt->execute();
    }

     public function checkRetweet($tweet_id,$user_id)
    {
        $mysqli= $this->database;
        $stmt = $mysqli->stmt_init();
        $query="SELECT * FROM tweets WHERE retweet_id= ?  AND retweet_by= ? OR tweet_id=? AND retweet_by=? ";
        $stmt->prepare($query);
        $stmt->bind_param('iiii', $tweet_id, $user_id, $tweet_id, $user_id);
        $stmt->bind_result($tweet_idd, $status, $tweetBy, $retweet_idd, $retweet_by, $tweet_image,
        $likes_counts, $retweet_counts, $posted_on, $retweet_msg);
        $stmt->execute();
        $CountRetweet= array();
        while ($stmt->fetch()) {
             $CountRetweet[] = array(
              /* TABLE OF tweety */
             "tweet_id" => $tweet_idd,
             "status" => $status,
             "tweetBy" => $tweetBy,
             "retweet_id" => $retweet_idd,
             "retweet_by" => $retweet_by,
             "tweet_image" => $tweet_image,
             "likes_counts" => $likes_counts,
             "retweet_counts" => $retweet_counts,
             "posted_on" => $posted_on,
             "retweet_Msg" => $retweet_msg,
           );
        }
        foreach ($CountRetweet as $countsRetweet) {
            # code...
            return $countsRetweet; // Return the $contacts array
        }

    }

    public function delete($table,$array)
    {
        $mysqli= $this->database;
        $query= "DELETE FROM $table";
        $where= " WHERE"; 
        foreach ($array as $name => $value) {
            # code...
             $query .= "{$where} {$name} = {$value}";
             $where= " AND"; 
        }

        $row= $mysqli->query($query);

        // if($row){
        //         exit('<div class="alert alert-success alert-dismissible fade show text-center">
        //             <button class="close" data-dismiss="alert" type="button">
        //                 <span>&times;</span>
        //             </button>
        //             <strong>SUCCESS</strong> </div>');
        //     }else{
        //         exit('<div class="alert alert-danger alert-dismissible fade show text-center">
        //             <button class="close" data-dismiss="alert" type="button">
        //                 <span>&times;</span>
        //             </button>
        //             <strong>Fail to delete !!!</strong>
        //         </div>');
        // }

    }

    public function countsPosts($user_id)
    {
        $mysqli= $this->database;
        $query= "SELECT COUNT('tweet_id') AS TotalPosts FROM tweets WHERE tweetBy = $user_id AND retweet_id = 0 OR retweet_by= $user_id";
        $sql =$mysqli->query($query);
        $row = $sql->fetch_array();
        $total= array_shift($row);
        $array= array(0,$total);
        $totals= array_sum($array);
        return $totals;
    }

    static public function countsPostss($user_id)
    {
        $mysqli= self::$databases;
        $query= "SELECT COUNT('tweet_id') AS TotalPosts FROM tweets WHERE tweetBy = $user_id AND retweet_id = 0 OR retweet_by= $user_id";
        $sql =$mysqli->query($query);
        $row = $sql->fetch_array();
        $total= array_shift($row);
        $array= array(0,$total);
        $totals= array_sum($array);
        return $totals;
    }

     public function countsLike($user_id)
    {
        $mysqli= $this->database;
        $query= "SELECT COUNT('like_id') AS TotalLikes FROM likes WHERE like_by = $user_id";
        $sql =$mysqli->query($query);
        $row = $sql->fetch_array();
        $total= array_shift($row);
        $array= array(0,$total);
        $totals= array_sum($array);
        return $totals;
    }

     public function getUserTweet($user_id)
    {
        $mysqli= $this->database;
        $stmt = $mysqli->stmt_init();
        $query= "SELECT * FROM tweets LEFT JOIN users ON tweetBy = user_id WHERE tweetBy = $user_id AND retweet_id = 0 OR retweet_by= $user_id ORDER BY tweet_id DESC";
        // $query="SELECT * FROM tweets LEFT JOIN users ON tweetBy= user_id WHERE tweetBy = $user_id AND retweet_id='0' OR  retweet_by= $user_id AND tweetBy IN (SELECT receiver FROM follow WHERE sender= $user_id) ORDER BY tweet_id DESC ";
        $sql = $mysqli->query($query);
        $all_tweet=array();
        while ($row = $sql->fetch_array()) {
            $data[] = $row;
            /* TABLE OF tweety */
        }
        if(!empty($data)){
                             foreach ($data as $tweet) {
                                $likes= $this->likes($user_id,$tweet['tweet_id']);
                                $retweet= $this->checkRetweet($tweet['tweet_id'],$user_id);
                                $user= $this->userData($tweet['retweet_by']);
                                     # code... 
                                    //  echo var_dump($retweet['retweet_Msg']).'<br>';
                                ?>
                                <!-- <div class="card mb-3"> -->
                                    <!-- <div class="card-body"> -->
                                   
                                <div class="post ">
                                    <?php 
                                     if($retweet['retweet_id'] == $tweet["tweet_id"] || $tweet["retweet_id"] > 0){ ?>
                                      <span class="t-show-banner">
                                          <div class="t-show-banner-inner">
                                              <span><i class="fa fa-retweet "></i></span><span><?php echo $user['username'].' Shared';?></span>
                                          </div>
                                      </span>
                                     <?php } else{ echo '';}?>

                               <?php if(!empty($retweet['retweet_Msg']) && $tweet["tweet_id"] == $retweet["retweet_id"] || $tweet["retweet_id"] > 0){ ?> 
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
                                            <a style="float:left;padding-right:3px;" href="<?php echo PROFILEBASE_URL_PUBLIC.$user['username'] ;?>"><?php echo $user['firstname']." ".$user['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                            <span class="description">Shared public - <?php echo $this->timeAgo($retweet['posted_on']); ?></span>
                                        </span>
                                        <span class="description"><?php echo $this->getTweetLink($retweet['retweet_Msg']); ?></span>
                                    </div>

                                    <div class="card retweetcolor t-show-popup more" data-tweet="<?php echo $tweet["tweet_id"];?>">
                                      <div class="card-body ">
                                        <?php if (!empty($tweet['tweet_image'])) {
                                     			    $expode = explode("=",$tweet['tweet_image']); 
                                                    $count = count($expode); ?>
                                          <div class="row">
                                              <div class="col-6 ">

                                               <?php if ($count === 1) { ?>
                                                    <div class="row mb-1">
                                                           <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                                       <div class="col-sm-12">
                                                           <img class="img-fluid"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                    </div>

                                               <?php }else if($count == 2 || $count > 2){ ?>
                                                     <div class="row mb-2">
                                                           <?php 
                                                             $expode = explode("=",$tweet['tweet_image']);
                                                             $splice= array_splice($expode,0,2);
                                                             for ($i=0; $i < count($splice); ++$i) { 
                                                             ?>
                                                       <div class="col-sm-6">
                                                           <img class="img-fluid mb-2"
                                                               src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                               alt="Photo">
                                                       </div>
                                                           <?php } ?>
                                                    </div>
                                                    <div class="row">
                                                       <div class="col-sm-12">
                                                            <span class="btn btn-primary btn-sm float-right" >View More photo >>></span>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                               <?php } ?>
                                                </div> <!-- col -->

                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                              <div class="user-block">
                                                                  <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                  <span class="username">
                                                                      <a style="float:left;padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                      <!-- //Jonathan Burke Jr. -->
                                                                      <span class="description">Public </span>
                                                                  </span>
                                                                  <span class="description"> <?php echo $this->getTweetLink($tweet['status']); ?></span>
                                                              </div>
                                                        </div> <!-- col -->

                                                        <div class="col-12" style="clear:both">
                                     		    	          <!-- STATUS -->
                                                             <span><?php 
                                                             $tatus= $this->getTweetLink($tweet['status']);
                                                             if(!empty($tatus)){
                                                             $post = (strlen($tatus) > 140)? 
                                                                           strtolower(substr($tatus,0,strlen($tatus)-140).' ...
                                                                                <span class="btn btn-primary btn-sm float-right" >
                                                                                View More >>></span>
                                                                           '): $tatus;
                                                             echo $post;
                                                            }else{
                                                            
                                                              echo '<div class="text-center p-0 m-0 imageViewPopup"  data-tweet="'.$tweet["tweet_id"].'" ><span style="text-decoration:none;color:#333333;" 
                                                                                ><i class="fa fa-photo" style="font-size:50px;"></i></span></div>';
                                                             } ?>
                                                             </span>
                                                        </div><!-- col -->
                                                        
                                                    </div><!-- row -->
                                                </div><!-- col -->
                                           </div><!-- row -->
                                           
                                            <?php }else { ?>
                                                    <div class="row">
                                                       <div class="col-12">

                                                              <div class="user-block">
                                                                    <div class="user-blockImgBorder">
                                                                   <div class="user-blockImg">
                                                                         <?php if (!empty($tweet['profile_img'])) {?>
                                                                         <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                                                         <?php  }else{ ?>
                                                                           <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                                                         <?php } ?>
                                                                   </div>
                                                                   </div>
                                                                   <span class="username">
                                                                       <a style="float:left;padding-right:3px;" href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                                                       <!-- //Jonathan Burke Jr. -->
                                                                       <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                                                   </span>
                                                                   <span class="description"><?php echo $this->getTweetLink($tweet['status']); ?></span>
                                                               </div>

                                                        </div><!-- col -->
                                                    </div><!-- row -->

                                            <?php } ?>

                                      </div><!-- card-body -->
                                    </div><!-- card -->

                                <?php } else { ?> 

                                    <div class="user-block">
                                       <div class="user-blockImgBorder">
                                         <div class="user-blockImg">
                                               <?php if (!empty($tweet['profile_img'])) {?>
                                               <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $tweet['profile_img'] ;?>" alt="User Image">
                                               <?php  }else{ ?>
                                                 <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                               <?php } ?>
                                         </div>
                                         </div>
                                        <span class="username">
                                            <a href="<?php echo BASE_URL_PUBLIC.$tweet['username'] ;?>"><?php echo $tweet['firstname']." ".$tweet['lastname'] ;?></a>
                                            <!-- //Jonathan Burke Jr. -->
                                        </span>
                                        <span class="description">Shared publicly - <?php echo $this->timeAgo($tweet['posted_on']); ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <?php 
                                     $expodefile = explode("=",$tweet['tweet_image']);
                                    $fileActualExt= array();
                                    for ($i=0; $i < count($expodefile); ++$i) { 
                                        $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
                                    }
                                    $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
                                    if (array_diff($fileActualExt,$allower_ext) == false) {
                                    // if (!empty($tweet['tweet_image'])) {
                                        $expode = explode("=",$tweet['tweet_image']);
                                        $count = count($expode); ?>

                                     <?php if ($count === 1) { ?>

                                     <div class="row mb-1">
                                            <?php $expode = explode("=",$tweet['tweet_image']); ?>
                                        <div class="col-sm-12 more">
                                            <img class="img-fluid imagePopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$expode[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                     </div>


                                    <?php
                                     }else if($count === 2){?>
                                        <div class="row mb-2 more">
                                                <?php $expode = explode("=",$tweet['tweet_image']);
                                                  $splice= array_splice($expode,0,2);
                                                  for ($i=0; $i < count($splice); ++$i) { 
                                                  ?>
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-2 imagePopup"
                                                    src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                    alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                            </div>
                                                <?php }?>
                                        </div>

                                    <?php }else if($count === 3 || $count > 3){?>
                                     <div class="row mb-2 more">
                                            <?php $expode = explode("=",$tweet['tweet_image']);
                                              $splice= array_splice($expode,0,1);
                                              ?>
                                        <div class="col-sm-6">
                                            <img class="img-fluid mb-2 imagePopup"
                                                src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[0] ;?>"
                                                alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-sm-6">
                                            <div class="row mb-2 more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    // var_dump($expode);
                                                    $splice= array_splice($expode,1,2);
                                                    // var_dump($splice);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imagePopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                            <div class="row more">
                                                    <?php 
                                                    $expode = explode("=",$tweet['tweet_image']);
                                                    $splice= array_splice($expode,3,2);
                                                     for ($i=0; $i < count($splice); ++$i) { ?>
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-2 imagePopup"
                                                        src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$splice[$i] ;?>"
                                                        alt="Photo"  data-tweet="<?php echo $tweet["tweet_id"] ;?>">
                                                </div>
                                                    <?php }?>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                
                                     <!-- /.row -->
                                    <div class="row">
                                       <div class="col-sm-12">
                                           <span class="btn btn-primary btn-sm float-right imageViewPopup more"  data-tweet="<?php echo $tweet["tweet_id"] ;?>" >View More photo <i class="fa fa-picture-o"></i>  >>></span>
                                        </div>
                                    </div>
                                    <!-- /.row -->


                                       <?php }
                                     
                                    }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp4') { ?>
                                    <div class="row mb-2" >
                                    <div class="col-12" >
                                    <video controls preload="metadata" width="500px"  height="280px" preload="none">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/mp4"> 
                                        <!-- <source src="video/boatride.webm" type="video/webm">  -->
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
                                    </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'webm'){ ?>
                                 <div class="row mb-2">
                                    <div class="col-12">
                                    <video controls poster="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" width="auto" height="auto">
                                        <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="video/webm"> 
                                            <!-- fallback content herehere -->
                                    </video>
                                     </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'mp3'){ ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/mp3">
                                             <!-- fallback content here -->
                                     </audio>
                                      </div>
                                    </div>
                              <?php }else if(array_diff($fileActualExt,$allower_ext)[0] == 'ogg'){ ?>
                                    <audio controls>
                                         <source src="<?php echo BASE_URL_PUBLIC."uploads/posts/".$tweet['tweet_image'] ;?>" type="audio/ogg"> 
                                             <!-- fallback content here -->
                                     </audio>
                              <?php }?>
                                   

                                    <p id="link_">
                                        <?php echo $this->getTweetLink($tweet['status']) ;?>
                                    </p>
                                    
                              <?php }?>

                              <ul class="mt-2 list-inline" style="list-style-type: none; margin-bottom:10px;">  
                                        <?php if($tweet['tweet_id'] == $retweet['retweet_id'] || $user_id == $retweet['retweet_by']){ ?>
                                         <li class=" list-inline-item"><button class="share-btn retweeted text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                         <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet["retweet_counts"];?></span></i>
                                            Share</button></li>
                                        <?php }else{ ?>

                                               <li  class=" list-inline-item"> <button class="share-btn retweet text-sm mr-2" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                <?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?>
                                                   Share</button></li>

                                         <?php } ?>
                                            <?php if($likes['like_on'] == $tweet['tweet_id']){ ?>
                                                <li  class=" list-inline-item"><button class="unlike-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                <i class="fa fa-thumbs-up mr-1" style="color: red"> <span class="likescounter"><?php echo $tweet['likes_counts'] ;?></span></i>
                                                    Like</button></li>

                                            <?php }else{ ?>
                                                  <li  class=" list-inline-item"> <button class="like-btn text-sm" data-tweet="<?php echo $tweet['tweet_id']; ?>"  data-user="<?php echo $tweet['tweetBy']; ?>">
                                                   <i class="fa fa-thumbs-o-up mr-1"> <span class="likescounter"><?php if ($tweet['likes_counts'] > 0){ echo $tweet['likes_counts'];}else{ echo '';} ?></span></i>
                                                       Like</button></li>
                                            <?php } ?>
                                         <span style="float:right">
                                    
                                          <li  class=" list-inline-item"><button class="comments-btn text-sm" data-target="#collapseExampl" data-toggle="collapse">
                                              <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                          </button></li>
                                        

                                         <?php if ($tweet["tweetBy"] == $user_id){ ?>
                                            <li  class=" list-inline-item">
                                                <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                                    <li>
                                                       <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                        <ul style="list-style-type: none; margin:0px;" >
											                <li style="list-style-type: none; margin:0px;"> 
                        					                    <label class="deleteTweet" data-tweet="<?php echo  $tweet["tweet_id"];?>"  data-user="<?php echo $tweet["tweetBy"];?>" >Delete </label>
                                                           </li>
                                                       </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                         <?php }else{ echo '';}?>
                                         </span>
                                </ul>

                                    <div class="card collapse hide" id="collapseExampl">
                                      <div class="card-body">
                                        <!-- Conversations are loaded here -->
                                        <div class="direct-chat-messages">
                                          <!-- Message. Default to the left -->
                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/img/user1-128x128.jpg" alt="message user image">
                                                <!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                  Is this template really for free? That's unbelievable!
                                                </div>
                                              <!-- /.direct-chat-text -->
                                            </div>
                                            <!-- /.direct-chat-msg -->
                        
                                          <!-- Message to the right -->
                                          <div class="direct-chat-msg right">
                                                <div class="direct-chat-info clearfix">
                                                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                 <img class="direct-chat-img" src="<?php echo BASE_URL_LINK ;?>image/img/user3-128x128.jpg" alt="message user image">
                                                 <!-- /.direct-chat-img -->
                                                 <div class="direct-chat-text">
                                                   You better believe it!
                                                 </div> <!-- /.direct-chat-text -->
                                           </div> <!-- /.direct-chat-msg -->
                                        </div> <!-- /.direct-chat-message -->
                                      </div> <!-- /.card-body-->
                                    </div> <!-- /.card /collapse -->

                                    <div class="input-group">
                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        <div class="input-group-append">
                                            <span class="input-group-text btn" onclick="#" aria-label="Username" aria-describedby="basic-addon1"><span
                                                    class="fa fa-arrow-right text-muted"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.post -->
                             <!-- </div> -->
                              <!-- /.card-body -->
                            <!-- </div> -->
                            <!-- /.card-end -->
                                <?php }
       }else{ ?>
                     <div class="post mt-2 ">
                         <div class="user-block mt-4">
                             <div class="user-blockImgBorder">
                            <div class="user-blockImg">
                                  <?php if (!empty($tweet['profile_img'])) {?>
                                  <img src="<?php echo BASE_URL_LINK ;?>image/users_profile_cover/<?php echo $user['profile_img'] ;?>" alt="User Image">
                                  <?php  }else{ ?>
                                    <img src="<?php echo BASE_URL_LINK.NO_PROFILE_IMAGE_URL ;?>" alt="User Image">
                                  <?php } ?>
                            </div>
                            </div>
                             <span class="username">
                                 <a href="<?php echo PROFILE ;?>">Adam Jones</a>
                             </span>
                             <span class="description">Posted 5 photos - 5 days ago</span>
                         </div>
                         <!-- /.user-block -->
                         <div class="row mb-3">
                             <div class="col-sm-6">
                                 <img class="img-fluid"
                                     src="<?php echo BASE_URL_LINK ;?>image/img/photo1.png" alt="Photo">
                             </div>
                             <!-- /.col -->
                             <div class="col-sm-6">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <img class="img-fluid mb-3"
                                             src="<?php echo BASE_URL_LINK ;?>image/img/photo2.png"
                                             alt="Photo">
                                         <img class="img-fluid"
                                             src="<?php echo BASE_URL_LINK ;?>image/img/photo3.jpg"
                                             alt="Photo">
                                     </div>
                                     <!-- /.col -->
                                     <div class="col-sm-6">
                                         <img class="img-fluid mb-3"
                                             src="<?php echo BASE_URL_LINK ;?>image/img/photo4.jpg"
                                             alt="Photo">
                                         <img class="img-fluid"
                                             src="<?php echo BASE_URL_LINK ;?>image/img/photo1.png"
                                             alt="Photo">
                                     </div>
                                     <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- /.row -->

                        <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i>
                                Share</a>
                            <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i>
                                Like</a>
                            <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                    <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                </a>
                            </span>
                        </p>

                        <div class="input-group">
                            <input class="form-control form-control-sm" type="text"
                                placeholder="Type a comment">
                            <div class="input-group-append">
                                <span class="input-group-text btn" onclick="#" aria-label="Username"
                                    aria-describedby="basic-addon1"><i
                                        class="fa fa-arrow-right text-muted"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.post -->
        <?php }

    }

    public function albumPhoto($user_id)
    { 
            $mysqli= $this->database;
            $query= $mysqli->query("SELECT * FROM album WHERE target = $user_id AND album_id= album_id ORDER BY created_on Desc");
            while ($rows = $query->fetch_assoc()) {
                # code...
                $rowx[] = $rows;
            }
             $i = 0;
             $file='';
            foreach($rowx as $key => $value){
                $pre = ($i > 0)?'=':'';
                $file .= $pre.$rowx[$key]['album_image'];
                $i++;
            }

            $expode = explode("=",$file);
            $fileActualExt= array();
            for ($i=0; $i < count($expode); ++$i) { 
                $fileActualExt[]= strtolower(substr($expode[$i],-3));
               }
            
            $fileActualExt[]= 'docx';
            $fileActualExt[]= 'xlsx';
            $allower_ext = array('peg','jpeg', 'jpg', 'png','pdf' , 'doc','docx','ocx', 'lsx','xlsx','xls','zip'); // valid extensions
        
        if (array_diff($fileActualExt,$allower_ext) == false) { ?>
            <div class="row mb-1">
        <?php   for ($i=0; $i < count($expode); ++$i) { 

            if(pathinfo($expode[$i])['extension'] == 'jpg' || pathinfo($expode[$i])['extension'] == 'jpeg'|| pathinfo($expode[$i])['extension'] == 'png') { 
             ?>
               <div class="col-sm-3 more">
                   <img class="img-fluid imagePopup"
                       src="<?php echo BASE_URL_PUBLIC."uploads/album/".$expode[$i] ;?>"
                       alt="Photo"  data-album="<?php echo $rowx[0]['album_id'] ;?>">
               </div>

         <?php }else if(pathinfo($expode[$i])['extension'] == 'docx'|| pathinfo($expode[$i])['extension'] == 'xls'||
                pathinfo($expode[$i])['extension'] == 'doc'|| pathinfo($expode[$i])['extension'] == 'xlsx') { ?>
             <div class="col-sm-3 more">
                 <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                  <div class="mailbox-attachment-info main-active">
                     <a class='colorlightLINK' href="<?php echo BASE_URL_PUBLIC."uploads/album/".pathinfo($expode[$i])['basename'] ;?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                        <?php  echo pathinfo($expode[$i])['basename'] ;?></a>
                     <span class="mailbox-attachment-size colorlightLINK">
                         1,245 KB
                         <a href="#" class="btn btn-default btn-sm "><i
                                 class="fa fa-cloud-download"></i></a>
                     </span>
                 </div>
             </div>
        <?php }else if(pathinfo($expode[$i])['extension'] == 'pdf' ) { ?>
        <div class="col-sm-3 more">
           <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
           <div class="mailbox-attachment-info main-active">
               <a class='colorlightLINK' href="<?php echo BASE_URL_PUBLIC."uploads/album/".pathinfo($expode[$i])['basename'] ;?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                   <?php  echo pathinfo($expode[$i])['basename'] ;?></a>
               <span class="mailbox-attachment-size colorlightLINK">
                   1,245 KB
                   <a href="#" class="btn btn-default btn-sm float-right "><i class="fa fa-cloud-download"></i></a>
               </span>
           </div>
        </div>
        <?php } } ?>
        </div>
      <?php  }  
    } 

    public function albumPhotoTimeline($user_id)
    { 
            $mysqli= $this->database;
            $query= $mysqli->query("SELECT * FROM album WHERE target = $user_id AND album_id= album_id ORDER BY created_on Desc");
            ?>
            <ul class="timeline timeline-inverse">
            <?php while ($row = $query->fetch_assoc()) {
            ?>
            <li class="time-label">
                <span class="bg-success text-light" style="position: absolute;left: 10px;"><?php echo $this->timeAgo($row['created_on']); ?></span>
                <i class="fa fa-photo bg-primary text-light" style="top:50px;"></i>

            <ul class="timeline-item mailbox-attachments clearfix list-inline mb-2">

                            <?php 
                                 $file = $row['album_image'];
                                 $expode = explode("=",$file);
                                 $fileActualExt= array();
                                 for ($i=0; $i < count($expode); ++$i) { 
                                     $fileActualExt[]= strtolower(substr($expode[$i],-3));
                                    }
                                 $fileActualExt[]= 'docx';
                                 $fileActualExt[]= 'xlsx';
                                 $allower_ext = array('peg','jpeg', 'jpg', 'png','pdf' , 'doc','docx','ocx', 'lsx','xlsx','xls','zip'); // valid extensions
                                
                 if (array_diff($fileActualExt,$allower_ext) == false) {

                     for ($i=0; $i < count($expode); ++$i) { ?>

                             <li  class="list-inline-item">

                       <?php if(pathinfo($expode[$i])['extension'] == 'docx'|| pathinfo($expode[$i])['extension'] == 'xls'||
                                pathinfo($expode[$i])['extension'] == 'doc'|| pathinfo($expode[$i])['extension'] == 'xlsx') { ?>

                                 <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                                  <div class="mailbox-attachment-info main-active">
                                     <a class="colorlightLINK" href="<?php echo BASE_URL_PUBLIC."uploads/album/".pathinfo($expode[$i])['basename'] ;?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                        <?php  echo pathinfo($expode[$i])['basename'] ;?></a>
                                     <span class="mailbox-attachment-size colorlightLINK">
                                         1,245 KB
                                         <a href="#" class="btn btn-default btn-sm float-right"><i
                                                 class="fa fa-cloud-download"></i></a>
                                     </span>
                                 </div>


                    <?php }else if(pathinfo($expode[$i])['extension'] == 'pdf' ) { ?>

                                 <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                 <div class="mailbox-attachment-info main-active">
                                     <a class="colorlightLINK" href="<?php echo BASE_URL_PUBLIC."uploads/album/".pathinfo($expode[$i])['basename'] ;?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                         <?php  echo pathinfo($expode[$i])['basename'] ;?></a>
                                     <span class="mailbox-attachment-size colorlightLINK">
                                         1,245 KB
                                         <a href="#" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download"></i></a>
                                     </span>
                                 </div>

                     <?php }else if(pathinfo($expode[$i])['extension'] == 'jpg' || pathinfo($expode[$i])['extension'] == 'jpeg'|| pathinfo($expode[$i])['extension'] == 'png') { ?>

                                  <span class="mailbox-attachment-icon has-img"><img 
                                    src="<?php echo BASE_URL_PUBLIC."uploads/album/".pathinfo($expode[$i])['basename'] ;?>" ></span>
                                
                                 <div class="mailbox-attachment-info main-active">
                                     <a class="colorlightLINK" href="<?php echo BASE_URL_PUBLIC."uploads/album/".pathinfo($expode[$i])['basename'] ;?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                    <?php  echo pathinfo($expode[$i])['basename'] ;?></a>
                                     <span class="mailbox-attachment-size colorlightLINK">
                                         1,245 KB
                                         <a href="#" class="btn btn-default btn-sm float-right"><i
                                                 class="fa fa-cloud-download"></i></a>
                                     </span>
                                 </div>
                     <?php } ?>
                          </li>

                    <?php } } ?>
                </ul>
                <hr class="main-active" style="width:80%" >
                </li> <!-- END timeline item -->
   <?php } ?>
                <li >
                    <i class="fa fa-clock-o bg-info text-light"></i>
                </li>
            </ul>
  <?php  }

}
$home= new Home();
?>