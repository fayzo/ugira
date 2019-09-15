    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Science</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Science</li>
                </ol>
            </div>
        </div>
    </section>

<div class="row">
    <div class="col-8 col-md-8 col-lg-8 ">
      <div id="historyPagination">
          <!-- SLIDER WITH CAPTIONS -->
          <?php echo $blog->Blogcarousel('science'); ?>
          <!-- END SLIDER WITH CAPTIONS -->
          <?php echo $blog->blogs(1,'science',$user_id); ?>
      </div>
    </div> 
    <!-- col -->
      
      <div class="col-4 col-md-4 col-lg-4 px-4">
          <?php echo $blog-> BlogRecent_Articles('science',$user_id); ?>
    </div> <!-- col -->
</div> <!-- row -->
