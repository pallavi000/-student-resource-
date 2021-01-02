<?php
if ($prev_url == true) {
    $p = LINK_URL . "article/details/" . $prev_url;
} else {
    $p = "#";
}

if ($next_url == true) {
    $n = LINK_URL . "article/details/" . $next_url;
} else {
    $n = "#";
}
?>
<div class="row">
    <div class="col-6"><a class="banner_btn pull-left" href="<?php echo $p; ?>"><strong><i
                    class="fa fa-arrow-circle-left"></i> Prev.</strong></a></div>
    <div class="col-6"><a class="banner_btn pull-right" href="<?php echo $n; ?>"><strong>Next <i
                    class="fa fa-arrow-circle-right"></i> </strong></a></div>
</div>