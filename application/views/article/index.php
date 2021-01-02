<div id="content">
    <section class="article">
        <div class="container-fluid">
            <?php
            if ($tutorial_result) {
                ?>

                <?php
                $left_sidebar_param = array("topics" => $topics, "topic_types" => $topic_types, "tutorial_result" => $tutorial_result);
                $content_param = array("articles" => $articles);
                $right_sidebar_param = array("advertise" => $advertise,"tutorial_result" => $tutorial_result);

                ?>
                <div class="row">
                    <?php
                    $this->loadPartialView("_left_sidebar", $left_sidebar_param); ?>


                    <div class="article-content">
                        <div class=" col-md-6">


                            <div class="content-heading">
                                <span><i class="fa fa-th-large" style="color: #2ecc71;"></i></span>
                                 <?php echo ucwords($articles->title); ?>
                                <span><i class="fa fa-th-large" style="color: #2ecc71;"></i></span>
                            </div>


                            <div>
                            <?php $this->loadPartialView("_content", $content_param); ?>
</div>
                            <div class="thumbnail">
                                <?php
                                foreach ($advertise as $row) {
                                    if ($row->alignment == "bottom" and $row->belongs_page == CONTROLLER) {
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


                    <?php $this->loadPartialView("_right_sidebar", $right_sidebar_param); ?>

                </div>
            <?php
            } else {
                $this->loadPartialView("../includes/_error");
            }
            ?>
        </div>
    </section>
</div>
<!--content-->
<script>
    $(document).ready(function () {
        $('pre').addClass('pre_border');
        $('ul').addClass('list-group');
         $('li').addClass('list-group-item');
    });
</script>
