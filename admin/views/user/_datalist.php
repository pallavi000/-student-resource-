<?php
$table_heading = $model->getFieldLabel();

$paginationData = $model->getRecords();
?>

<div class="span12">
    <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
            <h5>List of <?php echo ucfirst(CONTROLLER); ?></h5>
        </div>
        <div class="widget-content nopadding">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                <form action="" method="post">
                    <div class=" pull-left">
                        <input style="margin-top: 5px;margin-left: 20px " class="span2" name="limit"
                               placeholder="Enter no. of list limit" value="5" type="number">
                        <input style="margin-top: -5px; " type="submit" name="limit_ok" class="btn btn-danger span2"
                               Value="Ok"/>
                        <input style="margin-top: -5px; " type="submit" name="delete_all" class="btn btn-danger"
                               Value="Delete All" onclick="return confirm('Do you want to delete all records?')"/>
                    </div>
                    <div id="" class="dataTables_length pull-right">
                        Search By :
                        <select class="span3" name="search_by">
                            <?php
                            foreach ($table_heading as $key => $value):
                                ?>

                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                        <input class="form-search span6" name="search_key" placeholder="Search keyword" type="text">
                        <input style="margin-top: -10px; " type="submit" name="search" class="btn btn-danger"
                               Value="Ok"/>
                    </div>


                    <table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
                        <thead>
                        <tr role="row">
                            <th class="ui-state-default" style="width: 10px;">

                                <input type="checkbox" onchange="checkAll(this)" id="checked">

                            </th>
                            <th class="ui-state-default" style="width: 10px;">
                                S.N
                            </th>
                            <?php
                            foreach ($table_heading as $key => $value):
                                ?>
                                <th class="ui-state-default" style="width: 166px;">
                                    <?php echo $value; ?>
                                </th>

                            <?php
                            endforeach;
                            ?>
                            <th class="ui-state-default" style="width: 142px;">
                                Action
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        if (count($paginationData['records']) > 0) :
                            $sn = $paginationData['start'] + 1;
                            foreach ($paginationData['records'] as $record) :
                                ?>
                                <tr class="gradeA odd">
                                    <td class=" sorting_1"><input type="checkbox" name="checked[]" id="checked"
                                                                  value="<?php echo $record->id; ?>"></td>
                                    <td class=" "><?php echo $sn++; ?></td>
                                    <td class=" "><?php echo $record->post_date; ?></td>
                                    <td class=" "><?php echo $record->full_name; ?></td>
                                    <td class=" "><?php echo $record->user_name; ?></td>
                                    <td class=" "><?php echo $record->email; ?></td>
                                    <td class=" "><?php echo $record->mobile_number; ?></td>
                                    <td class=" "><?php echo $record->address; ?></td>
                                    <td class=" "><img src="<?php echo $record->image; ?>" height="80" width="100" alt=""></td>
                                    <td class=" ">
                                        <a href="<?php echo LINK_URL . CONTROLLER . "/status/" . $record->id; ?>"
                                           title="<?php echo $record->full_name; ?>"
                                           style="<?php echo ($record->status) == '1' ? 'color:green' : 'color:red'; ?>"><?php echo ($record->status) == '1' ? 'Active' : 'In-Active'; ?></a>
                                    </td>

                                    <td>
                                        <p>
                                            <a href="<?php echo LINK_URL . CONTROLLER . "/update/" . $record->id; ?>"
                                               class="btn btn-success btn-mini"><i class="icon-edit"></i>
                                            </a>

                                            <a href="<?php echo LINK_URL . CONTROLLER . "/delete/" . $record->id; ?>"
                                               class="btn btn-danger btn-mini"><i class="icon-trash"></i>
                                            </a>

                                            <a href="<?php echo LINK_URL . CONTROLLER . "/view/" . $record->id; ?>"
                                               class="btn btn-inverse btn-mini"><i class="icon-eye-open"></i>
                                            </a>
                                        </p>
                                    </td>


                                </tr>

                            <?php
                            endforeach;
                            ?>
                            <tr class="gradeA odd">
                                <td colspan="<?php echo count($table_heading) + 3; ?>" class=" ">
                                    <div
                                        class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
                                        <div class="dataTables_paginate">
                                            <?php echo $paginationData['pagination']; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php
                        else:
                            ?>

                            <tr class="gradeA odd">
                                <td colspan="<?php echo count($table_heading) + 3; ?>" class=" ">
                                    <div
                                        class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
                                        <div class="dataTables_paginate ">
                                            No Record Found...
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endif;
                        ?>

                        </tbody>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>