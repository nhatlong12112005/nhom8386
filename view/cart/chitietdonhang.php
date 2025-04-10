

 <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Chi tiết đơn hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./indexlogin.html">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="order-details" style="
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      ">
    <h1 style="text-align: center; color: #333; margin-bottom: 20px">
        <b>Chi tiết đơn hàng</b>
    </h1>

<?php 
if (!empty($onedh)) {
    global $img_path;
    extract($onedh);
    $ttdh = get_ttdh($bil_status);

    // Xác định phương thức thanh toán
    $pttt = "";
    if ($bill_pttt == 1) {
        $pttt = "Trả tiền khi nhận hàng";
    } elseif ($bill_pttt == 2) {
        $pttt = "Chuyển khoản ngân hàng";
    } else {
        $pttt = "Phương thức thanh toán khác";
    }

    echo '<div class="order-info" style="margin-bottom: 15px; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
            <p style="margin: 0; font-weight: bold">Tình trạng đơn hàng: <span style="color: green">'.$ttdh.'</span></p>
            <p style="margin: 0">Ngày đặt hàng: '.$ngaydathang.'</p>
        </div>

        <div class="recipient-info" style="margin-bottom: 15px; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
            <h3 style="margin-bottom: 10px; color: #b0b435">Thông tin người nhận</h3>
            <p style="margin: 0">Tên người nhận: '.$bill_name.'</p>
            <p style="margin: 0">Số điện thoại: '.$bill_tel.'</p>
            <p style="margin: 0">Địa chỉ giao hàng: '.$bill_address.'</p>
        </div>

        <div class="payment-info" style="margin-bottom: 15px; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
            <h3 style="margin-bottom: 10px; color: #b0b435">Phương thức thanh toán</h3>
            <p style="margin: 0">'.$pttt.'</p>
        </div>

        <div class="product-list" style="margin-bottom: 15px; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
            <h3 style="margin-bottom: 10px; color: #b0b435">Sản phẩm trong đơn hàng</h3>
            <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">';
         
                if (!empty($listbill)) {
                    show_chitiet_bill($listbill);
                } else {
                    echo '<tr><td colspan="5" style="text-align: center;">Không có sản phẩm trong đơn hàng</td></tr>';
                }
             
           echo ' </table>
        </div>

        <a href="index.php?act=mybill" style="
            display: inline-block;
            padding: 10px 15px;
            background-color: #b0b435;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        ">Quay lại lịch sử mua hàng</a>';
} else {
    echo "<p>Không tìm thấy đơn hàng!</p>";
}
?>
</div>
