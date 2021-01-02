<div class="content-desc text-justify clearfix" style="font-size: 1.50rem;">
    <?php
    if ($articles->image){
        ?>
        <iframe style="border:none; width:100%; height:800px;"
                src="<?php echo $articles->image; ?>"
                title="<?php echo $articles->image; ?>"></iframe>
    <?php
    }else{
        echo $articles->details;
    }

    ?>

</div>

