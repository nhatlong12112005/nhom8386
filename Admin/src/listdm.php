<?php
    // Truy vấn lấy danh sách danh mục từ CSDL
    $sql = "SELECT * FROM danhmuc";
    $listdanhmuc = pdo_query($sql); // Gọi hàm pdo_query để lấy danh sách danh mục từ CSDL
?>

<!-- Main Content -->
<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-[24px]">
        Danh sách loại sản phẩm
    </h1>
    <a href="index.php?act=adddm" class="bg-primary text-white px-4 py-2 rounded mb-4 block text-center">
        + Thêm sản loại
    </a>

    <!-- Bảng sản phẩm -->
    <div class="bg-white p-4 shadow rounded-md">
        <table class="w-full text-center border-collapse">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="py-3 border border-gray-300">Mã loại</th>
                    <th class="py-3 border border-gray-300">Tên loại</th>
                    <th class="py-3 border border-gray-300">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc); // Trích xuất các trường trong mỗi bản ghi
                    $suadm = "index.php?act=suadm&id=".$id;
                    $xoadm = "index.php?act=xoadm&id=".$id;

                 echo'   <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 border border-gray-300">'.$id.'</td>
                        <td class="py-3 border border-gray-300 text-primary">'.$name.'</td>
                        <td class="py-3 border border-gray-300">
                            <div class="flex justify-center space-x-2">
                               <a href="'. $suadm.'"><input type="button" value="Sửa" class="bg-green-500 text-white px-3 py-1 rounded cursor-pointer"> </a>
                               <a href="'. $xoadm.'"> <input type="button" value="Xóa" class="bg-red-500 text-white px-3 py-1 rounded cursor-pointer"> </a>
                            </div>
                        </td>
                    </tr>';
                } ?>
            </tbody>
        </table>
    </div>
</main>
