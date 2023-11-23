<?php

include("./app/functions/comment_get.php"); //SQLでデータを取得したものを読み込み。コメントをすべて取得したデータ

?>

<section>
    <!-- foreachループ文で、ひとつひとつ取り出す処理をする　-->
    <!-- $comment_arrayは、SQLのコメントすべて取得したデータ　-->
    <!-- $comment でひとつひとつの変数に入れる　-->
    <?php foreach($comment_array as $comment) :?>
    <!-- スレッドIDとコメントのthread_idが一致するとき -->
    <?php if ($thread[id] == $comment["thread_id"]) :?>
    <article>
        <div class="wrapper">
            <div class="nameArea">
                <span>名前：</span>
                <p class="username"><?php echo $comment["username"] ?></p><!-- 連想配列$commentの中のusernameを取り出す。echoで表示　-->
                <time>:<?php echo $comment["post_date"] ?></time>
            </div>
            <p class="comment"><?php echo $comment["body"] ?></p>
        </div>
    </article>
    <?php endif; ?>
    <!-- foreachでループ文終了　必ず記載　-->
    <?php endforeach ?>
</section>