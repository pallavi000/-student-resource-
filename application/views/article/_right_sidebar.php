<?php
$related_tutorial = Functions::getRelatedTutorial($tutorial_result->id);
?>
<div class="article-sidebar">
    <div class=" col-md-3">
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="margin-bottom: 10px">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_google_gmail"></a>

            <a class="a2a_button_reddit"></a>
            <a class="a2a_button_pocket"></a>
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <div style="padding-left:10px; width: 100%; border: 1px solid #dedede; background-color: #7d8080;" class="text-center" >

            <h5 style=" font-weight: 500; font-size: 1.5em;  color: white" >Related Tutorial</h5>

        </div>
        <div class="list-group text-left" style="font-size: 1.5em; font-weight: 200">
            <?php
            foreach ($related_tutorial as $row){

            ?>
            <a href="<?php echo LINK_URL . "article/index/" . $row->url; ?>" class="list-group-item ">  <img src="<?php echo $row->image; ?>" style="width:30px; height: 30px; border-radius: 50%;"> <?php echo $row->title; ?></a>
            <?php
            }
            ?>
        </div>
        <div class="thumbnail">
        <?php
        foreach ($advertise as $row) {
            if ($row->alignment == "right" and $row->belongs_page == CONTROLLER) {
                ?>

                    <a target="_blank" href="<?php echo $row->url; ?>">
                        <img style="<?php echo $row->style; ?>" src="<?php echo $row->code; ?>" alt="">
                    </a>


            <?php
            }
        }
        ?>
        </div>
    </div>

</div>
