<?php
$locationDAta = Functions::LocationData($editableRecord->id);

?>
<div class="col-lg-12">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        <div class="panel-group" id="update" role="tablist" aria-multiselectable="true">
            <div class="col-lg-4">
                <div class="panel panel-default custom-click">
                    <div class="panel-heading" role="tab" id="headingBasic">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#update"
                               href="#collapseBasic" aria-expanded="false" aria-controls="collapseBasic"
                               class="collapsed">
                                Update Basic Info:
                            </a>
                        </h4>
                    </div>
                    <!--end of panel-heading-->

                    <div id="collapseBasic" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingBasic" aria-expanded="false" style="height: 0px;">

                        <div class="panel-body">
                            <div class="form-group">
                                <label>Choose Image</label>
                                <input onchange="readUrl(this)" type="file" name="Users[image]" id="image">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input name="Users[full_name]"
                                       value="<?php echo isset($editableRecord) ? "$editableRecord->full_name" : ""; ?>"
                                       class="form-control" id="full_name" placeholder="Enter fullname">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="Users[gender]" id="status">
                                    <?php
                                    if(isset($editableRecord)){
                                        $male = "selected = 'selected'";
                                        $female = '';
                                        if($editableRecord->gender == 'f'){
                                            $male = '';
                                            $female = "selected = 'selected'";
                                        }
                                    }
                                    ?>

                                    <option value="m" <?php echo $male; ?>>Male</option>
                                    <option value="f" <?php echo $female; ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input name="Users[address]"
                                       value="<?php echo isset($editableRecord) ? "$editableRecord->address" : ""; ?>"
                                       type="text" class="form-control" id="address" placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label>Phone No.</label>
                                <input name="Users[contact_number]"
                                       value="<?php echo isset($editableRecord) ? "$editableRecord->contact_number" : ""; ?>"
                                       type="text" class="form-control" id="phone_no" placeholder="Enter Phone no.">
                            </div>

                            <div class="pull-right">
                                <button type="button" class="btn btn-info collapsed" data-parent="#update"
                                        data-toggle="collapse" href="#collapseLocation" aria-expanded="false">Next
                                </button>
                            </div>


                        </div>
                        <!--end of panel-body-->
                    </div>
                    <!--end of collapseBasic-->
                </div>
                <!--end of panel-->
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default custom-click">
                    <div class="panel-heading" role="tab" id="location_info">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#update"
                               href="#collapseLocation" aria-expanded="false" aria-controls="collapseIncome">
                                Update Location Info:
                            </a>
                        </h4>
                    </div>
                    <!--end of panel-heading-->
                    <div id="collapseLocation" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingIncome" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <input type="hidden" id="hidden" name="location_id" value="<?php echo $locationDAta->id; ?>">
                            <div class="form-group">
                                <label>City</label>
                                <input name="Location[city]"
                                       value="<?php echo isset($locationDAta) ? "$locationDAta->city" : ""; ?>"
                                       type="text" class="form-control" id="city" placeholder="Enter city">
                            </div>
                            <div class="form-group">
                                <label>State</label>
                                <input name="Location[state]"
                                       value="<?php echo isset($locationDAta) ? "$locationDAta->state" : ""; ?>"
                                       type="text" class="form-control" id="state" placeholder="Enter state.">
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input name="Location[country]"
                                       value="<?php echo isset($locationDAta) ? "$locationDAta->country" : ""; ?>"
                                       type="text" class="form-control" id="country" placeholder="Enter country">
                            </div>

                            <div class="pull-right">
                                <button type="button" class="btn btn-info collapsed" data-parent="#update"
                                        data-toggle="collapse" href="#authorized" aria-expanded="false">Next
                                </button>
                            </div>
                        </div>
                        <!--end of panel-body-->
                    </div>
                    <!--end of collapseIncome-->
                </div>
                <!--end of panel-->
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default custom-click">
                    <div class="panel-heading" role="tab" id="headingDeduct">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#update"
                               href="#authorized" aria-expanded="false" aria-controls="collapseDeduct">
                                Update Account Info:
                            </a>
                        </h4>
                    </div>
                    <!--end of panel-heading-->
                    <div id="authorized" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingDeduct" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="Users[user_name]"
                                       value="<?php echo isset($editableRecord) ? "$editableRecord->user_name" : ""; ?>"
                                       class="form-control" id="username" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input name="Users[password]"
                                       value="<?php echo isset($editableRecord) ? "$editableRecord->password" : ""; ?>"
                                       type="password" class="form-control" id="password"
                                       placeholder="Enter password">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="Users[email]"
                                       value="<?php echo isset($editableRecord) ? "$editableRecord->email" : ""; ?>"
                                       type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info" >Update</button>
                                <button type="reset" class="btn btn-danger" >Cancel</button>
                            </div>
                        </div>
                        <!--end of panel-body-->

                    </div>
                    <!--end of collapseDeduct-->

                </div>
                <!--end of panel-->
            </div>
        </div>
    </form>
</div>

<script>
    function readUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showHere').attr('src', e.target.result).width(300).height(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>