<?php
echo view('frontend/templates/header.php');
?>


<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="frontend/resources/assets/img/1448399746-removebg-preview.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Hamburger</b> </h1>
                               
                                <p>
                                Hamburger à một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa.
                                Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc "nước xốt đặc biệt"  
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="frontend/resources/assets/img/OIP-removebg-preview.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Món ăn bán chạy nhất trong ngày hôm nay</h1>
                                <h3 class="h2">Bánh sừng bò</h3>
                                <p>
                                Bánh sừng bò còn được gọi là bánh croa-xăng (từ tiếng Pháp croissant), có nguồn gốc từ Áo, là một dạng bánh ăn sáng làm từ pâte feuilletée (bột xốp), được sản xuất từ bột mì, men, bơ, sữa, và muối.
                                Bánh croissant đúng kiểu phải thật xốp, giòn và có thể xé ra từng lớp mỏng nhỏ. Bên trong ruột không được đặc, ngược lại phải khá ruỗng thoáng (đó là bằng chứng men làm bột phát triển tốt).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="frontend/resources/assets/img/OIP-removebg-preview (1).png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Nước uống bán chạy</h1>
                                <h3 class="h2">Ponche Navideño (Mexico) </h3>
                                <p>
                                Nếu bạn có kế hoạch nghỉ Giáng sinh ở Mexico, thì đừng bỏ qua cơ hội thưởng thức một ly Ponche Navideño nóng, thường được bán tại các nhà hàng, quán bar bên đường. Ponche Navideño là sự kết hợp của mía, táo, lê, hay cam, quýt, nho khô, mận khô và tejocote (một loại quả bản địa thường được người Aztec tại Mexico sử dụng). Đối với người lớn, người ta sẽ trộn thêm rượu tequila, brandy hay rum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Các sản phẩm có trong tháng </h1>
                <p>
                    Đây là những sản phẩm đang bán và những sản phẩm sẽ được bán trong thời gian tới đây 
                    Kính mong quý khách sẽ đón nhận nhiều tích cự từ những sản phẩm của của hàng TS5
                </p>
            </div>
        </div>
        <div class="row">
        <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="frontend/resources/assets/img/banhflan2-removebg-preview.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Bánh flan</h5>
                <p class="text-center"><a class="btn btn-success">xem</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="frontend/resources/assets/img/2ecc4c7889b709e6e8a50dd2146e924d--asian-foods-asian-recipes-removebg-preview.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Bánh nướng</h5>
                <p class="text-center"><a class="btn btn-success">xem</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="frontend/resources/assets/img/OIP-removebg-preview.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Bánh sừng bò</h5>
                <p class="text-center"><a class="btn btn-success">xem</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="frontend/resources/assets/img/cafe-Bac-Xiu-removebg-preview.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Caffe bạc xĩu</h5>
                <p class="text-center"><a class="btn btn-success">xem</a></p>
            </div>
            
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="frontend/resources/assets/img/R-removebg-preview.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">sách</h2>
                <p class="text-center"><a class="btn btn-success">xem</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="frontend/resources/assets/img/1448399746-removebg-preview.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Hamburger</h2>
                <p class="text-center"><a class="btn btn-success">xem</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1"> Lời bình luận</h1>
                    <p>
                        Đây là nơi đưa ra những ý kiến về thái độ phục vụ, độ hài lòng ."Nghiêm cấm những hành vi xúc phạm trên không gian mạng" .
                        Xin cảm ơn
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="frontend/resources/assets/img/shop_01.jpg" class="card-img-top" alt="..." width="379px" height="307px">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                               
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Trịnh Xuân Thanh</a>
                            <p class="card-text">
                                Rất hài lòng về quán và rất muốn quay lại trong thời gian sắp tới
                            </p>
                            <p class="text-muted">Xem thêm (24)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="frontend/resources/assets/img/shop_01.jpg" class="card-img-top" alt="..." width="379px" height="307px">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Nguyễn Thu Hà</a>
                            <p class="card-text">
                               Không gian quán rất mát rất thích hợp để nghỉ ngơi và cho những đứa trẻ chơi đùa . Rất mong quá có thêm nhiều chương trình cho người tiêu dùng
                            </p>
                            <p class="text-muted">Xem thêm (48)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="frontend/resources/assets/img/shop_07.jpg" class="card-img-top" alt="..." width="379px" height="307px">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Hoàng Xuân Đông </a>
                            <p class="card-text">
                                Nhân viên rất dễ thương .Luôn quan tâm đến  người dùng 
                            </p>
                            <p class="text-muted">Xem thêm (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->




<?php
echo view('frontend/templates/scripts.php');
?>

<script type="javascript">

</script>

<?php
echo view('frontend/templates/footer.php');
?>