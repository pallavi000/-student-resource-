
<div id="content">
    <section class="article">
        <div class="container">
            <?php
            if($articles) {
                ?>

                <?php
                $left_sidebar_param = array("topics"=>$topics,"topic_types"=>$topic_types,"tutorial_result"=>$tutorial_result);
                $content_param = array("articles"=>$articles);
                $right_sidebar_param = array("advertise"=>$advertise,"tutorial_result"=>$tutorial_result);

                ?>
                <div class="row">
                    <?php
                    $this->loadPartialView("_left_sidebar", $left_sidebar_param); ?>


                    <?php

                     $pn_arr = array("next_url"=>$next_url,"prev_url"=>$prev_url);
                    ?>

                    <div class="article-content">
                        <div class=" col-md-6">

                            <div class="content-heading">
                                <i class="fa fa-th-large" style="color: #2ecc71;"></i> <?php echo $articles->title;?> <i
                                    class="fa fa-th-large" style="color: #2ecc71;"></i> <br/>
                            </div>

                            <?php $this->loadPartialView("_prev_next",$pn_arr); ?>

                            <?php $this->loadPartialView("_content",$content_param); ?>



                            <?php $this->loadPartialView("_prev_next",$pn_arr); ?>
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
                    <?php $this->loadPartialView("_right_sidebar",$right_sidebar_param); ?>

                </div>
            <?php
            }else{
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
