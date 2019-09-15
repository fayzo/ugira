<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Blog extends Home{

    public function blogs($pages,$categories,$user_id){
        $pages= $pages;
        $categories= $categories;
        
        if($pages === 0 || $pages < 1){
            $showpages = 0 ;
        }else{
            $showpages = ($pages*6)-6;
        }
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id WHERE B. categories_blog ='$categories' AND B. blog_post != 'posted' ORDER BY created_on3 Desc Limit $showpages,6");
        ?>
        <div class="row mt-2 mb-2">
        <?php while($row= $query->fetch_array()) { 

              $retweet= $this->checkBlogRetweet($row['blog_id'],$user_id);
              $likes= $this->Bloglikes($user_id,$row['blog_id']);

          ?>

        <div class="col-md-6">
          <div class="card flex-md-row mb-4 border-0 h-md-250" style="box-shadow:0 0 0.5ch 0.5ch rgba(35, 35, 32, 0.15);">
            <img class="card-img-left flex-auto d-none d-lg-block" width="200px" height="250px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/Blog/<?php echo $row['photo'] ;?>" alt="Card image cap">
            <div class="card-body d-flex flex-column align-items-start">
              <h4 style="font-family: Playfair Display, Georgia, Times New Roman, serif;text-align:left;">
               <a class="text-primary text-left" href="javascript:void(0)" id="blog-readmore" data-blog="<?php echo $row['blog_id'] ;?>">
                <?php 
                    if (strlen($row["title"]) > 36) {
                      echo $row["title"] = substr($row["text"],0,36).'... ';
                    }else{
                      echo $row["title"];
                    } ?></a>
              </h4>
              <div class="mb-1 text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
              <p class="mb-auto"> 
                <?php 
                    if (strlen($row["text"]) > 174) {
                      echo $row["text"] = substr($row["text"],0,174).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="'.$row['blog_id'].'" class="text-muted" style"font-weight: 500 !important;">Continue reading >>> </a></span>';
                    }else{
                      echo $row["text"];
                    } ?> 
              </p>
                  <ul class="list-inline mb-0" style="list-style-type: none;">  

                      <?php if($row['blog_id'] == $retweet['retweet_blog_id']){ ?>
                              <li class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="share-btn blog-retweeted0 text-sm mr-2" data-blog="'.$row['blog_id'].'"  data-user="'.$row['user_id3'].'"'; }else{ echo 'id="login-please" data-login="1"'; } ?>  >
                              <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet['retweet_counts'] ;?> </span></i></button></li>
                      <?php }else{ ?>
                              <li class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="share-btn blog-retweet0 text-sm mr-2" data-blog="'.$row['blog_id'].'"  data-user="'.$row['user_id3'].'"'; }else{ echo 'id="login-please"  data-login="1"'; } ?>  >
                              <i class="fa fa-share mr-1" > <span class="retweetcounter">  <?php if ($row['retweet_counts'] > 0){ echo $row['retweet_counts'];}else{ echo '';} ?></span></i>
                              <!-- < ?php if($retweet["retweet_counts"] > 0){ echo '<i class="fa fa-share mr-1" style="color: green"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>' ; }else{ echo '<i class="fa fa-share mr-1"> <span class="retweetcounter">'.$retweet["retweet_counts"].'</span></i>';} ?> -->
                              </button></li>
                      <?php } ?>

                      <?php if($likes['like_on'] == $row['blog_id']){ ?>
                            <li  class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="unlike-blog-btn text-sm  mr-2"'; }else{ echo 'id="login-please"  data-login="1"'; } ?> data-blog="<?php echo $row['blog_id']; ?>" data-user="<?php echo $row['user_id']; ?>">
                            <i class="fa fa-heart-o mr-1" style="color: red"> <span class="likescounter"><?php echo $row['likes_counts'] ;?> </span></i></button></li>
                      <?php }else{ ?>
                            <li  class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="like-blog-btn text-sm  mr-2"'; }else{ echo 'id="login-please" data-login="1"'; } ?> data-blog="<?php echo $row['blog_id']; ?>" data-user="<?php echo $row['user_id']; ?>">
                            <i class="fa fa-heart-o mr-1" > <span class="likescounter">  <?php if ($row['likes_counts'] > 0){ echo $row['likes_counts'];}else{ echo '';} ?></span></i></button></li>
                      <?php } ?>

                            <span class='text-right float-right'>
                        
                              <li  class="list-inline-item"><button class="comments-btn text-sm" >
                                  <i class="fa fa-comments-o mr-1"></i> (<?php echo $this->CountBlogComment($row['blog_id']); ?>)
                              </button></li>

                         <?php if($user_id == $row['user_id3']){ ?>

                                <li  class=" list-inline-item">
                                    <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                        <li>
                                            <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                            <ul style="list-style-type: none; margin:0px;" >
                                                <li style="list-style-type: none; margin:0px;"> 
                                                  <label class="deleteblog"  data-blog="<?php echo $row["blog_id"];?>"  data-user="<?php echo $row["user_id3"];?>">Delete </label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                         <?php } ?>
                              </span>
                        </ul>
            </div>
          </div>
        </div>

        <?php } 

        $query1= $mysqli->query("SELECT COUNT(*) FROM users U Left JOIN blog B  ON B. user_id3 = u. user_id WHERE B. categories_blog ='$categories' AND B. blog_post != 'posted' ORDER BY created_on3 Desc ");
        $row_Paginaion = $query1->fetch_array();
        $total_Paginaion = array_shift($row_Paginaion);
        $post_Perpages = $total_Paginaion/6;
        $post_Perpage = ceil($post_Perpages); ?>

    </div>

    <?php if($post_Perpage > 1){ ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($pages > 1) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="blog_FecthRequest('<?php echo $categories; ?>',<?php echo $pages-1; ?>)">Previous</a></li>
            <?php } ?>
            <?php for ($i=1; $i <= $post_Perpage; $i++) { 
                    if ($i == $pages) { ?>
                 <li class="page-item active"><a href="javascript:void(0)"  class="page-link" onclick="blog_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
                 <?php }else{ ?>
                <li class="page-item"><a href="javascript:void(0)"  class="page-link" onclick="blog_FecthRequest('<?php echo $categories; ?>',<?php echo $i; ?>)" ><?php echo $i; ?> </a></li>
            <?php } } ?>
            <?php if ($pages+1 <= $post_Perpage) { ?>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" onclick="blog_FecthRequest('<?php echo $categories; ?>',<?php echo $pages+1; ?>)">Next</a></li>
            <?php } ?>
        </ul>
    </nav>

       <?php } ?>

   <?php }

    public function BlogReadmore($blog_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id WHERE B. blog_id = '$blog_id' ");
        $row= $query->fetch_array();
        return $row;
    }

    public function Blogcarousel($categories)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id WHERE B. categories_blog ='$categories' AND B. blog_post != 'posted' ORDER BY created_on3 Desc Limit 1,3");
        $query1= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id WHERE B. categories_blog ='$categories' AND B. blog_post != 'posted' ORDER BY created_on3 Desc Limit 0,1");
        $countRow= $mysqli->query("SELECT categories_blog FROM blog WHERE categories_blog ='$categories' AND blog_post != 'posted'  ORDER BY created_on3 Desc Limit 0,4");
        $row1= $query1->fetch_array()
        ?>

        <div id="slider4" class="carousel slide mb-5" data-ride="carousel">
          <ol class="carousel-indicators">
            <li class="active" data-target="#slider4" data-slide-to="0"></li>
            <?php  for($i=2;$i <= $countRow->num_rows ; ++$i) {  ?>
               <li data-target="#slider4" data-slide-to="<?php echo $i; ?>"></li>
            <?php } ?>

          </ol>

          <div class="carousel-inner" role="listbox">

             <div class="carousel-item active">
                   <img class="d-block" width="100%" height="200px" src="<?php echo BASE_URL_LINK ;?>image/img/dark.png">
                    <div class="container">
                       <div class="carousel-caption text-left">
                         <h1 class="display-4 font-italic" style="font-family: Playfair Display, Georgia, Times New Roman, serif;"><a style="color: #fff" href="javascript:void(0)" id="blog-readmore" data-blog="<?php echo $row1['blog_id'];?> "> <?php echo  $row1['title']; ?></a></h1>
                         <div class="text-muted">Created on <?php echo $this->timeAgo($row1['created_on3']) ;?> By <?php echo $row1['authors'] ;?> </div>
                         <p class="lead my-3">
                          <?php 
                             if (strlen($row1["text"]) > 184) {
                              echo $row1["text"] = substr($row1["text"],0,184).'...  <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="'.$row1['blog_id'].'" class="text-white font-weight-bold">Continue reading...</a></span>';
                            }else{
                              echo $row1["text"].$countRow->num_rows;
                            } ?> 
                         </p>
                       </div>
                     </div>
                </div>

           <?php while($row= $query->fetch_array()) {  ?>

                <div class="carousel-item">
                   <img class="d-block" width="100%" height="200px" src="<?php echo BASE_URL_LINK ;?>image/img/dark.png">
                    <div class="container">
                       <div class="carousel-caption text-left">
                         <h1 class="display-4 font-italic" style="font-family: Playfair Display, Georgia, Times New Roman, serif;"><a style="color: #c3bebe;" class="text-white" href="javascript:void(0)" id="blog-readmore" data-blog="<?php echo $row['blog_id']; ?>"> <?php echo  $row['title']; ?></a></h1>
                         <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
                         <p class="lead my-3">
                          <?php 
                             if (strlen($row["text"]) > 184) {
                              echo $row["text"] = substr($row["text"],0,184).'... <br><span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="'.$row1['blog_id'].'" class="text-white font-weight-bold">Continue reading...</a></span>';
                            }else{
                              echo $row["text"];
                            } ?> 
                         </p>
                       </div>
                     </div>
                </div>
    
            <?php } ?>
          </div>

          <a href="#slider4" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>

          <a href="#slider4" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>

<?php }

    public function BlogRecent_Articles($categories,$user_id)
    {
        $mysqli= $this->database;
        $query= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id WHERE B. categories_blog ='$categories' and B. created_on3  > DATE_SUB(NOW(), INTERVAL 1 MONTH) and B. blog_post != 'posted' ORDER BY B. created_on3 Desc , rand() Limit 5");
            //  SECOND	, MINUTE, HOUR, DAY, WEEK	, MONTH	, QUARTER	, YEAR,
       
          if($query->num_rows != 0){
        ?>
       <div class="card d-none d-lg-block">
        <div class="card-header main-active">
          <h5>Recent Articles</h5>
        </div>
        <div class="card-body px-2">
            <div class="row">
        <?php while($row= $query->fetch_array()) {  
              $retweet= $this->checkBlogRetweet($row['blog_id'],$user_id);
              $likes= $this->Bloglikes($user_id,$row['blog_id']);
          ?>

              <div class="col-md-12 mb-2">
                <div class="card flex-md-row shadow-sm h-md-100 border-0">
                  <img class="card-img-left flex-auto d-none d-lg-block" height="130px" width="100px" src="<?php echo BASE_URL_PUBLIC ;?>uploads/Blog/<?php echo $row['photo'] ;?>" alt="Card image cap">
                  <div class="card-body d-flex flex-column align-items-start pt-0">
                    <h5 class="text-primary mb-0">
                   <a class="text-primary" href="javascript:void(0)" id="blog-readmore" data-blog="<?php echo $row['blog_id']; ?> ">
                    <?php 
                    if (strlen($row["title"]) > 73) {
                      echo $row["title"] = substr($row["text"],0,73).'... ';
                    }else{
                      echo $row["title"];
                    } ?></a>
                    </h5>
                    <div class="text-muted">Created on <?php echo $this->timeAgo($row['created_on3']) ;?> By <?php echo $row['authors'] ;?> </div>
                    <p class="card-text mb-1">
                         <?php 
                             if (strlen($row["text"]) > 100) {
                              echo $row["text"] = substr($row["text"],0,100).'... <span class="mb-0"><a href="javascript:void(0)" id="blog-readmore" data-blog="'.$row['blog_id'].'" class="text-muted" style"font-weight: 500!important;">Continue reading...</a></span>';
                            }else{
                              echo $row["text"];
                            } ?> 
                    </p>
                        <!-- <ul class="list-inline mb-0" style="list-style-type: none;">  
                              <li class=" list-inline-item"><button class="share-btn retweeted text-sm mr-2">
                              <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"> 23</span></i>Share</button></li>

                            <li  class=" list-inline-item"><button class="unlike-btn text-sm  mr-2" >
                            <i class="fa fa-heart-o mr-1" style="color: red"> <span class="likescounter"> 343</span></i>Like</button></li>

                              <span class='text-right float-right'>
                        
                              <li  class="list-inline-item"><button class="comments-btn text-sm" data-toggle="collapse">
                                  <i class="fa fa-comments-o mr-1"></i> (5)
                              </button></li>

                                <li  class=" list-inline-item">
                                    <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                        <li>
                                            <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                            <ul style="list-style-type: none; margin:0px;" >
                                        <li style="list-style-type: none; margin:0px;"> 
                                          <label class="deleteTweet" >Delete </label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                              </span>
                        </ul> -->
                    <ul class="list-inline mb-0" style="list-style-type: none;">  

                      <?php if($row['blog_id'] == $retweet['retweet_blog_id']){ ?>
                              <li class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="share-btn blog-retweeted0 text-sm mr-2" data-blog="'.$row['blog_id'].'"  data-user="'.$row['user_id3'].'"'; }else{ echo 'id="login-please" data-login="1"'; } ?>  >
                              <i class="fa fa-share green mr-1" style="color: green"> <span class="retweetcounter"><?php echo $retweet['retweet_counts'] ;?> </span></i></button></li>
                      <?php }else{ ?>
                              <li class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="share-btn blog-retweet0 text-sm mr-2" data-blog="'.$row['blog_id'].'"  data-user="'.$row['user_id3'].'"'; }else{ echo 'id="login-please"  data-login="1"'; } ?>  >
                              <i class="fa fa-share mr-1" > <span class="retweetcounter">  <?php if ($row['retweet_counts'] > 0){ echo $row['retweet_counts'];}else{ echo '';} ?></span></i>
                              </button></li>
                      <?php } ?>

                      <?php if($likes['like_on'] == $row['blog_id']){ ?>
                            <li  class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="unlike-blog-btn text-sm  mr-2"'; }else{ echo 'id="login-please"  data-login="1"'; } ?> data-blog="<?php echo $row['blog_id']; ?>" data-user="<?php echo $row['user_id']; ?>">
                            <i class="fa fa-heart-o mr-1" style="color: red"> <span class="likescounter"><?php echo $row['likes_counts'] ;?></span></i></button></li>
                      <?php }else{ ?>
                            <li  class=" list-inline-item"><button <?php if(isset($_SESSION['key'])){ echo 'class="like-blog-btn text-sm  mr-2"'; }else{ echo 'id="login-please" data-login="1"'; } ?> data-blog="<?php echo $row['blog_id']; ?>" data-user="<?php echo $row['user_id']; ?>">
                            <i class="fa fa-heart-o mr-1" > <span class="likescounter">  <?php if ($row['likes_counts'] > 0){ echo $row['likes_counts'];}else{ echo '';} ?></span></span></i></button></li>
                      <?php } ?>

                            <span class='text-right float-right'>
                        
                              <li  class="list-inline-item"><button class="comments-btn text-sm" data-toggle="collapse">
                                  <i class="fa fa-comments-o mr-1"></i> (<?php echo $this->CountBlogComment($row['blog_id']); ?>)
                              </button></li>

                         <?php if($user_id == $row['user_id3']){ ?>

                                <li  class=" list-inline-item">
                                    <ul class="deleteButt" style="list-style-type: none; margin:0px;" >
                                        <li>
                                            <a href="javascript:void(0)" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                            <ul style="list-style-type: none; margin:0px;" >
                                                <li style="list-style-type: none; margin:0px;"> 
                                                  <label class="deleteTweet" >Delete </label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                         <?php } ?>
                              </span>
                        </ul>

                  </div><!-- card-body -->
                </div><!-- card -->
              </div> <!-- col -->

      <?php } ?>

            </div> <!-- row -->
        </div> <!-- card-body -->
      </div> <!-- card -->
      <?php }else{ ?>
         <div class="row text-center">
          <div class="col-md-6 mr-0 d-none d-md-block">
              <div class="card">
                <div class="card-header main-active">
                  <h5>Categories</h5>
                </div>
                <div class="card-body pb-0 px-0">
                  <div class="list-group sticky-top pt-0 px-0" id="list-tab" role="tablist"  style="top: 52px;">
                    <a class="list-group-item list-group-item-action" id="list-Technology-list" data-toggle="tab" href="#list-Technology" role="tab" aria-controls="list-Technology">Technology</a>
                    <a class="list-group-item list-group-item-action active" id="list-Design-list" data-toggle="tab" href="#list-Design" role="tab" aria-controls="list-Design">Design</a>
                    <a class="list-group-item list-group-item-action" id="list-Culture-list" data-toggle="tab" href="#list-Culture" role="tab" aria-controls="list-Culture">Culture</a>
                    <a class="list-group-item list-group-item-action" id="list-Business-list" data-toggle="tab" href="#list-Business" role="tab" aria-controls="list-Business">Business</a>
                    <a class="list-group-item list-group-item-action" id="list-Politics-list" data-toggle="tab" href="#list-Politics" role="tab" aria-controls="list-Politics">Politics</a>
                    <a class="list-group-item list-group-item-action" id="list-Opinion-list" data-toggle="tab" href="#list-Opinion" role="tab" aria-controls="list-Opinion">Opinion</a>
                    <a class="list-group-item list-group-item-action" id="list-Health-list" data-toggle="tab" href="#list-Health" role="tab" aria-controls="list-Health">Health</a>
                    <a class="list-group-item list-group-item-action" id="list-Style-list" data-toggle="tab" href="#list-Style" role="tab" aria-controls="list-Style">Style</a>
                    <a class="list-group-item list-group-item-action" id="list-Travel-list" data-toggle="tab" href="#list-Travel" role="tab" aria-controls="list-Travel">Travel</a>
                    <a class="list-group-item list-group-item-action" id="list-History-list" data-toggle="tab" href="#list-History" role="tab" aria-controls="list-History">History</a>
                    <a class="list-group-item list-group-item-action" id="list-Science-list" data-toggle="tab" href="#list-Science" role="tab" aria-controls="list-Science">Science</a>
                    <a class="list-group-item list-group-item-action" id="list-Science-list" data-toggle="tab"  href="#list-Computer_science" role="tab" aria-controls="list-Computer_science">Computer science</a>
                    <button type="button" class="btn btn-light mt-2" id="add_blog" data-blog="<?php echo $_SESSION['key']; ?>" > + Add Blog </button>
                  </div>
                </div> <!-- card-body -->
              </div> <!-- card --> 
          </div> <!-- col -->
          <div class="col-md-6 ml-0 d-none d-md-block">
              <?php echo $this->options(); ?>
          </div> <!-- col -->
        </div> <!-- row -->

      <?php } ?>

<?php  }

    public function getPopupBlogTweet($user_id,$blog_id,$blog_by)
    {
        $mysqli= $this->database;
        $result= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id Left JOIN blog_like L ON L. like_on = B. blog_id Left JOIN blog_comment C ON C. comment_on = B. blog_id WHERE B. user_id3 =$blog_by AND B. blog_id = $blog_id ");
        while ($row= $result->fetch_array()) {
            # code...
            return $row;
        }
    }

      public function blogretweet($retweet_id,$user_id,$tweet_by,$comments)
    {
        $mysqli= $this->database;
        $stmt = $mysqli->stmt_init();
        $query= "UPDATE blog SET retweet_counts = retweet_counts +1  WHERE blog_id= ? ";
        $stmt->prepare($query);
        $stmt->bind_param('i',$retweet_id);
        $stmt->execute();

        $query= "INSERT INTO blog (created_on3,user_id3,retweet_blog_id,tweet_blog_by,categories_blog,title,text,authors,photo,other_photo,video,youtube,likes_counts,retweet_counts, blog_posted_on, blog_retweet_Msg,blog_post) 
        SELECT created_on3,user_id3,?,?,categories_blog,title,text,authors,photo,other_photo,video,youtube,likes_counts,retweet_counts, ?, ?,? FROM blog WHERE blog_id= ? ";

        $stmt->prepare($query);
        $time = date('Y-m-d H-i-s');
        $post = 'posted';
        $stmt->bind_param('iisssi', $retweet_id, $user_id,$time,$comments,$post,$retweet_id);
        $stmt->execute();  
        $query= "DELETE FROM blog WHERE blog_id= ?";
        $stmt->prepare($query);
        $stmt->bind_param('i',$stmt->insert_id);

        // if ($retweet_id != $user_id) {
        //     var_dump($tweet_by,$user_id, $retweet_id,'retweet');
        //     Notification::SendNotifications($tweet_by,$user_id,$retweet_id,'retweet');
        //     var_dump(Notification::SendNotifications($tweet_by,$user_id,$retweet_id,'retweet'));
        // }

        var_dump($stmt->execute());
        
        return $stmt->execute();
    }
    
      public function comments($tweet_id)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM blog_comment LEFT JOIN users ON comment_by=user_id LEFT JOIN blog ON comment_on=blog_id  WHERE comment_on = $tweet_id ORDER BY comment_at DESC";
        $result= $mysqli->query($query);
        $comments= array();
        while ($row= $result->fetch_assoc()) {
             $comments[] = $row;
        }
        return $comments;
    }

       public function addLikeblog($user_id,$blog_id,$get_id)
    {
        $mysqli= $this->database;
        $query= "UPDATE blog SET likes_counts = likes_counts +1 WHERE blog_id= $blog_id ";
        $mysqli->query($query);
        // if ($get_id != $user_id) {
        //     Notification::SendNotifications($get_id,$user_id,$blog_id,'likes');
        // }
        $this->creates('blog_like',array('like_by' => $user_id ,'like_on' => $blog_id));
    }

      public function unLikeblog( $user_id,$blog_id, $get_id)
    {
        $mysqli= $this->database;
        $query= "UPDATE blog SET likes_counts = likes_counts -1 WHERE blog_id= $blog_id ";
        $mysqli->query($query);

        $query= "DELETE FROM blog_like WHERE like_by = $user_id AND like_on = $blog_id ";
        $mysqli->query($query);

    }

       public function addLikeblogUsercomment($user_id,$comment_id,$get_id)
    {
        $mysqli= $this->database;
        $query= "UPDATE blog_comment SET likes_counts_ = likes_counts_ +1 WHERE comment_id= $comment_id ";
        $mysqli->query($query);
        // if ($get_id != $user_id) {
        //     Notification::SendNotifications($get_id,$user_id,$blog_id,'likes');
        // }
        $this->creates('blog_comment_like',array('like_by_' => $user_id ,'like_on_' => $comment_id));
    }

      public function unLikeblogUsercomment($user_id,$comment_id, $get_id)
    {
        $mysqli= $this->database;
        $query= "UPDATE blog_comment SET likes_counts_ = likes_counts_ -1 WHERE comment_id= $comment_id ";
        $mysqli->query($query);

        $query= "DELETE FROM blog_comment_like WHERE like_by_ = $user_id AND like_on_ = $comment_id ";
        $mysqli->query($query);

    }

       public function blog_getPopupTweet($user_id,$tweet_id,$tweet_by)
    {
        $mysqli= $this->database;
        $result= $mysqli->query("SELECT * FROM users U Left JOIN blog B ON B. user_id3 = u. user_id Left JOIN blog_like L ON L. like_on = B. blog_id WHERE B. blog_id = $tweet_id AND B. user_id3 = $tweet_by ");
        // var_dump('ERROR: Could not able to execute'. $query.mysqli_error($mysqli));
        while ($row= $result->fetch_array()) {
            # code...
            return $row;
        }
    }
    
    public function deleteLikesBlog($tweet_id,$user_id)
    {
        $mysqli= $this->database;
        $query="DELETE B , L ,C ,R FROM blog B 
                        LEFT JOIN blog_like L ON L. like_on = B. blog_id 
                        LEFT JOIN blog_comment_like C ON C. like_on_ = B. blog_id 
                        LEFT JOIN blog_comment R ON R. comment_on = B. blog_id 
                        WHERE B. blog_id = '{$tweet_id}' and B. user_id3 = '{$user_id}' ";

        $query1="SELECT * FROM blog WHERE blog_id = $tweet_id and user_id3 = $user_id ";

        $result= $mysqli->query($query1);
        $rows= $result->fetch_assoc();

        if(!empty($rows['photo'])){
            $photo=$rows['photo'].'='.$rows['other_photo'];
            $expodefile = explode("=",$photo);
            $fileActualExt= array();
            for ($i=0; $i < count($expodefile); ++$i) { 
                $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
            }
            $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
            if (array_diff($fileActualExt,$allower_ext) == false) {
                $expode = explode("=",$photo);
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/Blog/';
                for ($i=0; $i < count($expode); ++$i) { 
                      unlink($uploadDir.$expode[$i]);
                }
            }else if (array_diff($fileActualExt,$allower_ext)[0] == 'mp4') {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/Blog/';
                      unlink($uploadDir.$photo);
            }else if (array_diff($fileActualExt,$allower_ext)[0] == 'mp3') {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/Blog_nyarwanda_CMS/uploads/Blog/';
                      unlink($uploadDir.$photo);
            }
        }

        $query= $mysqli->query($query);
        // var_dump("ERROR: Could not able to execute $query.".mysqli_error($mysqli));

        if($query){
                exit('<div class="alert alert-success alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>SUCCESS DELETE</strong> </div>');
            }else{
                exit('<div class="alert alert-danger alert-dismissible fade show text-center">
                    <button class="close" data-dismiss="alert" type="button">
                        <span>&times;</span>
                    </button>
                    <strong>Fail to delete !!!</strong>
                </div>');
        }
    }
    
     public function checkBlogRetweet($tweet_id,$user_id)
    {
        $mysqli= $this->database;
        $stmt = $mysqli->stmt_init();
        $query="SELECT * FROM blog WHERE retweet_blog_id= ?  AND tweet_blog_by= ? OR blog_id=? AND tweet_blog_by=? ";
        $stmt->prepare($query);
        $stmt->bind_param('iiii', $tweet_id, $user_id, $tweet_id, $user_id);
        $stmt->bind_result($blog_id, $created_on3,$user_id3,$retweet_idd, $tweetBy, $categories_blog, $title, $text, $authors ,$photo ,
        $other_photo,$video,$youtube,$profile_title_main,$profile_title,$likes_counts,$retweet_counts,$blog_posted_on,$blog_retweet_Msg, $blog_post);
        $stmt->execute();
        $CountRetweet= array();
        while ($stmt->fetch()) {
             $CountRetweet[] = array(
              /* TABLE OF tweety */
             "blog_id" => $blog_id,
             "created_on3" => $created_on3,
             "user_id3" => $user_id3,
             "retweet_blog_id" => $retweet_idd,
             "tweet_blog_by" => $tweetBy,
             "categories_blog" => $categories_blog,
             "title" => $title,
             "text" => $text,
             "authors" => $authors, 
             "photo" => $photo,  
             "other_photo" => $other_photo, 
             "video" => $video, 
             "youtube" => $youtube, 
             "profile_Title_main" => $profile_title_main,
             "profile_Title" => $profile_title,
             "likes_counts" => $likes_counts, 
             "retweet_counts" => $retweet_counts, 
             "blog_posted_on" => $blog_posted_on, 
             "blog_retweet_Msg" => $blog_retweet_Msg, 
             "blog_post" => $blog_post, 
           );
        }
        foreach ($CountRetweet as $countsRetweet) {
            # code...
            return $countsRetweet; // Return the $contacts array
        }

    }

      public function Bloglikes($user_id,$tweet_id)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM blog_like WHERE like_by = $user_id AND like_on = $tweet_id";
        $result= $mysqli->query($query);

        $fetchCountLikes= array();
        while ($row= $result->fetch_assoc()) {
             $fetchCountLikes[] = array(
            'like_id' => $row['like_id'],
            'like_by' => $row['like_by'],
            'like_on' => $row['like_on']
           );
        }
        foreach ($fetchCountLikes as $fetchLikes) {
            # code...
            return $fetchLikes; // Return the $contacts array
        }
    }

      public function blog_comment_like($user_id,$tweet_id)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM blog_comment_like WHERE like_by_ = $user_id AND like_on_ = $tweet_id";
        $result= $mysqli->query($query);

        $fetchCountLikes= array();
        while ($row= $result->fetch_assoc()) {
             $fetchCountLikes[] = array(
            'like_id_' => $row['like_id_'],
            'like_by_' => $row['like_by_'],
            'like_on_' => $row['like_on_']
           );
        }
        foreach ($fetchCountLikes as $fetchLikes) {
            # code...
            return $fetchLikes; // Return the $contacts array
        }
    }

    public function CountBlogComment($blog_id){
      $db =$this->database;
      $query="SELECT COUNT(*) FROM blog_comment WHERE comment_on= $blog_id";
      $sql= $db->query($query);
      $row_Comment = $sql->fetch_array();
      $total_Comment= array_shift($row_Comment);
      $array= array(0,$total_Comment);
      $total_Comment= array_sum($array);
      echo $total_Comment;
    }


}

$blog = new Blog();

?>
