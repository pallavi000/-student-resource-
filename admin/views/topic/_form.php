<?php
$model_admin = $model;
$field = $model_admin->getFields();

?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo isset($editableData)?'Edit '.ucfirst(CONTROLLER):'Add New '.ucfirst(CONTROLLER); ?></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="control-group">

                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[type]" class="span6" placeholder="Enter topic type" type="text" value="<?php echo isset($editableData)?$editableData->type:""; ?>">
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
                    }else {
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
