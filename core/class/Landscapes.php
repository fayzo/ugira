<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Landscapes extends Home{

    public function CarouselLandscapesList($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE categories_of_landscapes='{$categories}' ORDER BY created_on_ Desc Limit 0,3");
        while($row= $query->fetch_array()) { ?>
        <div> 
            <img data-u="image" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_'] ;?>" />
            <div u="thumb"><?php echo $row['title_'] ;?></div>
        </div>

     <?php } 
    }

    public function LandscapesList($pages,$categories)
    {
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*6)-6;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE categories_of_landscapes='{$categories}' ORDER BY created_on_ Desc Limit $showpages,6");
         ?>
        <div class="card">
        <div class="card-header main-active p-1">
          <h5 class="card-title float-left pl-2"><i> Rwanda Landscapes</i></h5>
           <form class="form-inline float-right">
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                  </div>
                  <input type="text" class="form-control searchvirunga"  aria-describedby="helpId" placeholder="Search virunga any place in rwanda">
              </div>
            </form>
        </div>
        <div class="card-body">
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
          <div class="row">

         <?php while ($row= $query->fetch_assoc()) {  ; ?>

        <div class="col-md-6">
            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                 <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_']; ?>" alt="Card image cap">
               <div class="card-body d-flex flex-column align-items-start pt-0">
                   <h5 class="text-primary mb-0">
                  <a class="text-primary" href="javascript:void(0)" id="village-readmore" data-village="<?php echo $row['landscape_id'] ;?>"> <?php echo $row['title_'] ;?></a>
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

       <?php
        $query2= $mysqli->query("SELECT COUNT(*) FROM rwandalandscapes WHERE categories_of_landscapes='{$categories}' ");
        $row_Paginaion = $query2->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/6;
        $post_Perpage = ceil($post_Perpages);

      if($post_Perpage > 1){ ?>
    <nav id="landscape-paginat">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="landscapes_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="landscapes_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="landscapes_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="landscapes_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php } 
    }

    public function CarouseKigalicityList($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_province='{$categories}' ORDER BY created_on_ Desc Limit 0,3");
        while($row= $query->fetch_array()) { ?>
        <div> 
            <img data-u="image" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_'] ;?>" />
            <div u="thumb"><?php echo $row['title_'] ;?></div>
        </div>

     <?php } 
    }

    public function KigalicityList($categories)
    { 
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_province= '{$categories}' AND location_districts= location_districts GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc , rand() ");
        $query0= $mysqli->query("SELECT location_districts FROM rwandalandscapes WHERE location_province='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
        $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        ?>

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
          <h5 class="card-title text-center pl-2"><i> <?php echo $categories;?> Landscapes</i></h5>
        </div>
        <div class="card-body">
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
            <?php
            // echo var_dump($query1);
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<span><span class="h5 text-success">'.$categories.' </span> has '.$totals.' Districts are :  ';
                $i= 0;
                $Districts='';
                
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < 0)?' Districts, ':' Districts.';
                     $Districts .= $conditionz['location_districts'].$pre;
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
                      <a class="text-primary" href="javascript:void(0)"  id="districts-readmore" data-districts="<?php echo $row['location_districts'] ;?>"><?php echo $row['location_districts'] ;?> Districts</a>
                       </h5>
                       <div class="text-muted">Created on <?php echo $row['created_on_'] ;?> By <?php echo $row['author_'] ;?> </div>
                       <p class="card-text mb-1">vIEW Different Landscapes of <?php echo $row['location_districts'] ;?> Districts</p>
                   </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col -->

        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
        </div><!-- card-body -->
       </div><!-- card -->

    <?php 
    } 

    public function CarouseProvinceList($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_province='{$categories}' ORDER BY created_on_ Desc Limit 0,3");
        while($row= $query->fetch_array()) { ?>
        <div> 
            <img data-u="image" src="<?php echo BASE_URL_PUBLIC ;?>uploads/rwandaLandscapes/<?php echo $row['photo_'] ;?>" />
            <div u="thumb"><?php echo $row['title_'] ;?></div>
        </div>

     <?php } 
    }

    public function provinceList($categories)
    { 
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_province= '{$categories}' AND location_districts= location_districts GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc , rand() ");
        $query0= $mysqli->query("SELECT location_districts FROM rwandalandscapes WHERE location_province='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
        $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        ?>
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
          <h5 class="text-dark text-center" style="background:#faebd7;padding:10px;"><i><?php echo $categories;?> Landscapes</i></h5>
        </div>
        <div class="card-body">
         <span class="landscapes-show"></span>
          <div class="landscapes-hide">
            <?php
                $row1= $query1->fetch_array();
                $total= array_shift($row1);
                $array= array(0,$total);
                $totals= array_sum($array);

                $District= '<span><span class="h5 text-success">'.$categories.' </span> has '.$totals.' Districts are :  ';
                $i= 0;
                $Districts='';
                
                while($conditionz= $query0->fetch_assoc()){
                     $pre = ($i < 0)?' Districts, ':' Districts.';
                     $Districts .= $conditionz['location_districts'].$pre;
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
                      <a class="text-primary" href="javascript:void(0)"  id="province-districts-readmore" data-districts="<?php echo $row['location_districts'] ;?>"><?php echo $row['location_districts'] ;?> Districts</a>
                       </h5>
                       <div class="text-muted">Created on <?php echo ($row['created_on_']) ;?> By <?php echo $row['author_'] ;?> </div>
                       <p class="card-text mb-1">vIEW Different Landscapes of <?php echo $row['location_districts'] ;?> Districts</p>
                   </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col -->

        <?php } ?>

          </div><!-- row -->
          </div><!-- hide -->
        </div><!-- card-body -->
       </div><!-- card -->

    <?php 
    } 

      function landscapesfetchALL($categories)
    {
        $mysqli= $this->database;
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
        
        $get_province = mysqli_query($mysqli,"SELECT * FROM provinces");   
        $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        ?>
        <div class="card card-primary mb-1 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title float-left pl-2"><i> Rwanda landscapes to Search</i></h5>
             <form class="form-inline float-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control searchlandscapes"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                </div>
              </form>

            <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                <nav class="nav d-flex justify-content-between pb-0"  >
                    <!-- kigali-city -->
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories(1);" >kigali city<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS(1);?></span></a>
                         <!-- Northern province -->
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories(4);" >Northern province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS(4);?></span></a>
                        <!-- East province -->
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories(5);" >East province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS(5);?></span></a>
                                 <!-- West province -->
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories(3);" >West province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS(3);?></span></a>
                                <!-- Southern province -->
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories(2);" >Southern province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS(2);?></span></a>
                </nav>
            </div> <!-- nav-scroller -->
        </div> <!-- /.card-header -->

        <div class="card-body">
        <span class="job-show"></span>
        <div class="job-hide">

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

        <h5 class="text-dark text-center" style="background:#faebd7;padding:10px;"><i><?php echo $row3['provincename'];?> Landscapes</i></h5>
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

          <?php while($row= $query->fetch_array()) { ?>

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
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
    </div><!-- cell-hide -->
     <?php }else {
           		echo ' No yet to register found';
        } ?>
           </div>
          </div> <!-- /.card-body -->
       </div> <!-- /.card -->

    <?php } 

      function landscapesfetchALL0($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM rwandalandscapes WHERE location_province= '{$categories}' AND location_districts= location_districts GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc , rand() ");
        $query0= $mysqli->query("SELECT location_districts FROM rwandalandscapes WHERE location_province='{$categories}' GROUP BY location_districts HAVING  COUNT(DISTINCT location_districts)= 1 ORDER BY created_on_ Desc ");
        $get_province = mysqli_query($mysqli,"SELECT * FROM provinces");   
        $query1= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        ?>
        <div class="card card-primary mb-1 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title float-left pl-2"><i> Rwanda landscapes to Search</i></h5>
             <form class="form-inline float-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control searchlandscapes"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                </div>
              </form>

            <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                <nav class="nav d-flex justify-content-between pb-0"  >
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories('kigali city');" >kigali city<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS('kigali city');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories('Northern province');" >Northern province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS('Northern province');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories('East province');" >East province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS('East province');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories('West province');" >West province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS('West province');?></span></a>
                <a class="p-2" href="javascript:void(0)" onclick="landscapesCategories('Southern province');" >Southern province<span class="badge badge-primary"><?php echo $this->landscapescountPOSTS('Southern province');?></span></a>
                </nav>
            </div> <!-- nav-scroller -->
        </div> <!-- /.card-header -->

        <div class="card-body">
        <span class="job-show"></span>
        <div class="job-hide">

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

        <h5 class="text-dark text-center" style="background:#faebd7;padding:10px;"><i><?php echo $categories;?> Landscapes</i></h5>
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

          <?php while($row= $query->fetch_array()) { ?>

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
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
           </div>
          </div> <!-- /.card-body -->
       </div> <!-- /.card -->

    <?php } 

       public function landscapescountPOSTS($categories)
    {
        $mysqli =$this->database;
        $sql= $mysqli->query("SELECT COUNT(*)
            FROM(
            SELECT DISTINCT location_districts
            FROM `rwandalandscapes`
            WHERE location_province='{$categories}'
            ) AS DerivedTableAlias ");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }

}
$landscapes= new Landscapes();

?>