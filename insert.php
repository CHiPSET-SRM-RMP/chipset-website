<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty($username) || !empty($email) || !empty($message)){
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "test";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if(mysqli_connect_error()){
            die("Connect Error(". mysqli_connect_errno().")". mysqli_connect_error());
        }
        else{
            // $SELECT = "SELECT email FROM users WHERE email = ? LIMIT 1";
            $INSERT = "INSERT INTO users (name, email, message) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $username, $email, $message);
            $stmt->execute();
            echo "New Record Inserted Successfully";
            $stmt->close();
        }

        $conn->close();
    }

    else{
        echo "All fields are required";
        die();
    }
?>