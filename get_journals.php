<?php
// XSSサニタイズ
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

header('Content-Type: application/json');
$pdo = new PDO('mysql:host=mysql3109.db.sakura.ne.jp;dbname=mikatea_scamper_novelist;charset=utf8mb4',
    'mikatea_scamper_novelist', // ← DBユーザー名
    'Geogra1214'  // ← DBパスワード
);
$stmt = $pdo->query("SELECT id, title, content, created_at FROM journals ORDER BY created_at DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
