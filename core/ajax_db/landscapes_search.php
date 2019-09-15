<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['province']) && !empty($_POST['province'])) {
    echo $landscapes->KigalicityList($_POST['province']); 
}

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $user_id= $_SESSION['key'];
    $search= $users->test_input($_POST['search']);
    $result= $home->landscapeSearchJobs($search);
    echo '<h4 style="padding: 0px 10px;">'.$_POST['search'].'</h4> ';

     if (is_array($result) || is_object($result)){ ?>
     <div class="row">

    <?php foreach ($result as $row) { ?>

        <div class="col-md-6">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)" id="sports-readmore" data-sports="cs"> <?php echo $row['title_'] ;?></a>
                   </h5>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->

    <?php } ?>

    </div><!-- row -->

   <?php  }
} 

if (isset($_POST['districts']) && !empty($_POST['districts'])) {
    $user_id= $_SESSION['key'];

    $pages= $_POST['pages'];
    $categories= $_POST['districts'];
    
    if($pages === 0 || $pages < 1){
        $showpages = 0 ;
    }else{
        $showpages = ($pages*6)-6;
    }

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    $query0= $mysqli->query("SELECT location_Sector FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    // $query1= $mysqli->query("SELECT COUNT(location_Sector) FROM rwandalandscapes WHERE location_Sector=location_Sector  GROUP BY location_Sector HAVING  COUNT(DISTINCT location_Sector)= 1 ORDER BY created_on_ Desc ");
     $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_Sector
            FROM `rwandalandscapes`
            WHERE location_districts='{$categories}'
            ) AS DerivedTableAlias ");
    ?>
    <button type="button" class="btn btn-primary btn-sm  mb-3"id="kigali-districts-readmore" data-province="<?php echo $bck['location_province'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
    
     <div class="row">
     <div class="col-md-12">
      <div class="card">
        <div class="card-header main-active p-1">
           <form class="form-inline float-right">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                  </div>
                  <input type="text" class="form-control searchvirunga"  aria-describedby="helpId" placeholder="Search virunga any place in rwanda">
              </div>
            </form>
          <h5 class="card-title text-center pl-2"><i> <?php echo $categories; ?> Districts Landscapes</i></h5>
        </div>
        <div class="card-body">
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
            <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<span><span class="h5 text-success">'.$categories.' Districts</span> has '.$totals.' Sectors are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Sector, ':' Sector.';
                     $Districts .= $conditionz['location_Sector'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</span>" ;
            ?>
          <div class="row mt-3">
          
         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-6">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)"  id="sector-readmore" data-sector="<?php echo $row['location_Sector'] ;?>"> <?php echo $row['location_Sector'] ;?></a>
                   </h5>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->

        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
        </div><!-- card-body -->
       </div><!-- card -->
       </div><!-- col -->
       </div><!-- row -->

        <?php
        $query2= $mysqli->query("SELECT COUNT(*) FROM rwandalandscapes WHERE location_districts='{$categories}' ");
        $row_Paginaion = $query2->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/6;
        $post_Perpage = ceil($post_Perpages);

      if($post_Perpage > 1){ ?>
    <nav id="landscape-paginat">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php } 

    } 

if (isset($_POST['sector']) && !empty($_POST['sector'])) {
    $user_id= $_SESSION['key'];

    $pages= $_POST['pages'];
    $categories= $_POST['sector'];
    
    if($pages === 0 || $pages < 1){
        $showpages = 0 ;
    }else{
        $showpages = ($pages*6)-6;
    }

    $mysqli= $db;
     $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    $query0= $mysqli->query("SELECT location_cell FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    // $query1= $mysqli->query("SELECT COUNT(DISTINCT location_cell)= 1 FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
     $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_cell
            FROM `rwandalandscapes`
            WHERE location_Sector='{$categories}'
            ) AS DerivedTableAlias ");
    ?>
    <button type="button" class="btn btn-primary btn-sm  mb-3" id="districts-readmore" data-districts="<?php echo $bck['location_districts'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
    
     <div class="row">
     <div class="col-md-12">
      <div class="card">
        <div class="card-header main-active p-1">
           <form class="form-inline float-right">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                  </div>
                  <input type="text" class="form-control searchvirunga"  aria-describedby="helpId" placeholder="Search virunga any place in rwanda">
              </div>
            </form>
          <h5 class="card-title text-center pl-2"><i> <?php echo $categories; ?> Sectors Landscapes</i></h5>

        </div>
        <div class="card-body">
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
          <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<span><span class="h5 text-danger">'.$categories.' Sectors</span> has '.$totals.' Cell are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' cell, ':' cell.';
                     $Districts .= $conditionz['location_cell'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</span>" ;
            ?>
          <div class="row mt-3">
          
         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-6">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)"  id="cell-readmore" data-cell="<?php echo $row['location_cell'] ;?>"> <?php echo $row['location_cell'] ;?></a>
                   </h5>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->

        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
        </div><!-- card-body -->
       </div><!-- card -->
       </div><!-- col -->
       </div><!-- row -->

        <?php
        $query2= $mysqli->query("SELECT COUNT(*) FROM rwandalandscapes WHERE location_Sector='{$categories}' ");
        $row_Paginaion = $query2->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/6;
        $post_Perpage = ceil($post_Perpages);

      if($post_Perpage > 1){ ?>
    <nav id="landscape-paginat">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php } 

    } 

if (isset($_POST['cell']) && !empty($_POST['cell'])) {
    $user_id= $_SESSION['key'];

    $pages= $_POST['pages'];
    $categories= $_POST['cell'];
    
    if($pages === 0 || $pages < 1){
        $showpages = 0 ;
    }else{
        $showpages = ($pages*6)-6;
    }

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    $query0= $mysqli->query("SELECT location_village FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc Limit $showpages,6");
    // $query1= $mysqli->query("SELECT COUNT(DISTINCT location_village)= 1 FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
     $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_village
            FROM `rwandalandscapes`
            WHERE location_cell='{$categories}'
            ) AS DerivedTableAlias ");
   ?>
    <button type="button" class="btn btn-primary btn-sm  mb-3" id="sector-readmore" data-sector="<?php echo $bck['location_Sector'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
    
     <div class="row">
     <div class="col-md-12">

      <div class="card">
        <div class="card-header main-active p-1">
           <form class="form-inline float-right">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                  </div>
                  <input type="text" class="form-control searchvirunga"  aria-describedby="helpId" placeholder="Search virunga any place in rwanda">
              </div>
            </form>
          <h5 class="card-title text-center pl-2"><i> <?php echo $categories; ?> cells Landscapes</i></h5>

        </div>
        <div class="card-body">
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
           <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<span><span class="h5 text-warning">'.$categories.' cells</span> has '.$totals.' Villages are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Village, ':' Village.';
                     $Districts .= $conditionz['location_village'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</span>" ;
            ?>
          <div class="row mt-3">
          
         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-6">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)"  id="village-readmore" data-village="<?php echo $row['landscape_id'] ;?>"> <?php echo $row['location_village'] ;?></a>
                   </h5>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->

        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
        </div><!-- card-body -->
       </div><!-- card -->
       </div><!-- col -->
       </div><!-- row-->

        <?php
        $query2= $mysqli->query("SELECT COUNT(*) FROM rwandalandscapes WHERE location_cell='{$categories}' ");
        $row_Paginaion = $query2->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/6;
        $post_Perpage = ceil($post_Perpages);

      if($post_Perpage > 1){ ?>
    <nav id="landscape-paginat">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="gasabo_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php } 

    } 

if (isset($_POST['village_id']) && !empty($_POST['village_id'])) {
    $user_id= $_SESSION['key'];
    $village_id = $_POST['village_id'];
    $mysqli= $db;
    $query0= $mysqli->query("SELECT * FROM rwandalandscapes WHERE landscape_id='{$village_id}'");
    $row0= $query0->fetch_array();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE landscape_id='{$village_id}'");
     ?>

    <div class="landscapes-popup">
        <div class="wrap6">
            <span class="colose">
            	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
            <div class="img-popup-wrap">
            	<div class="img-popup-body">
    
                <div class="card">
                    <div class="card-header text-center">
                        <h5><i><?php echo $row0['location_village']." Village"; ?></i></h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                         
                        <div id="jssor_3" style="position:relative;margin:0 auto;top:0px;left:0px;width:940px;height:380px;overflow:hidden;visibility:hidden;">
                           <!-- Loading Screen -->
                           <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                               <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo BASE_URL_LINK."image/img/"?>img/spin.svg" />
                           </div>
                           <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:940px;height:380px;overflow:hidden;">
                               <?php  while($row= $query->fetch_array()) { ?>
                                      <div> 
                                          <img data-u="image" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_'] ;?>" />
                                          <div u="thumb"><?php echo $row['title_'] ;?></div>
                                      </div>
                              
                                <?php } ?>

                           </div>
                           <!-- Thumbnail Navigator -->
                           <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:940px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
                               <div u="slides">
                                   <div u="prototype" style="position:absolute;top:0;left:0;width:940px;height:50px;">
                                       <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                                   </div>
                               </div>
                           </div>
                           <!-- Arrow Navigator -->
                           <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                               <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                   <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
                               </svg>
                           </div>
                           <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                               <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                   <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
                               </svg>
                           </div>
                       </div>
                       <script type="text/javascript">jssor_3_slider_init();</script>
                   
                       </div> <!-- col-md-12 -->
                   
                       <div class="col-md-12 mt-3">
                       </div> <!-- col-md-12 -->

                    </div> <!-- card-body -->
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>

          </div><!-- img-popup-body -->
        </div><!-- tweet-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

<?php
}
?>
