<!-- Mohsin Riad -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Photo upload</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Image Space</h1>
        <a href="view.php" class="btn btn-danger">view uploaded images</a> 
        <hr class="mt-2 mb-5">
        <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="file" multiple name="image[]"  id="banners" class="btn btn-success">
            <div class="">
                <div id="msg"></div>
                <label for="">showing selected images:</label>
                <div class="img-thumbnail" id="showbanner"></div>
            </div>
            <input type="submit" name="submit" value="upload now" class="btn btn-primary">
        </form>
           
    </div>
    <script>
        $(document).ready(function(){
            $('#banners').change(function() {
                show_img(this, '#showbanner');
            });
            
            function show_img(input, preview) {
                if (input.files) {
                    for (i = 0; i < input.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img class="img-fluid" style="width: 180px; height: 180px; overflow: hidden;">')).attr('src', event.target.result).appendTo(preview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
        });
    </script>
</body>
</html>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $total = count($_FILES['image']['name']);
        
        for( $i=0 ; $i < $total ; $i++ ) { 
            $name = $_FILES['image']['name'][$i];
            $expname = explode('.',$name);
            //$exptype = $expname[1];
            $c=count($expname);
            $exptype = $expname[$c-1];
            date_default_timezone_set('Asia/Dhaka');
            $date = date('Y-m-d h:i:sa', time());
            $rand = rand(10000,99999);
            $t_name = $date.$rand;
            $bannername = md5($t_name).'.'.$exptype;
            $query = "INSERT INTO `data`(`name`, `upload_date`) VALUES ('$bannername', '$date')";
            if(mysqli_query($conn, $query)){
                $path = "./photos/".$bannername;
                move_uploaded_file($_FILES['image']['tmp_name'][$i], $path);
                header('Location: view.php');
            }
        }
    }
?>