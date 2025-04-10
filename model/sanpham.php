<?php
    function insert_sanpham($tensp,$giasp,$filename,$mota,$soluong,$iddm){
        $sql = "INSERT INTO sanpham(name ,price ,img ,mota ,soluong ,iddm) VALUES('$tensp','$giasp','$filename','$mota','$soluong','$iddm')";
        pdo_execute($sql); 
    }
    function delete_sanpham($id) {
        // Kiểm tra sản phẩm đã bán chưa
        $sql_check = "SELECT COUNT(*) FROM cart WHERE idpro = ?";
        $result = pdo_query_value($sql_check, $id);
    
        if ($result > 0) {
            // Sản phẩm đã được bán, chỉ ẩn sản phẩm (cập nhật trạng thái thành 0)
            $sql_update = "UPDATE sanpham SET status = 0 WHERE id = ?";
            pdo_execute($sql_update, $id);
        } else {
            // Sản phẩm chưa bán, thực hiện xóa sản phẩm hoàn toàn
            $sql_delete = "DELETE FROM sanpham WHERE id = ?";
            pdo_execute($sql_delete, $id);
        }
    }
    
    
    
    
    
    
    function hien_thi_so_trang($listsanpham,$soluongsp){
        $tongsanpham = count($listsanpham);
        $sotrang = ceil($tongsanpham/$soluongsp);
        $html_sotrang = "";
        for ($i=1;$i<=$sotrang;$i++){
            $html_sotrang .= '<a href ="index.php?act=listsp&page='.$i.'">'.$i.'</a>';
        }
        return $html_sotrang;
    }
    function hien_thi_so_trang_user($listsanpham,$soluongsp,$kyw,$iddm){
        $tongsanpham = count($listsanpham);
        $sotrang = ceil($tongsanpham/$soluongsp);
        $html_sotrang = "";
        for ($i=1;$i<=$sotrang;$i++){
            $html_sotrang .= '<a href ="index.php?act=sanpham&iddm='.$iddm.'&page='.$i.'">'.$i.'</a>';
        }
        return $html_sotrang;
    }
    function hien_thi_so_trang_timkiem($listsanpham, $soluongsp, $kyw, $iddm, $price_min, $price_max) {
        $tongsanpham = count($listsanpham);
        $sotrang = ceil($tongsanpham / $soluongsp);
        $html_sotrang = "";
    
        // Định dạng giá với dấu chấm (.) thay vì dấu phẩy (,)
        $price_min = number_format($price_min, 3, '.', '');
        $price_max = number_format($price_max, 3, '.', '');
    
        for ($i = 1; $i <= $sotrang; $i++) {
            // Tạo URL với đầy đủ các tham số, bao gồm giá đã được định dạng
            $html_sotrang .= '<a href="index.php?act=timkiem&kyw=' . urlencode($kyw) . 
                             '&iddm=' . $iddm . 
                             '&price-min=' . $price_min . 
                             '&price-max=' . $price_max . 
                             '&page=' . $i . 
                             '" style="margin-right: 5px; padding: 5px 10px; text-decoration: none; background-color: #f0f0f0; border-radius: 5px;">' . $i . '</a>';
        }
    
        return $html_sotrang;
    }
    
    function loadall_sanpham($kyw, $iddm, $page, $soluongsp) {
        if (($page == "") || ($page == 0)) $page = 1;
        $batdau = ($page - 1) * $soluongsp;
        
        // Bắt đầu câu truy vấn SQL
        $sql = "SELECT * FROM sanpham WHERE status = 1"; // Chỉ lấy sản phẩm có status = 1
        $kyw = trim($kyw);
        // Nếu có tìm kiếm theo tên sản phẩm
        if ($kyw != "") {
            $sql .= " AND name LIKE '%" . $kyw . "%'";
        }
        
        // Nếu có lọc theo danh mục sản phẩm
        if ($iddm > 0) {
            $sql .= " AND iddm = '" . $iddm . "'";
        }
    
        // Thêm điều kiện phân trang
        $sql .= " LIMIT " . $batdau . ", " . $soluongsp;
        
        // Thực thi truy vấn và trả về kết quả
        $listsanpham = pdo_query($sql);
        return $listsanpham; 
    }
    
    function loadall_sanpham_timkiem($kyw, $iddm, $price_min, $price_max,$page, $soluongsp){
        if(($page == "") || ($page == 0)) $page = 1;
        $batdau = ($page-1) * $soluongsp;
        $sql = "SELECT * FROM sanpham WHERE status = 1";
        $kyw = trim($kyw);
        if ($kyw != "") {
            $sql .= " AND name LIKE '%".$kyw."%'";
        }
    
        if ($iddm > 0) {
            $sql .= " AND iddm = '".$iddm."'";
        }
    
        if ($price_min > 0) {
            $sql .= " AND price >= ".$price_min;
        }
    
        if ($price_max > 0) {
            $sql .= " AND price <= ".$price_max;
        }
        $sql .= " Limit ".$batdau.",".$soluongsp;
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function all_sanpham($kyw, $iddm,$price_min = 0, $price_max=0){
        $sql = "SELECT * FROM sanpham WHERE status = 1";
        $kyw = trim($kyw);
        if ($kyw != "") {
            $sql .= " AND name LIKE '%".$kyw."%'";
        }
    
        if ($iddm > 0) {
            $sql .= " AND iddm = '".$iddm."'";
        }if ($price_min > 0) {
            $sql .= " AND price >= ".$price_min;
        }
    
        if ($price_max > 0) {
            $sql .= " AND price <= ".$price_max;
        }
    
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    
    
    function loadall_sanpham_trangchu(){
        $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 0, 8";  // Assuming you're ordering by 'id'
        $listsanpham = pdo_query($sql);
        return $listsanpham; 
    }
    
    function loadone_sanpham($id){
        $sql = "select * from sanpham where id=".$id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function load_sanpham_cungloai($id, $iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = ? AND id <> ? LIMIT 3";
        $sp = pdo_query($sql, $iddm, $id);
        return $sp;
    }
    
    
    function load_ten_dm($iddm){
        $sql = "SELECT name FROM danhmuc WHERE id = ".$iddm;
        $dm = pdo_query_one($sql);
        return $dm['name']; // Trả về tên danh mục
    }
    
    function update_sanpham($id, $tensp, $giasp, $hinh, $mota, $soluong, $iddm) {
        if ($hinh != "") {
            // Nếu có hình ảnh mới
            $sql = "UPDATE sanpham 
                    SET name='$tensp', 
                        price='$giasp', 
                        img='$hinh', 
                        mota='$mota', 
                        soluong='$soluong', 
                        iddm='$iddm'  
                    WHERE id='$id'";
        } else {
            // Nếu không có hình ảnh mới, giữ lại giá trị hình ảnh cũ
            $sql = "UPDATE sanpham 
                    SET name='$tensp', 
                        price='$giasp', 
                        mota='$mota', 
                        soluong='$soluong', 
                        iddm='$iddm'  
                    WHERE id='$id'";
        }
    
        // Thực thi câu lệnh SQL
        pdo_execute($sql);
    }
    
    







?>