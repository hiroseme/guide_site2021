
<?php

include 'connection.php';

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
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="search_results.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <a class="a_nav a_nav_clicked" href="index.php"> LOGIN </a>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_login">
    <div class="new_account_container">
        <h1 class="colour_grey">Welcome!</h1>
        <h2>Enter Details</h2>
        <div class="user_login_container">
            <form name="login_form" id="login_form" method="post" action="process_new_user.php">
                <label for="fname">First Name:</label>
                <input type="text" name="fname"><br><br>
                <label for="lname">Last Name:</label>
                <input type="text" name="lname"><br><br>
                <label for="dob">DOB:</label>
               <input type="date" name="dob"
                       value="2021-08-13"
                       min="1900-01-01" max="2021-08-13"><br><br>
                <label for="email">Email:</label>
                <input type="text" name="email"><br><br>
                <label for="username">Username:</label>
                <input type="text" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" id="submit" value="Create">
            </form>
        </div>
    </div>
</main>
</body>
</html>
