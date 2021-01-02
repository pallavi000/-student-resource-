<?php
$categories = Celebrity::getCelebrityCategory(10);
$paginationData = Celebrity::getPaginationData(10);
$popularData = Celebrity::getPopularCelebrity(5);
$article_result = $article_data;
$cat_data = Celebrity::getCategoryDataById($article_result->category_id);

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
                    <div class="col-md-8">
                        <h3 style="color:#050c35; padding: 5px;"
                            class=""><?php echo ucwords($article_result->title); ?></h3>
                        <small>Category: <a
                                    href="<?php echo LINK_URL . CONTROLLER; ?>/category/<?php echo $cat_data['url']; ?>"><?php echo $cat_data['title']; ?></a>
                            <span>Post Date: <?php echo Utilities::ConvertDate($row->post_date); ?></span>
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
                        <img src="<?php echo $article_result->image; ?>" class="pull-left"
                             style="width:200px; margin: 0px 15px 0px 0px">
                        <div class="text-justify">
                            <p><?php echo $article_result->description; ?></p>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <?php
                        $categories = Celebrity::getCelebrityCategory(3);
                        foreach ($categories as $row1) {
                            ?>
                            <div class="article-sidebar"
                                 style="margin-bottom: 5px; padding: 5px; border: 1px solid #E2E1E9;">

                                <div style="background-color: #E2E1E9;"
                                     class="text-center">
                                    <p style=" font-weight: 200; font-size: 1.5em;  color: #0b0732"><?php echo "Popular " . ucwords($row1->title); ?></p>

                                </div>

                                <?php
                                foreach ($popularData as $row) {
                                    if ($row->category_id == $row1->id) {
                                        ?>
                                        <a href="<?php echo LINK_URL . CONTROLLER . "/article/" . $row->url; ?>">
                                            <div class="media">
                                                <div class="media-left media-top">
                                                    <img src="<?php echo $row->image; ?>" class="media-object"
                                                         style="width:60px">
                                                </div>
                                                <div class="media-body">
                                                    <p><?php echo $row->title; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                        <hr>
                                        <?php
                                    }
                                }
                                ?>


                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>


            </div>

        </div>
    </section>
</div>


