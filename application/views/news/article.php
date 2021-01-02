<?php
$paginationData = News::getPaginationData(10);
$categories = News::getNewsCategory(10);
$popular_news = News::getPopularBlogArticle();
$trending_news = News::getTrendingBlogArticle();
$single_news = $article_data;
$advetise = array();
?>

<div id="content">
    <header class="list-header">
        <div class="btn-group btn-group-justified">
            <a href="<?php echo LINK_URL . CONTROLLER; ?>/index"
               class="btn btn-default">Recent Post</a>
            <?php
            foreach ($categories as $row) {
                ?>
                <a href="<?php echo LINK_URL . CONTROLLER; ?>/category/<?php echo $row->url; ?>"
                   class="btn btn-default"><?php echo ucwords($row->title); ?></a>
                <?php
            }
            ?>

        </div>
    </header>
    <section class="article">
        <div class="container-fluid">
            <div class="row">
                <div class="article-content text-left">
                    <div class="col-md-9">
                        <h3 style="color:#050c35; padding: 5px;"
                            class=""><?php echo ucwords($single_news->title); ?></h3>
                        <small>
                            Category: <?php echo News::getCategoryDataById($single_news->category_id)['title']; ?>
                            <span>
                                Post Date: <?php echo Utilities::ConvertDate($single_news->post_date); ?>
                            </span>
                        </small>
                        <small>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style pull-right" >
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_linkedin"></a>
                                <a class="a2a_button_google_gmail"></a>

                                <a class="a2a_button_reddit"></a>
                                <a class="a2a_button_pocket"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                        </small>

                        <hr>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9">
                                    <img class="img-thumbnails img-responsive" width="100%"
                                         src="<?php echo $single_news->image; ?>"
                                         title="" alt="">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 text-justify">
                            <p style="font-size: 1.5em; font-weight: 200 ">
                                <?php echo $single_news->description; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="article-sidebar">


                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #E2E1E9;"
                                 class="text-center">

                                <h5 style=" font-weight: 500; font-size: 1.5em;  color: white">Trending News</h5>

                            </div>
                            <div class="list-group" style="font-size: 1em; font-weight: 200">
                                <?php
                                foreach ($trending_news as $row) {

                                    ?>
                                    <a href="<?php echo LINK_URL . "news/article/" . $row->url; ?>"
                                       class="list-group-item "> <img src="<?php echo $row->image; ?>"
                                                                      style="width:30px; height: 30px; border-radius: 5px;"> <?php echo $row->title; ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>
                            <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #E2E1E9;"
                                 class="text-center">

                                <h5 style=" font-weight: 500; font-size: 1.5em;  color: white">Popular News</h5>

                            </div>
                            <div class="list-group" style="font-size: 1em; font-weight: 200">
                                <?php
                                foreach ($popular_news as $row) {

                                    ?>
                                    <a href="<?php echo LINK_URL . "news/article/" . $row->url; ?>"
                                       class="list-group-item "> <img src="<?php echo $row->image; ?>"
                                                                      style="width:30px; height: 30px; border-radius: 5px;"> <?php echo $row->title; ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>



                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
</div>
