<?php

ob_start();

require_once 'layouts/header.php';

if (isset($_POST['submit'])) {

    if (add_user($_POST)) {

        return true;
    } else {

        return false;
    }
}

?>

<!-- end control -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pengguna</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username Pengguna</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password Pengguna</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Role Pengguna</label>
                                            <select name="role" id="" class="form-control">
                                                <option selected>--Pilih Role Anda--</option>
                                                <option value="admin">Admin</option>
                                                <option value="publisher">Publisher</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <a href="user.php" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php require_once 'layouts/footer.php' ?>