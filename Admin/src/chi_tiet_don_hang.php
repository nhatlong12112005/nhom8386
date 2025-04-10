<main class="w-4/5 p-6">
  <h1 class="text-primary mb-4 font-semibold text-[32px]">
    Chi tiết đơn hàng
  </h1>
  <h2 class="text-primary mb-4 font-semibold text-center text-[24px]">
    Danh sách sản phẩm
  </h2>

  <?php 
    global $img_path;

    if (!empty($onedh)) {
      extract($onedh);

      $ttdh = get_ttdh($bil_status);

      $pttt = "";
      if ($bill_pttt == 1) {
        $pttt = "Trả tiền khi nhận hàng";
      } elseif ($bill_pttt == 2) {
        $pttt = "Chuyển khoản ngân hàng";
      } else {
        $pttt = "Phương thức thanh toán khác";
      }

      echo '<div class="bg-white p-4 shadow rounded-md">
        <table class="w-full text-center border-collapse">';
        if (!empty($listbill)) {
          show_chitiet_bill_admin($listbill);
        }
      echo '</table>

        <h2 class="text-primary mb-4 mt-4 font-semibold text-center text-[24px]">
          Thông tin đơn hàng
        </h2>
        <div class="bg-gray-100 p-6 rounded-lg">
          <div class="mb-4">
            <label class="font-semibold block">Họ tên:</label>
            <input type="text" value="'.$bill_name.'" class="w-full border p-2 rounded bg-white" disabled />
          </div>

          <div class="mb-4">
            <label class="font-semibold block">Email:</label>
            <input type="text" value="'.$bil_email.'" class="w-full border p-2 rounded bg-white" disabled />
          </div>

          <div class="mb-4">
            <label class="font-semibold block">Điện thoại:</label>
            <input type="text" value="'.$bill_tel.'" class="w-full border p-2 rounded bg-white" disabled />
          </div>

          <div class="mb-4">
            <label class="font-semibold block">Địa chỉ:</label>
            <input type="text" value="'.$bill_address.'" class="w-full border p-2 rounded bg-white" disabled />
          </div>

          <div class="mb-4">
            <label class="font-semibold block">Thanh toán:</label>
            <input type="text" value="'.$pttt.'" class="w-full border p-2 rounded bg-white" disabled />
          </div>

          <div class="mb-4">
            <label class="font-semibold block">Ngày mua:</label>
            <input type="text" value="'.$ngaydathang.'" class="w-full border p-2 rounded bg-white" disabled />
          </div>

          <div class="mb-4">
            <label class="font-semibold block">Trạng thái:</label>
            <div class="p-2 bg-white border rounded">'.$ttdh.'</div>
          </div>

          <div class="flex justify-center items-center mt-6">
            <a href="index.php?act=qldh">
              <button class="bg-red-500 mr-3 text-white px-6 py-2 rounded hover:bg-red-600">
                Đóng
              </button>
            </a>
            
          </div>
        </div>
      </div>';
    } else {
      echo '<p class="text-red-500 font-semibold text-center">Không tìm thấy đơn hàng!</p>';
    }
  ?>
</main>

<script>
  function save() {
    alert('Đã lưu thành công');
  }
</script>
