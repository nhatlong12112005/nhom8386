
<?php 
    if(is_array($dm)){
        extract($dm);
    }

?>

<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-2xl">Cập nhật loại hàng</h1>
    <section class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <form action="index.php?act=updatedm" method="post">
                <label class="block font-semibold">Mã loại:</label>
                <input type="number" name="maloai" class="w-full border p-2 rounded mb-4" disabled />

                <label class="block font-semibold">Tên loại:</label>
                <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>" class="w-full border p-2 rounded mb-4" />

                <div class="flex justify-between mt-4">
                 <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0)) echo $id;?>">
                 <input type="submit" name="capnhat" value="Cập nhật" class="w-1/2 bg-primary text-white p-3 rounded font-semibold text-center">
                <a href="index.php?act=listdm" class="w-1/2">
                <button type="button" class="w-full bg-primary text-white p-3 rounded font-semibold text-center">Danh sách</button>
                 </a>
                </div>


                <?php 
                    if(isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;  
                    }
                ?>
            </form>
        </div>
    </section>
</main>
