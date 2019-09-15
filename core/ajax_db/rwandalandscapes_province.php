<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['province']) && !empty($_POST['province'])) {
    echo $landscapes->provinceList($_POST['province']); 
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
    $query1= $mysqli->query("SELECT COUNT(DISTINCT location_districts)= 1 FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    ?>
    <button type="button" class="btn btn-primary btn-sm  mb-3"id="province-readmore" data-province="<?php echo $bck['location_province'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
    
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
                  <a class="text-primary" href="javascript:void(0)"  id="province-sector-readmore" data-sector="<?php echo $row['location_Sector'] ;?>"> <?php echo $row['location_Sector'] ;?></a>
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
    $query1= $mysqli->query("SELECT COUNT(DISTINCT location_cell)= 1 FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");

    ?>
    <button type="button" class="btn btn-primary btn-sm  mb-3" id="province-districts-readmore" data-districts="<?php echo $bck['location_districts'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
    
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
                  <a class="text-primary" href="javascript:void(0)"  id="province-cell-readmore" data-cell="<?php echo $row['location_cell'] ;?>"> <?php echo $row['location_cell'] ;?></a>
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
    $query1= $mysqli->query("SELECT COUNT(DISTINCT location_village)= 1 FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");

    ?>
    <button type="button" class="btn btn-primary btn-sm  mb-3" id="province-sector-readmore" data-sector="<?php echo $bck['location_Sector'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
    
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
?>