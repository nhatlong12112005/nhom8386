<main class="w-4/5 p-6">
    <h2 class="text-xl font-bold mb-4">Danh sách hóa đơn của khách hàng: <?= htmlspecialchars($bill_name) ?></h2>
    <table class="w-full text-center border-collapse">
        <thead class="bg-primary text-white">
            <tr>
                <th class="border border-gray-300 p-2">HÓA ĐƠN</th>
                <th class="border border-gray-300 p-2">NGÀY</th>
                <th class="border border-gray-300 p-2">SỐ SẢN PHẨM</th>
                <th class="border border-gray-300 p-2">TỔNG TIỀN</th>
                <th class="border border-gray-300 p-2">TÌNH TRẠNG</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (!empty($listbill)) {
                foreach ($listbill as $bill) {
                    extract($bill);
                    $ttdh = get_ttdh($bil_status);
                    $color = match($bil_status) {
                        '0' => 'bg-yellow-400',
                        '1' => 'bg-blue-500',
                        '2' => 'bg-green-500',
                        '3' => 'bg-red-500',
                        default => 'bg-gray-400',
                    };

                    echo "
                    <tr>
                        <td class='border border-gray-300 p-2'>{$id}</td>
                        <td class='border border-gray-300 p-2'>{$ngaydathang}</td>
                        <td class='border border-gray-300 p-2'>{$soluong}</td>
                        <td class='border border-gray-300 p-2'>".number_format($thanhtien, 3, '.', '')." VNĐ</td>
                        <td class='border border-gray-300 p-2'>
                            <span class='{$color} px-2 py-1 rounded'>{$ttdh}</span>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "<tr><td colspan='5' class='p-4'>Không có hóa đơn nào cho khách hàng này.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="mt-4">
        <a href="index.php?act=tkkh" class="px-4 py-2 bg-primary text-white font-semibold rounded">Quay về trang thống kê</a>
    </div>
</main>
