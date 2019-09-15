 
  <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Party</i></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Party</li>
                    <li class="breadcrumb-item">Events</li>
                </ol>
            </div>

        </div>
    </section>

<div class="row">
    <div class="col-8 col-md-8 col-lg-8 ">
      <div id="Party">
          <!-- SLIDER WITH CAPTIONS -->
          <?php echo $blog->Blogcarousel('history'); ?>
          <!-- END SLIDER WITH CAPTIONS -->
         <?php echo $events->eventsList(1,'Party',$user_id); ?>
      </div>
    </div> 
    <!-- col -->
      
      <div class="col-4 col-md-4 col-lg-4 px-4">
          <?php echo $events->Recent_Events('Party',$user_id); ?>
    </div> <!-- col -->
</div> <!-- row -->
