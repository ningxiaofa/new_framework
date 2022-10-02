<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Page</title>
</head>
<body>
    <div>
        <?php 
            foreach($list as $row){
                $a = '<span><a href="./index.php?index/detail?id=' . $row['id'] . '"> ' . $row['title'] . ' type:' . $row['type'] . ' ' . $row['content'] . ' ' . $row['created_at'] . '</a></span>';
                
                echo '<div>'. $a .'</div>';
            }
        ?>
    </div>
</body>
</html>