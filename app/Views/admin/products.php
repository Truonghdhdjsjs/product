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
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quản lý sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>%Giảm giá</th>
                                        <th>Phân loại</th>
                                        <th>Số lượng tồn</th>
                                        <th>Ngày tạo</th>
                                        <th style="width: 150px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($products as $key => $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['name'] ?> </td>
                                            <td><?= number_format($value['price']) ?></td>
                                            <td><?= $value['discount'] ?></td>
                                            <td><?= $value['dm_name'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><span class="badge bg-danger"><a onclick="confirmAction(event);" href="/admin/product/delete/<?= $value['id'] ?>">Xóa</a></span> | <span class="badge bg-danger"><a href="/admin/product/update/<?= $value['id'] ?>">Cập nhật</a></span></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div> -->
                    </div>

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
                            <h3 class="card-title">Thêm sản phẩm mới</h3>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <?php //foreach ($errors as $error) : 
                                ?>
                                <!-- <li>  esc($error)  </li> -->
                                <?php //endforeach 
                                ?>
                                <!-- 	<form method="post" id="add_create" name="add_create" 
		action=" //site_url('/submit-form') ?>"> -->
                                <?= form_open_multipart('/submit-form') ?>                               
                                <div class="form-group">
                                    <label>Danh mục sản phẩm</label>
                                    <input type="text" name="tensp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="tensp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="text" name="gia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input type="text" name="giamgia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="userfile" size="20" />
                                </div>

                                <div class="form-group">
                                    <label>Đường dẫn File hình</label>
                                    <input type="text" name="link" class="form-control">
                                </div>

                                <div class="form-group">
                                    <textarea id="noidung" name="noidung"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Lưu sản phẩm</button>
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
    function confirmAction(e) {
        let confirmAction = confirm("Bạn có chắc là muốn xóa không ?");
        if (confirmAction) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    }
</script>

<?php
echo view('admin/templates/footer.php');
?>