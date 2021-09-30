<?php

include 'connection.php';
session_start();

//checking if user is logged in
if(isset($_SESSION['logged_in_admin'])){
    $username_admin = $_SESSION['logged_in_admin'];
}
else {
    //if user isn't logged in, taken to log in page
    echo header("Location: login.php");
}

//query to select all details from the regions table
$all_regions_query = "SELECT * FROM regions";
$all_regions_result = mysqli_query($con, $all_regions_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> GuideSITE | ADD PLACE </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <nav class="nav_navy">
        <div class="nav_container">
            <img class="logo_img" src="GuideSITE.png" alt="Guide Site Logo">
            <form class="search_nav" action="places.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <?php
            //checking if user is logged in
            if(isset($_SESSION['logged_in'])){
                $username = $_SESSION['logged_in'];
                echo "<a class='a_nav a_nav_clicked font_small' href='login.php'> Logged in as".$username." </a>";
            }
            elseif(isset($_SESSION['logged_in_admin'])){
                $username_admin = $_SESSION['logged_in_admin'];
                echo "<a class='a_nav a_nav_clicked font_small' href='login.php'> Logged in as ".$username_admin." </a>";
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
    <div class="new_account_container">
        <h1 class="colour_grey">Add a new place</h1>
        <h2>Enter Details</h2>
        <div class="add_place_container">
            <form action="process_add.php" method="post">
                <table>
                <tr>
                    <td><label for="PlaceName">Place Name: </label></td>
                    <td><input type="text" name="PlaceName"></td>
                </tr>
                <tr>
                    <td><label for="Description">Description: </label></td>
                    <td><textarea type="text" name="Description"></textarea></td>
                </tr>
                <tr>
                    <td><label for="TypeID">Place Type: </label></td>
                    <td>
                        <!-- radio buttons to select place type -->
                    <input type='radio' name='TypeID' value='CLTR'>
                    <label for='TypeID'>Cultural</label>
                    <input type='radio' name='TypeID' value='OTDS'>
                    <label for='TypeID'>Outdoors & Sport</label>
                    <input type='radio' name='TypeID' value='INDR'>
                    <label for='TypeID'>Indoors</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="RegionID">Region: </label></td>
                    <td>
                    <?php
                    //dropdown menu for regions
                    echo "<select name='RegionID' id='regionid' value='Region'>";
                    while ($all_regions_record = mysqli_fetch_assoc($all_regions_result)) {
                        $option_regionname = $all_regions_record['Name'];
                        $option_regionid = $all_regions_record['RegionID'];
                        echo "<option value='".$option_regionid."'>".$option_regionname."</option>";
                    }
                    echo "</select>";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="HouseNumber">House Number: </label></td>
                    <td><input type="text" name="HouseNumber"></td>
                </tr>
                <tr>
                    <td><label for="StreetName">Street Name: </label></td>
                    <td><input type="text" name="StreetName"></td>
                </tr>
                <tr>
                    <td><label for="Town">Town: </label></td>
                    <td><input type="text" name="Town"></td>
                </tr>
                <tr>
                    <td><label for="PostCode">Post Code: </label></td>
                    <td><input type="text" name="PostCode"></td>
                </tr>
                <tr>
                    <td><label for="ImageFile">Image File: </label></td>
                    <td><textarea type="text" name="ImageFile"></textarea></td>
                </tr>
                <tr>
                    <td><label for="ALT">ALT text for Image: </label></td>
                    <td><input type="textarea" name="ALT"></td>
                </tr>
                </table>
                <input class="button" type="submit" name="submit" id="submit" value="Add">
            </form>
        </div>
    </div>
</main>
<footer>
    <div class="footer_container">
        <p><b>Contact Us:<br></b><br>Ph: 020 123 4567<br>Email: guidesite@info.co.nz<br>Office Hours: 7:00am ~ 5:00pm /7 days<br>PO Box:32134</p>
        <p><b>Address:</b><br>1 Kiwi Avenue, Wellington<br></p>
        <p class="footer_small">By Megumi Hirose 2021</p>
    </div>
</footer>
</body>
</html>
