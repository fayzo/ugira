<?php include "header_navbar_footer/header_if_login.php"?>
<?php include "header_navbar_footer/header.php"?>
<?php include "header_navbar_footer/navbar.php"?>

<div class="container-fluid mt-3 mb-5">
   <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Activities Options Posts</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Activities </li>
                    <li class="breadcrumb-item active"><i>Posts</i></li>
                </ol>
            </div>
        </div>
    </section>
    
      <div class="card">
          <div class="card-header">
               <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link  active" href="#jobs"
                        data-toggle="tab">Jobs</a> </li>
                    <li class="nav-item"><a class="nav-link" href="#fundraisings"
                        data-toggle="tab">Fundraisings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events"
                        data-toggle="tab">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blogs"
                        data-toggle="tab">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#sale"
                        data-toggle="tab">Sale</a></li>
                </ul>
          </div>
          <div class="card-body">
           <div class="tab-content">
                <div class="tab-pane active " id="jobs">
                      <?php echo $home->jobsactivities($_SESSION['key']); ?>
                </div> 
                <div class="tab-pane" id="fundraisings">
                    <?php echo $home->fundraisingsActivities($_SESSION['key']); ?>
                </div>
                <div class="tab-pane" id="events">
                   <?php echo $home->eventsListActivities($_SESSION['key']); ?>
                </div>
                <div class="tab-pane" id="blogs">
                    <?php echo $home->blogsActivities($_SESSION['key']); ?>
                </div>
                <div class="tab-pane" id="sale">
                   <?php echo $home->saleActivities($_SESSION['key']); ?>
                </div>
            </div> <!-- /.tab-content -->
          </div>
          <div class="card-footer text-muted">
              Footer
          </div>
      </div>


</div>

<?php include "header_navbar_footer/footer.php"?>