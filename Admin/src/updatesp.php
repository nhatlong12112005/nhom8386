<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-2xl">Cập nhật sản phẩm</h1>
    <section class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">

                <!-- ID sản phẩm ẩn -->
                <input type="hidden" name="id" value="<?= $sp['id'] ?>">

                <!-- Danh mục -->
                <label class="block font-semibold">Loại:</label>
                <select name="iddm" class="w-full border p-2 rounded mb-4" required>
                    <?php 
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            $selected = ($id == $sp['iddm']) ? "selected" : "";
                            echo '<option value="'.$id.'" '.$selected.'>'.$name.'</option>';
                        }
                    ?>
                </select>

                <!-- Tên sản phẩm -->
                <label class="block font-semibold">Tên sản phẩm:</label>
                <input type="text" name="tensp" value="<?= $sp['name'] ?>" class="w-full border p-2 rounded mb-4" required />

                <!-- Giá sản phẩm -->
                <label class="block font-semibold">Giá:</label>
<input type="text" name="giasp" 
       value="<?= number_format($sp['price'], 3, '.', '') ?>" 
       class="w-full border p-2 rounded mb-4" required />

                <!-- Hình ảnh -->
                <label class="block font-semibold">Hình ảnh sản phẩm:</label>
                <input type="file" name="hinh"  id="hinhInput"class="w-full border p-2 rounded mb-2" />
                <?php if ($sp['img'] != ""): ?>
                    <div class="flex justify-center">
                        <img src="../upload/<?= $sp['img'] ?>" class="border p-1 rounded mb-4" style="max-width: 150px; height: auto;">
                    </div>
                <?php endif; ?>
                <div class="flex justify-center">
                    <img id="previewImage" class="border p-1 rounded mb-4" style="max-width: 150px; height: auto; display: none;">
                </div>

                <!-- Số lượng -->
                <label class="block font-semibold">Số lượng:</label>
                <input type="number" name="soluong" value="<?= $sp['soluong'] ?>" class="w-full border p-2 rounded mb-4" required />

                <!-- Ghi chú -->
                <label class="block font-semibold">Ghi chú:</label>
                <textarea name="mota" class="w-full border p-2 rounded h-24"><?= $sp['mota'] ?></textarea>

                <!-- Nút cập nhật -->
                <div class="flex justify-between mt-4">
                    <input type="submit" name="capnhat" value="Cập nhật" class="w-1/2 bg-primary text-white p-3 rounded font-semibold text-center">
                    <a href="index.php?act=listsp" class="w-1/2">
                        <button type="button" class="w-full bg-primary text-white p-3 rounded font-semibold text-center">Danh sách</button>
                    </a>
                </div>

                <!-- Thông báo -->
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
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById("previewImage");
        output.src = reader.result;
        output.style.display = "block";
        
        // Ẩn ảnh cũ nếu người dùng chọn ảnh mới
        const oldImage = document.querySelector("img[src*='../upload/']");
        if (oldImage) {
            oldImage.style.display = "none";
        }
    };
    reader.readAsDataURL(event.target.files[0]);
});

</script>