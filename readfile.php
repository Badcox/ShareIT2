<?php 
    include "Config.php";

    $images_sql = "Select * from images Order by id desc limit 2";

    $result = mysqli_query ($con, $images_sql);

    $row = mysqli_fetch_array($result);

    $filename = $row['name'];
    $image = $row['image'];

?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <img src="<?= $image ?>" width="300px" height="300px">

        <br><br>
        <img src="<?=$image ?>" width="300px" height="300px">
    </body>

</html>