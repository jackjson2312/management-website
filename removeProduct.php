<?php
$id = isset($_POST["id"]) ? (int)$_POST["id"] : false;

$username = isset($_POST["username"]) ? $_POST["username"] : false;

if(username){

	if(!id){
		die('<h1>Lỗi</h1>');
	}
	else{
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "ltweb";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Kết nối CSDL thất bại: " . $conn->connect_error);
		}

		// sql to delete a record
		$sql = "DELETE FROM Product WHERE ID=".$id;

		if ($conn->query($sql) === TRUE) {
		    return "Đã xóa thành công";
		} else {
		    return "Lỗi khi xóa: " . $conn->error;
		}

		$conn->close();
	}
}
else{
	return 'chua dang nhap';
}

?>