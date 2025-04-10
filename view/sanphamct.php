<?php
// Lấy tên danh mục từ iddm của sản phẩm
$tendm = load_ten_dm($onesp['iddm']);
?>
<div class="all-title-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2>Chi tiết sản phẩm</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php?act=sanpham&iddm=<?= $iddm?>"><?=$tendm?></a>
              </li>
              <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
      <div class="container">
        <div class="row">
            <?php 
                extract($onesp);
                $img = $img_path.$img;
                echo ' <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="single-product">
                        <img
                            class="d-block w-100"
                            src="'.$img.'"
                            alt="Product image"
                        />
                        </div>
                    </div>';
                    echo   '  <div class="col-xl-7 col-lg-7 col-md-6">
            <div class="single-product-details">
              <h2>'.$name.'</h2>
              <h5>Giá: '.number_format($price, 3, '.', '').'</h5>
              <p>Số lượng sản phẩm còn '.$soluong.'</p>
              <h4>Mô tả ngắn:</h4>
              <p>'.$mota.'</p>
              

             <form action="index.php?act=addtocart" method="post">
            <input type="hidden" name="id" value="'.$id.'">
            <input type="hidden" name="name" value="'.$name.'">
            <input type="hidden" name="img" value="'.$img.'">
            <input type="hidden" name="price" value="'.number_format($price, 3, '.', '').'">
            <label class="control-label">Số lượng</label>
            <div class="form-group quantity-box"style="margin-bottom: 1rem; display: block">
                    <input class="form-control" type="number" name="soluong" value="1" min="1" max="'.$soluong.'">
            </div>
            <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" 
                style="background-color: #b0b435; color: #fff; border: none; padding: 6px 12px;
                       font-size: 14px; font-weight: bold; border-radius: 6px; cursor: pointer;
                       transition: all 0.3s;
                       box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                       outline: none;"
                onmouseover="this.style.backgroundColor=\'#98a028\'; this.style.transform=\'translateY(-2px)\'; this.style.boxShadow=\'0px 4px 8px rgba(0, 0, 0, 0.2)\';"
                onmouseout="this.style.backgroundColor=\'#b0b435\'; this.style.transform=\'translateY(0px)\'; this.style.boxShadow=\'none\';"
            />
        </form>
            </div>
          </div>';
            
            ?>
        </div>

        

        <div class="container my-5">
    <div class="title-all text-center">
        <h1>Sản phẩm liên quan</h1>
        <p>
            Khám phá những sản phẩm chất lượng cao, được lựa chọn kỹ lưỡng và yêu thích nhất tại cửa hàng của chúng tôi. 
            Từ thời trang hiện đại đến các món đồ gia dụng tiện ích, mỗi sản phẩm đều mang đến sự tiện nghi và phong cách cho cuộc sống của bạn.
        </p>
    </div>

    <div class="row">
        <?php 
        foreach ($sp_cungloai as $spcl) {
            extract($spcl);
            $hinh = $img_path.$img;
            echo '<div class="col-md-4 col-sm-6 mb-4"> 
                    <div class="product-item" style="background-color: white; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 12px; overflow: hidden; transition: transform 0.3s; text-align: center; padding: 16px;">
                        
                        <div class="product-image" style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="'.$hinh.'" style="width: 100%; height: 100%; object-fit: contain; border-radius: 10px;" alt="Image"/>
                        </div>

                        <div class="product-info" style="padding: 16px;">
                            <h3 style="font-size: 16px; font-weight: bold; color: #000; margin-bottom: 8px;">
                                <a href="index.php?act=sanphamct&idsp='.$id.'" style="color: #000; text-decoration: none;" 
                                    onmouseover="this.style.color=\'#b0b435\'" 
                                    onmouseout="this.style.color=\'#000\'">'.$name.'</a>
                            </h3>
                            <h5 style="font-size: 18px; font-weight: bold; color: #b0b435;">' . number_format($price, 3, '.', '') . '  VNĐ</h5> 
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>

      </div>
    </div>