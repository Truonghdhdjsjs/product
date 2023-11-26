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
                    <h1>Cập nhật tài khoản khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/admin/qlkhach">Quản lý khách hàng</a></li>
                        <li class="breadcrumb-item active">Cập nhật tài khoản khách hàng</li>
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
                            <h3 class="card-title">Cập nhật tài khoản khách hàng</h3>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <?= form_open_multipart('/admin/qlkhach/update') ?>                               
                          
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$customer["id"]? $customer["id"]:""?>"/>			
                                    <label>Tên</label>
                                    <input type="text" name="tenkhach" value="<?=$customer["name"]? $customer["name"]:""?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?=$customer["email"]? $customer["email"]:""?>">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="sodt" class="form-control"  value="<?=$customer["phone"]? $customer["phone"]:""?>">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control"  value="<?=$customer["address"]? $customer["address"]:""?>">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" name="matkhau" class="form-control"  value="<?=$customer["password"]? $customer["password"]:""?>">
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