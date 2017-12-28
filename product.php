<!DOCTYPE html>
<html>
    <head>
        <title>Xem Sản Phẩm</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="productStyle.css">
          <script src="productScript.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include('menu.php'); ?>
        	
            <?php

            include 'DBConnect.php';

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
                      
                                echo "<div class='row'>
               <div class='col-xs-4 item-photo'>
                    <img style='max-width:100%;' src='".$row["image"]."' />
                </div>
                <div class='col-xs-5' style='border:0px solid gray'>
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3>".$row["name"]."</h3>    
                    <h5 style='color:#337ab7'>".$row["categoryID"]." <a href='#'>Samsung</a> · <small style='color:#337ab7'>(5054 ventas)</small></h5>
        
                    <!-- Precios -->
                    <h6 class='title-price'><small>Giá sản phẩm</small></h6>
                    <h3 style='margin-top:0px;'>".$row["price"]." VND</h3>
        
                    <!-- Detalles especificos del producto -->
                    <div class='section'>
                        <h6 class='title-attr' style='margin-top:15px;' ><small>MÀU</small></h6>                    
                        <div>
                            <div class='attr' style='width:25px;background:#5a5a5a;'></div>
                            <div class='attr' style='width:25px;background:white;'></div>
                        </div>
                    </div>
                    <div class='section' style='padding-bottom:5px;'>
                        <h6 class='title-attr'><small>DUNG LƯỢNG</small></h6>                    
                        <div>
                            <div class='attr2'>16 GB</div>
                            <div class='attr2'>32 GB</div>
                        </div>
                    </div>   
                    <div class='section' style='padding-bottom:20px;'>
                        <h6 class='title-attr'><small>SỐ LƯỢNG</small></h6>                    
                        <div>
                            <div class='btn-minus'><span class='glyphicon glyphicon-minus'></span></div>
                            <input value='1' />
                            <div class='btn-plus'><span class='glyphicon glyphicon-plus'></span></div>
                        </div>
                    </div>                
        
                    <!-- Botones de compra -->
                    <div class='section' style='padding-bottom:20px;'>
                        <button class='btn btn-success'><span style='margin-right:20px' class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Thêm vào Giỏ</button>
                        <h6><a href='#'><span class='glyphicon glyphicon-heart-empty' style='cursor:pointer;'></span> Thêm vào Danh sách ưa thích</a></h6>
                    </div>                                        
                </div>                              
        
                <div class='col-xs-9'>
                    <ul class='menu-items'>
                        <li class='active'>Mô tả</li>
                        <li>Thông Số</li>
                        <li>Nhận Xét</li>
                        <li>Bảo Hành</li>
                    </ul>
                    <div style='width:100%;border-top:1px solid silver'>
                        <p style='padding:15px;'>
                            ".$row["description"]."
                        </p>
                        
                    </div>
                </div>      
            </div>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();

            }
        ?>




        </div>        
    </body>
</html>
