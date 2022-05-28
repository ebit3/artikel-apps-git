<?php include 'layout/header.php'; ?>

<?php

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 5");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");

$id = $_GET['id'];

$rows = show_edit_artikel("SELECT * FROM tb_artikel WHERE id_artikel = '" . $id  . "' ");

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
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/assets/<?= $rows['gambar'] ?>" alt="">
                                </div>
                                <div class="down-content">
                                    <span><?= $rows['kategori'] ?></span>
                                    <a>
                                        <h4><?= $rows['judul'] ?></h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a><?= $rows['publisher'] ?></a></li>
                                        <li><a>
                                                <input type="date" name="" id="" value="<?= $rows['tgl_release'] ?>" style="border: none; color: #aaaaaa;" class="inp" readonly>
                                            </a></li>
                                    </ul>
                                    <p><?= $rows['isi'] ?></p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#">Maja Sastra SKANEDA</a>,</li>
                                                    <li><a href="#">BLOG</a></li>
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