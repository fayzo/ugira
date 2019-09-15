      <header class="blog-header mt-3 py-2 bg-light">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
          <?php if (isset($_SESSION['key'])) { ?>
            <button type="button" class="btn btn-light" id="add_hotel" data-hotel="<?php echo $_SESSION['key']; ?>" value="add_hotel"> + Add hotel </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Hotel Booking</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
          </div>
        </div>
      </header>

<div class="container-fluid mb-5">
    <div class="row mt-3">
      <div class="col-md-8 offset-2" id="hotel-view">
              <?php echo $hotel->hotelList(1,'featured'); ?>
      </div>
    </div>
</div>
