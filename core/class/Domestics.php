<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Domestics extends home {

     public function domesticshelpers()
   { ?>
    <div class="card borders-bottoms">
        <div class="card-header text-center">
            <h5><i>What are you looking for ?</i> </h5>
        </div>
        <div class="card-body">
           <div class="row">

                <div class="col-md-6">
                    <div <?php if(!isset($_SESSION['key'])){ echo 'class="card borders-tops text-center shadow-lg more" id="login-please"  data-login="1" ';
                               }else{ echo 'class="card borders-tops text-center shadow-lg more  loginTerms" '; } ?> 
                        >
                      <div><img class="img-fluid mt-3 rounded-circle" src="<?php echo BASE_URL_LINK.'image/img/avatar2.png'; ?>" width="200px" heght="200px"></div>
                      <div class="card-body">
                        <a href="javascript:void(0);" class="h4  loginTerms"  >HELP</a>
                        <p class="card-text">Domestic Helper. Be in touch with our applicants online, set up interviews and find the most sitable domestic helper for your family </p>
                      </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div <?php if(!isset($_SESSION['key'])){ echo ' class="card borders-tops text-center shadow-lg more" id="login-please"  data-login="1" ';
                               }else{ echo ' class="card borders-tops text-center shadow-lg more loginTerms0" '; } ?> 
                    >
                      <div><img class="img-fluid mt-3 rounded-circle" src="<?php echo BASE_URL_LINK.'image/img/avatar3.png'; ?>" width="200px" heght="200px"></div>
                      <div class="card-body">
                        <a href="javascript:void(0);" class="h4 loginTerms0" >A JOB</a>
                        <p class="card-text">Domestic Helper. Be in touch with our applicants online, set up interviews and find the most sitable domestic helper for your family </p>
                      </div>
                    </div>
                </div>
               
            </div> <!-- row -->
        </div> <!-- card-body -->
    </div><!-- card -->
    
  <?php }

     public function Domestics_($employers_id,$user_di)
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics D 
            Left JOIN provinces P ON D. location_province = P. provincecode
						Left JOIN districts M ON D. location_districts = M. districtcode
						Left JOIN sectors T ON D. location_Sector = T. sectorcode
						Left JOIN cells C ON D. location_cell = C. codecell
        WHERE D. domestics_id = $employers_id and D. user_id_= $user_di ");
        $row= $query->fetch_array();
        return $row;
     }

     public function employersDomestics($employers_id,$user_di)
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM employersdomestics D
            Left JOIN provinces P ON D. location_province = P. provincecode
						Left JOIN districts M ON D. location_districts = M. districtcode
						Left JOIN sectors T ON D. location_Sector = T. sectorcode
						Left JOIN cells C ON D. location_cell = C. codecell
         WHERE D. employers_id = $employers_id AND D. user_id_= $user_di ");
          // var_dump($query.mysqli_error($db));
        $row= $query->fetch_array();
        return $row;
     }

     public function employersNeedDomestics($user_id)
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics_employers_jobs D
            LEFT JOIN employersdomestics E ON D. user_id2= E. user_id_ 
            Left JOIN provinces P ON D. province = P. provincecode
						Left JOIN districts M ON D. districts = M. districtcode
						Left JOIN sectors T ON D. sector = T. sectorcode
						Left JOIN cells C ON D. cell = C. codecell
        WHERE D. user_id2= $user_id ");
          // var_dump($query.mysqli_error($db));

        $row= $query->fetch_array();
        return $row;

     }

     public function employersFecthall($user_id)
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics_employers_jobs D 
          LEFT JOIN employersdomestics E ON D. user_id2= E. user_id_ 
            Left JOIN provinces P ON D. province = P. provincecode
						Left JOIN districts M ON D. districts = M. districtcode
						Left JOIN sectors T ON D. sector = T. sectorcode
						Left JOIN cells C ON D. cell = C. codecell
						Left JOIN vilages V ON D. village = V. CodeVillage 
          WHERE user_id2= $user_id ");
        $fetch= array();
        while ($row= $query->fetch_array()) {
               $fetch[]= $row;
        }
        return $fetch;
     }

     public function fetchAllDomestics()
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics_employers_jobs D 
            LEFT JOIN employersdomestics E ON D. user_id2= E. user_id_ 
            Left JOIN provinces P ON D. province = P. provincecode
						Left JOIN districts M ON D. districts = M. districtcode
						Left JOIN sectors T ON D. sector = T. sectorcode
						Left JOIN cells C ON D. cell = C. codecell
						Left JOIN vilages V ON D. village = V. CodeVillage 
         WHERE D. user_id2= E. user_id_");
        $fetch= array();
        while ($row= $query->fetch_array()) {
               $fetch[]= $row;
        }
        return $fetch;
     }

     public function DomesticsfetchAllViewEmployers()
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics D 
            Left JOIN provinces P ON D. location_province = P. provincecode
						Left JOIN districts M ON D. location_districts = M. districtcode
						Left JOIN sectors T ON D. location_Sector = T. sectorcode
						Left JOIN cells C ON D. location_cell = C. codecell
						Left JOIN vilages V ON D. location_village = V. CodeVillage ");
        $fetch= array();
        while ($row= $query->fetch_array()) {
               $fetch[]= $row;
        }
        return $fetch;
     }

     public function employersFetchReadmore($user_id,$jobs_id)
     {
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics_employers_jobs D
            LEFT JOIN employersdomestics E ON D. user_id2= E. user_id_ 
            Left JOIN provinces P ON D. province = P. provincecode
						Left JOIN districts M ON D. districts = M. districtcode
						Left JOIN sectors T ON D. sector = T. sectorcode
						Left JOIN cells C ON D. cell = C. codecell
        WHERE D. user_id2= $user_id and D. jobs_id = $jobs_id");
          // var_dump($query.mysqli_error($db));

        $row= $query->fetch_array();
        return $row;

     }

     public function recentViewReadmore($user_id)
     { 
        $db =$this->database;
        $query= $db->query("SELECT * FROM domestics_employers_jobs D 
            LEFT JOIN employersdomestics E ON D. user_id2= E. user_id_ 
            Left JOIN provinces P ON D. province = P. provincecode
						Left JOIN districts M ON D. districts = M. districtcode
						Left JOIN sectors T ON D. sector = T. sectorcode
						Left JOIN cells C ON D. cell = C. codecell
						Left JOIN vilages V ON D. village = V. CodeVillage 
         WHERE D. user_id2 != $user_id");
        $fetch= array();
        while ($row= $query->fetch_array()) {
               $fetch[]= $row;
        } 
        if (count($fetch) > 0 ) {
          # code...
        ?>
        <div class="card border-1  shadow-lg mb-3">
            <div class="card-header p-1">
                <!-- < ?php echo $_SESSION['domesticsEmployers'];?> -->
                <h5>Recent jobs for Domestics Helpers <button type="button" class="btn btn-primary">MORE JOB OFFERS VIEW MORE >>></button> </h5>
            </div>
            <div class="card-body">

            <?php foreach ($fetch as $domesticsViewJobs) { ?>

                      <div class="card flex-md-row h-md-100 border-0 mb-3">
                              <img class="card-img-left flex-auto d-none d-lg-block" height="40px" width="40px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/domesticsEmployers/<?php echo $domesticsViewJobs['photo_']; ?>" alt="Card image cap">
                          <div class="card-body pt-0">
                                <h5 class="text-primary mb-0">
                                <a class="text-primary" href="javascript:void(0)" id="employers-view"  data-user="<?php echo $domesticsViewJobs['user_id2']; ?>" data-employer="<?php echo $domesticsViewJobs['jobs_id']; ?>" ><?php echo $domesticsViewJobs['family_type']; ?> looking for Helper</a>
                                </h5>
                                <div class="text-muted">Created on <?php echo $this->timeAgo($domesticsViewJobs['created_on2']); ?>
                                    <span class="text-muted float-right"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $domesticsViewJobs['namedistrict']; ?> <span class="ml-2 btn btn-success"> FULL TIME</span></span>
                                </div>
                                <div class="text-muted mb-1" style="font-size:12px;"><?php echo $domesticsViewJobs['namesector']; ?> Sector/ <?php echo $domesticsViewJobs['nameCell']; ?> cell</div>
                                <div><?php echo $domesticsViewJobs['additioninformation']; ?></div>
                                <!-- <div>Know to take care children , knows to cook ,knows to watch car ,knows to take care older</div> -->
                          </div><!-- card-body -->
                      </div><!-- card -->
                      <hr class="bg-info mt-0 mb-1" style="width:95%;">

               <?php }  ?>
              </div><!-- card-body -->
          </div>

    <?php } 
    }

}
$domestics = new Domestics();
?>