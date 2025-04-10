<div style="font-family: Arial, sans-serif; background-color: #f3f4f6; display: flex; align-items: center; justify-content: center; min-height: 100vh;">
    <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); width: 100%; max-width: 400px; margin: auto;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center;">Quên mật khẩu</h2>
        <form action="index.php?act=quenmatkhau" method="post">
            <label for="email" style="font-weight: bold; margin-bottom: 5px; display: block;">Email</label>
            <input type="email" name="email" placeholder="Nhập email" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd; margin-bottom: 15px;">


            <div style="display: flex; gap: 10px;">
                <button type="submit" name="guiemail" value="1" style="flex: 1; padding: 10px; background-color: #4caf50; color: #fff; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                    Gửi
                </button>
            </div>
        </form>

        <?php 
        if(isset($thongbao) && ($thongbao != "")){
            echo "<p style='color: green; font-weight: bold; margin-top: 15px;'>$thongbao</p>"; 
        }
        ?>
    </div>
</div>
