
<main class="w-4/5 p-6">
    <h1 class="text-primary mb-4 font-semibold text-center text-2xl">Cập nhật nhật tài khoản</h1>
    <section class="flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
        <form action="index.php?act=updatetk" method="post">
    <?php 
    
        if(isset($_SESSION['taikhoan'])&&(is_array($_SESSION['taikhoan']))){
            extract($_SESSION['taikhoan']);
        }
      ?>
    <label class="block font-semibold">Tên Đăng Nhập:</label>
    <input type="text" name="user" class="w-full border p-2 rounded mb-4" value="<?= isset($user) ? $user : '' ?>" />

    <label class="block font-semibold">Mật khẩu:</label>
    <input type="password" name="pass" class="w-full border p-2 rounded mb-4" value="<?= isset($pass) ? $pass : '' ?>" />

    <label class="block font-semibold">Email:</label>
    <input type="email" name="email" class="w-full border p-2 rounded mb-4" value="<?= isset($email) ? $email : '' ?>" />

    <label class="block font-semibold">Địa chỉ:</label>
    <input type="text" name="address" class="w-full border p-2 rounded mb-4" value="<?= isset($address) ? $address : '' ?>" />

    <label class="block font-semibold">Điện thoại:</label>
    <input type="text" name="tel" class="w-full border p-2 rounded mb-4" value="<?= isset($tel) ? $tel : '' ?>" />

    <label class="block font-semibold">Vai trò:</label>
    <select name="role" class="w-full border p-2 rounded mb-4">
        <option value="0" <?= (isset($role) && $role == 0) ? 'selected' : '' ?>>Người dùng</option>
        <option value="1" <?= (isset($role) && $role == 1) ? 'selected' : '' ?>>Quản trị viên</option>
    </select>

    <div class="flex justify-between mt-4">
        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
        <input type="submit" name="capnhat" value="Cập nhật" class="w-1/2 bg-primary text-white p-3 rounded font-semibold text-center">
        <a href="index.php?act=qlkh" class="w-1/2">
            <button type="button" class="w-full bg-primary text-white p-3 rounded font-semibold text-center">Danh sách</button>
        </a>
    </div>

    <?php 
        if (isset($thongbao) && ($thongbao != "")) {
            echo '<p class="text-green-500 font-semibold mt-4">' . $thongbao . '</p>';  
        }
    ?>
</form>

        </div>
    </section>
</main>
