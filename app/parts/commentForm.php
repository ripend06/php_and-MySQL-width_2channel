<?php
$position = 0;

if (isset($_POST["submitButton"])) { //書き込みボタンが押されたときの実行
    $position = $_POST["position"]; //位置をその中に入れる
}
?>

<form class="formWrapper" method="POST">
    <div>
        <input type="submit" name="submitButton" value="書き込む">
        <label>名前：</label>
        <input type="text" name="username" value="<?php if ($thread[id] == $comment["thread_id"]) echo $_SESSION["username"] ?>"> <!-- スレッドIDとコメントのthread_idが一致するとき sessionを表示 -->
        <!-- $threadは、thread.phpの中の$threadから来てる -->
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea name="body" class="commentTextArea"></textarea>
    </div>
    <!-- 位置取得用　-->
    <input type="hidden" name="position" value="0">
</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    //console.log($(window).scrollTop());
    $(document).ready(() => { //画面が読み込み終えたら実行する
        $("input[type=submit]").click(() => { //書き込むボタンを押したら実行する
            //現在のスクロール位置を取得
            let position = $(window).scrollTop(); //現在の位置をposition　にいれる
            $("input:hidden[name=position]").val(position); //現在の位置positionをinputのvalueに入れる　なんでわざわざいれるの？PHPで取得できる
        })
        $(window).scrollTop(<?php echo $position; ?>); //現在の位置　 $position　に移動する
    })
</script>