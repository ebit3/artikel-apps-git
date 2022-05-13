<?php

ob_start();

require_once 'layouts/header.php';

if (isset($_POST['submit'])) {

    if (add_artikel($_POST)) {

        return true;
    } else {

        return false;
    }
}

$row = show_kategori("SELECT * FROM tb_kategori");

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

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <select name="kategori" id="" class="form-control">
                                        <option selected>----Pilih----</option>
                                        <?php foreach ($row as $data) : ?>
                                            <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Artikel</label>
                                    <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Enter judul">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Isi Artikel</label>
                                    <textarea id="summernote" name="isi">
                                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                            </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub-Image</label>
                                    <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Enter gambar">
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