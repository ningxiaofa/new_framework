<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <div>
        <?php 
        foreach($list as $row){
            echo '<div><a href="./index.php?index/list?type='. $row['type'] . '"> ' . $row['name'] . ' (' . $row['count'] . ')' . '</a></div>';
        }
        ?>
    </div>
</body>
</html>