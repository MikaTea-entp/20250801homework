<?php
session_start();
require_once __DIR__ . '/src/Auth0.php';
require_once __DIR__ . '/db.php'; // PDO $pdo を読み込み
$config = require 'config.php';

// Auth0認証を完了し、ユーザー情報を取得
$auth0 = new \Auth0\SDK\Auth0([
    'domain' => $config['domain'],
    'client_id' => $config['client_id'],
    'client_secret' => $config['client_secret'],
    'redirect_uri' => $config['redirect_uri'],
]);

$userInfo = $auth0->getUser(); // Auth0からユーザー情報を取得

if (!$userInfo || !isset($userInfo['sub'])) {
    // 認証失敗・不正アクセス
    header('Location: login.php?error=callback');
    exit;
}

// 必要な情報だけ抜き出し
$sub   = $userInfo['sub'];
$name  = $userInfo['name'] ?? '';
$email = $userInfo['email'] ?? '';

// usersテーブルに登録 or 更新
$stmt = $pdo->prepare("SELECT id FROM users WHERE sub = ?");
$stmt->execute([$sub]);
$existing = $stmt->fetch();

if ($existing) {
    // UPDATE
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, WHERE sub = ?");
    $stmt->execute([$name, $email, $sub]);
} else {
    // INSERT
    $stmt = $pdo->prepare("INSERT INTO users (sub, name, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$sub, $name, $email]);
}

// セッションに保存（自由に拡張OK）
$_SESSION['user'] = [
    'sub' => $sub,
    'name' => $name,
    'email' => $email,
];

// 認証後ホームへリダイレクト
header('Location: home.html');
exit;
