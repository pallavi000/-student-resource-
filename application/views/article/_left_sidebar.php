
<div class="article-sidebar">
    <div class=" col-md-3 hidden-xs">
        <div class="mini-logo">
            <a class="thumbnail" style="width: 238px; ">
                    <img height="150px" width="150px" src="<?php echo $tutorial_result->image; ?>"
                         alt="<?php echo $tutorial_result->image; ?>" title="<?php echo $tutorial_result->title; ?>">
            </a>

        </div>
        <div class="sidebar-main-heading">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php
                $const = "100";
                foreach ($topic_types as $row1):
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="<?php //echo $const.$row1->id; ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-target="#<?php echo $const.$row1->id; ?>" data-parent="#accordion"
                                   href="#<?php echo $row1->type; ?>"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo $row1->type; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="<?php echo $const.$row1->id; ?>" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="<?php echo $const.$row1->id; ?>">
                            <div class="panel-body">
                                <div class="list-group ">

                                    <?php
                                    foreach ($topics as $row):
                                        if ($row->topic_type_id == $row1->id) {
                                            ?>
                                            <a href="<?php echo LINK_URL . "article/details/" . $row->url; ?>"
                                               class="list-group-item" style="text-align:left;"><i
                                                    class="fa fa-plus-circle "></i>
                                                <?php echo $row->title; ?></a>
                                        <?php
                                        }
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
</div>