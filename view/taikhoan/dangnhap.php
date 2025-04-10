<div style="font-family: Arial, sans-serif; background-color: #f3f4f6; display: flex; align-items: center; justify-content: center; min-height: 100vh;">
    <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); width: 100%; max-width: 400px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center;">Tài khoản</h2>
        <form action="index.php?act=dangnhap" method="post">
            <label for="user" style="font-weight: bold; margin-bottom: 5px; display: block;">Tài khoản</label>
            <input type="text" name="user" placeholder="Nhập tài khoản" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd; margin-bottom: 15px;">

            <label for="pass" style="font-weight: bold; margin-bottom: 5px; display: block;">Mật khẩu</label>
            <input type="password" name="pass" placeholder="Nhập mật khẩu" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd; margin-bottom: 15px;">

            <div style="display: flex; gap: 5px;">
                <button type="submit" name="dangnhap" value="1" style="flex: 1; padding: 5px; background-color: #4caf50; color: #fff; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 14px;">
                    Đăng Nhập
                </button>
                <a href="index.php?act=quenmatkhau" style="flex: 1; padding: 5px; background-color: #4caf50; color: #fff; text-align: center; border-radius: 5px; font-weight: bold; text-decoration: none; font-size: 14px;">
                    Quên mật khẩu
                </a>
                <a href="index.php?act=dangky" style="flex: 1; padding: 5px; background-color: #4caf50; color: #fff; text-align: center; border-radius: 5px; font-weight: bold; text-decoration: none; font-size: 14px;">
                    Đăng Ký
                </a>
            </div>

            <?php 
            if(isset($thongbao) && ($thongbao != "")){
                echo "<p style='color: green; font-weight: bold; margin-top: 15px;'>$thongbao</p>"; 
            }
            ?>
        </form>
    </div>
</div>
