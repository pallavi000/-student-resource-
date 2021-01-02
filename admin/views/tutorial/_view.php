<?php
$fields = $model->getAllFields();


?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
            <h5>View :: <?php echo ucfirst($viewRecord->title); ?></h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                <?php
                foreach ($fields as $key=>$value) {
                    ?>
                    <tr>
                        <th style="text-align: left"><?php echo ucfirst($value); ?></th>
                        <td>
                            <?php
                            if ($key == 'status') {
                                ?>
                                <span style="<?php echo $viewRecord->$key == '1' ? 'color:green' : 'color:red'; ?>" ><?php echo $viewRecord->$key == '1' ? 'Active' : 'In-active'; ?></span>
                            <?php
                            }else if ($key == 'image') {
                                ?>
                                <img src="<?php echo $viewRecord->$key;; ?>" width="100" height="100" alt="">
                                <?php
                            }else{
                                echo $viewRecord->$key;
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </thead>

            </table>
        </div>
    </div>
</div>