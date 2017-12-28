<?php
	include('DBConnect.php');
	session_start();

	$username = isset($_POST["username"]) ? $_POST["username"] : false;
	$password = isset($_POST["password"]) ? $_POST["password"] : false;

	if(isset($_POST["submit"]) && $username != false && $password != false) {
	  $sql = "SELECT id,avatar,fullName,level FROM admin WHERE username = '$username' and password = '$password'";
      $result = $conn->query($sql);

      	if ($result->num_rows == 1) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        $_SESSION['login_user_avatar'] = $row["avatar"];
		        $_SESSION['login_user_id'] = $row["id"];
		        $_SESSION['login_user_fullName'] = $row["fullName"];
		        $_SESSION['login_user_username'] = $username;
		        $_SESSION['login_user_level'] = $row["level"];
		    }
	         
	         
	         header("location: index.php");
		} else {
			$error = "Sai ten dang nhap hoac mat khau";
		    echo $error;
		}
	}
	else{
		echo "Loi";
	}
?>