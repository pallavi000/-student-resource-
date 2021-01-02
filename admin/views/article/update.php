
<div id="content">
    <div id="content-header">
        <?php $this->loadPartialView("../includes/_breadcumb"); ?>
        <h1 class="text-center">Welcome
            <small><?php echo ucfirst(CONTROLLER); ?> Management</small>
        </h1>
    </div>
    <div class="container-fluid">

        <hr/>

        <?php $this->loadPartialView("../includes/_linkbuttons"); ?>
        <?php $this->loadPartialView("../includes/_message"); ?>

        <hr/>
        <div class="row-fluid">
            <?php $this->loadPartialView("_form", array("model" => $article_model,"editableData"=>$editableRecord)); ?>
        </div>
    </div>

</div>
