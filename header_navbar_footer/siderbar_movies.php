      <header class="blog-header mt-3 py-2 bg-light">
         <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-12 text-center">
           <?php echo $home->links(); ?>
          </div>
        </div>
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
          <?php if (isset($_SESSION['key'])) { ?>
            <button type="button" class="btn btn-light mt-2" id="add_movies" data-movies="<?php echo $_SESSION['key']; ?>" > + Add movies </button>
           <?php } ?>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Movies</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
           <form class="form-inline">
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="searches" id="searches" aria-describedby="helpId"
                        placeholder="Search">
                </div>
              </form>
          </div>
        </div>
      </header>


<div role="tabpanel">
      <div class="nav-scroller py-1 mb-2 bg-light">
        <nav class="nav d-flex justify-content-between" id="list-tab" role="tablist">
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Home" role="tab" aria-controls="list-Home">Home</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Action" role="tab" aria-controls="list-Action">Action</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Thriller" role="tab" aria-controls="list-Thriller">Thriller</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Drama" role="tab" aria-controls="list-Drama">Drama</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Comedie" role="tab" aria-controls="list-Comedie">Comedie</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Animation" role="tab" aria-controls="list-Animation">Animation</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Police" role="tab" aria-controls="list-Police">Police</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Fiction" role="tab" aria-controls="list-Fiction">Fiction</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-horror" role="tab" aria-controls="list-horror">horror</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-History" role="tab" aria-controls="list-History">History</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-war" role="tab" aria-controls="list-war">war</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Adventure" role="tab" aria-controls="list-Adventure">Adventure</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Music" role="tab" aria-controls="list-Music">Music</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Africans_movies" role="tab" aria-controls="list-Africans_movies">Africans movies</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Tv_series" role="tab" aria-controls="list-Tv_series">Tv series</a>
           <a class="p-2 text-muted" data-toggle="tab" href="#list-Anime_series" role="tab" aria-controls="list-Anime_series">Anime series</a>
        </nav>
      </div>

<div class="container-fluid mb-5">

       <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-Home" role="tabpanel" aria-labelledby="list-Home-list">
           <?php include "siderbar_movies/Home.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Action" role="tabpanel" aria-labelledby="list-Action-list">
           <?php include "siderbar_movies/Action.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-Thriller" role="tabpanel" aria-labelledby="list-Thriller-list">
           <?php include "siderbar_movies/Thriller.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Drama" role="tabpanel" aria-labelledby="list-Drama-list">
           <?php include "siderbar_movies/Drama.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Comedie" role="tabpanel" aria-labelledby="list-Comedie-list">
           <?php include "siderbar_movies/Comedie.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Animation" role="tabpanel" aria-labelledby="list-Animation-list">
           <?php include "siderbar_movies/Animation.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Police" role="tabpanel" aria-labelledby="list-Police-list">
           <?php include "siderbar_movies/Police.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-Fiction" role="tabpanel" aria-labelledby="list-Fiction-list">
           <?php include "siderbar_movies/Fiction.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-horror" role="tabpanel" aria-labelledby="list-horror-list">
           <?php include "siderbar_movies/horror.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade " id="list-History" role="tabpanel" aria-labelledby="list-History-list">
           <?php include "siderbar_movies/history.php"?>
        </div> <!-- END-OF A LINK OF DASH_BOARD ID=#  -->

        <div class="tab-pane fade" id="list-war" role="tabpanel" aria-labelledby="list-war-list">
                     <?php include "siderbar_movies/war.php"?>
         </div> <!-- END-OF A LINK OF Comment ID=#  -->

         <div class="tab-pane fade" id="list-Adventure" role="tabpanel" aria-labelledby="list-Adventure-list">
            <?php include "siderbar_movies/Adventure.php"?>
         </div> <!-- END-OF A LINK OF profile ID=#  -->

         <div class="tab-pane fade" id="list-Music" role="tabpanel" aria-labelledby="list-Music-list">
            <?php include "siderbar_movies/Music.php"?>
         </div> <!-- END-OF A LINK OF profile ID=#  -->

         <div class="tab-pane fade" id="list-Africans_movies" role="tabpanel" aria-labelledby="list-Africans_movies-list">
            <?php include "siderbar_movies/Africans_movies.php"?>
         </div> <!-- END-OF A LINK OF profile ID=#  -->

         <div class="tab-pane fade" id="list-Tv_series" role="tabpanel" aria-labelledby="list-Tv_series-list">
            <?php include "siderbar_movies/Tv_series.php"?>
         </div> <!-- END-OF A LINK OF profile ID=#  -->

         <div class="tab-pane fade" id="list-Anime_series" role="tabpanel" aria-labelledby="list-Anime_series-list">
            <?php include "siderbar_movies/Anime_series.php"?>
         </div> <!-- END-OF A LINK OF profile ID=#  -->
      </div>
      <!-- tab-content -->
</div>
<!-- tabpanel -->
</div>