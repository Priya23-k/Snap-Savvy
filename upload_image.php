<?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location:index.php");
	}
?>
<?php

    include "connection1.php";

    $mimage = $_FILES['photo'];
    $mdesc = $_POST['discription'];
    $mdate = $_POST['m_date'];
    $mcreateddate = date('m/d/Y h:i:s', time());;
    $mstatus = "LIVE";
    $mid = $_SESSION['user_id'];
	$filename = "";
	
	
			if(isset($_FILES["photo"]))
			{
			$filename = $_FILES["photo"]["name"];
			$tempname = $_FILES["photo"]["tmp_name"];    
					$folder = "images/".$filename;
					 
					// Now let's move the uploaded image into the folder: image
					if (move_uploaded_file($tempname, $folder))  
					{
					}
			}

				$sql = "INSERT INTO memories(`mid`, `mimage`,`mdesc`,`mdate`,`mcreateddate`,`mstatus`,`id`) VALUES (NULL, '$filename', '$mdesc','$mdate','$mcreateddate','$mstatus','$mid')";
				if(mysqli_query($conn,$sql))
				{
					echo"New record created succesfully";
					header("Location:image.php");
				}
				else
				{
					echo "Error: " .$sql."".mysqli_error($conn);
				}
			mysqli_close($conn);

?>