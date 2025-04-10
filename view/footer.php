<footer>
      <div class="footer-main">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="footer-top-box">
                <h3>Thời gian hoạt động</h3>
                <ul class="list-time">
                  <li>Thứ hai - Thứ sáu: 08.00am to 05.00pm</li>
                  <li>Thứ bảy: 10.00am to 08.00pm</li>
                  <li>Chủ nhật: <span>Đóng cửa</span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="footer-top-box">
                <h3>Mạng xã hội</h3>
                <p>Vui lòng liên hệ:</p>
                <ul>
                  <li>
                    <a
                      href="https://www.facebook.com/profile.php?id=61567514856641"
                      target="_blank"
                      ><i class="fab fa-facebook" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li>
                    <a
                      href="https://www.instagram.com/vua_rau_sach/"
                      target="_blank"
                      ><i class="fa-brands fa-instagram" aria-hidden="true"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="footer-widget">
                <h4>Thông tin cửa hàng</h4>
                <p>
                  Chúng tôi là đơn vị chuyên cung cấp rau sạch, an toàn và giàu
                  dinh dưỡng từ những trang trại xanh, sạch, đạt chuẩn. Với sứ
                  mệnh mang đến sức khỏe cho mọi gia đình, chúng tôi đảm bảo
                  rằng từng sản phẩm đều trải qua quy trình kiểm soát chất lượng
                  nghiêm ngặt, không chứa hóa chất độc hại. Rau của chúng tôi
                  được trồng hoàn toàn tự nhiên và chăm sóc kỹ lưỡng để giữ
                  nguyên độ tươi ngon, hương vị thuần khiết.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="footer-link">
                <h4>Thông tin</h4>
                <ul>
                  <li>
                    <a
                      href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+S%C3%A0i+G%C3%B2n/@10.7599224,106.679678,17z/data=!3m1!4b1!4m6!3m5!1s0x31752f1b7c3ed289:0xa06651894598e488!8m2!3d10.7599171!4d106.6822583!16s%2Fm%2F02qvnkv?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D"
                      >Địa chỉ</a
                    >
                  </li>
                  <li><a href="index.php?act=addtocart">Thông tin giỏ hàng</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="footer-link-contact">
                <h4>Liên hệ chúng tôi</h4>
                <ul>
                  <li>
                    <p>
                      <i class="fas fa-map-marker-alt"></i>Địa chỉ: 273 Đ. An
                      Dương Vương, Phường 3, Quận 5, Hồ Chí Minh 700000, Việt
                      Nam
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="fas fa-phone-square"></i>Điện thoại:
                      <a href="tel:09876543210">09876543210</a>
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="fas fa-envelope"></i>Email:
                      <a href="mailto:contactinfo@gmail.com"
                        >vuarausach2910@gmail.com</a
                      >
                    </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none"
      >&uarr;</a
    >

    <!-- ALL JS FILES -->
    <script src="view/js/jquery-3.2.1.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="view/js/jquery.superslides.min.js"></script>
    <script src="view/js/images-loded.min.js"></script>
    <script src="view/js/isotope.min.js"></script>
    <script src="viewjs/custom.js"></script>
    <script>
  document.querySelector('.user-menu').addEventListener('click', function () {
      this.classList.toggle('show'); // Toggle mở/đóng menu
  });

  // Đóng dropdown khi click ra ngoài
  document.addEventListener('click', function (event) {
      var dropdown = document.querySelector('.user-menu');
      if (!dropdown.contains(event.target)) {
          dropdown.classList.remove('show');
      }
  });
</script>

  </body>
</html>
