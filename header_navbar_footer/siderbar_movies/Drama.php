<div class="container">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Drama</i></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Drama</li>
                    <li class="breadcrumb-item">Movies</li>
                </ol>
            </div>

        </div>
    </section>
    
       <div class="row">
        <div class="col-md-3">
           <?php echo $movies->moviesMayLike(); ?>
            
        </div> <!-- col -->
        <div class="col-md-6">
            <div id="Drama">
                 <?php echo $movies->moviesCategoriesList(1,'Drama'); ?>
            </div>
       </div> <!-- col -->

        <div class="col-md-3">
          <?php echo $movies->mostwatchesMovies(); ?>

        </div><!-- col -->
        
    </div><!-- row -->
      
</div>

