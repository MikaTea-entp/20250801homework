<?php
// XSSサニタイズ
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続
$pdo = new PDO('mysql:host=mysql3109.db.sakura.ne.jp;dbname=mikatea_scamper_novelist;charset=utf8mb4',
    'mikatea_scamper_novelist', // ← DBユーザー名
    'Geogra1214'  // ← DBパスワード
);
$id = $_POST['id'] ?? 0;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM journals WHERE id=?");
    $stmt->execute([$id]);
    echo 'success';
} else {
    http_response_code(400);
    echo 'error';
}
?>
