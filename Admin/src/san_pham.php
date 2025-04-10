
     <!-- Main Content -->
     <main class="w-4/5 p-6">
      <h1 class="text-primary mb-4 font-semibold text-center text-[24px]">Quản lý sản phẩm</h1>
      <a href="index.php?act=addsp" class="bg-primary text-white px-4 py-2 rounded mb-4 block text-center">
    + Thêm sản phẩm
</a>

    
    <!-- Bộ lọc tìm kiếm -->
<div class="bg-white p-4 rounded-lg shadow-md mb-4 flex  items-center space-x-4">
    <form action="index.php?act=listsp" method="post" class="flex items-center space-x-2 w-full">
        <input type="text" name="kyw" placeholder="Nhập từ khóa..."
            class="border border-gray-300 rounded-lg px-3 py-2 w-2/3 flex-grow ">
        <select name="iddm"
            class="border border-gray-300 rounded-lg px-3 py-2 appearance-none bg-none pr-4">
            <option value="0" selected>Tất cả</option>
            <?php 
                foreach($listdanhmuc as $danhmuc){
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            ?>
        </select>
        <input type="submit" name="listok" value="Tìm kiếm"
         class="bg-primary px-4 py-2 rounded-lg  transition cursor-pointer">

    </form>
</div>





        <!-- Bảng sản phẩm -->
        <div class="bg-white p-4 shadow rounded-md">
            <table class="w-full text-center border-collapse">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="py-3 border border-gray-300">Mã loại</th>
                        <th class="py-3 border border-gray-300">Tên sản phẩm</th>
                        <th class="py-3 border border-gray-300">Hình</th>
                        <th class="py-3 border border-gray-300">Giá</th>
                        <th class="py-3 border border-gray-300">Số lượng</th>
                        <th class="py-3 border border-gray-300">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($listsanpham as $sanpham){
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=".$id;
                    $xoasp = "index.php?act=xoasp&id=".$id;
                    $hinhpath="../upload/".$img;
                    if(is_file($hinhpath)){
                        $hinh = "<img src='".$hinhpath."' class='h-12 mx-auto'>";

                    }else{
                        $hinh = "no photo";
                    }

                    echo '   
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 border border-gray-300">'.$id.'</td>
                        <td class="py-3 border border-gray-300 text-primary">'.$name.'</td>
                        <td class="py-3 border border-gray-300 ">'.$hinh.'</td>
                        <td class="py-3 border border-gray-300">'.number_format($price, 3, '.', '').'</td>
                        <td class="py-3 border border-gray-300 ">'.$soluong.'</td>
                        <td class="py-3 border border-gray-300">
                            <div class="flex justify-center space-x-2">
                               <a href="'. $suasp.'">
                                   <input type="button" value="Sửa" class="bg-green-500 text-white px-3 py-1 rounded cursor-pointer">
                               </a>
                               <a href="'. $xoasp.'"> 
                                   <input    type="button" onclick="myFunction()" value="Xóa" class="bg-red-500 text-white px-3 py-1 rounded cursor-pointer"> 
                               </a>
                            </div>
                        </td>
                    </tr>';
                    

                } ?>
                    
                </tbody>
            </table>
        </div>
        <!-- Phân trang -->
    <div class="flex justify-center mt-4 space-x-2">
    <?php 
        echo isset($hienthisotrang) ? $hienthisotrang : "";       
    ?>
</div>

    </main>
</body>
<script>
                                            function myFunction() {
                                                
                                                    alert("Đã xóa sản phẩm thành công!");
                                           
                                            }

                                        </script>
