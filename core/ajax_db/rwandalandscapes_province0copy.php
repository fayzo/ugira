<?php
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['province']) && !empty($_POST['province'])) { 
        $categories= $_POST['province'];

        $mysqli= $db;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
        WHERE location_province= '{$categories}' AND location_districts= location_districts GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc , rand() ");
        
        $query3= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
        WHERE location_province= '{$categories}' AND location_districts= location_districts GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc , rand() ");
        $row3=$query3->fetch_assoc();
        
        $query0= $mysqli->query("SELECT location_districts,namedistrict FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage 
        WHERE location_province='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
        
        $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        $get_province = mysqli_query($db,"SELECT * FROM provinces");   
        ?>

        <span class="landscapes-show"></span>
        <div class="landscapes-hide">
           <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form" id="form" >
        <div class="form-row mb-2 pt-2 pb-2" style="background:#faebd7;">
            <div class="col">
                <label for="" class="text-dark">Province</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control">
                        <option value="">----Select province----</option>
                        <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                        <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="" class="text-dark"> District</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="districtcode" id="districtcode" onchange="showResult2();" >
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Sector" class="text-dark">Sector</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Cell" class="text-dark">Cell</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="codecell" id="codecell" class="form-control" onchange="showResultCellOnLandscapes();">
                        <option></option>
                    </select>
                </div>
            </div>
        </div>
        </form>
<?php 
if ($query->num_rows > 0) { ?>
        <div id="landscapes-hide">

        <h5 class="text-dark text-center"   style="background:#faebd7;padding:10px;"><i><?php echo $row3['provincename'];?> Landscapes</i></h5>
            <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-success">'.$row3['provincename'].' </span> has '.$totals.' Districts are :  ';
                $i= 0;
                $Districts='';
                
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < 0)?' Districts, ':' Districts.';
                     $Districts .= $conditionz['namedistrict'].$pre;
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
                    <a class="text-primary" href="javascript:void(0)"  id="districts-view" data-districts="<?php echo $row['location_districts'] ;?>"><?php echo $row['namedistrict'] ;?> Districts</a>
                    </h5>
                     <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                     <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>

                    <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                    <p class="card-text mb-1">vIEW Different Landscapes of <?php echo $row['location_districts'] ;?> Districts</p>
                </div><!-- card-body -->
            </div><!-- card -->
            </div><!-- card -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
      </div>
  <?php }else {
           		echo ' No yet to register villages found';
        } ?>
    </div>
    </div>
<?php  }

if (isset($_POST['districts']) && !empty($_POST['districts'])) {
    $user_id= $_SESSION['key'];
    $categories= $_POST['districts'];

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $query3= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $row3=$query3->fetch_assoc();

    $query0= $mysqli->query("SELECT location_Sector,namesector FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_districts='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_Sector
            FROM `rwandalandscapes`
            WHERE location_districts='{$categories}'
            ) AS DerivedTableAlias ");
        $get_province = mysqli_query($db,"SELECT * FROM provinces");   
    ?>

         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form" id="form" >
        <div class="form-row mb-2 pt-2 pb-2" style="background:#faebd7;">
            <div class="col">
                <label for="" class="text-dark">Province</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control">
                        <option value="">----Select province----</option>
                        <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                        <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="" class="text-dark"> District</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="districtcode" id="districtcode" onchange="showResult2();" >
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Sector" class="text-dark">Sector</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Cell" class="text-dark">Cell</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="codecell" id="codecell" class="form-control" onchange="showResultCellOnLandscapes();">
                        <option></option>
                    </select>
                </div>
            </div>
        </div>
        </form>
<?php 
if ($query->num_rows > 0) { ?>
        <div id="landscapes-hide">

          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="province-view" data-province="<?php echo $bck['location_province'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $row3['namedistrict']; ?> Districts Landscapes</i></h5>
          </div>
            <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-success">'.$row3['namedistrict'].' Districts</span> has '.$totals.' Sectors are :  ';
                $i= 0;
                $Districts='';
                
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Sector, ':' Sector.';
                     $Districts .= $conditionz['namesector'].$pre;
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
                  <a class="text-primary" href="javascript:void(0)"  id="sector-view" data-sector="<?php echo $row['location_Sector'] ;?>"> <?php echo $row['namesector'] ;?> Sector</a>
                   </h5>
                   <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                   <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>

                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
      </div>
      <?php }else {
           		echo ' No yet to register villages found';
           	} ?>
          </div><!-- row -->
          </div><!-- hide -->
    
    <?php } 

if (isset($_POST['sector']) && !empty($_POST['sector'])) {
   
    $categories= $_POST['sector'];
    
    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    $query= $mysqli->query("SELECT * FROM rwandalandscapes  R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $query3= $mysqli->query("SELECT * FROM rwandalandscapes  R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $row3=$query3->fetch_assoc();
    
    $query0= $mysqli->query("SELECT location_cell,nameCell FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_Sector='{$categories}' GROUP BY location_cell HAVING  COUNT(DISTINCT location_cell)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_cell
            FROM `rwandalandscapes`
            WHERE location_Sector='{$categories}'
            ) AS DerivedTableAlias ");
        $get_province = mysqli_query($db,"SELECT * FROM provinces");   
    ?>
    
         <span class="landscapes-show"></span>
          <div class="landscapes-hide" >
             <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form" id="form" >
        <div class="form-row mb-2 pt-2 pb-2" style="background:#faebd7;">
            <div class="col">
                <label for="" class="text-dark">Province</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control">
                        <option value="">----Select province----</option>
                        <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                        <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="" class="text-dark"> District</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="districtcode" id="districtcode" onchange="showResult2();" >
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Sector" class="text-dark">Sector</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Cell" class="text-dark">Cell</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="codecell" id="codecell" class="form-control" onchange="showResultCellOnLandscapes();">
                        <option></option>
                    </select>
                </div>
            </div>
        </div>
        </form>
<?php 
if ($query->num_rows > 0) { ?>

        <div id="landscapes-hide">

          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="districts-view" data-districts="<?php echo $bck['location_districts'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $row3['namesector']; ?> Sector Landscapes</i></h5>
          </div>
          <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-danger">'.$row3['namesector'].' Sectors</span> has '.$totals.' Cell are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' cell, ':' cell.';
                     $Districts .= $conditionz['nameCell'].$pre;
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
                  <a class="text-primary" href="javascript:void(0)"  id="cell-view" data-cell="<?php echo $row['location_cell'] ;?>"> <?php echo $row['nameCell'] ;?> Cell</a>
                   </h5>
                   <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                   <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>

                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
      </div>
      <?php }else {
           		echo ' No yet to register villages found';
           	} ?>
          </div><!-- row -->
          </div><!-- hide -->
<?php } 


if (isset($_POST['cell']) && !empty($_POST['cell'])) {
     
    $categories= $_POST['cell'];

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    // $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    // $query0= $mysqli->query("SELECT location_village FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $query= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");

    $query3= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $row3=$query3->fetch_assoc();

    $query0= $mysqli->query("SELECT location_village,VillageName FROM rwandalandscapes  R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_village
            FROM `rwandalandscapes`
            WHERE location_cell='{$categories}'
            ) AS DerivedTableAlias ");
        $get_province = mysqli_query($db,"SELECT * FROM provinces");   
    
	  if ($query->num_rows > 0) {
    ?>
 
         <span class="landscapes-show"></span>
          <div class="landscapes-hide" >
                  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form" id="form" >
        <div class="form-row mb-2 pt-2 pb-2" style="background:#faebd7;">
            <div class="col">
                <label for="" class="text-dark">Province</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="provincecode"  id="provincecode" onchange="showResult();" class="form-control">
                        <option value="">----Select province----</option>
                        <?php while($show_province = mysqli_fetch_array($get_province)) { ?>
                        <option value="<?php echo $show_province['provincecode'] ?>"><?php echo $show_province['provincename'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="" class="text-dark"> District</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="districtcode" id="districtcode" onchange="showResult2();" >
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Sector" class="text-dark">Sector</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select class="form-control" name="sectorcode" id="sectorcode"  onchange="showResult3();">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="Cell" class="text-dark">Cell</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="codecell" id="codecell" class="form-control" onchange="showResultCellOnLandscapes();">
                        <option></option>
                    </select>
                </div>
            </div>
        </div>
        </form>

          <div id="landscapes-hide">

          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="sector-view" data-sector="<?php echo $bck['location_Sector'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $row3['nameCell']; ?> Cell Landscapes</i></h5>
          </div>
           <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-warning">'.$row3['nameCell'].' cells</span> has '.$totals.' Villages are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Village, ':' Village.';
                     $Districts .= $conditionz['VillageName'].$pre;
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
                  <a class="text-primary" href="javascript:void(0)"  id="village-readmore" data-village="<?php echo $row['landscape_id'] ;?>"> <?php echo $row['VillageName'] ;?> Village</a>
                </h5>
                   <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                   <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>

          </div>
          </div><!-- row -->
          </div><!-- hide -->
		  
	<?php 

	}else {
		echo ' No yet to register villages found';
	}

}


if (isset($_POST['cell0']) && !empty($_POST['cell0'])) {
     
    $categories= $_POST['cell0'];

    $mysqli= $db;
    $querybck= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $bck= $querybck->fetch_assoc();
    // $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    // $query0= $mysqli->query("SELECT location_village FROM rwandalandscapes WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $query= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");

    $query3= $mysqli->query("SELECT * FROM rwandalandscapes R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $row3=$query3->fetch_assoc();

    $query0= $mysqli->query("SELECT location_village,VillageName FROM rwandalandscapes  R
            Left JOIN provinces P ON R. location_province = P. provincecode
						Left JOIN districts D ON R. location_districts = D. districtcode
						Left JOIN sectors T ON R. location_Sector = T. sectorcode
						Left JOIN cells C ON R. location_cell = C. codecell
						Left JOIN vilages V ON R. location_village = V. CodeVillage
    WHERE location_cell='{$categories}' GROUP BY location_village HAVING  COUNT(DISTINCT location_village)= 1 ORDER BY created_on_ Desc ");
    $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_village
            FROM `rwandalandscapes`
            WHERE location_cell='{$categories}'
            ) AS DerivedTableAlias ");
        $get_province = mysqli_query($db,"SELECT * FROM provinces");   
    
	  if ($query->num_rows > 0) {
    ?>
 
         <span class="landscapes-show"></span>
          <div class="landscapes-hide"  id="landscapes-hide">
          
          <div style="background:#faebd7;padding:10px;">
            <button type="button" class="btn btn-primary btn-sm  float-left" id="sector-view" data-sector="<?php echo $bck['location_Sector'] ;?>" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
            <h5 class="text-dark text-center"><i> <?php echo $row3['nameCell']; ?> Cell Landscapes</i></h5>
          </div>
           <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<div style="background:#b9b6b22b;padding:10px;"><span class="h5 text-warning">'.$row3['nameCell'].' cells</span> has '.$totals.' Villages are :  ';
                $i= 0;
                $Districts='';
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < count($conditionz))?' Village, ':' Village.';
                     $Districts .= $conditionz['VillageName'].$pre;
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
                  <a class="text-primary" href="javascript:void(0)"  id="village-readmore" data-village="<?php echo $row['landscape_id'] ;?>"> <?php echo $row['VillageName'] ;?> Village</a>
                </h5>
                   <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                   <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>
                   <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                   <p class="card-text mb-1"><?php echo $row['text_'] ;?> </p>
               </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
	<?php 

	}else {
		echo ' No yet to register villages found';
	}

}


?>