<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Trending extends Home 
{
     public function trends()
    {
       $mysqli= $this->database;
       $query= "SELECT *, COUNT(tweet_id) AS tweetycounts FROM trends INNER JOIN tweets ON status LIKE CONCAT('%#',hashtag,'%') OR retweet_Msg LIKE CONCAT('%#',hashtag,'%') GROUP BY hashtag ORDER BY tweet_id";
       $result=$mysqli->query($query); 

       if ($result->num_rows > 0 ) {
          # code...
       ?>
             <div class="card card-primary mb-3">
                  <div class="card-header main-active p-1">
                        <h5 class="card-title text-center"><i> HashTags</i></h5>
                  </div>
                    <div class="card-body text-center">
      <?php  while ($trend= $result->fetch_array()) { ?>
                    <!-- /.card-header -->
                        <strong><a href="<?php echo BASE_URL_PUBLIC.$trend['hashtag'].'.hashtag' ;?>" >#<?php echo $trend['hashtag'] ;?></a></strong>

                        <p class="text-muted">
                           <?php echo $trend['tweetycounts']." Posts" ; ?>
                        </p>

                        <!-- <hr> -->
      <?php  }  ?>
                  </div> <!-- /.card-body -->
            </div> <!-- /.card -->
   <?php } 
   
   }

    public function getTweetsTrendbyhastag($hashtag)
    {
       $mysqli= $this->database;
       $query= "SELECT * FROM tweets LEFT JOIN users ON tweetBy= user_id WHERE status LIKE '%#".$hashtag."%' OR retweet_Msg LIKE '%#".$hashtag."%' ";
       $result= $mysqli->query($query);
       $tweets_hashtag = array();
       while ($row = $result->fetch_assoc()) {
            /* TABLE OF tweety */
         $tweets_hashtag[] = $row;
      }
       return $tweets_hashtag;

    } 

    public function getUsersHashtag($hashtag)
    {
      $mysqli = $this->database;
      $query = "SELECT DISTINCT * FROM tweets LEFT JOIN users ON tweetBy= user_id WHERE status LIKE '%#" . $hashtag . "%' OR retweet_Msg LIKE '%#" . $hashtag . "%' GROUP BY user_id";
      $result = $mysqli->query($query);
      $users_hashtag = array();
      while ($row = $result->fetch_assoc()) {
            /* TABLE OF tweety */
         $users_hashtag[] = $row;
      }
      return $users_hashtag;
    }
}

$trending = new Trending();
?>