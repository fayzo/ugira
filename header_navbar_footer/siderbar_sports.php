      <header class="blog-header mt-3 py-2 bg-light">
      <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
          <?php if (isset($_SESSION['key'])) { ?>
             <button type="button" class="btn btn-light mt-2" id="add_sports" data-sports="<?php echo $_SESSION['key']; ?>" > + Add sports </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Sports</a>
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
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Football" role="tab" aria-controls="list-Football">Football</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Basketball" role="tab" aria-controls="list-Basketball">Basketball</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Volleyball" role="tab" aria-controls="list-Volleyball">Volleyball</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Tenis" role="tab" aria-controls="list-Tenis">Tenis</a>
        </nav>
      </div>

<div class="container-fluid mb-5">

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-Home" role="tabpanel" aria-labelledby="list-Home-list">
           <?php include "siderbar_sports/Home.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Football" role="tabpanel" aria-labelledby="list-Football-list">
           <?php include "siderbar_sports/Football.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Basketball" role="tabpanel" aria-labelledby="list-Basketball-list">
           <?php include "siderbar_sports/Basketball.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Volleyball" role="tabpanel" aria-labelledby="list-Volleyball-list">
           <?php include "siderbar_sports/Volleyball.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Tenis" role="tabpanel" aria-labelledby="list-Tenis-list">
           <?php include "siderbar_sports/Tenis.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

      </div>
      <!-- tab-content -->
</div>
<!-- tabpanel -->
</div>