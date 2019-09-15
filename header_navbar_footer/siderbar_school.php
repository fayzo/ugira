        <header class="blog-header mt-3 py-2 bg-light">
          <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
          <?php if (isset($_SESSION['key'])) { ?>
            <button type="button" class="btn btn-light" id="add_school" data-school="<?php echo $_SESSION['key']; ?>" > + Add school </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">School & University</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
          <span id="clock"></span>
          </div>
        </div>
      </header>

<div class="container-fluid mb-5">

    <div class="row mt-3">
      <div class="col-3 col-md-3 col-lg-3 py-3 px-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
            </div> <!-- card -->
      </div>

      <div class="col-6 col-md-6 col-lg-6 mt-3 " id="jobs-hides">
            <?php echo $school->schoolList(1,'kigali city'); ?>
      </div>

      <div class="col-md-3 mt-3 ">
        <span id="responseSubmititerm"> </span>
        <div id="responseSubmitcartiterm">
          <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
            </div> <!-- card -->
        </div>
      </div><!-- col -->

    </div><!-- row -->
</div><!-- container-fluid -->
