<div class="alertbox">
    <?php if($msg_success) { ?>
        <div class="msg_box msg_success">
            <span class="fas fa-times-circle fa-fw" onclick="this.parentNode.remove()"></span>
            <p><?= $msg_success ?></p>
        </div>
    <?php } ?>
    <?php if($msg_error) { ?>
        <div class="msg_box msg_error">
            <span class="fas fa-times-circle fa-fw" onclick="this.parentNode.remove()"></span>
            <p><?= $msg_error ?></p>
        </div>
    <?php } ?>
</div>