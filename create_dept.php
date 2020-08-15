<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>dept. creation</title>
</head>
<body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">Home</a>
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="show_student.php">all students</a> </li>
            <li class="nav-item"> <a class="nav-link" href="create_student.php">create student</a> </li>
            <li class="nav-item"> <a class="nav-link" href="create_dept.php">create department</a> </li>
        </ul>
    </nav>

    <div class="container" style="margin-top:80px">
        <div>
            <h2>create Dept.</h2>
        </div>
        <div class = "col-md-7">
            <form method="post" action="create_dept.php">
                <div class="form-group">
                    <label for="">Dept. Name</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>

                <div class="form-group">
                    <label for="">dept. short code</label>
                    <input type="text"class="form-control"  name="scode" id="">
                </div>

                <div class="form-group">
                    <label for="">Dept. code</label>
                    <input type="text" class="form-control" name="code" id="">
                </div>

                <div class="form-group">        
                    <input type="submit" name="submit" class="btn btn-primary" value="add dept.">
                </div>
            
            </form>
        </div>
    </div>    

</body>
</html>

<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $scode = $_POST['scode'];
        $code = $_POST['code'];
        $query = "INSERT INTO departments(name, short_code, code) VALUES ('$name','$scode','$code')";

        if(mysqli_query($conn, $query))
        {
            echo "success!!";
        }
    }
?>