<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "project";

    $conn = mysqli_connect($servername,$username,$password,$db);

    if(!$conn){
        die ("connection faild". mysqli_connect_error());
    }

    $headername = "http://localhost/blog/news-template/";
?>