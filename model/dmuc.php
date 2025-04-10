<?php
    function insert_danhmuc($tenloai){
        $sql = "INSERT INTO danhmuc(name) VALUES('$tenloai')";
        pdo_execute($sql); 
    }
    function delete_danhmuc($id){
        $sql = "DELETE FROM danhmuc WHERE id='$id'"; // Xóa loại sản phẩm khỏi CSDL
        pdo_execute($sql); // Thực thi câu lệnh SQL
    }
    function loadall_danhmuc(){
        $sql = "SELECT * FROM danhmuc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc; 
    }
    function loadone_danhmuc($id){
        $sql = "select * from danhmuc where id=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id,$tenloai){
        $sql = "UPDATE danhmuc SET name='$tenloai' WHERE id='$id'"; 
        $dm = pdo_execute($sql);
        
    }







?>