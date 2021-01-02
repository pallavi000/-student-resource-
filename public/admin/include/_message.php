<?php
    if(isset($message['error'])) {
        ?>
        <div class="alert alert-error">
            <strong>Sorry!</strong> <?php echo $message['error']; ?>
        </div>
    <?php
    }
    if(isset($message['success'])){
        ?>
        <div class="alert alert-success">
            <strong>Well done!</strong> <?php echo $message['success']; ?>
        </div>
    <?php
    }
?>