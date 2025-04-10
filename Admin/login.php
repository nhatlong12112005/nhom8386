<?php
session_start();

include "../model/pdo.php";
include "../model/taikhoan.php";

// Đặt thời gian hết hạn phiên (ví dụ 30 phút)
$timeout_duration = 1800; // 30 phút (1800 giây)

// Kiểm tra xem phiên có hết hạn hay không
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    // Nếu phiên đăng nhập hết hạn, hủy session và đăng xuất người dùng
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Cập nhật thời gian hoạt động của phiên
$_SESSION['last_activity'] = time();

if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $user_data = checkuser($user, $pass);

    if ($user_data) {
        // Lưu thông tin người dùng vào session
        $_SESSION['user'] = $user_data;
        $_SESSION['role'] = $user_data['role'];
        
        // Cập nhật thời gian phiên
        $_SESSION['last_activity'] = time();
        
        // Chuyển hướng đến trang quản lý chính
        header("Location: index.php");
        exit();
    } else {
        // Thông báo nếu tài khoản hoặc mật khẩu không đúng
        $_SESSION['text_erro'] = "Username hoặc Password không đúng";
        header("Location: login.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <link href="./src/output.css" rel="stylesheet" />
  </head>
  <body
    class="flex flex-col items-center justify-center min-h-screen bg-gray-100"
  >
    <!-- Logo phía trên bên trái -->
    <div class="absolute top-4 left-4 max-w-[130px]">
      
        <img
          src="../view/images/logo13xoanen.png"
          alt="Vựa Rau Sạch"
          class="image"
        />
    </div>

    <!-- Form đăng nhập -->
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
      <h2 class="text-2xl font-bold text-center mb-6">Đăng nhập</h2>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- Ô nhập Tên đăng nhập -->
        <div class="mb-4">
          <input
          required
            type="text"
            name="user"
            placeholder="Tên đăng nhập"
            class="w-full p-3 border rounded-lg focus:ring focus:ring-primary"
          />
        </div>
        

        <!-- Ô nhập Mật khẩu -->
        <div class="mb-4">
          <input
          required
            type="password"
            name="pass"
            placeholder="Mật khẩu"
            class="w-full p-3 border rounded-lg focus:ring focus:ring-primary"
          />
        </div>

        <!-- Nút Đăng nhập -->
        <input
          type="submit"
          name="dangnhap"
          class="w-full bg-primary text-white p-3 rounded-lg"
          value="Đăng nhập"
        >
        <?php 
   if (isset($_SESSION['text_erro']) && $_SESSION['text_erro'] != "") {
       echo '<p class="text-red-500">'.$_SESSION['text_erro'].'</p>';
       unset($_SESSION['text_erro']); // Xóa sau khi hiển thị
   }
 
?>

      </form>
    </div>
  </body>
</html>
