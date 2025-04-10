
<div class="all-title-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2><?=$tendm?></h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php?act=trangchu">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active"><?=$tendm?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
   

 <!-- Start Shop Page  -->
 <div class="shop-box-inner">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
        <div class="right-product-box">
          

          <div class="product-categorie-box">
            <div class="tab-content">
              <div
                role="tabpanel"
                class="tab-pane fade show active"
                id="grid-view"
              >
              <div class="row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
              <?php 
foreach($dssp as $sp){
    extract($sp);
    if ($status == 1) {  // Chỉ hiển thị sản phẩm có status = 1
        $hinh = $img_path.$img;
        echo  '
        <div style="background-color: white; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 12px; overflow: hidden; transition: transform 0.3s; text-align: center; padding: 16px; height: 320px;">
            
            <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                <a href="index.php?act=sanphamct&idsp='.$id.'">
                    <img src="'.$hinh.'" style="width: 100%; height: auto; max-height: 100%; object-fit: cover; border-radius: 10px;" alt="Image"/>
                </a>
            </div>

            <div style="padding: 16px;">
                <h3 style="font-size: 16px; font-weight: bold; color: #000; margin-bottom: 8px;">
                    <a href="index.php?act=sanphamct&idsp='.$id.'" style="color: #000; text-decoration: none;" 
                        onmouseover="this.style.color=\'#b0b435\'" 
                        onmouseout="this.style.color=\'#000\'">'.$name.'</a>
                </h3>
                <h5 style="font-size: 18px; font-weight: bold; color: #b0b435;">'.number_format($price, 3, '.', '').' VNĐ</h5> 
            </div>
        </div>';
    }
}
?>

    </div>
              </div>
            </div>
          </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: center; padding: 20px;">
    <?php
        if (isset($hienthisotrang)) {
            echo '<ul style="list-style: none; display: flex; gap: 10px; padding: 0; margin: 0; font-size: 20px;">';
            echo $hienthisotrang;
            echo '</ul>';
        }
    ?>
</div>


      </div>
      <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
        <div class="product-categori">
          <div class="search-container">
            <h2><b>TÌM KIẾM NÂNG CAO</b></h2>
            <form action="index.php" method="get" style="display: grid; gap: 12px; max-width: 400px;">
    <input type="hidden" name="act" value="timkiem">

    <label for="kyw"><b>Tên sản phẩm</b></label>
    <input type="text" id="kyw" name="kyw" placeholder="Nhập từ khóa..."  style="padding: 8px;">

    <label for="iddm"><b>Loại sản phẩm</b></label>
    <select id="iddm" name="iddm" style="padding: 8px;">
        <option value="">Tất cả</option> <!-- Để giá trị rỗng -->
        <?php 
            foreach ($dsdm as $danhmuc) {
                echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
            }
        ?>
    </select>

    <label><b>Giá (VND)</b></label>
    <div style="display: flex; gap: 8px;">
        <input type="number" name="price-min" placeholder="Từ" step="0.001" min="0" required style="flex: 1; padding: 8px;">
        <input type="number" name="price-max" placeholder="Đến" step="0.001" min="0" required style="flex: 1; padding: 8px;">
    </div>

    <input type="submit" value="Tìm kiếm" style="padding: 10px; background-color: #b0b435; color: white; border: none; cursor: pointer;">
</form>



        </div>
      </div>
    </div>
  </div>
</div>