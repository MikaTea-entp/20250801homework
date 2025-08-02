<?php
session_start();             // セッション操作するなら必須
$_SESSION = [];              // セッション変数を空に
session_unset();             // 登録解除（オプション）
session_destroy();           // セッションファイルを削除

$config = require 'config.php';

$domain = $config['domain'];
$returnTo = 'http://localhost/your-project-folder/'; // ログアウト後のリダイレクト先

header('Location: https://' . $domain . '/v2/logout?client_id=' . $config['client_id'] . '&returnTo=' . urlencode($returnTo));
exit;
