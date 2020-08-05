<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>student creation</title>
</head>
<body>  
    <?php include 'connection.php'; ?>
    <div class = "container">
        <div>
            <h2>List all student</h2>
        </div>
        <div class = "col-md-10">
            <table  class="table table-dark table-striped">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of birth</th>
                    <th>Dept</th>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT student.name, email, dob, departments.name as dept_name FROM student,departments WHERE department_id=departments.id";
                        $sql = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($sql))
                        { ?>
                            <tr>
                                <td> <?php echo $row['name'] ?>  </td>
                                <td> <?php echo $row['email'] ?>  </td>
                                <td> <?php echo $row['dob'] ?>  </td>
                                <td> <?php echo $row['dept_name'] ?> </td>
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

