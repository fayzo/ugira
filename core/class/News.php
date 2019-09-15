<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class News extends Home{

    public function NewsList()
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM news ORDER BY created_on3 Desc Limit 0,8");
        while($row= $query->fetch_array()) { ?>
        <li class="time-label">
                    <span class="bg-success text-light" style="position: absolute;font-size: 11px; padding: 2px; margin-left: 9px;"> <?php echo $this->timeAgo($row['created_on3']) ;?> </span>

                <div class="timeline-item card flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="100px" width="100px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/news/<?php echo $row['photo'] ;?>" alt="Card image cap">
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="news-readmore" data-news="<?php echo $row['news_id'] ;?>" > <?php echo $row['title'] ;?></a>
                    </h5>
                    <div class="text-muted">Created on By <?php echo $this->timeAgo($row['created_on3']) ;?> </div>
                    <p class="card-text"><?php echo $row['text'] ;?> </p>

                  </div><!-- card-body -->
                </div><!-- card -->

                </li>
                <!-- END timeline item -->

     <?php } 

    }
    
    public function NewsReadmore($news_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN news N ON N. user_id3 = u. user_id WHERE N. news_id = '$news_id' ");
        $row= $query->fetch_array();
        return $row;
    }
}
$news= new News();
?>