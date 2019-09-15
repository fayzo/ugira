<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
       header('Location: ../../404.html');
 }

class Comment extends Users
{
    public function comments($tweet_id)
    {
        $mysqli= $this->database;
        $query= "SELECT * FROM comment LEFT JOIN users ON comment_by=user_id WHERE comment_on = $tweet_id ";
        $result= $mysqli->query($query);
        $comments= array();
        while ($row= $result->fetch_assoc()) {
             $comments[] = $row;
        }
        return $comments;
    }

    public function delete($table,$array)
    {
        $mysqli= $this->database;
        $query= "DELETE FROM $table";
        $where= " WHERE"; 
        foreach ($array as $name => $value) {
            # code...
             $query .= "{$where} {$name} = {$value}";
             $where= " AND"; 
        }

        $query1= "SELECT * FROM $table";
        $where1= " WHERE"; 
        foreach ($array as $name => $value) {
            # code...
             $query1 .= "{$where1} {$name} = {$value}";
             $where1= " AND"; 
        }

        $result= $mysqli->query($query1);
        $rows= $result->fetch_assoc();

        if(!empty($rows['tweet_image'])){
            $expodefile = explode("=",$rows['tweet_image']);
            $fileActualExt= array();
            for ($i=0; $i < count($expodefile); ++$i) { 
                $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
            }
            $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
            if (array_diff($fileActualExt,$allower_ext) == false) {
                $expode = explode("=",$rows['tweet_image']);
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda_CMS/uploads/posts/';
                for ($i=0; $i < count($expode); ++$i) { 
                      unlink($uploadDir.$expode[$i]);
                }
            }else if (array_diff($fileActualExt,$allower_ext)[0] == 'mp4') {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda_CMS/uploads/posts/';
                      unlink($uploadDir.$rows['tweet_image']);
            }else if (array_diff($fileActualExt,$allower_ext)[0] == 'mp3') {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda_CMS/uploads/posts/';
                      unlink($uploadDir.$rows['tweet_image']);
            }
        }

        $query= $mysqli->query($query);

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

    public function deleteLikesNotificatPosts($tweet_id,$user_id)
    {
        $mysqli= $this->database;
        $query="DELETE T , N ,L ,C ,R FROM tweets T 
                        LEFT JOIN notification N ON N. target = T. tweet_id 
                        LEFT JOIN likes L ON L. like_on = T. tweet_id 
                        LEFT JOIN comment C ON C. comment_on = T. tweet_id 
                        LEFT JOIN trends R ON R. target = T. tweet_id 
                        WHERE T. tweet_id = '{$tweet_id}' and T. tweetBy = '{$user_id}' ";

        $query1="SELECT * FROM tweets WHERE tweet_id = $tweet_id and tweetBy = $user_id ";

        $result= $mysqli->query($query1);
        $rows= $result->fetch_assoc();

        if(!empty($rows['tweet_image'])){
            $expodefile = explode("=",$rows['tweet_image']);
            $fileActualExt= array();
            for ($i=0; $i < count($expodefile); ++$i) { 
                $fileActualExt[]= strtolower(substr($expodefile[$i],-3));
            }
            $allower_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf' , 'doc' , 'ppt'); // valid extensions
            if (array_diff($fileActualExt,$allower_ext) == false) {
                $expode = explode("=",$rows['tweet_image']);
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda_CMS/uploads/posts/';
                for ($i=0; $i < count($expode); ++$i) { 
                      unlink($uploadDir.$expode[$i]);
                }
            }else if (array_diff($fileActualExt,$allower_ext)[0] == 'mp4') {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda_CMS/uploads/posts/';
                      unlink($uploadDir.$rows['tweet_image']);
            }else if (array_diff($fileActualExt,$allower_ext)[0] == 'mp3') {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda_CMS/uploads/posts/';
                      unlink($uploadDir.$rows['tweet_image']);
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
}

$comment= new Comment();
?>