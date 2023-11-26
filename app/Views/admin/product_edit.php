<?php
echo view('admin/templates/header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/admin/ql_product">Quản lý sản phẩm</a></li>
                        <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <?php //foreach ($errors as $error) : 
                                ?>
                                <!-- <li>  esc($error)  </li> -->
                                <?php //endforeach 
                                ?> 
                                <?= form_open_multipart('/admin/qlproduct/update') ?>
                                <div class="form-group">
                                    <label>Danh mục sản phẩm</label>
                                    <!-- <input type="text" name="dm_sp" class="form-control"> -->
                                    <select name="dm_sp" id="dm_sp">
                                        <option value="0" >Chọn DM sản phẩm</option>
                                        <?php 
                                            foreach ($dm_sp as $key =>$item_dm):                                                
                                        ?>
                                            <option value="<?=$item_dm['id']?>" <?=$product_obj["catalog_id"] == $item_dm['id']? 'selected' :''?>><?=$item_dm['name']?></option>
                                        <?php
                                            endforeach;
                                         ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$product_obj["id"]? $product_obj["id"]:""?>"/>			
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="tensp" value="<?=$product_obj["name"]? $product_obj["name"]:""?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="text" name="gia" class="form-control" value="<?=$product_obj["price"]? number_format($product_obj["price"], 0, ",", ""):""?>">
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input type="text" name="giamgia" class="form-control"  value="<?=$product_obj["discount"]? $product_obj["discount"]:""?>">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="userfile" size="20" />
                                </div>

                                <div class="form-group">
                                    <label>Đường dẫn File hình</label>
                                    <input type="text" name="link" class="form-control"  value="<?=$product_obj["image_link"]? $product_obj["image_link"]:""?>">
                                    <img src="<?=base_url()?>/uploads/images/<?=$product_obj["image_link"]? $product_obj["image_link"]:""?>" alt="">
                                </div>

                                <div class="form-group">
                                    <textarea id="noidung" name="noidung"><?=$product_obj["content"]? $product_obj["content"]:""?></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </section>


</div>

<?php
echo view('admin/templates/scripts.php');
?>

<script>
 
</script>

<?php
echo view('admin/templates/footer.php');
?>