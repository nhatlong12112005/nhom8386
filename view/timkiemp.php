<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Tìm kiếm</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php?act=trangchu">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Shop Page -->
<?php if (!empty($thongbao)) {
    echo $thongbao;
} ?>

<div class="container my-5">
    <h1 class="text-center mb-5"><b>Kết quả tìm kiếm</b></h1>

    <div class="row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
        <?php
        if (!empty($dssp)) {
            foreach ($dssp as $sp) {
                extract($sp);
                if ($status == 1) { 
                $hinh = $img_path . $img;
                echo '
<div style="background-color: white; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 12px; overflow: hidden; 
            transition: transform 0.3s; text-align: center; padding: 16px; height: 360px;
            display: flex; flex-direction: column; justify-content: space-between;">

     <a href="index.php?act=sanphamct&idsp='.$id.'">
  <img src="'.$hinh.'" style="width: 100%; height: auto; max-height: 100%; object-fit: cover; border-radius: 10px;" alt="'.$name.'"/>
</a>


    <div style="padding: 16px;">
        <h3 style="font-size: 16px; font-weight: bold; color: #000; margin-bottom: 8px;">
            <a href="index.php?act=sanphamct&idsp=' . $id . '" style="color: #000; text-decoration: none;" 
                onmouseover="this.style.color=\'#b0b435\'" 
                onmouseout="this.style.color=\'#000\'">' . $name . '</a>
        </h3>
        <h5 style="font-size: 18px; font-weight: bold; color: #b0b435;">' . number_format($price, 3, '.', '') . ' VNĐ</h5>

    </div>
</div>';
            }
        }
        } else {
            echo '<div class="col-span-1 text-center">
                    <h3 class="text-red-600 font-bold">Không tìm thấy sản phẩm nào!</h3>
                  </div>';
        }
        ?>
        <div>
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; padding: 20px;">
    <?php
         if (isset($hienthisotrang)) {
            echo '<ul style="list-style: none; display: flex; padding: 30px; font-size: 20px;">';
            echo $hienthisotrang;
            echo '</ul>';
        }

?>

</div>
</div>

