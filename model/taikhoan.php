<?php 

function insert_taikhoan($email,$user,$pass,$address,$tel){
    $sql = "INSERT INTO nguoidung(email ,user ,pass ,address ,tel) VALUES('$email','$user','$pass','$address','$tel')";
    pdo_execute($sql); 
}
function checkuser($user, $pass) {
    $sql = "SELECT * FROM nguoidung WHERE user='" . $user . "' AND pass='" . $pass . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function checkemail($email) {
    $sql = "SELECT * FROM nguoidung WHERE email='" . $email . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function update_taikhoan($id, $user, $pass, $email, $address, $tel) {
    // Đảm bảo có dấu phẩy giữa các trường và giá trị
    $sql = "UPDATE nguoidung SET 
                user = '".$user."', 
                pass = '".$pass."', 
                email = '".$email."', 
                address = '".$address."', 
                tel = '".$tel."' 
            WHERE id = ".$id; 

    // Thực thi câu lệnh SQL
    $tk = pdo_execute($sql);
}
function update_taikhoan_admin($id, $user, $pass, $email, $address, $tel,$role) {
    // Đảm bảo có dấu phẩy giữa các trường và giá trị
    $sql = "UPDATE nguoidung SET 
                user = '".$user."', 
                pass = '".$pass."', 
                email = '".$email."', 
                address = '".$address."', 
                tel = '".$tel."',
                role = '".$role."' 
            WHERE id = ".$id; 

    // Thực thi câu lệnh SQL
    $tk = pdo_execute($sql);
}
function loadall_taikhoan($kyw, $trangthai,$page,$soluongkh) {
    if(($page == "") || ($page == 0)) $page = 1;
    $batdau = ($page-1) * $soluongkh;
    $sql = "SELECT * FROM nguoidung WHERE 1";

    $kyw = trim($kyw);
    if ($kyw != "") {
        $sql .= " AND (user LIKE '%$kyw%' OR address LIKE '%$kyw%' OR email LIKE '%$kyw%')";
    }

    // Tìm kiếm theo trạng thái kể cả khi giá trị là "0"
    if ($trangthai !== null && $trangthai !== "") {
        $sql .= " AND trangthai = '$trangthai'";
    }
    $sql .= " Limit ".$batdau.",".$soluongkh;
   
    return pdo_query($sql);
}

function all_khachhang($kyw, $trangthai){
    $sql = "SELECT * FROM nguoidung WHERE 1";

    $kyw = trim($kyw);
    if ($kyw != "") {
        $sql .= " AND (user LIKE '%$kyw%' OR address LIKE '%$kyw%' OR email LIKE '%$kyw%')";
    }

    // Tìm kiếm theo trạng thái kể cả khi giá trị là "0"
    if ($trangthai !== null && $trangthai !== "") {
        $sql .= " AND trangthai = '$trangthai'";
    }

    $sql .= " ORDER BY id DESC";
    return pdo_query($sql);
}
function hien_thi_so_trang_tai_khoan($listkhachhang,$soluongkh){
    $tongkhachhang = count($listkhachhang);
    $sotrang = ceil($tongkhachhang/$soluongkh);
    $html_sotrang = "";
    for ($i=1;$i<=$sotrang;$i++){
        $html_sotrang .= '<a href ="index.php?act=qlkh&page='.$i.'">'.$i.'</a>';
    }
    return $html_sotrang;
}


function update_trangthai_taikhoan($id, $trangthai) {
    $sql = "UPDATE nguoidung SET trangthai = $trangthai WHERE id = $id";
    pdo_execute($sql);
}
function check_login($user, $pass) {
    $sql = "SELECT * FROM nguoidung WHERE user = ? AND pass = ?"; // Không kiểm tra trạng thái ở đây
    $result = pdo_query_one($sql, $user, $pass);
    
    if ($result) {
        // Kiểm tra trạng thái tài khoản
        if ($result['trangthai'] == 0) {
            return "locked"; // Tài khoản bị khóa
        }
        return $result; // Tài khoản hợp lệ
    }
    return null; // Sai tài khoản hoặc mật khẩu
}
function loadone_taikhoan($id){
    $sql = "select * from nguoidung where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}

?>