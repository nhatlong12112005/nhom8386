<!-- Main Content -->
<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-[24px]">Quản lý khách hàng</h1>
    <a href="index.php?act=addkh" class="bg-primary text-white px-4 py-2 rounded mb-4 block text-center">
        + Thêm khách hàng
    </a>

    <!-- Bộ lọc tìm kiếm -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-4 flex items-center space-x-4">
        <form action="index.php?act=qlkh" method="post" class="flex items-center space-x-2 w-full">
            <input type="text" name="kyw" placeholder="Nhập tên hoặc email" class="border border-gray-300 rounded-lg px-3 py-2 w-2/3 flex-grow">
            <select name="trangthai"
            class="border border-gray-300 rounded-lg px-3 py-2 appearance-none bg-none pr-4">
            <option value="" selected>Tất cả</option>
             <option value="0">Đã khóa</option>
             <option value="1">Đang hoạt động</option>
        </select>
            <input type="submit" name="listok" value="Tìm kiếm" class="bg-primary px-4 py-2 rounded-lg transition cursor-pointer">
        </form>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="bg-white p-4 shadow rounded-md">
        <table class="w-full text-center border-collapse">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="py-3 border border-gray-300">Mã TK</th>
                    <th class="py-3 border border-gray-300">Tên Đăng Nhập</th>
                    <th class="py-3 border border-gray-300">Mật khẩu</th>
                    <th class="py-3 border border-gray-300">Email</th>
                    <th class="py-3 border border-gray-300">Địa chỉ</th>
                    <th class="py-3 border border-gray-300">Điện thoại</th>
                    <th class="py-3 border border-gray-300">Vai trò</th>
                    <th class="py-3 border border-gray-300">Trạng thái</th>
                    <th class="py-3 border border-gray-300">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $suatk = "index.php?act=suatk&id=" . $id;
                    $khoatk = "index.php?act=khoatk&id=" . $id . "&trangthai=" . $trangthai;

                    $trangthaiText = $trangthai == 1 ? "Đang hoạt động" : "Đã khóa";
                    $trangthaiClass = $trangthai == 1 ? "text-green-500" : "text-red-500";

                    echo "
                    <tr class='border-b hover:bg-gray-100'>
                        <td class='py-3 border border-gray-300'>$id</td>
                        <td class='py-3 border border-gray-300 text-primary'>$user</td>
                        <td class='py-3 border border-gray-300'>$pass</td>
                        <td class='py-3 border border-gray-300'>$email</td>
                        <td class='py-3 border border-gray-300'>$address</td>
                        <td class='py-3 border border-gray-300'>$tel</td>
                        <td class='py-3 border border-gray-300'>$role</td>
                        <td class='py-3 border border-gray-300 $trangthaiClass'>$trangthaiText</td>
                        <td class='py-3 border border-gray-300'>
                            <div class='flex justify-center space-x-2'>
                                <a href='$suatk'>
                                    <input type='button' value='Sửa' class='bg-green-500 text-white px-3 py-1 rounded cursor-pointer'>
                                </a>
                                <a href='$khoatk'>
                                    <input type='button' value='" . ($trangthai == 1 ? "Khóa" : "Mở") . "' class='bg-red-500 text-white px-3 py-1 rounded cursor-pointer'>
                                </a>
                            </div>
                        </td>
                    </tr>";
                } ?>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4 space-x-2">
    <?php 
        echo isset($hienthisotrang) ? $hienthisotrang : "";       
    ?>
    </div>
</main>
</body>
