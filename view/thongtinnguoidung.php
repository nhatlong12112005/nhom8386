
<div
      class="user-info"
      style="
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      "
    >
      <h1 style="text-align: center; color: #333; margin-bottom: 20px">
        Thông tin người dùng
      </h1>

      <div
        class="user-details"
        style="
          margin-bottom: 15px;
          border: 1px solid #ddd;
          padding: 15px;
          border-radius: 5px;
        "
      >
      <?php 
                    if (isset($_SESSION['taikhoan'])){
                      extract($_SESSION['taikhoan']);
                    }
                ?>
        <p style="margin: 0; font-weight: bold">
          Tên người dùng: <span style="color: #b0b435"><?=$user?></span>
        </p>
        <p style="margin: 0">
          Email:
          <a href="mailto:example@gmail.com" style="color: #b0b435"
            ><?=$email?></a
          >
        </p>
        <p style="margin: 0">
          Số điện thoại:
          <a href="tel:09876543210" style="color: #b0b435"><?=$tel?></a>
        </p>
        <p style="margin: 0">
         Địa chỉ: <?=$address?>
        </p>

      </div>

      <div
        class="account-settings"
        style="
          margin-bottom: 15px;
          border: 1px solid #ddd;
          padding: 15px;
          border-radius: 5px;
        "
      >
        <h3 style="margin-bottom: 10px; color: #b0b435">Cài đặt tài khoản</h3>
        <ul style="list-style: none; padding: 0; margin: 0">
          <li>
            <a
              href="index.php?act=updatethongtin"
              style="color: #b0b435; text-decoration: none"
              >Chỉnh sửa thông tin cá nhân</a
            >
          </li>
        </ul>
      </div>

      <a
        href="index.php"
        style="
          display: inline-block;
          padding: 10px 15px;
          background-color: #b0b435;
          color: white;
          text-decoration: none;
          border-radius: 5px;
          text-align: center;
        "
        >Quay lại trang chính</a
      >
    </div>