<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["id"]))
{
 $query = "SELECT * FROM users WHERE user_id = '".$_POST["id"]."'";

 $statement = $connect->query($query);


 $output = '';
while ($result = $statement->fetch_assoc()) {
  # code...
  $results[]= $result ;
}
 foreach($results as $row)
 {
  $output .= '
  <img src="'.BASE_URL_LINK.'/image/users_profile_cover/'.$row['profile_img'].'" class="img-thumbnail" />
  <h4>Name - '.$row["firstname"].'</h4>
  <h4>Phone No. - '.$row["lastname"].'</h4>
  ';
 }
 echo $output;
}

?>
