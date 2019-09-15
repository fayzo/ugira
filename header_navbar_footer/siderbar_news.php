      <header class="blog-header mt-3 py-2 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
          <?php if (isset($_SESSION['key'])) { ?>
            <button type="button" class="btn btn-light" id="add_news" data-news="<?php echo $_SESSION['key']; ?>" > + Add news </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">News</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
          </div>
        </div>
      </header>

<div role="tabpanel">
      <div class="nav-scroller py-1 mb-2 bg-light">
        <nav class="nav d-flex justify-content-between" id="list-tab" role="tablist">
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Home" role="tab" aria-controls="list-Home">Home</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Politics" role="tab" aria-controls="list-Politics">Politics</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Money" role="tab" aria-controls="list-Money">Money</a>
        </nav>
      </div>

<div class="container-fluid mb-5">

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-Home" role="tabpanel" aria-labelledby="list-Home-list">
           <?php include "siderbar_news/Home.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Politics" role="tabpanel" aria-labelledby="list-Politics-list">
           <?php include "siderbar_news/Politics.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Money" role="tabpanel" aria-labelledby="list-Money-list">
           <?php include "siderbar_news/Money.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->
      </div>
      <!-- tab-content -->
</div>
<!-- tabpanel -->
</div>