<?php 
session_start();
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

if (isset($_POST['domestic_id']) && !empty($_POST['domestic_id'])) {
    $user_id= $_POST['user_id'];
    $domestic_id = $_POST['domestic_id'];
    $row= $domestics->Domestics_($domestic_id,$user_id);
     ?>
<style>
.domestic-popup .active{
    color: #fff;
}

</style>
<div class="domestic-popup">
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
                            <!-- < ?php if (!empty($row['other_photo_'])) { ?>
                                <div class="widget-user-header text-white"
                                    style="background: url('< ?php echo BASE_URL_PUBLIC."uploads/domestics/".$row['other_photo_'] ;?>')no-repeat center center;background-size:cover;">
                            < ?php }else{ ?> -->
                                <div class="widget-user-header text-white"
                                    style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>')no-repeat center center;background-size:cover;">
                        <!-- < ?php  } ?> -->
                                <h3 class="widget-user-username"><?php echo $row['firstname_']." ".$row['lastname_']; ?></h3> 
                                <h5 class="widget-user-desc">Domestics Helper</h5>
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
                        <img style="position:absolute; top:-80px;width: 120px; height: auto;border: 3px solid #ffffff;" class="rounded-circle shadow-lg" src="<?php echo  BASE_URL_PUBLIC ;?>uploads/domestics/<?php echo $row['photo_']; ?>" alt="User Avatar">
                </div>
                <div class="col-md-1-3 mr-3 p-2">
                    <h4><?php echo $row['firstname_']." ".$row['lastname_']; ?></h4><!-- Elizabeth Pierce -->
                    <div><?php echo $row['country_']; ?></div>
                    <div>16 years of experience</div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2">
                    <h4>Available From</h4>
                    <div>16 Semptember</div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2">
                    <h4>Resume</h4>
                    <div>Domestics Helpers</div>
                     <div>Christian</div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2">
                    <h4>Age</h4>
                    <div>42 years</div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2">
                    <h4>Status</h4>
                    <div>Single</div>
                </div>
            </div>

            <section class="content-header container" style="background:#e8e1e1">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="float-sm-right pt-3">
                            <ul class="list-inline ">
                                <li class="list-inline-item h4 btn btn-outline-primary"><i><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Request</i></li>
                                <li class="list-inline-item h4 btn btn-primary" ><i>Contact</i></li>
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
             <h3>About Me</h3>
           <div class=" border-1 shadow-lg">
             
                             <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave
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

            <section class="container" >
             <h3> Experience Skills</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-light border-1 shadow-lg">
                            <div class="card-header  bg-primary text-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-info" style="font-size:30px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h5><i>My Experience Skills</i></h5>
                                            <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body text-dark">
                                <ul>
                                    <li>Child Care</li>
                                    <li>Housekeeping</li>
                                    <li>Baby Care</li>
                                    <li>Pet Care</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4">
                        <div class="card bg-light border-1 shadow-lg">
                            <div class="card-header  bg-primary text-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-info" style="font-size:30px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h5><i>My Experience Skills</i></h5>
                                            <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body text-dark">
                                <ul>
                                    <li>Child Care</li>
                                    <li>Housekeeping</li>
                                    <li>Baby Care</li>
                                    <li>Pet Care</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4">
                    <h5></h5>
                        <div class="card bg-light border-1 shadow-lg">
                            <div class="card-header bg-primary text-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-info" style="font-size:30px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h5><i>My Experience Skills</i></h5>
                                            <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body text-dark">
                                <ul>
                                    <li>Child Care</li>
                                    <li>Housekeeping</li>
                                    <li>Baby Care</li>
                                    <li>Pet Care</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div><!-- col -->
                </div>
            
            </section>

            <section class="container mt-2 mb-2" >
                <div class="card mt-3 bg-light border-1 shadow-lg">
                   <div class="card-header text-dark p-2">
                       <h3>Working Experience</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body text-dark mb-2 ">
                                <ul class="timeline timeline-inverse">
                                <li class="time-label">
                                 <span class="text-dark" style="position: absolute;font-size: 25px; padding: 2px; margin-left: 15px;"><i class="fa fa-calendar"></i></span>

                                <div class="timeline-item card bg-light border-1 shadow-lg">
                                    <div class="card-body text-dark">
                                    <table class="table table-hover table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th><h5><i> Date</i></h5></th>
                                                <th><h5><i class="fa fa-map-marker"></i> <i>Working place</i></h5></th>
                                                <th><h5><i class="fa fa-users "></i> <i>Couple Family</i></h5></th>
                                                <th><h5><i class="fa fa-star"></i> <i>Duties</i></h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>22 may</td>
                                                    <td>Gasabo</td>
                                                    <td>6 Family</td>
                                                    <td><ul style="margin-left:0px;">
                                                            <li>child care</li>
                                                            <li>cooking</li>
                                                            <li>cleaning</li>
                                                            </ul>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>22 may</td>
                                                    <td>Gasabo</td>
                                                    <td>6 Family</td>
                                                    <td><ul style="margin-left:0px;">
                                                            <li>child care</li>
                                                            <li>cooking</li>
                                                            <li>cleaning</li>
                                                            </ul>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>22 may</td>
                                                    <td>Gasabo</td>
                                                    <td>6 Family</td>
                                                    <td><ul style="margin-left:0px;">
                                                            <li>child care</li>
                                                            <li>cooking</li>
                                                            <li>cleaning</li>
                                                            </ul>
                                                        </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o bg-info text-light"></i>
                                </li>
                                </ul>

                           </div>
                    </div>
                    
                    <div class="card bg-light border-1 shadow-lg">
                        <div class="card-header text-dark p-2">
                            <h3>Education</h3> 
                        </div><!-- /.card-header -->
                        <div class="card-body text-dark mb-2">

                             <ul class="timeline timeline-inverse">
                                <li class="time-label">
                                 <span class="text-dark" style="position: absolute;font-size: 25px; padding: 2px; margin-left:15px;"><i class="fa fa-calendar"></i></span>

                                <div class="timeline-item card bg-light border-1 shadow-lg">
                                    <div class="card-body text-dark ">
                                    <table class="table table-hover table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th><h5> <i>School</i></h5></th>
                                                <th><h5> <i>Start</i></h5></th>
                                                <th><h5> <i>End</i></h5></th>
                                                <th><h5> <i>study</i></h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>lycee</td>
                                                    <td>2000</td>
                                                    <td>2003</td>
                                                    <td>Mathematics</td>
                                                </tr>
                                                <tr>
                                                    <td>Kabgayi</td>
                                                    <td>2003</td>
                                                    <td>2007</td>
                                                    <td>Mathematics</td>
                                                </tr>
                                                <tr>
                                                    <td>APADE</td>
                                                    <td>2007</td>
                                                    <td>2016</td>
                                                    <td>Mathematics</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o bg-info text-light"></i>
                                </li>
                                </ul>

                            </div> <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                        </div>
                    </div>
            </section>


           </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

<?php } 


if (isset($_POST['domestics_id_edit']) && !empty($_POST['domestics_id_edit'])) {
    $user_id= $_POST['user'];
    $domestic_id = $_POST['domestics_id_edit'];
    $row= $domestics->Domestics_($domestic_id,$user_id);
     ?>
<style>
.domestic-popup .active{
    color: #fff;
}

</style>
<script src="<?php echo BASE_URL_LINK ;?>dist/js/country_login_ajax-db.js"></script>

<div class="domestic-popup">
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
                            <!-- < ?php if (!empty($row['other_photo_'])) { ?>
                                <div class="widget-user-header text-white"
                                    style="background: url('< ?php echo BASE_URL_PUBLIC."uploads/domestics/".$row['other_photo_'] ;?>')no-repeat center center;background-size:cover;">
                            < ?php }else{ ?> -->
                                <div class="widget-user-header text-white"
                                    style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>')no-repeat center center;background-size:cover;">
                        <!-- < ?php  } ?> -->
                                <h3 class="widget-user-username"><?php echo $row['firstname_']." ".$row['lastname_']; ?></h3> 
                                <h5 class="widget-user-desc">Domestics Helper</h5>
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
                        <img style="position:absolute; top:-80px;width: 120px; height: auto;border: 3px solid #ffffff;" class="rounded-circle shadow-lg" src="<?php echo  BASE_URL_PUBLIC ;?>uploads/domestics/<?php echo $row['photo_']; ?>" alt="User Avatar">
                </div>
                <div class="col-md-1-3 p-2" style="width:180px;">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="name" id="firstname-Dom" class="form-control" value='<?php echo $row['firstname_'];?>' placeholder="your firstname" aria-describedby="prefixId">
                        </div>
                        <div class="col">
                            <input type="text" name="name" id="name" class="form-control" value='<?php echo $row['lastname_'];?>' placeholder="your lastname" aria-describedby="prefixId">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div id="myDiv"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                           <input type="text" class="form-control" name="experience_of_work" value="<?php echo $row['experience_of_work'];?>" id="countryexperience_of_work" placeholder="years of experience" readonly>
                       </div>
                    </div>
                </div>
                <div class="col-md-1-3 border-left p-2" style="width:150px;">
                    <h4>Available From</h4>
                    <div class="form-row">
                        <div class="col">
                           <input type="text" class="form-control" name="available_from" value="<?php echo $row['available_from']; ?>" id="available_from" placeholder="16 Semptember" readonly>
                       </div>
                    </div>
                </div>
                <div class="col-md-1-3 border-left p-2" style="width:150px;">
                    <h4>Resume</h4>
                    <div class="form-row">
                        <div class="col">
                           <input type="text" class="form-control" name="looking_for" value="<?php echo $row['looking_for']; ?>" id="looking_for" placeholder="Domestics Helper" readonly>
                       </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                           <input type="text" class="form-control" name="religion" value="<?php echo $row['religion']; ?>" id="religion" placeholder="religion" readonly>
                       </div>
                    </div>
                </div>
                <div class="col-md-1-3 border-left p-2" style="width:80px;">
                    <h4>Age</h4>
                    <div class="form-row">
                        <div class="col">
                           <input type="text" class="form-control" name="age" value="<?php echo $row['born_date']; ?>" id="age" placeholder="Age" readonly>
                       </div>
                    </div>
                </div>
                <div class="col-md-1-3 border-left mr-4 p-2" style="width:100px;">
                    <h4>Status</h4>
                     <div class="form-row">
                        <div class="col">
                             <div class="form-group">
                                <select class="form-control" name="gender" id="gender">
                                <?php if (!empty($row['gender']) && $row['gender']  == 'Male' ) { ?>
                                  <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                  <option value="Female">Female</option>
                                <?php }else{ ?>
                                  <option value="Female">Female</option>
                                  <option value="Male">Male</option>
                                <?php } ?>
                                </select>
                              </div>
                       </div>
                    </div>
                </div>
            </div>

            <section class="content-header container" style="background:#e8e1e1;">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="float-sm-right pt-3">
                            <ul class="list-inline ">
                                <li class="list-inline-item h4 btn btn-outline-primary"><i><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Request</i></li>
                                <li class="list-inline-item h4 btn btn-primary" ><i>Contact</i></li>
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
             <h3>About Me</h3>
           <div class=" border-1 shadow-lg">

           <div class="form-group">
             <textarea class="form-control" name="" id="" rows="6"><?php echo $row['text_']; ?>
            Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwaveput abirdon it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenestermlkshk.Ethicalmaster cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshkfanny packgluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenesterchillwave 3 wolfmoonasymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migaschurch-keytofublog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfiesnarwhalAmericanApparel.
            </textarea>
           </div>
                </div>
            </section>

            <section class="container" >
             <h3> Experience Skills</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-light border-1 shadow-lg" style="height:200px;">
                            <div class="card-header  bg-primary text-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-info" style="font-size:30px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h5><i>My Skills and Experience</i></h5>
                                            <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body text-dark">
                                <ul>
                                    <?php $experience= explode('=',$row['experience_skills']);
                                    for ($i=0; $i < count($experience); $i++) { ?>
                                        <li><?php echo $experience[$i]; ?></li>
                                    <?php } ?>
                                    <li>Child Care</li>
                                    <li>Housekeeping</li>
                                    <li>Baby Care</li>
                                    <li>Pet Care</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4">
                        <div class="card bg-light border-1 shadow-lg" style="height:200px;">
                            <div class="card-header  bg-primary text-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-info" style="font-size:30px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h5><i>My cooking Skills</i></h5>
                                            <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body text-dark">
                                <ul>
                                <?php $cooking= explode('=',$row['cooking_skills']);
                                for ($i=0; $i < count($cooking); $i++) { ?>
                                    <li><?php echo $cooking[$i]; ?></li>
                                <?php } ?>
                                    <li>Child Care</li>
                                    <li>Housekeeping</li>
                                    <li>Baby Care</li>
                                    <li>Pet Care</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4">
                        <div class="card bg-light border-1 shadow-lg" style="height:200px;">
                            <div class="card-header bg-primary text-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fa fa-info" style="font-size:30px;" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h5><i>My Other Skills</i></h5>
                                            <div><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star text-light" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body text-dark">
                                <ul>
                                 <?php $other= explode('=',$row['other_skills']);
                                for ($i=0; $i < count($other); $i++) { ?>
                                    <li><?php echo $other[$i]; ?></li>
                                <?php } ?>
                                    <li>Child Care</li>
                                    <li>Housekeeping</li>
                                    <li>Baby Care</li>
                                    <li>Pet Care</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div><!-- col -->
                </div>
            
            </section>

            <section class="container mt-2 mb-2" >
                <div class="card mt-3 bg-light border-1 shadow-lg">
                   <div class="card-header text-dark p-2">
                       <h3>Working Experience</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body text-dark mb-2 ">
                                <ul class="timeline timeline-inverse">
                                <li class="time-label">
                                 <span class="text-dark" style="position: absolute;font-size: 25px; padding: 2px; margin-left: 15px;"><i class="fa fa-calendar"></i></span>

                                <div class="timeline-item card bg-light border-1 shadow-lg">
                                    <div class="card-body text-dark">
                                    <table class="table table-hover table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th><h5><i> Date</i></h5></th>
                                                <th><h5><i class="fa fa-map-marker"></i> <i>Working place</i></h5></th>
                                                <th><h5><i class="fa fa-users "></i> <i>Couple Family</i></h5></th>
                                                <th><h5><i class="fa fa-star"></i> <i>Duties</i></h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>22 may</td>
                                                    <td>Gasabo</td>
                                                    <td>6 Family</td>
                                                    <td><ul style="margin-left:0px;">
                                                            <li>child care</li>
                                                            <li>cooking</li>
                                                            <li>cleaning</li>
                                                            </ul>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>22 may</td>
                                                    <td>Gasabo</td>
                                                    <td>6 Family</td>
                                                    <td><ul style="margin-left:0px;">
                                                            <li>child care</li>
                                                            <li>cooking</li>
                                                            <li>cleaning</li>
                                                            </ul>
                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td>22 may</td>
                                                    <td>Gasabo</td>
                                                    <td>6 Family</td>
                                                    <td><ul style="margin-left:0px;">
                                                            <li>child care</li>
                                                            <li>cooking</li>
                                                            <li>cleaning</li>
                                                            </ul>
                                                        </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o bg-info text-light"></i>
                                </li>
                                </ul>

                           </div>
                    </div>
                    
                    <div class="card bg-light border-1 shadow-lg">
                        <div class="card-header text-dark p-2">
                            <h3>Education</h3> 
                        </div><!-- /.card-header -->
                        <div class="card-body text-dark mb-2">

                             <ul class="timeline timeline-inverse">
                                <li class="time-label">
                                 <span class="text-dark" style="position: absolute;font-size: 25px; padding: 2px; margin-left:15px;"><i class="fa fa-calendar"></i></span>

                                <div class="timeline-item card bg-light border-1 shadow-lg">
                                    <div class="card-body text-dark ">
                                    <table class="table table-hover table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th><h5> <i>School</i></h5></th>
                                                <th><h5> <i>Start</i></h5></th>
                                                <th><h5> <i>End</i></h5></th>
                                                <th><h5> <i>study</i></h5></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>lycee</td>
                                                    <td>2000</td>
                                                    <td>2003</td>
                                                    <td>Mathematics</td>
                                                </tr>
                                                <tr>
                                                    <td>Kabgayi</td>
                                                    <td>2003</td>
                                                    <td>2007</td>
                                                    <td>Mathematics</td>
                                                </tr>
                                                <tr>
                                                    <td>APADE</td>
                                                    <td>2007</td>
                                                    <td>2016</td>
                                                    <td>Mathematics</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o bg-info text-light"></i>
                                </li>
                                </ul>

                            </div> <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                        </div>
                    </div>
            </section>


           </div><!-- img-popup-body -->
        </div><!-- user-show-popup-box -->
    </div> <!-- Wrp4 -->
</div> <!-- apply-popup" -->

<?php } 