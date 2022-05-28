<?php
require('dbconnect.php');
// $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
$stmt = $db -> prepare('select * from memos order by id desc limit ?, 5');
if (!$stmt) {
    die($db -> error);
}

$page = 5;
$stmt -> bind_param('i', $page);
$stmt -> execute();
// $memos = $db -> query('select * from memos order by id desc limit 0, 5');
// if (!$memos) {
//     die($db -> error);
// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ帳</title>
</head>
<body>
    <h1>メモ帳</h1>

    <p><a href="input.html">新しいメモ</a></p>

    <?php $stmt -> bind_result($id, $memo, $created); ?>
    <?php while ($stmt -> fetch()): ?>
        <div>
            <h2><a href="memo.php?id=<?php echo $id; ?>"><?php echo htmlspecialchars(mb_substr($memo, 0, 50)); ?></a></h2>
            <time><?php echo htmlspecialchars($created); ?></time>
        </div>
        <hr>
    <?php endwhile; ?>
</body>
</html>
