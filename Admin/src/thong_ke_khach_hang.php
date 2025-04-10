<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-[24px]">Thống kê khách hàng</h1>
    
    <!-- Bộ lọc tìm kiếm -->
    <div class="justify-center p-4 rounded mb-4 flex items-center space-x-4">
        <label for="from-date">Từ:</label>
        <input type="date" id="from-date" name="from_date" class="border p-2 rounded w-40">
        <label for="to-date">đến</label>
        <input type="date" id="to-date" name="to_date" class="border p-2 rounded w-40">
        <button id="filter-btn" class="bg-primary text-white px-4 py-2 rounded">Lọc</button>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="bg-white p-4 shadow rounded-md">
        <h2 class="text-primary mb-4 font-semibold text-[24px]">Top 5 khách hàng mua sản phẩm nhiều nhất</h2>
        <table class="w-full text-center border-collapse">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="py-3 border border-gray-300">STT</th>
                    <th class="py-3 border border-gray-300">Khách hàng</th>
                    <th class="py-3 border border-gray-300">Số đơn</th>
                    <th class="py-3 border border-gray-300">Tổng cộng</th>
                    <th class="py-3 border border-gray-300">Hóa đơn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Duyệt qua dữ liệu top5kh từ hàm top5khachhang
                $stt = 1; // Khởi tạo số thứ tự
                foreach ($top5kh as $row) {
                    echo "<tr class='border-b'>";
                    echo "<td class='py-3 border border-gray-300'>{$stt}</td>";
                    echo "<td class='py-3 border border-gray-300'>{$row['bill_name']}</td>";
                    echo "<td class='py-3 border border-gray-300'>{$row['total_orders']}</td>";
                    echo "<td class='py-3 border border-gray-300'>" . number_format($row['total_spent'], 3, '.', '') . " VNĐ</td>";
                    echo "<td class='py-3 border border-gray-300 space-x-2'>
                            <a href='index.php?act=ctkhtk&bill_name={$row['bill_name']}'><button class='bg-primary text-white px-3 py-1 rounded'>Xem chi tiết</button></a>
                          </td>";
                    echo "</tr>";
                    $stt++; // Tăng số thứ tự
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4 space-x-2">
    <?php 
        echo isset($hienthisotrang) ? $hienthisotrang : "";       
    ?>
    </div>
</main>

<script>
    document.getElementById('filter-btn').addEventListener('click', function() {
        const from_date = document.getElementById('from-date').value;
        const to_date = document.getElementById('to-date').value;

        // Chuyển hướng trang với các tham số lọc
        window.location.href = `index.php?act=tkkh&from_date=${from_date}&to_date=${to_date}`;
    });
</script>
