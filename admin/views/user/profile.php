<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php $this->loadPartialView("../includes/_breadcumb"); ?>
                <?php $this->loadPartialView("../includes/_message"); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">
                    Welcome <?php echo $editableRecord->full_name; ?> <br><small>(you can update your profile here)</small>
                </h1>
            </div>
        </div>

        <!-- /.row -->
        <div class="row">
            <?php $this->loadPartialView("_formprofile",array("editableRecord"=>$editableRecord,"model"=>$model)); ?>
        </div>
        <!-- /.row -->

        <br/>
        <br/>


        <div class="row">
            <?php $this->loadPartialView("_profileview",array("viewRecord"=>$editableRecord,"model"=>$model)); ?>
        </div>




    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


