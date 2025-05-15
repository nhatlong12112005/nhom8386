<?php
    session_start();
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 1){
    include "../model/pdo.php";
    include "../model/dmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/cart.php";
    include "../global.php";
   


    include "header.php"; // Bao gồm phần header

    // Kiểm tra hành động (act) từ URL
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai']; 
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công"; 
                }
                include "src/danhmuc.php"; 
                break;
            case 'listdm':
                $listdanhmuc = loadall_danhmuc(); 
                include "src/listdm.php"; 
                break;
                case 'suadm':
                    if (isset($_GET['id'])) {
                        $dm = loadone_danhmuc($_GET['id']);
                    }
                    include "src/updatedm.php";
                    break;
                
                case 'updatedm':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $id = $_POST['id']; 
                        $tenloai = $_POST['tenloai']; 
                        update_danhmuc($id, $tenloai); 
                        $thongbao = "Cập nhật thành công"; 
                    }
                
                    // Sau khi cập nhật xong, bạn có thể lấy lại dữ liệu để hiển thị lại form
                    if (isset($_POST['id'])) {
                        $dm = loadone_danhmuc($_POST['id']);
                    }
                
                    include "src/updatedm.php";
                    break;
                
                
                
            case 'xoadm':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delete_danhmuc($id);
                    $thongbao = "Xóa thành công"; // Thông báo
                }
                include "src/listdm.php"; // Quay lại trang danh sách
                break;
            case 'addsp':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota']; 
                    $soluong = $_POST['soluong']; 
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        //echo "Sorry, there was an error uploading your file.";
                      }
                    insert_sanpham($tensp,$giasp,$hinh,$mota,$soluong,$iddm);
                    $thongbao = "Thêm thành công"; 
                }
                $listdanhmuc = loadall_danhmuc();
                include "src/add_san_pham.php";
                break;
            case 'listsp':
                if(isset($_POST['listok']) && ($_POST['listok'])){
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                }else {
                    $kyw ="";
                    $iddm = 0;
                }
                if(!isset($_GET['page'])){
                    $page = 1;
                }
                else {
                    $page = $_GET['page'];
                }
                $soluongsp = 8;
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw,$iddm,$page,$soluongsp);
                $tongsosp = all_sanpham($kyw,$iddm);
                $hienthisotrang = hien_thi_so_trang($tongsosp,$soluongsp);
                include "src/san_pham.php";
                break;
                case 'xoasp':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                        
                        // Gọi hàm delete_sanpham để kiểm tra và xóa/ẩn sản phẩm
                        delete_sanpham($id);
                    }
                
                    // Lấy số trang hiện tại từ URL
                    if (!isset($_GET['page'])) {
                        $page = 1; // Gán trang mặc định là 1 nếu không có tham số 'page'
                    } else {
                        $page = $_GET['page'];
                    }
                
                    $soluongsp = 8; // Số lượng sản phẩm hiển thị mỗi trang
                
                    // Lấy danh sách sản phẩm sau khi xóa hoặc ẩn
                    $listsanpham = loadall_sanpham("", 0, $page, $soluongsp);
                
                    // Chuyển hướng về trang hiện tại sau khi xóa hoặc ẩn sản phẩm
                    header("Location: index.php?act=listsp&page=" . $page);
                    exit;
                
                    break;
                
                
            case 'suasp':
                if (isset($_GET['id']) && ($_GET['id']>0)){
                    $listdanhmuc = loadall_danhmuc();
                    $sp = loadone_sanpham($_GET['id']);
                }
                include "src/updatesp.php";
                break;
                case 'updatesp':
                    if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                        $id = $_POST['id'];
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota']; 
                        $soluong = $_POST['soluong']; 
                
                        // Lấy thông tin sản phẩm hiện tại để giữ lại ảnh cũ nếu không có ảnh mới
                        $sp = loadone_sanpham($id);
                        $hinh = $sp['img']; // mặc định là ảnh cũ
                
                        if ($_FILES['hinh']['name'] != "") {
                            $hinh = $_FILES['hinh']['name'];
                            $target_dir = "../upload/";
                            $target_file = $target_dir . basename($hinh);
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                        }
                
                        // Cập nhật sản phẩm
                        update_sanpham($id, $tensp, $giasp, $hinh, $mota, $soluong, $iddm);
                        $thongbao = "Cập nhật thành công";
                    }
                
                    // Load danh sách lại
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    $soluongsp = 8;
                
                    $listdanhmuc = loadall_danhmuc();
                    $listsanpham = loadall_sanpham("", 0, $page, $soluongsp);
                
                    // Không chuyển trang nữa, để giữ dữ liệu hiển thị lại
                    header('Location: index.php?act=listsp');
                    break;
                
                
                    case 'qlkh':
                        if (isset($_POST['listok'])) {
                            $kyw = isset($_POST['kyw']) ? trim($_POST['kyw']) : "";
                            $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : null;
                        } else {
                            $kyw = "";
                            $trangthai = null;
                        }if(!isset($_GET['page'])){
                            $page = 1;
                        }
                        else {
                            $page = $_GET['page'];
                        }
                        $soluongkh = 5;
                
                        $listtaikhoan = loadall_taikhoan($kyw, $trangthai,$page,$soluongkh);
                        $tongsokh = all_khachhang($kyw, $trangthai);
                        $hienthisotrang = hien_thi_so_trang_tai_khoan($tongsokh,$soluongkh);
                        include "src/khach_hang.php";
                        break;
                    
                    
                    
                    
                    
                    case 'khoatk':
                        if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['trangthai'])) {
                            $id = (int)$_GET['id'];
                            $trangthai = (int)$_GET['trangthai'];
                    
                            // Đảo trạng thái
                            $trangthaiMoi = $trangthai == 1 ? 0 : 1;
                    
                            // Gọi hàm cập nhật
                            update_trangthai_taikhoan($id, $trangthaiMoi);
                        }
                    if(!isset($_GET['page'])){
                        $page = 1;
                    }
                    else {
                        $page = $_GET['page'];
                    }
                    $soluongkh = 2;
                        $listtaikhoan = loadall_taikhoan("",null,$page,$soluongkh);
                        header('Location: index.php?act=qlkh');
                        break;
                        case 'suatk':
                            if (isset($_GET['id'])) {
                                $dm = loadone_taikhoan($_GET['id']);
                                // Lưu vào SESSION để form nhận dữ liệu
                                $_SESSION['taikhoan'] = $dm;
                            }
                            include "src/updatetk.php";
                            break;
                        
                            case 'updatetk':
                                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                                    $user = $_POST['user'];
                                    $pass = $_POST['pass'];
                                    $email = $_POST['email'];
                                    $address = $_POST['address'];
                                    $tel = $_POST['tel'];
                                    $id = $_POST['id'];
                                    $role = $_POST['role'];
                                    
                                    // Cập nhật tài khoản
                                    update_taikhoan_admin($id, $user, $pass, $email, $address, $tel, $role);
                            
                                    // Cập nhật lại session sau khi sửa thành công
                                    $_SESSION['taikhoan'] = checkuser($user, $pass);
                            
                                    $thongbao = "Cập nhật thành công";
                                }
                                include "src/updatetk.php";
                                break;
                        case 'addkh':
                            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                                $email = $_POST['email'];
                                $user = $_POST['user'];
                                $pass = $_POST['pass'];
                                $address = $_POST['address'];
                                $tel = $_POST['tel'];
                                insert_taikhoan($email, $user, $pass,$address,$tel);
                                $thongbao = "Đã đăng ký thành công";
                            }
                            include "src/add_kh.php";
                            break;
                            case 'qldh':
                                // Mặc định các giá trị lọc
                                $from_date = null;
                                $to_date = null;
                                $bil_status = '';
                                $kyw = '';
                            
                                // Nếu người dùng bấm nút "Lọc"
                                if (isset($_POST['listok'])) {
                                    $from_date = !empty($_POST['from_date']) ? $_POST['from_date'] . ' 00:00:00' : null;
                                    $to_date = !empty($_POST['to_date']) ? $_POST['to_date'] . ' 23:59:59' : null;
                                    $bil_status = $_POST['bil_status'] ?? '';
                                    $kyw = $_POST['kyw'] ?? '';
                                }
                            
                                // Xử lý phân trang
                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $soluongsp = 5;  // Số lượng sản phẩm mỗi trang
                            
                                // Truy vấn dữ liệu theo bộ lọc
                                $listbill = loadall_bill_dh_admin($from_date, $to_date, $bil_status, $kyw, $page, $soluongsp);
                            
                                // Tổng số đơn hàng theo điều kiện lọc (phục vụ cho phân trang)
                                $tongsodh = all_bill($kyw, $from_date, $to_date);
                            
                                // Hiển thị số trang
                                $hienthisotrang = hien_thi_so_trang_admin($tongsodh, $soluongsp);
                            
                                include "src/don_hang.php";
                                break;                      
                            
                            case 'update_status':
                                if (isset($_POST['id']) && isset($_POST['bil_status'])) {
                                    $id = $_POST['id'];  // ID của đơn hàng
                                    $new_status = $_POST['bil_status'];  // Trạng thái mới từ form gửi lên
                                    
                                    // Kiểm tra và cập nhật trạng thái đơn hàng
                                    update_status($id, $new_status);
                                } else {
                                    echo "Thiếu thông tin đơn hàng hoặc trạng thái mới!";
                                }
                                 header('Location: index.php?act=qldh');
                                break;
                            
                                case 'ctdh':
                                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                                        $iddh = $_GET['id'];
                                
                                        // Lấy chi tiết đơn hàng
                                        $onedh = loadone_bill_dh($iddh);
                                
                                        // Lấy danh sách sản phẩm trong đơn hàng
                                        $listbill = load_cart_items($iddh);
                                
                                        // Kiểm tra và xử lý khi $listbill không có 'thanhtien'
                                        foreach ($listbill as &$cart) {
                                            if (!isset($cart['thanhtien'])) {
                                                $cart['thanhtien'] = $cart['price'] * $cart['soluong'];
                                            }
                                
                                            // Kiểm tra trạng thái sản phẩm và hiển thị thông báo nếu sản phẩm đã bị xóa
                                            if ($cart['status'] == 0) {
                                                $cart['status_message'] = 'Sản phẩm này đã ngừng bán';
                                            }
                                        }
                                
                                        // Gọi file chi tiết đơn hàng và truyền dữ liệu
                                        include "src/chi_tiet_don_hang.php";
                                    } else {
                                        echo "<p class='text-red-500'>ID đơn hàng không hợp lệ!</p>";
                                    }
                                    break;
                                
                            case 'dangxuat':
                                unset($_SESSION['user']);
                                header('Location:login.php');
                                break;
                            
                                // case 'tksp':
                                //     $kyw = '';
                                //     $from_date = '';
                                //     $to_date = ''; 
                                //     if (isset($_POST['listok'])) {
                                //         // Lấy các giá trị từ form
                                //         $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : '';
                                //         $from_date = isset($_POST['from_date']) ? $_POST['from_date'] : '';
                                //         $to_date = isset($_POST['to_date']) ? $_POST['to_date'] : '';
                                //     }
                                
                                //     // Xác định trang hiện tại
                                //     $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                //     $soluongsp = 5;
                                //     $tongsosp = all_cart($kyw,$from_date,$to_date);
                                //     $hienthisotrang = hien_thi_so_trang_admin($tongsosp, $soluongsp,$kyw);
                                
                                //     $listcart = loadall_cart_admin($page, $soluongsp, $kyw,$from_date,$to_date);
                                //     include "src/thong_ke_san_pham.php";
                                //     break;
                                  
                                // case 'cttksp':
                                //     if (isset($_GET['idpro']) && $_GET['idpro'] > 0) {
                                //         $idpro = $_GET['idpro'];
                                //         $product = loadone_product($idpro);
                                //         $listbill = load_bill_by_product($idpro);
                                //     }
                                //     include "src/chitiet_thongke_sp.php";
                                //     break;
                                case 'tkkh':
                                    $from_date = isset($_GET['from_date']) ? $_GET['from_date'] . ' 00:00:00' : null;
                                    $to_date = isset($_GET['to_date']) ? $_GET['to_date'] . ' 23:59:59' : null;
                                    // Gọi hàm top5khachhang với các tham số từ ngày đến ngày
            

                                    $top5kh = top5khachhang($from_date, $to_date);
                                   
                                    include "src/thong_ke_khach_hang.php";
                                    break;
                                
                                    case 'ctkhtk':
                                        if (isset($_GET['bill_name'])) {
                                            $bill_name = $_GET['bill_name'];
                                    
                                            $from_date = isset($_GET['from_date']) ? $_GET['from_date'] . ' 00:00:00' : null;
                                            $to_date = isset($_GET['to_date']) ? $_GET['to_date'] . ' 23:59:59' : null;
                                    
                                            $listbill = load_bill_dh_admin($bill_name, $from_date, $to_date);
                                        }
                                    
                                        include "src/chitiet_kh.php";
                                        break;
                                    
                                                        

            default:
                include "home.php"; // Hiển thị trang chủ nếu không có hành động nào
                break;
        }
    }
    else {
        include "home.php"; // Hiển thị trang chủ nếu không có hành động nào
    }

    include "footer.php";
}else{
    header('Location: login.php');
}
?>
