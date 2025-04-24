<?php 
function show_chitiet_bill($listbill) {
    global $img_path; // Sử dụng biến toàn cục
    $tong = 0;
    $i = 0;
    echo '<thead>
            <tr>
              <th>Hình</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>';
    foreach($listbill as $cart) {
        $hinh = strpos($cart['img'], "./upload/") === 0 ? $cart['img'] : $img_path.$cart['img'];
        $thanhtien = $cart['price'] * $cart['soluong'];
        $tong += $thanhtien;
        
        echo '<tr>
            <td class="thumbnail-img">
                <img
                    class="img-fluid"
                    src="'.$hinh.'"
                    alt=""
                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;"
                />
            </td>
            <td class="name-pr">
                '.$cart['name'].'
            </td>
            <td class="price-pr">
                <p>'.number_format($cart['price'], 3, '.', '').' VNĐ</p>
            </td>
            <td class="quantity-box">
                '.$cart['soluong'].'
            </td>
            <td class="total-pr">
                <p>'.number_format($thanhtien, 3, '.', '').' VNĐ</p>
            </td>
        </tr>';
        $i += 1;
    }
    echo '<tr>
        <td colspan="4" style="font-weight: bold;">Tổng đơn hàng</td>
        <td class="total-pr">
            <p style="font-weight: bold;">'.number_format($tong, 3, '.', '').' VNĐ</p>
        </td>
    </tr>';
}
function show_chitiet_bill_admin($listbill) {
    global $img_path; // Sử dụng biến toàn cục
    $tong = 0;
    $i = 0;

    echo '<thead>
            <tr>
              <th>Hình</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>';

    foreach ($listbill as $cart) {
        // Kiểm tra và tạo đường dẫn hình ảnh
        $hinh = (strpos($cart['img'], './upload/') === 0) ? $cart['img'] : $img_path . $cart['img'];

        // Đảm bảo đường dẫn là đúng
        $hinh_full = "http://localhost/projectweb/nhom8386/upload/" . basename($cart['img']); 

        // Tính thành tiền
        $thanhtien = $cart['price'] * $cart['soluong'];
        $tong += $thanhtien;

        // Kiểm tra trạng thái sản phẩm (ví dụ: 0 có thể là sản phẩm đã bị xóa)
        $status_message = '';
        $status_class = '';
        if ($cart['status'] == 0) {
            $status_message = 'Sản phẩm đã ngừng bán';
            $status_class = 'style="color: gray;"'; // Tạo kiểu cho sản phẩm đã bị xóa
        }

        echo '<tr>
            <td class="thumbnail-img" style="display: flex; justify-content: center;">
                <img class="img-fluid" src="' . $hinh_full . '" alt="Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;" />
            </td>

            <td class="name-pr" ' . $status_class . '>
                ' . htmlspecialchars($cart['name']) . '
                ' . ($status_message ? '<span class="text-sm">' . $status_message . '</span>' : '') . '
            </td>
            <td class="price-pr">
                <p>' . number_format($cart['price'], 3, '.', '') . ' VNĐ</p>
            </td>
            <td class="quantity-box">
                ' . $cart['soluong'] . '
            </td>
            <td class="total-pr">
                <p>' . number_format($thanhtien, 3, '.', '') . ' VNĐ</p>
            </td>
        </tr>';

        $i += 1;
    }

    // Hiển thị tổng đơn hàng
    echo '<tr>
        <td colspan="4" style="font-weight: bold;">Tổng đơn hàng</td>
        <td class="total-pr">
            <p style="font-weight: bold;">' . number_format($tong, 3, '.', '') . ' VNĐ</p>
        </td>
    </tr>';
} 

function viewcart($del) {
    $tong = 0;
    $i = 0;

    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
    } else {
        $xoasp_th = '';
    }

    echo '<thead>
              <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                ' . $xoasp_th . '
              </tr>
          </thead>';

    foreach ($_SESSION['mycart'] as $i => $cart) {
        $hinh = $cart[2];
        $ttien = $cart[3] * $cart[4]; 
        $tong += $ttien;

        if ($del == 1) {
            $xoasp_td = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa" style="font-size:12px;padding:5px 10px;" /></a>';
        } else {
            $xoasp_td = '';
        }

        echo '<tbody>
                <tr>
                    <td>
                        <img src="' . $hinh . '" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:8px;" />
                    </td>
                    <td>' . $cart[1] . '</td>
                    <td>
                        <p>' . number_format($cart[3], 3, '.', '') . ' VNĐ</p>
                    </td>
                    <td>';

        if ($del == 1) {
            // Nếu có quyền sửa (del == 1) thì hiện form để chỉnh số lượng
            echo '<form action="index.php?act=addtocart" method="POST" style="display: flex; align-items: center; gap: 5px;">
                    <input 
                        type="number" 
                        name="new_quantity" 
                        value="' . $cart[4] . '" 
                        min="1" 
                        style="width:50px; padding:2px 5px;"
                        onchange="this.form.submit()"
                    />
                    <input type="hidden" name="idcart" value="' . $i . '"/>
                  </form>';
        } else {
            // Nếu del == 0 thì chỉ hiện số lượng dạng text
            echo '<p style="margin: 0;">' . $cart[4] . '</p>';
        }

        echo '</td>
                    <td>
                        <p>' . number_format($ttien, 3, '.', '') . ' VNĐ</p>
                    </td>
                    <td>' . $xoasp_td . '</td>
                </tr>
              </tbody>';
    }

    echo '<tr>
            <td colspan="4" style="font-weight: bold;">Tổng đơn hàng</td>
            <td colspan="2" style="font-weight: bold;">' . number_format($tong, 3, '.', '') . ' VNĐ</td>
          </tr>';
}

// Xử lý cập nhật số lượng
if (isset($_POST['new_quantity']) && isset($_POST['idcart'])) {
    $idcart = $_POST['idcart'];
    $new_quantity = $_POST['new_quantity'];

    if ($new_quantity > 0) {
        $_SESSION['mycart'][$idcart][4] = $new_quantity;
    }

    header("Location: index.php?act=addtocart");
    exit();
}



 
 function tongdonhang(){
                
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart){
      $ttien = $cart[3] * $cart[4];
      $ttien = number_format($ttien, 3, '.', ''); 
      $tong += $ttien;
      $tong = number_format($tong, 3, '.', '');
      
  

}
return $tong;
 }
 function insert_bill($iduser,$name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
    $sql = "INSERT INTO bill(iduser,bill_name ,bil_email ,bill_address ,bill_tel ,bill_pttt,ngaydathang ,total) VALUES('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql = "INSERT INTO cart(iduser ,idpro ,img ,name ,price,soluong ,thanhtien,idbill) VALUES('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql = "select * from bill where id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadone_bill_dh($id){
    $sql = "select * from bill where id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($id){
    $sql = "select * from cart where idbill=".$id;
    $bill = pdo_query($sql);
    return $bill;
}
function load_cart_items($iddh) {
    // Giả sử cột chứa ID đơn hàng trong bảng cart là `idbill`
    $sql = "SELECT c.*, p.status, p.name AS product_name, p.img 
            FROM cart AS c 
            JOIN sanpham AS p ON c.idpro = p.id 
            WHERE c.idbill = ?";
    // Thực hiện truy vấn và trả về kết quả
    return pdo_query($sql, $iddh);
}

function loadall_bill($iduser) {
    $sql = "SELECT 
                b.id ,
                b.bill_name,
                b.bill_address,
                b.bill_tel,
                b.bil_email,
                b.bill_pttt,
                b.ngaydathang,
                b.total,
                b.bil_status,
                c.name,
                c.price,
                c.soluong
            FROM bill b
            LEFT JOIN cart c ON b.id = c.idbill
            WHERE b.iduser = ".$iduser."
            ORDER BY b.id DESC";
    
    $listbill = pdo_query($sql);
    return $listbill;
}
function loadall_bill_dh($iduser){
    $sql ="select * from bill where 1";
    if($iduser >  0) $sql .=" AND iduser=".$iduser;
    $sql .=" order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;

}
function loadall_bill_dh_admin($from_date, $to_date, $bil_status, $kyw,$page, $soluongsp){
    if(($page == "") || ($page == 0)) $page = 1;
        $batdau = ($page-1) * $soluongsp;
    $sql = "SELECT * FROM bill WHERE 1";

    // Filter by keyword if provided
    if (!empty($kyw)) {
        // Loại bỏ khoảng trắng thừa ở đầu và cuối chuỗi tìm kiếm
        $kyw = trim($kyw);
        
        // Kiểm tra nếu chuỗi tìm kiếm không rỗng sau khi đã loại bỏ khoảng trắng
        if ($kyw != "") {
            $sql .= " AND (bill_name LIKE '%$kyw%' OR bill_address LIKE '%$kyw%')";
        }
    }

    // Filter by bill status if provided
    if ($bil_status != "") {
        $sql .= " AND bil_status = '$bil_status'";
    }

    // Filter by date range if provided
    if ($from_date != "" && $to_date != "") {
        $sql .= " AND ngaydathang BETWEEN '$from_date' AND '$to_date'";
    }

    // Order by bill ID in descending order
    $sql .= " ORDER BY id DESC";
    $sql .= " Limit ".$batdau.",".$soluongsp;
    // Execute the query and return the result
    $listbill = pdo_query($sql);
    return $listbill;
}


function update_product_quantity($idpro, $soluong) {
    $sql = "UPDATE sanpham SET soluong = ? WHERE id = ?";
    pdo_execute($sql, [$soluong, $idpro]);
}

function get_ttdh($n) {
    switch ($n) {
        case '0':
            $tt = "Chưa xác nhận";
            break;
        case '1':
            $tt = "Đã xác nhận";
            break;
        case '2':
            $tt = "Thành công";
            break;
        case '3':
            $tt = "Hủy đơn";
            break;
        default:
            $tt = "Chưa xác nhận";
            break;
    }
    return $tt;
}
function update_status($id, $new_status) {
    // Lấy trạng thái hiện tại của đơn hàng từ cơ sở dữ liệu
    $sql = "SELECT bil_status FROM bill WHERE id = $id";
    $current_status = pdo_query_one($sql)['bil_status'];

    // Kiểm tra nếu trạng thái mới có thể cập nhật được (chỉ cho phép cập nhật xuôi)
    if (($current_status == 0 && $new_status == 1) || 
        ($current_status == 1 && ($new_status == 2 || $new_status == 3)) || 
        ($current_status == 2 && $new_status == 2) || 
        ($current_status == 3 && $new_status == 3)) {

        // Chuẩn bị câu lệnh SQL với placeholders để tránh SQL Injection
        $sql = "UPDATE bill SET bil_status = $new_status WHERE id = $id"; 

        // Sử dụng pdo_execute để thực thi câu lệnh SQL
        if (pdo_execute($sql)) {
            echo "Cập nhật trạng thái đơn hàng thành công!";
        } else {
            echo "Có lỗi xảy ra khi cập nhật trạng thái.";
        }
    } else {
        echo "Không thể cập nhật trạng thái ngược lại!";
    }
}
function loadall_cart_admin($page, $soluongsp, $kyw, $from_date, $to_date) {
    if (($page == "") || ($page == 0)) $page = 1;
    $batdau = ($page - 1) * $soluongsp;

    // Khởi tạo SQL gốc với alias
    $sql = "SELECT 
    idpro,
    name,
    img,
    price,
    SUM(soluong) AS total_quantity,
    SUM(thanhtien) AS total_profit
FROM cart
LEFT JOIN bill b ON b.id = cart.idbill"; // LEFT JOIN với bảng bill

// Nếu có từ khóa tìm kiếm, thêm điều kiện WHERE
if (!empty($kyw)) {
$kyw = trim($kyw);
if ($kyw != "") {
$sql .= " WHERE name LIKE '%$kyw%'";
}
}

// Nếu có từ ngày và đến ngày, thêm điều kiện lọc theo ngày đặt hàng
if ($from_date != "" && $to_date != "") {
$sql .= " AND b.ngaydathang BETWEEN '$from_date' AND '$to_date'"; // Sử dụng bảng bill
}

// Tiếp tục nhóm và phân trang
$sql .= " GROUP BY idpro, name, img, price
  ORDER BY total_quantity DESC
  LIMIT $batdau, $soluongsp";

return pdo_query($sql);

}


function load_bill_by_product($idpro) {
    $sql = "SELECT 
                b.id AS idbill,
                b.ngaydathang,
                c.soluong,
                c.thanhtien,
                b.bil_status
            FROM cart c
            JOIN bill b ON c.idbill = b.id
            WHERE c.idpro = ?
            ORDER BY b.ngaydathang DESC";

    return pdo_query($sql, $idpro);
}

function loadone_product($id) {
    $sql = "SELECT * FROM sanpham WHERE id = ?";
    return pdo_query_one($sql, $id);
}


function top5khachhang($from_date = null, $to_date = null) {
    $sql = "
        SELECT 
            bill_name,
            SUM(CASE WHEN bil_status = '2' THEN total ELSE 0 END) AS total_spent, 
            COUNT(CASE WHEN bil_status = '2' THEN 1 END) AS total_orders
        FROM bill
    ";

    // Nếu có lọc theo thời gian, thêm điều kiện
    if ($from_date && $to_date) {
        $sql .= " WHERE ngaydathang BETWEEN ? AND ?";
    } else {
        $sql .= " WHERE 1"; // thêm WHERE 1 để có thể nối điều kiện sau dễ dàng
    }

    // Tiến hành nhóm theo bill_name và sắp xếp theo tổng tiền mua
    $sql .= "
        GROUP BY bill_name
        ORDER BY total_spent DESC
        LIMIT 5
    ";

    // Trả về kết quả
    if ($from_date && $to_date) {
        return pdo_query($sql, $from_date, $to_date);
    } else {
        return pdo_query($sql);
    }
}


function hien_thi_so_trang_admin($listsanpham, $soluongsp) {
    $tongsanpham = count($listsanpham);
    // Tính số trang dựa trên tổng số sản phẩm và số lượng sản phẩm trên mỗi trang
    $sotrang = ceil($tongsanpham / $soluongsp);
    $html_sotrang = "";
    
    // Hiển thị liên kết trang
    for ($i = 1; $i <= $sotrang; $i++) {
        $html_sotrang .= '<a href="index.php?act=qldh&page=' . $i . '">' . $i . '</a> ';
    }

    return $html_sotrang;
}

function all_bill($kyw, $from_date, $to_date) {
    $sql = "SELECT * FROM bill WHERE 1"; // Bắt đầu với điều kiện '1' để dễ dàng thêm các điều kiện khác
    if (!empty($kyw)) {
        $kyw = trim($kyw);
        $sql .= " AND bill_name LIKE '%$kyw%'"; // Lọc theo tên sản phẩm, thay vì WHERE sử dụng AND
    }

    // Nếu có khoảng thời gian, thêm điều kiện ngày tháng vào
    if ($from_date != "" && $to_date != "") {
        $sql .= " AND(ngaydathang) BETWEEN '$from_date' AND '$to_date'"; // Sử dụng DATE() để loại bỏ giờ phút giây
    }

    $listbill = pdo_query($sql);
    return $listbill;
}


function load_bill_dh_admin($bill_name, $from_date = null, $to_date = null) {
    $sql = "
        SELECT 
            b.id, 
            b.ngaydathang, 
            SUM(c.soluong) AS soluong,    
            SUM(c.thanhtien) AS thanhtien, 
            b.bil_status
        FROM bill b
        INNER JOIN cart c ON b.id = c.idbill
        WHERE b.bill_name = ? 
          AND b.bil_status = '2'
    ";

    if ($from_date && $to_date) {
        $sql .= " AND b.ngaydathang BETWEEN ? AND ?";
    }

    $sql .= "
        GROUP BY b.id, b.ngaydathang, b.bil_status
        ORDER BY b.ngaydathang DESC
    ";

    if ($from_date && $to_date) {
        return pdo_query($sql, $bill_name, $from_date, $to_date);
    } else {
        return pdo_query($sql, $bill_name);
    }
}









?>