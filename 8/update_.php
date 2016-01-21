<?php
//入力チェック
if(
  !isset($_POST["id"]) || $_POST["id"]=="" ||
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
){
  exit('ParamError');
}

//1.POSTでParamを取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$naiyou = $_POST["naiyou"];
$id = $_POST["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

$stmt = $pdo->query('SET NAMES utf8');
if (!$stmt) {
  $error = $pdo->errorInfo();
  exit($error[2]);
}

//3.UPDATE gs_an_table SET ....; で更新
//　基本的にinsert.phpの処理の流れです。
$sql = "UPDATE gs_an_table SET name =:name WHERE id = $id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name,PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: select.php?true-message");
  exit;
}
?>
