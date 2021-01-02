<?php
$categories = $model->getCategory();
$tutorials = $model->getTutorials();
$topic_types = $model->getTopicType();


?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo isset($editableData) ? 'Edit ' . ucfirst(CONTROLLER) : 'Add New ' . ucfirst(CONTROLLER); ?></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">


                <div class="control-group">
                    <div class="controls">
                        <select onchange="getCategoryRelatedTutorial(this)" class="span6" name="<?php echo CONTROLLER; ?>[category_id]">
                            <?php
                            foreach ($categories as $row) {
                                $selected = '';
                                if (isset($editableData)) {
                                    if ($editableData->category_id == $row->id) {
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

                        <select class="span6" name="<?php echo CONTROLLER; ?>[tutorials_id]">
                            <?php
                            foreach ($tutorials as $row) {
                                $selected = '';
                                if (isset($editableData)) {
                                    if ($editableData->tutorials_id == $row->id) {
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

                        <select class="span6" name="<?php echo CONTROLLER; ?>[topic_type_id]">
                            <?php
                            foreach ($topic_types as $row) {
                                $selected = '';
                                if (isset($editableData)) {
                                    if ($editableData->topic_type_id == $row->id) {
                                        $selected = 'selected="selected"';

                                    }
                                }

                                ?>

                                <option
                                    value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->type; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <input name="<?php echo CONTROLLER; ?>[title]" class="span6" placeholder="Enter title"
                               type="text" value="<?php echo isset($editableData) ? $editableData->title : ""; ?>">
                    </div>

                </div>
<?php
                    if (isset($editableData)) {
                        ?>
                <div class="control-group">
                    <div class="controls">
<input name="<?php echo CONTROLLER; ?>[post_date]" class="span6" placeholder="Enter post date" type="text" value="<?php echo isset($editableData) ? $editableData->post_date : ""; ?>">

                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="control-group">
                    <div class="controls">

                        <input name="<?php echo CONTROLLER; ?>[url]" id="required" class="span6" placeholder="Enter url"
                               type="text" value="<?php echo isset($editableData) ? $editableData->url : ""; ?>">

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
    function getCategoryRelatedTutorial(control) {
        var mainselection = control.value; // get the selection value
        $.ajax({
            /*type: "POST",  // method of sending data
            url: "<?php echo LINK_URL;?>topics/getCategoryRelatedTutorial", // name of PHP script
            data:'id='+mainselection, // parameter name and value
            success: function(result){

                var myObj = JSON.parse(result);
            }*/
        });
    }
</script>