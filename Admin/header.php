
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ</title>
    <link href="src/output.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <header
      class="bg-primary text-white p-4 flex justify-between items-center w-full"
    >
      
        <img
          class="max-w-[150px] h-20 ml-10"
          src="../view/images/logo13xoanen.png"
          alt="Vựa Rau Sạch"
        />
 
   

      <ul class="flex items-center space-x-6 mr-10">
        <ul class="flex items-center space-x-6 mr-10">
          <li class="flex items-center pl-4">
            <i class="fa-solid fa-circle-user text-2xl font-black"></i>
            <span class="font-medium text-lg ml-2">Admin</span>
          </li>
          <li>
            <a href="index.php?act=dangxuat" class="px-4 py-2 text-white font-medium">
              Đăng xuất
            </a>
          </li>
        </ul>
      </ul>
    </header>
    <div class="flex w-full">
      <!-- Sidebar -->
      <nav
        class="w-1/5 bg-white p-6 shadow-md min-h-screen text-lg font-semibold"
      >
        <ul>
          <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=trangchu">Trang chủ</a>
          </li>
          <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=listdm">Quản lý danh mục</a>
          </li>
          <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=listsp">Quản lý sản phẩm</a>
          </li>
          <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=qldh">Quản lý đơn hàng</a>
          </li>
          <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=qlkh">Quản lý khách hàng</a>
          </li>
          <!-- <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=tksp">Thống kê Sản phẩm</a>
          </li> -->
          <li class="py-3 text-center hover:text-primary">
            <a href="./index.php?act=tkkh">Top 5 khách hàng</a>
          </li>
        </ul>
      </nav>