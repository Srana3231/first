<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pcjdata";

    // Creating databse connection

    $conn = mysqli_connect($servername, $username, $password, $database);

    //check Connection

    if(!$conn)
    {
        die("Failed to connect". mysqli_connect_erroe());
    }
    
?>