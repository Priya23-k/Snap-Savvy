<?php

    include "connection1.php";
	session_start();

    $ufname = $_POST['fname'];
    $ulname = $_POST['lname'];
    $uaddress = $_POST['address'];
    $ugender = $_POST['gender'];
    $ustate = $_POST['state'];
    $ucity = $_POST['city'];
    $udob = $_POST['dob'];
    $upincode = $_POST['pincode'];
    $uemail = $_POST['email'];
    $upassword = $_POST['password'];
$ufilename = "base.jpg";
if(isset($_FILES["photo"]))
{
$ufilename = $_FILES["photo"]["name"];
$tempname = $_FILES["photo"]["tmp_name"];    
        $folder = "images/".$ufilename;
         
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  
		{
        }
}
if(isset($_POST['update']))
	{
$upqry = "UPDATE `user` SET `fname`= '$ufname',`lname` = '$ulname' ,`address` = '$uaddress',`gender` = '$ugender',`state` = '$ustate',`city` = '$ucity',
`pincode` = '$upincode',`email` = '$uemail',`password`= '$upassword',
`photo` = '$ufilename' WHERE `user`.`id` = ".$_SESSION['user_id'];
	//echo"$upqry";
	//exit();
	if(mysqli_query($conn,$upqry))
		{
		echo mysqli_affected_rows($conn)."UPDATEED succesfully";
		header("Location:homepage.php");
		}
	else
		{
			echo "Error".$sql."".mysqli_error($conn);
		}
	}
	
	mysqli_close($conn);
?>
