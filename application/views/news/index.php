<?php
$paginationData = News::getPaginationData(10);
$categories = News::getNewsCategory(10);
$popular_news = News::getPopularBlogArticle();
$trending_news = News::getTrendingBlogArticle();
$advetise = array();
?>

<div id="content">
    <header class="list-header">
        <div class="btn-group btn-group-justified">
            <a href="<?php echo LINK_URL . CONTROLLER; ?>/index"
               class="btn btn-default">Latest News</a>
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
                    <div class="col-md-8">
                        <h3 style="background-color: #E2E1E9; color:#F7631B; padding: 10px;"
                            class="">Latest News</h3>
                        <hr>

                        <?php
                        foreach ($paginationData['records'] as $row) {
                            $cat_data = News::getCategoryDataById($row->category_id);
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php echo LINK_URL . CONTROLLER; ?>/article/<?php echo $row->url; ?>">
                                        <img src="<?php echo $row->image; ?>" class="media-object" style="width:200px; height: 200px">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="<?php echo LINK_URL . CONTROLLER; ?>/article/<?php echo $row->url; ?>">
                                        <h3 class="media-heading"><?php echo $row->title; ?></h3>
                                    </a>
                                    <small>Category: <a
                                                href="<?php echo LINK_URL . CONTROLLER; ?>/category/<?php echo $cat_data['url']; ?>"><?php echo $cat_data['title']; ?></a>
                                        <span>Post Date: <?php echo Utilities::ConvertDate($row->post_date); ?></span>
                                    </small>
                                    <div class="text-justify">
                                        <p><?php echo $row->summary; ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php
                        }
                        ?>

                        <div class="text-center">
                            <?php echo $paginationData['pagination']; ?>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #E2E1E9;" class="text-center" >

                            <h5 style=" font-weight: 500; font-size: 1.5em;  color: white" >Trending News</h5>

                        </div>
                        <div class="list-group" style="font-size: 1em; font-weight: 200">
                            <?php
                            foreach ($trending_news as $row){

                                ?>
                                <a href="<?php echo LINK_URL . "news/details/" . $row->url; ?>" class="list-group-item ">  <img src="<?php echo $row->image; ?>" style="width:30px; height: 30px; border-radius: 5px;"> <?php echo $row->title; ?></a>
                                <?php
                            }
                            ?>
                        </div>
                        <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #E2E1E9;" class="text-center" >

                            <h5 style=" font-weight: 500; font-size: 1.5em;  color: white" >Popular News</h5>

                        </div>
                        <div class="list-group" style="font-size: 1em; font-weight: 200">
                            <?php
                            foreach ($popular_news as $row){

                                ?>
                                <a href="<?php echo LINK_URL . "news/details/" . $row->url; ?>" class="list-group-item ">  <img src="<?php echo $row->image; ?>" style="width:30px; height: 30px; border-radius: 5px;"> <?php echo $row->title; ?></a>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </section>

</div>


