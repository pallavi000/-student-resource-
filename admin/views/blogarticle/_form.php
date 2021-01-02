<?php
$categories = Functions::getBlogCategory();

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
                        <input id="image" type="text" name="<?php echo CONTROLLER; ?>[image]"
                               value="<?php echo isset($editableData) ? $editableData->image : ""; ?>"
                               placeholder="choose pdf, docx, image url" class="span6">

                        <?php
                        if (!isset($editableData)) {
                        ?>
                        <select onchange="leaveChange(this)" class="span6" name="<?php echo CONTROLLER; ?>[category_id]">
                            <option value="0">Select Category</option>

                            <?php
                            foreach ($categories as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>" ><?php echo $row->title; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                        <?php
                        }
                        ?>

                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[title]" id="title" class="span6"
                               placeholder="Enter title" type="text"
                               value="<?php echo isset($editableData) ? $editableData->title : ""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[url]" id="url" class="span6" placeholder="Enter url"
                               type="text" value="<?php echo isset($editableData) ? $editableData->url : ""; ?>">

                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <textarea name="<?php echo CONTROLLER; ?>[summary]" class="span6" placeholder="Enter summary"
                                  type="text"
                                  value=""><?php echo isset($editableData) ? $editableData->summary : ""; ?></textarea>
                        <script>CKEDITOR.replace('<?php echo CONTROLLER; ?>[summary]')</script>
                        <textarea name="<?php echo CONTROLLER; ?>[description]" id="details" class="span6"
                                  placeholder="Enter details" type="text"
                                  value=""><?php echo isset($editableData) ? htmlspecialchars($editableData->description) : ""; ?></textarea>
                        <script>CKEDITOR.replace('<?php echo CONTROLLER; ?>[description]')</script>

                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input name="<?php echo CONTROLLER; ?>[seo_title]" placeholder="Enter seo_title" class="span6"
                               type="text" value="<?php echo isset($editableData) ? $editableData->seo_title : ""; ?>">
                        <input name="<?php echo CONTROLLER; ?>[seo_description]" id="required" class="span6"
                               placeholder="Enter seo description" type="seo_description"
                               value="<?php echo isset($editableData) ? $editableData->seo_description : ""; ?>">

                    </div>
                </div>

                <div class="control-group">

                    <div class="controls">
                        <label for="">Trending</label>
                        <select class="span6" name="<?php echo CONTROLLER; ?>[trending]">
                            <?php
                            $active = '';
                            $inactive = 'selected="selected"';
                            if (isset($editableData)) {
                                if ($editableData->status == '0') {
                                    $active = '';
                                    $inactive = 'selected="selected"';
                                }
                            }
                            ?>
                            <option value="1" <?php echo $active; ?>>Yes</option>
                            <option value="0" <?php echo $inactive; ?>>No</option>
                        </select>

                        <input name="<?php echo CONTROLLER; ?>[source]" placeholder="Enter source" class="span6"
                               type="text" value="<?php echo isset($editableData) ? $editableData->source : ""; ?>">
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

<script>
    function leaveChange(control) {
        var mainselection = control.value; // get the selection value
        $.ajax({
            type: "POST",  // method of sending data
            url: "<?php echo LINK_URL;?>article/getUrl", // name of PHP script
            data: 'id=' + mainselection, // parameter name and value
            success: function (result) {
                var myObj = JSON.parse(result);

                // console.log(myObj[0]);
                $("#url").val(myObj.url); // insert in div above
                $("#title").val(myObj.title); // insert in div above
            }
        });
    }
</script>