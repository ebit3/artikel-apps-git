<?php include 'layout/header.php'; ?>

<?php

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 3");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");

if (isset($_POST['cari'])) {

    $data_all = show_artikel("SELECT * FROM tb_artikel  WHERE judul LIKE '%" . $_POST['cari'] . "%'  ");
} else {

    $halaman = 6;

    $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

    $data_all = show_artikel("SELECT * FROM tb_artikel LIMIT $mulai, $halaman");

    $conn = koneksi();

    $query = mysqli_query($conn, "SELECT * FROM tb_artikel");

    $total = mysqli_num_rows($query);

    @$pages = ceil($total / $halaman);
}




?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">

</div>

<section class="blog-posts grid-system mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php foreach ($data_all as $rows) : ?>

                            <div class="col-lg-6 ">
                                <div class="blog-post">
                                    <div class="blog-thumb-dua">
                                        <img src="images/assets/<?= $rows['gambar'] ?>" alt="Gambar error">
                                    </div>
                                    <div class="down-content">
                                        <span><?= $rows['kategori'] ?></span>
                                        <a href="single-post.php?id=<?= $rows['id_artikel'] ?>">
                                            <h4><?= $rows['judul'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a><?= $rows['publisher'] ?></a></li>
                                            <li>
                                                <a>
                                                    <input type="date" name="" id="" value="<?= $rows['tgl_release'] ?>" readonly style="border: none; background: none; color: #aaa;" class="inp">
                                                </a>
                                            </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="col-lg-12 ">
                            <ul class="page-numbers">
                                <?php for ($no = 1; $no <= @$pages; $no++) : ?>

                                    <li><a href="artikel.php?halaman=<?= $no ?>"><?= $no; ?></a></li>

                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="post" action="">

                                    <?php if (isset($_POST['cari'])) { ?>

                                        <input type="text" name="cari" class="searchText" placeholder="type to search..." autocomplete="on" value="<?= $_POST['cari'] ?>">

                                    <?php } else { ?>

                                        <input type="text" name="cari" class="searchText" placeholder="type to search..." autocomplete="on">

                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Artikel Lain</h2>
                                </div>
                                <div class="content">
                                    <ul>

                                        <?php foreach ($data_recent as $rows) : ?>

                                            <li>
                                                <a href="single-post.php?id=<?= $rows['id_artikel'] ?>">
                                                    <h5><?= $rows['judul'] ?></h5>
                                                    <span>
                                                        <input type="date" name="" id="" value="<?= $rows['tgl_release'] ?>" readonly style="border: none; background: none; color: #aaa;" class="inp">
                                                    </span>
                                                </a>
                                            </li>

                                        <?php endforeach ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Categories</h2>
                                </div>
                                <div class="content">
                                    <ul>

                                        <?php foreach ($data_kategori as $rows) : ?>

                                            <li><a href="filter-post.php?categories=<?= $rows['kategori'] ?>">- <?= $rows['kategori'] ?></a></li>

                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds & Languages</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php foreach ($data_kategori as $rows) : ?>

                                            <li><a href="filter-post.php?categories=<?= $rows['kategori'] ?>"><?= $rows['kategori'] ?></a></li>

                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'layout/footer.php'; ?>