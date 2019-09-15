
<?php 
include('../core/init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php 
$query = "SELECT * FROM tweets LEFT JOIN users ON tweetBy= user_id";
$statement = $db->query($query);
while ($result = $statement->fetch_assoc()) {
  # code...
  $results[]= $result ;
}
 foreach($results as $rowId){
?>                
   <tr>
      <td id="tooltip1">
         <a href="#" class="payoudata" data-id="<?php echo $rowId['user_id']; ?>"><?php echo $rowId['user_id']; ?>
           <span>
             <div class="PayoutData<?php echo $rowId['user_id']; ?>"></div>
           </span>
         </a>
      </td>
    </tr>  
<?php } ?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    $('.payoudata').hover(function(){

    var id=  $(this).attr("data-id");

    $.ajax({
        type:'post',
        url:'fetch.php',
        data:{id : id},
        success: function(paydataresult){
            $('.PayoutData' + id).html(paydataresult);
            }
        });
    });
</script>
</body>
</html>