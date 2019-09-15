<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class School extends Home {

    public function schoolList0($pages,$categories){
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*5)-5;
        }

        $mysqli= $this->database;
        // $query= $mysqli->query("SELECT * FROM school WHERE type_of_school= '{$categories}' ORDER BY created_on_ Desc , rand() Limit $showpages,5");
        $query= $mysqli->query("SELECT * FROM school S 
						Left JOIN provinces P ON S. location_province = P. provincecode
						Left JOIN districts D ON S. location_districts = D. districtcode
						Left JOIN sectors T ON S. location_Sector = T. sectorcode
						Left JOIN cells C ON S. location_cell = C. codecell
						Left JOIN vilages V ON S. location_village = V. CodeVillage
        WHERE type_of_school= '{$categories}' ORDER BY created_on_ Desc , rand() Limit $showpages,5 ");
        
        $query1= $mysqli->query("SELECT COUNT(*) FROM school WHERE type_of_school= '{$categories}' ");
        $get_province = mysqli_query($mysqli,"SELECT * FROM provinces");   
        ?>
        <div class="card card-primary mb-1 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title float-left pl-2"><i> School to Search</i></h5>
             <div class="dropdown  float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                            school province
                        </button>
                <div class="dropdown-menu main-active" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories('kigali city',1);" >kigali city<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('kigali city');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories('Northern province',1);" >Northern province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('Northern province');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories('East province',1);" >East province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('East province');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories('West province',1);" >West province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('West province');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories('Southern province',1);" >Southern province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('Southern province');?></span></a>

                </div>
            </div>
             <form class="form-inline  float-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control searchSchool"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                </div>
              </form>

            <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                <nav class="nav d-flex justify-content-between pb-0"  >
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories0('kindergarden School',1);" >kindergarden<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('kindergarden School');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories0('Primary School',1);" >Primary School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('Primary School');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories0('Secondary School',1);" >Secondary School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('Secondary School');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories0('College School',1);" >College School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('College School');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories0('University',1);" >University School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('University');?></span></a>
                </nav>
            </div> <!-- nav-scroller -->
        </div> <!-- /.card-header -->

        <div class="card-body">
        <span class="school-show"></span>
        <div class="school-hide">
        <h5 class="card-title text-center " style="background:#faebd7;padding:10px;"><i><?php echo $categories;?></i></h5>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="form" id="form" >
        <input type="hidden" name="type_of_school" id="type_of_school" value="<?php echo $categories;?>">
        <div class="form-row mb-3">
            <div class="col">
                <label for="">Province</label>
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
                <label for=""> District</label>
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
                <label for="Sector">Sector</label>
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
                <label for="Cell">Cell</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span>
                    </div>
                    <select name="codecell" id="codecell" class="form-control" onchange="showResultCell();">
                        <option></option>
                    </select>
                </div>
            </div>
        </div>
        </form>

        <div id="cell-hide">
         
          <?php while($row= $query->fetch_array()) { ?>

            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                    <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/schoolFile/<?php echo $row['photo_']; ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                    <a class="text-primary" href="javascript:void(0)"  id="districts-view" data-districts="<?php echo $row['location_districts'] ;?>"><?php echo $row['title_'] ;?></a>
                    </h5>
                    <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on_']) ;?> By <?php echo $row['author_'] ;?> </div>
                    <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                    <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>
                   <p class="card-text mb-1">vIEW Different Landscapes of <?php echo $row['location_districts'] ;?> Districts</p>
                </div><!-- card-body -->
            </div><!-- card -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
        </div>
           </div>
          </div> <!-- /.card-body -->
       </div> <!-- /.card -->

          <?php
        $query2= $mysqli->query("SELECT COUNT(*) FROM school WHERE type_of_school= '{$categories}' ");
        $row_Paginaion = $query2->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/5;
        $post_Perpage = ceil($post_Perpages);

    if($post_Perpage > 1){ ?>

    <nav id="landscape-paginat">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="schoolCategories0('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="schoolCategories0('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="schoolCategories0('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="schoolCategories0('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php } 

    }

    public function schoolList($pages,$categories){
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*5)-5;
        }

        $mysqli= $this->database;
        // $query= $mysqli->query("SELECT * FROM school WHERE location_province= '{$categories}' ORDER BY created_on_ Desc , rand() Limit $showpages,5");
        $query= $mysqli->query("SELECT * FROM school S 
						Left JOIN provinces P ON S. location_province = P. provincecode
						Left JOIN districts D ON S. location_districts = D. districtcode
						Left JOIN sectors T ON S. location_Sector = T. sectorcode
						Left JOIN cells C ON S. location_cell = C. codecell
						Left JOIN vilages V ON S. location_village = V. CodeVillage
        WHERE location_province= '{$categories}' ORDER BY created_on_ Desc , rand() Limit $showpages,5 ");

        $query1= $mysqli->query("SELECT COUNT(*) FROM school WHERE location_province= '{$categories}' ");
        ?>
        <div class="card card-primary mb-1 ">
        <div class="card-header main-active p-1">
            <h5 class="card-title float-left pl-2"><i> School to Search</i></h5>
             <div class="dropdown  float-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                            school province
                        </button>
                <div class="dropdown-menu main-active" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories0('kindergarden School',1);" >kindergarden<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('kindergarden School');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories0('Primary School',1);" >Primary School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('Primary School');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories0('Secondary School',1);" >Secondary School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('Secondary School');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories0('College School',1);" >College School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('College School');?></span></a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories0('University',1);" >University School<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS0('University');?></span></a>

                </div>
            </div>
             <form class="form-inline  float-right">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control searchSchool"  aria-describedby="helpId" placeholder="Search Accountant, finance ,enginneer">
                </div>
              </form>

            <div class="nav-scroller py-0" style="clear:right;height:2rem;">
                <nav class="nav d-flex justify-content-between pb-0"  >
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories('kigali city',1);" >kigali city<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('kigali city');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories('Northern province',1);" >Northern province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('Northern province');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories('East province',1);" >East province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('East province');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories('West province',1);" >West province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('West province');?></span></a>
                    <a class="p-2" href="javascript:void(0)" onclick="schoolCategories('Southern province',1);" >Southern province<span class="badge badge-primary"><?php echo $this->schoolcountPOSTS('Southern province');?></span></a>
                </nav>
            </div> <!-- nav-scroller -->
        </div> <!-- /.card-header -->

        <div class="card-body">
        <span class="school-show"></span>
        <div class="school-hide">
        <h5 class="card-title text-center"  style="background:#faebd7;padding:10px;"><i><?php echo $categories;?></i></h5>

          <?php while($row= $query->fetch_array()) { ?>

            <div class="card flex-md-row shadow-sm h-md-100 border-0 mb-3">
                    <img class="card-img-left flex-auto d-none d-lg-block" height="150px" width="150px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/schoolFile/<?php echo $row['photo_']; ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                    <a class="text-primary" href="javascript:void(0)"  id="districts-view" data-districts="<?php echo $row['location_districts'] ;?>"><?php echo $row['title_'] ;?></a>
                    </h5>
                    <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on_']) ;?> By <?php echo $row['author_'] ;?> </div>
                    <div class="text-muted"><?php 	echo ''.$row['provincename'].' Province/ '.$row['namedistrict'].' district/ '.$row['namesector'].' Sector' ;?></div>
                    <div class="text-muted"><?php 	echo ''.$row['nameCell'].' Cell/ '.$row['VillageName'].' Village' ;?></div>
                    <p class="card-text mb-1">vIEW Different Landscapes of <?php echo $row['location_districts'] ;?> Districts</p>
                </div><!-- card-body -->
            </div><!-- card -->
          <hr class="bg-info mt-0 mb-1" style="width:95%;">
        <?php } ?>
           </div>
          </div> <!-- /.card-body -->
       </div> <!-- /.card -->

          <?php
        $query2= $mysqli->query("SELECT COUNT(*) FROM school WHERE location_province= '{$categories}' ");
        $row_Paginaion = $query2->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/5;
        $post_Perpage = ceil($post_Perpages);

    if($post_Perpage > 1){ ?>

    <nav id="landscape-paginat">
        <ul class="pagination justify-content-center mt-3">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="schoolCategories('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="schoolCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="schoolCategories('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="schoolCategories('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php } 

    }

       public function schoolcountPOSTS($categories)
    {
        $mysqli =$this->database;
        $sql= $mysqli->query("SELECT COUNT(*) FROM school WHERE location_province= '{$categories}' ");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }

       public function schoolcountPOSTS0($categories)
    {
        $mysqli =$this->database;
        $sql= $mysqli->query("SELECT COUNT(*) FROM school WHERE type_of_school= '{$categories}' ");
        $row_post = $sql->fetch_array();
        $total_post= array_shift($row_post);
        $array= array(0,$total_post);
        $total_posts= array_sum($array);
        echo $total_posts;
    }

    public function recentArticle(){

    }

}

$school = new School();
?>
