<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500</title>
    <style>
        .main {
            color: red;
        }
    </style>
</head>

<body>
    <div class="main">
        500 Server Error
        <?php if(DEBUG){ echo "<br/>Err detail: " . $errMsg; }?>
    </div>
</body>

</html>