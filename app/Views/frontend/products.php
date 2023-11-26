<?php
echo view('frontend/templates/header.php');
?>



<!-- Start Content -->
<div class="container py-5">
  <div class="row">

    <div class="col-lg-3">
      <h1 class="h2 pb-4">Categories</h1>
      <ul class="list-unstyled templatemo-accordion">
        <li class="pb-3">
          <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
            Gender
            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
          </a>
          <ul class="collapse show list-unstyled pl-3">
            <li><a class="text-decoration-none" href="#">Bánh</a></li>
            <li><a class="text-decoration-none" href="#">Thức uống</a></li>
          </ul>
        </li>
        <li class="pb-3">
          <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
            Sale
            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
          </a>
          <ul id="collapseTwo" class="collapse list-unstyled pl-3">
            <li><a class="text-decoration-none" href="#">Sport</a></li>
            <li><a class="text-decoration-none" href="#">Luxury</a></li>
          </ul>
        </li>
        <li class="pb-3">
          <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
            Product
            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
          </a>
          <ul id="collapseThree" class="collapse list-unstyled pl-3">
            <li><a class="text-decoration-none" href="#">Bag</a></li>
            <li><a class="text-decoration-none" href="#">Sweather</a></li>
            <li><a class="text-decoration-none" href="#">Sunglass</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="col-lg-9">
      <div class="row">
        <div class="col-md-6">
          <ul class="list-inline shop-top-menu pb-3 pt-1">
            <li class="list-inline-item">
              <a class="h3 text-dark text-decoration-none mr-3" href="#">Sản phẩm mới nhất</a>
            </li>
          </ul>
        </div>
        <div class="col-md-6 pb-4">
          <div class="d-flex">
            <select class="form-control">
              <option>Featured</option>
              <option>A to Z</option>
              <option>Item</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row" id="id_product">

        <?php
        foreach ($products as $key => $value) : ?>

          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="<?= base_url() ?>/uploads/images/<?= $value['image_link']; ?>">
                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                  <ul class="list-unstyled">
                    <li><a class="btn btn-success text-white mt-2" href="<?= base_url() ?>/product/detail/<?= $value['id']; ?>"><i class="far fa-eye"></i></a></li>
                    <li><a class="btn btn-success text-white mt-2" href="<?= base_url() ?>/cart/<?= $value['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <a href="<?= base_url() ?>/product/detail/<?= $value['id']; ?>" class="h3 text-decoration-none"><?= $value['name']; ?></a>
                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                  <li>M/L/X/XL</li>
                  <li class="pt-2">
                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                  </li>
                </ul>
                <ul class="list-unstyled d-flex justify-content-center mb-1">
                  <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-muted fa fa-star"></i>
                    <i class="text-muted fa fa-star"></i>
                  </li>
                </ul>
                <p class="text-center mb-0"><?= $value['price']; ?></p>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>

      <!-- <div div="row">
        <ul class="pagination pagination-lg justify-content-end">
          
        </ul>
      </div> -->

      <div div="row">
        <div><input type="hidden" name="page" id="page" value="1" /></div>
        <button id="btnShowProduct" class="btn btn-primary" onclick="getPaging()">Xem thêm</button>
      </div>
    </div>
  </div>
</div>
<!-- End Content -->


<?php
echo view('frontend/templates/scripts.php');
?>

<script>
  function getPaging() {
    var url_img = "<?= base_url() ?>/uploads/images/";
    var page = $("#page").val();
    page = parseInt(page) + 1;
    var url = "products/ajaxpaging/" + page; //products/ajaxpaging/2
    $.get(url, function(data, status) {
      var html_product = "";

      if (data != null && status == "success") {
        var result_data = JSON.parse(JSON.stringify(data));
        result_data["products"].forEach((item) => {

          html_product += '<div class="col-md-4">';
          html_product += '<div class="card mb-4 product-wap rounded-0">';
          html_product += '<div class="card rounded-0">';
          html_product += '    <img class="card-img rounded-0 img-fluid" src="' + url_img + item.image_link + '">';
          html_product += '    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">';
          html_product += '      <ul class="list-unstyled">';
          html_product += '        <li><a class="btn btn-success text-white mt-2" href="<?= base_url() ?>/product/detail/' + item.id + '"><i class="far fa-eye"></i></a></li>';
          html_product += '        <li><a class="btn btn-success text-white mt-2" href="<?= base_url() ?>/cart/' + item.id + '"><i class="fas fa-cart-plus"></i></a></li>';
          html_product += '      </ul>';
          html_product += '    </div>';
          html_product += '  </div>';
          html_product += '  <div class="card-body">';
          html_product += '    <a href="<?= base_url() ?>/product/detail/' + item.id + '" class="h3 text-decoration-none">' + item.name + '</a>';
          html_product += '    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">';
          html_product += '      <li>M/L/X/XL</li>';
          html_product += '      <li class="pt-2">';
          html_product += '        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>';
          html_product += '        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>';
          html_product += '        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>';
          html_product += '        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>';
          html_product += '        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>';
          html_product += '      </li>';
          html_product += '    </ul>';
          html_product += '    <ul class="list-unstyled d-flex justify-content-center mb-1">';
          html_product += '      <li>';
          html_product += '        <i class="text-warning fa fa-star"></i>';
          html_product += '        <i class="text-warning fa fa-star"></i>';
          html_product += '        <i class="text-warning fa fa-star"></i>';
          html_product += '        <i class="text-muted fa fa-star"></i>';
          html_product += '        <i class="text-muted fa fa-star"></i>';
          html_product += '      </li>';
          html_product += '    </ul>';
          html_product += '    <p class="text-center mb-0">' + item.price + '</p>';
          html_product += '  </div>';
          html_product += '</div>';
          html_product += '</div>';


        });
        if (result_data["total_pages"] >= page) {
          $("#page").val(page);
          if (result_data["total_pages"] == page) {
            //$("#btnShowProduct").prop('disabled', true);
            $("#btnShowProduct").hide();
          }

        }

        $("#id_product").append(html_product);

      }

    });
  }
</script>


<?php
echo view('frontend/templates/footer.php');
?>