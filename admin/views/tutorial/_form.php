<?php
$categories = $model->getCategory();
$tutorials = $model->getMainTutorial();


?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo isset($editableData) ? 'Edit ' . ucfirst(CONTROLLER) : 'Add New ' . ucfirst(CONTROLLER); ?></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php
                if (isset($editableData)) {
                    ?>
                        <img id="showHere" style="position: absolute"
                             src="<?php echo $editableData->image; ?>" height="185px" width="185px"
                             alt="<?php echo $editableData->image; ?>" title="<?php echo $editableData->image; ?>"/>
                    <?php

                }
                ?>

                <div class="control-group">
                    <div class="controls">
                        <input id="image" type="text" name="<?php echo CONTROLLER; ?>[image]"
                               onchange="imagePreview(this)" value="<?php echo isset($editableData) ? $editableData->image : ""; ?>" placeholder="Enter image url" class="span6">


                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[title]" class="span6" placeholder="Enter title"
                               type="text" value="<?php echo isset($editableData) ? $editableData->title : ""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[url]" id="required" class="span6" placeholder="Enter url"
                               type="text" value="<?php echo isset($editableData) ? $editableData->url : ""; ?>">

                    </div>
                </div>

                <div class="control-group">
               <div class="controls">

                        <select class="span6" name="<?php echo CONTROLLER; ?>[category_id]">
                            <?php
                            foreach ($categories as $row) {


                                $selected = '';
                                if (isset($editableData)) {

                                    if ($editableData->category_id==$row->id) {
                                        $selected = 'selected="selected"';
                                    }
                                }

                                ?>

                                <option
                                    value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->title; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <select class="span6" name="<?php echo CONTROLLER; ?>[tutorial_self_id]">
                            <option value="0" <?php //echo $selected; ?>>Main Tutorial</option>
                            <?php
                            foreach ($tutorials as $row) {
                                $selected = '';
                                if (isset($editableData)) {
                                    if ($editableData->tutorial_self_id == $row->id) {
                                        $selected = 'selected="selected"';
                                    }
                                }

                                ?>

                                <option
                                    value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->title; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>

                </div>

                <div class="control-group">
                    <div class="controls">

                        <input name="<?php echo CONTROLLER; ?>[seo_title]" placeholder="Enter seo_title" class="span6"
                               type="text" value="<?php echo isset($editableData) ? $editableData->seo_title : ""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[seo_description]" id="required" class="span6"
                               placeholder="Enter Seo description" type="seo_description"
                               value="<?php echo isset($editableData) ? $editableData->seo_description : ""; ?>">
                    </div>
                </div>


                <div class="control-group">

                    <div class="controls">

                        <select class="span6" name="<?php echo CONTROLLER; ?>[status]">
                            <?php
                            $active = 'selected="selected"';
                            $inactive = '';
                            if (isset($editableData)) {
                                if ($editableData->status == '0') {
                                    $active = '';
                                    $inactive = 'selected="selected"';
                                }
                            }
                            ?>
                            <option value="1" <?php echo $active; ?>>Active</option>
                            <option value="0" <?php echo $inactive; ?>>In-active</option>
                        </select>
                    </div>

                </div>

                <div class="form-actions">
                    <input value="Cancel" name="cancel" class="btn btn-danger pull-right" type="submit"> &nbsp;
                    <input value="Clear" class="btn btn-danger pull-right" type="reset">&nbsp;
                    <?php
                    if (isset($editableData)) {
                        ?>
                        <input value="Update" class="btn btn-primary pull-right" type="submit">
                    <?php
                    } else {
                        ?>
                        <input name="btn_register" value="Add" class="btn btn-success pull-right" type="submit">
                    <?php
                    }
                    ?>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function imagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showHere').attr('src', e.target.result).width(160).height(160);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

