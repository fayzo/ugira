  <div class="container">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Africans movies</i></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Africans movies</li>
                    <li class="breadcrumb-item">series</li>
                </ol>
            </div>

        </div>
    </section>

       <div class="row">
        <div class="col-md-3">
           <?php echo $movies->moviesMayLike(); ?>
            
        </div> <!-- col -->
        <div class="col-md-6">
            <div id="Africans-Movies">
                 <?php echo $movies->moviesCategoriesList(0,'Africans-Movies'); ?>
            </div>
       </div> <!-- col -->

        <div class="col-md-3">

                   <?php echo $movies->mostwatchesMovies(); ?>

        </div><!-- col -->
        
    </div><!-- row -->
      
</div>