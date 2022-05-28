<?php include 'layout/header.php'; ?>

<?php

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 3");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");

$data_all = show_artikel("SELECT * FROM tb_artikel");


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

                        <?php foreach ($data_all as $rows) : ?>

                            <div class="col-lg-6 border border-primary">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="images/assets/<?= $rows['gambar'] ?>" alt="Gambar error">
                                    </div>
                                    <div class="down-content">
                                        <span><?= $rows['kategori'] ?></span>
                                        <a href="post-details.html">
                                            <h4><?= $rows['judul'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#"><?= $rows['publisher'] ?></a></li>
                                            <li>
                                                <a>
                                                    <input type="date" name="" id="" value="<?= $rows['tgl_release'] ?>" readonly style="border: none; background: none; color: #aaa;" class="inp">
                                                </a>
                                            </li>
                                        </ul>
                                        <p>The standard chunk of Lorem Ipsumused since the 1500s is reproduced below for those interested.</p>
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

                        <div class="col-lg-12 border border-danger">
                            <ul class="page-numbers">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 border border-success">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
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

                                        <?php foreach ($data_recent as $rows) : ?>

                                            <li>
                                                <a href="post-details.html">
                                                    <h5>Lorem Ipsum is simply dummy text of the printing and typesetting</h5>
                                                    <span>May 28, 2021</span>
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

                                            <li><a href="#">- Nature Lifestyle</a></li>

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

                                            <li><a href="#">Nature Lifestyle</a></li>

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