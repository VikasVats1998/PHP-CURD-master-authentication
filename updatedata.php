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

    <title>UPDATEDATA</title>
</head>
<body>
<?php 
   
    $id = $_POST['id'];

    $query = "SELECT * FROM student WHERE id='$id'";
    $quer_run = mysqli_query($connection,$query);

    if($quer_run)
    {
        while($row = mysqli_fetch_array($quer_run))
        {
            ?>

                    <div class="container">
                        <div class="row">
                        <div class="jumbotron">
                        <h2>PHP - CURD : Add Data</h2>
                        <hr>

                        <form action="" method="post"> 

                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']?>"  require>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']?>"  require>
                            </div>
                            <div class="form-group">
                                <label>Course</label>
                                <input type="text" name="course" class="form-control" value="<?php echo $row['course']?>"  require>
                            </div>
                            
                            
                            <button type="submit" name="updateData" class="btn btn-primary">Update Data</button>
                    
                            <a href="home.php" class="btn btn-danger">Cancel</a>
                        </form>


                        <?php 
                            if(isset($_POST['updateData']))
                            {
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $course = $_POST['course'];
                        
                                $query = "UPDATE student SET  fname = '$fname', lname =' $lname' ,  course = '$course' WHERE id = '$id' ";
                                $query_run = mysqli_query($connection,$query);
                        
                                if($query_run)
                                {
                                    echo '<script> alert("Data Updated");</script>';
                                    header("location:index.php");
                                }
                                else
                                {
                                    echo '<script> alert("Data is not Update ! Please try again");</script>';
                                }
                            }
                        ?>


                        </div>
                    </div>
                    </div>

            <?php
        }
    }
    else
    {
        echo "<script> alert('No Record Found');</script> ";
    }
    ?>

    
</body>
</html>