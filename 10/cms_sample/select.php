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

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM cms_table");
$status = $stmt->execute();

//３．SQL実行エラーチェック
dbExecError($status, $stmt);

//４．ここまでエラーが無ければ：Selectデータの数だけ自動でループして取得(HTML文字列を作成)
$view=""; //HTML文字列を代入するための変数
while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){

  //管理FLGで表示を切り分けたりしてみましょう！！！（追加してください！）
  if( $_SESSION["kanri_flg"]==1 ){ //管理者の場合[リンク有りにしてみた]
    $view .= '<p><a href="detail.php?id='.htmlEnc($result["id"]).'">'.htmlEnc($result["news_title"])." : ".htmlEnc($result["news_detail"]).'</a></p>';
  }else{ //一般の場合[リンク無しにしてみた]
    $view .= '<p>'.htmlEnc($result["indate"]).' | '.htmlEnc($result["news_title"])." | ".htmlEnc($result["news_detail"]).'</p>';
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
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->
<?php
//2. HTML_ENDをインクルード
include("html/html_end.php");
?>

