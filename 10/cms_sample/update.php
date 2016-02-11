<?php
session_start();
include('include/func.php'); //外部ファイル読み込み（関数群）

//1.POSTでParamを取得
$title   = $_POST["title"];
$view  = $_POST["view"];
$detail = $_POST["detail"];
$id = $_POST["id"];


//2.DB接続など
// 接続します
$pdo = db(); // new PDO(...を関数として読み込み (include/func.php)

//3.UPDATE gs_an_table SET ....; で更新
//　基本的にinsert.phpの処理の流れです。
$sql = "UPDATE cms_table SET news_title =:title,news_detail =:detail,view_flg =:view,indate =sysdate() WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title,PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':view', $view, PDO::PARAM_STR);
$status = $stmt->execute();

//４．SQL実行エラーチェック
dbExecError($status, $stmt);

//５．ここまでエラーが無ければ実行
header("Location: select.php");

?>
