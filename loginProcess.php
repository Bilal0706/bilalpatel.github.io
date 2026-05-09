<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "127.0.0.1";
    $username = "root";
    $dbpassword = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT EMAIL, PASSWORD FROM user_info WHERE EMAIL = '$email' AND PASSWORD = '$password'";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['loggedin'] = true;

            header("Location: addEntry.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>