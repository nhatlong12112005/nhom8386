
     <!-- Main Content -->
     <main class="w-4/5 p-6">
      <h1 class="text-primary mb-4 font-semibold text-center text-[24px]">Thống kê sản phẩm</h1>
    
    <!-- Bộ lọc tìm kiếm -->
    <form action="index.php?act=tksp" method="post" class="bg-white p-4 rounded shadow mb-4 flex items-center space-x-4">
        <label for="from-date">Từ:</label>
        <input type="date" id="from-date" name="from_date" class="border p-2 rounded w-40">
        <label for="to-date">đến</label>
        <input type="date" id="to-date" name="to_date" class="border p-2 rounded w-40">
        <input type="text" name="kyw" placeholder="Tên sản phẩm" class="border p-2 rounded flex-grow">
        <button  name="listok" class="bg-primary text-white px-4 py-2 rounded">Lọc</button>
    </form>
        <!-- Bảng sản phẩm -->
        <div class="bg-white p-4 shadow rounded-md">
            <table class="w-full text-center border-collapse">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="py-3 border border-gray-300">STT</th>
                        <th class="py-3 border border-gray-300">Tên mặt hàng</th>
                        <th class="py-3 border border-gray-300">Ảnh</th>
                        <th class="py-3 border border-gray-300">Giá</th>
                        <th class="py-3 border border-gray-300">Số lượng bán</th>
                        <th class="py-3 border border-gray-300">Lợi nhuận</th>
                        <th class="py-3 border border-gray-300">Hóa đơn</th>
                    </tr>
                </thead>
                <?php 
                
                ?>
                <tbody>
                <?php 
    // Khởi tạo số thứ tự bắt đầu từ trang hiện tại
    $i = ($page - 1) * $soluongsp + 1;
    
    foreach($listcart as $cart) {
        extract($cart);
        
        // Đảm bảo đường dẫn hình ảnh chính xác
        $hinh = (strpos($cart['img'], './upload/') === 0) ? $cart['img'] : $img_path . $cart['img'];
        $hinh_full = "http://localhost/projectweb/nhom8386/upload/" . basename($cart['img']); 
        
        // Hiển thị sản phẩm
        echo '<tr class="border-b">
            <td class="py-3 border border-gray-300">'. $i++ .'</td>
            <td class="py-3 border border-gray-300">'. htmlspecialchars($name) .'</td>
            <td class="py-3 border border-gray-300">
                <img src="'. htmlspecialchars($hinh_full) .'" alt="'. htmlspecialchars($name) .'" class="h-12 mx-auto">
            </td>
            <td class="py-3 border border-gray-300">'. number_format($price, 3, '.', '') .' VNĐ</td>
            <td class="py-3 border border-gray-300">'. $total_quantity .'</td>
            <td class="py-3 border border-gray-300">'. number_format($total_profit, 3, '.', '') .' VNĐ</td>
            <td class="py-3 border border-gray-300 space-x-2">
                <a href="index.php?act=cttksp&idpro='. $idpro .'">
                    <button class="bg-primary text-white px-3 py-1 rounded">Xem chi tiết</button>
                </a>
            </td>
        </tr>';
    }
?>
</tbody>

            </table>
        </div>
        <!-- Phân trang -->
        <div class="flex justify-center mt-4 space-x-2">
    <?php 
        echo isset($hienthisotrang) ? $hienthisotrang : "";       
    ?>
    </main>
</body>
