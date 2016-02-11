<?php
session_start();
include('include/func.php'); //外部ファイル読み込み（関数群）

//idを取得[select.phpよりGETで取得]
if(isset($_GET["id"]) && $_GET["id"]!=""){
  $id = $_GET["id"];
}else{
  exit("Error");
}

//０．前ページとこのページのセッションIDを比較し、ログイン認証済みかを判定
//ログイン認証してなければ処理がここでストップする。
sessionCheck(); // include/func.php に記載

//**************************************************
// 以下DB（一覧情報取得）
//**************************************************
//1. 接続します
$pdo = db(); // new PDO(...を関数として読み込み (include/func.php)

//２.SELECT * FROM gs_an_table WHERE id=***; を取得
$stmt = $pdo->prepare("SELECT * FROM cms_table WHERE id=:id");
$stmt->bindValue(":id",$id);
$status = $stmt->execute();

//３．SQL実行エラーチェック
dbExecError($status,$stmt);

//４．抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法
?>


<?php
//*****************************************
// HTML
//*****************************************
//1. HTML_STARTをインクルード
$title = "LOGIN"; //html_start.phpのtitleタグに表示
include("html/html_start.php");
?>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
    <form method="post" action="update.php">
     <label>タイトル：<input type="text" name="title" value="<?=htmlEnc($val["news_title"])?>"></label><br>
     <label>詳細：<textArea name="detail" rows="4" cols="40"><?=htmlEnc($val["news_detail"])?></textArea></label><br>
     <label>表示ステータス：<input type="radio" name="view" value="0"
     <?php if(htmlEnc($val["view_flg"])==0){echo 'checked';}?>>非表示
     <input type="radio" name="view" value="1"
     <?php if(htmlEnc($val["view_flg"])==1){echo 'checked';}?>>表示</label><br>
     <input type="hidden" name="id" value="<?=htmlEnc($val["id"])?>">
     <input type="submit" value="更新">
     </form>
     <form method="post" action="delete.php">
	  <label><input type="hidden" name="id" value="<?=htmlEnc($val["id"])?>"></label><br>
	  <input type="submit" value="削除">
	</form>
    </fieldset>
  </div>
<!-- Main[End] -->
<?php
//2. HTML_ENDをインクルード
include("html/html_end.php");
?>




