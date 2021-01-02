<?php
$fields = $model->getAllFields();


?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
            <h5>View :: <?php echo ucfirst($viewRecord->title); ?></h5>
            <a href="<?php echo LINK_URL . CONTROLLER . "/update/" . $viewRecord->id; ?>" style="margin-top:   3px" class="btn btn-sm btn-info pull-right">edit</a>
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
                             echo Functions::getStatusTitle($viewRecord->$key);
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