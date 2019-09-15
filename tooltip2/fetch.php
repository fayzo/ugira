<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["id"]))
{
 $sql="SELECT * FROM tweets LEFT JOIN users ON tweetBy= user_id WHERE tweetBy = '{$_POST["id"]}' ";
   $query= $db->query($sql);
  
   $output = '';
   while ($result = $query->fetch_assoc()) {
     # code...
     $results[]= $result ;
   }

   foreach($results as $row)
   {
    $output .= '
    <img src="'.BASE_URL_LINK.'/image/users_profile_cover/'.$row["profile_img"].'" class="img-thumbnail" />
    <h4>Name - '.$row["username"].'</h4>
    ';
   }
   echo $output;
}

?>
