<?php
$categories = Functions::getMainCategory();
$tutorials = Functions::getMainTutorial();
?>


<div id="content">
        <header class="list-header">
            <h1>Choose Tutorials</h1>
            <p>Are your looking for professional tutorials? Why not try this? Check out one of them from below.</p>
        </header>
        <div class="container">
            <div class="list-block">
                <div class="row">
                    <?php
                    foreach ($categories as $row1):
                        ?>
                        <div class="col-md-12 ">
                            <div class="list-block">
                                <div class="panel category_box">
                                    <div class="panel-heading">
                                        <h4 style="text-align: left">
                                            <img src="<?php echo $row1->image; ?>"
                                                 style="width:20px; height: 20px; border-radius: 50%;"> <?php echo ucwords($row1->title) ?>
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                        $i = 0;
                                        foreach ($tutorials as $row):
                                            if ($row->category_id == $row1->id) {
                                                $i = $i + 1;
                                                if ($i < 18) {
                                                    ?>
                                                    <div class="col-md-2 col-sm-6 ">
                                                        <div class="box text-center">
                                                            <a href="<?php echo LINK_URL . "article/index/" . $row->url; ?>">
                                                                <img src="<?php echo $row->image; ?>"
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
                                        <a class="banner_btn"
                                           href="<?php echo LINK_URL . "tutorial/index/" . $row1->url; ?>"><i
                                                    class="fa fa-eye"></i> View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>


                </div>

                <!--row-->
            </div>
        </div>
        <!--container-->
    <!--list-tuto-->
</div>


