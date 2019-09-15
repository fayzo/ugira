      <header class="blog-header mt-3 py-3 bg-light">
         <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="#">Subscribe</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Rwanda Landscapes</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
           <form class="form-inline">
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="searches" id="searches" aria-describedby="helpId"
                        placeholder="Search">
                </div>
              </form>
          </div>
        </div>
      </header>


<div role="tabpanel">
      <div class="nav-scroller py-1 mb-2 bg-light">
        <nav class="nav d-flex justify-content-between" id="list-tab" role="tablist">
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Home" role="tab" aria-controls="list-Home">Home</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Kigali_city" role="tab" aria-controls="list-Kigali_city">Kigali city</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Province" role="tab" aria-controls="list-Province">Province</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Northern" role="tab" aria-controls="list-Northern">Northern Province</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-West" role="tab" aria-controls="list-West">West Province</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-East" role="tab" aria-controls="list-East">East Province</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Southern" role="tab" aria-controls="list-Southern">Southern Province</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Uburanga" role="tab" aria-controls="list-Uburanga">Uburanga</a>
           <button type="button" class="btn btn-light mt-2" id="add_rwandalandscapes" data-rwandalandscapes="<?php echo $_SESSION['key']; ?>" > + Add rwanda-Landscapes </button>
        </nav>
      </div>

<div class="container-fluid  mb-5">

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-Home" role="tabpanel" aria-labelledby="list-Home-list">
           <?php include "siderbar_rwandaPhotos/Home.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Kigali_city" role="tabpanel" aria-labelledby="list-Kigali_city-list">
           <?php include "siderbar_rwandaPhotos/Kigali_city.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Province" role="tabpanel" aria-labelledby="list-Province-list">
           <?php include "siderbar_rwandaPhotos/Province.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Northern" role="tabpanel" aria-labelledby="listNorthern-list">
           <?php include "siderbar_rwandaPhotos/Northern_Province.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-West" role="tabpanel" aria-labelledby="list-West-list">
           <?php include "siderbar_rwandaPhotos/West_Province.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-East" role="tabpanel" aria-labelledby="list-East-list">
           <?php include "siderbar_rwandaPhotos/East_Province.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Southern" role="tabpanel" aria-labelledby="list-East-list">
           <?php include "siderbar_rwandaPhotos/Southern_Province.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Uburanga" role="tabpanel" aria-labelledby="list-Uburanga-list">
           <?php include "siderbar_rwandaPhotos/Uburanga.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

      </div>
      <!-- tab-content -->
</div>
<!-- tabpanel -->
</div>
