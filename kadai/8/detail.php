<?php

//1.GETでidを取得
$id = $_GET['id'];

//2.DB接続など
try {
	$pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','root');
} catch (PDOException $e) {
	exit('データベースに接続できませんでした。'.$e->getMessage());
}

$stmt = $pdo->query('SET NAMES utf8');
if (!$stmt) {
	$error = $pdo->errorInfo();
	exit("charerror:".$error[2]);
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=$id");
$status = $stmt->execute();

//4.select.phpと同じようにデータを取得（以下はイチ例）
// while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $name = $result["name"];
//    $email = $result["name"];
//  }

if($status==false){
	$error = $stmt->errorInfo();
	exit("ErrorQuery:".$error[2]);
}else{
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$name=$result["name"];
	$email=$result["email"];
	$naiyou=$result["naiyou"];
	$id=$result["id"];  
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$name?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$email?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$naiyou?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$id?>"></label>
     <input type="submit" value="更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>






