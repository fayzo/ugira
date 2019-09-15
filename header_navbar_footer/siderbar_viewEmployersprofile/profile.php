<?php if (count($employersPosts) > 0 ) { ?>

               <div class="card">
                   <div class="card-header text-center py-2 main-active">
                      <h5>Your request domestics</h5>
                   </div>
                   <div class="card-body">
                       <?php foreach ($employersPosts as $row) { ?>

                       <div class="card flex-md-row shadow-sm h-md-100 border-top-0 border-left-0 border-right-0 mb-3  borders-bottoms">
                                 <div class="card card-img-left flex-auto d-none d-lg-block border-0">
                                    <img class="img-fluid" height="80px" width="80px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/domesticsEmployers/<?php echo $row['photo_'] ;?>" alt="Card image cap">
                                    <div class="card-body text-center p-0">
                                        <h5 class="mb-0"><?php echo $row['lastname_']; ?></h5>
                                        <div class="text-muted"><?php echo $row['country_']; ?></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <a class="text-primary h5" href="javascript:void(0)"id="employers-view"  data-user="<?php echo $row['user_id2']; ?>" data-employer="<?php echo $row['jobs_id']; ?>" ><?php echo $row['family_type']; ?> looking for Helper</a>
                                    <div class="text-muted float-right"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row['namedistrict']; ?>  <span class="text-success ml-2"> FULL TIME</span></div>
                                    <div class="text-muted">Created on <?php echo $users->timeAgo($row['created_on2']); ?></div>
                                    <div class="text-muted mb-1" style="font-size:12px;"><?php echo $row['namedistrict']; ?> District/ <?php echo $row['namesector']; ?> Sector/ <?php echo $row['nameCell']; ?> cell</div>
                                    <div><?php echo $row['additioninformation']; ?></div>
                                </div><!-- card-body -->
                        </div><!-- card -->

                        <?php } ?>
                   </div>
               </div>
        <?php } ?>