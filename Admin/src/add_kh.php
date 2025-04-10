
<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-2xl">Thêm khách hàng</h1>
    <section class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <form action="index.php?act=addkh" method="post" enctype="multipart/form-data">

                <label class="block font-semibold">Email:</label>
                <input type="email" name="email" class="w-full border p-2 rounded mb-4" required />

                <label class="block font-semibold">Tên đăng nhập:</label>
                <input type="text" name="user" class="w-full border p-2 rounded mb-4" required />
                
                <label class="block font-semibold">Mật khẩu:</label>
                <input type="password" name="pass" class="w-full border p-2 rounded mb-4" required />

                <label class="block font-semibold">Địa chỉ:</label>
                <input type="text" name="address" class="w-full border p-2 rounded mb-4"  />
                <label class="block font-semibold">Số điện thoại:</label>
                <input type="text" name="tel" class="w-full border p-2 rounded mb-4" required />
                

                

                <div class="flex justify-between mt-4">
                    <input type="submit" name="themmoi" value="Thêm mới" class="w-1/2 bg-primary text-white p-3 rounded font-semibold text-center">
                    <a href="index.php?act=qlkh" class="w-1/2">
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

