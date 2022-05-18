<?php include 'layout/header.php'; ?>

<?php

$data = show_artikel("SELECT * FROM tb_artikel");

$data_limit = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 3");

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 5");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");

?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container">
        <div class="owl-banner owl-carousel">

            <?php foreach ($data as $rows) : ?>

                <div class="item">
                    <img src="images/assets/<?= $rows['gambar'] ?>" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span class="kategori"><?= $rows['kategori'] ?></span>
                            </div>
                            <a href="single-post.php?id=<?= $rows['id_artikel'] ?>">
                                <h4><?= $rows['judul'] ?></h4>
                            </a>
                            <ul class="post-info">
                                <li><a><?= $rows['publisher'] ?></a></li>
                                <li>
                                    <a>
                                        <input type="date" name="" id="" value="<?= $rows['tgl_release'] ?>" readonly style="border: none; background: none; color: #fff;" class="inp">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Nama-nya Gagal itu Ada</span>
                            <h4>Tapi Menyerah Yang Jangan</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a rel="nofollow" href="#" target="_parent">More Info!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php foreach ($data_limit as $row) : ?>

                            <div class="col-lg-12">

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
                                            <?= substr($row['isi'], 0, 250) ?>...
                                            <a href="single-post.php?id=<?= $row['id_artikel'] ?>">Baca terus</a>
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Beauty</a>,</li>
                                                        <li><a href="#">Nature</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php endforeach; ?>

                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="artikel.php">View All Posts</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">

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