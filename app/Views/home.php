<?php
echo view('templates/header.php');
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
                                        <th style="width: 40px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>SamSung Note 1</td>
                                        <td>150000</td>
                                        <td>5</td>
                                        <td>Điện thoại</td>     
                                        <td>50</td>                                    
                                        <td><span class="badge bg-danger"><a hef="/delsp">Xóa</a>/<a href="/editsp">Cập nhật</a></span></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>SamSung Note 2</td>
                                        <td>250000</td>
                                        <td>5</td>
                                        <td>Điện thoại</td>   
                                        <td>56</td>                                      
                                        <td><span class="badge bg-danger"><a hef="/delsp">Xóa</a>/<a href="/editsp">Cập nhật</a></span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>SamSung Note 3</td>
                                        <td>350000</td>
                                        <td>5</td>
                                        <td>Điện thoại</td>
                                        <td>60</td>                                         
                                        <td><span class="badge bg-danger"><a hef="/delsp">Xóa</a>/<a href="/editsp">Cập nhật</a></span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>SamSung Note 4</td>
                                        <td>450000</td>
                                        <td>5</td>
                                        <td>Điện thoại</td>
                                        <td>55</td>                                         
                                        <td><span class="badge bg-danger"><a hef="/delsp">Xóa</a>/<a href="/editsp">Cập nhật</a></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>


</div>

<?php
echo view('templates/scripts.php');
?>

<script type="javascript">

</script>

<?php
echo view('templates/footer.php');
?>