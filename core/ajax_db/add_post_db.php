<?php
include('../init.php');
$users->preventUsersAccess($_SERVER['REQUEST_METHOD'],realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));

$max = 400*1024;
$message ="";
if (isset($_POST['key'])) {

		if ($_POST['key'] == 'viewORedit') {
			$rowID = $conn->real_escape_string($_POST['rowID']);
			$sql = $conn->query("SELECT image,title, athors, textarea, email, date, address, country, state FROM addpost WHERE post_id='$rowID'");
			$data = $sql->fetch_array();
			$jsonArrays = array(
				'image' => $data['image'],
				'title' => $data['title'],
				'athors' => $data['athors'],
				'textarea' => $data['textarea'],
				'email' => $data['email'],
				'date' => $data['date'],
				'address' => $data['address'],
				'country' => $data['country'],
				'state' => $data['state'],
			);

			exit(json_encode($jsonArrays));
 		}

		if ($_POST['key'] == 'fetch_array') {
			$begin_nmber = $conn->real_escape_string($_POST['begin_nmber']);
			$end_nmber = $conn->real_escape_string($_POST['end_nmber']);

			$sql = $conn->query("SELECT * FROM addpost LIMIT $begin_nmber, $end_nmber");
			if ($sql->num_rows > 0) {
				$response = "";
				$increment=0;
				while($row = $sql->fetch_array()) {
				   $increment++;
					$response .= '
						<tr>
							<td>'.$increment.'</td>
							<td  style="width:100px;"id="title_'.$row["post_id"].'">
							'.
                            (strlen($row["title"]) > 20 ?
                              $row["title"] = substr($row["title"],0,10)."..."
                            : $row["title"])
							.'
							</td>
							</td>
							<td  style="width:100px;"id="image_'.$row["post_id"].'">
							<img width = "60px"  src="'.BASE_URL_LINK_ALL.'image/uploads_posts/'.$row["image"].'"></td>
							<td  style="width:100px;"id="athors_'.$row["post_id"].'">
							'.
                            (strlen($row["athors"]) > 20 ?
                              $row["athors"] = substr($row["athors"],0,10)."..."
                            : $row["athors"])
							.'
							</td>
							<td  style="width:100px;"id="textarea_'.$row["post_id"].'">
							'.
                            (strlen($row["textarea"]) > 20 ?
                            $row["textarea"] = substr($row["textarea"],0,10)."..."
                            : $row["textarea"])
							.'
							</td>
							<td  style="width:100px;"id="email_'.$row["post_id"].'">
							'.
                            (strlen($row["email"]) > 20 ?
                            $row["email"] = substr($row["email"],0,10)."..."
                            : $row["email"])
							.'
							</td>
							<td  style="width:100px;"id="date_'.$row["post_id"].'">'.$row["date"].'</td>
							<td>
								<input type="button" onclick="viewORedit_('.$row["post_id"].', \'edit\')" value="Edit" class="btn btn-primary">
								<input type="button" onclick="viewORedit_('.$row["post_id"].', \'view\')" value="View" class="btn">
								<input type="button" onclick="deleteRow_('.$row["post_id"].')" value="Delete" class="btn btn-danger">
							</td>
						</tr>
					';
				}
				exit($response);
			} else
				exit('Max');
		}

		$rowID = $conn->real_escape_string($_POST['rowID']);

		if ($_POST['key'] == 'deleteRow') {
			$conn->query("DELETE FROM addpost WHERE post_id='$rowID'");
			exit('The Row Has Been Deleted!');
		}

		$title = $conn->real_escape_string($_POST['title']);
		$athors = $conn->real_escape_string($_POST['athors']);
		$textarea = $conn->real_escape_string($_POST['textarea']);
		$email = $conn->real_escape_string($_POST['email']);
		$date = $conn->real_escape_string($_POST['date']);
		$address = $conn->real_escape_string($_POST['address']);
		$country = $conn->real_escape_string($_POST['country']);
		$state = $conn->real_escape_string($_POST['state']);

		if ($_POST['key'] == 'updateRow') {
			$conn->query("UPDATE addpost SET title='$title', athors='$athors', textarea='$textarea',
			email='$email', date='$date', address='$address', country='$country', state='$state' WHERE post_id='$rowID'");
			exit('Post Has Been Update!');
		}
		
		   
		if ($_POST['key'] == 'addpost') {
		    	$sql = $conn->query("SELECT * FROM addpost WHERE title = '$title'");
		    	if ($sql->num_rows > 0){
		    	   exit("Country With This Name Already Exists!");
		    	}else {
		            $conn->query("INSERT INTO addpost (title, athors, textarea, email, date, address, country, state) 
		    		VALUES ('$title','$athors', '$textarea','$email','$date','$address','$country','$state')");
		            exit('Country Has Been Inserted!');
		    	}
			}
		$conn->close();
	}
?>
 