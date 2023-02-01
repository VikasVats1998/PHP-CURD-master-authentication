<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHPCURD</title>
</head>
<body>
    <div class="container">
            <div class="jumbotron" style="background-color: white" >
                <h1>PHP - CURD : Display Data</h1>
                <hr>
                <div class="row">
                    <a href="insertdata.php" class="btn btn-success" style="margin-left: 80%"> Add Data</a>
                </div>
                <br>

            <?php 
           include"db_connection.php";
            
            $query = "SELECT * FROM student ORDER BY id ASC";
            $query_run = mysqli_query($connection,$query);
            ?>
            
            <table class="table table-bordered" style="background-color: white">
                <thead class="table-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Course</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="c68f9604-03d9-4acf-9d87-aadc361ad83e" data-share-badge-host="https://www.credly.com"></div><script type="text/javascript" async src="//cdn.credly.com/assets/utilities/embed.js"></script>

            <?php
            $sno = 1;

            if($query_run)
            {
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                    <tbody>
                        <tr>
                            <th><?php  echo $sno ; ?></th>
                            <th><?php  echo $row['fname']; ?></th>
                            <th><?php  echo $row['lname']; ?></th>
                            <th><?php  echo $row['course']; ?></th>
                            
                            <form action="updatedata.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <th><input type="submit" name="edit" class="btn btn-success" value="EDIT"></th>
                            </form>

                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <th><input type="submit" name="delete" class="btn btn-danger" value="DELETE"></th>
                            </form>
                            
                        </tr>
                    </tbody>
                    
                    <?php
                    $sno++;
                }
            }
            else 
            {
                echo "No record found";
            }
            ?>
        
        </table>
            </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>