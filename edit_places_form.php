<?php

include 'connection.php';
session_start();

$all_places_query = "SELECT PlaceID, PlaceName, Town, ImageFile, TypeID, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID ORDER BY PlaceName ASC";
$all_places_result = mysqli_query($con, $all_places_query);

if (isset($_POST['PlaceName'])) {
    $placename = $_POST['PlaceName'];
} else {
    echo "Error: Returning to edit_places.php";
    header("refresh:1; url=edit_places.php");
}

$this_place_query = "SELECT * FROM places WHERE PlaceName='".$placename."'";
$this_place_result = mysqli_query($con, $this_place_query);

$all_regions_query = "SELECT * FROM regions";
$all_regions_result = mysqli_query($con, $all_regions_query);

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
            <form class="search_nav" action="places.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_place'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <?php
            if(isset($_SESSION['logged_in'])){
                $username = $_SESSION['logged_in'];
                echo "<a class='font_small' href='login.php'> Logged in as<br>".$username." </a>";
            }
            elseif(isset($_SESSION['logged_in_admin'])){
                $username_admin = $_SESSION['logged_in_admin'];
                echo "<a class='a_nav' href='login.php'> Logged in as ".$username_admin." </a>";
            }
            else {
                echo "<a class='a_nav' href='login.php'> LOGIN </a>";
            }
            ?>
            <a class="a_nav" href="about.php"> ABOUT </a>
            <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
</header>
<main class="main_places">
    <div class="places_container_outer">
        <div class="new_account_container">
            <h1 class="colour_grey">Edit <?php echo $placename; ?></h1>
            <div class="user_login_container">
                    <?php
                    while($this_place_record = mysqli_fetch_assoc($this_place_result)) {
                        $placeid = $this_place_record['PlaceID'];
                        $placename = $this_place_record['PlaceName'];
                        $description = $this_place_record['PlaceName'];
                        $regionid = $this_place_record['RegionID'];
                        $house = $this_place_record['HouseNumber'];
                        $street = $this_place_record['StreetName'];
                        $town = $this_place_record['Town'];
                        $postcode = $this_place_record['PostCode'];
                        $typeid = $this_place_record['TypeID'];
                        $image = $this_place_record['ImageFile'];
                        echo "
                    <form name='edit_place_form' id='edit_place_form' method='post' action='process_update.php'>
                    <table>
                    <tr>
                    <td><label for='placeid'>ID: </label></td> 
                    <td><p class='colour_grey font_1rem'>" . $placeid . "</p>
                    <input type='hidden' name='placeid' value='" . $placeid . "'></td>
                    </tr>
                    <tr>
                    <td><label for='placename'>Name:</label></td>
                    <td><input type='text' name='placename' value='" . $placename . "'></td>
                    </tr>
                    <tr>
                    <td><label for='description'>Description:</label></td>
                    <td><textarea class='edit_textarea' type='text' name='description'>" . $description . "</textarea></td>
                    </tr> 
                    <tr>
                    <td><label for='regionid'>Region:</label></td>
                    <td>
                    <select name='regionid' id='regionid' value='".$regionid."'>
                    ";
                    while ($all_regions_record = mysqli_fetch_assoc($all_regions_result)) {
                        $option_regionname = $all_regions_record['Name'];
                        $option_regionid = $all_regions_record['RegionID'];
                        if($option_regionid==$this_place_record['RegionID']){
                            echo "<option value='".$option_regionid."' selected>".$option_regionname."</option>";
                        }

                        echo "<option value='".$option_regionid."'>".$option_regionname."</option>";
                    }
                    echo "
                    </select>
                    </td>
                    </tr>
                    <tr>
                    <td><label for='housenumber'>House Number:</label></td>
                    <td><input type='text' name='housenumber' value='" . $house . "'></td>
                    </tr>
                    <tr>
                    <td><label for='street'>Street Name:</label></td>
                    <td><input type='text' name='streetname' value='" . $street . "'></td>
                    </tr>
                    <tr>
                    <td><label for='town'>Town:</label></td>
                    <td><input type='text' name='town' value='" . $town . "'</td>
                    </tr>
                    <tr>
                    <td><label for='typeid'>TypeID:</label></td>
                        <td>
                        ";
                    echo "<input type='radio' name='typeid' value='CLTR'";
                    if($typeid=='CLTR'){echo "checked='checked'";}
                    echo "><label for='typeid'>Cultural</label>
                            <input type='radio' name='typeid' value='OTDS'";
                    if($typeid=='INDR'){echo "checked='checked'";}
                    echo "><label for='typeid'>Outdoors & Sport</label>  
                            <input type='radio' name='typeid' value='INDR'";
                    if($typeid=='OTDS'){echo "checked='checked'";}
                    echo "><label for='typeid'>Indoors</label>  
                        </td>
                    </tr>
                    <tr>
                    <td><label for='postcode'>Post Code:</label></td>
                    <td><input type='text' name='postcode' value='" . $this_place_record['PostCode'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='image'>Image File:</label></td>
                    <td><textarea class='edit_textarea' type='text' name='image'>" . $this_place_record['ImageFile'] . "</textarea></td>
                    </tr> 
                    <tr><td><input type='submit' name='submit' id='submit' value='Update'></td></tr></table>
                    </form>
                    ";
                    }
                    ?>
            </div>
        </div>
    </div>
</main>
</body>
</html>




