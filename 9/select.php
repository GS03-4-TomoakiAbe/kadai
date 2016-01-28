<?php
session_start();
include('include/func.php'); //外部ファイル読み込み（関数群）

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

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//４．SQL実行エラーチェック
dbExecError($status, $stmt);

//５．ここまでエラーが無ければ：Selectデータの数だけ自動でループして取得(HTML文字列を作成)
$view=""; //HTML文字列を代入するための変数
while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){

  //管理FLGで表示を切り分けたりしてみましょう！！！（追加してください！）
  if( $_SESSION["kanri_flg"]==1 ){ //管理者の場合[リンク有りにしてみた]
    $view .= '<p><a href="detail.php?id='.htmlEnc($result["id"]).'">'.htmlEnc($result["name"])." : ".htmlEnc($result["email"]).'</a></p>';
  }else{ //一般の場合[リンク無しにしてみた]
    $view .= '<p>'.htmlEnc($result["indate"]).' | '.htmlEnc($result["name"])." | ".htmlEnc($result["email"]).'</p>';
  }

}
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
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">データ登録</a>　
        <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<?php
if(isset($_GET["true-message"])){ echo '<p style="padding:20px;">更新が完了しました。</p>'; }
?>
<?php
if(isset($_GET["delete-message"])){ echo '<p style="padding:20px;">削除が完了しました。</p>'; }
?>
<?php
$kanri = $_SESSION["kanri_flg"];
if($kanri == 1){
	$kanri = "管理者";	
}else{
	$kanri = "一般ユーザー";	
}
print '<p>名前：'.$_SESSION["name"].'</p>';
print '<p>権限：'.$kanri.'</p>';
?>
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->
<?php
//2. HTML_ENDをインクルード
include("html/html_end.php");
?>

