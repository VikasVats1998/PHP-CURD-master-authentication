<?php

include"db_connection.php";

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM student WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script> alert('Data Successfully Deleted ') </script> ";
        header("location: home.php");
    }
    else
    {
        echo "<script> alert('Something wents wrong ! Please try again ') </script> ";
    }
}


?>