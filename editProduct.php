<!DOCTYPE html>
			<html lang='vi'>
			<head>
			  <title>Sửa Sản Phẩm</title>
			  <meta charset='utf-8'>
			  <meta name='viewport' content='width=device-width, initial-scale=1'>
			  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
			  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
			</head>
			<body>
					<div class='container'>
			  		<h2>Sửa Sản Phẩm</h2>

<?php

	include 'DBConnect.php';
  session_start();
	if(isset($_SESSION['login_user_username'])){
        $id = isset($_GET['id']) ? (int)$_GET['id'] : false;

      if(!$id){
        die('<h1>Loi! Vui long thu lai!</h1>');
      }
      else{

        $sql = "SELECT * FROM Product WHERE ID=".$id;
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                
                      echo "
            <form class='form-horizontal' action='postEditProduct.php' method='POST' enctype='multipart/form-data'>
                      <div class='form-group'>
                        <label class='control-label col-sm-2' for='name'>Tên Sản Phẩm:</label>
                        <div class='col-sm-10'>
                          <input type='hidden' value='".$id."' name='id' />
                          <input type='text' class='form-control' id='name' placeholder='IPhone X' name='name' value='".$row["name"]."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class='control-label col-sm-2' for='description'>Mô Tả:</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='description' placeholder='Sản phẩm hàng đầu thế giới...' name='description' value='".$row["description"]."'>
                        </div>
                      </div>

                      <div class='form-group'>
                        <label class='control-label col-sm-2' for='price'>Giá:</label>
                        <div class='col-sm-10'>
                          <input type='text' class='form-control' id='price' placeholder='69000' name='price' value='".$row["price"]."'>
                        </div>
                      </div>

                       <div class='form-group'>
                        <label for='category' class='control-label col-sm-2'>Danh Mục:</label>
                        <div class='col-sm-10'>
                          <select class='form-control' id='category' name='category'>";

                            echo  "<option value='1'"; if($row["ID"] == 1) echo"selected"; echo "> Máy Tính </option>";
                            echo "<option value='2'"; if($row["ID"] == 2) echo"selected"; echo "> Điện Thoại </option>";
                            echo "<option value='3'"; if($row["ID"] == 3) echo"selected"; echo "> Thể Thao </option>";
                            echo "<option value='4'"; if($row["ID"] == 4) echo"selected"; echo "> Tablet </option>";
                            
                         echo "</select>
                        </div>
                      </div>

                       <div class='form-group'>
                        <label for='image' class='control-label col-sm-2'>Hình Ảnh:</label>
                        <div class='col-sm-10'>
                          <input type='file' name='file' class=''>Tải lên Ảnh</input>
                          <img src='".$row["image"]."' class='img-rounded' width='100px' height='100px' />
                        </div>
                      </div>  
                      
                      <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                          <input type='submit' class='btn btn-success btn-block' name='submit' value='Hoàn Tất'></input>
                        </div>
                      </div>
                    </form> 
          ";
              }
          } else {
              echo "0 results";
          }

          $conn->close();

      }
  }
  else{
      echo '<center><h2>Chưa Đăng Nhập! Hãy <a href="login.php">Đăng Nhập</a> trước!</h2></center>';
  }
?>
		</div>
	</body>
</html>