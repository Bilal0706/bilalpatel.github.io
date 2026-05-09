<?php
    session_start();
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
    <link rel="stylesheet" href="./css/index.css">
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
                        <a href="viewBlog.php">Blog</a>
                    </li>
                    <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                            echo "<li><a href='logout.php' id='logout'>Logout</a></li>";
                        }else{
                            echo "<li><a href='login.html' id='login'>Login</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>
    </div>

    <div id="main_content">
        <p id="big">
            Building clean, modern websites
        </p>
        <p id="small">
            Hi, I am a developer! Welcome to my portfolio.
        </p>
        <a href="addEntry.html" id="temp">Blog</a>
    </div>

    <div id="footer">
        <footer>
            <h2>
                Links:
            </h2>
            
            <ul>
                <li>
                    <a href="https://www.linkedin.com/in/bilal-patel-287b69324/">
                        <img src="./images/linkedin.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="mailto:bp070306@gmail.com">
                        <img src="./images/gmail.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://github.com/Bilal0706">
                        <img src="./images/github.png" alt="">
                    </a>
                </li>
            </ul>
        </footer>
    </div>
</body>
</html>