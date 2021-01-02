<?php
$fields = $model->getAllFields();


?>
<div class="col-lg-12">
    <div class="col-lg-6">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <?php
                foreach ($fields as $key => $value) {
                    ?>
                    <tr>
                        <th><?php echo $value; ?></th>
                        <td>
                            <?php
                            if ($key == 'full_name') {
                                echo ucwords($viewRecord->$key);
                            } elseif ($key == 'gender') {
                                echo ($viewRecord->$key) == 'm' ? 'Male' : 'Female';
                            } elseif ($key == 'approved') {
                                echo ($viewRecord->$key) == '1' ? 'Approved' : 'Pending...';
                            } elseif ($key == 'status') {
                                echo ($viewRecord->$key) == '1' ? 'Active' : 'In-Active';
                            } else {
                                echo $viewRecord->$key;
                            }

                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>
    <div class="col-lg-6">
        <?php
        if (file_exists(ROOT ."\\uploaded\\users\\".$viewRecord->image) && !empty($viewRecord->image)) {
            ?>
            <img id="showHere" class="img-thumbnail" src="<?php echo $this->ImgPath . $viewRecord->image; ?> " title="<?php echo $viewRecord->full_name; ?>" alt=""/>
        <?php
        } else {
            ?>
            <img class="img-thumbnail" src="<?php echo PUBLIC_PATH . "images/user.png" ?>" alt=""/>
        <?php
        }
        ?>
    </div>
</div>