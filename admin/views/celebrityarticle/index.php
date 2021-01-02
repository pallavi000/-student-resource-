
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
        <!--<a class="btn btn-primary btn-large" href="<?php /*echo LINK_URL.CONTROLLER."/inactive"; */?>"><i class="icon-plus-sign"></i> In-Active Article</a>
        <a class="btn btn-primary btn-large" href="<?php /*echo LINK_URL.CONTROLLER."/approved"; */?>"><i class="icon-plus-sign"></i> Un approved Article</a>-->
        <div class="row-fluid">
            <?php $this->loadPartialView("_datalist", array("model" => $blog_article_model)); ?>
        </div>
    </div>

</div>
