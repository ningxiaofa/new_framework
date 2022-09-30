<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
</head>
<body>
    <div>
        <?php 
        $span = '<span>' . $row['title'] . ' ' . $row['content'] . ' ' . $row['created_at'] . '</span>';
            echo '<div>'. $span .'</div>';
        ?>
    </div>
</body>
</html>