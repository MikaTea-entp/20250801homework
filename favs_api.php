<?php
session_start();
if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit('Not authorized');
}
require_once("db.php");

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$user_sub = $_SESSION['user']['sub'];

// ファイルが多いと面倒なので1つに集約した。
switch ($action) {
    case 'read':
        // お気に入り一覧取得
        $stmt = $pdo->prepare("SELECT id, title, content FROM favs WHERE user_sub = ? ORDER BY id DESC");
        $stmt->execute([$user_sub]);
        header('Content-Type: application/json');
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'create':
        // 新規追加
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        if ($title && $content) {
            $stmt = $pdo->prepare("INSERT INTO favs (user_sub, title, content) VALUES (?, ?, ?)");
            $stmt->execute([$user_sub, $title, $content]);
            echo "saved";
        } else {
            http_response_code(400);
            echo "Bad request";
        }
        break;

    case 'update':
        // 編集
        $id = $_POST['id'] ?? '';
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        if ($id && $title && $content) {
            $stmt = $pdo->prepare("UPDATE favs SET title = ?, content = ? WHERE id = ? AND user_sub = ?");
            $stmt->execute([$title, $content, $id, $user_sub]);
            echo "updated";
        } else {
            http_response_code(400);
            echo "Bad request";
        }
        break;

    case 'delete':
        // 削除
        $id = $_POST['id'] ?? '';
        if ($id !== '') {
            $stmt = $pdo->prepare("DELETE FROM favs WHERE id = ? AND user_sub = ?");
            $stmt->execute([$id, $user_sub]);
            echo "deleted";
        } else {
            http_response_code(400);
            echo "Bad request";
        }
        break;

    default:
        http_response_code(400);
        echo "Invalid action";
}
