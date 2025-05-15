<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Trang chủ</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<div class="container my-5">
    <h1 class="text-center mb-5"><b>Sản phẩm mới</b></h1>
    
    <div class="row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;">
        <?php 
        foreach($spnew as $sp){
            extract($sp);
            if ($status == 1) {  
            $hinh = $img_path.$img;
            echo  '
<div style="background-color: white; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 12px; overflow: hidden; 
            transition: transform 0.3s; text-align: center; padding: 16px; height: 360px;
            display: flex; flex-direction: column; justify-content: space-between;">
    
   <a href="index.php?act=sanphamct&idsp='.$id.'">
  <img src="'.$hinh.'" style="width: 100%; height: auto; max-height: 100%; object-fit: cover; border-radius: 10px;" alt="'.$name.'"/>
</a>


    <div style="padding: 16px;">
        <h3 style="font-size: 16px; font-weight: bold; color: #000; margin-bottom: 8px;">
            <a href="index.php?act=sanphamct&idsp='.$id.'" style="color: #000; text-decoration: none;" 
                onmouseover="this.style.color=\'#b0b435\'" 
                onmouseout="this.style.color=\'#000\'">'.$name.'</a>
        </h3>
        <h5 style="font-size: 18px; font-weight: bold; color: #b0b435;">'.number_format($price, 3, '.', '').' VNĐ</h5> 
        
    </div>
</div>';
            }
        }
        ?>
    </div>
</div>


<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Blog</h1>
                    <p>Kinh Nghiệm, Trải Nghiệm, Kiến Thức.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/blog-img.jpg" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Lợi ích của việc ăn rau củ tươi mỗi ngày</h3>
                            <p>
                                "Rau củ tươi là nguồn dinh dưỡng tuyệt vời cung cấp chất xơ,
                                vitamin và khoáng chất thiết yếu cho cơ thể. Khám phá những
                                lợi ích tuyệt vời từ việc bổ sung rau củ tươi vào chế độ ăn
                                hàng ngày để có một cuộc sống khỏe mạnh và tràn đầy năng
                                lượng."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/blog-img-01.jpg" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Rau củ theo mùa và lợi ích của việc ăn theo mùa</h3>
                            <p>
                                "Ăn rau củ theo mùa không chỉ giúp đảm bảo hương vị tuyệt
                                vời mà còn mang lại nhiều lợi ích cho sức khỏe. Cùng khám
                                phá các loại rau củ theo từng mùa và cách tận dụng chúng để
                                có bữa ăn đa dạng, phong phú."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/blog-img-02.jpg" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Cách chọn rau củ tươi và bảo quản đúng cách</h3>
                            <p>
                                "Việc chọn và bảo quản rau củ đúng cách giúp giữ nguyên
                                hương vị và chất lượng của sản phẩm. Hãy tham khảo những mẹo
                                chọn rau củ tươi ngon và cách bảo quản tại nhà để đảm bảo
                                mỗi bữa ăn đều đầy đủ dinh dưỡng và tươi mới."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog  -->
