
<style>
  .table th,
.table td {
    text-align: center;
    vertical-align: middle;
}

.table td button {
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
}

.table td img {
    width: 100px;
    height: auto;
}

</style>


<div class="all-title-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2>Giỏ hàng</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active">Giỏ Hàng</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End All Title Box -->


    <!-- Start Cart  -->
    <div class="cart-box-main">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-main table-responsive">
              <table class="table">
                
                
                  <?php
                 
                   
                    viewcart(1);
                  
                  ?>
              
              </table>
            </div>
          </div>
          <div style="margin-top: 20px; display: flex; gap: 10px;">
                <a href="index.php?act=bill">
                <input type="submit" value="Đồng ý đặt hàng" 
                    style="padding: 10px 20px; font-size: 16px; border-radius: 5px; border: none; 
                    background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;"
                    onmouseover="this.style.opacity='0.9'" 
                    onmouseout="this.style.opacity='1'">
                    </a>
                <a href="index.php?act=delcart">
                    <input type="button" value="Xóa giỏ hàng" 
                        style="padding: 10px 20px; font-size: 16px; border-radius: 5px; border: none; 
                        background-color: #f44336; color: white; font-weight: bold; cursor: pointer;"
                        onmouseover="this.style.opacity='0.9'" 
                        onmouseout="this.style.opacity='1'">
                </a>
            </div>
        </div>
      </div>
    </div>