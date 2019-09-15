<!--
//index.php
!-->

<?php

include('database_connection.php');

$query = "SELECT * FROM users ORDER BY firstname ASC";

$statement = $connect->query($query);
 $results=array();
while ($result = $statement->fetch_assoc()) {
  # code...
  $results[]= $result ;
}
?>

<html>  
    <head>  
        <title>How to Load Ajax Data in jQuery UI Tooltip using PHP</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">How to Load Ajax Data in jQuery UI Tooltip using PHP</a></h3><br />
   <br />
   <div class="row">
    <div class="col-md-3">
    
    </div>
    <div class="col-md-6">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Student Details</h3>
      </div>
      <div class="panel-body">
       <div class="table-responsive">
        <table class="table table-striped table-bordered">
         <tr>
          <th>Student Name</th>
         </tr>
         <?php
         foreach($results as $row)
         {
          echo '<tr><td><b><a  class="payoudata" href="#" id="'.$row["user_id"].'" title=" ">'.$row["firstname"].'</a></b></td></tr>';
         }
         ?>
        </table>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
    </body>  
</html>  

<script>  
$(document).ready(function(){ 

 $('.payoudata').tooltip({
  classes:{
   "ui-tooltip":"highlight"
  },
  position:{ my:'left center', at:'right+50 center'},
  content:function(result){
   $.post('fetch.php', {
    id:$(this).attr('id')
   }, function(data){
    result(data);
   });
  }
 });
  
});  

</script>