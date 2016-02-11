<?php
session_start();
include('include/func.php'); //外部ファイル読み込み（関数群）

//POST受け取り[POSTデータの未入力チェック]
if( (isset($_POST["lid"]) && $_POST["lid"]!="") && (isset($_POST["lpw"]) && $_POST["lpw"]!="") ){
  $lid = $_POST["lid"];
  $lpw = $_POST["lpw"];
}else{
  //POSTがどちらか送信されてない、または、POSTデータのどちらかが未入力
  exit;
}

//1. 接続します
$pdo = db(); // new PDO(...を関数として読み込み (include/func.php)

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$status = $stmt->execute();//SQL実行時

//３．SQL実行エラーチェック
dbExecError($status,$stmt);

//４．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//５. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  //認証成功：
  loginSessionSet($val); // include/func.phpに関数を記述
  header("Location: select.php");
}else{
  //認証失敗：logout処理を経由して前画面へ
  header("Location: logout.php");
}
exit();
?>

