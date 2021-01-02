<?php
$model_admin = $model;
$total = $model_admin->countTotalRecords();
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="<?php echo LINK_URL; ?>" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->


    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb"><a href="<?php echo LINK_URL . "user/index"; ?>"> <i class="icon-user"></i> <span
                                class="label label-important"></span> Users
                        Management </a></li>

                <li class="bg_lb"><a href="<?php echo LINK_URL . "site/sitemap"; ?>"> <i class="icon-user"></i> <span
                                class="label label-important"></span> Create Sitemap.xml
                         </a></li>


            </ul>
        </div>
        <!--End-Action boxes-->
        <hr/>

    </div>
</div>

<!--end-main-container-part-->
