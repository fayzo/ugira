      <header class="blog-header py-3 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <button type="button" class="btn btn-light" id="add_house" data-house="<?php echo $_SESSION['key']; ?>" > + Add house </button>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Members To Earning</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
           
          </div>
        </div>
      </header>

      <div style="z-index:2;background: url('<?php echo  BASE_URL_LINK."image/img/"?>img/045.jpg')no-repeat center center;background-size:cover;height:300px;width:auto;position:relative">
        <div class="pt-5" style="background: #3a363659;">
            <div class="h5 text-light text-center">WANT TO EARNING BY JOIN MEMBERS BY DEPOSIT EACH DAY OR WEEK OR MONTH OR YEAR</div>
            <div class="h5 text-light text-center">IT DEPENDS ON YOU CHOOSE WISE </div>
            <div class="h5 text-light text-center">HOW IT WORKS</div>
            <div class="h5 text-light text-center">MOST IMPORTANT THINGS WE SECURE YOU PERSONAL INFORMATION </div>
            <div class="h5 mb-0 pb-4 text-light text-center">HOW YOU CAN JOIN AS GAINING EARNING</div>
        </div>   
          <div class="row" style="absolute;">
                  <div class="col-md-3">
                      
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                        <div class="card-header main-active p-1">
                            <h5 class="float-left"> Choose wise Members you want to join</h5> 
                             <div class="dropdown  float-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Members group
                                        </button>
                                <div class="dropdown-menu main-active" aria-labelledby="triggerId">
                                <?php for ($i=10; $i < 105; $i+=10) { ?>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="schoolCategories('kigali city',1);" >Members of  <?php echo $i; ?> people</a>
                                 <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                          <div class="card flex-md-row h-md-100 border-0 mb-3">
                                    <i style="font-size:60px;margin-top:10px;" class="fa fa-users flex-auto d-none d-lg-block" aria-hidden="true"></i>
                                <div class="card-body d-flex flex-column align-items-start pt-0">
                                    <h5 class="text-primary mb-0">
                                    <a class="text-primary" href="javascript:void(0)" id="employers-view" data-domestics="1">Membes of 10 people</a>
                                    </h5>
                                    <div class="text-muted">Created on 10 MAY </div>
                                    <div class="text-muted mb-1">Musanze District/ kanombe Sector/ Majyambere cell</div>
                                    <div>Know to take care children , knows to cook ,knows to watch car ,knows to take care older</div>
                                </div><!-- card-body -->
                            </div><!-- card -->
                          <div class="card flex-md-row h-md-100 border-0 mb-3">
                                    <i style="font-size:60px;margin-top:10px;" class="fa fa-users flex-auto d-none d-lg-block" aria-hidden="true"></i>
                                <div class="card-body d-flex flex-column align-items-start pt-0">
                                    <h5 class="text-primary mb-0">
                                    <a class="text-primary" href="javascript:void(0)" id="employers-view" data-domestics="1">Membes of 10 people</a>
                                    </h5>
                                    <div class="text-muted">Created on 10 MAY </div>
                                    <div class="text-muted mb-1">Musanze District/ kanombe Sector/ Majyambere cell</div>
                                    <div>Know to take care children , knows to cook ,knows to watch car ,knows to take care older</div>
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div>
                        <div class="card-footer text-muted">
                            Footer
                        </div>
                    </div>
                      
                  </div>
                  <div class="col-md-3">
                      
                  </div>
                  
        </div>
    </div>
    <div style="background: url('<?php echo  BASE_URL_LINK."image/img/"?>img/046.jpg')no-repeat center center;background-size:cover;height:300px;width:auto;position:relative">
    </div>
  