      <header class="blog-header mt-3 py-2 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
          <?php if (isset($_SESSION['key'])) { ?>
           <button type="button" class="btn btn-light" id="add_blog" data-blog="<?php echo $_SESSION['key']; ?>" > + Add Blog </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Travel</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
          </div>
        </div>
      </header>

<div role="tabpanel">
      <div class="nav-scroller py-1 mb-2 bg-light">
        <nav class="nav d-flex justify-content-between" id="list-tab" role="tablist">
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Home" role="tab" aria-controls="list-Home">Home</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Travel" role="tab" aria-controls="list-Travel">Travel</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Destination" role="tab" aria-controls="list-Destination">Destination</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Culture" role="tab" aria-controls="list-Culture">Culture</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Style" role="tab" aria-controls="list-Style">LifeStyle</a>
        </nav>
      </div>
  <!-- </div>

<div role="tabpanel">
  <div class="row">
    <div class="col-4 col-md-2 col-lg-2 py-3 px-2">
      <div class="list-group sticky-top" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active" id="list-History-list" data-toggle="tab" href="#list-History" role="tab" aria-controls="list-History">History</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="tab" href="#list-Science" role="tab" aria-controls="list-Science">Science</a>
        <a class="list-group-item list-group-item-action" id="list-Sports-list" data-toggle="tab" href="#list-Computer_science" role="tab" aria-controls="list-Computer_science">Computer science</a>
        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="tab" href="#list-Politics" role="tab" aria-controls="list-Politics">Politics</a>
        <button type="button" class="btn btn-light mt-2" id="add_blog" data-blog="< ?php echo $_SESSION['key']; ?>" > + Add Blog </button>
      </div>
    </div> -->
<div class="container-fluid mb-5">
      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade" id="list-Home" role="tabpanel" aria-labelledby="list-Design-list">
           <?php include "siderbar_travel/Home.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

         <div class="tab-pane fade " id="list-Travel" role="tabpanel" aria-labelledby="list-Travel-list">
           <?php include "siderbar_travel/Travel.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Destination" role="tabpanel" aria-labelledby="list-Culture-list">
           <?php include "siderbar_travel/Destination.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Culture" role="tabpanel" aria-labelledby="list-Culture-list">
           <?php include "siderbar_travel/Culture.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Style" role="tabpanel" aria-labelledby="list-Science-list">
                     <?php include "siderbar_travel/Lifestyle.php"?>
         </div> <!-- END-OF A LINK OF Comment ID=#  -->

      </div>
      <!-- tab-content -->
</div>
<!-- tabpanel -->                                                                                                                                   
</div>