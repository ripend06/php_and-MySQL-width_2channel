<?php

include_once("./app/database/connect.php");
include("./app/functions/comment_add.php"); //コメント追加関数を読み込み

include("./app/functions/thread_get.php"); //スレッド読み込み関数を読み込み

?>
<!-- threadをforeach文で一つ一つ出力する -->
<?php foreach ($thread_array as $thread) :?>
<div class="threadWrapper">
    <div class="childWrapper">
        <div class="threadTitle">
            <span>【タイトル】</span>
            <h1><?php echo $thread["title"] ?></h1>
        </div>

        <!-- コメントファイル読み込み-->
        <?php include("commentSection.php") ?>
        <!-- コメントフォーム読み込み -->
        <?php include("commentForm.php") ?>

    </div>
</div>
<?php endforeach ?>