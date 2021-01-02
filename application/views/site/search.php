<?php

$tutorials = $searched_record;

?>


<div id="content">

    <section class="section-bg">
        <header class="list-header">

            <h1>Search Result</h1>

        </header>
        <div class="container">
            <div class="list-block">
                <div class="row">
                    <div class="col-sm-8 col-md-8">
                        <?php
                            if($tutorials) {
                                ?>

                                <div class="row">
                                    <?php
                                    foreach ($tutorials as $row):
                                        // echo $row->title;
                                        ?>
                                        <div class="col-sm-6">
                                            <div class="url list-group " style="margin-bottom: 0px;">
                                                <a href="<?php echo LINK_URL . "article/index/". $row->url;?>"
                                                   class="list-group-item"
                                                   style="text-align:left;"><i
                                                        class="fa fa-plus-circle "></i> <?php echo $row->title;; ?></a>
                                            </div>
                                        </div>

                                    <?php

                                    endforeach;
                                    ?>

                                </div>
                            <?php
                            }else{

                                ?>
                                <h2>No Record Found</h2>
                        <?php
                            }
                        ?>


                    </div>
                    <div class="col-sm-4 col-md-4">

                        <div class="thumbnail">
                            <?php
                            foreach ($advertise as $row) {
                                if ($row->alignment == "right" and $row->belongs_page == CONTROLLER) {
                                    ?>

                                    <a target="_blank" href="<?php echo $row->url; ?>">
                                        <img style="<?php echo $row->style; ?>" src="<?php echo $row->code; ?>" alt="">
                                    </a>


                                    <?php
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <!--row-->
            </div>
<div class="list-block text-center">
    <div class="row">
        <?php
        foreach ($advertise as $row) {
            if ($row->alignment == "bottom" and $row->belongs_page == CONTROLLER) {
                ?>
                <div class="block-wrap" style="<?php echo $row->style; ?>">
                    <?php
                    echo $row->code;
                    ?>
                </div>
            <?php
            }
        }
        ?>
    </div>
</div>
        </div>

        <!--container-->
    </section>
    <!--list-tuto-->
</div>
<!--content-->
<div id="line">
    <hr/>
</div>

