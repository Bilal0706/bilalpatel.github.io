<?php
    session_start();

    unset($_SESSION['preview_title']);
    unset($_SESSION['preview_details']);
    header("Location: addEntry.php");
    exit();
?>