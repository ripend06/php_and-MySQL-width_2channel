<!-- バリチェエクのエラー吐き出し -->
<!-- もし$error_messageが入っているなら、foreach文で、errorを吐き出す -->
<?php if(isset($error_message)) :?>
    <ul class="errorMessage">
        <?php foreach ($error_message as $error) :?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>