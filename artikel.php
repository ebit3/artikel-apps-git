<?php include 'layout/header.php'; ?>

<?php

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 5");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");


?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Recent Posts</h4>
                        <h2>Recent Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Banner Ends Here -->

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Responsive Blog HTML5 / CSS3</span>
                            <h4>Great Responsive Blog HTML5 / CSS3 For Bloggers!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a href="https://www.youtube.com/channel/UCiC5-n85_UzJs7C1FvFl-fg" target="_parent">MORE INFO!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php if (isset($_POST['cari'])) {

                            $data = show_artikel("SELECT * FROM tb_artikel  WHERE judul LIKE '%" . $_POST['cari'] . "%'  ");
                        } else {


                            $halaman = 6;

                            $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

                            $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

                            $data = show_artikel("SELECT * FROM tb_artikel LIMIT $mulai, $halaman");

                            $conn = koneksi();

                            $query = mysqli_query($conn, "SELECT * FROM tb_artikel");

                            $total = mysqli_num_rows($query);

                            @$pages = ceil($total / $halaman);

                            // $no = $mulai + 1;
                        } ?>

                        <?php foreach ($data as $row) : ?>

                            <div class="col-lg-6">

                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="images/assets/<?= $row['gambar'] ?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span><?= $row['kategori'] ?></span>
                                        <a href="single-post.php?id=<?= $row['id_artikel'] ?>">
                                            <h4><?= $row['judul'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a><?= $row['publisher'] ?></a></li>
                                            <li>
                                                <a>
                                                    <input type="date" name="" id="" value="<?= $row['tgl_release'] ?>" readonly style="border: none; background: none; color: #aaa;" class="inp">
                                                </a>
                                            </li>
                                        </ul>
                                        <p>
                                            <?= substr($row['isi'], 0, 150) ?>...
                                            <a href="single-post.php?id=<?= $row['id_artikel'] ?>">Baca terus</a>
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Great Responsive</a>,</li>
                                                        <li><a href="#">Website</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php endforeach; ?>

                        <div class="col-lg-12">
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
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php foreach ($data_recent as $row) : ?>

                                            <li>
                                                <a href="single-post.php?id=<?= $row['id_artikel'] ?>">
                                                    <h5><?= $row['judul'] ?></h5>
                                                    <span>
                                                        <input type="date" name="" id="" value="<?= $row['tgl_release'] ?>" readonly style="border: none; background: none; color: #aaa;" class="inp">
                                                    </span>
                                                </a>
                                            </li>

                                        <?php endforeach; ?>

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

                                        <?php foreach ($data_kategori as $row) : ?>

                                            <li><a href="filter-post.php?categories=<?= $row['kategori'] ?>">- <?= $row['kategori'] ?></a></li>

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
                                        <?php foreach ($data_kategori as $row) : ?>

                                            <li><a href="filter-post.php?categories=<?= $row['kategori'] ?>">- <?= $row['kategori'] ?></a></li>

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