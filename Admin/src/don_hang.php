<!-- Main Content -->
<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-[24px]">Quản lý đơn hàng</h1>

    <!-- Bộ lọc tìm kiếm -->
    <form action="index.php?act=qldh" method="post" class="bg-white p-4 rounded shadow mb-4 flex items-center space-x-4">
        <label for="from-date">Từ:</label>
        <input type="date" name="from_date" class="border p-2 rounded w-40">
        <label for="to-date">đến</label>
        <input type="date" name="to_date" class="border p-2 rounded w-40">
        
        <select name="bil_status" class="border p-2 rounded w-40">
            <option value="">Trạng thái</option>
            <option value="0">Chưa xác nhận</option>
            <option value="1">Đã xác nhận</option>
            <option value="2">Thành công</option>
            <option value="3">Hủy đơn</option>
        </select>

        <input type="text" name="kyw" placeholder="Nhập tên hoặc email" class="border p-2 rounded flex-grow">
        <button name="listok" class="bg-primary text-white px-4 py-2 rounded">Lọc</button>
    </form>

    <!-- Bảng sản phẩm -->
    <div class="bg-white p-4 shadow rounded-md">
        <table class="w-full text-center border-collapse">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="py-3 border">Mã đơn hàng</th>
                    <th class="py-3 border">Người đặt</th>
                    <th class="py-3 border">SĐT</th>
                    <th class="py-3 border">Địa chỉ</th>
                    <th class="py-3 border">Ngày mua</th>
                    <th class="py-3 border">Thanh toán</th>
                    <th class="py-3 border">Trạng thái</th>
                    <th class="py-3 border">Chức năng</th>
                </tr>
            </thead>
            <tbody>
            <?php
if (isset($listbill) && is_array($listbill)) {
    foreach ($listbill as $bill) {
        extract($bill);
        $ttdh = get_ttdh($bil_status);
        echo '
        <tr class="border-b">
            <td class="py-3 border">'.$id.'</td>
            <td class="py-3 border">'.$bill_name.'</td>
            <td class="py-3 border">'.$bill_tel.'</td>
            <td class="py-3 border">'.$bill_address.'</td>
            <td class="py-3 border">'.$ngaydathang.'</td>
            <td class="py-3 border">'.number_format($total, 3, '.', '').' VNĐ</td>
            <td class="py-3 border">
                <form method="post" action="index.php?act=update_status">
                    <input type="hidden" name="id" value="'.$id.'">
                    <select name="bil_status" onchange="this.form.submit()" class="border p-2 rounded w-40">
                        <option value="0" '.($bil_status == 0 ? 'selected' : '').'>Chưa xác nhận</option>
                        <option value="1" '.($bil_status == 1 ? 'selected' : '').'>Đã xác nhận</option>
                        <option value="2" '.($bil_status == 2 ? 'selected' : '').'>Đã giao</option>
                        <option value="3" '.($bil_status == 3 ? 'selected' : '').'>Hủy đơn</option>
                    </select>
                </form>
            </td>
            <td class="py-3 border">
                <a href="index.php?act=ctdh&id='.$id.'">
                    <button class="bg-green-500 text-white px-3 py-1 rounded">Chi tiết</button>
                </a>
            </td>
        </tr>';
    }
} else {
    echo '<tr><td colspan="8" class="py-3 text-center">Không có đơn hàng nào.</td></tr>';
}
?>

            </tbody>
        </table>

<div class="flex justify-center mt-4 space-x-2">
    <?php 
        echo isset($hienthisotrang) ? $hienthisotrang : "";       
    ?>
    </div>
</main>
