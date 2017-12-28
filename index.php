<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Quản Lý Sản Phẩm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php include 'DBConnect.php';
      session_start();
      if(isset($_SESSION['login_user_username'])){

 ?>

<div class="container-fluid">
  
        <div class="col-md-3">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <img src="<?php if(isset($_SESSION['login_user_avatar'])){
                  echo $_SESSION['login_user_avatar'];
               }
               ?>" class="img-responsive img-rounded" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
               <?php if(isset($_SESSION['login_user_fullName'])){
                  echo $_SESSION['login_user_fullName'];
               }
               ?>
              </div>
              <div class="profile-usertitle-job">
                <?php if(isset($_SESSION['login_user_username'])){
                  echo $_SESSION['login_user_username'];
               }
               ?>
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
              <button type="button" class="btn btn-success btn-sm">Hồ sơ</button>
              <a href="logout.php" class="btn btn-danger btn-sm">Đăng Xuất</a>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
              <ul class="nav">
                <li class="active">
                  <a href="#">
                  <i class="glyphicon glyphicon-home"></i>
                  Trang Chủ </a>
                </li>
                <li>
                  <a href="#">
                  <i class="glyphicon glyphicon-user"></i>
                  Quản lý Sản phẩm </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                  <i class="glyphicon glyphicon-ok"></i>
                  Quản lý Danh mục </a>
                </li>
                <li>
                  <a href="#">
                  <i class="glyphicon glyphicon-flag"></i>
                  Quản lý Nhà cung cấp </a>
                </li>
              </ul>
            </div>
            <!-- END MENU -->
          </div>
        </div>

    <div class="col-md-9 col-lg-9">
        <h2>Quản Lý Sản Phẩm</h2>
        <p>Gõ tên sản phẩm để tìm kiếm</p>  
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>

        <?php

          if(isset($_SESSION['addProduct_success'])){
              echo "<div class='alert alert-success'>
                      <strong>Thêm Sản Phẩm Thành Công!</strong>
                    </div>";
              unset($_SESSION['addProduct_success']);
          }

        ?>

          <!-- Trigger the modal with a button -->
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Thêm Sản Phẩm</button>
           <br/>

            <!-- Modal thêm sản phẩm-->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm Sản Phẩm Mới</h4>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal" action="addProduct.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Tên Sản Phẩm:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="IPhone X" name="name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="description">Mô Tả:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" placeholder="Sản phẩm hàng đầu thế giới..." name="description">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="price">Giá:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" placeholder="69000" name="price">
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="category" class="control-label col-sm-2">Danh Mục:</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">
                              <option value="1">Máy Tính</option>
                              <option value="2">Điện Thoại</option>
                              <option value="3">Thể Thao</option>
                              <option value="4">Tablet</option>
                            </select>
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="image" class="control-label col-sm-2">Hình Ảnh:</label>
                          <div class="col-sm-10">
                            <input type="file" name="file" class="">Tải lên Ảnh</input>
                          </div>
                        </div>  
                        
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-success btn-block" name="submit" value="Hoàn Tất"></input>
                          </div>
                        </div>
                      </form> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- End model thêm sản phẩm -->


            <!-- Modal thêm sản phẩm-->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm Sản Phẩm Mới</h4>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal" action="addProduct.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="name">Tên Sản Phẩm:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="IPhone X" name="name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="description">Mô Tả:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" placeholder="Sản phẩm hàng đầu thế giới..." name="description">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="price">Giá:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" placeholder="69000" name="price">
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="category" class="control-label col-sm-2">Danh Mục:</label>
                          <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">
                              <option value="1">Máy Tính</option>
                              <option value="2">Điện Thoại</option>
                              <option value="3">Thể Thao</option>
                              <option value="4">Tablet</option>
                            </select>
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="image" class="control-label col-sm-2">Hình Ảnh:</label>
                          <div class="col-sm-10">
                            <input type="file" name="file" class="">Tải lên Ảnh</input>
                          </div>
                        </div>  
                        
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-success btn-block" name="submit" value="Hoàn Tất"></input>
                          </div>
                        </div>
                      </form> 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                  </div>
                </div>

              </div>
            </div>


            

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Hình Ảnh</th>
              <th>Tên</th>
              <th>Mô Tả</th>
              <th>ID Danh Mục</th>
              <th>Giá</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody id="myTable">


        <?php

          $sql = "SELECT * FROM Product";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                
                  echo "<tr>
                          <td>".$row["ID"]."</td>
                          <td><img src='".$row["image"]."' class='img-rounded img-product' alt='Ten san pham'></td>
                          <td>".$row["name"]."</td>
                          <td>".$row["description"]."</td>
                          <td>".$row["categoryID"]."</td>
                          <td>".$row["price"]."</td>
                          <td><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-eye-open'></span></button>
                            <a class='btn btn-info' href='/ltweb/editProduct.php?id=".$row["ID"]."'><span class='glyphicon glyphicon-pencil'></span></a>";

                            if(isset($_SESSION['login_user_level']) && $_SESSION['login_user_level'] > 5){
                                echo "<button type='button' class='btn btn-danger remove-product' id='".$row["ID"]."'><span class='glyphicon glyphicon-remove-circle'></span></button>";
                            }

                          echo "</td>
                        </tr>";
              }
          } else {
              echo "0 results";
          }

          $conn->close();

        ?>
            
          </tbody>
        </table>
    </div>
  
</div>

<?php }else{
    echo '<center><h2>Chưa Đăng Nhập! Hãy <a href="login.php">Đăng Nhập</a> trước!</h2></center>';
}
?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("button.remove-product").click(function(){
        var parent = $(this).parent().parent();
        swal({
          title: "Bạn có chắc muốn xóa?",
          text: "Nếu xóa, dữ liệu sẽ không thể khôi phục lại!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
              $.ajax({
                url: 'removeProduct.php',
                type: 'post',
                dateType: 'text',
                data: {
                    username: '<?php echo $_SESSION["login_user_username"]; ?>',
                    id: $(this).attr('id')
                },
                success: function(dt){
                    parent.remove();
                    swal("Đã xóa thành công!", {
                      icon: "success"
                    });
                }
              });

              
          } else {
            swal("Đã hủy xóa!");
          }
        });

  });

});
</script>

</body>
</html>



