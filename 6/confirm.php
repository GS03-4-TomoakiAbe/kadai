<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>

<body>
内容に問題ないか確認してください<br>
<?php
	echo "【名前】<br>\n";
	echo $_POST["onamae"]."さん<br>\n";
    echo "【性別】<br>\n";
    echo $_POST["gender"]."<br>\n";
	echo "【趣味】<br>\n";
	echo implode( "、<br>\n", $_POST["hobby"])."<br>\n";
	echo "【お問い合わせ内容】<br>\n";
	echo nl2br($_POST["honbun"]);
?>
<br>
<form method="post" action="view.php">
<input type="submit" value="送信" name="confirm">
<input type="submit" value="戻る" name="back">
<input type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
<input type="hidden" name="onamae" value="<?= $_POST["onamae"] ?>">
<input type="hidden" name="gender" value="<?= $_POST["gender"] ?>">
<input type="hidden" name="hobby" value="<?php echo(htmlspecialchars( implode( "、", $_POST["hobby"]),ENT_QUOTES)); ?>">
<input type="hidden" name="honbun" value="<?= $_POST["honbun"] ?>">
</form>
</body>
</html>