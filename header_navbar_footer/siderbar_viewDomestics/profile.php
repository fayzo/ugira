<div class="container">
    <div class="row">
        <div class="col-md-12">
       
        <div class="card">
            <div class="card-header py-1">
                <button type="button" id="edit-domestics-profile" data-domestics="<?php echo $employers['domestics_id']; ?>" data-user="<?php echo $employers['user_id_']; ?>" class="btn btn-primary float-right">Edit Profile</button>
            </div>
            <div class="card-body">
                    <div class="card card-widget widget-user" style="height:150px;">
                        <div class="widget-user-header text-white"
                                style="background: url('<?php echo BASE_URL_LINK.NO_COVER_IMAGE_URL ;?>')no-repeat center center;background-size:cover;">
                            <h3 class="widget-user-username"><?php echo $employers['firstname_']." ".$employers['lastname_']; ?></h3> 
                            <h5 class="widget-user-desc">Domestics Helper</h5>
                        </div>
                    </div><!-- /. card widget-user -->
             

             <div class="row mb-3">
                <div class="col-md-2 employers">

                    <div class="img-relative"  style="position:absolute; top:-80px;width: 120px;text-align: left;" >
                        <div class="profile-upload">
                            <!-- Hidden upload form -->
                            <form method="post" action="core/ajax_db/profileEdit.php" enctype="multipart/form-data" id="Form_change_domestics" target="uploadTarget">
                                <input type="hidden" name="domestics_id" id="domestics_id" value="<?php echo $_SESSION['domestics']; ?>" style="display:none">
                                <input type="file" name="change_domestics" id="change_domestics" style="display:none">
                            </form>

                            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid black;" __idm_frm__="50"></iframe>
                            <!-- Profile image -->
                            <div class="text-center img-placeholder" style="width: 120px; height: 100%;left: 32%;" >
                                <h4>Update image</h4>
                            </div>
                            <!-- Image update link -->
                            <a href="javascript:void(0);" style="top:0%;left:0%;" class="img-upload-iconLinks" id="photo_change_domestics" data-domestics="<?php echo $_SESSION['domestics']; ?>" data-user="<?php echo $employers['user_id_']; ?>">
                                <i style="font-size: 30px;" class="fa fa-camera" aria-hidden="true"></i> </a>
                                <img class="rounded-circle shadow-lg" id="imagePreview" style="width: 120px; height: auto;" src="<?php echo BASE_URL_PUBLIC.'uploads/domestics/'.$employers['photo_']; ?>">
                        </div>
                    </div>
                        <!-- <img style="position:absolute; top:-80px;width: 120px; height: auto;border: 3px solid #ffffff;" class="rounded-circle shadow-lg" src="< ?php echo  BASE_URL_PUBLIC ;?>uploads/domestics/< ?php echo $employers['photo_']; ?>" alt="User Avatar"> -->
                </div>
                <div class="col-md-1-3 mr-3 p-2">
                    <h4><?php echo $employers['firstname_']." ".$employers['lastname_']; ?></h4><!-- Elizabeth Pierce -->
                    <div><?php echo $employers['country_']; ?></div>
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
                                    <li>African foods</li>
                                    <li>indian foods</li>
                                    <li>western foods</li>
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
                                    <li>Baking</li>
                                    <li>Car wash</li>
                                    <li>Garderning</li>
                                    <li>Housework</li>
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
                                                            <li>Baking</li>
                                                            <li>Car wash</li>
                                                            <li>Garderning</li>
                                                            <li>Housework</li>
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

            </div><!-- card-body -->
        </div><!-- card -->

        </div>
    </div>
</div>