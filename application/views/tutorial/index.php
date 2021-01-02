<?php
//$tutorials = $model->getMainTutorial();
$tutorials = $tutorials_by_category_url;
$relatedTopics = Functions::getRelatedTopics($single_category_item->id,15);
?>
<?php
$related_tutorial = Functions::getRemainingTutorial($tutorials,5);
?>
<?php
if ($tutorials) {
    ?>
    <div id="content">

        <section class="section-bg">

            <div class="container">

                <div class="list-block">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <header class="list-header">
                                    <h1><?php echo $single_category_item->title;; ?></h1>

                                    <p>Are your looking for professional <?php echo $single_category_item->title; ?>
                                        tutorials? Why not try this? <br/>Check
                                        out one of them from below.</p>
                                </header>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($tutorials as $row):
                                    ?>


                                        <div class="col-sm-2 col-md-2">
                                            <div class="row">
                                                <div class="block-wrap">

                                                    <div class="thumbnail text-center">
                                                        <div class="overlay">

                                                        </div>
                                                        <div class="read">
                                                            <a class="btn btn-sm btn-primary"
                                                               href="<?php echo LINK_URL . "article/index/" . $row->url; ?>"><i class="fa fa-external-link"></i></a>
                                                        </div>
                                                        <img src="<?php echo $row->image; ?>"
                                                             alt="<?php echo $row->image; ?>"
                                                             title="<?php echo $row->title; ?>">


                                                        <div class="caption">
                                                            <h5><?php echo $row->title; ?></h5>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #7d8080;" class="text-center" >

                                <h5 style=" font-weight: 500; font-size: 1.5em;  color: white" >Latest Article</h5>

                            </div>
                            <div class="related_article">
                                <div class="list-group">
                                    <?php
                                    foreach ($relatedTopics as $row) {
                                        ?>
                                        <a href="<?php echo LINK_URL . "article/details/" . $row->url; ?>"
                                           class="list-group-item"><?php echo $row->title; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #7d8080;" class="text-center" >

                                <h5 style=" font-weight: 500; font-size: 1.5em;  color: white" >Explore More...</h5>

                            </div>
                            <div class="list-group text-left" style="font-size: 1.5em; font-weight: 200">
                                <?php
                                foreach ($related_tutorial as $row){

                                    ?>
                                    <a href="<?php echo LINK_URL . "article/index/" . $row->url; ?>" class="list-group-item ">  <img src="<?php echo $row->image; ?>" style="width:30px; height: 30px; border-radius: 50%;"> <?php echo $row->title; ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!--row-->
                </div>
                <!--list-block-->
            </div>
            <!--container-->
        </section>
        <!--list-tuto-->
    </div>
    <!--content-->
    <?php
} else {
    $this->loadPartialView("../includes/_error");
}
?>

