<?php

include 'connection.php';
session_start();

$all_places_query = "SELECT PlaceID, PlaceName, Town, ImageFile, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID ORDER BY PlaceName ASC";
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
            <form class="search_nav" action="search_results.php" method="post">
                <input class="search_text_nav" type="text" value="Search... " name='search_product'
                       onclick="value=''">
                <input class="search_btn_nav" type="submit" name="submit" value="&#x1F50D">
            </form>
            <a class="a_nav" href="login.php"> LOGIN </a>
            <a class="a_nav" href="index.php"> ABOUT </a>
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
                        $image = $this_place_record['ImageFile'];
                        echo "
                    <form name='edit_place_form' id='edit_place_form' method='post' action='process_update.php'>
                    <table>
                    <tr>
                    <td><label for='placeid'>ID:</label></td> 
                    <td><input type='text' name='placeid' value='" . $this_place_record['PlaceID'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='placename'>Name:</label></td>
                    <td><input type='text' name='placename' value='" . $this_place_record['PlaceName'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='description'>Description:</label></td>
                    <td><textarea type='text' name='description'>" . $this_place_record['Description'] . "</textarea></td>
                    </tr> 
                    <tr>
                    <td><label for='regionid'>Region:</label></td>
                    <td>
                    <select name='regionid' id='regionid' value='".$this_place_record['RegionID']."'>
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
                    <td><input type='text' name='housenumber' value='" . $this_place_record['HouseNumber'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='street'>Street Name:</label></td>
                    <td><input type='text' name='streetname' value='" . $this_place_record['StreetName'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='town'>Town:</label></td>
                    <td><input type='text' name='town' value='" . $this_place_record['Town'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='postcode'>Post Code:</label></td>
                    <td><input type='text' name='postcode' value='" . $this_place_record['PostCode'] . "'></td>
                    </tr>
                    <tr>
                    <td><label for='image'>Image File:</label></td>
                    <td><textarea type='text' name='image'>" . $this_place_record['ImageFile'] . "</textarea></td>
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




