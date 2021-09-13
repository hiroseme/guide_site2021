<?php

include 'connection.php';
session_start();
$all_places_query = "SELECT PlaceID, PlaceName, Town, ImageFile, Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName ASC";
$all_places_result = mysqli_query($con, $all_places_query);

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
            <a class="a_nav" href="about.php"> ABOUT </a>
            <a class="a_nav a_nav_clicked" href="places.php"> PLACES </a>
            <a class="a_nav" href="index.php"> HOME </a>
        </div>
    </nav>
    <div class="nav_regions">
        <h1 class="regions_head">Regions</h1>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NTL' value="Northland">
        </form>
        <?php
        if (isset($_POST['NTL'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='NTL' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='AUK' value="Auckland">
        </form>
        <?php
        if (isset($_POST['AUK'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='AUK' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='HKB' value="Hawke's Bay">
        </form>
        <?php
        if (isset($_POST['HKB'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='HKB' ORDER BY PlaceName ASC");
        }
        ?>
        <form class="region_button" action="places.php" method="post">
            <input class="region_button" type='submit' name='GIS' value="Gisborne">
        </form>
        <?php
        if (isset($_POST['GIS'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='GIS' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WGN' value="Wellington">
        </form>
        <?php
        if (isset($_POST['WGN'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='WGN' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MBH' value="Marlborough">
        </form>
        <?php
        if (isset($_POST['MBH'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='MBH' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='MWT' value="Manawatu-Wanganui">
        </form>
        <?php
        if (isset($_POST['MWT'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='MWT' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WKO' value="Waikato">
        </form>
        <?php
        if (isset($_POST['WKO'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='WKO' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='BOP' value="Bay of Plenty">
        </form>
        <?php
        if (isset($_POST['BOP'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='BOP' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='NSN' value="Nelson">
        </form>
        <?php
        if (isset($_POST['NSN'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='NSN' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TKI' value="Taranaki">
        </form>
        <?php
        if (isset($_POST['TKI'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='TKI' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='TAS' value="Tasman">
        </form>
        <?php
        if (isset($_POST['TAS'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='TAS' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='CAN' value="Canterbury">
        </form>
        <?php
        if (isset($_POST['CAN'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='CAN' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='WTC' value="West Coast">
        </form>
        <?php
        if (isset($_POST['WTC'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='WTC' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='OTA' value="Otago">
        </form>
        <?php
        if (isset($_POST['OTA'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='OTA' ORDER BY PlaceName ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="region_button" type='submit' name='STL' value="Southland">
        </form>
        <?php
        if (isset($_POST['STL'])) {
            //Query to get all places in the Northland region
            $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE places.RegionID='STL' ORDER BY PlaceName ASC");
        }
        ?>
        <?php
        if (isset($_POST['search_place'])) {
        $search_place = $_POST['search_place'];

        //Query to select all places that are like the user input
        $all_places_result = mysqli_query($con,"SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE PlaceName LIKE '%$search_place%'");
        $count = mysqli_num_rows($all_places_result);
        }
        ?>
    </div>
</header>
<main class="main_places">
    <div class="column_left">
        <h2 class="filter_header">Filter</h2>
            <form action="places.php" method="post">
                <input class="filter_btn" type='submit' name='indoors' value="Indoors">
            </form>
            <?php
            if (isset($_POST['indoors'])) {
                //Selects only cold products
                $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE placetypes.TypeID = 'INDR'");
            }
            ?>
        <form action="places.php" method="post">
            <input class="filter_btn" type='submit' name='outdoors' value="Outdoors & Sport">
        </form>
        <?php
        if (isset($_POST['outdoors'])) {
            //Selects only cold products
            $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE placetypes.TypeID = 'OTDS'");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn" type='submit' name='cultural' value="Cultural">
        </form>
        <?php
        if (isset($_POST['cultural'])) {
            //Selects only cold products
            $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID WHERE placetypes.TypeID = 'CLTR'");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn" type='submit' name='z-a' value="Z-A">
        </form>
        <?php
        if (isset($_POST['z-a'])) {
            //Selects only cold products
            $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName DESC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn" type='submit' name='rating_highlow' value="Rating: High-Low">
        </form>
        <?php
        if (isset($_POST['rating_highlow'])) {
            //Selects only cold products
            $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY Rating DESC");
        }
        ?><form action="places.php" method="post">
            <input class="filter_btn" type='submit' name='rating_lowhigh' value="Rating: Low-High">
        </form>
        <?php
        if (isset($_POST['rating_lowhigh'])) {
            //Selects only cold products
            $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating, placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY Rating ASC");
        }
        ?>
        <form action="places.php" method="post">
            <input class="filter_btn" type='submit' name='reset' value="RESET">
        </form>
        <?php
        if (isset($_POST['reset'])) {
            //Selects only cold products
            $all_places_result = mysqli_query($con, "SELECT PlaceID, PlaceName, Town, ImageFile, Rating,placetypes.TypeName, regions.Name FROM places INNER JOIN regions ON regions.RegionID = places.RegionID INNER JOIN placetypes ON placetypes.TypeID = places.TypeID ORDER BY PlaceName ASC");
        }
        ?>
    </div>
    <div class="column_right">
        <div class="search_places_container">
        <form class="search_places" action="places.php" method="post">
            <input class="search_text_places" type="text" value="Search... " name='search_place'
                   onclick="value=''">
            <div class="search_btn_places_container">
            <input class="search_btn_places" type="submit" name="submit" value="&#x1F50D">
            </div>
        </form>
        </div>
        <h1 class="places_header">
        <?php if (isset($_POST['AUK'])) {
            echo "Auckland";
        } elseif (isset($_POST['BOP'])) {
            echo "Bay of Plenty";
        } elseif (isset($_POST['CAN'])) {
            echo "Canterbury";
        } elseif (isset($_POST['GIS'])) {
            echo "Gisborne";
        } elseif (isset($_POST['HKB'])) {
            echo "Hawke's Bay";
        } elseif (isset($_POST['MBH'])) {
            echo "Marlborough";
        } elseif (isset($_POST['MWT'])) {
            echo "Manawatu-Wanganui";
        } elseif (isset($_POST['NSN'])) {
            echo "Nelson";
        } elseif (isset($_POST['NTL'])) {
            echo "Northland";
        } elseif (isset($_POST['OTA'])) {
            echo "Otago";
        } elseif (isset($_POST['STL'])) {
            echo "Southland";
        }elseif (isset($_POST['TAS'])) {
            echo "Tasman";
        }elseif (isset($_POST['TKI'])) {
            echo "Taranaki";
        }elseif (isset($_POST['WGN'])) {
            echo "Wellington";
        }elseif (isset($_POST['WTC'])) {
            echo "West Coast";
        }elseif (isset($_POST['WKO'])) {
            echo "Waikato";
        } elseif (isset($_POST['indoors'])) {
            echo "Indoors";
        } elseif (isset($_POST['outdoors'])) {
            echo "Outdoors & Sport";
        } elseif (isset($_POST['cultural'])) {
            echo "Cultural";
        } elseif (isset($_POST['search_place'])) {
            if ($search_place == "") {
                echo "</tr><br><h2 class='search_error_text'>Please enter something!</h2>";
            } elseif ($count == 0) {
                echo "</tr><br><h2 class='search_error_text'>No places matched your search...</h2>";
            } else{
                echo "Search Results for '".$_POST['search_place']."'";
            }
        } else {
            echo "Discover places...";
        }
        ?>
        </h1>
        <div class="places_container_outer">
        <?php
        while ($all_places_record = mysqli_fetch_assoc($all_places_result)) {
            echo "<div class='places_container'>";
            echo "<div class='more_info'><form action='places_info.php' method='get'>
                        <input class='more_info_btn' type='submit' id='place' name='place' value=' Click for more info' onclick='value=" . $all_places_record['PlaceID'] . "' >
                    </form></div>";
            echo "<img class='places_image' src='" . $all_places_record['ImageFile'] . "'>";
            echo "<div class='places_text'>";
            echo "<p class='places_text_name'>" . $all_places_record['PlaceName'] . "</p>";
            echo "<br>";

            $star_num = round($all_places_record['Rating'], 0);
            if($star_num==0){
                echo "<p class='places_text_name'>☆☆☆☆☆</p>";
            }
            elseif($star_num==1){
                echo "<p class='places_text_name'>★☆☆☆☆</p>";
            }
            elseif($star_num==2){
                echo "<p class='places_text_name'>★★☆☆☆</p>";
            }
            elseif($star_num==3){
                echo "<p class='places_text_name'>★★★☆☆</p>";
            }
            elseif($star_num==4){
                echo "<p class='places_text_name'>★★★★☆</p>";
            }
            elseif($star_num==5){
                echo "<p class='places_text_name'>★★★★★</p>";
            }

            echo "<p class='places_text_grey'>" . $all_places_record['Town'] . ", " . $all_places_record['Name'] . "</p>";
            echo "<p class='places_text_grey'><b>" . $all_places_record['TypeName'] . "</b></p>";

            echo "</div></div>";

            $reviews_query = "SELECT * FROM reviews WHERE PlaceID='".$all_places_record['PlaceID']."'";
            $reviews_result = mysqli_query($con, $reviews_query);
            $count = 0;
            $rating = 0;
            while ($reviews_record = mysqli_fetch_assoc($reviews_result)){
                $count = $count + 1;
                $rating = $rating + $reviews_record['Rating'];
            }
            if($count === 0){
                $final_rating = 'a';
            }
            else{
                $final_rating = round($rating/$count,2);
            }
            $update_review_command = "UPDATE places SET Rating='".$final_rating."', ReviewNum='".$count."' WHERE PlaceID='".$all_places_record['PlaceID']."'";
            $update_review_result = mysqli_query($con, $update_review_command);
        }
        ?>
    </div>
    </div>
</main>
</body>
</html>
