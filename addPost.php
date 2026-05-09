<?php 
    session_start();
    if (isset($_SESSION['Upload'])){
        $title = $_SESSION['preview_title'];
        $details = $_SESSION['preview_details'];
    }else{
        $title = $_POST['title'];
        $details = $_POST['details'];
    }

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blogs";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['preview'])) {
            $_SESSION['preview_title'] = $title;
            $_SESSION['preview_details'] = $details;
            header("Location: preview.php");
            exit();
        }
        unset($_SESSION['preview_title']);
        unset($_SESSION['preview_details']);
        $sql = "INSERT INTO blog_posts (DATE, TITLE, POSTS) VALUES (NOW(), '$title', '$details')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: viewBlog.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>