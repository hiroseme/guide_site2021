

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
                <input class="search_text_nav" type="text" value="Search... " name='search_product'
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
<main>
    <h2>Log In</h2>
    <div class="user_login_container">
        <h3>User</h3>
        <form name="login_form" id="login_form" method="post" action="process_login.php">
            <label for="username">Username:</label>
            <input type="text" name="username"><br>
            <label for="password">Password:</label>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" id="submit" value="Log In">
        </form>
    <h4>Don't have an account?</h4>
    <a class="account_btn" href="new_account.php">Make an account</a>
    </div>
    <div class="user_login_container">
    <h3>Admin</h3>
    <form name="login_form" id="login_form" method="post" action="process_login.php">
        <label for="username">Username:</label>
        <input type="text" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" id="submit" value="Log In">
    </form>
    </div>
</main>
</body>
</html>
