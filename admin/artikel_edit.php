<?php

ob_start();

require_once 'layouts/header.php';

$id_artikel = $_GET['id'];

$row = show_kategori("SELECT * FROM tb_kategori");

$rows = show_edit_artikel("SELECT * FROM tb_artikel WHERE id_artikel = '" . $id_artikel . "' ");

if (isset($_POST['submit'])) {

    if (edit_artikel($_POST)) {

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
                        <form id="quickForm" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="text" name="artikel_id" id="" value="<?= $rows['id_artikel'] ?>">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <select name="kategori" id="" class="form-control">
                                        <option selected><?= $rows['kategori'] ?></option>
                                        <?php foreach ($row as $data) : ?>
                                            <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Artikel</label>
                                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Enter judul" value="<?= $rows['judul'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Isi Artikel</label>
                                    <textarea id="summernote" name="isi">
                                        <?= $rows['isi'] ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Publisher</label>
                                    <input type="text" name="publish" id="publish" class="form-control" value="<?= $_SESSION['profile']['nama'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub-Image</label>
                                    <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Enter gambar">
                                    <input type="hidden" name="gambar_lama" class="form-control" id="exampleInputEmail1" placeholder="Enter gambar" value="<?= $rows['gambar'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Artikel</label>
                                    <select name="status" class="form-control" id="">
                                        <option selected><?= $rows['status'] ?></option>
                                        <option value="revisi">revisi</option>
                                        <option value="publish">publish</option>
                                    </select>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <a href="artikel.php" class="btn btn-danger">Kembali</a>
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