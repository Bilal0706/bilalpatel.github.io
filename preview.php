<?php
    session_start();
    $title = $_SESSION['preview_title'];
    $details = $_SESSION['preview_details'];
    $current_date = new DateTime();
    $current_date_string = $current_date->format('jS F Y G:i');
    $current_date_month = $current_date->format('n');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital@0;1&family=Quicksand:wght@300..700&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital@0;1&family=Quicksand:wght@300..700&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Play:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital@0;1&family=Quicksand:wght@300..700&family=Staatliches&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/viewBlog.css">
    <link rel="stylesheet" href="./css/preview.css">
    <script src="./JavaScript/preview.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="Navigation">
        <header>
            <nav>
                <a href="index.php" id="name">Bilal Patel</a>
                <ul>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="skills.html">Skills</a>
                    </li>
                    <li>
                        <a href="portfolio.html">Projects</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="viewBlog.php"><u>Blog</u></a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div id="blog-content">
        <div id="form">
            <form action="preview.php" method="POST">
                <label>Month</label>
                <select name="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <input type="submit" value="Filter">
            </form>
        </div>
        <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "blogs";
            $posts = [];

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $filtered = false;
            $sql = "SELECT DATE, TITLE, POSTS FROM blog_posts";
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['month'])) {
                $filtered = true;
                $month = $_POST['month'];
                $sql = "SELECT DATE, TITLE, POSTS FROM blog_posts WHERE MONTH(DATE) = '$month'";

                if ($month == $current_date_month) {
                    echo "<div class='blog-entry'>";
                    echo "<p class='date'>".$current_date_string."</p>";
                    echo "<h2 class='title'>".$title."</h2>";
                    echo "<p class='details'>".$details."</p>";
                    echo "<hr> </div>";
                }
            }
            
        
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)){
                $posts[] = $row;
            }

            for ($i=0; $i < count($posts); $i++){
                for ($j=$i+1; $j < count($posts); $j++){
                    $date1 = new DateTime($posts[$i]['DATE']);
                    $date2 = new DateTime($posts[$j]['DATE']);
                    if ($date1 < $date2){
                        $temp = $posts[$i];
                        $posts[$i] = $posts[$j];
                        $posts[$j] = $temp;
                    }
                }
            }

            if (!$filtered) {
                echo "<div class='blog-entry'>";
                echo "<p class='date'>".$current_date->format('jS F Y G:i')."</p>";
                echo "<h2 class='title'>".$title."</h2>";
                echo "<p class='details'>".$details."</p>";
                echo "<hr> </div>";
            }
            if (count($posts) > 0) {
                foreach ($posts as $post) {
                    echo "<div class='blog-entry'>";
                    $date = new DateTime($post['DATE']);
                    echo "<p class='date'>".$date->format('jS F Y G:i')."</p>";
                    echo "<h2 class='title'>".$post['TITLE']."</h2>";
                    echo "<p class='details'>".$post['POSTS']."</p>";
                    echo "<hr> </div>";
                }
            } else {
                echo "No blog entries found.";
            }
            $conn->close();
            
        ?>
    </div>
    <div id="buttons">
        <form action="addEntry.php" method="post" class="edit-form">
            <input type="submit" name="submit" value="Continue Editing" id="edit">
        </form>
        <form action="addPost.php" method="post" class="edit-form">
            <input type="submit" name="Upload" value = "Upload" id="upload">
        </form>
    </div>
</body>
</html>