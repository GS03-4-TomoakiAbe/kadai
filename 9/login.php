<?php
//0.自作関数読み込み
include("include/func.php"); //このページでも使用してます！
//1. HTML_STARTをインクルード
$title = "LOGIN"; //html_start.phpのtitleタグに表示
include("html/html_start.php");
?>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
          <p class="navbar-brand">ログイン</p>
        </div>
    </div>
  </nav>
</header>
<?php
if(isset($_GET["true-message"])){ echo '<p style="padding:20px;">ログアウトしました。</p>'; }
?>
<?php
if(isset($_GET["false-message"])){ echo '<p style="padding:20px;">ログインできませんでした。</p>'; }
?>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>

<?php
//2. HTML_ENDをインクルード
include("html/html_end.php");
?>
