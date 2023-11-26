<?php
echo view('frontend/templates/header.php');
?>


<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?= base_url() ?>/uploads/images/<?= $product['image_link'] ?>" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <?php
                                    $arr_images = explode(",", $product['image_list']);
                                    for ($i = 0; $i < count($arr_images); $i++) {

                                        echo '<div class="col-4">';
                                        echo '<a href="#">';
                                        echo '<img class="card-img img-fluid" src="' . base_url() . '/uploads/images/' . $arr_images[$i] . '" alt="hinh ' . $i . '">';
                                        echo '</a>';
                                        echo '</div>';
                                    } ?>

                                </div>
                            </div>
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Kế tiếp</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $product['name'] ?></h1>
                        <p class="h3 py-2"><?= number_format($product['price']) ?></p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Thương hiệu:</h6>
                            </li>
                            <!--<li class="list-inline-item">
                                <p class="text-muted"><strong>Easy Wear</strong></p>
                            </li>-->
                        </ul>

                        <h6>Mô tả:</h6>
                        <p>
                            <?= $product['content'] ?>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Màu sắc:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul>

                        <h6>Quy cách </h6>
                        <ul class="list-unstyled pb-3">
                            <li>Thành phần</li>
                            <li>Hạn sử dụng</li>
                            <li>hướng dẫn sử dụng </li>
                          <!--  <li>Duis aute irure</li>
                            <li>Ut enim ad minim</li>
                            <li>Dolore magna aliqua</li>
                            <li>Excepteur sint</li>-->
                        </ul>

                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">kích cỡ :
                                            <input type="hidden" name="product-size" id="product-size" value="S">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">Nhỏ</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">Vừa</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">Lớn</span></li>
                                        <!--<li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>-->
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a href="<?= base_url() ?>/cart/<?= $product['id'] ?>" class="btn btn-success btn-lg">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<?php
echo view('frontend/templates/scripts.php');
?>

<?php
echo view('frontend/templates/footer.php');
?>