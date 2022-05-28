<?php
require('dbconnect.php');
// $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
$memos = $db -> query('select * from memos order by id desc');
if (!$memos) {
    die($db -> error);
}
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

    <?php while ($memo = $memos -> fetch_assoc()): ?>
        <div>
            <h2><a href="memo.php?id=<?php echo $memo['id']; ?>"><?php echo htmlspecialchars(mb_substr($memo['memo'], 0, 50)); ?></a></h2>
            <time><?php echo htmlspecialchars($memo['created']); ?></time>
        </div>
        <hr>
    <?php endwhile; ?>
</body>
</html>
