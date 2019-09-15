<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Football extends Home{
    
    public function footballRecent_news($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN sports S ON S. user_id3 = u. user_id WHERE S. categories_sports ='$categories' and created_on3  > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_on3 Desc , rand() Limit 5");
            //  SECOND	, MINUTE, HOUR, DAY, WEEK	, MONTH	, QUARTER	, YEAR,
        if($query->num_rows != 0){
        ?>
       <div class="card d-none d-lg-block">
        <div class="card-header main-active">
          <h5>Recent Football News</h5>
        </div>
        <div class="card-body px-2">
            <div class="row">
        <?php while($row= $query->fetch_array()) {  ?>

              <div class="col-md-12 mb-2">
                <div class="card flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="100px" width="100px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/sports/<?php echo $row['photo'] ;?>" alt="Card image cap">
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <div class="text-primary mb-0" style='text-align:left'>
                   <a class="text-primary" href="javascript:void(0)" id="sports-readmore" data-sports="<?php echo $row['sports_id']; ?> "> <?php echo  $row['title']; ?></a>
                   </div>
                    <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
                    <p class="card-text">
                         <?php 
                             if (strlen($row["text"]) > 1) {
                              echo $row["text"] = substr($row["text"],0,0).'<span class="mb-0"><a href="javascript:void(0)" id="sports-readmore" data-sports="'.$row['sports_id'].'" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                            }else{
                              echo $row["text"];
                            } ?> 
                    </p>
                  </div><!-- card-body -->
                </div><!-- card -->
              </div> <!-- col -->

      <?php } ?>

            </div> <!-- row -->
        </div> <!-- card-body -->
      </div> <!-- card -->

    <?php } 
    }

    public function currentDatefootballMatch($day)
    {
        if($day === 0){
          $dayz= 1;
        }else{
          $dayz= $day;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM football WHERE SUBDATE(NOW(), INTERVAL $dayz DAY ) < date_of_match ORDER BY created_on3 Desc Limit 3");
            //  SECOND	, MINUTE, HOUR, DAY, WEEK	, MONTH	, QUARTER	, YEAR,
            // var_dump('ERROR: Could not able to execute $sql.'.mysqli_error($mysqli));
        if($query->num_rows != 0){
        ?>
        <div class="card-header main-active p-1">
            <nav>
                 <ul class="pagination justify-content-center">
                <?php for ($i= 7; $i > 0; $i--) { 
                       $date = strtotime("-$i day"); ?>
                       <li class="page-item"><a class="page-link px-1  text-dark" href="javascript:void(0)" onclick="Football_FecthRequest(<?php echo -$i; ?>)"><?php echo date('M d', $date);  ?></a></li>
                <?php } ?>
                <?php for ($i= 0; $i < 7; $i++) { 
                       $date = strtotime("+$i day");
                         if ($i == $day) { ?>
                    <li class="page-item active"><a class="page-link px-1  text-light" href="javascript:void(0)" onclick="Football_FecthRequest(<?php echo $i; ?>)" ><?php if ($i === 0) { echo 'Today';}else{ echo date('M d', $date); } ?></a></li>
                <?php }else{ ?>
                    <li class="page-item"><a class="page-link px-1  text-dark" href="javascript:void(0)" onclick="Football_FecthRequest(<?php echo $i; ?>)" ><?php echo date('M d', $date);  ?></a></li>
                <?php } } ?>
                </ul>
            </nav>
        </div> <!-- card-header -->
        <div class="card-body">
        <div class="card">
          <div class="card-header main-active">
              <div class="float-right">June 12</div>
              <div> Azam league - GROUP A</div>
          </div>
            <div class="card-body p-0">
              <!-- LIST GROUP WITH LINKS -->
              <ul class="list-group">
            <?php while($row= $query->fetch_assoc()) { ?>

                  <div class="list-group-item list-group-item-action" >
                      <div class="float-right"><i class="fa fa-star" aria-hidden="true"></i></div>
                      <div class="float-left">21:00</div>
                      <div class="text-center"><?php echo $row['match_game']; ?></div>
                  </div>

            <?php } ?>
              </ul>
              </div><!-- card-body -->
            </div> <!-- card-body -->
            <div class="card-footer text-muted">
            </div> <!-- card-footer -->
        </div> <!-- card -->

    <?php }

    }

 
}
$football = new Football();
