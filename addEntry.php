<?php
    session_start();
    $title = "";
    $details = "";
    if (isset($_SESSION['preview_title']) && isset($_SESSION['preview_details'])) {
        $title = $_SESSION['preview_title'];
        $details = $_SESSION['preview_details'];
    }
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
    <link rel="stylesheet" href="./css/addEntry.css">
    <script src="./JavaScript/addEntry.js" defer></script> 
    <title>Document</title>
</head>
<body>
    <div id="container">
        <form action="addPost.php" method="post">
            <h2>Add Blog</h2>

            <div id="input_container">
                <p>
                    <input type="text" name="title" placeholder="Title" value="<?php echo $title ?>">
                </p>
                <p>
                    <input type="text" name="details" placeholder="Enter your text here" id="details" value="<?php echo $details ?>">
                </p>
            </div>
            <ul>
                <li>
                    <input type="submit" name="submit" value="Submit">
                </li>
                <li>
                    <input type="reset">
                </li>
                <li>
                    <input type="submit" name="preview" id="preview" value="Preview">
                </li>
            </ul>
            <a href="index.php">Home</a>
        </form>
    </div>
    
</body>
</html>