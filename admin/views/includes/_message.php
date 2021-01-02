<?php
$message = $this->getFlashedMessage();
if (array_key_exists('error', $message)) {

    ?>
    <div class="alert alert-danger">
        <?php echo $message['error']; ?>
    </div>
    <?php
} else if (array_key_exists('success', $message)) {
    ?>
    <div class="alert alert-success">
        <?php echo $message['success']; ?>
    </div>
    <?php
}
?>