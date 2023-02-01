<?php

include"db_connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>INSERTDATA</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron" style="background-color: white">
            <h2>PHP - CURD : Add Data</h2>
            <hr>

            <form action="" method="POST"> 
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required="required">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required="required">
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <input type="text" name="course" class="form-control" placeholder="Enter Course Name" required="required">
                </div>
                <button type="submit" name="insert" class="btn btn-primary">Save Data</button>

                <a href="home.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['insert']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $course = $_POST['course'];

        $query = "INSERT INTO student(fname,lname,course) VALUES('$fname','$lname','$course')";
        $query_run = mysqli_query($connection,$query);

        if(($_row['fname']==$fname)&&($_row['lname']==$lname)&&($_row['course']==$course))
        {
            echo "<script>alert('Record already exist');</script>";
        }
        else
        {
            if($query_run)
        {
            echo "<script>alert('Data inserted successfully');</script>";
            header("location:insertdata.php");
        }
        else
        {
            echo "<script>alert('Something wents wrong! Please try again');</script>";
        }
        }

    }


?>