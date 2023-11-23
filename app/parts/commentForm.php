<form class="formWrapper" method="POST">
    <div>
        <input type="submit" name="submitButton" value="書き込む">
        <label>名前：</label>
        <input type="text" name="username">
        <!-- $threadは、thread.phpの中の$threadから来てる -->
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea name="body" class="commentTextArea"></textarea>
    </div>
</form>