<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['province']) && !empty($_POST['province'])) { 
        $categories= $_POST['province'];

        $mysqli= $db;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_province= '{$categories}' AND location_districts= location_districts GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc , rand() ");
        $query0= $mysqli->query("SELECT location_districts FROM rwandalandscapes WHERE location_province='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
        $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        ?>

        <span class="job-show"></span>
        <div class="job-hide">
        <h5 class="text-dark text-center"   style="background:#faebd7;padding:10px;"><i><?php echo $categories;?> Landscapes</i></h5>
            <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-success">'.$categories.' </span> has '.$totals.' Districts are :  ';
                $i= 0;
                $Districts='';
                
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < 0)?' Districts, ':' Districts.';
                     $Districts .= $conditionz['location_districts'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</div></br>" ;
            ?>
          <div class="row">

          <?php while($row= $query->fetch_array()) { ?>
        <div class="col-md-12">

            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                    <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                    <a class="text-primary" href="javascript:void(0)"  id="districts-view" data-districts="<?php echo $row['location_districts'] ;?>"><?php echo $row['location_districts'] ;?> Districts</a>
                    </h5>
                    <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                    <p class="card-text mb-1">vIEW Different Landscapes of <?php echo $row['location_districts'] ;?> Districts</p>
                </div><!-- card-body -->
            </div><!-- card -->
            </div><!-- card -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
    </div>
    </div>
<?php  }

if (isset($_POST['districts']) && !empty($_POST['districts'])) {
    $user_id= $_SESSION['key'];
    $categories= $_POST['districts'];

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $query0= $mysqli->query("SELECT location_Sector FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_Sector
            FROM `rwandalandscapes`
            WHERE location_districts='{$categories}'
            ) AS DerivedTableAlias ");
    ?>

         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="province-view" data-province="<?php echo $bck['location_province'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $categories; ?> Districts Landscapes</i></h5>
          </div>
            <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-success">'.$categories.' Districts</span> has '.$totals.' Sectors are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Sector, ':' Sector.';
                     $Districts .= $conditionz['location_Sector'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</div></br>" ;
            ?>
          <div class="row">
          
         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-12">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)"  id="sector-view" data-sector="<?php echo $row['location_Sector'] ;?>"> <?php echo $row['location_Sector'] ;?></a>
                   </h5>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
    
    <?php } 

if (isset($_POST['sector']) && !empty($_POST['sector'])) {
   
    $categories= $_POST['sector'];
    
    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $query0= $mysqli->query("SELECT location_cell FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_cell
            FROM `rwandalandscapes`
            WHERE location_Sector='{$categories}'
            ) AS DerivedTableAlias ");
    ?>
    
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="districts-view" data-districts="<?php echo $bck['location_districts'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $categories; ?> Sector Landscapes</i></h5>
          </div>
          <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-danger">'.$categories.' Sectors</span> has '.$totals.' Cell are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' cell, ':' cell.';
                     $Districts .= $conditionz['location_cell'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</div></br>" ;
            ?>
          <div class="row">
          
         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-12">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)"  id="cell-view" data-cell="<?php echo $row['location_cell'] ;?>"> <?php echo $row['location_cell'] ;?></a>
                   </h5>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
<?php } 

if (isset($_POST['cell']) && !empty($_POST['cell'])) {
    
    $categories= $_POST['cell'];

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $query0= $mysqli->query("SELECT location_village FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_village
            FROM `rwandalandscapes`
            WHERE location_cell='{$categories}'
            ) AS DerivedTableAlias ");
    ?>
    
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="sector-view" data-sector="<?php echo $bck['location_Sector'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $categories; ?> Cell Landscapes</i></h5>
          </div>
           <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-warning">'.$categories.' cells</span> has '.$totals.' Villages are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Village, ':' Village.';
                     $Districts .= $conditionz['location_village'].$pre;
                     $i++;
                 }
                 echo $District.$Districts."</div></br>" ;
            ?>
          <div class="row">
          
         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-12">
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
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
      
    <?php } 

    if (isset($_POST['search']) && !empty($_POST['search'])) {
    $user_id= $_SESSION['key'];
    $search= $users->test_input($_POST['search']);
    $result= $home->landscapeSearchJobs($search);
    echo '<h4 style="padding: 0px 10px;">'.$_POST['search'].'</h4> ';

     if (is_array($result) || is_object($result)){ ?>
     <div class="row">

    <?php foreach ($result as $row) { ?>

        <div class="col-md-12">
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

?>