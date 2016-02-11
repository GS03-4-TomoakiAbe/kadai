<?php
//DB接続
function db(){
  try {
    return new PDO('mysql:dbname=demo_cms;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
}

//SQL実行エラーチェック
function dbExecError($status,$stmt){
  if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }
}

//認証OK時の初期値セット
function loginSessionSet($val){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
}

//セッションチェック用関数
function sessionCheck(){
  if( !isset($_SESSION["chk_ssid"]) || ($_SESSION["chk_ssid"] != session_id()) ){
    echo "LOGIN ERROR";
    exit();
  }else{
     session_regenerate_id(true);
     $_SESSION["chk_ssid"] = session_id();
  }
}

//HTML XSS対策
function htmlEnc($value) {
    return htmlspecialchars($value,ENT_QUOTES);
}


//メールアドレス検査
//@param string $email 検査するメールアドレス
//@return bool TRUE=OK／FALSE=NG
function emailCheck($email) {
    $paturn = "/[0-9a-z!#\$%\&'\*\+\/\=\?\^\|\-\{\}\.]+@[0-9a-z!#\$%\&'\*\+\/\=\?\^\|\-\{\}\.]+/";
    return preg_match($paturn, $email);
}

//他にチェックする文字などの参考サイト（他にも沢山ググればでてきます）
//http://webmaster.chielog.com/php/81.html



?>
