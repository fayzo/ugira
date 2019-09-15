<?php 
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

        $username = $db->real_escape_string($_POST['username']);
		$firstname = $db->real_escape_string($_POST['firstname']);
		$lastname = $db->real_escape_string($_POST['lastname']);
		$email = $db->real_escape_string($_POST['email']);
		$password = $db->real_escape_string($_POST['password']);
		$date = $db->real_escape_string($_POST['date']);
        $address = $db->real_escape_string($_POST['address']);
        $address2 = $db->real_escape_string($_POST['address2']);
        $state = $db->real_escape_string($_POST['state']);
        $country = $db->real_escape_string($_POST['country']);
 
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
		$file = $_FILES['image']['name'];
		$error= $_FILES['image']['error'];
        $filesize= $_FILES['image']['size'];
		
		if($file){
			    $fileName = $db->real_escape_string(strtolower(rand(100,1000).$_FILES['image']['name']));
				$coverName = 'defaultCoverImage.png';
		}else{
			$fileName = 'defaultprofileimage.png';
			$coverName = 'defaultCoverImage.png';
		}

              $fileExt = explode('.', $fileName);
              $fileActualExt = strtolower(end($fileExt));
          	
        if(in_array($fileActualExt, $valid_extensions)) {	

		    if ($error == 0) {
                if ($filesize <= 400*1024) {

   		          $fileTmpName = $_FILES['image']['tmp_name'];
   		          $fileDestination = $_SERVER['DOCUMENT_ROOT'].'Blog_nyarwanda/private/assets/image/users/user_image_profile/'.$fileName;	
   		     
   		         if(move_uploaded_file($fileTmpName,$fileDestination)) {
     
		         	$sql = $db->query("SELECT username,email FROM add_admin WHERE username = '$username' and email = '$email' ");
		         	if ($sql->num_rows > 0)
		         	   exit("User information Already Exists!");
		         	else {
		                 $db->query("INSERT INTO add_admin (username,firstname,lastname,email,password,date,cover_image,profile_image,address,address2,state,country) 
		         		VALUES ('$username','$firstname','$lastname','$email','$password','$date','$coverName','$fileName','$address','$address2','$state','$country')");
		                 exit('User information Has Been Inserted!');
		         	}
	   	     	}
	   	  }else {
      
              switch ($fileName ) {
                   case 2:
                      exit($fileName .' is too big');
                       break;
                    case 4:
                      exit( $fileName .' No file selected');
                       break;
                   default:
                      exit( $fileName .' sorry that type of file is not allowed');
                       break;
                     }
   	             }
	   	    }
	   }
		$db->close();
?>