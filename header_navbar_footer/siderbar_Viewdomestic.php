   <header class="blog-header mt-3 py-2 bg-light">
       <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
            <?php if (isset($_SESSION['employers'])) { ?>
                 <button type="button" class="btn btn-light" id="add_employers_profile" data-employers="<?php echo $_SESSION['employers']; ?>" > + Add domestics request helpers </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Recruiting Domestics Helpers</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
             <a href="<?php echo LOGOUT;?>" class="btn btn-danger btn-sm float-right">Sign out</a>
          </div>
        </div>
      </header>

<div class="container-fluid mt-3 mb-5">

    <div class="row">

        <div class="col-3">
        <div class="list-group mb-3" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-Business-list" href="#list-home" data-toggle="tab" role="tab" aria-controls="list-Community" >Home</a>
            <a class="list-group-item list-group-item-action" id="list-Community-list" href="#list-profile" data-toggle="tab"  role="tab" aria-controls="list-Community" >profile</a>
            <a class="list-group-item list-group-item-action" id="list-Community-list" href="#list-inbox" data-toggle="tab"  role="tab"  aria-controls="list-Community">Inbox  <span class="float-right badge badge-primary">35</a>
            <a class="list-group-item list-group-item-action" id="add_employers_profile" href="javascript:void();" data-toggle="tab"  role="tab" aria-controls="list-Community">Request domestics</a>
        </div>

        <div class="card">
            <div class="card-header text-center py-2 main-active">
                <h5>Employers Profile</h5>
            </div>
            <div class="card-body employers">

                <div class="img-relative">
                    <div class="profile-upload">
                        <!-- Hidden upload form -->
                        <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid black;" __idm_frm__="12"></iframe>
                        <!-- Profile image -->
                        <div class="text-center img-placeholder">
                            <h4>Update image</h4>
                        </div>
                        <!-- Image update link -->
                        <a href="javascript:void(0);" class="img-upload-iconLinks" id="photo_change_employers" data-employer="<?php echo $_SESSION['employers']; ?>" data-user="<?php echo $employers['user_id_']; ?>">
                            <i class="fa fa-camera" aria-hidden="true"></i> </a>
                            <img class="rounded-circle shadow-lg" id="imagePreview" src="<?php echo BASE_URL_PUBLIC.'uploads/domesticsEmployers/'.$employers['photo_']; ?>">
                    </div>
                </div>

            </div><!-- card-body -->
        </div>
            <div class="card text-center mb-3">
                <div class="card-header py-2">
                    <h4 class="card-title"><?php echo $employers['firstname_'].' '.$employers['lastname_']; ?></h4>
                </div>
                <div class="card-body">
                    <div class="text-muted mb-1" style="font-size:12px;"><?php echo $employers['namedistrict']; ?> District/ <?php echo $employers['namesector']; ?> Sector</div>
                    <div class="card-text text-success">Employer</div>
                    <div class="card-text">1o years of experience</div>
                    <div class="card-text">Finish contract</div>
                </div>
                <div class="card-footer py-2 main-active">
                    <div class="card-text">Available FROM 03 Aug 2019</div>
                </div>
            </div><!-- card -->

        </div>
        <div class="col-6">

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            
            <div class="card">
                <div class="card-header p-1 main-active">
                    <form class="form-inline float-right">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                            </div>
                            <input type="text" class="form-control searchs" name="searchs" id="searchs" aria-describedby="helpId"
                                placeholder="Search">
                            </div>
                            <div class="search-results">			
                            </div>
                    </form>
                    <h5>Find A domestic helper</h5>
                </div>
                <div class="card-body">
                    <?php foreach ($employersViewDomestics as $row) {
                        # code... ?>

                            <div class="card flex-md-row shadow-sm h-md-100 border-top-0 border-left-0 border-right-0 mb-3  borders-bottoms">
                                 <div class="card card-img-left flex-auto d-none d-lg-block border-0">
                                    <img class="img-fluid" height="80px" width="80px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/domestics/<?php echo $row['photo_']; ?>" alt="Card image cap">
                                    <div class="card-body text-center p-0">
                                        <h5 class="mb-0"><?php echo $row['lastname_']; ?></h5>
                                        <div class="text-muted"><?php echo $row['country_']; ?></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <a class="text-primary h5" href="javascript:void(0)"  id="domestics-view" data-domestics="<?php echo $row['domestics_id']; ?>" data-user="<?php echo $row['user_id_']; ?>">A hardworking optimistic helpers</a>
                                    <span class="float-right">
                                        <span class="text-success mr-2"><i class="fa fa-check-circle" aria-hidden="true"></i> verified profile</span>
                                        <span><i class="fa fa-check" aria-hidden="true"></i> CONTRACT</span>
                                    </span>

                                    <div class="text-muted ">40 years old , 3 years experience</div>
                                    <div class="text-muted mb-1" style="font-size:12px;">Born <?php echo $row['namedistrict']; ?> District/ <?php echo $row['namesector']; ?> Sector/ <?php echo $row['nameCell']; ?> cell</div>
                                    <div><?php echo $row['text_']; ?> </div>
                                    <!-- <div>Greeting Employer, My name is jinl i've been working in musanze for almost 10 years as helper. iwork 
                                    both both chinese and westrn family, my experience is looking teenage and baby. </div> -->
                                </div><!-- card-body -->
                            </div><!-- card -->

                     <?php } ?>

                </div><!-- card-body -->
            </div><!-- card -->
            </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

            <div class="tab-pane fade " id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <?php include "siderbar_viewEmployersprofile/profile.php"?>
            </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

            <div class="tab-pane fade" id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
            <?php include "siderbar_viewEmployersprofile/inbox.php"?>
            </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->
        </div><!-- tab-content -->

        </div><!-- col-8 -->
        <div class="col-3">
                           
        </div>
    </div>
</div>