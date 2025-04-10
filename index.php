<?php 
    ob_start();
    session_start();
    include "model/pdo.php";
    include "model/dmuc.php";
    include "model/sanpham.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "global.php";
    $dsdm = loadall_danhmuc();
    include "view/header.php";
    if (!isset($_SESSION['mycart'] )) $_SESSION['mycart'] = [];  
    $spnew = loadall_sanpham_trangchu();
    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanphamct':
                if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                    $id = $_GET['idsp'];
                    $onesp = loadone_sanpham($id);
                    extract($onesp); // Lấy thông tin sản phẩm
                    $sp_cungloai = load_sanpham_cungloai($id, $iddm);  // Lấy sản phẩm cùng loại
                    $tendm = load_ten_dm($iddm);  // Lấy tên danh mục
                    include "view/sanphamct.php";  // Hiển thị trang chi tiết sản phẩm
                } else {
                    include "view/home.php";  // Nếu không có id hợp lệ, quay về trang chủ
                }
                break;
                var_dump(headers_list());
exit();

            case 'sanpham':
                $kyw = isset($_GET['kyw']) ? trim($_GET['kyw']) : ""; // Khởi tạo $kyw
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Khởi tạo $page
                
                if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $iddm = $_GET['iddm'];
                } else {
                    $iddm = 0;
                }
            
                $soluongsp = 4;
                $dssp = loadall_sanpham($kyw, $iddm, $page, $soluongsp);
                $tendm = load_ten_dm($iddm);
                $tongsosp = all_sanpham($kyw, $iddm);
            
                $hienthisotrang = "";
                if (count($tongsosp) > 0) {
                    $hienthisotrang = hien_thi_so_trang_user($tongsosp, $soluongsp, $kyw, $iddm);
                }
            
                include "view/sanphamtheodm.php";
                break;

                case 'timkiem':
                    $kyw = isset($_GET['kyw']) ? trim($_GET['kyw']) : "";
                    $iddm = isset($_GET['iddm']) ? intval($_GET['iddm']) : 0;
                    $price_min = isset($_GET['price-min']) ? doubleval($_GET['price-min']) : 0;
                    $price_max = isset($_GET['price-max']) ? doubleval($_GET['price-max']) : 0;
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $soluongsp = isset($_GET['soluong']) ? intval($_GET['soluong']) : 8;
                
                    $dssp = loadall_sanpham_timkiem($kyw, $iddm, $price_min, $price_max, $page, $soluongsp);
                    $tongsosp = all_sanpham($kyw, $iddm, $price_min, $price_max);
                    $count = count($tongsosp);
                
                    // Định dạng giá tiền hiển thị
                    $gia_min = number_format($price_min, 3, '.', '') . " VND";
                    $gia_max = number_format($price_max, 3, '.', '') . " VND";
                    $hienthisotrang = "";
                    if (count($tongsosp) > 0) {
                        $hienthisotrang = hien_thi_so_trang_timkiem($tongsosp, $soluongsp, $kyw, $iddm, $price_min, $price_max);
                    }
                
                    if ($count > 0) {
                        $thongbao = "<div style='margin-top: 10px; padding: 10px; background: #dff0d8; color: #3c763d; border-radius: 5px; font-size: 16px; text-align: center;'> 
                            Đã tìm thấy <b>$count</b> sản phẩm liên quan đến từ khóa: <b>$kyw</b>";
                        
                        // Thêm điều kiện kiểm tra khoảng giá
                        if ($price_min > 0 || $price_max > 0) {
                            $thongbao .= " trong khoảng giá từ <b>$gia_min</b> đến <b>$gia_max</b>.";
                        } else {
                            $thongbao .= ".";
                        }
                
                        $thongbao .= "</div>";
                    } else {
                        $thongbao = "<div style='margin-top: 10px; padding: 10px; background: #f8d7da; color: #721c24; border-radius: 5px; font-size: 16px; text-align: center;'> 
                            Không tìm thấy sản phẩm nào phù hợp";
                        
                        // Thêm điều kiện kiểm tra khoảng giá
                        if ($price_min > 0 || $price_max > 0) {
                            $thongbao .= " trong khoảng giá từ <b>$gia_min</b> đến <b>$gia_max</b>.";
                        } else {
                            $thongbao .= ".";
                        }
                
                        $thongbao .= "</div>";
                    }
                
                    include "view/timkiemp.php";
                    break;
                
    
            case 'dangky':
                if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    insert_taikhoan($email, $user, $pass,$address,$tel);
                    $thongbao = "Đã đăng ký thành công";
                }
                include "view/taikhoan/dangky.php";  // Hiển thị trang đăng ký
                break;
                case 'dangnhap':
                    if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $checkuser = checkuser($user, $pass);
                
                        if (is_array($checkuser)) {
                            // Kiểm tra trạng thái tài khoản
                            if ($checkuser['trangthai'] == 0) { // 0 là trạng thái bị khóa
                                $thongbao = "Tài khoản đã bị khóa, không thể đăng nhập!";
                            } else {
                                $_SESSION['taikhoan'] = $checkuser;
                                header('Location: index.php');
                                exit;
                            }
                        } else {
                            $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký.";
                        }
                    }
                    include "view/taikhoan/dangnhap.php"; // Hiển thị trang đăng nhập
                    break;                
            case 'updatethongtin':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $id = $_POST['id'];
                    update_taikhoan($id, $user, $pass, $email, $address, $tel);
                    $_SESSION['taikhoan'] = checkuser($user, $pass);
                    $thongbao = "Cập nhật thành công";
                }
                include "view/update_thong_tin.php";  // Hiển thị trang cập nhật thông tin
                break;
            case 'quenmk':
                if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $checkemail = checkemail($email);
                    if (is_array($checkemail)) {
                        $thongbao = "Mật khẩu của bạn là: ".$checkemail['pass'];
                    }
                }
                include "view/taikhoan/quen_mat_khau.php";  // Hiển thị trang quên mật khẩu
                break;
            case 'logout':
               
                unset($_SESSION['taikhoan']);
                header('Location: index.php');
                break;
            case 'addtocart':
                if(isset($_POST['addtocart']) && ($_POST['addtocart'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $ttien = $soluong * $price;
                    $spadd = [$id,$name,$img,$price,$soluong,$ttien];
                    array_push($_SESSION['mycart'] ,$spadd);
                }
                include "view/cart/viewcart.php";
                break;
                case 'delcart':
                    if (isset($_GET['idcart'])) {
                        // Xóa phần tử khỏi mảng dựa vào chỉ số
                        unset($_SESSION['mycart'][$_GET['idcart']]);
                        // Sắp xếp lại chỉ số mảng sau khi xóa
                        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                    } else {
                        // Xóa toàn bộ giỏ hàng nếu không có idcart
                        $_SESSION['mycart'] = [];
                    }
                    header('Location: index.php?act=addtocart');
                    break;
                case 'bill':
                    include "view/cart/bill.php";
                    break;
                case 'billcomfirm':
                    if(isset($_POST['dongydathang']) && ($_POST['dongydathang'])){
                        if (isset($_SESSION['taikhoan'])) $iduser = $_SESSION['taikhoan']['id'];
                        else $id = 0;
                        $name = isset($_POST['name']) ? $_POST['name'] : "";
                        $email = isset($_POST['email']) ? $_POST['email'] : "";
                        $tel = isset($_POST['tel']) ? $_POST['tel'] : "";
                        $pttt = isset($_POST['pttt']) ? $_POST['pttt'] : "";
                        
                        // Kiểm tra địa chỉ: chọn địa chỉ cũ hoặc nhập địa chỉ mới
                        if (isset($_POST['address_option']) && $_POST['address_option'] === 'new' && !empty($_POST['new_address'])) {
                            $address = $_POST['new_address']; // Địa chỉ mới
                        } else {
                            $address = isset($_POST['address_option']) ? $_POST['address_option'] : ""; // Địa chỉ cũ
                        }

                        $ngaydathang = date('Y-m-d H:i:s'); // Thời gian hiện tại
                        $tongdonhang = tongdonhang();
                        $idbill = insert_bill($iduser, $name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang);
                        if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
                            foreach ($_SESSION['mycart'] as $cart) {
                                $iduser = isset($_SESSION['taikhoan']['id']) ? $_SESSION['taikhoan']['id'] : 0;
                                $idpro = isset($cart[0]) ? $cart[0] : 0;
                                $img = isset($cart[2]) ? $cart[2] : "";
                                $namepro = isset($cart[1]) ? $cart[1] : "";
                                $price = isset($cart[3]) ? $cart[3] : 0;
                                $soluong = isset($cart[4]) ? $cart[4] : 0;
                                $thanhtien = isset($cart[5]) ? $cart[5] : 0;
                
                                // Chèn vào bảng cart
                                insert_cart($iduser, $idpro, $img, $namepro, $price, $soluong, $thanhtien, $idbill);
                                // update_product_quantity($idpro, $soluong);
                            }
                            // Xóa giỏ hàng sau khi đặt hàng
                            $_SESSION['mycart'] = [];
                        }

                    }
                    $bill = loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
                    include "view/cart/billcomfirm.php";
                    break;
                case 'mybill':
                    $listbill = loadall_bill($_SESSION['taikhoan']['id']);
                    include "view/cart/mybill.php";
                    break;
                        case 'chitietdonhang':
                            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                                $iddh = $_GET['id'];
                        
                                // Lấy chi tiết đơn hàng
                                $onedh = loadone_bill_dh($iddh);
                        
                                // Lấy danh sách sản phẩm trong đơn hàng
                                $listbill = load_cart_items($iddh);
                        
                                // Kiểm tra và xử lý khi $listbill không có 'thanhtien'
                                foreach ($listbill as &$cart) {
                                    // Kiểm tra nếu chưa có 'thanhtien' thì tính toán
                                    if (!isset($cart['thanhtien'])) {
                                        $cart['thanhtien'] = $cart['price'] * $cart['soluong'];
                                    }
                                }
                            } else {
                                // Nếu không có id đơn hàng
                                $onedh = [];
                                $listbill = [];
                            }
                        
                            include "view/cart/chitietdonhang.php";
                            break;
                    case 'thongtinnguoidung':
                        include "view/thongtinnguoidung.php";
                        break;
                
            default:
                include "view/home.php";  // Trang mặc định khi không có hành động
                break;
        }
    } else {
        include "view/home.php";  // Hiển thị trang chủ mặc định
    }
    
    include "view/footer.php"; 
ob_end_flush();
?>
