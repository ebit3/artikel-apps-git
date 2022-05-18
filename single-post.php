<?php include 'layout/header.php'; ?>

<?php

$data = show_artikel("SELECT * FROM tb_artikel");

$data_recent = show_artikel("SELECT * FROM tb_artikel ORDER BY RAND() LIMIT 5");

$data_kategori = show_kategori("SELECT * FROM tb_kategori");

$id = $_GET['id'];

$rows = show_edit_artikel("SELECT * FROM tb_artikel WHERE id_artikel = '" . $id  . "' ");

?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Post Details</h4>
                        <h2>Single post</h2>
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
                            <h4>Great Responsive website BLOG For Bloggers!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a rel="nofollow" href="https://www.youtube.com/channel/UCiC5-n85_UzJs7C1FvFl-fg" target="_parent">More Info!</a>
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
                        <div class="col-lg-12">
                            <div class="sidebar-item comments">
                                <div class="sidebar-heading">
                                    <h2>4 comments</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-01.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Smith Brown<span>May 26, 2021</span></h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-02.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Jimdel-Edu<span>May 27, 2021</span></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-03.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>La Semence<span>May 28, 2021</span></h4>
                                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-02.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Jimdel-Edu<span>May 28, 2021</span></h4>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                    <h2>Your comment</h2>
                                </div>
                                <div class="content">
                                    <form id="comment" action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name" placeholder="Your name" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email" placeholder="Your email" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <fieldset>
                                                    <input name="subject" type="text" id="subject" placeholder="Subject">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
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
                                        <li><a href="post-details.html">
                                                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting</h5>
                                                <span>May 28, 2021</span>
                                            </a></li>
                                        <li><a href="post-details.html">
                                                <h5>There are many variations of passages of Lorem Ipsum available</h5>
                                                <span>May 28, 2021</span>
                                            </a></li>
                                        <li><a href="post-details.html">
                                                <h5>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</h5>
                                                <span>May 27, 2021</span>
                                            </a></li>
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
                                        <li><a href="#">- Nature Lifestyle</a></li>
                                        <li><a href="#">- Awesome Layouts</a></li>
                                        <li><a href="#">- Creative Ideas</a></li>
                                        <li><a href="#">- Responsive Templates</a></li>
                                        <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                                        <li><a href="#">- Creative &amp; Unique</a></li>
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
                                        <li><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">HTML5</a></li>
                                        <li><a href="#">Inspiration</a></li>
                                        <li><a href="#">Motivation</a></li>
                                        <li><a href="#">PSD</a></li>
                                        <li><a href="#">Responsive</a></li>
                                        <li><a href="#">PHP</a></li>
                                        <li><a href="#">C#</a></li>
                                        <li><a href="#">JavaScript</a></li>
                                        <li><a href="#">Pyton</a></li>
                                        <li><a href="#">RPG</a></li>
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