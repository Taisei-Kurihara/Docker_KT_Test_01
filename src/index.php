<?php
$host = "mysql"; // docker-compose の service 名を使う
$user = "data_user";
$pass = "data";
$dbname = "db_Neko";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id, name, Age, example_message FROM table_Neko");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "DB接続エラー: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Neko DB Viewer</title>
</head>
<body>
    <h1>🐱 Neko DB 一覧</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Name</th><th>Age</th><th>Message</th>
        </tr>
        <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row["id"]) ?></td>
            <td><?= htmlspecialchars($row["name"]) ?></td>
            <td><?= htmlspecialchars($row["Age"]) ?></td>
            <td><?= htmlspecialchars($row["example_message"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
