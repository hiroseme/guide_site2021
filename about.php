<?php

include 'connection.php';
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | HOME </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <nav class="nav_navy">
        <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
        <form class="search_nav" action="places.php" method="post">
            <input class="search_text_nav" type="text" value="Search... " name='search_place'
                   onclick="value=''">
            <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">

        </form>
        <?php
        if(isset($_SESSION['logged_in'])){
            $username = $_SESSION['logged_in'];
            echo "<a class='a_nav font_small' href='login.php'> Logged in as<br>".$username." </a>";
        }
        elseif(isset($_SESSION['logged_in_admin'])){
            $username_admin = $_SESSION['logged_in_admin'];
            echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
        }
        else {
            echo "<a class='a_nav' href='login.php'> LOGIN </a>";
        }
        ?>
        <a class="a_nav" href="password_maker.php"> ABOUT </a>
        <a class="a_nav" href="places.php"> PLACES </a>
        <a class="a_nav a_nav_clicked" href="index.php"> HOME </a>
    </nav>
</header>
<main class="main_index">
</main>
</body>
</html>




