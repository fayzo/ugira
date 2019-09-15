 <div class="container">
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>War</i></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">War</li>
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
            <div id="War">
                 <?php echo $movies->moviesCategoriesList(1,'War'); ?>
            </div>
       </div> <!-- col -->

        <div class="col-md-3">

          <ul class="list-group mb-5 border-top-0" style='margin:0 px'>
              <a class="list-group-item list-group-item-action text-center py-1" style ='background-color: rgba(0,0,0,.03);' href="#"><h5><i> Most Watchest Movies</i></h5></a>
              <a class="list-group-item list-group-item-action" href="#">=> Fast and Furious 8   <div><i class="fa fa-eye" aria-hidden="true"></i> 23 000 000 Viewers</div></a>
              <a class="list-group-item list-group-item-action" href="#">=> Men In Black 8  <div ><i class="fa fa-eye" aria-hidden="true"></i> 3 000 000 Viewers</div></a>
              <a class="list-group-item list-group-item-action" href="#">=> aladdin  <div><i class="fa fa-eye" aria-hidden="true"></i> 30 000 000 Viewers</div> </a>
          </ul><!-- LIST GROUP WITH LINKS -->
        </div><!-- col -->
        
    </div><!-- row -->
      
</div>

