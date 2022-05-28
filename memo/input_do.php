<?php
$memo = filter_input(INPUT_POST, 'memo', FILTER_SANITIZE_SPECIAL_CHARS);

require('dbconnect.php');
// $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
$stmt = $db->prepare('insert into memos(memo) values(?)');
if (!$stmt):
    die($db->error);
endif;
$stmt->bind_param('s', $memo);
$ret = $stmt-> execute();

if ($ret):
    echo '登録されました';
    echo '<br><a href="index.php">トップへ戻る</a>';
else:
    $db->error;
endif;
?>
