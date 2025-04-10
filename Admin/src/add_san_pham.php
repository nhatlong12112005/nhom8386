
<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-2xl">Thêm sản phẩm</h1>
    <section class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">

                <!-- Danh mục -->
                <label class="block font-semibold">Loại:</label>
                <select name="iddm" class="w-full border p-2 rounded mb-4" required>
                    <option value="">Chọn danh mục</option>
                    <?php 
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>
                </select>

                <!-- Tên sản phẩm -->
                <label class="block font-semibold">Tên sản phẩm:</label>
                <input type="text" name="tensp" class="w-full border p-2 rounded mb-4" required />

                <!-- Giá sản phẩm -->
                <label class="block font-semibold">Giá:</label>
                <input type="text" name="giasp" class="w-full border p-2 rounded mb-4" required />
                

                <!-- Hình ảnh sản phẩm -->
                <label class="block font-semibold">Hình ảnh sản phẩm:</label>
                <input type="file" name="hinh" id="hinhInput" class="w-full border p-2 rounded mb-4" required />
                <div class="flex justify-center">
                    <img id="previewImage" class="border p-1 rounded mb-4" style="max-width: 150px; height: auto; display: none;">
                </div>

                <!-- Số lượng -->
                <label class="block font-semibold">Số lượng:</label>
                <input type="number" name="soluong" class="w-full border p-2 rounded mb-4" required />

                <!-- Ghi chú -->
                <label class="block font-semibold">Ghi chú:</label>
                <textarea name="mota" class="w-full border p-2 rounded h-24"></textarea>

                <!-- Nút thêm sản phẩm -->
                <div class="flex justify-between mt-4">
                    <input type="submit" name="themmoi" value="Thêm mới" class="w-1/2 bg-primary text-white p-3 rounded font-semibold text-center">
                    <a href="index.php?act=listsp" class="w-1/2">
                        <button type="button" class="w-full bg-primary text-white p-3 rounded font-semibold text-center">Danh sách</button>
                    </a>
                </div>

                <!-- Hiển thị thông báo nếu có -->
                <?php 
                    if(isset($thongbao) && ($thongbao != "")) {
                        echo '<p class="text-green-500 font-semibold mt-4">'.$thongbao.'</p>';  
                    }
                ?>
            </form>
        </div>
    </section>
</main>

<script>
    document.getElementById("hinhInput").addEventListener("change", function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById("previewImage");
            output.src = reader.result;
            output.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
