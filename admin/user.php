<?php

ob_start();

require_once 'layouts/header.php';

$data =  show_user("SELECT * FROM tb_user");

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengguna</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- response -->
    <?php if (isset($_SESSION['status']) === true) : ?>
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= @$_SESSION['add_user'] ?>
                    <?= @$_SESSION['drop_user'] ?>
                    <?= @$_SESSION['edit_user'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php

    endif;

    unset($_SESSION['status']);
    unset($_SESSION['add_user']);
    unset($_SESSION['drop_user']);
    unset($_SESSION['edit_user']);

    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="user_tambah.php" class="btn btn-primary">
                                    <i class="fas fa-plus nav-icon"></i>
                                    Tambah Data Pengguna
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($data as $no => $rows) : ?>

                                        <tr>
                                            <td><?= $no + 1 ?></td>
                                            <td><?= $rows['nama'] ?></td>
                                            <td><?= $rows['username'] ?></td>
                                            <td><?= $rows['role'] ?></td>
                                            <td>
                                                <a href="user_edit.php?id=<?= $rows['id_user'] ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit nav-icon"></i>
                                                </a>
                                                <a href="user_hapus.php?id=<?= $rows['id_user'] ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash nav-icon"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require_once 'layouts/footer.php'; ?>