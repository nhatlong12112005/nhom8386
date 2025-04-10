<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Lịch sử mua hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active">Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<div class="purchase-history" style="max-width: 800px; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h1 style="text-align: center; color: #333"><b>Lịch sử mua hàng</b></h1>
    <?php 
    if (isset($listbill) && is_array($listbill) && count($listbill) > 0) {
        $currentBillId = -1;
        $totalAmount = 0;
        

        foreach ($listbill as $bill) {
            extract($bill);
            $ttdh = isset($bill['bil_status']) ? get_ttdh($bill['bil_status']) : "Chưa xác định";

            // Bắt đầu đơn hàng mới
            if ($currentBillId != $bill['id']) {
                // Kết thúc đơn hàng trước nếu có
                if ($currentBillId != -1) {
                    echo '</ul>';
                    echo '<p style="font-weight: bold; margin: 0">Tổng tiền: ' . number_format($totalAmount, 3, '.', '') . ' VND</p>';
                    echo '<a href="index.php?act=chitietdonhang&id=' . $currentBillId . '" style="display: inline-block; padding: 8px 12px; background-color: #b0b435; color: white; text-decoration: none; border-radius: 5px; margin-top: 10px;">Xem chi tiết</a>';
                    echo '</div>';
                }

                $totalAmount = $bill['total'];

                $pttt = $bill['bill_pttt'] == 1 ? "Trả tiền khi nhận hàng" : 
                        ($bill['bill_pttt'] == 2 ? "Chuyển khoản ngân hàng" : "Phương thức thanh toán khác");

                echo '<div class="order" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px">
                    <h3 style="color: #b0b435">' . $ttdh . '</h3>
                    <p style="margin: 0">Ngày đặt hàng: ' . $bill['ngaydathang'] . '</p>
                    <p style="margin: 0">Mã đơn: ' . $bill['id'] . '</p>
                    <p style="margin: 0">Tên người nhận: ' . $bill['bill_name'] . '</p>
                    <p style="margin: 0">Địa chỉ giao hàng: ' . $bill['bill_address'] . '</p>
                    <p style="margin: 0">Phương thức thanh toán: ' . $pttt . '</p>
                    <ul style="list-style: none; padding: 0; margin: 10px 0">';

                $currentBillId = $bill['id'];
            }

            // Hiển thị sản phẩm với kiểm tra tồn tại
            $productName = isset($bill['name']) ? $bill['name'] : "Tên sản phẩm không xác định";
            $productPrice = isset($bill['price']) ? number_format($bill['price'], 3, '.', '') : "0";
            $productQuantity = isset($bill['soluong']) ? $bill['soluong'] : "0";

            echo '<li>- ' . $productName . ': ' . $productPrice . ' VND x ' . $productQuantity . ' kg</li>';
        }

        // Kết thúc đơn hàng cuối cùng
        echo '</ul>';
        echo '<p style="font-weight: bold; margin: 0">Tổng tiền: ' . number_format($totalAmount, 3, '.', '') . ' VND</p>';
        echo '<a href="index.php?act=chitietdonhang&id=' . $currentBillId . '" style="display: inline-block; padding: 8px 12px; background-color: #b0b435; color: white; text-decoration: none; border-radius: 5px; margin-top: 10px;">Xem chi tiết</a>';
        echo '</div>';
    } else {
        echo "<p>Không có đơn hàng nào.</p>";
    }
?>

</div>
