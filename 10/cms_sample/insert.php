<?php
include('include/func.php'); //外部ファイル読み込み（関数群）

//入力チェック
if(
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["view"]) || $_POST["view"]=="" ||
//  !emailCheck($_POST["view"]) || //Emailチェックfunc.phpに追加済み
  !isset($_POST["detail"]) || $_POST["detail"]==""
){
  exit('ParamError');
}

//POSTデータ取得
$title   = $_POST["title"];
$view  = $_POST["view"];
$detail = $_POST["detail"];

//**************************************************
// 以下DB（一覧情報取得）
//**************************************************
//1. 接続します
$pdo = db(); // new PDO(...を関数として読み込み (include/func.php)

//2．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO cms_table(id, news_title, news_detail, view_flg,
indate )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $title);
$stmt->bindValue(':a2', $detail);
$stmt->bindValue(':a3', $view);
$status = $stmt->execute();

//3．SQL実行エラーチェック
dbExecError($status,$stmt);

//4．データ登録処理後
header("Location: index.php");
exit;
?>
