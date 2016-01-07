<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>

<body>

<?php
if(isset($_POST["confirm"])){
?>

<?php
	echo "【名前】<br>\n";
	echo $_POST["onamae"]."さん<br>\n";
    echo "【性別】<br>\n";
    echo $_POST["gender"]."<br>\n";
	echo "【趣味】<br>\n";
	echo(htmlspecialchars( $_POST["hobby"],ENT_QUOTES))."<br>\n";
	echo "【お問い合わせ内容】<br>\n";
	echo nl2br($_POST["honbun"]);
?>
    
<?php
$onamae = $_POST["onamae"];
$gender = $_POST["gender"];
$hobby = $_POST["hobby"];
$honbun = $_POST["honbun"];
if(onamae){
$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fputs($file, $onamae . PHP_EOL);
fputs($file, $gender . PHP_EOL);
fputs($file, $hobby . PHP_EOL);
fputs($file, $honbun . PHP_EOL);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
echo "<br>ファイルに書き込みされました";
}
?>

<?php
} elseif(isset($_POST["back"])){
?>

<p>再入力</p>
<form method="post" action="confirm.php">
【名前】<br>
<input type="text" name="onamae" value="<?= $_POST["onamae"] ?>"><br>
【趣味】<br>
<input type="checkbox" name="hobby[]" value="<?= $_POST['hobby'] ?>" <?php if($_POST["hobby"]==0) echo "checked"; ?>>
ゲーム<br>
<input type="checkbox" name="hobby[]" value="<?= $_POST['hobby'] ?>" <?php if($_POST["hobby"]==1) echo "checked"; ?>>
スポーツ<br>
<input type="checkbox" name="hobby[]" value="<?= $_POST['hobby'] ?>" <?php if($_POST["hobby"]==2) echo "checked"; ?>>
グルメ<br>



【お問い合わせ内容】<br>
<textarea name="honbun" cols="30" rows="5"><?= $_POST["honbun"] ?></textarea><br>
<input type="submit" value="確認">
<input type="hidden" name="user_id" value="<?= $_POST["user_id"] ?>">
</form>

<?php
} else{
?>

エラーです。
<a href="index.html">はじめからやり直してください。</a>

<?php
}
?>

</body>
</html>