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
                        <input name="<?php echo CONTROLLER; ?>[image]" class="span6" placeholder="Enter image url" type="text" value="<?php echo isset($editableData)?$editableData->image:""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[full_name]" class="span6" placeholder="Enter name" type="text" value="<?php echo isset($editableData)?$editableData->full_name:""; ?>">

                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[user_name]" id="required" class="span6" placeholder="Enter username" type="text" value="<?php echo isset($editableData)?$editableData->user_name:""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[email]" placeholder="Enter email" class="span6" type="text" value="<?php echo isset($editableData)?$editableData->email:"@gmail.com"; ?>">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[password]" id="required" class="span6" placeholder="Enter password" type="password" value="<?php echo isset($editableData)?$editableData->password:""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[mobile_number]" id="required" class="span6" placeholder="Enter mobile number" type="text" value="<?php echo isset($editableData)?$editableData->mobile_number:""; ?>">
                    </div>
                </div>

                <div class="control-group">

                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[address]" placeholder="Enter address" class="span6" type="text" value="<?php echo isset($editableData)?$editableData->address:""; ?>">
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