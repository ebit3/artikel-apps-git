<?php include 'layout/header.php'; ?>

<?php

$categories = $_GET['categories'];

$data = show_artikel("SELECT * FROM tb_artikel WHERE kategori = '" . $categories . "' ");

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 5");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");

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

                        <?php if ($data !== "") { ?>

                            <?php foreach ($data as $row) : ?>

                                <div class="col-lg-6">

                                    <div class="blog-post">
                                        <div class="blog-thumb-dua">
                                            <img src="images/assets/<?= $row['gambar'] ?>" alt="">
                                        </div>
                                        <div class="down-content">
                                            <span><?= $row['kategori'] ?></span>
                                            <a href="single-post.php">
                                                <h4><?= $row['judul'] ?></h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#"><?= $row['publisher'] ?></a></li>
                                                <li>
                                                    <a href="">
                                                        <input type="date" name="" id="" value="<?= $row['tgl_release'] ?>" readonly style="border: none; background: none; color: #aaa;" class="inp">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            <?php endforeach; ?>

                        <?php } else { ?>

                            <h4>Artikel Tidak di Temukan</h4>

                        <?php } ?>


                        <!-- <div class="col-lg-12">
                            <ul class="page-numbers">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Artikel Lain</h2>
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
                                    <h2>Kategori Artikel</h2>
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
                                    <h2>Kategori Artikel</h2>
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