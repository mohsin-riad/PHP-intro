<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <br><h1>show image</h1><br>
        <a href="index.php" class="btn btn-success">uploade image</a> 
        <div class="img-thumbnail" id="showbanner">
            <?php 
            include 'connection.php';
            $query = "SELECT * FROM data WHERE 1";
            $sql = mysqli_query($conn, $query);
            while($result = mysqli_fetch_array($sql)) { ?>
                <img class="img-fluid" style="width: 180px; height: 180px; overflow: hidden;" src = "./photos/<?php echo $result['name']; ?>">
                <?php
            } 
        ?>
        </div>
    
    </div>    
</body>
</html>