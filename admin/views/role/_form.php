<?php
$users = Functions::getUsers();
?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo isset($editableData) ? 'Edit ' . ucfirst(CONTROLLER) : 'Add New ' . ucfirst(CONTROLLER); ?></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="" method="post" class="form-horizontal">



                <div class="control-group">

                    <div class="controls">
                        <select class="span6" name="<?php echo CONTROLLER; ?>[user_id]" onchange="imagePreview(this)" >
                            <?php
                            foreach ($users as $row) {


                                $selected = '';
                                if (isset($editableData)) {

                                    if ($editableData->user_id == $row->id) {
                                        $selected = 'selected="selected"';
                                    }
                                }

                                ?>

                                <option
                                    value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->user_name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
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

                <div class="control-group">
                    <div class="controls">
                        <label for="inlineCheckbox1">Assign Role</label>
                        <?php
                        $controllers = Functions::getController();

                        foreach($controllers as $key=>$value):
                            $checked = '';
                            if (isset($editableData)){
                                $role_array = explode(", ",$editableData->role);
                                if (in_array($key, $role_array)) {
                                    $checked = 'checked="checked"';
                                }

                            }
                        ?>
                            <input name="<?php echo CONTROLLER; ?>[role][]" <?php echo $checked; ?> class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $key; ?>"> <?php echo $value; ?>&nbsp;&nbsp;
                        <?php endforeach; ?>
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
