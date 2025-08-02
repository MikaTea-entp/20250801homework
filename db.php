<?php
// 柔軟な書き方らしいので、授業で扱ったものとは違う書き方を試してみる。
$host = '';            // ホスト名
$db   = '';         // DB名
$user = '';         // ユーザー名
$pass = '';     // pw
$charset = 'utf8mb4';           // 文字コード

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDOオプション設定
// エラー時に例外をスロー
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // エラー時に例外スロー
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // デフォルトで連想配列取得
    PDO::ATTR_EMULATE_PREPARES   => false,                   // ネイティブプリペアドステートメント
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    exit('DB接続失敗: ' . $e->getMessage());
}
