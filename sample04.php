<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample03</title>
</head>
<body>
    <?php
        $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
        $message = "フォームから入力したメモです";
        $stmt = $db->prepare('insert into memos(memo) values(?)');
        if (!$stmt):
            die($db ->error);
        endif;
        $stmt -> bind_param('s', $message);
        // bind_params('s', $message) 's'=string 
        $ret = $stmt->execute();
        if ($stmt):
            echo 'データを挿入しました';
        else:
            echo $db -> error;
        endif;
    ?>
</body>
</html>