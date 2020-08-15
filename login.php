<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Log In</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <form method="post" action="">
                    <div class="form-login">
                        <h4>Log in</h4>
                        <input type="email" id="email" class="form-control input-sm chat-input" placeholder="email" name="email">
                        </br>
                        <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="password">
                        </br>
                        <div class="wrapper">   
                            <input type="submit" class="btn btn-primary btn-md" name="submit" value="Log In">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>

<?php 
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $query = "select * from users where email = '$email' and password = '$pass'";
        $sql = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($sql);
        if($row)
        {
            $usrname = $row['name'];
            $poss = $row['poss'];
            $_SESSION['usrname'] = $usrname; 
            $_SESSION['poss'] = $poss;
            header('Location: index.php');
        }
    }
?>