<!-- バリチェエクのエラー吐き出し -->
<?php if(isset($error_message)) :?>
    <ul class="errorMessage">
        <?php foreach ($error_message as $error) :?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>