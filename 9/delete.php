<?php
session_start();
include('include/func.php'); //外部ファイル読み込み（関数群）

//1.POSTでParamを取得
$id = $_POST["id"];

//2.DB接続など
// 接続します
$pdo = db(); // new PDO(...を関数として読み込み (include/func.php)

// DB文字コードを指定
$stmt = dbCharSet($pdo);

//3.DELETE
//SQLの準備
$sql = "DELETE FROM gs_an_table WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id,PDO::PARAM_INT);
$status = $stmt->execute();

//４．SQL実行エラーチェック
dbExecError($status, $stmt);

//５．ここまでエラーが無ければ実行
header("Location: select.php?delete-message");
?>
