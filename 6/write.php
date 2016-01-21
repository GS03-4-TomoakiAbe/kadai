<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
書き込みを行います。<br>
This is a Pen. とdata.txt に書き込みます。
</body>
<?php
$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fputs($file, "This is a Pen." . PHP_EOL);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>