<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vựa rau sạch</title>
    <link rel="shortcut icon" href="images/logo13.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logo13.png" />
    <link rel="stylesheet" href="view/css/bootstrap.min.css" />
    <link rel="stylesheet" href="view/css/style.css" />
    <link rel="stylesheet" href="view/css/responsive.css" />
    <link rel="stylesheet" href="view/css/custom.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      .dropdown {
        position: relative;
      }

      .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #b0b435;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 10px 0;
        margin: 0;
        list-style: none;
        z-index: 1000;
        border: 1px solid #b0b435;
      }

      .dropdown-menu li {
        padding: 5px 20px;
      }

      .dropdown-menu li a {
        color: #333;
        text-decoration: none;
        display: block;
      }

      .dropdown-menu li a:hover {
        background-color: #b0b435;
      }

      .dropdown:hover .dropdown-menu {
        display: block;
      }
    </style>
  </head>

  <body>
    <div class="main-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="right-phone-box">
              <p>Điện thoại :- <a href="#"> +84 09876543210</a></p>
            </div>
            <div class="our-link">
              <ul>
                <?php 
                    if (isset($_SESSION['taikhoan'])){
                      extract($_SESSION['taikhoan']);
                ?>
                 <li class="dropdown">
                  <span style="color: #ffffff; font-weight: 700;text-transform: uppercase;font-size: 14px" class="dropdown-toggle">
                    <i class="fa fa-user s_color"></i> <?=$user?>
                  </span>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?act=thongtinnguoidung">Thông tin cá nhân</a></li>
                    <li><a href="index.php?act=mybill">Lịch sử mua hàng</a></li>
                    <li><a href="index.php?act=logout">Đăng xuất</a></li>
                  </ul>
                </li>
                <?php } else { ?>
                <li><a href="index.php?act=dangnhap"><i class="fa fa-user s_color"></i> Tài Khoản</a></li>
                <?php } ?>
                <li>
                  <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+S%C3%A0i+G%C3%B2n" target="_blank">
                    <i class="fas fa-location-arrow"></i> Địa chỉ
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <header class="main-header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""/></a>
          </div>

          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
              <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
              <?php 
              foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=".$id;
                echo '<li class="nav-item"><a class="nav-link" href="'.$linkdm.'">'.$name.'</a></li>';
              }
              ?>
            </ul>
          </div>
          <div class="attr-nav">
            <ul>
              <li class="search">
                <button class="search-toggle"><i class="fa fa-search"></i></button>
                <form action="index.php" class="search-bar" method="get">
                    <input type="hidden" name="act" value="timkiem">
                    <div class="form-group" style="display: flex; align-items: center;">
                        <input type="text" name="kyw" class="form-control" placeholder="Tìm kiếm..." required style="flex: 1; padding: 8px;">
                        <button type="submit" class="btn-search" style="padding: 8px;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
              </li>
              <?php
              $cartItemCount = 0;
              if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
                  $cartItemCount = count($_SESSION['mycart']);
              }
              ?>
              <li class="side-menu">
                  <a href="index.php?act=addtocart">
                      <i class="fa fa-shopping-bag"></i>
                      <span class="badge"><?= $cartItemCount > 0 ? $cartItemCount : 0 ?></span>
                      <p>Giỏ Hàng</p>
                  </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <script>
    document.querySelector('.form-control').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); 
            document.querySelector('.search-bar').submit(); 
        }
    });
    </script>
  </body>
</html>
