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
                    <h1>Tạo tài khoản khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/admin/qlkhach">Quản lý khách hàng</a></li>
                        <li class="breadcrumb-item active">Tạo tài khoản khách hàng</li>
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
                            <h3 class="card-title">Tạo tài khoản khách hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <?= form_open_multipart('/admin/qlkhach/add') ?>                               
                          
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input type="text" name="tenkhach" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="sodt" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control">
                                </div>

                                <div class="form-group">
                                     <label>Mật Khẩu</label>
                                    <input type="password" name="matkhau" class="form-control" />
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Lưu Khách Hàng</button>
                                </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">#</th>
                                        <th>Họ tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Mật khẩu</th>
                                        <th>Ngày tạo</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($customer as $key => $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['name'] ?> </td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['address'] ?></td>
                                            <td><?= $value['phone'] ?></td>
                                            <td><?= $value['password'] ?></td>
                                            <td><?= $value['created'] ?></td>
                                          
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