      <header class="blog-header mt-3 py-2 bg-light">
         <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
          <?php if (isset($_SESSION['key'])) { ?>
           <button type="button" class="btn btn-light mt-2" id="add_rwandalandscapes" data-rwandalandscapes="<?php echo $_SESSION['key']; ?>" > + Add rwanda-Landscapes </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Rwanda Entertainment</a>
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
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Break_News" role="tab" aria-controls="list-Break_News">Break News</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Music" role="tab" aria-controls="list-Music">Music</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Film" role="tab" aria-controls="list-Film">Film</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Model" role="tab" aria-controls="list-Model">Model</a>
        </nav>
      </div>

<div class="container-fluid mb-5">

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-Home" role="tabpanel" aria-labelledby="list-Home-list">
           <?php include "siderbar_entertainment/Home.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Break_News" role="tabpanel" aria-labelledby="list-Break_News-list">
           <?php include "siderbar_entertainment/Breaknews.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Music" role="tabpanel" aria-labelledby="list-Music-list">
           <?php include "siderbar_entertainment/Music.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Film" role="tabpanel" aria-labelledby="list-Film-list">
           <?php include "siderbar_entertainment/Film.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Model" role="tabpanel" aria-labelledby="list-Model-list">
           <?php include "siderbar_entertainment/Model.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

      </div>
      <!-- tab-content -->
</div>
<!-- tabpanel -->
</div>
