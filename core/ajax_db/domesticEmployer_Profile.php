<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['jobs_id']) && !empty($_POST['jobs_id'])) {
    $user_id= $_POST['user_id'];
    $jobs_id = $_POST['jobs_id'];
    $row= $domestics->employersFetchReadmore($user_id,$jobs_id);
     ?>
<style>
.img-popup-body img {
    width: 80px;
    height: 80px;
}
.list-group-item {
    text-align: normal !important;
}
.list-group-items {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.125);
    background-color: white;
    text-align: normal;
}
.list-group-items.active {
    color: #ecf1ec !important;
    background-color: #165dc7 !important;
    border-color: #165dc7 !important;
}
</style>
<div class="employer-popup">
    <div class="wrap6">
        <span class="colose">
        	<button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
        	<div class="img-popup-body">

            <div class="container-fuild">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-widget widget-user" style="height:150px;">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <!-- < ?php if (!empty($profileData['cover_img'])) { ?>
                                <div class="widget-user-header text-white"
                                    style="background: url('< ?php echo BASE_URL_LINK."image/users_profile_cover/".$profileData['cover_img'] ;?>')no-repeat center center;background-size:cover;">
                            < ?php }else{ ?> -->
                                <div class="widget-user-header text-white"
                                    style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>')no-repeat center center;background-size:cover;">
                        <!-- < ?php  } ?> -->
                                <h3 class="widget-user-username"><?php echo $row['family_type']; ?> looking for helper</h3> 
                                <div class="widget-user-desc"><?php echo $row['family_type']; ?></div>
                                <h5 class="widget-user-desc mt-2"><span class="btn btn-success mr-3">FULL TIME</span><span><i class="fa fa-map-marker"> </i> <?php echo $row['namedistrict']; ?></span></h5>
                            </div>

                        </div>
                        <!-- /. card widget-user -->
                    </div>
                    <!-- column -->
                </div>
                <!-- row -->
            </div>
            <!-- container-fuild -->

            <div class="row mb-3" style="background:#fff">
                <div class="col-md-2 ">
                        <img style="position:absolute; top:-40px;width: 120px; height: auto;border: 3px solid #ffffff;" class="rounded-circle shadow-lg" src="<?php echo BASE_URL_PUBLIC ;?>uploads/domesticsEmployers/<?php echo $row['photo_']; ?>" alt="User Avatar">
                </div>
                <div class="col-md-1-3 mr-3 p-2 ">
                    <h4 class="mt-4">Require skills</h4>
                    <?php $require= explode('=',$row['required_skills']);
                    for ($i=0; $i < count($require); $i++) { ?>
                        <div><?php echo $require[$i]; ?> </div>
                     <?php } ?>
                    <!-- <div>Housekeeping</div>
                    <div>Pet care</div> -->
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2 ">
                    <h4 class="mt-4">Family Type</h4>
                    <div><?php echo $row['status_type']; ?></div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2 ">
                    <h4 class="mt-4">Looking For</h4>
                    <div><?php echo $row['looking_for']; ?></div>
                     <div>Christian</div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2 ">
                    <h4 class="mt-4">Speaking</h4>
                    <div>English</div>
                    <div>Kinyarwanda</div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2 ">
                    <h4 class="mt-4">Location</h4>
                    <div><?php echo $row['namedistrict']; ?> district</div>
                    <div><?php echo $row['namesector']; ?> Sector</div>
                    <div><?php echo $row['nameCell']; ?> cell</div>
                </div>
            </div>

            <section class="content-header container" style="background:#e8e1e1">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="float-sm-right pt-3">
                            <ul class="list-inline ">
                                <li class="list-inline-item h4 btn btn-outline-primary"><i><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Request</i></li>
                                <li class="list-inline-item h4 btn btn-outline-success"><i>Apply For Job</i></li>
                            </ul>
                        </div>

                        <div class="text-center pt-3">
                            <ul class="list-inline">
                                <li class="list-inline-item h4 btn btn-outline-primary"><i> Child care</i></li>
                                <li class="list-inline-item h4 btn btn-outline-primary"><i> Cooking</i></li>
                                <li class="list-inline-item h4 btn btn-outline-primary"><i> Housekeeping</i></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>

              <section class="container" >
             <h3>Overview</h3>
           <div class=" border-1 shadow-lg p-2">
             
                             <p><?php echo $row['additioninformation']; ?>
                                 Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave
                                 put a
                                 bird
                                 on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester
                                 mlkshk.
                                 Ethical
                                 master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk
                                 fanny pack
                                 gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester
                                 chillwave 3 wolf
                                 moon
                                 asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas
                                 church-key
                                 tofu
                                 blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies
                                 narwhal
                                 American
                                 Apparel.</p>
                </div>
            </section>

            
            <section class="container mb-4" >
             <h3> Experience Skills</h3>
                <div class="row">
                    <div class="col-md-3">
                        
                        <ul class="list-group border shadow-lg" style="height: 270px;">
                            <li class="list-group-items active">Salary & Accomodation<div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div></li>
                            <?php $salary= explode('=',$row['salary_accomodation']);
                            for ($i=0; $i < count($salary); $i++) { ?>
                                <li class="list-group-item border-0"># <?php echo $salary[$i]; ?></li>
                            <?php } ?>
                            <!-- <li class="list-group-item border-0"># <span style="font-weight: 700;">Monthly Salary </span> to be discussed</li>
                            <li class="list-group-item border-0"># Accomodation Private room</li>
                            <li class="list-group-item border-0"># <a style="font-weight: 700;">Day off</a> To be discussed</li> -->
                        </ul>
                    </div><!-- col -->
                    <div class="col-md-3">
                        <ul class="list-group border shadow-lg" style="height: 270px;">
                            <li class="list-group-items active">Cooking Skills <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div></li>
                            <?php $cooking= explode('=',$row['cooking_skills']);
                            for ($i=0; $i < count($cooking); $i++) { ?>
                                <li class="list-group-item border-0"># <?php echo $cooking[$i]; ?></li>
                            <?php } ?>
                            <!-- <li class="list-group-item border-0"># Afican food</li>
                            <li class="list-group-item border-0"># bread </li>
                            <li class="list-group-item border-0"># sambusa</li> -->
                        </ul>
                    </div><!-- col -->
                    <div class="col-md-3">
                        <ul class="list-group border shadow-lg" style="height: 270px;">
                            <li class="list-group-items active">Main Duties <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div></li>
                            <?php $duties= explode('=',$row['main_duties']);
                            for ($i=0; $i < count($duties); $i++) { ?>
                                <li class="list-group-item border-0"># <?php echo $duties[$i]; ?></li>
                            <?php } ?>
                            <!-- <li class="list-group-item  border-0"># Baby Care</li>
                            <li class="list-group-item  border-0"># Child Care</li>
                            <li class="list-group-item  border-0"># Groceries</li>
                            <li class="list-group-item  border-0"># Housekeeping</li> -->
                        </ul>
                    </div><!-- col -->
                    
                     <div class="col-md-3">
                        <ul class="list-group border shadow-lg" style="height: 270px;">
                            <li class="list-group-items active">Other required skills <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div></li>
                             <?php $other= explode('=',$row['other_skills']);
                            for ($i=0; $i < count($other); $i++) { ?>
                                <li class="list-group-item border-0"># <?php echo $other[$i]; ?></li>
                            <?php } ?>
                            <!-- <li class="list-group-item border-0"># Car wash</li>
                            <li class="list-group-item border-0"># Housework</li> -->
                        </ul>
                    </div><!-- col -->
                </div>
            
            </section>

            <div style="height: 25px;background:white;"></div>

            <div class="container">
                            <?php echo $domestics->recentViewReadmore($user_id); ?>
            </div>


            </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

<?php } 