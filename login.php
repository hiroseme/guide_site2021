
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
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="search_results.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <?php
    if(isset($_SESSION['logged_in'])){
        $username = $_SESSION['logged_in'];
        echo "<a class='a_nav a_nav_clicked' href='login.php'> Logged in as<br>".$username." </a>";
    }
    elseif(isset($_SESSION['logged_in_admin'])){
        $username_admin = $_SESSION['logged_in_admin'];
        echo "<a class='a_nav a_nav_clicked' href='login.php'> Logged in as ".$username_admin." </a>";
    }
    else {
        echo "<a class='a_nav a_nav_clicked' href='login.php'> LOGIN </a>";
    }
        ?>
            <a class="a_nav" href="index.php"> ABOUT </a>
            <a class="a_nav" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_login">
    <?php
    if(isset($_SESSION['logged_in'])){
        $username = $_SESSION['logged_in'];
        echo "<h1>You are logged in as ".$username."</h1>";
        echo "<a href='logout.php'> LOG OUT </a>";
    }
    elseif(isset($_SESSION['logged_in_admin'])){
        $username_admin = $_SESSION['logged_in_admin'];
        echo "<h1>You are logged in as ".$username_admin." [Admin]</h1>";
        echo "<a href='edit_places.php'>Edit places</a><br>";
        echo "<a href='logout.php'> LOG OUT </a>";
    }
    else {
        echo
            "<div class='login_container'>
    <h2>Log In</h2>
    <div class='user_login_container'>
        <h3>User</h3>
        <form name='login_form' id='login_form' method='post' action='process_login_users.php'>
            <label for='username'>Username:</label>
            <input type='text' name='username'><br><br>
            <label for='password'>Password :</label>
            <input type='password' name='password'><br><br>
            <input type='submit' name='submit' id='submit' value='Log In'>
        </form>
    <h4>Don't have an account?</h4>
    <a class='account_btn' href='new_account.php'>Make an account</a>
    </div>
    <div class=user_login_container'>
    <h3>Admin</h3>
    <form name='login_form' id='login_form' method='post' action='process_login_admins.php'>
        <label for='username'>Username:</label>
        <input type='text' name='username'><br><br>
        <label for='password'>Password :</label>
        <input type='password' name='password'><br><br>
        <input type='submit' name='submit' id='submit' value='Log In'>
    </form>
    </div>";
        }?>
</main>
</body>
</html>
