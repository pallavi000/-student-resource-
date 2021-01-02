<div id="content">
    <div id="content-header">
        <?php $this->loadPartialView("../includes/_breadcumb"); ?>
        <h1 class="text-center">Welcome
            <small><?php echo ucfirst(CONTROLLER); ?> Management</small>
        </h1>
    </div>
    <div class="container-fluid">

        <hr/>
        <?php $this->loadPartialView("../includes/_message"); ?>

        <hr/>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5><?php echo isset($editableData) ? 'Edit ' . ucfirst(CONTROLLER) : 'Add New ' . ucfirst(CONTROLLER); ?></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <img id="showHere" style="position: absolute"
                                 src="<?php echo PUBLIC_PATH . "img/image-not-found.png"; ?>" height="160px"
                                 width="160px" alt="<?php echo "Image Not Found!!!" ?>"
                                 title="<?php echo "Image Not Found!!!"; ?>"/>

                            <div class="control-group">
                                <div class="controls">

                                    <select class="span12" name="<?php echo CONTROLLER; ?>[gallery]">
                                        <option value="0">Select Gallery</option>
                                        <?php
                                        $folders = Functions::SetFolderName();
                                        foreach ($folders as $key => $value) {
                                            ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>


                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">

                                    <input id="image" type="file" name="<?php echo CONTROLLER; ?>[image][]"
                                           onchange="imagePreview(this)" class="span12" multiple/>

                                </div>
                            </div>
                            <div class="control-group">

                                <div class="controls">
                                    <input value="upload" class="btn btn-primary pull-left" type="submit">

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div id="accordion">
                <?php
                $folders = Functions::SetFolderName();
                $sn = 0;
                $colors = Functions::SetColor();
                foreach ($folders as $key=>$value) {
                    $sn = $sn+1;

                    ?>
                    <div class="card">
                        <div class="card-header" id="heading<?php echo $sn; ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-<?php echo $colors[$sn]; ?>" data-toggle="collapse"
                                        data-target="#collapse<?php echo $sn; ?>" aria-expanded="true"
                                        aria-controls="collapse<?php echo $sn; ?>">
                                    <?php echo ucfirst($value); ?>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse<?php echo $sn; ?>" class="collapse show"
                             aria-labelledby="heading<?php echo $sn; ?>" data-parent="#accordion">
                            <div class="card-body">

                                <div class="widget-content">
                                    <ul class="thumbnails">
                                        <?php
                                        $dirname = "uploaded/" . $key . "/";
                                        $images = glob($dirname . "*.{jpg,PNG,png,gif,JPG,pdf}", GLOB_BRACE);
                                        foreach ($images as $image) {
                                            $pieces = explode("/", $image);
                                            ?>
                                            <li class="span2">
                                                <p class="pull-right">
                                                    <a title="" class="btn btn-sm btn-danger"
                                                       href="<?php echo LINK_URL . CONTROLLER . "/deleteImage/" . $pieces[1]."-".$pieces[2]; ?>">
                                                        <i class="icon-trash"></i>
                                                    </a>
                                                    <a class="lightbox_trigger btn btn-sm btn-danger"
                                                       href="<?php echo MAIN_URL . $image; ?>">
                                                        <i class="icon-search icon-sm"></i>
                                                    </a>
                                                </p>
                                                <a>
                                                    <img onclick="showName('<?php echo MAIN_URL . $image; ?>')"
                                                         id="showHere"
                                                         style="height: 140px; width: 200px;"
                                                         src="<?php echo MAIN_URL . $image; ?>" alt=""
                                                         title="<?php echo $pieces[2]; ?>">
                                                </a>


                                            </li>

                                            <?php
                                        }

                                        ?>


                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
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
    function showName(path) {
        window.prompt("Copy to clipboard: Ctrl+C, Enter", path);

    }

    function imagePreview(input) {
        if (input.files) {
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showHere').attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

</script>