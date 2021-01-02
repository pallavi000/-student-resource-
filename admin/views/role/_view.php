<?php
$fields = $model->getAllFields();


?>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
            <h5>Assigned Role :: <?php echo ucwords($viewRecord->role); ?></h5>
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
                            if($key == 'user_id') {
                                echo Functions::GetUserName($viewRecord->$key);
                            }else if ($key == 'status') {
                                ?>
                                <span style="<?php echo $viewRecord->$key == '1' ? 'color:green' : 'color:red'; ?>" ><?php echo $viewRecord->$key == '1' ? 'Active' : 'In-active'; ?></span>
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