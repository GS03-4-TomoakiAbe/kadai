<?php
//1.  DB接続します
  $pdo = new PDO('mysql:dbname=gs_db;host=localhost','root','root');


//2. DB文字コードを指定（固定）
$stmt = $pdo->query('SET NAMES utf8');

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");

//４．SQL実行
$flag = $stmt->execute();

//データ表示
$view="";
if($flag==false){
  $view = "SQLエラー";
}else{
  //Selectデータの数だけ自動でループしてくれる
    $view .= '<table class="table">';
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //5.表示文字列を作成→変数に追記で代入
    $view .= '<tr><td>'.$result['name'].'</td><td>'.$result['email'].'</td><td>'.$result['naiyou'].'</td><td>'.$result['indate'].'</td></tr>';
//      $view .= $result['indate']."<br>";
//        $view .= $result['name'].'['.$result['indate'].']'.<br>";
 }
    $view .= '</table>';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container"><?=$view?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
