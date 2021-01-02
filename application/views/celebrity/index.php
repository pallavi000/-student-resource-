<?php
$categories = Celebrity::getCelebrityCategory(10);
$paginationData = Celebrity::getPaginationData(10);
$popularData = Celebrity::getPopularCelebrity(5);
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
                        <h3 style="background-color: #E2E1E9; color:#F7631B; padding: 10px;"
                            class="">Recent Posts</h3>
                        <hr>

                        <?php
                        foreach ($paginationData['records'] as $row) {
                            $cat_data = Celebrity::getCategoryDataById($row->category_id);
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php echo LINK_URL . CONTROLLER; ?>/article/<?php echo $row->url; ?>">
                                        <img src="<?php echo $row->image; ?>" class="media-object" style="width:150px">
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
                        <?php
                        $categories = Celebrity::getCelebrityCategory(3);
                        foreach ($categories as $row1) {
                            ?>
                            <div class="article-sidebar" style="margin-bottom: 5px; padding: 5px; border: 1px solid #E2E1E9;">

                                <div style="width: 100%;; background-color: #E2E1E9;"
                                     class="text-center">

                                    <p style=" font-weight: 300; font-size: 2em;  color: #0b0732"><?php echo "Popular ".ucwords($row1->title); ?></p>

                                </div>

                                    <?php
                                    foreach ($popularData as $row) {
                                        if ($row->category_id == $row1->id) {
                                            ?>
                                            <a href="<?php echo LINK_URL . CONTROLLER . "/article/" . $row->url; ?>">
                                            <div class="media">
                                                <div class="media-left media-top">
                                                    <img src="<?php echo $row->image; ?>" class="media-object" style="width:60px">
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


