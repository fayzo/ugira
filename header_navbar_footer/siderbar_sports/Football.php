 
  <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i>Football</i></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Football</li>
                    <li class="breadcrumb-item"><button type="button" class="btn btn-light btn-sm" id="add_football" data-football="<?php echo $_SESSION['key']; ?>" > + Add football </button></li>
                    <li class="breadcrumb-item">Sports</li>
                </ol>
            </div>

        </div>
    </section>

    <div class="row">
        <div class="col-md-3">
            <?php echo $football->footballRecent_news('Football'); ?>
        </div><!-- col -->

        <div class="col-md-6">
            <div class="card">
                 <div id="Football-view">
                      <?php echo $football->currentDatefootballMatch(0); ?>
                </div>
            </div> <!-- card -->
        </div> <!-- col -->

        <div class="col-md-3">
             <div class="card">
          <div class="card-header text-center main-active">
              <div class="h5">Football Scores Tables</div>
          </div>
          <div class="card-body">
           <table class="table table-sm table-hover table-striped">
               <thead>
                   <tr>
                       <th></th>
                       <th>Championship</th>
                       <th>P</th>
                       <th>GD</th>
                       <th>PTS</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td class="bg-success">1</td>
                       <td>Apr</td>
                       <td>43</td>
                       <td>50</td>
                       <td>98</td>
                   </tr>
                   <tr>
                       <td class="bg-success">2</td>
                       <td>Rayon</td>
                       <td>34</td>
                       <td>79</td>
                       <td>90</td>
                   </tr>
                   <tr>
                       <td>3</td>
                       <td>Mukura</td>
                       <td>34</td>
                       <td>79</td>
                       <td>90</td>
                   </tr>
                   <tr>
                       <td>4</td>
                       <td>As kigali</td>
                       <td>34</td>
                       <td>79</td>
                       <td>90</td>
                   </tr>
                   <tr>
                       <td class="bg-danger">5</td>
                       <td>etellsec</td>
                       <td>34</td>
                       <td>79</td>
                       <td>90</td>
                   </tr>
               </tbody>
           </table>
          </div><!-- card-body -->
      </div><!-- card -->

        </div><!-- col -->
        
    </div>

  <!-- <ul class="list-inline text-center mb-0">
       < ?php for ($i= 6; $i > 0; $i--) { 
              $date = strtotime("-$i day"); ?>
           <li class="list-inline-item px-2 m-0 bg-light border border-dark text-dark rounded">< ?php echo date('M d', $date);  ?></li>
       < ?php } ?>
       <li class="list-inline-item active px-2 m-0 bg-primary border border-dark text-light rounded">Today</li>
       < ?php for ($i= 1; $i < 6; $i++) { 
              $date = strtotime("+$i day"); ?>
           <li class="list-inline-item px-2 m-0 bg-light border border-dark text-dark rounded">< ?php echo date('M d', $date);  ?></li>
       < ?php } ?>
   </ul> -->