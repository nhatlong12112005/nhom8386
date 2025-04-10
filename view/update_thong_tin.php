<div
      class="edit-user-info"
      style="
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      "
    >
      <h1 style="text-align: center; color: #333; margin-bottom: 20px">
        <b>Chỉnh sửa thông tin cá nhân</b>
      </h1>
      <?php 
        if(isset($_SESSION['taikhoan'])&&(is_array($_SESSION['taikhoan']))){
            extract($_SESSION['taikhoan']);
        }
      ?> 
      <form action="index.php?act=updatethongtin" method="post">
        <div style="margin-bottom: 15px">
          <label
            for="full-name"
            style="display: block; font-weight: bold; margin-bottom: 5px"
            >Họ và tên:</label
          >
          <input
            type="text"
            name="user"
            value="<?=$user?>"
            style="
              width: 100%;
              padding: 10px;
              border: 1px solid #ddd;
              border-radius: 5px;
            "
          />
        </div>
        <div style="margin-bottom: 15px">
          <label
            for="phone-number"
            style="display: block; font-weight: bold; margin-bottom: 5px"
            >Mật khẩu:</label
          >
          <input
            type="password"
            name="pass"
            value="<?=$pass?>"
            style="
              width: 100%;
              padding: 10px;
              border: 1px solid #ddd;
              border-radius: 5px;
            "
          />
        </div>
        <div style="margin-bottom: 15px">
          <label
            for="email"
            style="display: block; font-weight: bold; margin-bottom: 5px"
            >Email:</label
          >
          <input
            type="email"
            name="email"
            value="<?=$email?>"
            style="
              width: 100%;
              padding: 10px;
              border: 1px solid #ddd;
              border-radius: 5px;
            "
          
          />
        </div>
        <div style="margin-bottom: 15px">
          <label
            for="phone-number"
            style="display: block; font-weight: bold; margin-bottom: 5px"
            >Số điện thoại:</label
          >
          <input
            type="text"
            name="tel"
            value="<?=$tel?>"
            style="
              width: 100%;
              padding: 10px;
              border: 1px solid #ddd;
              border-radius: 5px;
            "
          />
        </div>
        <div style="margin-bottom: 15px">
          <label
            for="address"
            style="display: block; font-weight: bold; margin-bottom: 5px"
            >Địa chỉ:</label
          >
          <input
            type="text"
            name="address"
            value="<?=$address?>"
            style="
              width: 100%;
              padding: 10px;
              border: 1px solid #ddd;
              border-radius: 5px;
            "
          />
        </div>
        <input type="hidden" name="id" value="<?=$id?>">
        <button
          type="submit"
          name="capnhat"
          value="1"
          style="
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #b0b435;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
          "
        >
          Cập nhật thông tin
        </button>
        <?php if(isset($thongbao)) echo $thongbao;  ?>
      </form>
    </div>