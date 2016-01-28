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

//2. DB文字コードを指定
$stmt = dbCharSet($pdo);

//3.SELECT * FROM gs_an_table WHERE id=***; を取得
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id",$id);
$status = $stmt->execute();

//4.select.phpと同じようにデータを取得（以下はイチ例）
//４．SQL実行エラーチェック
dbExecError($status,$stmt);

//５．抽出データ数を取得
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
     <label>名前：<input type="text" name="name" value="<?=htmlEnc($val["name"])?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=htmlEnc($val["email"])?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=htmlEnc($val["naiyou"])?></textArea></label><br>
     <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
     <input type="submit" value="更新">
 	</form>
 	<form method="post" action="delete.php">
	  <label><input type="hidden" name="id" value="<?=$id?>"></label><br>
	  <input type="submit" value="削除">
	</form>
</fieldset>
</div>
<!-- Main[End] -->
<?php
//2. HTML_ENDをインクルード
include("html/html_end.php");
?>




