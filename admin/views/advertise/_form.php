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
                        <input name="<?php echo CONTROLLER; ?>[title]" class="span6" placeholder="Enter Ads title" type="text" value="<?php echo isset($editableData)?$editableData->title:""; ?>">
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

                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[belongs_page]" class="span6" placeholder="Enter Page Controller" type="text" value="<?php echo isset($editableData)?$editableData->belongs_page:""; ?>">
                        <select class="span6" name="<?php echo CONTROLLER; ?>[alignment]">
                            <?php
                            $alignment = Functions::SetAlignment();
                            $selected = '';
                            echo $editableData->alignment;
                            foreach ($alignment as $key =>$value):
                            if (isset($editableData)) {

                                if ($editableData->alignment == $key) {
                                    $selected = 'selected="selected"';
                                }
                            }
                            ?>
                            <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>

                    </div>
                    <div class="controls">
                        <textarea name="<?php echo CONTROLLER; ?>[style]" class="span6" placeholder="Enter css style">
                            <?php echo isset($editableData)?$editableData->style:""; ?>
                        </textarea>


                    </div>
                    <div class="controls">
                        <textarea name="<?php echo CONTROLLER; ?>[code]" class="span6" placeholder="Enter ads image url or code" ><?php echo isset($editableData)?$editableData->code:""; ?></textarea>
                        <input name="<?php echo CONTROLLER; ?>[url]" class="span6" placeholder="Enter return url" type="text" value="<?php echo isset($editableData)?$editableData->url:""; ?>">

                    </div>
                    <div class="controls">

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