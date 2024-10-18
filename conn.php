<?php
    $conn = mysqli_connect("localhost","root","","employee");

    if($conn)
    {
        echo "Connection Successfully";
    }else{
        die(mysqli_error("Error ====>"+$conn));
    }
?>