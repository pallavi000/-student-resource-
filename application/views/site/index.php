<?php

$categories = Functions::getMainCategory();
$tutorials = Functions::getMainTutorial();
$popular_article = Functions::getPopularArticle();
$latest_article = Functions::getlatestArticle();

?>
<style>

    .in_association {

        color: #f1f1f1;
        text-decoration: none;
        border: 0.5px solid transparent;
        border-radius: 5px;
        box-shadow: 1px 1px 1px rgba(209, 199, 199, 0.98);
    }
</style>
<main id="content">
    <section class="banner">
        <div class="container-fluid">
            <div class="row">
                <h1>Welcome to Saral Gyan</h1>
                    Enhance your skills with academic material and non academic materials.
                </p>
                <a class="banner_btn" href="<?php echo LINK_URL ?>category/index">Get Started Now!</a>
            </div>
        </div>
    </section>
    <!--banner-->

    <section class="section-bg">
        <div class="container-fluid">
            <div class="row">
                <header class="list-header">
                    <h1>Choose Materials</h1>
                    <p>Are your looking for professional tutorials? Why not try this? <br/>Check out one of them from
                        below.</p>
                </header>
            </div>

            <div class="row">
                <?php
                foreach ($categories as $row1):
                    ?>
                    <div class="col-md-6 ">
                        <div class="list-block">
                            <div class="panel category_box">
                                <div class="panel-heading">
                                    <h4 style="text-align: left">
                                        <img src="<?php echo   $row1->image; ?>"
                                             style="width:20px; height: 20px; border-radius: 50%;"> <?php echo ucwords($row1->title) ?>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    $i = 0;
                                    foreach ($tutorials as $row):
                                        if ($row->category_id == $row1->id) {
                                            $i = $i + 1;
                                            if ($i < 8) {
                                                ?>
                                                <div class="col-md-3 col-sm-6 ">
                                                    <div class="box text-center">
                                                        <a href="<?php echo LINK_URL . "article/index/" . $row->url; ?>">
                                                            <img src="<?php echo   $row->image; ?>"
                                                                 style="width:50px; height: 50px;">
                                                        </a>
                                                        <p><?php echo ucwords($row->title); ?></p>

                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    endforeach;
                                    ?>
                                </div>

                                <div style="text-align: right">
                                    <a class="banner_btn" href="<?php echo LINK_URL . "tutorial/index/" . $row1->url; ?>"><i class="fa fa-eye"></i> View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
                <div class="col-md-12">
                    <div style="text-align: center"><a class="banner_btn"
                                                       href="<?php echo LINK_URL . "category/index" ?>"><i
                                    class="fa fa-eye"></i> View Complete Library</a></div>
                </div>

            </div>
            <!--row-->

        </div>
        <!--/container-fluid-->
    </section>

</main><!--content-->


