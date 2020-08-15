<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .modal{
            color: black;
        }
        b{
            color: red;
        }

    </style>
    <title>show student</title>
</head>
<body>  
    <?php include 'connection.php'; ?>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">Home</a>
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="show_student.php">all students</a> </li>
            <li class="nav-item"> <a class="nav-link" href="create_student.php">create student</a> </li>
            <li class="nav-item"> <a class="nav-link" href="create_dept.php">create department</a> </li>
        </ul>
    </nav>

    <!-- main -->
    <div class="container" style="margin-top:80px">
        <div>
            <h2>List all student</h2>
        </div>
        <div class = "col-md-12">
            <table  class="table table-dark table-striped">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of birth</th>
                    <th>Dept</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        
                        $query = "SELECT student.*, departments.name as dept_name FROM student,departments WHERE student.department_id=departments.id";
                        $sql = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($sql))
                        { ?>
                            <tr>
                                <td> <?php echo $row['name'] ?>  </td>
                                <td> <?php echo $row['email'] ?>  </td>
                                <td> <?php echo $row['dob'] ?>  </td>
                                <td> <?php echo $row['dept_name'] ?> </td>
                                <td>
                                    <a class="btn btn-primary" href="edit_student.php?id=<?php echo $row['id']?> ">edit</a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row['id']?>">delete</a>
                                    <div class="modal" id="myModal<?php echo $row['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                    <h4 class="modal-title">CONFIRMATION!!</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            
                                                <div class="modal-body">
                                                    Are you sure <i><b><?php echo $row['name'] ?></b></i> ?
                                                </div>
                                            
                                                <div class="modal-footer">
                                                    <a class="btn btn-success" href="delete_student.php?stdid=<?php echo $row['id']?> ">delete</a>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>    

</body>
</html>

