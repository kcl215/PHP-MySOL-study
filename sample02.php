<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample02</title>
</head>
<body>
    <?php
        $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
        $records = $db -> query('select * from my_items');
        if ($records) {
            while ($record = $records->fetch_assoc()) {
                echo $record['item_name'] . '<br>';
            }
        } else {
            echo $db->error;
        }
        // var_dump($records)
    ?>
</body>
</html>