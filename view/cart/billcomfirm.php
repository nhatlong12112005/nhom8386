<
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
<div class="cart-box-main" style="text-align: center;">
  <div class="container" style="margin: 0 auto; width: 80%;">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-green-600">Cảm ơn quý khách đã đặt hàng!</h1>
      <p class="text-gray-600">Cảm ơn bạn đã tin tưởng và mua hàng tại cửa hàng của chúng tôi.</p>
    </div>
    <?php if(isset($bill ) && is_array($bill )) { extract($bill ); } ?>
    <div class="needs-validation">
      <div class="row" style="display: flex; gap: 20px; align-items: stretch;">
        
        <!-- Thông tin đặt hàng -->
        <div class="col-sm-6 col-lg-6 mb-3" style="flex: 1; padding: 10px; border: 1px solid #ddd;">
          <div class="checkout-address">
            <h2 class="text-xl font-semibold mb-2">Mã Đơn Hàng</h2>
            <ul style="list-style-type: none; padding-left: 0;">
              <li>Mã đơn hàng: <?=$bill['id']?></li>
              <li>Ngày đặt hàng: <?=$bill['ngaydathang']?></li>
              <li>Tổng đơn hàng: <?=$bill['total']?></li>
              <li>Phương thức thanh toán: 
    <?php 
        if ($bill['bill_pttt'] == 1) {
            echo "Trả tiền khi nhận hàng";
        } elseif ($bill['bill_pttt'] == 2) {
            echo "Chuyển khoản ngân hàng";
        } else {
            echo "Phương thức thanh toán khác";
        }
    ?>
</li>
            </ul>

            <h2 class="text-xl font-semibold mb-2 mt-4">Thông Tin Đặt Hàng</h2>
            <table style="width: 100%; border-collapse: collapse;">
              <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px; border: 1px solid #ccc;">Người đặt hàng</th>
                <td style="padding: 10px; border: 1px solid #ccc;"><?=$bill['bill_name']?></td>
              </tr>
              <tr>
                <th style="padding: 10px; border: 1px solid #ccc;">Địa chỉ</th>
                <td style="padding: 10px; border: 1px solid #ccc;"><?=$bill['bill_address']?></td>
              </tr>
              <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px; border: 1px solid #ccc;">Email</th>
                <td style="padding: 10px; border: 1px solid #ccc;"><?=$bill['bil_email']?></td>
              </tr>
              <tr>
                <th style="padding: 10px; border: 1px solid #ccc;">Điện thoại</th>
                <td style="padding: 10px; border: 1px solid #ccc;"><?=$bill['bill_tel']?></td>
              </tr>
            </table>
          </div>
        </div>

        <!-- Giỏ hàng -->
        <div class="col-sm-6 col-lg-6 mb-3" style="flex: 1; padding: 10px; border: 1px solid #ddd;">
          <div class="odr-box">
            <h3 class="text-xl font-semibold mb-2">Chi Tiết Giỏ Hàng</h3>
            <table class="table">
              <?php show_chitiet_bill($billct); ?>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
