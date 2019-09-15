   <header class="blog-header mt-3 py-2 bg-light">
       <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Domestics jobs</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="<?php echo LOGOUT;?>" class="btn btn-danger btn-sm float-right">Sign out</a>
          </div>
        </div>
      </header>

<div class="container-fluid mt-3 mb-3">

    <div class="row">

        <div class="col-2">

        <div class="list-group mb-3" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-Business-list" href="#list-home" data-toggle="tab" role="tab" aria-controls="list-Community" >Home</a>
            <a class="list-group-item list-group-item-action" id="list-Community-list" href="#list-profile" data-toggle="tab"  role="tab" aria-controls="list-Community" >profile</a>
            <a class="list-group-item list-group-item-action" id="list-Community-list" href="#list-inbox" data-toggle="tab"  role="tab"  aria-controls="list-Community">Inbox  <span class="float-right badge badge-primary">35</a>
            <a class="list-group-item list-group-item-action" id="add_employers_profile" href="javascript:void();" data-toggle="tab"  role="tab" aria-controls="list-Community">Request domestics</a>
        </div>

        <div class="card">
            <div class="card-header text-center py-2 main-active">
                <h5>Domestics Profile</h5>
            </div>
            <div class="card-body employers">

                <div class="img-relative">
                    <div class="profile-upload" style="height:100%;width:120px;">
                        <!-- Hidden upload form -->
                        <!-- <form method="post" action="core/ajax_db/profileEdit.php" enctype="multipart/form-data" id="Form_change_domestics" target="uploadTarget">
                            <input type="hidden" name="domestics_id" id="domestics_id" value="< ?php echo $_SESSION['domestics']; ?>" style="display:none">
                            <input type="file" name="change_domestics" id="change_domestics" style="display:none">
                        </form> -->

                        <!-- <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid black;" __idm_frm__="50"></iframe> -->
                        <!-- Profile image -->
                        <!-- <div class="text-center img-placeholder">
                            <h4>Update image</h4>
                        </div> -->
                        <!-- Image update link -->
                        <!-- <a href="javascript:void(0);" class="img-upload-iconLinks" id="photo_change_domestics" data-domestics="< ?php echo $_SESSION['domestics']; ?>" data-user="< ?php echo $employers['user_id_']; ?>">
                            <i class="fa fa-camera" aria-hidden="true"></i> </a> -->
                            <img class="rounded-circle shadow-lg" style="height:100%;width:120px;" id="imagePreview" src="<?php echo BASE_URL_PUBLIC.'uploads/domestics/'.$employers['photo_']; ?>">
                    </div>
                </div>

            </div><!-- card-body -->
        </div>

        <div class="card text-center">
            <div class="card-header py-2">
                <h4 class="card-title"><?php echo $employers['firstname_'].' '.$employers['lastname_']; ?></h4>
            </div>
            <div class="card-body">
                <div class="text-muted mb-1" style="font-size:12px;"><?php echo $employers['namedistrict']; ?> District/ <?php echo $employers['namesector']; ?> Sector</div>
                <div class="card-title"><?php echo $employers['location_districts'].' Districts/'.$employers['location_sector'].' sector'; ?></div>
                <div class="card-text text-success">Domestic Helper</div>
                <div class="card-text">1o years of experience</div>
                <div class="card-text">Finish contract</div>
                <div class="card-text text-left"><?php echo $employers['text_']; ?></div>
            </div>
            <div class="card-footer py-2 main-active">
                <div class="card-text">Available FROM 03 Aug 2019</div>
            </div>
        </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-7 ">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

            <div class="card">
                <div class="card-header p-1 main-active">
                    <!-- < ?php echo $_SESSION['domestics'];?> -->
                    <form class="form-inline float-right">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                            </div>
                            <input type="text" class="form-control search" name="search" id="search" aria-describedby="helpId"
                                placeholder="Find A Location">
                            </div>
                            <div class="search-result">			
                            </div>
                    </form>
                    <h5>Recent jobs for Domestics Helpers </h5>
                </div>
                <div class="card-body">
                    <?php foreach ($domesticsViewJobx as $domesticsViewJobs) { ?>

                            <div class="card flex-md-row h-md-100 border-0 mb-3 shadow-lg">
                                    <img class="card-img-left flex-auto d-none d-lg-block" height="80px" width="80px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/domesticsEmployers/<?php echo $domesticsViewJobs['photo_']; ?>" alt="Card image cap">
                                <div class="card-body pt-0">
                                    <a class="text-primary h5" href="javascript:void(0)" id="employers-view"  data-user="<?php echo $domesticsViewJobs['user_id2']; ?>" data-employer="<?php echo $domesticsViewJobs['jobs_id']; ?>" ><?php echo $domesticsViewJobs['family_type']; ?> looking for Helper</a>
                                    <div class="float-right"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $domesticsViewJobs['namedistrict']; ?>  <span class="text-success ml-2"> FULL-TIME</span></div>
                                    <div class="text-muted">Created on <?php echo $users->timeAgo($domesticsViewJobs['created_on2']); ?></div>
                                    <div class="text-muted mb-1" style="font-size:12px;"><?php echo $domesticsViewJobs['namedistrict']; ?> District/ <?php echo $domesticsViewJobs['namesector']; ?> Sector/ <?php echo $domesticsViewJobs['nameCell']; ?> cell</div>
                                    <div><?php echo $domesticsViewJobs['additioninformation']; ?></div>
                                </div><!-- card-body -->
                            </div><!-- card -->
                         <hr class="bg-info mt-0 mb-1" style="width:95%;">

                    <?php } ?>

                </div><!-- card-body -->
            </div><!-- card -->

            </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

            <div class="tab-pane fade " id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <?php include "siderbar_viewDomestics/profile.php"?>
            </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

            <div class="tab-pane fade" id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
            <?php include "siderbar_viewDomestics/inbox.php"?>
            </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->
        </div><!-- tab-content -->
        </div><!-- col -->
        <div class="col-3">

        </div><!-- col -->

    </div>
</div>