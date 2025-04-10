
<style>
  .cart-box-main img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
  }
  .cart-box-main table th,
  .cart-box-main table td {
    padding: 10px;
    text-align: center;
  }
  .cart-box-main .table {
    border-collapse: collapse;
    width: 100%;
  }
  .cart-box-main .table th {
    background-color: #f2f2f2;
  }
</style>

<!-- Start All Title Box -->
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Thanh Toán</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thanh toán</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart -->
<div class="cart-box-main">
  <div class="container">
    <form class="needs-validation" action="index.php?act=billcomfirm" method="post">
      <div class="row">
        <!-- Thông tin đặt hàng -->
        <div class="col-sm-6 col-lg-6 mb-3">
          <div class="checkout-address">
            <div class="title-left">
              <h3>THÔNG TIN ĐẶT HÀNG</h3>
            </div>
            <?php 
              if(isset($_SESSION['taikhoan'])){
                  $name = $_SESSION['taikhoan']['user'];
                  $address = $_SESSION['taikhoan']['address'];
                  $email = $_SESSION['taikhoan']['email'];
                  $tel = $_SESSION['taikhoan']['tel'];
              } else {
                  $name = "";
                  $address = "";
                  $email = "";
                  $tel = "";
              }
            ?>

            <div class="mb-3">
              <label for="username">Người đặt hàng</label>
              <input type="text" class="form-control" name="name" value="<?=$name?>" required/>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" required/>
            </div>

            <!-- Chọn địa chỉ hoặc nhập địa chỉ mới -->
            <div class="mb-3">
              <label for="address">Địa chỉ giao hàng</label>
              <select name="address_option" id="address_option" class="form-control">
                <option value="<?=$address?>" selected><?=$address?></option>
                <option value="new">Nhập địa chỉ mới</option>
              </select>
            </div>

            <div class="mb-3" id="new-address-container" style="display: none;">
              <label for="new_address">Địa chỉ mới</label>
              <input type="text" class="form-control" id="new_address" name="new_address"/>
            </div>

            <div class="mb-3">
              <label for="tel">Số điện thoại</label>
              <input type="text" class="form-control" id="tel" name="tel" value="<?=$tel?>" required/>
            </div>

            <hr class="mb-4"/>
            <div class="title"><span>PHƯƠNG THỨC THANH TOÁN</span></div>
            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input name="pttt" type="radio" class="custom-control-input" id="cash_on_delivery" value="1" checked required/>
                <label class="custom-control-label" for="cash_on_delivery">Trả tiền khi nhận hàng</label>
              </div>
              <div class="custom-control custom-radio">
                <input name="pttt" type="radio" class="custom-control-input" id="bank_transfer" value="2" required/>
                <label class="custom-control-label" for="bank_transfer">Chuyển khoản ngân hàng</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Giỏ hàng -->
        <div class="col-sm-6 col-lg-6 mb-3">
          <div class="odr-box">
            <div class="title-left">
              <h3>Giỏ hàng</h3>
            </div>
            <table class="table">
              <?php viewcart(0); ?>
            </table>
          </div>
        </div>

        <!-- Nút đặt hàng -->
        <div class="col-12 d-flex justify-content-end shopping-box mt-3">
          <button type="submit" value="1" name="dongydathang" class="btn btn-sm hvr-hover" style="width: auto; padding: 8px 16px; background-color: #b7c144; color: white; font-size: 20px;">Đặt hàng</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- End Cart -->

<script>
document.getElementById('address_option').addEventListener('change', function () {
    document.getElementById('new-address-container').style.display = this.value === 'new' ? 'block' : 'none';
});
</script>
